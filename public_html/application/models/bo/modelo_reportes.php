<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_reportes extends CI_Model
{
	function reporte_afiliados($inicio,$fin)
	{
		$q=$this->db->query('SELECT a.id, a.username usuario, b.nombre nombre, b.apellido apellido,a.email 
							 FROM users a, user_profiles b where(a.id=b.user_id) and b.id_tipo_usuario=2  
							 and DATE(a.created) BETWEEN "'.$inicio.'" AND "'.$fin.'"');
		return $q->result();
	}
	function reporte_afiliados_mes()
	{
		$q=$this->db->query('SELECT a.id, a.username usuario, b.nombre nombre, b.apellido apellido,a.email 
FROM users a, user_profiles b WHERE a.created>=NOW() - INTERVAL 1 MONTH and a.id=b.user_id and b.id_tipo_usuario=2');
		return $q->result();
	}
	function proveedores_prod()
	{
		$q=$this->db->query('SELECT b.nombre emp, c.abreviatura, c.descripcion reg, d.descripcion zona, f.nombre merc, g.descripcion imp, a.razon_social, a.curp, a.rfc, 
		a.condicion_pago, a.promedio_entrega, a.plazo_pago, a.plazo_suspencion, a.interes_moratorio, a.dia_corte, a.dia_pago FROM proveedor a, empresa b, 
		cat_regimen c, cat_zona d, mercancia e, producto f, cat_impuesto g WHERE a.id_empresa=b.id_empresa and a.id_regimen=c.id_regimen and a.id_zona=d.id_zona 
		and e.id=a.mercancia and e.id_tipo_mercancia=1 and e.sku=f.id and a.id_impuesto=g.id_impuesto and a.estatus like "ACT"');
		return $q->result();
	}
	function proveedores_serv()
	{
		$q=$this->db->query('SELECT b.nombre emp, c.abreviatura, c.descripcion reg, d.descripcion zona, f.nombre merc, g.descripcion imp, a.razon_social, a.curp, a.rfc, 
		a.condicion_pago, a.promedio_entrega, a.plazo_pago, a.plazo_suspencion, a.interes_moratorio, a.dia_corte, a.dia_pago FROM proveedor a, empresa b, 
		cat_regimen c, cat_zona d, mercancia e, servicio f, cat_impuesto g WHERE a.id_empresa=b.id_empresa and a.id_regimen=c.id_regimen and a.id_zona=d.id_zona 
		and e.id=a.mercancia and e.id_tipo_mercancia=1 and e.sku=f.id and a.id_impuesto=g.id_impuesto and a.estatus like "ACT"');
		return $q->result();
	}
	function proveedores_comb()
	{
		$q=$this->db->query('SELECT b.nombre emp, c.abreviatura, c.descripcion reg, d.descripcion zona, f.nombre merc, g.descripcion imp, a.razon_social, a.curp, a.rfc, 
		a.condicion_pago, a.promedio_entrega, a.plazo_pago, a.plazo_suspencion, a.interes_moratorio, a.dia_corte, a.dia_pago FROM proveedor a, empresa b, 
		cat_regimen c, cat_zona d, mercancia e, combinado f, cat_impuesto g WHERE a.id_empresa=b.id_empresa and a.id_regimen=c.id_regimen and a.id_zona=d.id_zona 
		and e.id=a.mercancia and e.id_tipo_mercancia=3 and e.sku=f.id and a.id_impuesto=g.id_impuesto and a.estatus like "ACT"');
		return $q->result();
	}
	function reporte_usuarios()
	{
		$q=$this->db->query('
		Select U.id, U.username, 
		U.email, 
		CS.descripcion sexo, 
		CEC.descripcion estado_civil, 
		TU.descripcion tipo_usuario, 
		CE.descripcion estudio, 
		CO.descripcion ocupacion, 
		CTD.descripcion tiempo_dedicado, 
		CUF.descripcion fiscal, 
		UP.nombre, 
		UP.apellido, 
		UP.rfc, 
		CEF.descripcion, 
		UP.fecha_nacimiento, 
		(select (YEAR(CURDATE())-YEAR(fecha_nacimiento)) - (RIGHT(CURDATE(),5)<RIGHT(fecha_nacimiento,5)) edad from user_profiles where user_id=U.id) edad, 
		UP.ultima_sesion, 
		CC.cuenta, 
		CC.banco, 
		(select url from cat_img CIMG where CIMG.id_img=(select CUI.id_img from cross_img_user CUI where CUI.id_user=U.id)) url, 
		CC.estatus
		from users U 
		left join user_profiles UP on UP.user_id=U.id  
		left join cat_sexo CS on UP.id_sexo=CS.id_sexo 
		left join cat_edo_civil CEC on CEC.id_edo_civil=UP.id_edo_civil 
		left join cat_tipo_usuario TU on TU.id_tipo_usuario=UP.id_tipo_usuario 
		left join cat_estudios CE on CE.id_estudio=UP.id_estudio 
		left join cat_ocupacion CO on CO.id_ocupacion=UP.id_ocupacion 
		left join cat_tiempo_dedicado CTD on CTD.id_tiempo_dedicado=UP.id_tiempo_dedicado 
		left join cat_usuario_fiscal CUF on CUF.id=UP.id_fiscal 
		left join cat_estatus_afiliado CEF on CEF.id_estatus=UP.id_estatus 
		left join cat_cuenta CC on CC.id_user=U.id');
		return $q->result();
	}
}