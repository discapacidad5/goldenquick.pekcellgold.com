<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_users extends CI_Model{

	function __construct() {
		parent::__construct();


	}

	function actualizar($id, $username, $email){

		$datos = array(
				'username' => $username,
				'email' => $email);

		$this->db->update("users",$datos,"id = ".$id);
	}
	
	function get_id($username){
		$q=$this->db->query('select id from users where username="'.$username.'"');
		return $q->result();
	}
}
