<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller
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
		$this->load->model('bo/model_admin');
		$this->load->model('bo/model_mercancia');
		$this->load->model('bo/general');
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

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/admin/main_dashboard');
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
		
		$style           = $this->modelo_dashboard->get_style($id);
		$sexo            = $this->model_admin->sexo();
		$civil           = $this->model_admin->edo_civil();
		$tipo            = $this->model_admin->get_user_type();
		$tipo_fiscal     = $this->model_admin->tipo_fiscal();
		$pais            = $this->model_admin->get_pais();
		$productos       = $this->model_admin->get_mercancia();
		$estudios        = $this->model_admin->get_estudios();
		$ocupacion       = $this->model_admin->get_ocupacion();
		$tiempo_dedicado = $this->model_admin->get_tiempo_dedicado();
		$proveedores	 = $this->model_admin->get_proveedor();
		$promo			 = $this->model_admin->get_promo();
		$grupo			 = $this->model_admin->get_grupo();
		$servicio		 = $this->model_admin->get_servicio();
		$producto		 = $this->model_admin->get_producto();
		$combinado		 = $this->model_admin->get_combinado();
		$impuesto		 = $this->model_admin->get_impuesto();
		$tipo_mercancia	 = $this->model_admin->get_tipo_mercancia();
		$tipo_proveedor	 = $this->model_admin->get_tipo_proveedor();
		$empresa	     = $this->model_admin->get_empresa();
		$regimen	     = $this->model_admin->get_regimen();
		$zona	         = $this->model_admin->get_zona();
		$inscripcion	 = $this->model_admin->get_paquete();
		$tipo_paquete	 = $this->model_admin->get_tipo_paquete();

		$this->template->set("productos",$productos);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("sexo",$sexo);
		$this->template->set("civil",$civil);
		$this->template->set("tipo",$tipo);
		$this->template->set("pais",$pais);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("proveedores",$proveedores);
		$this->template->set("promo",$promo);
		$this->template->set("grupo",$grupo);
		$this->template->set("servicio",$servicio);
		$this->template->set("producto",$producto);
		$this->template->set("combinado",$combinado);
		$this->template->set("impuesto",$impuesto);
		$this->template->set("tipo_mercancia",$tipo_mercancia);
		$this->template->set("tipo_proveedor",$tipo_proveedor);
		$this->template->set("empresa",$empresa);
		$this->template->set("regimen",$regimen);
		$this->template->set("zona",$zona);
		$this->template->set("inscripcion",$inscripcion);
		$this->template->set("tipo_paquete",$tipo_paquete);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/admin/altas');
	}
	
	function paises()
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
		
		
		$id=$this->tank_auth->get_user_id();
		$style = $this->modelo_dashboard->get_style($id);
		$pais = $this->model_admin->get_pais();
		$this->template->set("pais",$pais);
		$this->template->set("style",$style);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/admin/paises');
	}
	
	function dato_pais_multiple()
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
		
		
		if(isset($_POST['pais_check']))
		{
			foreach ($_POST['pais_check'] as $key){

				$dato_pais=$this->model_admin->get_dato_pais_($key);
				echo "<h1>".$dato_pais[0]->Name."</h1>";
				echo '<form id="'.$key.'"  class="smart-form"><div class="row">
				<input name="pais" type="hidden" value="'.$key.'">
				<section class="col col-6">
					<label class="label">Idioma</label>';
				
				foreach ($dato_pais as $idioma)
				{
					echo '<label class="checkbox">';
					if($idioma->estatus=='ACT')
					{
						echo '<input type="checkbox" value="'.$idioma->Language.'" checked="checked" name="idioma[]">
						<i></i>'.utf8_decode($idioma->Language).'</label></li>';
					}
					else
					{
						echo '<input value="'.$idioma->Language.'" type="checkbox" name="idioma[]">
						<i></i>'.utf8_decode($idioma->Language).'</label></li>';
					}
				}
				echo '</section><section class="col col-6">';
				if($dato_pais[0]->estado_pais=="ACT")
				{
					echo '<label class="toggle">
						<input type="checkbox" checked="checked" name="estado_pais">
						<i data-swchoff-text="DES" data-swchon-text="ACT"></i>El país está</label>';
				}
				else
				{
					echo '<label class="toggle">
					<input type="checkbox" name="estado_pais" >
					<i data-swchoff-text="DES" data-swchon-text="ACT"></i>El país está</label>';
				}
				echo '</section><section class="col col-6">';
				if($dato_pais[0]->estatus_m=="ACT")
				{
					echo '<label class="toggle">
					<input type="checkbox" checked="checked" name="estado_moneda">
					<i data-swchoff-text="DES" data-swchon-text="ACT"></i> Moneda: '.utf8_decode($dato_pais[0]->moneda).'</label>';
				}
				else
				{
					echo '<label class="toggle">
					<input type="checkbox" name="estado_moneda">
					<i data-swchoff-text="DES" data-swchon-text="ACT"></i> Moneda: '.utf8_decode($dato_pais[0]->moneda).'</label>';
				}
				echo '</section></div></form>';
				echo "<hr />";
			}
		}
	}
	
	function use_keyword()
	{
		$use_keyword=$this->model_admin->use_keyword();
		if($use_keyword)
		{
			echo "La identificación no está disponible";
		}
	}
	function cuenta()
	{
		$cuenta = $this->model_admin->get_banco();
	}
	function new_user()
	{
		$id=$this->tank_auth->get_user_id();
		$this->model_admin->new_user($id);
	}
	function new_empresa()
	{
		
		$empresa = $this->model_admin->new_empresa();
		echo json_encode($empresa);
	}

	function new_proveedor()
	{
		$id=$this->tank_auth->get_user_id();
		$this->model_admin->new_proveedor($id);
	}
	function estado_mercancia()
	{
		$this->model_admin->estado_mercancia();
	}
	
	function del_merc()
	{
		$id = $_POST['id'];
		
		
		$esta = $this->model_admin->ver_si_merc_ha_sido_vendida($id);
		
		if ($esta == NULL){
			
			$datos = $this->model_admin->del_merc($id);
			
			if(unlink($_SERVER['DOCUMENT_ROOT'].$datos[0]->url)){
				//echo "File Deleted.";
			}
			
			$this->model_admin->del_tipo_merc($datos[0]->id_tipo_mercancia, $datos[0]->sku);
			$this->model_admin->del_imagen($datos[0]->id_img);
			$this->model_admin->del_cross_imagen_merc($datos[0]->id_img);
			
			echo "Se ha eliminado la mercancia.";
		}
		else {
			echo "Ha ocurrido un error eliminando la mercancia, debido a que la mercancia tiene un historial de ventas.
					<br> Lo mas recomendable es que desactive la mercancia del carrito de compras.";
		}
	}
	
	function new_grupo()
	{
		$this->model_admin->new_grupo();
	}
	function edit_merc()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
			
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}
		$style = $this->modelo_dashboard->get_style(1);
		$usuario = $this->general->get_username($id);
		
		$promo          = $this->model_admin->get_promo();
		$grupos         = $this->model_mercancia->CategoriasMercancia();
		$servicio       = $this->model_admin->get_servicio();
		$producto       = $this->model_admin->get_producto();
		$combinado      = $this->model_admin->get_combinado();
		$impuesto       = $this->model_admin->get_impuesto();
		$tipo_mercancia = $this->model_admin->get_tipo_mercancia();
		$tipo_proveedor = $this->model_admin->get_tipo_proveedor();
		$empresa        = $this->model_admin->get_empresa();
		$regimen        = $this->model_admin->get_regimen();
		$zona           = $this->model_admin->get_zona();
		$merc           = $this->model_admin->mercancia_by_id();
		$pais           = $this->model_admin->get_pais_activo();
		$id_merc 		= $merc[0]->id_tipo_mercancia;
		$sku			= $merc[0]->sku;
		$red          = $this->model_admin->get_red();
		
		$data_merc 		= $this->model_admin->get_data_mercancia($id_merc,$sku);
		$img       		= $this->model_admin->get_img_merc();
		$mercancia 		= $this->model_admin->get_mercancia_espec($_POST['id']);
		$impuestos_merc	= $this->model_admin->get_impuestos_mercancia($_POST['id']);
		
		$this->template->set("grupos",$grupos);
		echo '<div class="row">
				<form class="smart-form" id="update_merc" method="post" action="/bo/admin/update_mercancia" enctype="multipart/form-data" novalidate="novalidate">  
			<h3><center><b>Editar mercancía '.$data_merc[0]->nombre.'</b></center></h3>';
		if($id_merc==1)
		{
			
			$id=$this->tank_auth->get_user_id();
			
			$id_mercancia = $_POST['id'];
			$proveedores    = $this->model_admin->get_proveedor2(1);
			
			$this->template->set("id_mercancia",$id_mercancia);
			$this->template->set("data_merc",$data_merc);
			//$this->template->set("grupo",$grupo);
			$this->template->set("img",$img);
			$this->template->set("mercancia",$mercancia);
			$this->template->set("proveedores",$proveedores);
			$this->template->set("pais",$pais);
			$this->template->set("impuestos_merc",$impuestos_merc);
			$this->template->set("impuesto",$impuesto);
			$this->template->set("style",$style);
			$this->template->build('website/bo/comercial/altas/modificar_producto');
		/*
			echo '<fieldset>
				<section class="col col-6" style="display:none;">
		            <label class="select"> 
		                <select id="tipo_merc" required name="tipo_merc">
		                	<option value="1">merc</option>
		                    </select>
		            </label>
		        </section>
		        <section class="col col-6" style="display:none;">
		            <label class="select"> 
		                <select id="id_merc" required name="id_merc">
		                	<option value="'.$_POST['id'].'">merc</option>
		                    </select>
		            </label>
		        </section>
		        <section class="col col-6">
		           <label class="input">Nombre
		               <input required type="text" value="'.$data_merc[0]->nombre.'" id="nombre_p" name="nombre">
		            </label>
		        </section>
		        <section class="col col-6">
		            <label class="input">Concepto
		                <input required type="text" value="'.$data_merc[0]->concepto.'" id="concepto" name="concepto">
		            </label>
		        </section>
		        <section class="col col-6">
		            <label class="input">Marca
		                <input type="text" value="'.$data_merc[0]->marca.'" name="marca" id="marca">
		            </label>
		        </section>
		        <section class="col col-6">
		            <label class="input">Código de barras
		                <input type="text" value="'.$data_merc[0]->codigo_barras.'" name="codigo_barras">
		            </label>
		        </section>
		        <section class="col col-6">Red
					<label class="select"> 
						<select name="red">';
						foreach ($red as $key){
							echo ($data_merc[0]->nombre_red==$key->nombre) ? '<option selected value="'.$key->id.'">'.$key->nombre.'</option>' : '<option value="'.$key->id.'">'.$key->nombre.'</option>';
						}
						echo '</select>
					</label>
				</section>
		        <div>
		            <section style="padding-left: 0px;" class="col col-6">Descripcion
		                <textarea name="descripcion" cols="60" style="min-width: 100%; max-width: 100%" id="mymarkdown">'.$data_merc[0]->descripcion.'</textarea>
		            </section>
		             <section id="imagenes2" class="col col-12">
		                <label class="label">Imágen actual</label>';
		                foreach ($img as $key)
		                {
		                	echo'<div class="no-padding col-xs-12 col-sm-12 col-md-6 col-lg-6"><img style="max-height: 150px;" src="'.$key[0]->url.'"></div>';
		                }
		            echo '</section>
		            <section id="imagenes" class="col col-12">
		                <label class="label">Imágen</label>
		                <div class="input input-file"><span class="button"><input id="img" name="img[]" onchange="this.parentNode.nextSibling.value=this.value" type="file" multiple>Buscar</span>
		                    <input placeholder="Agregar alguna imágen" readonly="" type="text">
		                </div>
		                <small>Para cargar múltiples archivos, presione la tecla ctrl y sin soltar selecione sus archivos.<br/><cite title="Source Title">Para ver los archivos que va a cargar, deje el puntero sobre el boton de "Buscar"</cite></small>
		            </section>
		        </div>
		    </fieldset>
		    <fieldset>
		        <legend>Fisicos</legend>
		        <section class="col col-4">
		            <label class="input">Peso
		                <input required type="number" value="'.$data_merc[0]->peso.'" min="0" name="peso">
		            </label>
		        </section>
		        <section id="colonia" class="col col-4">
		            <label class="input">Alto
		                <input type="number" min="0" value='.$data_merc[0]->alto.' name="alto">
		            </label>
		        </section>
		        <section id="municipio" class="col col-4">
		            <label class="input">Ancho
		                <input type="number" min="0" value="'.$data_merc[0]->ancho.'" name="ancho">
		            </label>
		        </section>
		        <section id="municipio" class="col col-4">
		            <label class="input">Profundidad
		                <input type="number" min="0" value="'.$data_merc[0]->profundidad.'" name="profundidad">
		            </label>
		        </section>
		        <section id="municipio" class="col col-4">
		            <label class="input">Diametro
		                <input type="number" min="0" value="'.$data_merc[0]->diametro.'" name="diametro">
		            </label>
		        </section>
		    </fieldset>
		    <fieldset>
		        <legend>Moneda y país</legend>
		        <section class="col col-6">
		            <label class="input">Cantidad mínima de venta
		                <input type="text" value="'.$data_merc[0]->min_venta.'" name="min_venta">
		            </label>
		        </section>
		        <section class="col col-6">
		            <label class="input">Cantidad máxima de venta
		                <input type="text" value="'.$data_merc[0]->max_venta.'" name="max_venta">
		            </label>
		        </section>
		        <section class="col col-6">
		            <label class="input">Costo distribuidores
		                <input type="text" value="'.$mercancia[0]->costo.'" name="costo">
		            </label>
		        </section>
		        <section class="col col-6">
					<label class="input">
						Costo real
						<input type="text" value="'.$mercancia[0]->real.'" name="real" >
					</label>
				</section>
		        <section class="col col-6">
		            <label class="input">Costo publico
		               <input type="text" value="'.$mercancia[0]->costo_publico.'" name="costo_publico">
		            </label>
		        </section>
		        <section class="col col-6">
					<label class="input">
						Tiempo mínimo de entrega
						<input placeholder="En días" type="text" value="'.$mercancia[0]->entrega.'" name="entrega" >
					</label>
				</section>';
				foreach($impuestos_merc as $merc)
				{
					echo'
			        <section class="col col-6">Impuesto
						<label class="select">
							<select name="id_impuesto[]">';
							foreach ($impuesto as $key){
								if($merc->id_impuesto==$key->id_impuesto)
								{
									echo'<option value="'.$key->id_impuesto.'">'.$key->descripcion.' '.$key->porcentaje.' % (ACTIVO)</option>';
								}
								else
								{
									echo'<option value="'.$key->id_impuesto.'">'.$key->descripcion.' '.$key->porcentaje.' %</option>';
								}
								
							}
	
							echo'</select>
						</label>
						<a href="#" onclick="add_impuesto_boot()">Agregar impuesto<i class="fa fa-plus"></i></a>
					</section>';
				}
				echo '
		        <section class="col col-6">Proveedor
		            <label class="select"> 
		                <select name="proveedor">';
		                    foreach ($proveedores as $key){
		                    	if($key->id_usuario==$mercancia[0]->id_proveedor)
								{
		                        	echo'<option value="'.$key->id_usuario.'">'.
		                            	$key->nombre.' '.$key->apellido.' comisión: %
		                                '.$key->comision.' (ACTIVA)</option>';
		                        }
								else
								{
									echo'<option value="'.$key->id_usuario.'">'.
		                            	$key->nombre.' '.$key->apellido.' comisión: %
		                                '.$key->comision.'</option>';
								}
							}
		                echo '</select>
		            </label>
		        </section>
		        <section class="col col-6">País del producto
		            <label class="select"> 
		                <select id="pais" required name="pais">';
		                    foreach ($pais as $key){
		                        echo '<option value="'.$key->Code.'">'.
		                            $key->Name.'</option>';
		                        }
		                echo '</select>
		            </label>
		        </section>
		        <section class="col col-6">
					<label class="input">
						Puntos comisionables
						<input type="number" min="1" max="" value="'.$mercancia[0]->puntos_comisionables.'" name="puntos_com" id="puntos_com">
					</label>
				</section>
		    </fieldset>
		    <fieldset>
		        <legend>Extra</legend>
		        <section class="col col-4">Requiere instalación
		            <div class="inline-group">';
		            	if($data_merc[0]->instalacion==1)
						{
							echo 
			                '<label class="radio">
			                    <input type="radio" value="1" checked name="instalacion"><i></i>Si</label>
			                <label class="radio">
			                    <input type="radio" value="0" name="instalacion"><i></i>No</label>';
						}
						else {
							echo 
			                '<label class="radio">
			                    <input type="radio" value="1" name="instalacion"><i></i>Si</label>
			                <label class="radio">
			                    <input type="radio" value="0" checked name="instalacion"><i></i>No</label>';
						} 
		            echo '</div>
		        </section>
		        <section class="col col-4">Requiere especificación
		            <div class="inline-group">';
		            	if($data_merc[0]->especificacion==1)
						{
							echo '
							<label class="radio">
			                    <input type="radio" value="1" checked name="especificacion"><i></i>Si</label>
			                <label class="radio">
			                    <input type="radio" value="0" name="especificacion"><i></i>No</label>';
						}
						else 
						{
							echo '
							<label class="radio">
			                    <input type="radio" value="1" name="especificacion"><i></i>Si</label>
			                <label class="radio">
			                    <input type="radio" value="0" checked name="especificacion"><i></i>No</label>';
						}
		                
		            echo'</div>
		        </section>
		        <section class="col col-4">Requiere producción
		            <div class="inline-group">';
						if($data_merc[0]->produccion==1)
						{
							echo'
							<label class="radio">
			                    <input type="radio" value="1" checked name="produccion"><i></i>Si</label>
			                <label class="radio">
			                    <input type="radio" value="0" name="produccion"><i></i>No</label>';
						}
						else
						{
							echo '
							<label class="radio">
			                    <input type="radio" value="1" name="produccion"><i></i>Si</label>
			                <label class="radio">
			                    <input type="radio" value="0" checked name="produccion"><i></i>No</label>';		
						}
					
		            echo '</div>
		        </section>
		        <section class="col col-4">Producto de importación
		            <div class="inline-group">';
						if($data_merc[0]->importacion==1)
						{
							echo'
							<label class="radio">
			                    <input type="radio" value="1" checked name="importacion"><i></i>Si</label>
			                <label class="radio">
			                    <input type="radio" value="0" name="importacion"><i></i>No</label>';
						}
						else
						{
							echo '
							<label class="radio">
			                    <input type="radio" value="1" name="importacion"><i></i>Si</label>
			                <label class="radio">
			                    <input type="radio" value="0" checked name="importacion"><i></i>No</label>';		
						}
		                
		            echo '</div>
		        </section>
		        <section class="col col-4">Producto de sobrepedido
		            <div class="inline-group">';
		            	if($data_merc[0]->sobrepedido==1)
						{
							echo'
							<label class="radio">
			                    <input type="radio" value="1" checked name="sobrepedido"><i></i>Si</label>
			                <label class="radio">
			                    <input type="radio" value="0" name="sobrepedido"><i></i>No</label>';
						}
						else
						{
							echo '
							<label class="radio">
			                    <input type="radio" value="1" name="sobrepedido"><i></i>Si</label>
			                <label class="radio">
			                    <input type="radio" value="0" checked name="sobrepedido"><i></i>No</label>';		
						}
		                
		            echo '</div>
		        </section>
		    </fieldset>

			<script>
		    	$("#mymarkdown").markdown({
					autofocus:false,
					savable:false
				})
		            		
		   	</script>';*/
		}
		if($id_merc==2)
		{
			$id_mercancia = $_POST['id'];
			
			$proveedores    = $this->model_admin->get_proveedor2(2);
			$this->template->set("id_mercancia",$id_mercancia);
			$this->template->set("data_merc",$data_merc);
			//$this->template->set("red",$red);
			$this->template->set("img",$img);
			$this->template->set("mercancia",$mercancia);
			$this->template->set("proveedores",$proveedores);
			$this->template->set("pais",$pais);
			$this->template->set("impuestos_merc",$impuestos_merc);
			$this->template->set("impuesto",$impuesto);
			$this->template->set("style",$style);
			$this->template->build('website/bo/comercial/altas/modificar_servicio');
		/*
		    echo '<fieldset>
		    	<section class="col col-6" style="display:none;">
		            <label class="select"> 
		                <select id="pais" required name="tipo_merc">
		                	<option value="2">merc</option>
		                    </select>
		            </label>
		        </section>
		        <section class="col col-6" style="display:none;">
		            <label class="select"> 
		                <select id="id_merc" required name="id_merc">
		                	<option value="'.$_POST['id'].'">merc</option>
		                    </select>
		            </label>
		        </section>
		        <section class="col col-6">
		            <label class="input">Nombre
		                <input required type="text" value="'.$data_merc[0]->nombre.'" id="nombre_s" name="nombre">
		            </label>
		        </section>
		        <section class="col col-6">
		            <label class="input">Concepto
		                <input required type="text" value="'.$data_merc[0]->concepto.'" id="concepto" name="concepto">
		            </label>
		        </section>
		        <section class="col col-6">
		            <label class="input">Fecha de inicio
		                <input required type="text" value="'.$data_merc[0]->fecha_inicio.'" name="fecha_inicio" id="startdate" /> </label>
		        </section>
		        <section class="col col-6">
		            <label class="input">Fecha de termino
		                <input type="text" value="'.$data_merc[0]->fecha_fin.'" name="fecha_fin" id="finishdate" /> </label>
		        </section>
		        <div>
		            <section style="padding-left: 0px;" class="col col-6">Descripcion
		                <textarea name="descripcion" style="max-width: 100%" cols="60" id="mymarkdown">'.$data_merc[0]->descripcion.'</textarea>
		            </section>';
		            
		            foreach ($img as $key)
		                {
		                	echo'<div class="no-padding col-xs-12 col-sm-12 col-md-6 col-lg-6"><img style="max-height: 150px;" src="'.$key[0]->url.'"></div>';
		                }
					echo'
					
		            <section id="imagenes" class="col col-12">
		                <label class="label">Imágen</label>
		                <div class="input input-file"><span class="button"><input id="img" name="img[]" onchange="this.parentNode.nextSibling.value=this.value" type="file" multiple>Buscar</span>
		                    <input placeholder="Agregar alguna imágen" readonly="" type="text">
		                </div><small>Para cargar múltiples archivos, presione la tecla ctrl y sin soltar selecione sus archivos.<br/><cite title="Source Title">Para ver los archivos que va a cargar, deje el puntero sobre el boton de "Buscar"</cite></small>
		            </section>
		        </div>
		    </fieldset>
		    <fieldset id="moneda_field_boot">
		        <legend>Moneda y país</legend>
		        <section class="col col-6">
		            <label class="input">Costo distribuidores
		                <input type="text" value="'.$mercancia[0]->costo.'" name="costo">
		            </label>
		        </section>
		        <section class="col col-6">
					<label class="input">
						Costo real
						<input type="text" value="'.$mercancia[0]->real.'" name="real" >
					</label>
				</section>
		        <section class="col col-6">
		            <label class="input">Costo publico
		               <input type="text" value="'.$mercancia[0]->costo_publico.'" name="costo_publico">
		            </label>
		        </section>
		        <section class="col col-6">
					<label class="input">
						Tiempo mínimo de entrega
						<input placeholder="En días" type="text" value="'.$mercancia[0]->entrega.'" name="entrega" >
					</label>
				</section>';
				foreach($impuestos_merc as $merc)
				{
					echo'
			        <section class="col col-6">Impuesto
						<label class="select">
							<select name="id_impuesto[]">';
							foreach ($impuesto as $key){
								if($merc->id_impuesto==$key->id_impuesto)
								{
									echo'<option value="'.$key->id_impuesto.'">'.$key->descripcion.' '.$key->porcentaje.' % (ACTIVO)</option>';
								}
								else
								{
									echo'<option value="'.$key->id_impuesto.'">'.$key->descripcion.' '.$key->porcentaje.' %</option>';
								}
							}
	
							echo'</select>
						</label>
						<a href="#" onclick="add_impuesto_boot()">Agregar impuesto<i class="fa fa-plus"></i></a>
					</section>';
				}
				echo '
		        <section class="col col-6">Proveedor
		            <label class="select"> 
		                <select name="proveedor">';
		                    foreach ($proveedores as $key){
		                        echo'<option value="'.$key->id_usuario.'">'.
		                            $key->nombre.' '.$key->apellido.' comisión: %
		                                '.$key->comision.'</option>';
		                        }
		                echo '</select>
		            </label>
		        </section>
		        <section class="col col-6">País del producto
		            <label class="select"> 
		                <select id="pais" required name="pais">';
		                    foreach ($pais as $key){
		                        echo '<option value="'.$key->Code.'">'.
		                            $key->Name.'</option>';
		                        }
		                echo '</select>
		            </label>
		        </section>
		        <section class="col col-6">
					<label class="input">
						Puntos comisionables
						<input type="number" min="1" max="" value="'.$mercancia[0]->puntos_comisionables.'" name="puntos_com" id="puntos_com">
					</label>
				</section>
		    </fieldset>
				
				<script>
								
					$("#mymarkdown").markdown({
							autofocus:false,
							savable:false
					})

					$("#startdate").datepicker({
						changeMonth: true,
						numberOfMonths: 2,
						dateFormat:"yy-mm-dd",
						changeYear: true,
						prevText : "<i class=\'fa fa-chevron-left\'></i>",
						nextText : "<i class=\'fa fa-chevron-right\'></i>",
						onSelect : function(selectedDate) {
							$("#finishdate").datepicker("option", "minDate", selectedDate);
						}
					});
					
					$("#finishdate").datepicker({
						changeMonth: true,
						numberOfMonths: 2,
						dateFormat:"yy-mm-dd",
						changeYear: true,
						prevText : "<i class=\'fa fa-chevron-left\'></i>",
						nextText : "<i class=\'fa fa-chevron-right\'></i>",
						onSelect : function(selectedDate) {
							$("#startdate").datepicker("option", "maxDate", selectedDate);
						}
					});</script>';*/
			}
			if($id_merc==3)
			{
				$prods=$this->model_admin->get_prod_combinado($_POST['id']);
				$servs=$this->model_admin->get_serv_combinado($_POST['id']);
				$proveedores    = $this->model_admin->get_proveedor2(3);
				
				$id_mercancia = $_POST['id'];
				
				
				$this->template->set("id_mercancia",$id_mercancia);
				$this->template->set("data_merc",$data_merc);
				$this->template->set("red",$red);
				$this->template->set("img",$img);
				$this->template->set("mercancia",$mercancia);
				$this->template->set("proveedores",$proveedores);
				$this->template->set("pais",$pais);
				$this->template->set("impuestos_merc",$impuestos_merc);
				$this->template->set("impuesto",$impuesto);
				$this->template->set("prods",$prods);
				$this->template->set("servs",$servs);
				$this->template->set("producto",$producto);
				$this->template->set("servicio",$servicio);
				$this->template->set("style",$style);
				$this->template->build('website/bo/comercial/altas/modificar_combinado');
				/*
				echo '
			<fieldset>
				<legend>Datos <span id="tipo_mercancia_txt">del paquete</span></legend>
				<section class="col col-6" style="display:none;">
		            <label class="select"> 
		                <select id="pais" required name="tipo_merc">
		                	<option value="3">merc</option>
		                    </select>
		            </label>
		        </section>
		        <section class="col col-6" style="display:none;">
		            <label class="select"> 
		                <select id="id_merc" required name="id_merc">
		                	<option value="'.$_POST['id'].'">merc</option>
		                    </select>
		            </label>
		        </section>
			<section class="col col-6">
           <label class="input">Nombre
                <input type="text" name="nombre" id="nombre_pr" value="'.$data_merc[0]->nombre.'">
            </label>
        </section>
			<div id="tipo_promo">
			 <section class="col col-6">
	           <label class="input"><span id="labelextra">Descuento del paquete</span>
	                <input id="precio_promo" type="text" name="descuento" value="'.$data_merc[0]->descuento.'">
	            </label>
	        </section><div class="row"><br /></div>';
	        foreach($prods as $key_1)
			{
				echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="prods">
				        <section class="col col-8">Productos
		            <label class="select">
		                <select class="custom-scroll"  name="producto[]">';
		                    foreach ($producto as $key){
		                    	if($key_1->id_producto==$key->id_mercancia)
								{
		                        	echo '<option selected value="'.$key->id_mercancia.'">
		                            '.$key->nombre.' (ACTIVO)</option>';
		                        }
								else
								{
									echo '<option value="'.$key->id_mercancia.'">
		                            '.$key->nombre.'</option>';
								}
							}
										
		                echo '</select>
		            </label>
		        </section>
		        <section class="col col-4">
		           <label class="input">Cantidad de productos
		                <input type="number" min="1" name="n_productos[]" id="prod_qty" value="'.$key_1->cantidad_producto.'">
		            </label>
		        </section>
		        </div>';
			}
		foreach($servs as $key_1)
		{
			echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="servs">
		        <section class="col col-8">Servicios
			            <label class="select">
			                <select class="custom-scroll" name="servicio[]">
		                        ';
			                    foreach ($servicio as $key){
			                    	if($key_1->id->servicio==$key->id_mercancia)
									{
			                        echo '<option selected value="'.$key->id_mercancia.'">'
			                            .$key->nombre.' (ACTIVO)</option>';
			                        }
									else 
									{
										echo '<option value="'.$key->id_mercancia.'">'
			                            .$key->nombre.'</option>';
									}
								}
			                echo '</select>
			            </label>
			        </section>
			        <section class="col col-4">
			           <label class="input">Cantidad de servicios
			                <input type="number" min="1" name="n_servicios[]" id="serv_qty" value="'.$key_1->cantidad_servicio.'">
			            </label>
			        </section>
			       </div>';
		}
		echo '
		    </div>
	        </fieldset>
	        <div id="agregar" class=" text-center row"><a onclick="new_product()">Agregar producto <i class="fa fa-plus"></i></a>  <a  onclick="new_service()">Agregar servicio <i class="fa fa-plus"></i></a></div>
		    <div id="moneda"><fieldset id="moneda_field">
        <legend>Moneda y país</legend>
        <section class="col col-6">
			<label class="input">
				Costo real
				<input type="text" name="real" id="real" value="'.$mercancia[0]->real.'">
			</label>
		</section>
        <section class="col col-6">
            <label class="input">Costo distribuidores
                <input type="text" name="costo" id="costo" value="'.$mercancia[0]->costo.'">
            </label>
        </section>
        <section class="col col-6">
            <label class="input">Costo publico
                <input type="text" name="costo_publico" id="costo_publico" value="'.$mercancia[0]->costo_publico.'">
            </label>
        </section>
        <section class="col col-6">
			<label class="input">
				Tiempo mínimo de entrega
				<input placeholder="En días" type="text" name="entrega" id="entrega" value="'.$mercancia[0]->entrega.'">
			</label>
		</section>';
        foreach($impuestos_merc as $merc)
				{
					echo'
			        <section class="col col-6">Impuesto
						<label class="select">
							<select name="id_impuesto[]">';
							foreach ($impuesto as $key){
								if($merc->id_impuesto==$key->id_impuesto)
								{
									echo'<option value="'.$key->id_impuesto.'">'.$key->descripcion.' '.$key->porcentaje.' % (ACTIVO)</option>';
								}
								else
								{
									echo'<option value="'.$key->id_impuesto.'">'.$key->descripcion.' '.$key->porcentaje.' %</option>';
								}
								
							}
	
							echo'</select>
						</label>
						<a onclick="add_impuesto()">Agregar impuesto<i class="fa fa-plus"></i></a>
					</section>';
				}
        echo '<section class="col col-6">Proveedor
            <label class="select">
                <select name="proveedor">';
                    foreach ($proveedores as $key){
                        echo '<option value="'.$key->id_usuario.'">'
                            .$key->nombre.' '.$key->apellido.' comisión: %'
                                .$key->comision.'</option>';
                        }
                echo '</select>
            </label>
        </section>
        <section class="col col-6">País del producto
            <label class="select">
                <select id="pais" required name="pais">';
                    foreach ($pais as $key){
                        echo '<option value="'.$key->Code.'">'
                            .$key->Name.'</option>';
                        }
                echo '</select>
            </label>
        </section>
        <section class="col col-6">
			<label class="input">
				Puntos comisionables
				<input type="number" min="1" max="" name="puntos_com" id="puntos_com" value="'.$mercancia[0]->puntos_comisionables.'">
			</label>
		</section>
    </fieldset></div>
        <div>
            <section style="padding-left: 0px;" class="col col-6">Descripcion
                <textarea name="descripcion" cols="60" style="min-width: 100%; max-width: 100%" id="mymarkdown">'.$data_merc[0]->descripcion.'</textarea>
            </section>
             <section id="imagenes2" class="col col-12">
                <label class="label">Imágenes actuales</label>';
                foreach ($img as $key)
                {
                	echo'<div class="no-padding col-xs-12 col-sm-12 col-md-6 col-lg-6"><img style="max-height: 150px;" src="'.$key[0]->url.'"></div>';
                }
            echo '</section>
            <section id="imagenes" class="col col-12">
                <label class="label">Imágen</label>
                <div class="input input-file"><span class="button"><input id="img" name="img[]" onchange="this.parentNode.nextSibling.value=this.value" type="file" multiple>Buscar</span>
                    <input placeholder="Agregar alguna imágen" readonly="" type="text">
                </div>
                <small>Para cargar múltiples archivos, presione la tecla ctrl y sin soltar selecione sus archivos.<br/><cite title="Source Title">Para ver los archivos que va a cargar, deje el puntero sobre el boton de "Buscar"</cite></small>
            </section>
        </div>
    </fieldset>
            		<footer>
								<button type="submit" class="btn btn-success">Agregar</button>
							</footer>';
    }

		echo '</form></div>';
	*/	
		}
	}
	
	function new_mercancia()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}

		$usuario=$this->general->get_username($id);

		if(!isset($_POST['proveedor']))
			$_POST['proveedor']='Ninguno';
		
		$id=$this->tank_auth->get_user_id();
		$sku=$this->model_admin->new_mercancia();

		$ruta="/media/carrito/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_width']  		= '4096';
		$config['max_height']   	= '3112';

		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_multi_upload('img'))
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->get_multi_upload_data());
			if($_POST['tipo_mercancia']==3&&$_POST['tipo']==2)
				$this->model_admin->img_merc_promo($sku,$data["upload_data"]);
			else
				$this->model_admin->img_merc($sku,$data["upload_data"]);
		}
		redirect('/bo/comercial/index');
	}
	function use_mail()
	{
		$use_mail=$this->model_admin->use_mail();
		if($use_mail)
		{
			echo "La cuenta de correo ya no está disponible";
		}
	}
	function actualiza_pais()
	{
		$this->model_admin->update_pais();
	}
	function afiliar_nuevo()
	{
		$id=$this->tank_auth->get_user_id();
		$this->model_admin->afiliar_nuevo($id);
	}
	function use_username()
	{
		$use_username=$this->model_admin->use_username();
		if($use_username)
		echo "El usuario no está disponible";
	}
	function dato_pais()
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
		
		$dato_pais=$this->model_admin->get_dato_pais();
		
		echo '<form id="'.$_POST['pais'].'"  class="smart-form"><div class="row">
		<input name="pais" type="hidden" value="'.$_POST['pais'].'">
		<section class="col col-6">
			<label class="label">Idioma</label>';
		
		foreach ($dato_pais as $idioma)
		{
			echo '<label class="checkbox">';
			if($idioma->estatus=='ACT')
			{
				echo '<input type="checkbox" value="'.$idioma->Language.'" checked="checked" name="idioma[]">
				<i></i>'.utf8_decode($idioma->Language).'</label></li>';
			}
			else
			{
				echo '<input value="'.$idioma->Language.'" type="checkbox" name="idioma[]">
				<i></i>'.utf8_decode($idioma->Language).'</label></li>';
			}
		}
		echo '</section><section class="col col-6">';
		if($dato_pais[0]->estado_pais=="ACT")
		{
			echo '<label class="toggle">
				<input type="checkbox" checked="checked" name="estado_pais">
				<i data-swchoff-text="DES" data-swchon-text="ACT"></i>El país está</label>';
		}
		else
		{
			echo '<label class="toggle">
			<input type="checkbox" name="estado_pais" >
			<i data-swchoff-text="DES" data-swchon-text="ACT"></i>El país está</label>';
		}
		echo '</section><section class="col col-6">';
		if($dato_pais[0]->estatus_m=="ACT")
		{
			echo '<label class="toggle">
			<input type="checkbox" checked="checked" name="estado_moneda">
			<i data-swchoff-text="DES" data-swchon-text="ACT"></i> Moneda: '.utf8_decode($dato_pais[0]->moneda).'</label>';
		}
		else
		{
			echo '<label class="toggle">
			<input type="checkbox" name="estado_moneda">
			<i data-swchoff-text="DES" data-swchon-text="ACT"></i> Moneda: '.utf8_decode($dato_pais[0]->moneda).'</label>';
		}
		echo '</section></div></form>';

	}
	function cp()
	{
		if(strlen($_POST['cp'])>3)
		{
			$busqueda=$this->model_admin->cp();
			if($busqueda)
			{
				$id_estado=$busqueda[0]->id_estado;
				$estado=$this->model_admin->estado($id_estado);

				echo '<section id="colonia" class="col col-2">Colonia
						<label class="select">
						<select name="colonia">';
				foreach ($busqueda as $key)
				{
					echo' <option value="'.$key->colonia.'">'.$key->colonia.'</option>';
				}
				echo '</select> <i></i> </label>
					</section>
					<section id="municipio" class="col col-2">Municipio
						<label class="select">
						<select name="municipio">';
				foreach ($busqueda as $key)
				{
					echo '<option value="'.$key->municipio.'">'.$key->municipio.'</option>';
						
				}
				echo '</select> <i></i> </label>
					</section>
					<section id="estado" class="col col-2">Estado
						<label class="select">
						<select name="estado">';
				foreach ($estado as $key)
				{
					echo'<option value="'.$key->id_estado.'">'.$key->descripcion.'</option>';
				}
				echo '</select> <i></i> </label>
					</section>';
			}
			else
			{
				echo'<section id="colonia" class="col col-2">
					<label class="input">
						Colonia
						<input type="text" name="colonia" >
					</label>
				</section>
				<section id="municipio" class="col col-2">
					<label class="input">
						Municipio
						<input type="text" name="municipio" >
					</label>
				</section>
				<section id="estado" class="col col-2">
					<label class="input">
						Estado
						<input type="text" name="estado">
					</label>
				</section>';
			}
		}
	}
	function cp_proveedor()
	{
		if(strlen($_POST['cp'])>3)
		{
			$busqueda=$this->model_admin->cp();
			if($busqueda)
			{
				$id_estado=$busqueda[0]->id_estado;
				$estado=$this->model_admin->estado($id_estado);

				echo '<section id="colonia_proveedor" class="col col-2">Colonia
						<label class="select">
						<select name="colonia">';
				foreach ($busqueda as $key)
				{
					echo' <option value="'.$key->colonia.'">'.$key->colonia.'</option>';
				}
				echo '</select> <i></i> </label>
					</section>
					<section id="municipio_proveedor" class="col col-2">Municipio
						<label class="select">
						<select name="municipio">';
				foreach ($busqueda as $key)
				{
					echo '<option value="'.$key->municipio.'">'.$key->municipio.'</option>';
						
				}
				echo '</select> <i></i> </label>
					</section>
					<section id="estado_proveedor" class="col col-2">Estado
						<label class="select">
						<select name="estado">';
				foreach ($estado as $key)
				{
					echo'<option value="'.$key->id_estado.'">'.$key->descripcion.'</option>';
				}
				echo '</select> <i></i> </label>
					</section>';
			}
			else
			{
				echo '<section id="colonia_proveedor" class="col col-2">
					<label class="input">
						Colonia
						<input type="text" name="colonia" >
					</label>
				</section>
				<section id="municipio_proveedor" class="col col-2">
					<label class="input">
						Municipio
						<input type="text" name="municipio" >
					</label>
				</section>
				<section id="estado_proveedor" class="col col-2">
					<label class="input">
						Estado
						<input type="text" name="estado">
					</label>
				</section>';
			}
		}
	}
	function kill_grupo()
	{
		$this->model_admin->kill_grupo();
	}
	function new_impuesto()
	{
		$this->model_admin->new_impuesto();
	}
	
	function new_retencion()
	{
		$this->model_admin->new_retencion($_POST['desc'],$_POST['porc'],$_POST['duracion']);
		redirect('/bo/configuracion/listar_retenciones');
	}
	
	function new_impuestos()
	{
		$this->model_admin->new_impuestos($_POST['desc'],$_POST['porc'],$_POST['pais']);
		redirect('/bo/configuracion/listar_impuestos');
	}
	
	function kill_impuesto()
	{
		$this->model_admin->kill_impuesto();
	}
	
	function kill_retencion()
	{
		$this->model_admin->kill_retencion();
	}
	
	function kill_tipo_red()
	{
		$id = $_POST['id'];
		
		$esta = $this->model_admin->ver_si_red_tiene_categorias($id);
		$afiliados = $this->model_admin->ver_afiliados_red($id);
		if ($esta == NULL && $afiliados == 0){
			
			$this->model_admin->kill_tipo_red($id);
			echo "Se ha eliminado la red.";
		}
		else if($afiliados == 1){
			echo "Ha ocurrido un error eliminando la red, debido a que tiene afiliados.";
		}else{
			echo "Ha ocurrido un error eliminando la red, debido a que tiene categorias creadas.
					<br> Lo mas recomendable es que elimine las categorias.";
		}
		
	}
	
	function update_mercancia()
	{		
		$this->model_admin->update_mercancia();
		
		$ruta="/media/carrito/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_width']  		= '4096';
		$config['max_height']   	= '3112';

		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_multi_upload('img'))
		{
			/*$error = array('error' => $this->upload->display_errors());
			print_r($error);*/
		}
		else
		{	
			$sku = $_POST['id_merc'];
			
			$id_img = $this->model_admin->traer_id_imagen_merc($sku);
			
			$datos = $this->model_admin->traer_foto($sku);
				
			if(unlink($_SERVER['DOCUMENT_ROOT'].$datos[0]->url)){
				//echo "File Deleted.";
			}
			
			$this->model_admin->del_imagen($id_img[0]->id_cat_imagen);
			
			
			
			$data = array('upload_data' => $this->upload->get_multi_upload_data());
			$this->model_admin->img_merc($sku,$data["upload_data"]);
		}
		redirect("/bo/comercial/carrito");
	}
	
	function detalle_paquete()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}
		
		
		$id_paquete   = $_POST['id'];
		$paquete_merc = $this->model_admin->get_paquete_mercancia($id_paquete);
		$detalles     = $this->model_admin->detalle_paquete($id_paquete);

		$this->template->set("tipo_paquete",$tipo_paquete);
		$this->template->set("paquete_merc",$paquete_merc);
	}
	function alta_paquete()
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
		
		
		echo "Por favor sea paciente estamos trabajando en actualizar esta sección";

	}
}