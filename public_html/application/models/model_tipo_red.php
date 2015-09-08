<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_tipo_red extends CI_Model{

	function __construct() {
		parent::__construct();


	}
	
	
	function insertar($nombre, $descripcion, $frontal, $profundidad){
		$datos = array('id' => 0,
						'nombre' => $nombre,
						'descripcion' => $descripcion,
						'frontal' => $frontal,
						'profundidad' => $profundidad,
						'valor_punto' => 1
		);
		$this->db->insert("tipo_red",$datos);
		$id_red = mysql_insert_id();
		$datos = array('id_red' => $id_red,'id_afiliado' => 2,'debajo_de' => 1,'directo' => 1,'lado' => 0);
		$this->db->insert("afiliar",$datos);
		$datos = array('id_red' => $id_red,'id_usuario' => 2,'profundidad' => 0,'estatus' => 'ACT','premium' => 2);
		$this->db->insert("red",$datos);
	}

	function listarTodos()
	{
		$q=$this->db->query('select * from tipo_red group by id');
		return $q->result();
	}
	
	function RedesUsuario($id)
	{
		$q=$this->db->query('select tr.id, tr.nombre, tr.descripcion, tr.profundidad from tipo_red tr, afiliar a where tr.id = a.id_red and a.id_afiliado = '.$id." group by tr.id");
		return $q->result();
	}
	
	function traerRed($idRed)
	{
		$q=$this->db->query('select * from tipo_red where id = '.$idRed);
		return $q->result();
	}
	
	function traer_nombre_red($idRed)
	{
		$q=$this->db->query('select nombre from tipo_red where id = '.$idRed);
		return $q->result();
	}
	
	function ObtenerFrontales()
	{
		$q=$this->db->query('select frontal from tipo_red where id=1');
		return $q->result();
	}
	
	function ObtenerFrontalesRed($id)
	{
		$q=$this->db->query('select frontal from tipo_red where id='.$id);
		return $q->result();
	}
				
	function traerCapacidadRed()
	{
		$q = $this->db->query('select frontal,profundidad from tipo_red where id = 1');
		
		return $q->result();
	}
	
	function getCapacidadRed($id)
	{
		$q = $this->db->query('select frontal,profundidad from tipo_red where id = '.$id);
	
		return $q->result();
	}
	function actualizarCapacidadRed($id_red, $frontal, $profundidad){
		$datos = array(	'frontal' => $frontal,
						'profundidad' => $profundidad);
		
		$this->db->update('tipo_red', $datos, array('id' => $id_red));
	}
	
	function actualizar($id, $nombre, $descripcion, $profundidad, $frontal){
		$datos = array(
				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'frontal' => $frontal,
				'profundidad' => $profundidad);
		$this->db->update("tipo_red",$datos,"id = ".$id);
	}
	
	function CapacidadRed($id_red)
	{
		$q = $this->db->query('select id,frontal,profundidad from tipo_red where id = '.$id_red);
	
		return $q->result();
	}
}