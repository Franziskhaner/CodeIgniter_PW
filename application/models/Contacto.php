<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contacto extends CI_Model {
	function __construct() {
		$this->Tabla = 'contacto';
	}

	function getRows($params = array()) {
		$this->db->select('*');
		$this->db->from($this->Tabla);
		if(array_key_exists("conditions", $params)) {
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}
		}
		if(array_key_exists("id",$params)) {
			$this->db->where('id',$params['id']);
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
		$insert = $this->db->insert($this->Tabla, $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	public function actualizar($id, $data = array()) {
		$this->db->where('id',$id);
		return $this->db->update($this->Tabla, $data);
	}
}