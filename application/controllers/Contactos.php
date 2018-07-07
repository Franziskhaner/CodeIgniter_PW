<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contactos extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('contacto');
		$this->load->library('form_validation');

		$data = array();
        if($this->session->userdata('userId')) $data['userId'] = $this->session->userdata('userId');
        if($this->session->userdata('userNivel')) $data['userNivel'] = $this->session->userdata('userNivel');
        $this->load->view('index', $data);
	}

	public function contacto() {
		$data = array();
		if($this->input->post('contactosubmit')) {
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('mensaje', 'mensaje', 'required');
			if($this->form_validation->run() == true) {
				$data = array(
					'correo'=>$this->input->post('email'),
					'mensaje'=>$this->input->post('mensaje')
				);
				$insertar = $this->contacto->insertar($data);
				if($insertar){
					$data['status'] = true;
				}else{
					$data['status'] = false;
				}
			}else{
				$data['validationError'] = "Error";
			}
		}
		$this->load->view('contacto/contacto', $data);
	}

	public function mostrar() {
		if($this->session->userdata('isUserLoggedIn') && $this->session->userdata('userNivel') == 1) {
			if($this->input->post('respuesta') AND count($this->input->post()) == 2){
				if($this->input->post('respuesta') != '') {
					foreach ($this->input->post() as $key => $value) {
						if($value == "Responder") $id = $key;
					}
					$respuesta = $this->input->post('respuesta');
					$contacto = $this->contacto->getRows(array('id'=>$id));
					$act = $this->contacto->actualizar($id, array('leido'=>1,'respondido'=>1,'respuesta'=>$respuesta));
					if(/*mail($contacto['correo'], 'Respuesta de contacto', $respuesta)*/$act){
						echo '<script>alert("Correo enviado correctamente.");</script>';
					}else{
						echo '<script>alert("No se pudo enviar el correo, intentelo de nuevo.");</script>';
					}
				}
			}
			$data['noleidos'] = $this->contacto->getRows(array('conditions'=>array('leido'=>'0')));
			$data['leidos'] = $this->contacto->getRows(array('conditions'=>array('leido'=>'1','respondido'=>'0')));
			$data['respondido'] = $this->contacto->getRows(array('conditions'=>array('respondido'=>'1')));
			$this->load->view('contacto/mostrar', $data);
			if($data['noleidos']) {
				foreach ($data['noleidos'] as $key => $value) {
					$this->contacto->actualizar($value['id'], array('leido'=>1));
				}
			}
		}else{
			redirect('');
		}
	}
}