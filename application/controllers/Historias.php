<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Historias extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('historia');
		$this->load->model('mascota');
		$this->load->library('form_validation');

		$data = array();
        if($this->session->userdata('userId')) $data['userId'] = $this->session->userdata('userId');
        if($this->session->userdata('userNivel')) $data['userNivel'] = $this->session->userdata('userNivel');
        $this->load->view('index', $data);
	}
	public function consultar() {
		if($this->session->userdata('isUserLoggedIn') && $this->session->userdata('userNivel') == 1) {
			$data = array();
			if($this->input->post('dnisubmit')) {
				$data['mascotas'] = $this->mascota->getRows(array('conditions'=>array('idPaciente'=>$this->input->post('dni'))));
			}
			if($this->input->post('mascotasubmit')) {
				$this->session->set_userdata('historiasmascota',$this->input->post('mascotaId'));
				redirect('historias/historia');
			}
			$this->load->view('historias/consultar', $data);
		}else{
			redirect('users/login');
		}
	}
	public function historia() {
		if($this->session->userdata('isUserLoggedIn') && $this->session->userdata('userNivel') == 1) {
			if(empty($this->session->userdata('historiasmascota'))) redirect('historias/consultar');
			$data['mascota'] = $this->mascota->getRows(array('id'=>$this->session->userdata('historiasmascota')));
			if($this->input->post('nuevasubmit')) {
				if(count($this->input->post()) == 33) {
					$inser = array();
					foreach ($this->input->post() as $key => $value) {
						if($key != 'nuevasubmit') $inser[$key] = $value;
					}
					$inser['idMascota'] = $data['mascota']['id'];
					$insertar = $this->historia->insertar($inser);
					if($insertar){
						$data['status'] = true;
					}else{
						$data['status'] = false;
					}
				}else{
					$data['validationError'] = true;
				}	
			}
			$data['historia'] = $this->historia->getRows(array('returnType'=>'single','conditions'=>array('idMascota'=>$data['mascota']['id'])));
			if($this->input->post('actualizarsubmit')) {
				if(count($this->input->post()) == 33) {
					$inser = array();
					foreach ($this->input->post() as $key => $value) {
						if($key != 'actualizarsubmit') $inser[$key] = $value;
					}
					$inser['idMascota'] = $data['mascota']['id'];
					$insertar = $this->historia->actualizar($data['historia']['id'], $inser);
					if($insertar){
						$data['historia'] = $this->historia->getRows(array('returnType'=>'single','conditions'=>array('idMascota'=>$data['mascota']['id'])));
						$data['status'] = true;
					}else{
						$data['status'] = false;
					}
				}else{
					$data['validationError'] = true;
				}
			}
		}else{
			redirect('users/login');
		}
		$this->load->view('historias/historia', $data);
	}
}