<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('login');
        $this->load->model('paciente');

        $data = array();
        if($this->session->userdata('userId')) $data['userId'] = $this->session->userdata('userId');
        if($this->session->userdata('userNivel')) $data['userNivel'] = $this->session->userdata('userNivel');
        $this->load->view('index', $data);
    }
    
    public function informacion() {
        if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->paciente->getRows(array('dni'=>$this->session->userdata('userId')));
            $data['user']['nivel'] = $this->session->userdata('userNivel');
            $this->load->view('users/informacion', $data);
        }else{
            redirect('users/login');
        }
    }
    
    public function login() {
        $data = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('dni', 'dni', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'dni'=>$this->input->post('dni'),
                    'clave' => md5($this->input->post('password'))
                );
                $checkLogin = $this->login->getRows($con);
                if($checkLogin){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['dni']);
                    $this->session->set_userdata('userNivel',$checkLogin['nivel']);
                    redirect('');
                }else{
                    $data['error_msg'] = 'DNI o contraseña erroneo, intentelo de nuevo.';
                }
            }
        }
        $this->load->view('users/login', $data);
    }

    public function registro() {
        $data = array();
        if($this->input->post('registrosubmit')){
            $this->form_validation->set_rules('dni', 'dni', 'required');
            $this->form_validation->set_rules('nombre', 'nombre', 'required');
            $this->form_validation->set_rules('apellidos', 'apellidos', 'required');
            $this->form_validation->set_rules('direccion', 'direccion', 'required');
            $this->form_validation->set_rules('telefono', 'telefono', 'required');
            $this->form_validation->set_rules('pass1', 'pass1', 'required');
            $this->form_validation->set_rules('pass2', 'pass2', 'required');
            if ($this->form_validation->run() == true) {
                if($this->paciente->getRows(array('returnType'=>'count','conditions'=>array('dni'=>$this->input->post('dni')))) == 0) {
                    $login = array(
                        'dni'=>$this->input->post('dni'),
                        'clave'=>md5($this->input->post('pass1')),
                        'nivel'=>2
                    );
                    $paciente = array(
                        'dni'=>$this->input->post('dni'),
                        'nombre'=>$this->input->post('nombre'),
                        'apellidos'=>$this->input->post('apellidos'),
                        'direccion'=>$this->input->post('direccion'),
                        'telefono'=>$this->input->post('telefono')
                    );
                    $inlog = $this->login->insertar($login);
                    $inpac = $this->paciente->insertar($paciente);
                    if($inlog AND $inpac){
                        echo '<script>alert("Registrado correctamente, ya puede ingresar con su usuario.");</script>';
                        $this->load->view('redirigir', array('pagina'=>base_url().'users/login'));
                    }else{
                        echo '<script>alert("Ha ocurrido un error, intentelo de nuevo.");</script>';
                    }
                }else{
                    $data['error_msg'] = 'Ya existe un usuario con ese DNI, revise los datos e intentelo de nuevo.';
                }
            }else{
                $data['error_msg'] = 'Error. Revise los datos e intentelo de nuevo.';
            }
        }
        $this->load->view('users/registro', $data);
    }

    public function modificar() {
        if($this->session->userdata('isUserLoggedIn')) {
            if($this->input->post('modificarsubmit')) {
                $mod = array();
                foreach ($this->input->post() as $key => $value) {
                    if($key != 'modificarsubmit' AND $key != 'dni') $mod[$key] = $value;
                }
                if($this->paciente->actualizar($this->input->post('dni'),$mod)) {
                    echo '<script>alert("Información de usuario correctamente actualizada.");</script>';
                    $this->load->view('redirigir', array('pagina'=>base_url().'users/informacion'));
                }else{
                    echo '<script>alert("Ha ocurrido un error, intentelo de nuevo.");</script>';
                }
            }
            $data['user'] = $this->paciente->getRows(array('dni'=>$this->session->userdata('userId')));
            $this->load->view('users/modificar', $data);
        }else{
            redirect('users/login');
        }
    }

    public function contrasena() {
        if($this->session->userdata('isUserLoggedIn')) {
            if($this->input->post('contrasenasubmit')){
                $com = array(
                    'dni'=>$this->session->userdata('userId'),
                    'clave'=>md5($this->input->post('passanterior'))
                );
                if($this->login->getRows(array('returnType'=>'count','conditions'=>$com))!= 0) {
                    if($this->login->actualizar($this->session->userdata('userId'),array('clave'=>md5($this->input->post('pass1'))))) {
                        echo '<script>alert("Contraseña cambiada correctamente.");</script>';
                        $this->load->view('redirigir', array('pagina'=>base_url().'users/logout'));
                    }else{
                        echo '<script>alert("Ha ocurrido un error, intentelo de nuevo.");</script>';
                    }
                }else{
                    echo '<script>alert("Contraseña actual incorrecta, intentelo de nuevo.");</script>';
                }
            }
            $this->load->view('users/contrasena');
        }else{
            redirect('users/login');
        }
    }
    
    public function logout() {
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('userNivel');
        $this->session->sess_destroy();
        redirect('');
    }
}