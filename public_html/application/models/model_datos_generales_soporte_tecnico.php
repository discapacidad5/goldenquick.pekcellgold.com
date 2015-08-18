<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_datos_generales_soporte_tecnico extends CI_Model{

	function __construct() {
		parent::__construct();


	}

	function listar()
	{
		$q=$this->db->query('select * from datos_generales_soporte_tecnico');
		return $q->result();
	}
	
	function traer_por_red($id_red)
	{
		$q=$this->db->query('select * from datos_generales_soporte_tecnico where id_red='.$id_red);
		return $q->result();
	}
	
	function actualizar($skype, $pekey, $pinkost, $id_red){
		$datos = array(
				'skype' => $skype,
				'pekey' => $pekey,
				'pinkost' => $pinkost);
		$this->db->where("id_red",$id_red);
		$this->db->update("datos_generales_soporte_tecnico",$datos);
	}
	
	function insertar($skype, $pekey, $pinkost, $id_red){
		$datos = array(
				'skype' => $skype,
				'pekey' => $pekey,
				'pinkost' => $pinkost,
				'id_red' => $id_red
		);
		$this->db->insert("datos_generales_soporte_tecnico",$datos);
	}
	
}