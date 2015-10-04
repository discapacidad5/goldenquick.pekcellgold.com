<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class perfil_red extends CI_Controller
{
	private $afiliados = array();
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('ov/general');
		$this->load->model('ov/model_perfil_red');
		$this->load->model('ov/model_afiliado');
		$this->load->model('model_tipo_red');
		$this->load->model('model_planes');
		$this->load->model('ov/modelo_dashboard');
		$this->load->model('ov/modelo_compras');
		$this->load->model('modelo_premios');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}

		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);

		$this->template->set("style",$style);
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/perfilUsuario');
	}


  	function perfil()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}

		$id              = $this->tank_auth->get_user_id();
		$usuario         = $this->model_perfil_red->datos_perfil($id);
		$telefonos       = $this->model_perfil_red->telefonos($id);
		$edad            = $this->model_perfil_red->edad($id);
		$sexo            = $this->model_perfil_red->sexo();
		$style           = $this->general->get_style($id);
		$pais            = $this->model_perfil_red->get_pais();
		$tipo_fiscal     = $this->model_perfil_red->tipo_fiscal();
		$dir             = $this->model_perfil_red->dir($id);
		$civil           = $this->model_perfil_red->edo_civil();
		$estudios        = $this->model_perfil_red->get_estudios();
		$ocupacion       = $this->model_perfil_red->get_ocupacion();
		$tiempo_dedicado = $this->model_perfil_red->get_tiempo_dedicado();
		$coaplicante	 = $this->model_perfil_red->get_coaplicante($id);
		
		
		$this->template->set("dir",$dir);
		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);
		$this->template->set("telefonos",$telefonos);
		$this->template->set("edad",$edad[0]->edad);
		$this->template->set("sexo",$sexo);
		$this->template->set("pais",$pais);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("civil",$civil);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		$this->template->set("name_c",$coaplicante[0]->nombre);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/perfil');
	}

	function get_red_afiliar()
	{
		$id_red=$_POST['red'];
		$frontales 	 = $this->model_tipo_red->ObtenerFrontalesRed($id_red);
		$frontales= $frontales[0]->frontal;
		$afiliados = $this->model_perfil_red->get_afiliados($id_red, $_POST['id']);
		
		$nombre=$this->model_perfil_red->get_name($_POST['id']);
		$nombre='"'.$nombre[0]->nombre." ".$nombre[0]->apellido.'"';
		$aux=0;
		if($afiliados)
		{
			
			$usuario=array();
			foreach ($afiliados as $id_afiliado)
			{
				$usuario[]=$this->model_perfil_red->datos_perfil($id_afiliado->id_afiliado);
			}
			
			
			foreach ($usuario as $afiliado)
			{
				
				$image 			 = $this->model_perfil_red->get_images($afiliado[0]->user_id);
				$img_perfil='/template/img/empresario.jpg';
				foreach ($image as $img)
				{
					$cadena=explode(".", $img->img);
					if($cadena[0]=="user")
					{
						$img_perfil=$img->url;
					}
				}
				
				if(sizeof($afiliados) == 0)
				{
						
						($afiliados[0]->directo==0) ? $todo='todo' : $todo='todo1';
						
						for($i=$aux; $i < $frontales; $i++){
							echo "<li>
								<a onclick='botbox(".$nombre.",".$_POST['id'].",$i)' href='javascript:void(0)'>Afiliar Aqui</a>
				            </li>";
				           }
				           
				}
				else
				{
					$aux++;
					($afiliados[0]->directo==0) ? $todo='todo' : $todo='todo1';
					echo "
					<li id='".$afiliado[0]->user_id."'>
		            	<a class='quitar' onclick='subred(".$afiliado[0]->user_id.")' style='background: url(".$img_perfil."); background-size: cover; background-position: center;' href='javascript:void(0)'></a>
		            	<div onclick='detalles(".$afiliado[0]->user_id.")' class='".$todo."'>".$afiliado[0]->nombre." ".$afiliado[0]->apellido."<br />Detalles</div>
		            </li>";
					
	        	}
	        	
			}
			if($aux > 0){
				for($i=$aux; $i < $frontales; $i++){
					echo "<li>
								<a onclick='botbox(".$nombre.",".$_POST['id'].",$i)' href='javascript:void(0)'>Afiliar Aqui</a>
											</li>";
				}
			}
			echo "</ul>";
		}
		else
		{
			$nombre=$this->model_perfil_red->get_name($_POST['id']);
			$nombre='"'.$nombre[0]->nombre." ".$nombre[0]->apellido.'"';
			echo "<ul>";
			for($i=0; $i < $frontales; $i++){
				echo "<li>
					<a onclick='botbox(".$nombre.",".$_POST['id'].",$i)' href='javascript:void(0)'>Afiliar Aqui</a>
	            </li>";
	           }
			echo "</ul>";
		}
		
		
	}
	
	function subtree()
	{
		$id_red=$_POST['red'];
		$frontales 	 = $this->model_tipo_red->ObtenerFrontalesRed($id_red);
		$frontales= $frontales[0]->frontal;
		$afiliados = $this->model_perfil_red->get_afiliados($id_red, $_POST['id']);
		
		$nombre=$this->model_perfil_red->get_name($_POST['id']);
		$nombre='"'.$nombre[0]->nombre." ".$nombre[0]->apellido.'"';
		$aux = 0;
		if($afiliados)
		{
				
			$usuario=array();
			foreach ($afiliados as $id_afiliado)
			{
				$usuario[]=$this->model_perfil_red->datos_perfil($id_afiliado->id_afiliado);
			}
				
				
			foreach ($usuario as $afiliado)
			{
		
				$image 			 = $this->model_perfil_red->get_images($afiliado[0]->user_id);
				$img_perfil='/template/img/empresario.jpg';
				foreach ($image as $img)
				{
					$cadena=explode(".", $img->img);
					if($cadena[0]=="user")
					{
						$img_perfil=$img->url;
					}
				}
		
				if(sizeof($afiliados) == 0)
				{
		
					($afiliados[0]->directo==0) ? $todo='todo' : $todo='todo1';
		
					for($i=$aux; $i < $frontales; $i++){
						echo "
						<li>
							<a href='javascript:void(0)'>No tiene afiliado</a>
			            </li>";
					}
					 
				}
				else
				{
					$aux++;
					($afiliados[0]->directo==0) ? $todo='todo' : $todo='todo1';
					echo "
					<li id='t".$afiliado[0]->user_id."'>
		            	<a class='quitar' onclick='subtree(".$afiliado[0]->user_id.")' style='background: url(".$img_perfil."); background-size: cover; background-position: center;' href='javascript:void(0)'></a>
		            	<div onclick='detalles(".$afiliado[0]->user_id.")' class='".$todo."'>".$afiliado[0]->nombre." ".$afiliado[0]->apellido."<br />Detalles</div>
		            </li>";
						
				}
		
			}
			if($aux > 0){
				for($i=$aux; $i < $frontales; $i++){
					echo "
						<li>
							<a href='javascript:void(0)'>No tiene afiliado</a>
			            </li>";
				}
			}
			echo "</ul>";
		}
		else
		{
			$nombre=$this->model_perfil_red->get_name($_POST['id']);
			$nombre='"'.$nombre[0]->nombre." ".$nombre[0]->apellido.'"';
			echo "<ul>";
			for($i=0; $i < $frontales; $i++){
				echo "
						<li>
							<a href='javascript:void(0)'>No tiene afiliado</a>
			            </li>";
			}
			echo "</ul>";
		}
		
	}
	
	function subtree2()
	{
		$id_red=$_POST['red'];
		$frontales 	 = $this->model_tipo_red->ObtenerFrontalesRed($id_red);
		$frontales= $frontales[0]->frontal;
		$afiliados = $this->model_perfil_red->get_afiliados($id_red, $_POST['id']);
	
		$nombre=$this->model_perfil_red->get_name($_POST['id']);
		$nombre='"'.$nombre[0]->nombre." ".$nombre[0]->apellido.'"';
		$aux = 0;
		if($afiliados)
		{
	
			$usuario=array();
			foreach ($afiliados as $id_afiliado)
			{
				$usuario[]=$this->model_perfil_red->datos_perfil($id_afiliado->id_afiliado);
			}
	
	
			foreach ($usuario as $afiliado)
			{
	
				$image 			 = $this->model_perfil_red->get_images($afiliado[0]->user_id);
				$img_perfil='/template/img/empresario.jpg';
				foreach ($image as $img)
				{
					$cadena=explode(".", $img->img);
					if($cadena[0]=="user")
					{
						$img_perfil=$img->url;
					}
				}
	
				if(sizeof($afiliados) == 0)
				{
	
					($afiliados[0]->directo==0) ? $todo='todo' : $todo='todo1';
	
					for($i=$aux; $i < $frontales; $i++){
						echo "
						<li>
							<a href='javascript:void(0)'>No tiene afiliado</a>
			            </li>";
					}
	
				}
				else
				{
					$aux++;
					($afiliados[0]->directo==0) ? $todo='todo' : $todo='todo1';
					echo "
					<li id='tt".$afiliado[0]->user_id."'>
		            	<a class='quitar' onclick='subtree2(".$afiliado[0]->user_id.")' style='background: url(".$img_perfil."); background-size: cover; background-position: center;' href='javascript:void(0)'></a>
		            	<div onclick='detalles2(".$afiliado[0]->user_id.")' class='".$todo."'>".$afiliado[0]->nombre." ".$afiliado[0]->apellido."<br />Detalles</div>
		            </li>";
	
				}
	
			}
			if($aux > 0){
				for($i=$aux; $i < $frontales; $i++){
					echo "
						<li>
							<a href='javascript:void(0)'>No tiene afiliado</a>
			            </li>";
				}
			}
			echo "</ul>";
		}
		else
		{
			$nombre=$this->model_perfil_red->get_name($_POST['id']);
			$nombre='"'.$nombre[0]->nombre." ".$nombre[0]->apellido.'"';
			echo "<ul>";
			for($i=0; $i < $frontales; $i++){
				echo "
						<li>
							<a href='javascript:void(0)'>No tiene afiliado</a>
			            </li>";
			}
			echo "</ul>";
		}
	
	}
	
	function detalle_usuario()
	{
		$image 			 = $this->model_perfil_red->get_images($_POST['id']);
		
		$img_perfil="/template/img/empresario.jpg";
		foreach ($image as $img)
		{
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$img_perfil=$img->url;
			}
		}

		$pais=$this->modelo_dashboard->get_user_country_code($_POST['id']);
		
		$usuario =$this->model_perfil_red->datos_perfil($_POST['id']);
		$edad    =$this->model_perfil_red->edad($_POST['id']);
		$telefonos    =$this->model_perfil_red->telefonos($_POST['id']);
		$dir    =$this->model_perfil_red->dir($_POST['id']);
		$username = $this->general->username($_POST['id']);
		
		echo '<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<img alt="'.$usuario[0]->nombre.'" src="'.$img_perfil.'" style="max-width: 100%; max-height: 100%">
			</div>';
		echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="demo-icon-font">Pais
					<img class="flag flag-'.strtolower($pais).'" >
               	</div>';
		echo '
				<div class="row">Id: <b>'.$_POST["id"].'</b></div>';
		
		echo '<div class="row">Username: <b>'.$username[0]->username.'</b></div>';
		echo '<div class="row">Nombre: <b>'.$usuario[0]->nombre.'</b></div>';
		echo '<div class="row">Apellido: <b>'.$usuario[0]->apellido.'</b></div>';
		echo '<div class="row">Nacimiento: <b>'.$usuario[0]->nacimiento.'</b></div>';
		echo '<div class="row">Edad: <b>'.$edad[0]->edad.'</b></div>';
		echo '<div class="row">Email: <b>'.$usuario[0]->email.'</b></div>';
		echo '<div class="row">Dirección: <b>'.$dir[0]->calle.' '.$dir[0]->colonia.' '.$dir[0]->municipio.' '.$dir[0]->estado.' '.$dir[0]->cp.'</b></div>';
		echo '<div class="row">Teléfono(s) fijo(s): ';
		foreach ($telefonos as $key)
		{
			if($key->tipo=='Fijo')
			{
				echo '<b>'.$key->numero."</b><br />";
			}
		}
		echo '</div>';
		echo '<div class="row">Teléfono(s) Movil: ';
		foreach ($telefonos as $key)
		{
			if($key->tipo=='Móvil')
			{
				echo '<b>'.$key->numero."</b><br />";
			}
		}
		echo '</div>';
		echo '</div></div></div>';
	}
	
	function detalle_usuario2()
	{
		$img_perfil = $this->imagenPerfil($_POST['id']);
	
		$pais=$this->modelo_dashboard->get_user_country_code($_POST['id']);
		
		$username = $this->general->username($_POST['id']);
		
		$usuario = $this->model_perfil_red->datos_perfil($_POST['id']);
		$compras = $this->model_afiliado->ComprasUsuario($_POST['id']);
		//$puntos  = $this->model_afiliado->PuntosUsuario($_POST['id']);
		$comision  = $this->model_afiliado->ComisionUsuario($_POST['id']);
		
		$this->template->set("img_perfil",$img_perfil);
		$this->template->set("id",$_POST['id']);
		$this->template->set("usuario",$usuario);
		$this->template->set("username",$username[0]->username);
		$this->template->set("compras",$compras);
		//$this->template->set("puntos",$puntos);
		$this->template->set("comision",$comision);
		$this->template->set("pais",$pais);
		$this->template->build('website/ov/perfil_red/detallesAfiliado2');
		
	}
	
	function imagenPerfil($id){
		$image 			 = $this->model_perfil_red->get_images($_POST['id']);
		
		$img_perfil="/template/img/empresario.jpg";
		foreach ($image as $img)
		{
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$img_perfil=$img->url;
			}
		}
		return $img_perfil;
	}
	
	function TipoAfiliacion(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
		
		$this->template->set("id",$id);
		$this->template->set("style",$style);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/tipoAfiliar');
	}
	function afiliar()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}

		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
		
		$redes = $this->model_tipo_red->RedesUsuario($id);
		
		$this->template->set("id",$id);
		$this->template->set("style",$style);
		$this->template->set("redes",$redes);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/redes');
	}
	
	function afiliarExistente(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
		
		$this->template->set("id",$id);
		$this->template->set("style",$style);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/afiliarExistente');
	}
	function nuevo_afilido()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);

		$this->template->set("id",$id);
		$this->template->set("style",$style);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/afiliar');
	}
	
	private function VerificarCompras($id_afiliado,$id_red,$nivel){
		
		$afiliados = $this->modelo_compras->traer_afiliados_red($id_afiliado, $id_red);
		
		$id_categoria = $this->modelo_compras->ConsultarIdCategoriaMercancia($id_red);
		$contador = 0;
		
		foreach ($afiliados as $afiliado2){
			
			if($this->modelo_compras->ComprovarCompraProducto($afiliado2->id_afiliado, $id_categoria)){
				$contador = 1;
			}
			if(isset($this->afiliados[$nivel])){
				$this->afiliados[$nivel] =  $contador + $this->afiliados[$nivel];
			}else{
				$this->afiliados[$nivel] = $contador;
			}
			$this->VerificarCompras($afiliado2->id_afiliado, $id_red,$nivel+1);
		}
		var_dump($afiliados);
		exit();
	}
	
	private function DeterminarPremio($id_afiliado,$id_red){
		
		$this->VerificarCompras($id_afiliado, $id_red, 0);
		//var_dump($this->afiliados); exit;
		$premio = 0;
		$premios = $this->modelo_premios->getPremiosCondicion($id_red);
		$i=1;
		foreach ($this->afiliados as $nivel){
			foreach ($premios as $premio_cond){
				if($premio_cond->nivel == $i && $nivel == $premio_cond->num_afiliados){
					$premio = $premio_cond->id;
				}
			}
			$i++;
		}
		if($premio != 0){
			$enviar = $this->RegistrarPremioAfiliado($id_afiliado,$premio);
			if($enviar){
				$this->EnviarMail($id_afiliado, $premio);
			}
		}
		return $premio;
	}
	
	private function EnviarMail($id_afiliado, $id_premio){
		
		$datos = $this->modelo_premios->datosEmail($id_afiliado, $id_premio);
		$premio['usuario'] = $datos[0]->nombre;
		$premio['premio'] = $datos[0]->premio;
		$premio['descripcion'] = $datos[0]->descripcion;
		$premio['imagen'] = $datos[0]->imagen;
		//$this->load->view('email/Premio', $premio);
		
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($datos[0]->email);
		$this->email->subject('Confirmacion de pago por Banco');
		$this->email->message($this->load->view('email/Premio', $premio, TRUE));
		//$this->email->set_alt_message($this->load->view('email/activate-txt', $data, TRUE));
		$this->email->send();
		
	}
	
	private function RegistrarPremioAfiliado($id_afiliado, $id_premio){
		return $this->modelo_premios->InsertarPremioAfiliado($id_premio,$id_afiliado);
	}
	
	function afiliar_frontal(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id_red          = $_GET['id'];
		$id              = $this->tank_auth->get_user_id();
		$usuario         = $this->model_perfil_red->datos_perfil($id);
		$telefonos       = $this->model_perfil_red->telefonos($id);
		$sexo            = $this->model_perfil_red->sexo();
		$pais            = $this->model_perfil_red->get_pais();
		$style           = $this->general->get_style($id);
		$dir             = $this->model_perfil_red->dir($id);
		$civil           = $this->model_perfil_red->edo_civil();
		$tipo_fiscal     = $this->model_perfil_red->tipo_fiscal();
		$estudios        = $this->model_perfil_red->get_estudios();
		$ocupacion       = $this->model_perfil_red->get_ocupacion();
		$tiempo_dedicado = $this->model_perfil_red->get_tiempo_dedicado();
		$red 			 = $this->model_afiliado->RedAfiliado($id, $id_red);
		$premium         = $red[0]->premium;
		$afiliados       = $this->model_perfil_red->get_afiliados($id_red, $id);
		$image 			 = $this->model_perfil_red->get_images($id);
		$red_forntales 	 = $this->model_tipo_red->ObtenerFrontalesRed($id_red);
		
		$img_perfil="/template/img/empresario.jpg";
		foreach ($image as $img)
		{
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$img_perfil=$img->url;
			}
		}
		$estadoPremio = "";
		$premio = $this->DeterminarPremio($id, $id_red);
		
		$infoPremio = $this->modelo_premios->verEstadoPremio($id);
		
		$estadoPremio = $infoPremio[0]->estado;
		
		$this->template->set("premio",$premio);
		$this->template->set("estadoPremio",$estadoPremio);
		$this->template->set("id",$id);
		$this->template->set("style",$style);
		$this->template->set("contar",count($afiliados));
		$this->template->set("sexo",$sexo);
		$this->template->set("civil",$civil);
		$this->template->set("pais",$pais);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		$this->template->set("img_perfil",$img_perfil);
		$this->template->set("red_frontales",$red_forntales);
		$this->template->set("premium",$premium);
		//$this->template->set("valor_retencion",$valor_retencion);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/afiliar_frontal');
	}
	
	function afiliar_frontal_existente(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id_red          = $_GET['id'];
		$id              = $this->tank_auth->get_user_id();
		$usuario         = $this->model_perfil_red->datos_perfil($id);
		$telefonos       = $this->model_perfil_red->telefonos($id);
		$sexo            = $this->model_perfil_red->sexo();
		$pais            = $this->model_perfil_red->get_pais();
		$style           = $this->general->get_style($id);
		$dir             = $this->model_perfil_red->dir($id);
		$civil           = $this->model_perfil_red->edo_civil();
		$tipo_fiscal     = $this->model_perfil_red->tipo_fiscal();
		$estudios        = $this->model_perfil_red->get_estudios();
		$ocupacion       = $this->model_perfil_red->get_ocupacion();
		$tiempo_dedicado = $this->model_perfil_red->get_tiempo_dedicado();
		$red 			 = $this->model_afiliado->RedAfiliado($id, $id_red);
		//$premium         = $red[0]->premium;
		$afiliados       = $this->model_perfil_red->get_afiliados($id_red, $id);
		//$planes 		 = $this->model_planes->Planes();
		$image 			 = $this->model_perfil_red->get_images($id);
		$red_forntales 	 = $this->model_tipo_red->ObtenerFrontalesRed($id_red);
	
		$img_perfil="/template/img/empresario.jpg";
		foreach ($image as $img)
		{
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$img_perfil=$img->url;
			}
		}
		
		$premio = $this->DeterminarPremio($id, $id_red);
		$infoPremio = $this->modelo_premios->verEstadoPremio($id);
		
		$estadoPremio = $infoPremio[0]->estado;
		
		
		$this->template->set("premio",$premio);
		$this->template->set("estadoPremio",$estadoPremio);
		$this->template->set("id",$id);
		$this->template->set("style",$style);
		$this->template->set("contar",count($afiliados));
		$this->template->set("sexo",$sexo);
		$this->template->set("civil",$civil);
		$this->template->set("pais",$pais);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		$this->template->set("img_perfil",$img_perfil);
		$this->template->set("red_frontales",$red_forntales);
		//$this->template->set("premium",$premium);
		//$this->template->set("valor_retencion",$valor_retencion);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/afiliar_frontal_existente');
	}
	
	function afiliar_red()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id_red          = $_GET['id'];
		$id              = $this->tank_auth->get_user_id();
		$usuario         = $this->model_perfil_red->datos_perfil($id);
		$telefonos       = $this->model_perfil_red->telefonos($id);
		$sexo            = $this->model_perfil_red->sexo();
		$pais            = $this->model_perfil_red->get_pais();
		$style           = $this->general->get_style($id);
		$dir             = $this->model_perfil_red->dir($id);
		$civil           = $this->model_perfil_red->edo_civil();
		$tipo_fiscal     = $this->model_perfil_red->tipo_fiscal();
		$estudios        = $this->model_perfil_red->get_estudios();
		$ocupacion       = $this->model_perfil_red->get_ocupacion();
		$tiempo_dedicado = $this->model_perfil_red->get_tiempo_dedicado();
		$red 			 = $this->model_afiliado->RedAfiliado($id, $id_red);
		$premium         = $red[0]->premium;
		$afiliados       = $this->model_perfil_red->get_afiliados($id_red, $id);
		$planes 		 = $this->model_planes->Planes();
	
		$image 			 = $this->model_perfil_red->get_images($id);
		$red_forntales 	 = $this->model_tipo_red->ObtenerFrontalesRed($id_red);
	
	
	
		$img_perfil="/template/img/empresario.jpg";
		foreach ($image as $img)
		{
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$img_perfil=$img->url;
			}
		}
		$premio = $this->DeterminarPremio($id, $id_red);
		$infoPremio = $this->modelo_premios->verEstadoPremio($id);
		
		$estadoPremio = $infoPremio[0]->estado;
		
		
		$this->template->set("premio",$premio);
		$this->template->set("estadoPremio",$estadoPremio);
		$this->template->set("id",$id);
		$this->template->set("style",$style);
		$this->template->set("afiliados",$afiliados);
		$this->template->set("sexo",$sexo);
		$this->template->set("civil",$civil);
		$this->template->set("pais",$pais);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		$this->template->set("img_perfil",$img_perfil);
		$this->template->set("red_frontales",$red_forntales);
		$this->template->set("premium",$premium);
		$this->template->set("planes",$planes);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/afiliar_red');
	}
	
	function afiliar_red_existente()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id_red          = $_GET['id'];
		$id              = $this->tank_auth->get_user_id();
		$usuario         = $this->model_perfil_red->datos_perfil($id);
		$telefonos       = $this->model_perfil_red->telefonos($id);
		$sexo            = $this->model_perfil_red->sexo();
		$pais            = $this->model_perfil_red->get_pais();
		$style           = $this->general->get_style($id);
		$dir             = $this->model_perfil_red->dir($id);
		$civil           = $this->model_perfil_red->edo_civil();
		$tipo_fiscal     = $this->model_perfil_red->tipo_fiscal();
		$estudios        = $this->model_perfil_red->get_estudios();
		$ocupacion       = $this->model_perfil_red->get_ocupacion();
		$tiempo_dedicado = $this->model_perfil_red->get_tiempo_dedicado();
		$red 			 = $this->model_afiliado->RedAfiliado($id, $id_red);
		$premium         = $red[0]->premium;
		$afiliados       = $this->model_perfil_red->get_afiliados($id_red, $id);
		$planes 		 = $this->model_planes->Planes();
	
		$image 			 = $this->model_perfil_red->get_images($id);
		$red_forntales 	 = $this->model_tipo_red->ObtenerFrontalesRed($id_red);
	
	
	
		$img_perfil="/template/img/empresario.jpg";
		foreach ($image as $img)
		{
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$img_perfil=$img->url;
			}
		}
		$premio = $this->DeterminarPremio($id, $id_red);
		$infoPremio = $this->modelo_premios->verEstadoPremio($id);
		
		$estadoPremio = $infoPremio[0]->estado;
		
		
		$this->template->set("premio",$premio);
		$this->template->set("estadoPremio",$estadoPremio);
		$this->template->set("id",$id);
		$this->template->set("style",$style);
		$this->template->set("afiliados",$afiliados);
		$this->template->set("sexo",$sexo);
		$this->template->set("civil",$civil);
		$this->template->set("pais",$pais);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		$this->template->set("img_perfil",$img_perfil);
		$this->template->set("red_frontales",$red_forntales);
		$this->template->set("premium",$premium);
		$this->template->set("planes",$planes);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/afiliar_red_existente');
	}
	
	function use_mail()
	{
		$use_mail=$this->model_perfil_red->use_mail();
		if($use_mail)
		{
			echo "La cuenta de correo ya no está disponible";
		}
	}
	
	function use_mail_editar_perfil()
	{
		$id = $this->tank_auth->get_user_id();
		$use_mail=$this->model_perfil_red->use_mail_modificar_perfil($id);
		if($use_mail)
		{
			echo "La cuenta de correo ya no está disponible";
		}
	}
	
	function use_mail_modificar()
	{
		$use_mail_modificar = $this->model_perfil_red->use_mail_modificar();
		if($use_mail_modificar)
		{
			echo "La cuenta de correo ya no está disponible";
		}
	}
	
	function use_keyword()
	{
		$use_keyword=$this->model_perfil_red->use_keyword();
		if($use_keyword)
		{
			echo "La identificación no está disponible";
		}
	}
	function use_username()
	{
		$use_username=$this->model_perfil_red->use_username();
		if($use_username)
		echo "El usuario no está disponible";
	}
	
	function use_username_modificar()
	{
		$use_username_modificar = $this->model_perfil_red->use_username_modificar();
		if($use_username_modificar)
			echo "El usuario no está disponible";
	}
	
	function afiliar_nuevo()
	{
		
		$resultado = $this->model_afiliado->crearUsuario();
		//$resultado=$this->model_perfil_red->afiliar_nuevo($id);
		
		if($resultado)
		{
			$id_afiliado=$this->model_perfil_red->get_id();
			echo "El usuario <b>".$_POST['nombre']."&nbsp; ".$_POST['apellido']."</b> ha quedado afiliado con el id <b>".$id_afiliado[0]->id."</b>";
		}
		else
		{
			echo "!UPS¡ lo sentimos parece que algo fallo";
		}
	}
	function AgregarUsuarioRed(){
		$id = $_POST['id'];
		$red = $_POST['red'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		
		if($this->model_afiliado->ConprobarUsuario($username,$email,$red, $id)){
			
			$this->model_afiliado->AgregarAfiliadoRed($id, $red, $email);
			echo "Felicitaciones el usuario ha sido afiliado a otra red";
		}
		
	}
	function crear_user()
	{	
		$this->tank_auth->create_user($_POST['username'], $_POST['email'], $_POST['password'], $_POST['email']);;
	
	}
	
	function CargarFormulario(){
		
		$id              = $_POST['id'];
		$id_red          = $_POST['red'];
		
		$sexo            = $this->model_perfil_red->sexo();
		$pais            = $this->model_perfil_red->get_pais();
		$civil           = $this->model_perfil_red->edo_civil();
		$tipo_fiscal     = $this->model_perfil_red->tipo_fiscal();
		$estudios        = $this->model_perfil_red->get_estudios();
		$ocupacion       = $this->model_perfil_red->get_ocupacion();
		$tiempo_dedicado = $this->model_perfil_red->get_tiempo_dedicado();
		$afiliados       = $this->model_perfil_red->get_afiliados($id_red, $id);
		
		
		$img_perfil="/template/img/empresario.jpg";
		foreach ($image as $img)
		{
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$img_perfil=$img->url;
			}
		}
		
		$this->template->set("id",$id);
		$this->template->set("afiliados",$afiliados);
		$this->template->set("sexo",$sexo);
		$this->template->set("civil",$civil);
		$this->template->set("pais",$pais);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		
		$this->template->build('website/ov/perfil_red/FromNuevoAfiliado');
	}
	
	function afiliar_nuevo_r($id)
	{
		sleep(3);
		//print_r($_POST);
		$this->model_perfil_red->afiliar_nuevo($id);
		if($_POST['sponsor'])
		{
			$id_=$this->tank_auth->get_user_id();
			$this->model_perfil_red->actualiza_directo($id_,$id);
		}
		$id_afiliado=$this->model_perfil_red->get_id();
		echo "El usuario <b>".$_POST['nombre']."&nbsp; ".$_POST['apellido']."</b> ha quedado afiliado con el id <b>".$id_afiliado[0]->id."</b>";
	}
	
	function actualizar()
	{
		$id = $this->tank_auth->get_user_id();
		$_POST['mail']=$_POST['email'];
		$use_mail=$this->model_perfil_red->use_mail_modificar_perfil($id);

		if($use_mail){
			echo "El Email ya existe , ingrese otro no existente";
			exit();
		}
		$id=$this->tank_auth->get_user_id();
		$this->model_perfil_red->actualizar($id);
		echo "Felicitaciones <br> Se han actualizado los datos";
	}
	
	function cp()
	{
		if(strlen($_POST['cp'])>3)
		{
			$busqueda=$this->model_perfil_red->cp();
			if($busqueda)
			{
				$id_estado=$busqueda[0]->id_estado;
				$estado=$this->model_perfil_red->estado($id_estado);

				echo '<section id="colonia" class="col col-2">Colonia
						<label class="select">
						<select name="colonia">';
				foreach ($busqueda as $key)
				{
					echo' <option value="'.$key->colonia.'">'.$key->colonia.'</option>';
				}
				echo '</select></label>
					</section>
					<section id="municipio" class="col col-2">Municipio
						<label class="select">
						<select name="municipio">';
				foreach ($busqueda as $key)
				{
					echo '<option value="'.$key->municipio.'">'.$key->municipio.'</option>';

				}
				echo '</select></label>
					</section>
					<section id="estado" class="col col-2">Estado
						<label class="select">
						<select name="estado">';
				foreach ($estado as $key)
				{
					echo'<option value="'.$key->descripcion.'">'.$key->descripcion.'</option>';
				}
				echo '</select></label>
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
	
	function cp_red()
	{
		if(strlen($_POST['cp'])>3)
		{
			$busqueda=$this->model_perfil_red->cp();
			if($busqueda)
			{
				$id_estado=$busqueda[0]->id_estado;
				$estado=$this->model_perfil_red->estado($id_estado);

				echo '<section id="colonia_red" class="col col-6">Colonia
						<label class="select">
						<select name="colonia">';
				foreach ($busqueda as $key)
				{
					echo' <option value="'.$key->colonia.'">'.$key->colonia.'</option>';
				}
				echo '</select></label>
					</section>
					<section id="municipio_red" class="col col-6">Municipio
						<label class="select">
						<select name="municipio">';
				foreach ($busqueda as $key)
				{
					echo '<option value="'.$key->municipio.'">'.$key->municipio.'</option>';

				}
				echo '</select></label>
					</section>
					<section id="estado_red" class="col col-6">Estado
						<label class="select">
						<select name="estado">';
				foreach ($estado as $key)
				{
					echo'<option value="'.$key->descripcion.'">'.$key->descripcion.'</option>';
				}
				echo '</select></label>
					</section>';
			}
			else
			{
				echo'<section id="colonia_red" class="col col-6">
					<label class="input">
						Colonia
						<input type="text" name="colonia" >
					</label>
				</section>
				<section id="municipio_red" class="col col-6">
					<label class="input">
						Municipio
						<input type="text" name="municipio" >
					</label>
				</section>
				<section id="estado_red" class="col col-6">
					<label class="input">
						Estado
						<input type="text" name="estado">
					</label>
				</section>';
			}
		}
	}
	
	function foto()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}

		$id 		= $this->tank_auth->get_user_id();
		$usuario 	= $this->general->get_username($id);
		$style 		= $this->general->get_style($id);

		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/foto');
	}
	
	function subred()
	{
		$id = $_POST['id'];
		$id_red = $_POST['red'];

		$afiliados = $this->model_perfil_red->get_afiliados($id_red, $id);
		if($afiliados)
		{
			$usuario=array();
			foreach ($afiliados as $id_afiliado)
			{
				$usuario[]=$this->model_perfil_red->datos_perfil($id_afiliado->id_afiliado);
			}
			echo "<ul role='group'>";
			foreach ($usuario as $afiliado)
			{
				echo "
				<li class='parent_li' style='display: list-item;' role='treeitem' id='".$afiliado[0]->user_id."'>
	            	<span class='quitar'  onclick='subred(".$afiliado[0]->user_id.")'><i class='fa fa-lg fa-plus-circle'></i> ".$afiliado[0]->nombre." ".$afiliado[0]->apellido."</span>
	            </li>";
			}
			echo "</ul>";
		}
		else
		{
			echo "<ul  role='group'>
				<li  class='parent_li' style='display: list-item;' role='treeitem'>
					No tiene afiliados
	            </li>";
			echo "</ul>";
		}
	}
	
	function sube_foto($tipo)
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

		if($tipo==0)
		{
			$nombre="user";
			$contenido=scandir(getcwd()."/media/".$id);
			if(sizeof($contenido)>2)
			{
				for($i=2;$i<sizeof($contenido);$i++)
				{
					$cadena=explode(".", $contenido[$i]);

					if($cadena[0]=="user")
					{
						unlink(getcwd()."/media/".$id."/".$contenido[$i]);
						
					}
				}
			}
		}
		if($tipo==1)
		{
			$nombre="fondo";
			$contenido=scandir(getcwd()."/media/".$id);
			if(sizeof($contenido)>2)
			{
				for($i=2;$i<sizeof($contenido);$i++)
				{
					$cadena=explode(".", $contenido[$i]);

					if($cadena[0]=="fondo")
					{
						unlink(getcwd()."/media/".$id."/".$contenido[$i]);
						
					}
				}
			}
		}

		$ruta="/media/".$id."/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['file_name'] 		= $nombre;
		$config['max_width']  		= '4096';
		$config['max_height']   	= '3112';

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
			$this->model_perfil_red->img_user($id,$data["upload_data"]);
		}
	}


  	function sube_foto_tomar($tipo)
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

	    $data = $_POST['foto'];
		$id = $this->tank_auth->get_user_id();
	    list($type, $data) = explode(';', $data);
	    list(, $data)      = explode(',', $data);
	    $data = base64_decode($data);

		if (!file_put_contents(getcwd()."/media/".$id."/user.png", $data))
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$this->model_perfil_red->img_user_tomar($id);
			echo '1';
		}
	}
	
	function por_pagar()
	{
		echo
		'<div class="row userInfo">
			<div class="col-lg-12">

               <p>Seleccione el metodo para pagar su orden.</p>
                <hr>
              </div>
              <div class="col-xs-12 col-sm-12">
                <div class="paymentBox">
                  <div class="panel-group paymentMethod" id="accordion">
                  	<div class="panel panel-default">
                      <div class="panel-heading panel-heading-custom">
                        <h4 class="panel-title"> <a class="masterCard" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> <span class="numberCircuil">Opcion 1</span> <strong> Efectivo</strong> </a> </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <p>Todas las transacciones son seguras y encriptadas. Para saber mas, por favor ve nuestra politica de privacidad.</p>
                          <br>
                          <div class="panel open">


                           </div>
                         </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading panel-heading-custom">
                        <h4 class="panel-title"> <a class="masterCard" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> <span class="numberCircuil">Opcion 2</span> <strong> Deposito</strong> </a> </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                         <div class="panel-body">
                           <p>Todas las transacciones son seguras y encriptadas. Para saber mas, por favor ve nuestra politica de privacidad.</p>
                           <br>
                           <div class="panel open">


                           </div>
                         </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading panel-heading-custom">
                        <h4 class="panel-title"> <a class="masterCard" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> <span class="numberCircuil">Opcion 3</span> <strong> Tarjeta</strong> </a> </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Todas las transacciones son seguras y encriptadas. Para saber mas, por favor ve nuestra politica de privacidad.</p>
                          <br>
                          <div class="panel open">
                            <div class="creditCard">
                              <div class="cartBottomInnerRight paymentCard">
                              </div>
                              <span>Tarjetas</span> <span>Admitidas</span>
                              <div class="paymentInput">
                                <div class="form-group">
                  					<div class="col-lg-4 col-md-4 col-sm-4 no-margin-left no-padding">
		                                <select required aria-required="true" id="paquete" name="paquete">
		                                  <option value="">Seleccione una opcion</option>
		                                  <option value="1">Anual</option>
		                                  <option value="2">Semestral</option>
		                                  <option value="3">Mensual</option>
		                                  <option value="4">Por 2 años</option>
		                                </select>
	                              </div>
                                  <br>
	                              <div class="col-lg-4 col-md-4 col-sm-4 no-margin-left no-padding">
	                                <select required aria-required="true" id="banco_taj" name="expire">
	                                  <option value="">Banco</option>
	                                  <option value="1">01 - VISA</option>
	                                  <option value="2">02 - Master Card</option>
	                                  <option value="3">03 - American Express</option>

	                                </select>
	                              </div>

	                              <div class="col-lg-4 col-md-4 col-sm-4 ">
	                                <select required aria-required="true" id="tipo_taj" name="expire">
	                                  <option value="">Tipo</option>
	                                  <option value="1">01 - Credito</option>
	                                  <option value="2">02 - Debito</option>

	                                </select>
	                              </div>
	                            </div>
                              </div>
                              <div class="paymentInput">
                                <label for="CardNumber">Número de Tarjeta de Crédito*</label>
                                <br>
                                <input id="numero_taj" type="text" name="Number">
                              </div>
                              <!--paymentInput-->
                              <div class="paymentInput">
                                <label for="CardNumber2">Titular de la Tarjeda de Credito *</label>
                                <br>
                                <input type="text" name="CardNumber2" id="titular_taj">
                              </div>
                              <!--paymentInput-->
                              <div class="paymentInput">
                                <div class="form-group">
                                  <label>Fecha de Vencimiento *</label>
                                  <br>
                                  <div class="col-lg-4 col-md-4 col-sm-4 no-margin-left no-padding">
                                    <select required aria-required="true" name="expire" id="mes_taj">
                                      <option value="">Month</option>
                                      <option value="1">01 - Enero</option>
                                      <option value="2">02 - Febrero</option>
                                      <option value="3">03 - Marzo</option>
                                      <option value="4">04 - Abril</option>
                                      <option value="5">05 - Mayo</option>
                                      <option value="6">06 - Junio</option>
                                      <option value="7">07 - Julio</option>
                                      <option value="8">08 - Agosto</option>
                                      <option value="9">09 - Septiembre</option>
                                      <option value="10">10 - Octubre</option>
                                      <option value="11">11 - Noviembre</option>
                                      <option value="12">12 - Diciembre</option>
                                    </select>
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-4">
                                    <select required aria-required="true" name="year" id="ano_taj">
                                      <option value="">Año</option>
                                      <option value="2013">2013</option>
                                      <option value="2014">2014</option>
                                      <option value="2015">2015</option>
                                      <option value="2016">2016</option>
                                      <option value="2017">2017</option>
                                      <option value="2018">2018</option>
                                      <option value="2019">2019</option>
                                      <option value="2020">2020</option>
                                      <option value="2021">2021</option>
                                      <option value="2022">2022</option>
                                      <option value="2023">2023</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <!--paymentInput-->

                              <div style="clear:both"></div>
                              <div class="paymentInput clearfix">
                                <label for="VerificationCode">Codigo de Verificación *</label>
                                <br>
                                <input type="text" name="VerificationCode" id="code_taj" style="width:90px;">
                                <br>
                              </div>
                              <!--paymentInput-->

                              <div>
                                <input type="checkbox" name="saveInfo" id="saveInfoid" id="salvar_taj">
                                <label for="saveInfoid">&nbsp;Guardar la información de mi tarjeta de Crédito</label>
                              </div>
                            </div>
                            <!--creditCard-->


                          </div>
                         </div>
                      </div>
                    </div>

                    <div class="panel panel-default">
                      <div class="panel-heading panel-heading-custom">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"> <span class="numberCircuil">Opcion 4</span><strong> PayPal</strong> </a> </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p> Todas las transacciones son seguras y encriptadas. Para saber mas, por favor ve nuestra politica de privacidad.</p>
                          <br>
                          <label class="radio-inline" for="radios-3">
                            <input name="radios" id="radios-3" value="4" type="radio">
                            <img src="images/site/payment/paypal-small.png" height="18" alt="paypal"> Comprar con Paypal </label>
                          <div class="form-group">
                            <label for="CommentsOrder2">Agrega comentarios acerca de tu orden</label>
                            <textarea id="CommentsOrder2" class="form-control" name="CommentsOrder2" cols="26" rows="3"></textarea>
                          </div>
                          <div class="form-group clearfix">
                            <label class="checkbox-inline" for="checkboxes-0">
                              <input name="checkboxes" id="checkboxes-0" value="1" type="checkbox">
                              He leído y acepto los <a href="terms-conditions.html">Terminos y Condiciones</a> </label>
                          </div>

                        </div>
                       </div>
                    </div>



                  </div>
                </div>

                <!--/row-->

              </div>
            </div>
		';
	}
	
	function CambioFase(){
		$this->model_afiliado->CambiarFase($_POST['id'], $_POST['red'], $_POST['fase']);
	}
	
	function MensajeFase(){
		$id = $_POST['id'];
		$red = $_POST['red'];
		$valor_retencion  = $this->model_perfil_red->ObtenerRetencioFase();
		$this->template->set("id",$id);
		$this->template->set("red",$red);
		$this->template->set("valor_retencion",$valor_retencion);
		$this->template->build('website/ov/perfil_red/fases');
	}
	
	function ConsultarPremio(){
		$id = $_POST['id'];
		$premio = $this->modelo_premios->ConsultarPremio($id);
		$this->template->set("premio",$premio);
		$this->template->build('website/ov/perfil_red/premio');
	}
}
