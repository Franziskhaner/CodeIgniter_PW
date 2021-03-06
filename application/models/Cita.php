<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cita extends CI_Model {
	function __construct() {
		$this->citaTbl = 'citas';
	}
	function getRows($params = array()) {
		$this->db->select('*');
		$this->db->from($this->citaTbl);
		if(array_key_exists("conditions", $params)) {
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}
		}
		if(array_key_exists("idCita",$params)) {
			$this->db->where('idCita',$params['idCita']);
			$query = $this->db->get();
			$result = $query->row_array();
		}else{
			if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit'],$params['start']);
			}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit']);
			}
			$query = $this->db->get();
			if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
				$result = $query->num_rows();
			}elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
				$result = ($query->num_rows() > 0)?$query->row_array():FALSE;
			}else{
				$result = ($query->num_rows() > 0)?$query->result_array():FALSE;
			}
		}
		return $result;
	}
	public function insertar($data = array()) {
		$insert = $this->db->insert($this->citaTbl, $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
}