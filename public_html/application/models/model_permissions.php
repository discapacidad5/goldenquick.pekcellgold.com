<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_permissions extends CI_Model
{
	function check($id,$permiso)
	{
		$q=$this->db->query('select id_perfil from cross_perfil_usuario where id_user='.$id);
		$q=$q->result();
		$q=$q[0]->id_perfil;
		$result=$this->db->query('select CP.id_permiso 
		from cat_permiso CP 
		left join cross_permiso_perfil  CPP on CPP.id_permiso=CP.id_permiso and CP.descripcion="'.$permiso.'"  
			where CPP.id_perfil='.$q);
		return $result->result();
	}
}