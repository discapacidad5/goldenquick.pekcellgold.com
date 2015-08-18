<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_user_webs_personales extends CI_Model{

	function __construct() {
		parent::__construct();
	}
	
	function traer_afiliado($id){
		$tipos = $this->db->get_where('users', array('id' => $id));
		
		return $tipos->result();
	}
	
	function traer_afiliado_por_username($username){
		$tipos = $this->db->get_where('users', array('username' => $username));
	
		return $tipos->result();
	}
	
	function traer_acceso_web_personal_afiliado($username){
		$tipos = $this->db->get_where('user_webs_personales', array('username' => $username));
	
		return $tipos->result();
	}
	
	function listar_por_afiliado($username){
		$tipos = $this->db->get_where('user_webs_personales', array('username' => $username));
		return $tipos->result();
	}
	
	function actualizar($username, $clave){
		$datos = array(
				'clave' => $clave);
		$this->db->where("username",$username);
		$this->db->update("user_webs_personales",$datos);
	}
	
	function insertar($username, $clave){
		$datos = array(
				'username' => $username,
				'clave' => $clave
		);
		$this->db->insert("user_webs_personales",$datos);
	}
}