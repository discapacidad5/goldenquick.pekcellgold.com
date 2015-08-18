<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_servicio extends CI_Model{

	function __construct() {
		parent::__construct();


	}

	function listarTodos()
	{
		$q=$this->db->query('select * from servicio');
		return $q->result();
	}
	
	function listar_todos_por_red()
	{
		$q=$this->db->query('select S.id, S.nombre,S.id_red,TP.nombre nombre_red from servicio S, tipo_red TP where S.id_red = TP.id order by (TP.id)');
		return $q->result();
	}
	
	function listar_todos_por_venta_y_fecha($inicio, $fin)
	{
		
		$q=$this->db->query('select S.id, S.nombre, S.id_red, TP.nombre nombre_red, CVM.cantidad, V.costo, V.impuesto, sum(C.valor) comision

							from servicio S, tipo_red TP, venta V, cross_venta_mercancia CVM, mercancia M, comision C
							
							where S.id_red = TP.id and S.id = M.sku and M.id = CVM.id_mercancia and CVM.id_venta = V.id_venta
							 and C.id_venta = V.id_venta and DATE(V.fecha) BETWEEN "'.$inicio.'" AND "'.$fin.'"
							
							group by (V.id_venta)
							
							order by (V.id_venta) ');
		return $q->result();
		
	}
	
	function listar_todos_por_venta()
	{
	
		$q=$this->db->query('select S.id, S.nombre, S.id_red, TP.nombre nombre_red, CVM.cantidad, V.costo, V.impuesto, sum(C.valor) comision
	
							from servicio S, tipo_red TP, venta V, cross_venta_mercancia CVM, mercancia M, comision C
				
							where S.id_red = TP.id and S.id = M.sku and M.id = CVM.id_mercancia and CVM.id_venta = V.id_venta
							 and C.id_venta = V.id_venta 
				
							group by (V.id_venta)
				
							order by (V.id_venta) ');
		return $q->result();
	
	}
	
}