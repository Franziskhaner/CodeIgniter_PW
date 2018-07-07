<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inicio extends CI_Controller {
	public function index() {
		$data = array();
		if($this->session->userdata('userId')) $data['userId'] = $this->session->userdata('userId');
		if($this->session->userdata('userNivel')) $data['userNivel'] = $this->session->userdata('userNivel');
		$this->load->view('index', $data);
	}
}