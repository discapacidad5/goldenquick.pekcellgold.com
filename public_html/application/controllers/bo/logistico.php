<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class logistico extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('bo/modelo_dashboard');
		$this->load->model('bo/general');
		$this->load->model('bo/modelo_logistico');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

				$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico/main_dashboard');
	}
	
	function inventario()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

				$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		
		$impuestos=$this->modelo_logistico->get_impuestos();
		$almacenes=$this->modelo_logistico->get_almacen();
		$mercancias=$this->modelo_logistico->get_mercancias();
		$mov_in=$this->modelo_logistico->get_tipo_mov(1);
		$mov_out=$this->modelo_logistico->get_tipo_mov(0);
		$entradas=$this->modelo_logistico->get_movimientos(1);
		$salidas=$this->modelo_logistico->get_movimientos(0);
		$data['almacenes']=$almacenes;
		$data['impuestos']=$impuestos;
		$data['mercancias']=$mercancias;
		$data['movimientos_in']=$mov_in;
		$data['movimientos_out']=$mov_out;
		$data['entradas']=$entradas;
		$data['salidas']=$salidas;

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico/inventario',$data);
	}
	
	function altas()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

				$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		
		$almacen=$this->modelo_logistico->get_almacenes();
		$data["almacen"]=$almacen;
		$web=$this->modelo_logistico->existe_almacen_web();
		$data["web"]=$web;
		
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico/altas',$data);
	}
	
	function surtido_embarques() 
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

				$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);
		
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);

		$surtidos=$this->modelo_logistico->get_surtidos();
		$data["surtidos"]=$surtidos;
		$por_embarcar=$this->modelo_logistico->get_embarque();
		$data["por_embarcar"]=$por_embarcar;
		$embarcados=$this->modelo_logistico->get_embarcados();
		$data["embarcados"]=$embarcados;
		
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico/surtido_embarques',$data);
	}
	
	function reportes()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

				$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico/reportes');
	}
	
	function bloqueo()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

				$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);
		$almacenes=$this->modelo_logistico->get_almacenes();
		$data["almacenes"]=$almacenes;
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico/bloqueo',$data);
	}
	
	function archivero()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

				$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);
		$archivos=$this->modelo_logistico->get_files($id);
		
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("archivos",$archivos);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico/archivero');
	}
	function new_entrada()
	{
		$this->modelo_logistico->insert_movimiento_in();
		redirect('/bo/logistico/inventario');
	}
	function new_salida()
	{	
		$this->modelo_logistico->insert_movimiento_out();
		redirect('/bo/logistico/inventario');
	}
	function calcular_movimiento_in()
	{
		$costo_q=$this->modelo_logistico->get_costo_real($_POST["mercancia"]);
		$importe=$costo_q[0]->real;
		$impuesto_q=$this->modelo_logistico->get_impuesto_espec($_POST["impuesto"]);
		$impuesto=$impuesto_q[0]->porcentaje;
		$subtotal=$importe*$_POST["cantidad"];
		$aumento=$subtotal*(($impuesto)/100);
		$total=$subtotal+$aumento;
		echo '	<section id="importe_sec_in" class="col col-3">
					<label class="input state-disabled"> <i class="icon-prepend fa fa-money"></i>
						<input id="importe_in"  required type="text" name="importe_in" placeholder="Importe" value='.$importe.'>
					</label>
				</section>
				<section id="subtotal_sec_in" class="col col-3">
					<label class="input state-disabled" > <i class="icon-prepend fa fa-pencil-square-o "></i>
						<input id="subtotal_in"  required type="text" name="subtotal_in" placeholder="Subtotal" value='.$subtotal.'>
					</label>
				</section>
				<section id="total_sec_in" class="col col-3">
					<label class="input state-disabled"> <i class="icon-prepend fa fa-money"></i>
						<input id="total_in"  required type="text"  name="total_in" placeholder="Importe" value='.$total.'>
					</label>
				</section>
				';
	}
	function calcular_movimiento_out()
	{
		$costo_q=$this->modelo_logistico->get_costo_real($_POST["mercancia"]);
		$importe=$costo_q[0]->real;
		$impuesto_q=$this->modelo_logistico->get_impuesto_espec($_POST["impuesto"]);
		$impuesto=$impuesto_q[0]->porcentaje;
		$subtotal=$importe*$_POST["cantidad"];
		$aumento=$subtotal*(($impuesto)/100);
		$total=$subtotal+$aumento;
		echo '	<section id="importe_sec_out" class="col col-3">
					<label class="input state-disabled"> <i class="icon-prepend fa fa-money"></i>
						<input id="importe_out"  required type="text"  name="importe_out" placeholder="Importe" value='.$importe.'>
					</label>
				</section>
				<section id="subtotal_sec_out" class="col col-3">
					<label class="input state-disabled" > <i class="icon-prepend fa fa-pencil-square-o "></i>
						<input id="subtotal_out"  required type="text" name="subtotal_out" placeholder="Subtotal" value='.$subtotal.'>
					</label>
				</section>
				<section id="total_sec_out" class="col col-3">
					<label class="input state-disabled"> <i class="icon-prepend fa fa-money"></i>
						<input id="total_out"  required type="text" name="total_out" placeholder="Importe" value='.$total.'>
					</label>
				</section>
				';
	}
	
	function detalle_movimiento()
	{
		$detalles=$this->modelo_logistico->get_detalle_movimiento($_POST['id']);
		echo '
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="widget-body no-padding">	
					<table class="table table-striped table-bordered table-hover" width="100%">
						<tbody>
							<tr>
								<td>Clave</td>
								<td>'.$detalles[0]->keyword.'</td>
							</tr>
							<tr>
								<td>Origen</td>
								<td>'.$detalles[0]->origen.'</td>
							</tr>
							<tr>
								<td>Destino</td>
								<td>'.$detalles[0]->destino.'</td>
							</tr>
							<tr>
								<td>Tipo</td>
								<td>'.$detalles[0]->tipo.'</td>
							</tr>
							<tr>
								<td>Fecha</td>
								<td>'.$detalles[0]->fecha.'</td>
							</tr>
							<tr>
								<td>Mercancia</td>
								<td>'.$detalles[0]->sku_2.'</td>
							</tr>
							<tr>
								<td>Impuesto</td>
								<td>'.$detalles[0]->impuesto.' '.$detalles[0]->porcentaje.'%</td>
							</tr>
							<tr>
								<td>Cantidad</td>
								<td>'.$detalles[0]->cantidad.'</td>
							</tr>
							<tr>
								<td>Importe</td>
								<td>'.$detalles[0]->importe.'</td>
							</tr>
							<tr>
								<td>Subtotal</td>
								<td>'.$detalles[0]->subtotal.'</td>
							</tr>
							<tr>
								<td>Total</td>
								<td>'.$detalles[0]->total.'</td>
							</tr>
						</tbody>
					</table>
				</div>
			</article>
		</div>';
	}
	function ver_existentes()
	{
		$mercancia=$_POST["mercancia"];
		$almacen=$_POST["almacen"];
		$cantidad=$_POST["cantidad"];
		//echo "Esta mercancia aun no tiene existencias en almacen";
		$mensaje=$this->modelo_logistico->ver_existentes($mercancia,$almacen,$cantidad);
		echo $mensaje;
	}
	function surtir()
	{
		$this->modelo_logistico->surtir();
		
		
	}
	function embarcar()
	{
		$this->modelo_logistico->embarcar();
	}
	function new_almacen()
	{
		$this->modelo_logistico->new_almacen();
		redirect('/bo/logistico/altas');
	}
	function estatus_almacen()
	{
		$this->modelo_logistico->estatus_almacen();
	}
	function eliminar_almacen()
	{
		$this->modelo_logistico->eliminar_almacen();
	}
	function almacen_form()
	{
		$datos=$this->modelo_logistico->get_almacen_especifico($_POST['id']);
		if($_POST["es_web"]==1)
		{
			echo '<div class="row">
					<form id="almacen_update" class="smart-form" method="post" action="new_almacen">
						<fieldset>
							<legend>Información del almacen</legend>
							<section id="usuario" class="col col-6" style="display:none;">
								<label class="input"> <i class="icon-prepend fa fa-user"></i>
									<input id="id" required type="text" name="id" value='.$_POST["id"].'>
								</label>
							</section>
							<section id="usuario" class="col col-6">
								<label class="input"> <i class="icon-prepend fa fa-user"></i>
									<input id="nombre" required type="text" name="nombre" placeholder="Nombre del Almacen" value="'.$datos[0]->nombre.'">
								</label>
							</section>
							<section id="correo" class="col col-6">
								<textarea name="descripcion" style="max-width: 96%" id="mymarkdown">'.$datos[0]->descripcion.'</textarea>
							</section>
							<section class="col col-6">Almacen Web
								<div class="inline-group">
									<label class="radio">
									<input type="radio" value="1" name="web" checked="">
									<i></i>Si</label>
									<label class="radio">
									<input type="radio" value="0" name="web" >
									<i></i>No</label>
								</div>
							</section>
						</fieldset>
					</form>
				</div>';
		}
		else
		{
			echo '<div class="row">
					<form id="almacen_update" class="smart-form" method="post" action="new_almacen">
						<fieldset>
							<legend>Información del almacen</legend>
							<section id="usuario" class="col col-6" style="display:none;">
								<label class="input"> <i class="icon-prepend fa fa-user"></i>
									<input id="id" required type="text" name="id" value='.$_POST["id"].'>
								</label>
							</section>
							<section id="usuario" class="col col-6">
								<label class="input"> <i class="icon-prepend fa fa-user"></i>
									<input id="nombre" required type="text" name="nombre" placeholder="Nombre del Almacen" value="'.$datos[0]->nombre.'">
								</label>
							</section>
							<section id="correo" class="col col-6">
								<textarea name="descripcion" style="max-width: 96%" id="mymarkdown">'.$datos[0]->descripcion.'</textarea>
							</section>';
							if($_POST["web"]==0)
							{
							echo '<section class="col col-6">Almacen Web
								<div class="inline-group">
									<label class="radio">
									<input type="radio" value="1" name="web" >
									<i></i>Si</label>
									<label class="radio">
									<input type="radio" value="0" name="web" checked="">
									<i></i>No</label>
								</div>
							</section>';
							}
							else
							{
							echo '<section class="col col-6">Almacen Web
								<div class="inline-group">
									<!--<label class="radio state-disabled">
									<input type="radio" value="1" name="web1" >
									<i></i>Si</label>-->
									<label class="radio state-disabled">
									<input type="radio" value="0" name="web" checked="">
									<i></i>No</label>
								</div>
							</section>';
							}
							echo '
						</fieldset>
					</form>
				</div>';
		}
	}
	function editar_almacen()
	{
		$this->modelo_logistico->editar_almacen();
	}
	function del_file_multiple()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$this->modelo_logistico->del_file_multiple();
	}
	function del_file()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$this->modelo_logistico->del_file();
		if(unlink(getcwd().$_POST['url']))
			echo "Su archivo fue borrado con exito";
	}
	function sube_archivo()
	{


		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();

		//Checamos si el directorio del usuario existe, si no, se crea
		if(!is_dir(getcwd()."/media/".$id))
		{
			mkdir(getcwd()."/media/".$id, 0777);
		}

		$ruta="/media/".$id."/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'hqx|cpt|csv|bin|dms|lha|lzh|exe|class|psd|so|sea|dll|oda|pdf|ai|eps|ps|smi|smil|mif|xls|ppt|pptx|wbxml|wmlc|dcr|dir|dxr|dvi|gtar|gz|php|php4|php3|phtml|phps|js|swf|sit|tar|tgz|xhtml|xht|zip|mid|midi|mpga|mp2|mp3|mp4|aif|aiff|aifc|ram|rm|rpm|ra|rv|wav|bmp|gif|jpeg|jpg|jpe|png|tiff|tif|css|html|htm|shtml|txt|text|log|rtx|rtf|xml|xsl|mpeg|mpg|mpe|qt|mov|avi|movie|doc|docx|xlsx|word|xl|eml|json';

		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);

		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_upload("foto"))
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->modelo_logistico->file_user($id,$data["upload_data"]);
		}
		
	}
	function get_mercancia_almacen()
	{
		$mercancias=$this->modelo_logistico->get_mercancia_almacen($_POST["almacen"]);
		echo "<option value='0' selected='' disabled=''>Selecciona Mercancia</option>";
		foreach($mercancias as $merc)
		{
			echo "
			<option value=".$merc->id_inventario.">".$merc->sku_2."</option>";
		}
	}
	function get_existencia()
	{
		$existencia=$this->modelo_logistico->get_existencia($_POST["inventario"]);
		echo $existencia;
	}
	function bloquear_mercancia()
	{
		$this->modelo_logistico->bloquear_mercancia($_POST["inventario"],$_POST["cantidad"]);
	}
	function reporte_usuarios_sio()
	{
		$administrador=$this->modelo_logistico->reporte_usuarios_sio($_POST["inicio"],$_POST["fin"]);
		echo 
			"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Fecha de Registro</th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Fecha de Nacimiento</th>
					<th>Sexo</th>
					<th>Estado Civil</th>
					<th>Estudios</th>
					<th>Ocupacion</th>
					<th>Tiempo Dedicado</th>
					<th>Estatus</th>
				</thead>
				<tbody>";
			foreach($administrador as $admin)
			{
					echo "<tr>
					<td class='sorting_1'>".$admin->id."</td>
					<td>".$admin->creacion."</td>
					<td>".$admin->usuario."</td>
					<td>".$admin->nombre."</td>
					<td>".$admin->apellido."</td>
					<td>".$admin->nacimiento."</td>
					<td>".$admin->sexo."</td>
					<td>".$admin->edo_civil."</td>
					<td>".$admin->estudio."</td>
					<td>".$admin->ocupacion."</td>
					<td>".$admin->tiempo."</td>
					<td>".$admin->estatus."</td>
				</tr>";
			}
				
			
			echo "</tbody>
			</table><tr class='odd' role='row'>";
	}
	function reporte_almacenes()
	{
		$almacenes=$this->modelo_logistico->reporte_almacenes($_POST["inicio"],$_POST["fin"]);
		echo 
			"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Creacion</th>
					<th>WEB</th>
					<th>Estatus</th>
				</thead>
				<tbody>";
			foreach($almacenes as $alm)
			{
				if($alm->web==1)
				{
					$web="Si";
				}
				else 
				{
					$web="No";	
				}
				if($alm->estatus=="ACT")
				{
					$estatus="Activado";
				}
				else 
				{
					$estatus="Desactivado";	
				}
					echo "<tr>
					<td class='sorting_1'>".$alm->id_almacen."</td>
					<td>".$alm->nombre."</td>
					<td>".$alm->descripcion."</td>
					<td>".$alm->creacion."</td>
					<td>".$web."</td>
					<td>".$estatus."</td>
				</tr>";
			}
				
			
			echo "</tbody>
			</table><tr class='odd' role='row'>";
	}
	function reporte_proveedores()
	{
		$proveedor=$this->modelo_logistico->reporte_proveedores();
		echo 
			"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Empresa</th>
					<th>Regimen</th>
					<th>Zona</th>
					<th>Razon Social</th>
					<th>CURP</th>
					<th>RFC</th>
					<th>Impuesto</th>
					<th>Condicion Pago</th>
					<th>Promedio Pago</th>
					<th>Plazo Pago</th>
					<th>Plazo Suspension</th>
					<th>Interes Moratorio</th>
					<th>Dia Corte</th>
					<th>Dia Pago</th>
				</thead>
				<tbody>";
				$j=0;
			foreach($proveedor as $prov)
			{
					echo "<tr>
					<td class='sorting_1'>".($j+1)."</td>
					<td>".$prov->emp."</td>
					<td>".$prov->abreviatura." (".$proveedor_p[$i]->reg.")</td>
					<td>".$prov->zona."</td>
					<td>".$prov->razon_social."</td>
					<td>".$prov->curp."</td>
					<td>".$prov->rfc."</td>
					<td>".$prov->imp."</td>
					<td>".$prov->condicion_pago."</td>
					<td>".$prov->promedio_pago."</td>
					<td>".$prov->plazo_pago."</td>
					<td>".$prov->plazo_suspencion."</td>
					<td>".$prov->interes_moratorio."</td>
					<td>".$prov->dia_corte."</td>
					<td>".$prov->dia_pago."</td>
				</tr>";
			}
				
			
			echo "</tbody>
			</table><tr class='odd' role='row'>";
		
	}
	function reporte_ventas_empresa()
	{
		$ventas=$this->modelo_logistico->reporte_ventas_empresa($_POST["inicio"],$_POST["fin"]);
		echo 
			"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID_empresa</th>
					<th>Empresa</th>
					<th>Total de Ventas</th>
					<th>Toatal de Ganancia</th>
					
				</thead>
				<tbody>";
				$j=0;
			foreach($ventas as $venta)
			{
					echo "<tr>
					<td class='sorting_1'>".$venta->id_empresa."</td>
					<td>".$venta->empresa."</td>
					<td>".$venta->total_ventas."</td>
					<td>".$venta->costo_total."</td>
				</tr>";
			}
				
			
			echo "</tbody>
			</table><tr class='odd' role='row'>";
	}
}