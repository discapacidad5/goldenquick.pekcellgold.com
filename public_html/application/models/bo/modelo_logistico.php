<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_logistico extends CI_Model
{
	function get_impuestos()
	{
		$q=$this->db->query("select * from cat_impuesto where estatus like 'ACT'");
		return $q->result();
	}
	function get_mercancias()
	{
		$q=$this->db->query("select * from mercancia where estatus like 'ACT'");
		return $q->result();
	}
	function get_almacen()
	{
		$q=$this->db->query("select * from almacen where estatus like 'ACT'");
		return $q->result();
	}
	function get_tipo_mov($i)
	{
		$q=$this->db->query("select * from cat_movimiento where estatus like 'ACT' and id_tipo_movimiento=".$i);
		return $q->result();
	}
	function insert_movimiento_in()
	{
		$destino_q=$this->db->query("select nombre from almacen where id_almacen=".$_POST["destino_in"]);
		$destino_res=$destino_q->result();
		$destino=$destino_res[0]->nombre;
		$dato_mov=array(
			"id_tipo"		=> $_POST["tipo_movimiento_in"],
			"entrada"		=> 1,
			"keyword"		=> $_POST["clave_in"],
			"origen"		=> $_POST["origen_in"],
			"destino"		=> $destino,
			"id_mercancia"	=> $_POST["mercancia_in"],
			"cantidad"		=> $_POST["cantidad_in"],
			"id_impuesto"	=> $_POST["impuesto_in"],
			"subtotal"		=> $_POST["subtotal_in"],
			"importe"		=> $_POST["importe_in"],
			"total"			=> $_POST["total_in"],
			"id_estatus"	=> 1
		);
		$this->db->insert("movimiento",$dato_mov);
		
		$inventario_q=$this->db->query("Select * from inventario where id_mercancia=".$_POST['mercancia_in']." and id_almacen=".$_POST['destino_in']);
		$inventario_res=$inventario_q->result();
		if(isset($inventario_res[0]->id_inventario))
		{
			$actual=$inventario_res[0]->cantidad*1;
			$mas=$_POST["cantidad_in"]*1;
			$cantidad=$actual+$mas;
			$this->db->query("update inventario set cantidad=".$cantidad." where id_inventario=".$inventario_res[0]->id_inventario);
		}
		else
		{
			$dato_inventario=array(
				"id_mercancia"	=> $_POST["mercancia_in"],
				"id_almacen"	=> $_POST["destino_in"],
				"cantidad"		=> $_POST["cantidad_in"],
				"bloqueados"	=> 0,
				"estatus"		=> "ACT"
			);
			$this->db->insert("inventario",$dato_inventario);
		}
	}
	function insert_movimiento_out()
	{
		$origen_q=$this->db->query("select nombre from almacen where id_almacen=".$_POST["origen_out"]);
		$origen_res=$origen_q->result();
		$origen=$origen_res[0]->nombre;
		$dato_mov=array(
			"id_tipo"		=> $_POST["tipo_movimiento_out"],
			"entrada"		=> 0,
			"keyword"		=> $_POST["clave_out"],
			"origen"		=> $origen,
			"destino"		=> $_POST["destino_out"],
			"id_mercancia"	=> $_POST["mercancia_out"],
			"cantidad"		=> $_POST["cantidad_out"],
			"id_impuesto"	=> $_POST["impuesto_out"],
			"subtotal"		=> $_POST["subtotal_out"],
			"importe"		=> $_POST["importe_out"],
			"total"			=> $_POST["total_out"],
			"id_estatus"	=> 2
		);
		$this->db->insert("movimiento",$dato_mov);
		$mov=mysql_insert_id();
		$dato_surtido=array(
			"id_almacen_origen"	=> $_POST["origen_out"],
			"id_movimiento"		=> $mov,
			"estatus"			=> 1,
			"id_venta"			=> 0
		);
		$this->db->insert("surtido",$dato_surtido);
		$inventario_q=$this->db->query("Select * from inventario where id_mercancia=".$_POST['mercancia_out']." and id_almacen=".$_POST['origen_out']);
		$inventario_res=$inventario_q->result();
		if(isset($inventario_res[0]->id_inventario))
		{
			$actual=$inventario_res[0]->cantidad*1;
			$mas=$_POST["cantidad_out"]*1;
			$cantidad=$actual-$mas;
			$this->db->query("update inventario set cantidad=".$cantidad." where id_inventario=".$inventario_res[0]->id_inventario);
		}
	}
	function get_costo_real($id)
	{
		$q=$this->db->query("SELECT a.real FROM mercancia a WHERE id=".$id);
		return $q->result();
	}
	function get_impuesto_espec($id)
	{
		$q=$this->db->query("select porcentaje from cat_impuesto where id_impuesto=".$id);
		return $q->result();
	}
	function get_movimientos($i)
	{
		$q=$this->db->query("SELECT a.id_movimiento, a.keyword, a.origen, a.destino, a.fecha, c.descripcion estatus, b.descripcion tipo FROM movimiento a, cat_movimiento b, 
		cat_estatus_movimiento c WHERE a.id_tipo=b.id_movimiento and entrada=".$i." and a.id_estatus=c.id_estatus order by fecha DESC");
		return $q->result();
	}
	function get_detalle_movimiento($id)
	{
		$q=$this->db->query("SELECT a.id_movimiento, a.origen, a.destino, a.keyword, a.cantidad, a.subtotal, a.importe, a.total, a.fecha, 
		b.descripcion tipo, c.descripcion impuesto, c.porcentaje, d.descripcion estatus, e.sku_2 FROM movimiento a, cat_movimiento b, cat_impuesto c, 
		cat_estatus_movimiento d, mercancia e WHERE a.id_tipo=b.id_movimiento and a.id_impuesto=c.id_impuesto and a.id_estatus=d.id_estatus 
		and a.id_mercancia=e.id and a.id_movimiento=".$id);
		return $q->result();
	}
	function ver_existentes($merca,$almacen,$qty)
	{
		$inventario_q=$this->db->query("Select * from inventario where id_mercancia=".$merca." and id_almacen=".$almacen);
		$inventario_res=$inventario_q->result();
		if(isset($inventario_res[0]->id_inventario))
		{
			if($inventario_res[0]->cantidad<$qty)
			{
				$mensaje="La cantidad de salida es mayor que la existene en almacen";
			}
			else
			{
				$mensaje="El movimiento se ha hecho con exito";
			}
		}
		else
		{
			$mensaje="Esta mercancia aun no tiene existencias en almacen";
		}
		return $mensaje;	
	}
	function get_surtidos()
	{
		$q=$this->db->query("SELECT s.*, m.keyword, a.nombre as origen,m.destino,  e.descripcion estatus_e, m.id_mercancia, m.cantidad, cve.correo
FROM surtido s, movimiento m, cat_estatus_surtido e, cross_venta_envio cve, almacen a, venta v
WHERE s.id_movimiento = m.id_movimiento and s.estatus=e.id_estatus and cve.id_venta = s.id_venta and a.id_almacen = m.origen and v.id_venta = cve.id_venta and v.id_estatus = 2 and s.estatus<>2");
		
		return $q->result();
	}
	
	function ObtenerMercancia($id_mercancia){
		$q = $this->db->query("select id_tipo_mercancia, sku from mercancia where id =".$id_mercancia);
		$mercancia = $q->result();
		if($mercancia[0]->id_tipo_mercancia == 1){
			$q = $this->db->query("SELECT * FROM producto where id =".$mercancia[0]->sku);
		}elseif ($mercancia[0]->id_tipo_mercancia == 2){
			$q = $this->db->query("SELECT * FROM servicio where id=".$mercancia[0]->sku);
		}else{
			$q = $this->db->query("SELECT * FROM combinado where id=".$mercancia[0]->sku);
		}
		$mercancia = $q->result();
		return $mercancia;
	}
	
	function surtir()
	{
		if($_POST["venta"]==0||$_POST["unico"]==1)
		{
			$dato_embarque=array(
				"fecha_entrega"	=> $_POST["fecha"],
				"id_estatus"	=> 1
			);
			$this->db->insert("embarque",$dato_embarque);
			$embarque=mysql_insert_id();
			$dato_cross=array(
				"id_surtido"	=> $_POST["surtido"],
				"id_embarque"	=> $embarque
			);
			$this->db->insert("cross_surtido_embarque",$dato_cross);
			$this->db->query("update surtido set estatus=2 where id_surtido=".$_POST["surtido"]);
		}
		else
		{
			$dato_embarque=array(
				"fecha_entrega"	=> $_POST["fecha"],
				"id_estatus"	=> 1
			);
			$this->db->insert("embarque",$dato_embarque);
			$embarque=mysql_insert_id();
			$surtidos_q=$this->db->query("SELECT * from surtido where id_venta=".$_POST["venta"]." and estatus<>2");
			$surtidos=$surtidos_q->result();
			foreach($surtidos as $surtido)
			{
				$dato_cross=array(
					"id_surtido"	=> $surtido->id_surtido,
					"id_embarque"	=> $embarque
				);
				$this->db->insert("cross_surtido_embarque",$dato_cross);
			}
			$this->db->query("update surtido set estatus=2 where id_venta=".$_POST["venta"]);
		}
	}

	function get_embarque()
	{
		$q=$this->db->query("SELECT * from embarque where id_estatus=1");
		$embarques=$q->result();
		$embarques_array=array();
		$dato=0;
		foreach($embarques as $embarque)
		{
			$q2=$this->db->query("SELECT a.*, b.keyword, b.destino, c.descripcion tipo, d.nombre origen, e.descripcion estatus_e, f.id_embarque,f.fecha_entrega, 
			h.descripcion estado_e, b.id_mercancia, b.cantidad, cve.correo
FROM surtido a, movimiento b, cat_movimiento c, almacen d, cat_estatus_surtido e, embarque f, cross_surtido_embarque g, cross_venta_envio cve,
			cat_estatus_embarque h WHERE a.id_movimiento=b.id_movimiento and a.id_almacen_origen=d.id_almacen and f.id_embarque=g.id_embarque and a.id_surtido=g.id_surtido 
			and b.id_tipo=c.id_movimiento and a.estatus=e.id_estatus and h.id_estatus=f.id_estatus and cve.id_venta = a.id_venta and f.id_embarque=".$embarque->id_embarque." limit 1");
			$dato_embarque=$q2->result();
			$embarques_array[$dato]=$dato_embarque[0];
			$dato++;
		} 
		return $embarques_array;
	} 
	function get_embarcados()
	{
		$q=$this->db->query("SELECT * from embarque where id_estatus=2");
		$embarques=$q->result();
		$embarques_array=array();
		$dato=0;
		foreach($embarques as $embarque)
		{
			$q2=$this->db->query("SELECT a.*, b.keyword, b.destino, c.descripcion tipo, d.nombre origen, e.descripcion estatus_e, f.id_embarque,f.fecha_entrega, 
			h.descripcion estado_e, b.id_mercancia, b.cantidad, cve.correo
			FROM surtido a, movimiento b, cat_movimiento c, almacen d, cat_estatus_surtido e, embarque f, cross_surtido_embarque g, cross_venta_envio cve,
			cat_estatus_embarque h WHERE a.id_movimiento=b.id_movimiento and a.id_almacen_origen=d.id_almacen and f.id_embarque=g.id_embarque and a.id_surtido=g.id_surtido 
			and b.id_tipo=c.id_movimiento and a.estatus=e.id_estatus and h.id_estatus=f.id_estatus and cve.id_venta = a.id_venta and f.id_embarque=".$embarque->id_embarque." limit 1");
			$dato_embarque=$q2->result();
			if(isset($dato_embarque[0]->id_embarque)){
				$embarques_array[$dato]=$dato_embarque[0];
			}
			$dato++;
		}
		return $embarques_array;
	} 
	function embarcar()
	{
		$this->db->query("UPDATE embarque set id_estatus=2 where id_embarque=".$_POST["id"]);
	}
	function existe_almacen_web()
	{
		$q=$this->db->query("SELECT * from almacen where web=1");
		$res=$q->result();
		if(isset($res[0]))
		{
			$existe=1;
		}
		else
		{
			$existe=0;
		}
		return $existe;
	}
	function new_almacen()
	{
		if($_POST["activo"]==1)
		{
			$estatus="ACT";
		}
		else 
		{
			$estatus="DES";
		}
		$dato_almacen=array(
			"nombre"	=> $_POST["nombre"],
			"descripcion"	=> $_POST["descripcion"],
			"web"			=> $_POST["web"],
			"estatus"		=> $estatus
		);
		$this->db->insert("almacen",$dato_almacen);			
	}
	function get_almacenes()
	{
		$q=$this->db->query("select * from almacen");
		return $q->result();
	}
	function estatus_almacen()
	{
		if($_POST["estatus"]==1)
		{
			$estatus="DES";
		}
		else 
		{
			$estatus="ACT";
		}
		$this->db->query("UPDATE almacen set estatus='".$estatus."' where id_almacen=".$_POST["id"]);
	}
	function eliminar_almacen()
	{
		$this->db->query("DELETE FROM almacen where id_almacen=".$_POST["id"]);
	}
	function editar_almacen()
	{
		$this->db->query("UPDATE almacen set nombre='".$_POST['nombre']."', descripcion='".$_POST['descripcion']."', web=".$_POST['web']." where id_almacen=".$_POST["id"]);
	}
	function get_almacen_especifico($id)
	{
		$q=$this->db->query("select * from almacen where id_almacen=".$id);
		return $q->result();
	}
	function get_files($id)
	{
		$q=$this->db->query(' SELECT * from archivero_cedi where id_user='.$id);
		return $q->result();
	}
	function del_file_multiple()
	{
		foreach ($_post["archivo"] as $file) 
		{
			$this->db->query('delete form archivero_cedi where id_archivero='.$file);
		}
	}
	function del_file()
	{
		$this->db->query('delete from archivero_cedi where id_archivero='.$_POST["id_archivero_cedi"]);
	}
	function get_mercancia_almacen($id)
	{
		$q=$this->db->query('SELECT a.*, b.id_inventario, c.id, c.sku_2 from almacen a, inventario b, mercancia c 
		where a.id_almacen=b.id_almacen and b.id_mercancia=c.id and a.id_almacen='.$id);
		return $q->result();
	}
	function get_existencia($id)
	{
		$q=$this->db->query('SELECT * from inventario where id_inventario='.$id);
		$res=$q->result();
		$existencia=$res[0]->cantidad;
		return $existencia;
	}
	function bloquear_mercancia($id,$cantidad)
	{
		$this->db->query("UPDATE inventario set bloqueados=".$cantidad." where id_inventario=".$id);
	}
	function file_user($id,$data)
	{
		$explode=explode(".",$data["file_name"]);
		$nombre=$explode[0];
		$extencion=$explode[1];
		$dato_file=array(
				"id_user"			=>	$id,
				"nombre"			=>	$nombre,
				"extension"			=>	$extencion,
				"nombre_completo"	=>	$data["file_name"],
                "url"				=>	"/media/".$id."/".$data["file_name"],
                "tamano"			=>	$data["file_size"]
            );
		$this->db->insert("archivero_cedi",$dato_file);
	}
	function reporte_usuarios_sio($inicio,$fin)
	{
		$q=$this->db->query("SELECT a.id, a.username usuario, a.created creacion, b.nombre nombre, b.apellido apellido, b.fecha_nacimiento nacimiento, 
		c.descripcion sexo, d.descripcion edo_civil, e.descripcion estudio, f.descripcion ocupacion, g.descripcion tiempo, h.descripcion estatus 
		FROM users a, user_profiles b, cat_sexo c, cat_edo_civil d , cat_estudios e, cat_ocupacion f, cat_tiempo_dedicado g, cat_estatus_afiliado h 
		WHERE a.id=b.user_id and b.id_sexo=c.id_sexo and b.id_edo_civil=d.id_edo_civil and b.id_estudio=e.id_estudio and b.id_ocupacion=f.id_ocupacion 
		and b.id_tiempo_dedicado=g.id_tiempo_dedicado and b.id_estatus=h.id_estatus and b.id_tipo_usuario=1 and a.created>='".$inicio."' and a.created<='".$fin."'");
		return $q->result();
	}
	function reporte_almacenes($inicio,$fin)
	{
		$q=$this->db->query("SELECT * FROM almacen WHERE creacion>='".$inicio."' and creacion<='".$fin."'");
		return $q->result();
	}
	function reporte_proveedores()
	{
		$q=$this->db->query('SELECT a.*, b.nombre, c.descripcion regimen, d.descripcion zona, e.descripcion impuesto 
		FROM proveedor a, empresa b, cat_regimen c, cat_zona d, cat_impuesto e WHERE a.id_empresa=b.id_empresa 
		and a.id_regimen=c.id_regimen and a.id_zona=d.id_zona and a.id_impuesto=e.id_impuesto');
		return $q->result();
	}
	function reporte_ventas_empresa($inicio,$fin)
	{
		$q=$this->db->query("SELECT count(a.id_venta) total_ventas, sum(c.costo) costo_total, e.id_empresa, e.nombre empresa 
		FROM venta a, cross_venta_mercancia b, mercancia c, proveedor d, empresa e WHERE a.id_venta=b.id_venta and b.id_mercancia=c.id 
		and c.id_proveedor=d.id_proveedor and d.id_empresa=e.id_empresa and a.fecha>='".$inicio."' and a.fecha<='".$fin."' group by e.id_empresa");
		return $q->result();
	}
}