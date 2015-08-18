<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_cat_estudios extends CI_Model{

	function __construct() {
		parent::__construct();


	}

	function listarTodos(){
		$tipos = $this->db->get('cat_estudios');
		return $tipos->result();
	}
}