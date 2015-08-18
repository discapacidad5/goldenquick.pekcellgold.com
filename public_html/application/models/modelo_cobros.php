<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modelo_cobros extends CI_Model{

	function __construct() {
		parent::__construct();


	}

	function listarTodos($fecha_inicio, $fecha_final){
		$cobros = $this->db->query('select c.id_cobro, CONCAT( c.id_user,". ",up.nombre," ", up.apellido) usuario, cm.descripcion metodo_pago, cs.descripcion estado, c.monto, c.fecha, c.fecha_pago ,c.cuenta, c.banco, c.titular, c. clabe
from cobro c, user_profiles up, cat_metodo_cobro cm, cat_estatus cs
where c.id_user = up.user_id and c.id_metodo = cm.id_metodo and c.id_estatus = cs.id_estatus and c.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_final.'"');
		return $cobros->result();
	}
	
	function añosCobros(){
		$q = $this->db->query("select YEAR(fecha) as año from cobro group by año");
		return $q->result();
	}
	
	function ConsultarCobrosFecha($fecha_inicio, $fecha_final){
		$cobros = $this->db->query('select c.id_cobro, CONCAT( c.id_user,". ",up.nombre," ", up.apellido) usuario, cm.descripcion metodo_pago, cs.descripcion estado, c.monto, c.fecha, c.cuenta, c.banco, c.titular, c. clabe
from cobro c, user_profiles up, cat_metodo_cobro cm, cat_estatus cs
where c.id_user = up.user_id and c.id_metodo = cm.id_metodo and c.id_estatus = cs.id_estatus and c.id_estatus = 3 and c.fecha BETWEEN "'.$fecha_inicio.' 00:00:00" AND "'.$fecha_final.' 23:59:59"');
		return $cobros->result();
	}
	
	function CambiarEstadoCobro($id_cobro){
		$fecha = date("Y-m-d");
		
		$this->db->query("update cobro set id_estatus = '2', fecha_pago = '".$fecha."' where id_cobro = ".$id_cobro);
		
		$q = $this->db->query("select u.username, up.nombre, up.apellido, u.email,  c.id_cobro, c.banco, c.cuenta, c.titular, c.clabe, c.monto, c.fecha 
							from cobro c, user_profiles up, users u
							where c.id_user = u.id and up.user_id = u.id and c.id_cobro = ".$id_cobro);
		return $q->result();
	}
	
	function ConsultarCobrosPendientes(){
		$cobros = $this->db->query('select c.id_cobro, CONCAT( c.id_user,". ",up.nombre," ", up.apellido) usuario, cm.descripcion metodo_pago, cs.descripcion estado, c.monto, c.fecha, c.cuenta, c.banco, c.titular, c. clabe
from cobro c, user_profiles up, cat_metodo_cobro cm, cat_estatus cs
where c.id_user = up.user_id and c.id_metodo = cm.id_metodo and c.id_estatus = cs.id_estatus and c.id_estatus = 3');
		return $cobros->result();
	}
	
	function listarCobrosPagos($fecha_inicio, $fecha_final){
		$cobros = $this->db->query('select c.id_cobro, CONCAT( c.id_user,". ",up.nombre," ", up.apellido) usuario, cm.descripcion metodo_pago, cs.descripcion estado, c.monto, c.fecha, c.fecha_pago ,c.cuenta, c.banco, c.titular, c. clabe
									from cobro c, user_profiles up, cat_metodo_cobro cm, cat_estatus cs
									where c.id_user = up.user_id and c.id_metodo = cm.id_metodo and c.id_estatus = cs.id_estatus and cs.id_estatus = 2 and c.fecha BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_final.'"');
		return $cobros->result();
	}
	
	
}