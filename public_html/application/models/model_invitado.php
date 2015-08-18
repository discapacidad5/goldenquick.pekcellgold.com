<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_invitado extends CI_Model{

	function __construct() {
		parent::__construct();


	}

	function consultar_username_afiliado($username,$password)
	{
		$sql= $this->db->query("select id from user_webs_personales where username='".$username."' and clave='".$password."'");

		return $sql->result();
	}
}