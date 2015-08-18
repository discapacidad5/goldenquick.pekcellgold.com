<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_cat_usuario_fiscal extends CI_Model{

	function __construct() {
		parent::__construct();


	}

	function listarTodos(){
		$tipos = $this->db->get('cat_usuario_fiscal');
		return $tipos->result();
	}
}