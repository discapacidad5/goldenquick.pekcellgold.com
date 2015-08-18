<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_emails_departamentos extends CI_Model{

	function __construct() {
		parent::__construct();


	}
	
	function buscar(){
		$q = $this->db->query("select * from emails_departamentos");
		return $q->result();
	}
	
	function insertar($nombre, $email){
		$this->db->query("insert into emails_departamentos (nombre, email) values ('".$nombre."','".$email."')");
	}
	
	function eliminar(){
		$this->db->query("delete from emails_departamentos");
	}
}