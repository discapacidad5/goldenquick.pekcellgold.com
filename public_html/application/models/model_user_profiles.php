<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_user_profiles extends CI_Model{

	function __construct() {
		parent::__construct();


	}

	function actualizar($user_id, $id_sexo, $id_edo_civil, $id_tipo_usuario, $id_estudio, $id_ocupacion, $id_tiempo_dedicado, $id_estatus,
		$nombre, $apellido, $fecha_nacimiento){

		$datos = array(
				'id_sexo' => $id_sexo,
				'id_edo_civil' => $id_edo_civil,
				//'id_tipo_usuario' => $id_tipo_usuario,
				'id_estudio' => $id_estudio,
				'id_ocupacion' => $id_ocupacion,
				'id_tiempo_dedicado' => $id_tiempo_dedicado,
				'id_estatus' => $id_estatus,
				'nombre' => $nombre,
				'apellido' => $apellido,
				'fecha_nacimiento' => $fecha_nacimiento
				);

		$this->db->update("user_profiles",$datos,"user_id = ".$user_id);
	}

	function cambiar_estado($user_id, $estatus){

		$datos = array(
				'id_estatus' => $estatus
				);

		$this->db->update("user_profiles",$datos,"user_id = ".$user_id);
	}
	
	function EstadoUsuario($id){
		$q = $this->db->query("select id_estatus from user_profiles where user_id=".$id);
		$id_padre = $q->result();
		return $id_padre[0]->id_estatus;
	}

}


