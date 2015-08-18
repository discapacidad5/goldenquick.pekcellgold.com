<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_compras extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('ov/model_perfil_red');
	}
	
	function get_red($id)
	{
		$q=$this->db->query("SELECT id_red FROM red WHERE estatus like 'ACT' and id_usuario=".$id);
		return $q->result();
	}
	function reporte_afiliados($red)
	{
		$q=$this->db->query('SELECT a.id, a.username usuario, a.created creacion, b.nombre nombre, b.apellido apellido, b.fecha_nacimiento nacimiento, 
		c.descripcion sexo, d.descripcion edo_civil FROM users a, user_profiles b, cat_sexo c, cat_edo_civil d , afiliar e WHERE a.created>=NOW() - INTERVAL 1 WEEK 
		and a.id=b.user_id and b.id_sexo=c.id_sexo and b.id_edo_civil=d.id_edo_civil and b.id_tipo_usuario=2 and e.id_afiliado=a.id and e.id_red='.$red);
		return $q->result();
	}
	
	function traer_afiliados($id)
	{
		$q=$this->db->query('select A.id_afiliado, concat(UP.nombre," ",UP.apellido) nombre, U.email
from afiliar A, user_profiles UP, users U
where A.debajo_de = '.$id.' and A.id_afiliado = UP.user_id and A.id_afiliado = U.id group by(U.id)');
		return $q->result();
	}
	
	function traer_afiliados_estadisticas($id)
	{
		$q=$this->db->query('select UP.id_sexo, 
(YEAR(CURDATE())-YEAR(UP.fecha_nacimiento)) - (RIGHT(CURDATE(),5)<RIGHT(UP.fecha_nacimiento,5)) edad,
UP.id_edo_civil, UP.id_ocupacion, UP.id_tiempo_dedicado, U.id id_afiliado
from afiliar A, user_profiles UP, users U
where A.debajo_de = '.$id.' and A.id_afiliado = UP.user_id and A.id_afiliado = U.id');
		return $q->result();
	}
	
	function traer_telefonos($id)
	{
		$q=$this->db->query('select * from cross_tel_user where id_user='.$id);
		return $q->result();
	}
	
	function traer_fotos()
	{
		$q=$this->db->query('select CIU.id_user, CI.url from cross_img_user CIU, cat_img CI where CIU.id_img = CI.id_img');
		return $q->result();
	}
	
	function traer_compras($id, $inicio, $fin)
	{
		$q=$this->db->query("select sum(costo) compras from venta where id_user=".$id." and fecha between '".$inicio."' and '".$fin."' and id_estatus=2");
		return $q->result();
	}
	
	function traer_impuestos($id, $inicio, $fin)
	{
		$q=$this->db->query("select sum(impuesto) impuestos from venta where id_user=".$id." and fecha between '".$inicio."' and '".$fin."' and id_estatus=2");
		return $q->result();
	}
	
	function traer_mis_compras_productos($id, $inicio, $fin)
	{
		$q=$this->db->query("select TR.nombre red, P.nombre, M.costo costo_unitario, CVM.cantidad, V.costo, V.impuesto
	from venta V, cross_venta_mercancia CVM, mercancia M, producto P, tipo_red TR, cat_grupo_producto CGP
	where V.id_user = ".$id." and CVM.id_venta = V.id_venta and CVM.id_mercancia = M.id
	and V.fecha between '".$inicio."' and '".$fin."' and M.sku = P.id and M.id_tipo_mercancia = 1 and
	P.id_grupo = CGP.id_grupo and CGP.id_red = TR.id and V.id_estatus=2");
		return $q->result();
	}
	
	function traer_mis_compras_servicios($id, $inicio, $fin)
	{
		$q=$this->db->query("select TR.nombre red, S.nombre, M.costo costo_unitario, CVM.cantidad, V.costo, V.impuesto 
	from venta V, cross_venta_mercancia CVM, mercancia M, servicio S, tipo_red TR, cat_grupo_producto CGP
	where V.id_user = ".$id." and CVM.id_venta = V.id_venta and CVM.id_mercancia = M.id 
	and V.fecha between '".$inicio."' and '".$fin."' and M.sku = S.id and M.id_tipo_mercancia = 2 and 
	S.id_red = CGP.id_grupo and CGP.id_red = TR.id and V.id_estatus=2");
		return $q->result();
	}
	
	function traer_mis_compras_combinados($id, $inicio, $fin)
	{
		$q=$this->db->query("select TR.nombre red, C.nombre, M.costo costo_unitario, CVM.cantidad, V.costo, V.impuesto 
	from venta V, cross_venta_mercancia CVM, mercancia M, combinado C, tipo_red TR, cat_grupo_producto CGP
	where V.id_user = ".$id." and CVM.id_venta = V.id_venta and CVM.id_mercancia = M.id 
	and V.fecha between '".$inicio."' and '".$fin."' and M.sku = C.id and M.id_tipo_mercancia = 3 and
	C.id_red = CGP.id_grupo and CGP.id_red = TR.id and V.id_estatus=2");
		return $q->result();
	}
	
	function get_productos()
	{
		$q=$this->db->query('Select a.nombre, a.descripcion, b.id, b.costo, b.costo_publico, b.fecha_alta, d.descripcion grupo, d.id_grupo, a.nombre img from producto a, 
		mercancia b, cat_grupo_producto d where a.id=b.sku and d.id_grupo=a.id_grupo and b.id_tipo_mercancia=1 
		and b.estatus like "ACT" order by d.descripcion');
		return $q->result();
	}
	function get_productos_red($idRed, $pais)
	{
		$q=$this->db->query('Select a.nombre, a.descripcion, b.id , b.costo, b.costo_publico, b.fecha_alta, d.descripcion grupo, d.id_grupo, a.nombre img,d.id_red 
from producto a, mercancia b, cat_grupo_producto d
where a.id=b.sku and d.id_grupo  = a.id_grupo and b.id_tipo_mercancia= 1 and b.estatus like "ACT" and b.pais = "'.$pais.'" and a.id_grupo='.$idRed.' order by d.descripcion');
		return $q->result();
	}
	function get_grupo_prod()
	{
		$q=$this->db->query("SELECT id_grupo, descripcion from cat_grupo_producto");
		return $q->result();
	}
	function get_grupo_productos($id)
	{
		$q=$this->db->query('Select a.nombre, a.descripcion, b.id, b.costo, b.costo_publico, b.fecha_alta, d.descripcion grupo, d.id_grupo from producto a, 
		mercancia b, cat_grupo_producto d where a.id=b.sku and d.id_grupo=a.id_grupo and b.id_tipo_mercancia=1 
		and b.estatus like "ACT" and d.id_grupo='.$id.' order by d.descripcion');
		return $q->result();
	}
	function get_promocion_prod()
	{
		$q=$this->db->query('Select a.nombre producto, f.nombre, f.descripcion, b.id id_merc, f.id_promocion, f.costo prom_costo,b.costo, b.costo_publico, b.fecha_alta, 
		a.nombre img from producto a, mercancia b, promocion f where a.id=b.sku and b.id_tipo_mercancia=1 
		and f.id_mercancia=b.id and f.inicio<NOW() and f.fin>NOW() and b.estatus like "ACT" and f.estatus like "ACT"');
		return $q->result();
	}
	function get_promocion_serv()
	{
		$q=$this->db->query('Select a.nombre servicio,f.nombre, f.descripcion, b.id id_merc, f.id_promocion, f.costo prom_costo,b.costo, b.costo_publico, b.fecha_alta, 
		a.nombre img from servicio a, mercancia b, promocion f where a.id=b.sku and b.id_tipo_mercancia=2 
		and f.id_mercancia=b.id and f.inicio<NOW() and f.fin>NOW() and b.estatus like "ACT" and f.estatus like "ACT"');
		return $q->result();
	}
	function get_promocion_comb()
	{
		$q=$this->db->query('SELECT d.id, a.nombre combinado, a.descuento, d.costo, d.fecha_alta, h.nombre, 
		h.descripcion, h.id_promocion, h.costo prom_costo, a.nombre img from combinado a, mercancia d, cross_combinado e, 
		promocion h where a.id=e.id_combinado and d.sku=a.id and d.estatus="ACT" and a.estatus="ACT" 
		and h.estatus="ACT" and d.id_tipo_mercancia=3 and h.id_mercancia=d.id and h.inicio<NOW() and h.fin>NOW()');
		return $q->result();
	}
	function get_producto_espec($busqueda)
	{
		$q=$this->db->query('SELECT d.id, a.nombre, a.descripcion, b.tipo_producto, c.username, d.costo, e.comision, d.fecha_alta, f.ruta from producto a, users c, 
		cat_tipo_producto b, mercancia d, cat_proveedor e, archivo f where a.id=d.sku and d.id_tipo_mercancia=1 and d.id_proveedor=e.id and a.concepto=b.id 
		and d.estatus like "ACT" and e.id_usuario=c.id and a.img=f.id_archivo and (a.nombre like "'.$busqueda.'%" or a.nombre like "%'.$busqueda.'" 
		or a.nombre like "%'.$busqueda.'%")');
		return $q->result();
	}
	function get_servicios()
	{
		$q=$this->db->query('Select a.nombre, a.descripcion, b.id, b.costo, b.costo_publico, b.fecha_alta, a.nombre img from servicio a, mercancia b 
		where a.id=b.sku and b.id_tipo_mercancia=2 and b.estatus like "ACT"');
		return $q->result();
	}
	
	function get_servicios_red($idRed,$idPais)
	{
		$q=$this->db->query('Select a.nombre, a.descripcion, b.id, b.costo, b.costo_publico, b.fecha_alta, a.nombre img,a.id_red 
		from servicio a, mercancia b
		where a.id=b.sku and b.id_tipo_mercancia= 2 and b.estatus like "ACT" and a.id_red= '.$idRed.' and b.pais = "'.$idPais.'"');
		return $q->result();
	}
	function get_servicio_espec($busqueda)
	{
		$q=$this->db->query('SELECT d.id, a.nombre, a.descripcion, b.tipo_servicio, c.username, d.costo, e.comision, d.fecha_alta, f.ruta from servicio a, users c, 
		cat_tipo_servicio b, mercancia d, cat_proveedor e, archivo f where a.id=d.sku and d.id_tipo_mercancia=2 and d.id_proveedor=e.id and a.concepto=b.id 
		and d.estatus like "ACT" and e.id_usuario=c.id and a.img=f.id_archivo and (a.nombre like "'.$busqueda.'%" or a.nombre like "%'.$busqueda.'" 
		or a.nombre like "%'.$busqueda.'%")');
		return $q->result();
	}	
	function get_combinados()
	{
		$q=$this->db->query('SELECT d.id, a.nombre, a.descripcion, a.descuento, a.id id_combinado, d.costo, d.fecha_alta, a.nombre img from combinado a, mercancia d, cross_combinado 
		e where a.id=e.id_combinado and d.sku=a.id and d.estatus="ACT" and d.id_tipo_mercancia=3');
		return $q->result();
	}
	function get_combinados_red($idRed, $pais)
	{
		$q=$this->db->query('SELECT d.id, a.nombre, a.descripcion, a.descuento, a.id id_combinado, d.costo, d.costo_publico,d.fecha_alta, a.nombre img, a.id_red from combinado a, mercancia d, cross_combinado
		e where a.id=e.id_combinado and d.sku=a.id and d.estatus="ACT" and d.id_tipo_mercancia=3 and a.id_red='.$idRed.' and d.pais = "'.$pais.'" group by (d.id)');
		return $q->result();
	}
	function get_combinado_espec($busqueda)
	{
		$q=$this->db->query('SELECT e.id, a.nombre, b.descripcion d_prod, b.nombre n_prod, c.descripcion d_serv, c.nombre n_serv, d.username, e.costo, e.fecha_alta, 
		f.comision, g.ruta from combinado a, producto b, servicio c, users d, mercancia e, cat_proveedor f, archivo g where a.id=e.sku and e.id_tipo_mercancia=3 and 
		e.id_proveedor=f.id and f.id_usuario=d.id and a.id_servicio=c.id and a.id_producto=b.id and e.estatus like "ACT" and a.img=g.id_archivo and 
		(a.nombre like "'.$busqueda.'%" or a.nombre like "%'.$busqueda.'" or a.nombre like "%'.$busqueda.'%")');
		return $q->result();
	}
	function detalles_productos($i)
	{
		$q=$this->db->query('SELECT a.nombre, a.descripcion, a.peso, a.alto, a.ancho, a.profundidad, a.diametro, b.costo, b.costo_publico 
		FROM producto a, mercancia b WHERE a.id=b.sku and b.id='.$i);
		return $q->result();
	}
	
	function detalles_productos_red($i)
	{
		$q=$this->db->query('SELECT a.nombre,a.descripcion,b.costo_publico,b.costo,b.puntos_comisionables
		FROM producto a, mercancia b WHERE a.id=b.sku and b.id='.$i);
		return $q->result();
	}
	
	function detalles_servicios($i)
	{
		$q=$this->db->query('SELECT a.nombre, a.descripcion, a.fecha_inicio, a.fecha_fin, b.costo, b.costo_publico from servicio a, mercancia b where a.id=b.sku and b.id='.$i);
		return $q->result();
	}
	
	function detalles_servicios_red($i)
	{
		$q=$this->db->query('SELECT a.nombre,a.descripcion,b.costo_publico,b.costo,b.puntos_comisionables from servicio a, mercancia b where a.id=b.sku and b.id='.$i);
		return $q->result();
	}
	
	function comb_espec($i)
	{
		$q_sku=$this->db->query('SELECT sku FROM mercancia where id='.$i);
		$sku_res=$q_sku->result();
		$sku=$sku_res[0]->sku;
		$q=$this->db->query('SELECT * from combinado where id='.$sku);
		return $q->result();
	}
	function detalles_combinados($i)
	{
		$q_sku=$this->db->query('SELECT sku FROM mercancia where id='.$i);
		$sku_res=$q_sku->result();
		$sku=$sku_res[0]->sku;
		$q1=$this->db->query('SELECT * FROM cross_combinado where id_combinado='.$sku);
		$combinados=$q1->result();
		$combinado=array();
		$arr_el=array("merc"=> "","qty"=>"");
		$j=0;
		foreach($combinados as $comb)
		{
			if($comb->id_producto!=0)
			{
				$qp=$this->db->query('SELECT nombre FROM producto where id='.$comb->id_producto);
				$prod=$qp->result();
				$arr_el["merc"]=$prod[0]->nombre;
				$arr_el["qty"]=$comb->cantidad_producto;
				$combinado[$j]=$arr_el;
				$j++;
			}
			if($comb->id_servicio!=0)
			{
				$qp=$this->db->query('SELECT nombre FROM servicio where id='.$comb->id_servicio);
				$serv=$qp->result();
				$arr_el["merc"]=$serv[0]->nombre;
				$arr_el["qty"]=$comb->cantidad_servicio;
				$combinado[$j]=$arr_el;
				$j++;
			}
		}
		return $combinado;
	}

	function costo_merc($id)
	{
		$q=$this->db->query('Select costo, costo_publico from mercancia where id='.$id);
		return $q->result();	
	}
	function detalles_prom_prod($i)
	{
		$q=$this->db->query('Select a.nombre producto, a.peso, a.alto, a.ancho, a.profundidad, a.diametro, f.nombre, f.descripcion, f.costo prom_costo, 
		b.costo, b.id, f.id_promocion from producto a, mercancia b, promocion f where a.id=b.sku and f.id_mercancia=b.id and f.id_promocion='.$i);
		return $q->result();
	}
	function detalles_prom_serv($i)
	{
		$q=$this->db->query('Select a.nombre servicio, a.fecha_inicio, a.fecha_fin, f.nombre, f.descripcion, f.costo prom_costo,b.costo, b.id, f.id_promocion
		from servicio a, mercancia b, promocion f where a.id=b.sku and f.id_mercancia=b.id and f.id_promocion='.$i);
		return $q->result();
	}
	function detalles_prom_comb($i)
	{
		$q=$this->db->query('Select a.nombre combinado, b.nombre servicio, c.nombre producto, d.nombre, d.descripcion, f.id, d.id_promocion, f.costo, d.costo prom_costo 
		from combinado a, servicio b, producto c, promocion d, cross_combinado e, mercancia f where a.id=e.id_combinado and b.id=e.id_servicio and c.id=e.id_producto 
		and f.sku=a.id and d.id_mercancia=f.id and d.id_promocion='.$i);
		return $q->result();
		
	}
	function prom_espec($i)
	{
		$q=$this->db->query('SELECT a.*, b.nombre promo, b.descripcion promo_des from combinado a, promocion b, mercancia c 
		where a.id=b.sku and c.id_mercancia=b.id and c.id_promocion='.$i);
		return $q->result();
	}
	function get_distribuidores($i)
	{
		$q=$this->db->query('SELECT a.id, a.costo, a.comision, a.impuesto, b.username from cat_distribuidor a, users b, mercancia c, cross_merc_dist e where e.id_mercancia=c.id 
		and e.id_distribuidor=a.id and b.id=a.id_usuario and c.id='.$i);
		return $q->result();
	}
	function get_imagenes($i)
	{
		$q=$this->db->query('Select a.url from cat_img a, mercancia b, cross_merc_img c where a.id_img=c.id_cat_imagen and b.id=c.id_mercancia and b.id='.$i);
		return $q->result();
	}
	
	function get_img($i)
	{
		$q=$this->db->query('Select a.url from cat_img a, mercancia b, cross_merc_img c where a.id_img=c.id_cat_imagen and b.id=c.id_mercancia and b.id='.$i.' limit 1');
		return $q->result();
	}
	
	function get_img_prom($i)
	{
		$q=$this->db->query('SELECT a.url FROM cat_img a, promocion b, cross_img_promo c WHERE c.id_promo=b.id_promocion and a.id_img=c.id_img 
		and b.id_promocion='.$i.' limit 1');
		return $q->result();
	}
	function get_limite_prod($i)
	{
		$q=$this->db->query("select a.min_venta, a.max_venta from producto a, mercancia b where a.id=b.sku and b.id=".$i);
		return $q->result();
	}
	function get_costo($i)
	{
		$q=$this->db->query('SELECT costo from cat_distribuidor where id='.$i);
		return $q->result();
	}
	function get_comision($i)
	{
		$q=$this->db->query('SELECT a.id_usuario from compras_reportes where id='.$i);
	}



	function get_estatus($id)
	{
		$q=$this->db->query('SELECT * from billetera where id_user='.$id);
		return $q->result();
	}
	function crea_pswd($id)
	{
		$pswd=strlen($_POST['password']).strrev($_POST['password']);
		$pswd=md5($pswd).$pswd;
		$pswd=md5(strrev($pswd));
		$this->db->query('update billetera set pswd="'.$pswd.'", estatus="ACT" where id_user='.$id);
	}
	function get_afiliados($id)
	{
		/*$q=$this->db->query("select *,(select nombre from user_profiles where user_id=id_afiliado) afiliado,
		(select apellido from user_profiles where user_id=id_afiliado) afiliado_p from afiliar where id_afiliador=".$id);
		return $q->result();*/
		$q=$this->db->query("select *,(select nombre from user_profiles where user_id=id_afiliado) afiliado,
			(select apellido from user_profiles where user_id=id_afiliado) afiliado_p
			,(select nombre from user_profiles where user_id=debajo_de) debajo_de_n,
			(select apellido from user_profiles where user_id=debajo_de) debajo_de_p 
			from afiliar where id_red=".$id);
		return $q->result();
	}
	function get_compras_usr($start,$end,$usr)
	{
		$q=$this->db->query("select a.id_venta, a.costo, a.fecha, b.descripcion, c.username from venta a, cat_estatus b, users c where a.id_user=".$usr." and a.id_user=c.id 
		and a.id_estatus=b.id_estatus and a.fecha>'".$start."' and a.fecha<'".$end."' order by a.fecha ASC");
		return $q->result();
	}
	function get_compras($start,$end,$id_red)
	{
		$q=$this->db->query("select a.id_venta, a.costo, a.fecha, b.descripcion, c.username from venta a, cat_estatus b, users c , afiliar d where a.id_user=c.id 
		and a.id_estatus=b.id_estatus and a.fecha>'".$start."' and a.fecha<'".$end."' and c.id=d.id_afiliado and d.id_red=".$id_red." order by a.fecha ASC ");
		return $q->result();
	}
    function estadistica_sex($i)
    {
        $q=$this->db->query("SELECT id_sexo, COUNT( id_sexo ) 
        FROM user_profiles
        GROUP BY id_sexo");
	}
   	function get_puntos_comisionables($id)
   	{
   		$q=$this->db->query("select puntos_comisionables from mercancia where id=".$id);
		return $q->result();
   	}
	function insert_comision($venta,$puntos)
	{
		$q=$this->db->query("insert into comision values (".$venta.",".$puntos.")");
	}
	function get_cantidad_almacen($id)
	{
		$q=$this->db->query("SELECT a.cantidad FROM inventario a, almacen b WHERE a.id_almacen=b.id_almacen and b.web=1 and a.id_mercancia=".$id);
		return $q->result();
	}
	function update_inventario($id,$qty)
	{
		$inventario_q=$this->db->query("SELECT a.id_inventario, a.cantidad FROM inventario a, almacen b WHERE a.id_mercancia=".$id." and a.id_almacen=b.id_almacen and b.web=1");
		$inventario_res=$inventario_q->result();
		$id_inventario=$inventario_res[0]->id_inventario;
		$actual=($inventario_res[0]->cantidad)*1;
		$restantes=$actual-$qty;
		$this->db->query("update inventario set cantidad=".$restantes." where id_inventario=".$id_inventario);
	}
	function new_movimiento($id,$qty)
	{
		$inventario_q=$this->db->query("SELECT a.id_inventario, a.cantidad FROM inventario a, almacen b WHERE a.id_mercancia=".$id." and a.id_almacen=b.id_almacen and b.web=1");
		$inventario_res=$inventario_q->result();
		$id_inventario=$inventario_res[0]->id_inventario;
	}
	function get_impuestos_merca($id)
	{
		$q=$this->db->query("Select id_impuesto from cross_merc_impuesto where id_mercancia=".$id);
		$res_imp=$q->result();
		$impuestos=Array();
		$i=0;
		foreach($res_imp as $imp)
		{
			$q2=$this->db->query("Select porcentaje from cat_impuesto where id_impuesto=".$imp->id_impuesto);
			$res2=$q2->result();
			$impuestos[$i]=$res2[0]->porcentaje;
			$i++;
		}
		return $impuestos;
	}
	function salida_por_venta($id,$qty,$user,$venta)
	{
		$q=$this->db->query("SELECT costo from mercancia where id=".$id);
		$res_q=$q->result();
		$costo=$res_q[0]->costo;
		$importe=$costo;
		$total=$costo;
		$subtotal=$costo*$qty;
		$q=$this->db->query("Select id_impuesto from cross_merc_impuesto where id_mercancia=".$id);
		$res_imp=$q->result();
		foreach($res_imp as $imp)
		{
			$q2=$this->db->query("Select porcentaje from cat_impuesto where id_impuesto=".$imp->id_impuesto);
			$res2=$q2->result();
			$impuestos[$i]=$res2[0]->porcentaje;
			$i++;
		}
		foreach($impuestos as $desc)
		{
			$mas=($desc*$costo)/100;
			$total=$total+$mas;
		}
		$q_alm=$this->db->query("SELECT id_almacen from almacen where web=1");
		$alm_res=$q_alm->result();
		$origen=$alm_res[0]->id_almacen;
		$q_user=$this->db->query("SELECT username from users where id=".$user);
		$user_res=$q_user->result();
		$usuario=$user_res[0]->username;
		$clave="VENTA".$user.$usuario;
		$dato_mov=array(
			"id_tipo"		=> 2,
			"entrada"		=> 0,
			"keyword"		=> $clave,
			"origen"		=> $origen,
			"destino"		=> $usuario,
			"id_mercancia"	=> $id,
			"cantidad"		=> $qty,
			"id_impuesto"	=> 1,
			"subtotal"		=> $subtotal,
			"importe"		=> $importe,
			"total"			=> $total,
			"id_estatus"	=> 1
		);
		$this->db->insert("movimiento",$dato_mov);
		$insert_mov=mysql_insert_id();
		$dato_surtido=array(
			"id_almacen_origen"	=> $origen,
			"id_movimiento"		=> $insert_mov,
			"estatus"			=> 1,
			"id_venta"			=> $venta
		);
		$this->db->insert("surtido",$dato_surtido);
	}
	function get_pais()
	{
		/*7= español 3=inglés*/
		$q=$this->db->query("select Code, Name, Code2 from Country ");
		return $q->result();
	}
	
	function BancosPagoUsuario($id){
		$q = $this->db->query("select pais from cross_dir_user where id_user=".$id);
		$pais = $q->result();
		$pais = $pais[0]->pais;
		$q = $this->db->query("select * from cat_banco where id_pais='".$pais."' and estatus = 'ACT'");
		$bancos = $q->result();
		return $bancos;
	}
	
	function BancosPagoComprador($id){
		$q = $this->db->query("select id_pais from comprador where dni=".$id);
		$pais = $q->result();
		$pais = $pais[0]->id_pais;
		$q = $this->db->query("select * from cat_banco where id_pais='".$pais."' and estatus = 'ACT'");
		$bancos = $q->result();
		return $bancos;
	}
	
	function get_direccion_comprador($id)
	{
		$q=$this->db->query("SELECT a.*,b.nombre, b.apellido, b.keyword, c.email FROM cross_dir_user a, user_profiles b, users c 
		WHERE c.id=a.id_user and c.id=b.user_id and c.id=".$id);
		return $q->result();
	}
	
	function get_telefonos_comprador($id){
		$q = $this->db->query("SELECT numero FROM cross_tel_user where estatus = 'ACT' and id_user = ".$id." limit 1;");
		$telfonos = $q->result();
		
		return $telfonos[0]->numero;
	}
	
	function hacer_compra()
	{
		if(!isset($_GET["usr"]))
		{
			$id_user=$this->tank_auth->get_user_id();
		}
		else
		{
			$id_user=$_GET["usr"];
		}
		$dato_venta=array(
			"id_user" 			=> $id_user,
			"id_estatus"		=> 3,
			"costo" 			=> $this->cart->total(),
			"id_metodo_pago" 	=> $_POST["pago"]
		);
		$this->db->insert("venta",$dato_venta);
		$venta = mysql_insert_id();
		if($_GET["tipo"]==3)
		{
			$this->db->query("insert into autocompra (fecha,id_usuario) values ('".$_POST['startdate']."',".$id_user.")");
		}

		$dato_envio=array(
			"id_venta"	=> $venta,
			"nombre" 	=> $_POST["nombre_envio"],
			"apellido" 	=> $_POST["apellido_envio"],
			"cp" 		=> $_POST["cp_envio"],
			"id_pais" 	=> $_POST["pais_envio"],
			"estado" 	=> $_POST["estado_envio"],
			"municipio"	=> $_POST["municipio_envio"],
			"colonia" 	=> $_POST["colonia_envio"],
			"calle" 	=> $_POST["calle_envio"],
			"correo" 	=> $_POST["correo_envio"],
			"compania" 	=> $_POST["compania_envio"],
			"celular" 	=> $_POST["celular_envio"],
			"info_ad"	=> $_POST["info_envio"]
		);
		
		$this->db->insert("cross_venta_envio",$dato_envio);
		
		$dato_fact=array(
			"id_venta"	=> $venta,
			"nombre" 	=> $_POST["nombre_fac"],
			"apellido" 	=> $_POST["apellido_fac"],
			"rfc"		=> $_POST["rfc_fac"],
			"cp" 		=> $_POST["cp_fac"],
			"id_pais" 	=> $_POST["pais_fac"],
			"estado" 	=> $_POST["estado_fac"],
			"municipio"	=> $_POST["municipio_fac"],
			"colonia" 	=> $_POST["colonia_fac"],
			"calle" 	=> $_POST["calle_fac"],
			"correo" 	=> $_POST["correo_fac"],
			"compania" 	=> $_POST["compania_fac"],
			"celular" 	=> $_POST["celular_fac"]
		);
		$this->db->insert("cross_venta_factura",$dato_fact);
		$puntos=0;
		foreach($this->cart->contents() as $items)
		{
			$dato_cross_venta=array(
				"id_mercancia" 	=> $items['id'],
				"id_venta"		=> $venta,
				"cantidad"		=> $items['qty'],
				"id_promocion"	=> $items['options']['prom_id']
			);
			$this->db->insert("cross_venta_mercancia",$dato_cross_venta);
			$puntos_q=$this->db->query("select puntos_comisionables from mercancia where id=".$items['id']);
			$puntos_res=$puntos_q->result();
			$puntos=$puntos+($puntos_res[0]->puntos_comisionables*$items['qty']);
			$inventario_q=$this->db->query("SELECT a.id_inventario, a.cantidad FROM inventario a, almacen b 
			WHERE a.id_mercancia=".$items['id']." and a.id_almacen=b.id_almacen and b.web=1");
			$inventario_res=$inventario_q->result();
			$id_inventario=$inventario_res[0]->id_inventario;
			$actual=($inventario_res[0]->cantidad)*1;
			$restantes=$actual-$items['qty'];
			$this->db->query("update inventario set cantidad=".$restantes." where id_inventario=".$id_inventario);
			$q=$this->db->query("SELECT costo from mercancia where id=".$items['id']);
			$res_q=$q->result();
			$costo=$res_q[0]->costo;
			$importe=$costo;
			$total=$costo;
			$subtotal=$costo*$items['qty'];
			$q=$this->db->query("Select id_impuesto from cross_merc_impuesto where id_mercancia=".$items['id']);
			$res_imp=$q->result();
			$i=0;
			foreach($res_imp as $imp)
			{
				$q2=$this->db->query("Select porcentaje from cat_impuesto where id_impuesto=".$imp->id_impuesto);
				$res2=$q2->result();
				$impuestos[$i]=$res2[0]->porcentaje;
				$i++;
			}
			foreach($impuestos as $desc)
			{
				$mas=($desc*$costo)/100;
				$total=$total+$mas;
			}
			$q_alm=$this->db->query("SELECT id_almacen from almacen where web=1");
			$alm_res=$q_alm->result();
			$origen=$alm_res[0]->id_almacen;
			$q_user=$this->db->query("SELECT username from users where id=".$id_user);
			$user_res=$q_user->result();
			$usuario=$user_res[0]->username;
			$clave="VENTA".$id_user.$usuario;
			$dato_mov=array(
				"id_tipo"		=> 2,
				"entrada"		=> 0,
				"keyword"		=> $clave,
				"origen"		=> $origen,
				"destino"		=> $usuario,
				"id_mercancia"	=> $items['id'],
				"cantidad"		=> $items['qty'],
				"id_impuesto"	=> 1,
				"subtotal"		=> $subtotal,
				"importe"		=> $importe,
				"total"			=> $total,
				"id_estatus"	=> 1
			);
		
			$this->db->insert("movimiento",$dato_mov);
			$insert_mov=mysql_insert_id();
			$dato_surtido=array(
				"id_almacen_origen"	=> $origen,
				"id_movimiento"		=> $insert_mov,
				"estatus"			=> 1,
				"id_venta"			=> $venta
			);
			$this->db->insert("surtido",$dato_surtido);
		}
		$dato_comision=array(
			"id_venta"	=> $venta,
			"puntos"	=> $puntos
		);
		$this->db->insert("comision",$dato_comision);
		switch($_POST["pago"])
		{
			case "5":
				break;
			case "1":
				$fecha=$_POST['ano_taj_c']."-".$_POST['mes_taj_c']."-10";
				$fecha=date("Y-m-t", strtotime($fecha));
				if(isset($_POST["salvar_taj_c"]))
				{
					$status="ACT";
				}
				else 
				{
					$status="DES";
				}
				
				$dato_taj=array(
					"tipo_tarjeta"		=> $_POST["pago"],
					"id_usuario"		=> $id_user,
					"id_banco"			=> $_POST["banco_taj_c"],
					"cuenta"			=> $_POST["numero_taj_c"],
					"fecha_vencimiento"	=> $fecha,
					"titular"			=> $_POST["titular_taj_c"],
					"codigo_seguridad"	=> $_POST["code_taj_c"],
					"estatus"			=> $status
				);
				$this->db->insert("tarjeta",$dato_taj);
				break;
			case "2":
				$fecha=$_POST['ano_taj']."-".$_POST['mes_taj']."-10";
				$fecha=date("Y-m-t", strtotime($fecha));
				if(isset($_POST["salvar_taj"]))
				{
					$status="ACT";
				}
				else 
				{
					$status="DES";
				}
				
				$dato_taj=array(
					"tipo_tarjeta"		=> $_POST["pago"],
					"id_usuario"		=> $id_user,
					"id_banco"			=> $_POST["banco_taj"],
					"cuenta"			=> $_POST["numero_taj"],
					"fecha_vencimiento"	=> $fecha,
					"titular"			=> $_POST["titular_taj"],
					"codigo_seguridad"	=> $_POST["code_taj"],
					"estatus"			=> $status
				);
				$this->db->insert("tarjeta",$dato_taj);
				break;
			case "3":
				break;
		}
		$this->cart->destroy();
		
	}
	
	function CostoMercancia($id){
		
		$mercancia = $this->db->query("select costo from mercancia where id=".$id);
		$mercancia = $mercancia->result();
		return $mercancia[0]->costo;
	}
	
	function CostoPublicoMercancia($id){
	
		$mercancia = $this->db->query("select costo_publico from mercancia where id=".$id);
		$mercancia = $mercancia->result();
		return $mercancia[0]->costo_publico;
	}
	
	function ImpuestoMercancia($id_mercancia, $costo){
		$total = 0;
		
		$q = $this->db->query("Select ci.porcentaje from cat_impuesto ci, cross_merc_impuesto cmi where ci.id_impuesto = cmi.id_impuesto and cmi.id_mercancia = ".$id_mercancia);
		$impuestos = $q->result();
		
		foreach($impuestos as $desc)
		{
			$mas = ($desc->porcentaje*$costo)/100;
			$total=$total+$mas;
		}
		return $total;
	}
	
	function registrar_venta($id_usuario, $costo, $id_metodo, $transacion, $firma, $fecha, $impuesto)
	{
		
		$dato_venta=array(
				"id_user" 			=> $id_usuario,
				"id_estatus"		=> 2,
				"costo" 			=> $costo,
				"impuesto"			=> $impuesto,
				"id_metodo_pago" 	=> $id_metodo,
				"id_transacion"     => $transacion,
				"firma"				=> $firma,
				"fecha" 			=> $fecha
		);
		$this->db->insert("venta",$dato_venta);
		$venta = mysql_insert_id();
		return $venta;
	}
	
	function registrar_envio($venta, $id_usuario, $direccion , $telefono, $correo){
		$usuario =$this->model_perfil_red->datos_perfil($id_usuario);
		$edad    =$this->model_perfil_red->edad($id_usuario);
		$dir    =$this->model_perfil_red->dir($id_usuario);
		
		$dato_envio = array(
				"id_venta"	=> $venta,
				"nombre" 	=> $usuario[0]->nombre,
				"apellido" 	=> $usuario[0]->apellido,
				"cp" 		=> $dir[0]->cp,
				"id_pais" 	=> $dir[0]->pais,
				"estado" 	=> $dir[0]->estado,
				"municipio"	=> $dir[0]->municipio,
				"colonia" 	=> $dir[0]->colonia,
				"calle" 	=> $dir[0]->calle,
				"correo" 	=> $correo,
				"compania" 	=> "null",
				"celular" 	=> $telefono,
				"info_ad"	=> ""
		);
		
		$this->db->insert("cross_venta_envio",$dato_envio);
		
		return mysql_error();
	}
	
	function registrar_factura($venta, $id_usuario, $direccion , $telefono, $correo){
		
		$usuario =$this->model_perfil_red->datos_perfil($id_usuario);
		$edad    =$this->model_perfil_red->edad($id_usuario);
		$dir    =$this->model_perfil_red->dir($id_usuario);
	
		$dato_fact=array(
				"id_venta"	=> $venta,
				"nombre" 	=> $usuario[0]->nombre,
				"apellido" 	=> $usuario[0]->apellido,
				"rfc"		=> $usuario[0]->user_id.time(),
				"cp" 		=> $dir[0]->cp,
				"id_pais" 	=> $dir[0]->pais,
				"estado" 	=> $dir[0]->estado,
				"municipio"	=> $dir[0]->municipio,
				"colonia" 	=> $dir[0]->colonia,
				"calle" 	=> $dir[0]->calle,
				"correo" 	=> $correo,
				"compania" 	=> "",
				"celular" 	=> $telefono
		);
		$this->db->insert("cross_venta_factura",$dato_fact);
		
	}
	
	function registrar_venta_mercancia($id_mercancia, $venta, $cantidad){
		$dato_cross_venta=array(
				"id_mercancia" 	=> $id_mercancia,
				"id_venta"		=> $venta,
				"cantidad"		=> $cantidad,
				"id_promocion"	=> 0
		);
		$this->db->insert("cross_venta_mercancia",$dato_cross_venta);
		$puntos_q =$this->db->query("select mercancia.costo from mercancia where id= ".$id_mercancia);
		$puntos_res = $puntos_q->result();
		$puntos= ($puntos_res[0]->costo*$cantidad);
		return $puntos;
	}
	
	function insertar_comision_web_personal($id_afiliado, $id_venta, $id_comprador, $valor){
		$dato_cross_venta=array(
				"id_afiliado" 	=> $id_afiliado,
				"id_venta"		=> $id_venta,
				"id_comprador"		=> $id_comprador,
				"valor"	=> $valor
		);
		$this->db->insert("comision_web_personal",$dato_cross_venta);
	}
	
	function registrar_ventaConsignacion($id_usuario, $costo , $id_transacion, $firma, $fecha, $impuesto){
		$dato_venta=array(
				"id_user" 			=> $id_usuario,
				"id_estatus"		=> 3,
				"costo" 			=> $costo,
				"impuesto"			=> $impuesto,
				"id_metodo_pago" 	=> 11,
				"id_transacion"     => $id_transacion,
				"firma"				=> $firma,
				"fecha" 			=> $fecha
		);
		$this->db->insert("venta",$dato_venta);
		$venta = mysql_insert_id();
		return $venta;
	}
	
	function registrar_cross_comprador_ventaConsignacion($id_comprador, $id_venta , $id_afiliado){
		$dato_venta=array(
				"id_comprador" 			=> $id_comprador,
				"id_venta"		=> $id_venta,
				"id_afiliado" 			=> $id_afiliado,
				"estado"			=> "Pendiente"
		);
		$this->db->insert("cross_comprador_venta",$dato_venta);
	}
	
	function registrar_impuestos($id_mercancia){
		$q = $this->db->query("SELECT costo from mercancia where id=".$id_mercancia);
		$mercancia=$q->result();
		$costo = $mercancia[0]->costo;
		
		$total = 0;
		$q = $this->db->query("Select ci.porcentaje from cat_impuesto ci, cross_merc_impuesto cmi where ci.id_impuesto = cmi.id_impuesto and cmi.id_mercancia = ".$id_mercancia);
		$impuestos = $q->result();
		$i=0;
		
		foreach($impuestos as $desc)
		{
			$mas=($desc->porcentaje*$costo)/100;
			$total=$total+$mas;
		}
		return $total;
	}
	
	function registrar_movimiento($id_usuario, $id_mercancia, $cantidad, $subtotal, $total, $venta, $puntos)
	{
		
		$q_alm=$this->db->query("SELECT id_almacen from almacen where web=1");
		$alm_res = $q_alm->result();
		$origen = $alm_res[0]->id_almacen;
		$q_user = $this->db->query("SELECT username from users where id=".$id_usuario);
		$user_res = $q_user->result();
		$usuario = $user_res[0]->username;
		$clave="VENTA".$id_usuario.$usuario;
		$dato_mov=array(
						"id_tipo"		=> 2,
						"entrada"		=> 0,
						"keyword"		=> $clave,
						"origen"		=> $origen,
						"destino"		=> $usuario,
						"id_mercancia"	=> $id_mercancia,
						"cantidad"		=> $cantidad,
						"id_impuesto"	=> 1,
						"subtotal"		=> $subtotal,
						"importe"		=> $total,
						"total"			=> $total,
						"id_estatus"	=> 1
				);
				
				$this->db->insert("movimiento",$dato_mov);
				$insert_mov = mysql_insert_id();
				
				$dato_surtido=array(
						"id_almacen_origen"	=> $origen,
						"id_movimiento"		=> $insert_mov,
						"estatus"			=> 1,
						"id_venta"			=> $venta
				);
				$this->db->insert("surtido",$dato_surtido);
	}
	
	function ObtenerCategoriaMercancia($id_mercancia){
		$q = $this->db->query("select id_tipo_mercancia, sku from mercancia where id =".$id_mercancia);
		$mercancia = $q->result();
		if($mercancia[0]->id_tipo_mercancia == 1){
			$q = $this->db->query("SELECT id_grupo as id_red FROM producto where id =".$mercancia[0]->sku);
		}elseif ($mercancia[0]->id_tipo_mercancia == 2){
			$q = $this->db->query("SELECT id_red FROM servicio where id=".$mercancia[0]->sku);
		}else{
			$q = $this->db->query("SELECT id_red FROM combinado where id=".$mercancia[0]->sku);
		}
		$red = $q->result();
		return $red[0]->id_red; 
	}
	
	function Red($id){
		$q = $this->db->query("SELECT * FROM tipo_red where id=".$id);	
		return $q->result();
	}
	
	function CalcularComisionVenta($venta,$afiliado,$puntos,$valor_puntos, $id_red_mercancia){
		$datos = array(
				'id_venta' => $venta,
				'id_afiliado' => $afiliado,
				'puntos' => $puntos,
				'valor' => $valor_puntos,
				'id_red' => $id_red_mercancia
		);
		$this->db->insert('comision', $datos);
	}
	
	function ValorComision($id_grupo){
		$q = $this->db->query("SELECT * FROM valor_comisiones where id_grupo =".$id_grupo);
		return $q->result();
	}
	
	function RegsitrarPagoBanco($id_usuario, $id_banco, $id_venta, $valor){
		$datos = array(
				'id_usuario' => $id_usuario,
				'id_banco'	=> $id_banco,
				'id_venta' 	=> $id_venta,
				'valor'		=> $valor,
				'estatus'	=> 3
		);
		$this->db->insert('cuenta_pagar_banco_historial', $datos);
		
		$q = $this->db->query("SELECT * FROM cat_banco where id_banco =".$id_banco);
		return $q->result();
	}
	
	function RegsitrarVentaWebPersonal($id_afiliado, $id_comprador, $id_venta){
		$datos = array(
				'id_comprador' => $id_comprador,
				'id_afiliado'	=> $id_afiliado,
				'id_venta' 	=> $id_venta,
				'estado'	=> 'Pendiente'
		);
		
		$this->db->insert('cross_comprador_venta', $datos);
		
	}
	function actualizarVenta($id_venta,$id_estatus,$metodo_pago, $id_transaccion ,$firma ){
		$datos = array(
				'id_estatus'	=> $id_estatus,
				'id_metodo_pago' 	=> $metodo_pago,
				'firma'	=> $firma,
				'id_transacion'=> $id_transaccion
		);
		
		$this->db->update('venta', $datos, array('id_venta' => $id_venta));
	}
	function actualizarcrossCompradorVenta($id_venta,$estado){
		$datos = array(
				'estado'	=> $estado
		);
		
		$this->db->update('cross_comprador_venta', $datos, array( 'id_venta ' => $id_venta) );
	}
	function ConsultarIdRedMercancia($id_categoria_mercancia){
		$q = $this->db->query("select id_red from cat_grupo_producto where id_grupo = ".$id_categoria_mercancia);
		$red = $q->result();
		return $red[0]->id_red;
	}
	
	function consultarMercancia($id_venta){
		$q = $this->db->query("select M.id, M.costo, M.costo_publico, CCV.id_comprador, CVM.cantidad
from cross_venta_mercancia CVM, mercancia M, cross_comprador_venta CCV where CVM.id_venta = ".$id_venta." 
and CVM.id_mercancia=M.id and CCV.id_venta=CVM.id_venta;");
		$mercancia = $q->result();
		return $mercancia;
	}
}