<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_comisiones extends CI_Model
{
	function get_venta()
	{
		$q=$this->db->query("select * from venta where fecha between '".$_POST['from']." 00:00:00' and '".$_POST['to']." 23:59:59'");
		return $q->result();
	}
	function get_venta2()
	{
		$q=$this->db->query("select DISTINCT * from venta where fecha between '".$_POST['from']." 00:00:00' and '".$_POST['to']." 23:59:59'");
		return $q->result();
	}
	function get_redes($id)
	{
		$q=$this->db->query("select id_red from red where id_usuario=".$id);
		return $q->result();
	}
	function get_comisiones($id)
	{
		$q=$this->db->query("select * from comision where id_venta=".$id);
		return $q->result();
	}
	function get_id_venta($id)
	{
		$q=$this->db->query("select id_venta from venta where id_user=".$id);
		return $q->result();
	}
	function get_nombre($id)
	{
		$q=$this->db->query("select nombre, apellido from user_profiles where user_id=".$id);
		return $q->result();
	}
	function get_rango()
	{
		$q=$this->db->query("select id_rango, (select descripcion from cat_rango A where A.id_rango=B.id_rango) rango from cross_rango_user B");
		return $q->result();
	}
	function get_id_user()
	{
		$q=$this->db->query("select DISTINCT id_user from venta where fecha between '".$_POST['from']." 00:00:00' and '".$_POST['to']." 23:59:59'");
		return $q->result();
	}
	function get_afiliados($id)
	{
		$debajo_de=$this->db->query("select id_red from red where id_usuario=".$id);
		$debajo_de=$debajo_de->result();
		$q=$this->db->query("select *,(select nombre from user_profiles where user_id=id_afiliado) afiliado,
			(select apellido from user_profiles where user_id=id_afiliado) afiliado_p, 
			(select nombre from user_profiles where user_id=debajo_de) debajo_de_n, 
			(select apellido from user_profiles where user_id=debajo_de) debajo_de_p, 
			(select (select url from cat_img b where a.id_img=b.id_img) url from cross_img_user a where id_user = id_afiliado) img, 
			(select id_estatus from user_profiles where user_id=id_afiliado) activo, 
			(select paquete from user_profiles where user_id=id_afiliado) paquete 
			from afiliar where id_red=".$debajo_de[0]->id_red." and (select count(id_user) from venta where id_afiliado=id_user)>0 order by lado");
		return $q->result();
	}
}