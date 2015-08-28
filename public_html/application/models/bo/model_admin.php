<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_admin extends CI_Model
{
	function get_regimen()
	{
		$q=$this->db->query("select * from cat_regimen");
		return $q->result();
	}
	function get_paquete()
	{
		$q=$this->db->query("select * from paquete_inscripcion");
		return $q->result();
	}
	function detalle_paquete($id)
	{
		$q=$this->db->query("select *, (select descripcion from cat_tipo_paquete A where A.id_paquete=B.id_paquete) tipo from paquete_inscripcion B where id_paquete=".$id);
		return $q->result();
	}
	function get_tipo_paquete()
	{
		$q=$this->db->query("select * from cat_tipo_paquete");
		return $q->result();
	}
	function get_paquete_mercancia($id)
	{
		$q=$this->db->query("select * from cross_pack_merc");
		return $q->result();
	}
	function get_banco()
	{
		$_POST['cuenta'];
		$q=$this->db->query("select * from cat_banco where clave='".$clave."'");
		return $q->result();
	}
	function get_zona()
	{
		$q=$this->db->query("select * from cat_zona");
		return $q->result();
	}
	function get_empresa()
	{
		$q=$this->db->query("select * from empresa");
		return $q->result();
	}
	function get_tipo_mercancia()
	{
		$q=$this->db->query("select * from cat_tipo_mercancia");
		return $q->result();
	}
	function mercancia_by_id()
	{
		$q=$this->db->query("select * from mercancia where id=".$_POST['id']);
		return $q->result();
	}
	function get_data_mercancia($tipo,$sku)
	{
		if($tipo==1)
			/*$q=$this->db->query("select P.*, TR.nombre nombre_red from producto P, tipo_red TR, cat_grupo_producto 
					CGP where P.id=".$sku." and 
					CGP.id_grupo = P.id_grupo and CGP.id_red = TR.id");*/
			$q=$this->db->query("select P.*, CGP.descripcion descripcion_red from producto P, cat_grupo_producto
		CGP where P.id=".$sku." and
		CGP.id_grupo = P.id_grupo");
		
		
		if($tipo==2)
			$q=$this->db->query("select * from servicio where id=".$sku);
		if($tipo==3)
			$q=$this->db->query("select * from combinado where id=".$sku);

		return $q->result();
	}
	function get_img_merc()
	{
		$imgs=array();
		$q=$this->db->query("select * from cross_merc_img where id_mercancia=".$_POST['id']);
		$q=$q->result();
		foreach ($q as $key)
		{
			$q2=$this->db->query("select url from cat_img where id_img=".$key->id_cat_imagen);
			$imgs[]=$q2->result();
		}
		return $imgs;
	}
	function get_tipo_proveedor()
	{
		$q=$this->db->query("select * from cat_tipo_proveedor where estatus ='ACT'");
		return $q->result();
	}
	
	function ver_si_merc_ha_sido_vendida($id)
	{
		$datos = $this->db->query('select * from cross_venta_mercancia where id_mercancia = '.$id);
	
		return $datos->result();
	}
	
	function ver_si_red_tiene_categorias($id)
	{
		$datos = $this->db->query('select * from cat_grupo_producto where id_red ='.$id);
	
		return $datos->result();
	}
	
	function traer_foto($id){
		$datos = $this->db->query('select CI.url url, M.id_tipo_mercancia id_tipo_mercancia, CI.id_img id_img, M.sku sku
								from cat_img CI, cross_merc_img CMI, mercancia M
								where CI.id_img = CMI.id_cat_imagen and CMI.id_mercancia = M.id and M.id = '.$id);
		return $datos->result();
	}
	function del_merc($id)
	{
		$datos = $this->db->query('select CI.url url, M.id_tipo_mercancia id_tipo_mercancia, CI.id_img id_img, M.sku sku
								from cat_img CI, cross_merc_img CMI, mercancia M
								where CI.id_img = CMI.id_cat_imagen and CMI.id_mercancia = M.id and M.id = '.$id);
		
		$q=$this->db->query('delete from mercancia where id = '.$id);
		
		return $datos->result();
	}
	
	function del_tipo_merc($id_tipo_mercancia, $sku){
		
		  switch ($id_tipo_mercancia){
			 case 1:	//producto
			 $this->db->query("delete from producto where id = '".$sku."'");
			 break;
			 case 2:	//servicio
			 $this->db->query("delete from servicio where id = '".$sku."'");
			 break;
			 case 3:	//combinado
			 $this->db->query("delete from combinado where id = '".$sku."'");
			 $this->db->query("delete from cross_combinado where id_combinado = '".$sku."'");
			 break;
		  }
	}
	
	function del_imagen($id_img){
		$this->db->query("delete from cat_img where id_img = ".$id_img);
	}
	
	function del_cross_imagen_merc($id_img){
		$this->db->query("delete from cross_merc_img where id_cat_imagen = ".$id_img);
		$this->db->query("delete from cat_img where id_img = ".$id_img);
	}	

	function traer_id_imagen_merc($id_merc){
		$q=$this->db->query("select * from cross_merc_img where id_mercancia = ".$id_merc);
		return $q->result();
	}

	function get_proveedor()
	{
		/*$q=$this->db->query("select id_usuario, comision, (select nombre from user_profiles where user_id=id_usuario) nombre, 
			(select apellido from user_profiles where user_id=id_usuario) apellido
		 from cat_proveedor");*/
		
		$q=$this->db->query("select UP.user_id, UP.nombre, UP.apellido
		from user_profiles UP where UP.id_tipo_usuario = 3");
		
		
		return $q->result();
	}
	
	function get_proveedor2($id)
	{
		/*$q=$this->db->query("select id_usuario, comision, (select nombre from user_profiles where user_id=id_usuario) nombre,
		 (select apellido from user_profiles where user_id=id_usuario) apellido
		 from cat_proveedor");*/
	
		if($id == 3){
			$q=$this->db->query("select p.id_proveedor as user_id, pd.nombre, pd.apellido from proveedor p, proveedor_datos pd where p.id_proveedor = pd.id_proveedor");
				
		}else{
			$q=$this->db->query("select p.id_proveedor as user_id, pd.nombre, pd.apellido from proveedor p, proveedor_datos pd where p.id_proveedor = pd.id_proveedor and mercancia = ".$id);
	
		}
		return $q->result();
	}

	function get_servicio()
	{
		$q=$this->db->query("Select a.nombre,a.id, b.id id_mercancia from servicio a, mercancia b where a.id=b.sku 
			and b.id_tipo_mercancia=2");
		return $q->result();
	}
	function get_producto()
	{
		$q=$this->db->query("Select a.nombre,a.id, b.id id_mercancia from producto a, mercancia b where a.id=b.sku 
			and b.id_tipo_mercancia=1");
		return $q->result();
	}
	function get_combinado()
	{
		$q=$this->db->query("Select a.nombre, b.id id_mercancia from combinado a, mercancia b where a.id=b.sku 
			and b.id_tipo_mercancia=3 and b.estatus like 'ACT'");
		return $q->result();
	}
	function estado_mercancia()
	{
		if($_POST['tipo']==1)
		$this->db->query('update mercancia set estatus="ACT" where id='.$_POST['id']);
		else
		$this->db->query('update mercancia set estatus="DES" where id='.$_POST['id']);
	}
	function get_promo()
	{
		$q=$this->db->query("select * from cat_promo");
		return $q->result();
	}
	function get_grupo()
	{
		$q=$this->db->query("select * from cat_grupo_producto");
		return $q->result();
	}
	function get_red()
	{
		$q=$this->db->query("select * from tipo_red");
		return $q->result();
	}
	function get_mercancia()
	{
		$q=$this->db->query("select *, (select descripcion from cat_tipo_mercancia A where A.id=M.id_tipo_mercancia) tipo_mercancia from mercancia M");
		return $q->result();
	}
	function get_mercancia_espec($id)
	{
		$q=$this->db->query("select * from mercancia where id=".$id);
		return $q->result();
	}
	function get_productos(){
		$q=$this->db->query("select M.id, M.sku, M.fecha_alta, M.real, M.costo, M.costo_publico, M.estatus, P.nombre, CI.url, CTM.descripcion, TR.nombre red, M.pais, C.Name, C.Code2
							
							 from mercancia M, producto P, cat_tipo_mercancia CTM, cat_img CI, cross_merc_img CMI, 
								  cat_grupo_producto CGP, tipo_red TR, Country C
							
							where M.sku = P.id and CTM.id = M.id_tipo_mercancia and M.id_tipo_mercancia=1 and 
							CI.id_img = CMI.id_cat_imagen and M.id = CMI.id_mercancia and 
							P.id_grupo = CGP.id_grupo and CGP.id_red = TR.id and C.Code = M.pais");
		return $q->result();
	}
	
	function get_servicios(){
		$q=$this->db->query("select M.id, M.sku, M.fecha_alta, M.real, M.costo, M.costo_publico, M.estatus , S.nombre, CI.url, CTM.descripcion, TR.nombre red, M.pais, C.Name, C.Code2
							from mercancia M, servicio S, cat_tipo_mercancia CTM, cat_img CI, cross_merc_img CMI, tipo_red TR, cat_grupo_producto CGP, Country C
							where M.sku = S.id and CTM.id = M.id_tipo_mercancia and M.id_tipo_mercancia=2 and CI.id_img = CMI.id_cat_imagen and M.id = CMI.id_mercancia and CGP.id_grupo = S.id_red and CGP.id_red = TR.id and C.Code = M.pais");
		return $q->result();
	}
	
	function get_combinados(){
		$q=$this->db->query("select M.id, M.sku, M.fecha_alta, M.real, M.costo, M.costo_publico, M.estatus, C.nombre, M.pais,
							 CI.url, CTM.descripcion, TR.nombre red, CO.Name, CO.Code2
							
							 from mercancia M, combinado C, cat_tipo_mercancia CTM, cat_img CI, cross_merc_img CMI, 
								  tipo_red TR, cat_grupo_producto CGP, Country CO
							
							where M.sku = C.id and CTM.id = M.id_tipo_mercancia and M.id_tipo_mercancia=3 and 
							CI.id_img = CMI.id_cat_imagen and M.id = CMI.id_mercancia and CGP.id_grupo = C.id_red and
							CGP.id_red = TR.id and CO.Code = M.pais");
		return $q->result();
	}
	
	function get_impuesto()
	{
		$q=$this->db->query("select * from cat_impuesto");
		return $q->result();
	}
	function get_impuestos()
	{
		$q=$this->db->query("select a.id_impuesto,a.descripcion,a.porcentaje,a.estatus,a.id_pais,b.Code,b.Name,b.Code2 from cat_impuesto a,Country b
where(a.id_pais=b.Code)");
		return $q->result();
	}
	
	function get_retencion()
	{
		$q=$this->db->query("select * from cat_retencion");
		return $q->result();
	}
	
	function cambiar_estatus_retencion(){
	
		$this->db->query("update cat_retencion set estatus = '".$_POST['estado']."' where id_retencion=".$_POST["id"]);
		return true;
	}
	
	function cambiar_estatus_impuesto(){
	
		$this->db->query("update cat_impuesto set estatus = '".$_POST['estado']."' where id_impuesto=".$_POST["id"]);
		return true;
	}
	
	function actualizar_retencion(){
		$datos = array(
				'descripcion' => $_POST['nombre'],
				'porcentaje'	  => $_POST['porcentaje'],
				'duracion'	  => $_POST['duracion']
		);
		$this->db->where('id_retencion', $_POST['id']);
		$this->db->update('cat_retencion', $datos);
		return true;
	}
	
	function actualizar_impuesto(){
		$datos = array(
				'descripcion' => $_POST['nombre'],
				'porcentaje'	  => $_POST['porcentaje'],
				'id_pais'	  => $_POST['pais']
		);
		$this->db->where('id_impuesto', $_POST['id']);
		$this->db->update('cat_impuesto', $datos);
		return true;
	}
	
	function get_retencion_id($id){
		$categoria = $this->db->query('select * from cat_retencion where id_retencion = '.$id.'');
		return $categoria->result();
	}
	function get_impuesto_id($id){
		$categoria = $this->db->query('select * from cat_impuesto where id_impuesto = '.$id.'');
		return $categoria->result();
	}
	
	function get_impuestos_mercancia($id)
	{
		$q=$this->db->query("SELECT id_impuesto FROM cross_merc_impuesto WHERE id_mercancia=".$id);

		return $q->result();
	}
	function new_empresa()
	{
		$dato_empresa=array(
				"nombre"     => $_POST['nombre'],
				"id_razon"   => $_POST['regimen'],
				"correo"     => $_POST['email'],
				"site"       => $_POST['site']
            );

        $this->db->insert("empresa",$dato_empresa);

        $id_nuevo=mysql_insert_id();

		$dato_dir=array(
				"id_empresa"      => $id_nuevo,
				"cp"              =>$_POST['cp'],
				"calle"           =>$_POST['calle'],
				"colonia"         =>$_POST['colonia'],
				"municipio"       =>$_POST['municipio'],
				"estado"          =>$_POST['pais'],
				"numero_exterior" => $_POST['exterior'],
				"numero_interior" => $_POST['interior']
            );

        $this->db->insert("cross_dir_emp",$dato_dir);

        $empresa = array('id' => $id_nuevo, 'nombre' => $_POST['nombre']);
        return $empresa;
	}
	function update_mercancia()
	{
		if($_POST['tipo_merc']==1)
		{
			$sku_q=$this->db->query("SELECT sku from mercancia where id=".$_POST['id_merc']);
			$sku_res=$sku_q->result();
			$sku=$sku_res[0]->sku;
			$dato_producto=array(
					"nombre"         => $_POST['nombre'],
					"concepto"       => $_POST['concepto'],
					"descripcion"    => $_POST['descripcion'],
					"peso"           => $_POST['peso'],
					"alto"           => $_POST['alto'],
					"ancho"          => $_POST['ancho'],
					"id_grupo"       => $_POST['grupo'],
					"profundidad"    => $_POST['profundidad'],
					"diametro"       => $_POST['diametro'],
					"marca"          => $_POST['marca'],
					"codigo_barras"  => $_POST['codigo_barras'],
					"min_venta"      => $_POST['min_venta'],
					"max_venta"      => $_POST['max_venta'],
					"instalacion"    => $_POST['instalacion'],
					"especificacion" => $_POST['especificacion'],
					"produccion"     => $_POST['produccion'],
					"importacion"    => $_POST['importacion'],
					"sobrepedido"    => $_POST['sobrepedido']
	            );

			$this->db->where('id', $sku);
			$this->db->update('producto', $dato_producto); 
			
			$dato_mercancia=array(
					"pais"          	    => $_POST['pais'],
					"id_proveedor"      	=> $_POST['proveedor'],
					"real"              	=> $_POST['real'],
					"costo"            	 	=> $_POST['costo'],
					"entrega"           	=> $_POST['entrega'],
					"costo_publico"    		=> $_POST['costo_publico'],
					"puntos_comisionables"	=> $_POST['puntos_com']
	            );
			$this->db->where('id', $_POST['id_merc']);
			$this->db->update('mercancia', $dato_mercancia); 
			$this->db->query("delete from cross_merc_impuesto where id_mercancia=".$_POST['id_merc']);
			foreach($_POST['id_impuesto'] as $impuesto)
			{
				$dato_impuesto=array(
					"id_mercancia"	=> $_POST['id_merc'],
					"id_impuesto"	=> $impuesto
				);
				$this->db->insert("cross_merc_impuesto",$dato_impuesto);
			}
			// Produces:
			// UPDATE mytable 
			// SET title = '{$title}', name = '{$name}', date = '{$date}'
			// WHERE id = $id
		}
		if($_POST['tipo_merc']==2)
		{
			
			$sku_q=$this->db->query("SELECT sku from mercancia where id=".$_POST['id_merc']);
			$sku_res=$sku_q->result();
			$sku=$sku_res[0]->sku;
			$dato_servicio=array(
					"nombre"       => $_POST['nombre'],
					"concepto"     => $_POST['concepto'],
					"descripcion"  => $_POST['descripcion'],
					"fecha_inicio" => $_POST['fecha_inicio'],
					"fecha_fin"    => $_POST['fecha_fin'],
					"id_red"    => $_POST['red']
	            );

			$this->db->where('id', $sku);
			$this->db->update('servicio', $dato_servicio); 
			
			$dato_mercancia=array(
					"pais"          	    => $_POST['pais'],
					"id_proveedor"      	=> $_POST['proveedor'],
					"real"              	=> $_POST['real'],
					"costo"            	 	=> $_POST['costo'],
					"entrega"           	=> $_POST['entrega'],
					"costo_publico"    		=> $_POST['costo_publico'],
					"puntos_comisionables"	=> $_POST['puntos_com']
	            );
			$this->db->where('id', $_POST['id_merc']);
			$this->db->update('mercancia', $dato_mercancia); 
			$this->db->query("delete from cross_merc_impuesto where id_mercancia=".$_POST['id_merc']);
			
			if (isset($_POST['id_impuesto'])){
				foreach($_POST['id_impuesto'] as $impuesto)
				{
					$dato_impuesto=array(
						"id_mercancia"	=> $_POST['id_merc'],
						"id_impuesto"	=> $impuesto
					);
					$this->db->insert("cross_merc_impuesto",$dato_impuesto);
				}
			}
			// Produces:
			// UPDATE mytable 
			// SET title = '{$title}', name = '{$name}', date = '{$date}'
			// WHERE id = $id
		}
		if($_POST["tipo_merc"]==3)
		{
			$sku_q=$this->db->query("SELECT sku from mercancia where id=".$_POST['id_merc']);
			$sku_res=$sku_q->result();
			$sku=$sku_res[0]->sku;
			$dato_combinado=array(
					"nombre"       => $_POST['nombre'],
					"descripcion"  => $_POST['descripcion'],
					"descuento"    => $_POST['descuento'],
					"id_red"	   => $_POST['red']
	            );

			$this->db->where('id', $sku);
			$this->db->update('combinado', $dato_combinado); 

			$n=0;
			$this->db->query("delete from cross_combinado where id_combinado=".$sku);
/*
			foreach($_POST['producto'] as $producto)
			{
					$dato_cross_combinado=array(
							"id_combinado"      => $sku,
							"id_producto"       => $producto,
							"cantidad_producto" => $_POST['n_productos']
			        );
					
					$this->db->insert("cross_combinado",$dato_cross_combinado);
			}

			foreach($_POST['servicio'] as $servicio)
			{
					$dato_cross_combinado=array(
							"id_servicio"       => $servicio,
							"cantidad_servicio" => $_POST['n_servicios']
			        );
					$this->db->where("id_combinado",$sku);
					$this->db->update("cross_combinado",$dato_cross_combinado);
			}*/
			
			if(!isset($_POST['n_productos']))$_POST['n_productos']=0;
			if(!isset($_POST['n_servicios']))$_POST['n_servicios']=0;
			$productos   = $_POST['producto'];
			$servicios   = $_POST['servicio'];
			$n_productos = $_POST['n_productos'];
			$n_servicios = $_POST['n_servicios'];
			$producto    = sizeof($_POST['producto']);
			$servicio    = sizeof($_POST['servicio']);

			if($productos<$servicios)
			{
				if ($n_productos[0]==0)
				{
					foreach ($servicios as $key)
					{
						$dato_cross_combinado=array(
							"id_combinado"      => $sku,
							"id_servicio"       => $key,
							"cantidad_servicio" => $n_servicios[$n]
			            );
						$this->db->insert("cross_combinado",$dato_cross_combinado);
						$n++;
					}
				}
				else
				{
					foreach ($servicios as $key)
					{
						if($n>$producto)
						{
							$productos[$n]='';
							$n_productos[$n]='';
						}
						$dato_cross_combinado=array(
							"id_combinado"      => $sku,
							"id_producto"       => $productos[$n],
							"id_servicio"       => $key,
							"cantidad_producto" => $n_productos[$n],
							"cantidad_servicio" => $n_servicios[$n]
			            );
						$this->db->insert("cross_combinado",$dato_cross_combinado);
						$n++;
					}
				}
			}
			if($productos>$servicios)
			{
				if($n_servicios[0]==0)
				{
					foreach ($productos as $key)
					{
						$dato_cross_combinado=array(
							"id_combinado"      => $sku,
							"id_producto"       => $key,
							"cantidad_producto" => $n_productos[$n]
			            );
						$this->db->insert("cross_combinado",$dato_cross_combinado);
						$n++;
					}
				}
				else
				{
					foreach ($productos as $key)
					{
						if($n>$servicio)
						{
							$servicio[$n]='';
							$n_servicios[$n]='';
						}
						$dato_cross_combinado=array(
							"id_combinado"      => $sku,
							"id_producto"       => $key,
							"id_servicio"       => $servicios[$n],
							"cantidad_producto" => $n_productos[$n],
							"cantidad_servicio" => $n_servicios[$n]
			            );
						$this->db->insert("cross_combinado",$dato_cross_combinado);
						$n++;
					}
				}
			}
			if ($productos==$servicios)
			{
				foreach ($_POST['producto'] as $key)
				{
					$dato_cross_combinado=array(
						"id_combinado"      => $sku,
						"id_producto"       => $key,
						"id_servicio"       => $servicios[$n],
						"cantidad_producto" => $n_productos[$n],
						"cantidad_servicio" => $n_servicios[$n]
		            );
					$this->db->insert("cross_combinado",$dato_cross_combinado);
					$n++;
				}
			}
			//////////////////////////////////////////////////////////////////////////////////////////////
			$dato_mercancia=array(
					"pais"          	    => $_POST['pais'],
					"id_proveedor"      	=> $_POST['proveedor'],
					"real"              	=> $_POST['real'],
					"costo"            	 	=> $_POST['costo'],
					"entrega"           	=> $_POST['entrega'],
					"costo_publico"    		=> $_POST['costo_publico'],
					"puntos_comisionables"	=> $_POST['puntos_com']
	            );
			$this->db->where('id', $_POST['id_merc']);
			$this->db->update('mercancia', $dato_mercancia); 
			$this->db->query("delete from cross_merc_impuesto where id_mercancia=".$_POST['id_merc']);
			foreach($_POST['id_impuesto'] as $impuesto)
			{
				$dato_impuesto=array(
					"id_mercancia"	=> $_POST['id_merc'],
					"id_impuesto"	=> $impuesto
				);
				$this->db->insert("cross_merc_impuesto",$dato_impuesto);
			}
		}
		
	}
	function new_mercancia()
	{
		if($_POST['tipo_mercancia']==1)
		{
			$dato_producto=array(
					"nombre"         => $_POST['nombre'],
					"concepto"       => $_POST['concepto'],
					"descripcion"    => $_POST['descripcion'],
					"peso"           => $_POST['peso'],
					"alto"           => $_POST['alto'],
					"ancho"          => $_POST['ancho'],
					"id_grupo"       => $_POST['grupo'],
					"profundidad"    => $_POST['profundidad'],
					"diametro"       => $_POST['diametro'],
					"marca"          => $_POST['marca'],
					"codigo_barras"  => $_POST['codigo_barras'],
					"min_venta"      => $_POST['min_venta'],
					"max_venta"      => $_POST['max_venta'],
					"instalacion"    => $_POST['instalacion'],
					"especificacion" => $_POST['especificacion'],
					"produccion"     => $_POST['produccion'],
					"importacion"    => $_POST['importacion'],
					"sobrepedido"    => $_POST['sobrepedido']
	            );
			$this->db->insert("producto",$dato_producto);
		}

		if($_POST['tipo_mercancia']==2)
		{
			$dato_servicio=array(
					"nombre"       => $_POST['nombre'],
					"concepto"     => $_POST['concepto'],
					"descripcion"  => $_POST['descripcion'],
					"fecha_inicio" => $_POST['fecha_inicio'],
					"fecha_fin"    => $_POST['fecha_fin']
	            );
			$this->db->insert("servicio",$dato_servicio);
		}

		if ($_POST['tipo_mercancia']==3&&$_POST['tipo']==1)
		{
			$dato_combinado=array(
					"nombre"      => $_POST['nombre'],
					"descripcion" => $_POST['descripcion'],
					"descuento"   => $_POST['descuento'],
					"estatus"     => 'ACT'
	            );
			$this->db->insert("combinado",$dato_combinado);

			$combinado=mysql_insert_id();
			$n=0;

			if(!isset($_POST['n_productos']))$_POST['n_productos']=0;
			if(!isset($_POST['n_servicios']))$_POST['n_servicios']=0;
			$productos   = $_POST['producto'];
			$servicios   = $_POST['servicio'];
			$n_productos = $_POST['n_productos'];
			$n_servicios = $_POST['n_servicios'];
			$producto    = sizeof($_POST['producto']);
			$servicio    = sizeof($_POST['servicio']);

			if($producto<$servicio)
			{
				if ($n_productos[0]==0)
				{
					foreach ($servicios as $key)
					{
						$dato_cross_combinado=array(
							"id_combinado"      => $combinado,
							"id_servicio"       => $key,
							"cantidad_servicio" => $n_servicios[$n]
			            );
						$this->db->insert("cross_combinado",$dato_cross_combinado);
						$n++;
					}
				}
				else
				{
					foreach ($servicios as $key)
					{
						if($n>$producto)
						{
							$productos[$n]='';
							$n_productos[$n]='';
						}
						$dato_cross_combinado=array(
							"id_combinado"      => $combinado,
							"id_producto"       => $productos[$n],
							"id_servicio"       => $key,
							"cantidad_producto" => $n_productos[$n],
							"cantidad_servicio" => $n_servicios[$n]
			            );
						$this->db->insert("cross_combinado",$dato_cross_combinado);
						$n++;
					}
				}
			}
			if($producto>$servicio)
			{
				if($n_servicios[0]==0)
				{
					foreach ($productos as $key)
					{
						$dato_cross_combinado=array(
							"id_combinado"      => $combinado,
							"id_producto"       => $key,
							"cantidad_producto" => $n_productos[$n]
			            );
						$this->db->insert("cross_combinado",$dato_cross_combinado);
						$n++;
					}
				}
				else
				{
					foreach ($productos as $key)
					{
						if($n>$servicio)
						{
							$servicio[$n]='';
							$n_servicios[$n]='';
						}
						$dato_cross_combinado=array(
							"id_combinado"      => $combinado,
							"id_producto"       => $key,
							"id_servicio"       => $servicios[$n],
							"cantidad_producto" => $n_productos[$n],
							"cantidad_servicio" => $n_servicios[$n]
			            );
						$this->db->insert("cross_combinado",$dato_cross_combinado);
						$n++;
					}
				}
			}
			if ($producto==$servicio)
			{
				foreach ($_POST['producto'] as $key)
				{
					$dato_cross_combinado=array(
						"id_combinado"      => $combinado,
						"id_producto"       => $key,
						"id_servicio"       => $servicios[$n],
						"cantidad_producto" => $n_productos[$n],
						"cantidad_servicio" => $n_servicios[$n]
		            );
					$this->db->insert("cross_combinado",$dato_cross_combinado);
					$n++;
				}
			}
		}
		if ($_POST['tipo_mercancia']==3&&$_POST['tipo']==2)
		{
			$dato_promo=array(
						"nombre"             => $_POST['nombre'],
						"id_mercancia"       =>$_POST['mercancia'],
						"cantidad_mercancia" => $_POST['n_mercancia'],
						"costo"              => $_POST['extra'],
						"descripcion"        => $_POST['descripcion'],
						"inicio"             => $_POST['fecha_inicio'],
						"fin"                => $_POST['fecha_fin'],
						"estatus"            => 'ACT'

		            );
					$this->db->insert("promocion",$dato_promo);
					$mercancia=mysql_insert_id();;
		}
		else
		{
			$sku=mysql_insert_id();
			if ($_POST['tipo_mercancia']==3&&$_POST['tipo']==1)
			$sku=$combinado;
			$nombre_ini=substr($_POST['nombre'],0,3);
			$sku_2=$nombre_ini.$sku.$_POST['tipo_mercancia'];
			$dato_mercancia=array(
					"sku"               	=> $sku,
					"sku_2"					=> $sku_2,
					"id_tipo_mercancia" 	=> $_POST['tipo_mercancia'],
					"estatus"           	=>'DES',
					"pais"          	    => $_POST['pais'],
					"id_proveedor"      	=> $_POST['proveedor'],
					"real"              	=> $_POST['real'],
					"costo"            	 	=> $_POST['costo'],
					"entrega"           	=> $_POST['entrega'],
					"costo_publico"    		=> $_POST['costo_publico'],
					"puntos_comisionables"	=> $_POST['puntos_com']
	            );
			$this->db->insert("mercancia",$dato_mercancia);
			$mercancia=mysql_insert_id();
			foreach($_POST['id_impuesto'] as $impuesto)
			{
				$dato_impuesto=array(
				"id_mercancia"	=> $mercancia,
				"id_impuesto"	=> $impuesto
				);
				$this->db->insert("cross_merc_impuesto",$dato_impuesto);
			}
		}

		return $mercancia;
	}
	function img_merc($id,$data)
	{
		foreach ($data as $key){
			$explode=explode(".",$key["file_name"]);
			$nombre=$explode[0];
			$extencion=$explode[1];
			$dato_img=array(
	                "url"				=>	"/media/carrito/".$key["file_name"],
	                "nombre_completo"	=>	$key["file_name"],
	                "nombre"			=>	$nombre,
	                "extencion"			=>	$extencion,
	                "estatus"			=>	"ACT"
	            );
			$this->db->insert("cat_img",$dato_img);
			
			$id_foto = mysql_insert_id();
			
			
			$dato_cross_img=array(
	                "id_mercancia"		=>	$id,
	                "id_cat_imagen"	=>	$id_foto
	            );
			$this->db->where('id_mercancia', $id);
			$this->db->update("cross_merc_img",$dato_cross_img);
		}
	}
	function img_merc_promo($id,$data)
	{
		foreach ($data as $key){
			$explode=explode(".",$key["file_name"]);
			$nombre=$explode[0];
			$extencion=$explode[1];
			$dato_img=array(
	                "url"				=>	"/media/carrito/".$key["file_name"],
	                "nombre_completo"	=>	$key["file_name"],
	                "nombre"			=>	$nombre,
	                "extencion"			=>	$extencion,
	                "estatus"			=>	"ACT"
	            );
			$this->db->insert("cat_img",$dato_img);
			$id_foto=mysql_insert_id();

			$dato_cross_img=array(
	                "id_promo"		=>	$id,
	                "id_img"	=>	$id_foto
	            );
			$this->db->insert("cross_img_promo",$dato_cross_img);
		}
	}
	function new_grupo()
	{
		$dato_grupo=array(
				"descripcion" =>	$_POST['descripcion'],
				"estatus"     =>	'ACT'
            );
		$this->db->insert("cat_grupo_producto",$dato_grupo);
	}
	function kill_grupo()
	{
		$this->db->query("delete from cat_grupo_producto where id_grupo=".$_POST["id"]);
	}
	
	function new_impuesto()
	{
		$dato_impuesto=array(
				"descripcion" =>	$_POST['descripcion'],
				"porcentaje"  =>	$_POST['porcentaje'],
				"estatus"     =>	'ACT'
            );
		$this->db->insert("cat_impuesto",$dato_impuesto);
	}
	function new_retencion($nombre,$porcentaje,$duracion)
	{
		$dato_impuesto=array(
				"descripcion" =>	$nombre,
				"porcentaje"  =>	$porcentaje,
				"duracion"  =>	$duracion,
				"estatus"     =>	'ACT'
		);
		$this->db->insert("cat_retencion",$dato_impuesto);
	}
	
	function new_impuestos($nombre,$porcentaje,$pais)
	{
		$dato_impuesto=array(
				"descripcion" =>	$nombre,
				"porcentaje"  =>	$porcentaje,
				"id_pais"  =>	$pais,
				"estatus"     =>	'ACT'
		);
		$this->db->insert("cat_impuesto",$dato_impuesto);
	}
	
	function kill_impuesto()
	{
		$this->db->query("delete from cat_impuesto where id_impuesto=".$_POST["id"]);
	}
	
	function kill_retencion()
	{
		$this->db->query("delete from cat_retencion where id_retencion=".$_POST["id"]);
	}
	
	function kill_tipo_red($id)
	{
		$this->db->query("delete from tipo_red where id=".$id);
		$this->db->query("delete from red where id_red =".$id." and id_usuario = 2");
		$this->db->query("delete from afiliar where id_red =".$id." and id_afiliado = 2");
	}
	
	function ver_afiliados_red($id)
	{
		$q = $this->db->query("select id_red from afiliar where id_red=".$id." and id_afiliado != 2");
		$red = $q->result();
		if(isset($red[0]->id_red)){
			return 1;
		}else{
			return 0;
		}
	}
	
	function get_dato_pais()
	{
		$q=$this->db->query("select CL.Language, CL.estatus estatus, CM.estatus estatus_m, CM.codigo_moneda codigo_moneda, CM.moneda moneda, C.estatus estado_pais, C.Name
from CountryLanguage CL join Country C on CountryCode=C.Code  join cat_moneda CM on Code2=codigo_pais where CountryCode='".$_POST['pais']."' ");
		return $q->result();
	}
	function get_dato_pais_($code)
	{//Para multiple
		$q=$this->db->query("select CL.Language, CL.estatus estatus, CM.estatus estatus_m, CM.codigo_moneda codigo_moneda, CM.moneda moneda, C.estatus estado_pais, C.Name
		from CountryLanguage CL join Country C on CountryCode=C.Code  join cat_moneda CM on Code2=codigo_pais where CountryCode='".$code."' ");
		return $q->result();
	}
	function update_pais()
	{
		$this->db->query("update CountryLanguage set estatus='DES' where CountryCode='".$_POST['pais']."'");
		if(isset($_POST['idioma']))
		{
			foreach ($_POST['idioma'] as $key)
			{
				$this->db->query("update CountryLanguage set estatus='ACT' where Language='".$key."' and CountryCode='".$_POST['pais']."'");
			}
		}
		if(!isset($_POST['estado_pais']))
		{
			echo "update Country set estatus='DES' where Code='".$_POST['pais']."'";
			$this->db->query("update Country set estatus='DES' where Code='".$_POST['pais']."'");
		}
		else
		{
			$this->db->query("update Country set estatus='ACT' where Code='".$_POST['pais']."'");
		}
		if(!isset($_POST['estado_moneda']))
		{
			$Code2=$this->db->query("select Code2 from Country where Code='".$_POST['pais']."'");
			$Code2=$Code2->result();
			$Code2=$Code2[0]->Code2;
			$this->db->query("update cat_moneda set estatus='DES' where codigo_pais='".$Code2."'");
		}
		else
		{
			$Code2=$this->db->query("select Code2 from Country where Code='".$_POST['pais']."'");
			$Code2=$Code2->result();
			$Code2=$Code2[0]->Code2;
			$this->db->query("update cat_moneda set estatus='ACT' where codigo_pais='".$Code2."'");
		}
	}
	function tipo_fiscal()
	{
		$q=$this->db->query('select * from cat_usuario_fiscal');
		return $q->result();
	}
	function get_pais()
	{
		$q=$this->db->query("select Code, Name, Code2 from Country ");
		return $q->result();
	}
	function get_pais_activo()
	{
		$q=$this->db->query("select Code, Name, Code2 from Country where Estatus='ACT'");
		return $q->result();
	}
	
	function use_mail()
	{
		$q=$this->db->query("select * from users where email like '".$_POST['mail']."'");
		return $q->result();
	}
	function use_username()
	{
		$q=$this->db->query("select * from users where username like '".$_POST['username']."'");
		return $q->result();
	}
	function use_keyword()
	{
		$q=$this->db->query("select * from user_profiles where keyword like '".$_POST['keyword']."'");
		return $q->result();
	}
	function sexo()
	{
		$q=$this->db->query("select * from cat_sexo");
		return $q->result();
	}
	function edo_civil()
	{
		$q=$this->db->query("select * from cat_edo_civil");
		return $q->result();
	}
	function get_estudios()
	{
		$q=$this->db->query('select * from cat_estudios');
		return $q->result();
	}
	function get_ocupacion()
	{
		$q=$this->db->query('select * from cat_ocupacion');
		return $q->result();
	}
	function get_tiempo_dedicado()
	{
		$q=$this->db->query('select * from cat_tiempo_dedicado');
		return $q->result();
	}
	function get_user_type()
	{
		$q=$this->db->query("select * from cat_tipo_usuario");
		return $q->result();
	}
	function new_user($id)
	{
		$id_afiliador=$this->db->query('select id from users where email like "'.$_POST['mail_important'].'"');

		$id_afiliador=$id_afiliador->result();
		
		if($id_afiliador[0]->id)
		$id_nuevo=$id_afiliador[0]->id;
		else
		$id_nuevo=$id_afiliador->id;

		$directo=0;
		if(!isset($_POST['afiliados']))
		{
			$_POST['afiliados']=$id;
			$directo=1;
		}
		$dato_style=array(
	                "id_usuario"		=> $id_nuevo,
	                "bg_color"			=> "#EEEEEE",
	                "btn_1_color"		=> "#475795",
	                "btn_2_color"		=> "#3DB2E5"
	            );
		$this->db->insert("estilo_usuario",$dato_style);

		/*################ PERFIL DEL USUARIO #########################*/
		$dato_profile=array(
					"user_id"            => $id_nuevo,
					"id_sexo"            => 1,
					"id_edo_civil"       => 1,
					"id_tipo_usuario"    => 1,
					"nombre"             => $_POST['nombre'],
					"apellido"           => $_POST['apellido'],
					"fecha_nacimiento"   => $_POST['nacimiento'],
					"id_estudio"         => 1,
					"id_ocupacion"       => 1,
					"id_tiempo_dedicado" => 1,
					"keyword"            => $_POST['keyword'],
					'id_estatus'         => 1

	            );
		$this->db->insert("user_profiles",$dato_profile);
		/*############# FIN PERFIL DEL USUARIO #########################*/

		/*################### DATO PERMISO #########################*/
		if($_POST['tipo_usuario']==1)
			$perfil=1;
		elseif($_POST['tipo_usuario']==2)
			$perfil=2;
		else
			$perfil=1;

		$dato_permiso=array(
					"id_user"   => $id_nuevo,
					"id_perfil" => $perfil
	            );
	    $this->db->insert("cross_perfil_usuario",$dato_permiso);
	    /*################### FIN DATO PERMISO #########################*/

	    /*################### DATO COPALICANTE #########################
		$dato_coaplicante=array(
					"id_user"   => $id_nuevo,
					"nombre" => $_POST['nombre_co'],
					"apellido"   => $_POST['apellido_co'],
					"keyword"   => $_POST['keyword_co']
	            );
	    $this->db->insert("coaplicante",$dato_coaplicante);
	    ################### FIN DATO COPALICANTE #########################*/

		/*################### DATO RED #########################
		$dato_red=array(
	                "id_usuario"	=> $id_nuevo,
	                "profundidad"	=> "0",
	                "estatus"		=> "ACT"
	            );
	    $this->db->insert("red",$dato_red);
	    ################### FIN DATO RED #########################*/

	    /*################### DATO AFILIAR #########################
	    $mi_red=$this->db->query('select id_red from red where id_usuario='.$id);
	    $mi_red=$mi_red->result();
	    $mi_red=$mi_red[0]->id_red;

	    if(isset($_POST['sponsor']))
	    {
	    	$directo=0;
	    }
	    if(!isset($_POST['lado']))
	    	$lado=0;
	    else
	    	$lado=$_POST['lado'];

		$dato_afiliar=array(
					"id_red"      => $mi_red,
					"id_afiliado" => $id_nuevo,
					"debajo_de"   => $_POST['afiliados'],
					"directo"     => $directo,
					"lado"        => $lado
	            );
		$this->db->insert("afiliar",$dato_afiliar);
		
		$ids=array();
		$id_=$id;
		for($i=0;$i<=99999990;$i++)
		{
			if($i>0)
				$id_=$ids[$i-1];
			$query=$this->db->query('select id_red from afiliar where id_afiliado='.$id_);
			$query=$query->result();
			if(isset($query[0]->id_red))
			{
				foreach ($query as $key)
				$ids[]=$key->id_red;
			}
				
			else
				$i=99999991;

		}
	    foreach ($ids as $key)
	    {
	    	$query2=$this->db->query('select * from afiliar where debajo_de='.$id.' and id_red='.$key.' and id_afiliado='.$id_nuevo);
	    	$query2=$query2->result();
	    	if($query2)
			{
			}
			else
			{
				$dato_afiliar=array(
					"id_red"		=> $key,
	                "id_afiliado"	=> $id_nuevo,
	                "debajo_de"		=> $id,
	                "directo"		=> 0,
	                "lado"        => $lado
	            );
				$this->db->insert("afiliar",$dato_afiliar);
			}
		}

	    ################### FIN DATO AFILIAR #########################*/

	    /*################### DATO TELEFONOS #########################*/
		//tipo_tel 1=fijo 2=movil
		if($_POST["fijo"])
		{
			foreach ($_POST["fijo"] as $fijo)
			{
				$dato_tel=array(
	                "id_user"		=> $id_nuevo,
	                "id_tipo_tel"	=> 1,
	                "numero"		=> $fijo,
	                "estatus"		=> "ACT"
	            );
	            $this->db->insert("cross_tel_user",$dato_tel);
			}
		}
		if($_POST["movil"])
		{
			foreach ($_POST["movil"] as $movil)
			{
				$dato_tel=array(
		            "id_user"		=> $id_nuevo,
		            "id_tipo_tel"	=> 2,
		            "numero"		=> $movil,
		            "estatus"		=> "ACT"
		        );
		        $this->db->insert("cross_tel_user",$dato_tel);
			}
		}

		/*################### FIN DATO TELEFONOS #########################*/

		/*################### DATO DIRECCION #########################*/
		$dato_dir=array(
                "id_user"   =>$id_nuevo,
				"cp"        =>$_POST['cp'],
				"calle"     =>$_POST['calle'],
				"colonia"   =>$_POST['colonia'],
				"municipio" =>$_POST['municipio'],
				"estado"    => 'NULL',
				"pais"      =>$_POST['pais']
            );
            $this->db->insert("cross_dir_user",$dato_dir);
        /*################### FIN DATO DIRECCION #########################*/

        /*################### DATO BILLETERA #########################*/
            $dato_billetera=array(
	                "id_user"	=> $id_nuevo,
	                "estatus"		=> "DES",
	                "activo"		=> "No"
	            );
	    $this->db->insert("billetera",$dato_billetera);
	    /*################### FIN DATO BILLETERA #########################*/

	    /*################### FIN DATO COBRO #########################*/
	    $dato_cobro=array(
	                "id_user"		=> $id_nuevo,
	                "id_metodo"		=> 1,
	                "id_estatus"	=> 1,
	                "monto"			=> 0
	            );
	    $this->db->insert("cobro",$dato_cobro);

	    $dato_cobro=array(
	                "id_user"		=> $id_nuevo,
	                "id_metodo"		=> 1,
	                "id_estatus"	=> 4,
	                "monto"			=> 0
	            );
	    $this->db->insert("cobro",$dato_cobro);

	     /*################### FIN DATO COBRO #########################*/
	}
	function cp()
	{
		$q=$this->db->query("select colonia, municipio, id_estado from sepomex where cp like '%".$_POST['cp']."%'");
		return $q->result();
	}
	function estado($id)
	{
		$q=$this->db->query("select descripcion from cat_estado where id_estado =".$id);
		return $q->result();
	}
	function new_proveedor($id)
	{
		$id_afiliador=$this->db->query('select id from users where email like "'.$_POST['mail_important'].'"');

		$id_afiliador=$id_afiliador->result();
		
		if($id_afiliador[0]->id)
		$id_nuevo=$id_afiliador[0]->id;
		else
		$id_nuevo=$id_afiliador->id;

		$directo=0;
		if(!isset($_POST['afiliados']))
		{
			$_POST['afiliados']=$id;
			$directo=1;
		}
		$dato_style=array(
	                "id_usuario"		=> $id_nuevo,
	                "bg_color"			=> "#EEEEEE",
	                "btn_1_color"		=> "#475795",
	                "btn_2_color"		=> "#3DB2E5"
	            );
		$this->db->insert("estilo_usuario",$dato_style);

		/*################ PERFIL DEL USUARIO #########################*/
		$dato_profile=array(
					"user_id"            => $id_nuevo,
					"id_sexo"            => $_POST['sexo'],
					"id_edo_civil"       => $_POST['civil'],
					"id_tipo_usuario"    => 3,
					"nombre"             => $_POST['nombre'],
					"apellido"           => $_POST['apellido'],
					"fecha_nacimiento"   => $_POST['nacimiento'],
					"id_estudio"         => $_POST['estudios'],
					"id_ocupacion"       => $_POST['ocupacion'],
					"id_tiempo_dedicado" => $_POST['tiempo_dedicado'],
					"keyword"            => $_POST['rfc'],
					'id_estatus'         => 1
	            );
		$this->db->insert("user_profiles",$dato_profile);
		/*############# FIN PERFIL DEL USUARIO #########################*/

		/*################### DATO PERMISO #########################*/
		$dato_permiso=array(
					"id_user"   => $id_nuevo,
					"id_perfil" => 1
	            );
	    $this->db->insert("cross_perfil_usuario",$dato_permiso);
	    /*################### FIN DATO PERMISO #########################*/

		/*################### DATO RED #########################*/
		$dato_red=array(
	                "id_usuario"	=> $id_nuevo,
	                "profundidad"	=> "0",
	                "estatus"		=> "ACT"
	            );
	    $this->db->insert("red",$dato_red);
	    /*################### FIN DATO RED #########################*/

	    /*################### DATO AFILIAR #########################*/
	    $mi_red=$this->db->query('select id_red from red where id_usuario='.$id);
	    $mi_red=$mi_red->result();
	    $mi_red=$mi_red[0]->id_red;

		$dato_afiliar=array(
					"id_red"		=> $mi_red,
	                "id_afiliado"	=> $id_nuevo,
	                "debajo_de"		=> $_POST['afiliados'],
	                "directo"		=> $directo
	            );
		$this->db->insert("afiliar",$dato_afiliar);
		
		$ids=array();
		$id_=$id;
		for($i=0;$i<=99999990;$i++)
		{
			if($i>0)
				$id_=$ids[$i-1];
			$query=$this->db->query('select id_red from afiliar where id_afiliado='.$id_);
			$query=$query->result();
			if(isset($query[0]->id_red))
			{
				foreach ($query as $key)
				$ids[]=$key->id_red;
			}
				
			else
				$i=99999991;

		}
	    foreach ($ids as $key)
	    {
		    	$dato_afiliar=array(
					"id_red"		=> $key,
	                "id_afiliado"	=> $id_nuevo,
	                "debajo_de"		=> $id,
	                "directo"		=> 0
	            );
				$this->db->insert("afiliar",$dato_afiliar);
		}

	    /*################### FIN DATO AFILIAR #########################*/

	    /*################### DATO TELEFONOS #########################*/
		//tipo_tel 1=fijo 2=movil
		if($_POST["fijo"])
		{
			foreach ($_POST["fijo"] as $fijo)
			{
				$dato_tel=array(
	                "id_user"		=> $id_nuevo,
	                "id_tipo_tel"	=> 1,
	                "numero"		=> $fijo,
	                "estatus"		=> "ACT"
	            );
	            $this->db->insert("cross_tel_user",$dato_tel);
			}
		}
		if($_POST["movil"])
		{
			foreach ($_POST["movil"] as $movil)
			{
				$dato_tel=array(
		            "id_user"		=> $id_nuevo,
		            "id_tipo_tel"	=> 2,
		            "numero"		=> $movil,
		            "estatus"		=> "ACT"
		        );
		        $this->db->insert("cross_tel_user",$dato_tel);
			}
		}

		/*################### FIN DATO TELEFONOS #########################*/

		/*################### DATO DIRECCION #########################*/
		$dato_dir=array(
                "id_user"   =>$id,
				"cp"        =>$_POST['cp'],
				"calle"     =>$_POST['calle'],
				"colonia"   =>$_POST['colonia'],
				"municipio" =>$_POST['municipio'],
				"estado"    => 'NULL',
				"pais"      =>$_POST['pais']
            );
            $this->db->insert("cross_dir_user",$dato_dir);
        /*################### FIN DATO DIRECCION #########################*/

        /*################### DATO BILLETERA #########################*/
            $dato_billetera=array(
	                "id_user"	=> $id_nuevo,
	                "estatus"		=> "DES",
	                "activo"		=> "No"
	            );
	    $this->db->insert("billetera",$dato_billetera);
	    /*################### FIN DATO BILLETERA #########################*/

	    /*################### FIN DATO COBRO #########################*/
	    $dato_cobro=array(
	                "id_user"		=> $id_nuevo,
	                "id_metodo"		=> 1,
	                "id_estatus"	=> 1,
	                "monto"			=> 0
	            );
	    $this->db->insert("cobro",$dato_cobro);

	    $dato_cobro=array(
	                "id_user"		=> $id_nuevo,
	                "id_metodo"		=> 1,
	                "id_estatus"	=> 4,
	                "monto"			=> 0
	            );
	    $this->db->insert("cobro",$dato_cobro);

	     /*################### FIN DATO COBRO #########################*/

	     /*################### DATO PROVEEDOR #########################*/
	    $dato_cat_proveedor=array(
					"id_usuario" => $id_nuevo,
					"comision"   => $_POST['comision']
	            );
	    $this->db->insert("cat_proveedor",$dato_cat_proveedor);

	    $id_proveedor=mysql_insert_id();

	    $dato_proveedor=array(
					"id_proveedor"                   => $id_proveedor,
					"id_empresa"                     => $_POST['empresa'],
					"id_regimen"                     => $_POST['regimen'],
					"id_zona"                        => $_POST['zona'],
					"mercancia"                      => $_POST['tipo_proveedor'],
					"razon_social"                   => $_POST['razon'],
					"curp"                           => $_POST['curp'],
					"rfc"                            => $_POST['rfc'],
					"id_impuesto"                    => $_POST['impuesto'],
					"condicion_pago"                 => $_POST['condicion_pago'],
					"promedio_entrega"               => $_POST['promedio_entrega'],
					"promedio_entrega_documentacion" => $_POST['promedio_entrega_documentacion'],
					"plazo_pago"                     => $_POST['plazo_pago'],
					"plazo_suspencion"               => $_POST['plazo_suspencion'],
					"plazo_suspencion_firma"         => $_POST['plazo_suspencion_firma'],
					"interes_moratorio"              => $_POST['interes_moratorio'],
					"dia_corte"                      => $_POST['dia_corte'],
					"dia_pago"                       => $_POST['dia_pago'],
					"credito_autorizado"             => $_POST['credito_autorizado'],
					"credito_suspendido"             => $_POST['credito_suspendido'],
					"estatus"                        => 'ACT'
	            );
	    $this->db->insert("proveedor",$dato_proveedor);


	     /*################### FIN DATO PROVEEDOR #########################*/

	    foreach ($_POST['clabe'] as $key)
		{
			$cuenta=substr($key,7,-1);
			$clave=substr($key,0,-15);
		    $banco=$this->db->query('select * from cat_banco where clave="'.$clave.'"');
		    $banco=$banco->result();
		    if(!$banco)
		    {
		    	$banco[0]->descripcion='Ninguno';
		    }

		    $dato_cat_cuenta=array(
						"id_user" => $id_nuevo,
						"cuenta"   => $cuenta,
						"banco"   => $banco[0]->descripcion,
						"estatus"   => 'ACT',
		            );
		    $this->db->insert("cat_cuenta",$dato_cat_cuenta);

		}
	}

	function get_prod_combinado($id)
	{
		$q=$this->db->query("SELECT a.*, b.nombre, c.id 
FROM cross_combinado a, producto b, mercancia c 
WHERE a.id_producto<>0 and a.id_producto=b.id and c.id=".$id);
		return $q->result();
	}
	function get_serv_combinado($id)
	{
		$q=$this->db->query("SELECT a.*, b.nombre, c.id 
FROM cross_combinado a, servicio b, mercancia c 
WHERE a.id_servicio<>0 and a.id_servicio=b.id and c.id=".$id);
		return $q->result();
	}
	
	function get_config_profundidad_tipo_red()
	{
		$q=$this->db->query("SELECT profundidad FROM tipo_red group by profundidad");
		return $q->result();
	}
	
	function get_Profundidad_tipo_red($id_categoria)
	{
		$q=$this->db->query("SELECT profundidad FROM tipo_red, cat_grupo_producto where id_red = id and id_grupo = ".$id_categoria);
		$profundidad = $q->result();
		return $profundidad[0]->profundidad;
	}
	
	function get_config_count_profundidad()
	{
		$q=$this->db->query("SELECT count(profundidad)as profundidad FROM valor_comisiones");
		return $q->result();
	}
	
	function get_config_profundidad()
	{
		$q=$this->db->query("SELECT * FROM valor_comisiones;");
		return $q->result();
	}
	
	function get_config_red_comision($id_categoria){
		$q=$this->db->query("SELECT * FROM valor_comisiones where id_grupo = ".$id_categoria." order by profundidad");
		return $q->result();
	}
	
	function get_config_valor_punto()
	{
		$q=$this->db->query("SELECT valor_punto  FROM tipo_red group by valor_punto");
		return $q->result();
	}
	
	function new_profundidad()
	{
		
		$q=$this->db->query('delete from valor_comisiones');
		
		$contador=0;	
		$dato_profundidad=array();
		foreach( $_POST['profundidad'] as $profundidad ) {
			
			$dato_profundidad[$contador]=array(
					"profundidad" => $contador+1,
					"valor"   => $profundidad
			);
			$this->db->insert("valor_comisiones",$dato_profundidad[$contador]);
	
			$id_nuevo=mysql_insert_id();
			$contador++;
		}
		
		$this->db->query('update tipo_red set valor_punto="'.$_POST['valorPunto'].'"');
	}
	
	function new_Config_Comision($id_grupo)
	{
		$q=$this->db->query('delete from valor_comisiones where id_grupo = '.$id_grupo);
		$i = 1;
		
			foreach( $_POST['configuracion'] as $profundidad ) {
				$datos = array(
						'profundidad' => $i,
						'id_grupo' => $id_grupo,
						'valor'	=> $profundidad
				);
				$this->db->insert("valor_comisiones",$datos);
				$i++;
			}
		
	}
	
}
