<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mascotas extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('mascota');
        
        $data = array();
        if($this->session->userdata('userId')) $data['userId'] = $this->session->userdata('userId');
        if($this->session->userdata('userNivel')) $data['userNivel'] = $this->session->userdata('userNivel');
        $this->load->view('index', $data);
    }

    public function informacion() {
    	if($this->session->userdata('isUserLoggedIn')) {
    		$data['mascotas'] = $this->mascota->getRows(array('conditions'=>array('idPaciente'=>$this->session->userdata('userId'))));
    		$this->load->view('mascotas/informacion',$data);
    	}else{
    		redirect('users/login');
    	}
    }

    public function registro() {
        if($this->session->userdata('isUserLoggedIn')) {
            if($this->input->post('registrosubmit')) {
                $this->form_validation->set_rules('nombre', 'nombre', 'required');
                $this->form_validation->set_rules('tipo', 'tipo', 'required');
                $this->form_validation->set_rules('raza', 'raza', 'required');
                $this->form_validation->set_rules('fnacimiento', 'fnacimiento', 'required');
                $this->form_validation->set_rules('sexo', 'sexo', 'required');
                if($this->form_validation->run() == true) {
                    $config = array(
                        'upload_path'=>'imagenes/',
                        'file_name'=>$this->input->post('nombre').'-'.date("YmdHis"),
                        'allowed_types'=>'gif|jpg|png|jpeg',
                        'max_size'=>'20000',
                        'max_width'=>'10000',
                        'max_height'=>'10000'
                    );
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('imagen')) {
                        echo '<script>alert("Se ha producido un error, intentelo de nuevo.");</script>';
                    }else{
                        $imginfo = $this->upload->data();
                        $ins = array(
                            'nombre'=>$this->input->post('nombre'),
                            'tipo'=>$this->input->post('tipo'),
                            'imagen'=>base_url().$config['upload_path'].$imginfo['file_name'],
                            'idPaciente'=>$this->session->userdata('userId'),
                            'raza'=>$this->input->post('raza'),
                            'fnacimiento'=>$this->input->post('fnacimiento'),
                            'sexo'=>$this->input->post('sexo')
                        );
                        if($this->mascota->insertar($ins)) {
                            echo '<script>alert("Mascota añadida correctamente.");</script>';
                        $this->load->view('redirigir', array('pagina'=>base_url().'mascotas/informacion'));
                        }else{
                            echo '<script>alert("Ha ocurrido un error, por favor intentelo de nuevo.");</script>';
                        }
                    }
                }else{
                    echo '<script>alert("Revise los datos e intentelo de nuevo.");</script>';
                }
            }
            $this->load->view('mascotas/registrar');
        }else{
            redirect('users/login');
        }
    }

    public function modificar() {
        if($this->session->userdata('isUserLoggedIn')) {
            if($this->input->post('actualizarsubmit')) {
                $config = array(
                    'upload_path'=>'imagenes/',
                    'file_name'=>$this->input->post('nombre').'-'.date("YmdHis"),
                    'allowed_types'=>'gif|jpg|png|jpeg',
                    'max_size'=>'20000',
                    'max_width'=>'10000',
                    'max_height'=>'10000'
                );
                $this->load->library('upload',$config);
                $modificar = array();
                if($this->upload->do_upload('imagen')) {
                    $imginfo = $this->upload->data();
                    $modificar['imagen'] = base_url().$config['upload_path'].$imginfo['file_name'];
                }
                foreach ($this->input->post() as $key => $value) {
                    if($key != 'actualizarsubmit' AND $key != 'id') $modificar[$key] = $value;
                }
                $mod = $this->mascota->actualizar($this->input->post('id'), $modificar);
                if($mod) {
                    echo '<script>alert("Mascota modificada correctamente.");</script>';
                    $this->load->view('redirigir', array('pagina'=>base_url()));
                }else{
                    echo '<script>alert("Ha ocurrido un error, por favor intentelo de nuevo.");</script>';
                }
            }
            $data['mascotas'] = $this->mascota->getRows(array('conditions'=>array('idPaciente'=>$this->session->userdata('userId'))));
            if($this->input->post('mascotasubmit')) $data['mascota'] = $this->mascota->getRows(array('returnType'=>'single','conditions'=>array('id'=>$this->input->post('mascota'))));
            $this->load->view('mascotas/modificar',$data);
        }else{
            redirect('users/login');
        }
    }

    public function eliminar() {
        if($this->session->userdata('isUserLoggedIn')) {
            if($this->input->post('mascotasubmit')) {
                if($this->mascota->eliminar($this->input->post('mascota'))) {
                    echo '<script>alert("Mascota eliminada correctamente.");</script>';
                    $this->load->view('redirigir', array('pagina'=>base_url()));
                }else{
                    echo '<script>alert("Ha ocurrido un error, por favor intentelo de nuevo.");</script>';
                }
            }
            $data['mascotas'] = $this->mascota->getRows(array('conditions'=>array('idPaciente'=>$this->session->userdata('userId'))));
            $this->load->view('mascotas/borrar',$data);
        }else{
            redirect('users/login');
        }
    }
}