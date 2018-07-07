<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Citas extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('cita');
		$this->load->model('mascota');
		$this->load->model('especialidad');
		$this->load->model('paciente');
		$this->load->library('form_validation');

		$data = array();
        if($this->session->userdata('userId')) $data['userId'] = $this->session->userdata('userId');
        if($this->session->userdata('userNivel')) $data['userNivel'] = $this->session->userdata('userNivel');
        $this->load->view('index', $data);
	}
	public function mostrar(){
		$data = array();
		if($this->session->userdata('isUserLoggedIn')){
			if($this->session->userdata('idcita')){
				$data['cita'] = $this->cita->getRows(array('idCita'=>$this->session->userdata['idcita']));
				$data['paciente'] = $this->paciente->getRows(array('dni'=>$this->session->userdata('userId')));
				$data['mascota'] = $this->mascota->getRows(array('id'=>$data['cita']['idMascota']));
				$data['especialidad'] = $this->especialidad->getRows(array('id'=>$data['cita']['idEspecialidad']));
				//$this->session->unset_userdata('idcita');
				$this->load->view('citas/mostrar', $data);
			}else{
				redirect('citas/citas');
			}
		}else{
			redirect('users/login');
		}
	}
	public function coger(){
		if($this->session->userdata('isUserLoggedIn')) {
			if($this->input->post('cogercitaSubmit')) {
				$this->form_validation->set_rules('mascota', 'mascota', 'required');
				$this->form_validation->set_rules('dia', 'dia', 'required');
				if($this->form_validation->run() == true) {
					$mascota = $this->mascota->getRows(array('id'=>$this->input->post('mascota')));
					if($mascota['tipo'] == 'perro' || $mascota['tipo'] == gato) $especialidad = 2;
					else $especialidad = 1;
					$data = array(
						'hora'=>$this->input->post('hora'),
						'minuto'=>$this->input->post('minuto'),
						'dia'=>$this->input->post('dia'),
						'mes'=>$this->input->post('mes'),
						'anno'=>$this->input->post('anno'),
						'idPaciente'=>$this->session->userdata['userId'],
						'idEspecialidad'=>$especialidad,
						'idMascota'=>$this->input->post('mascota')
					);
					$insertar = $this->cita->insertar($data);
					if($insertar){
						$this->session->set_userdata('idcita',$insertar);
						redirect('citas/mostrar');
					}else{
						$data['status'] = "Error";
						redirect('citas/coger');
					}
				}else{
					$data['validationError'] = true;
				}
			}
			$data['cliente'] =  $this->paciente->getRows(array('dni'=>$this->session->userdata('userId')));
			$data['citas'] = $this->cita->getRows(array('conditions'=>array('idPaciente'=>$this->session->userdata('userId'))));
			$data['mascota'] = $this->mascota->getRows(array('conditions'=>array('idPaciente'=>$this->session->userdata('userId'))));
			$data['citastotal'] = $this->cita->getRows();
			$this->load->view('citas/coger', $data);
		}else{
			redirect('users/login');
		}
	}
}