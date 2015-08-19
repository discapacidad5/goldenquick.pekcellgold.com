<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class preregistro_model extends CI_Model
{
	function alta()
	{
		$dato_preregistro=array(
					"nombre"       => $_POST['nombre'],
					"correo"       => $_POST['email'],
					"celular"      => $_POST['celular'],
					"invitado_por" => $_POST['invitado'],
					"cedula"       => $_POST['cedula'],
					"estatus"      => "ACT"
	            );
		$this->db->insert("preregistro",$dato_preregistro);
	}
}