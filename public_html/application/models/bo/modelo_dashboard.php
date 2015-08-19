<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_dashboard extends CI_Model
{
	function get_style($id)
	{
		$q=$this->db->query('select * from estilo_usuario where id_usuario = '.$id);
		return $q->result();
	}
}