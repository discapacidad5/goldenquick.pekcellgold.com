<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_coaplicante extends CI_Model{

	function __construct() {
		parent::__construct();


	}

	function actualizar($id_user, $nombre, $apellido){

		$datos = array(
				'nombre' => $nombre,
				'apellido' => $apellido);

		$this->db->update("coaplicante",$datos,"id_user = ".$id_user);
	}
}
