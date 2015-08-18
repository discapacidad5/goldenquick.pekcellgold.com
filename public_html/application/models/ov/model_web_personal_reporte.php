<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_web_personal_reporte extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	
	}
	
	function consultar_ventas_web_personal($id,$inicio,$fin){
		$venta_web_p=$this->db->query(" Select v.id_venta ,v.id_comprador,v.fecha ,
										c.nombre,c.apellido,c.email,c.telefono,v.estado,
										mr.sku ,mr.id_tipo_mercancia ,cv.cantidad ,vt.costo
										from  cross_comprador_venta v ,
										comprador c ,  
										users u , 
										venta vt ,
										cross_venta_mercancia vm,
										mercancia mr,
										cross_venta_mercancia cv
										where v.id_comprador=c.dni     
										and u.id = v.id_afiliado 
										and v.id_venta=vt.id_venta
										and vm.id_mercancia=mr.id 
										and vm.id_venta=v.id_venta
										and cv.id_venta=vt.id_venta
										and v.fecha  between '".$inicio."' and '".$fin."'
										and (v.estado='Pago' or v.estado='Embarcado') and u.id=".$id);
		return $venta_web_p->result();
	}
	function consultar_ventas_web_personal_listar($id){
		$venta_web_p=$this->db->query(" Select v.id_venta ,v.id_comprador,v.fecha ,
										c.nombre,c.apellido,c.email,c.telefono,v.estado,
										mr.sku ,mr.id_tipo_mercancia ,cv.cantidad ,vt.costo
										from  cross_comprador_venta v ,
										comprador c ,
										users u ,
										venta vt ,
										cross_venta_mercancia vm,
										mercancia mr,
										cross_venta_mercancia cv
										where v.id_comprador=c.dni
										and u.id = v.id_afiliado
										and v.id_venta=vt.id_venta
										and vm.id_mercancia=mr.id
										and vm.id_venta=v.id_venta
										and cv.id_venta=vt.id_venta						
										and (v.estado='Pago' or v.estado='Embarcado') and u.id=".$id);
		return $venta_web_p->result();
	}
	function tipo_de_producto($tabla,$id_tabla){
		$tipo_producto=$this->db->query("SELECT nombre FROM ".$tabla." where id=".$id_tabla);
		return $tipo_producto->result();
	}
	function Actualizar_estado_a_envio($id){
	
		$this->db->where('id_venta', $id);
		$this->db->update('cross_comprador_venta',array("estado" => "Embarcado"));
	}
	
}

?>