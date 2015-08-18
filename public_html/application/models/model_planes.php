<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_planes extends CI_Model{

	function __construct() {
		parent::__construct();

	}
	
	function Planes(){
		$query = $this->db->get('paquete_inscripcion');
		return $query->result();
	}


}