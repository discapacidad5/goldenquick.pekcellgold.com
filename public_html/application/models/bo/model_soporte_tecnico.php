<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class model_soporte_tecnico extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	//soporte
	function consultar_asignacion_de_soporte($id){
        $consultar_asignacion = $this->db->query("SELECT id from user_soporte where id_user=".$id."");
		return $consultar_asignacion->result();
	}
	function asignar_red_de_soporte($id) {
			$red_temporal = array (
				"id_user" => $id,
				"id_red_temporal" => $_GET ['id_red']
		    );
		$this->db->insert ( "user_soporte", $red_temporal );
	}
	function actualizar_asignacion_de_red($id){
		
		$datos=array(
				"id_user"=> $id,
				"id_red_temporal" => $_GET['id_red']
		);
		$this->db->where('id_user', $id);
		$this->db->update('user_soporte', $datos);
	}
	
	
	//usuario
	
	function consultar_asignacion_de_soporte_a_usuario($id){
		$consultar_asignacion_red= $this->db->query("SELECT id from user_red_temporal where id_user=".$id."");
		return $consultar_asignacion_red->result();
	}
	function asignar_red_de_soporte_a_usuario($id) {
		$red_temporal = array (
				"id_user" => $id,
				"id_red_temporal" => $_GET ['id_red'],
				"id_red_a_red" => "0"
		);
		$this->db->insert ( "user_red_temporal", $red_temporal );
	}
	function actualizar_asignacion_de_red_a_usuario($id){
	
		$datos=array(
				"id_user"=> $id,
				"id_red_temporal" => $_GET['id_red']
		);
		$this->db->where('id_user', $id);
		$this->db->update('user_red_temporal', $datos);
	}
	
	
	function consultar_asignacion_red_a_red($id){
		$consultar_asignacion_red_a_red= $this->db->query("select id_user from user_red_temporal where id_user=".$id."");
		return $consultar_asignacion_red_a_red->result();
	}
	
	
	function ingresar_id_red_a_red($id){
		$red_a_red = array (
				"id_user" => $id,
				"id_red_temporal" =>"0",
				"id_red_a_red" => $_GET['id_red']
		);
		$this->db->insert ( "user_red_temporal", $red_a_red );
	}
	
	function actualizar_red_a_red($id){
	
		$datos = array (
				"id_user" => $id,
				"id_red_a_red" => $_GET['id_red']
		);
		$this->db->where('id_user', $id);
		$this->db->update('user_red_temporal', $datos);
	}
	
	
	}