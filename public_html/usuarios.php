<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class usuarios extends CI_Controller
{
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
		$this->load->model('bo/model_tipo_usuario');
		$this->load->model('bo/modelo_dashboard');
	}
	
	function index(){
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
		
		$style=$this->modelo_dashboard->get_style(1);
		
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comercial/altas/usuarios/index');
	}
	
	function alta(){
		
		if (!$this->tank_auth->is_logged_in()){																		// logged in
		redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}

		$usuario=$this->general->get_username($id);
		
		$id              =  2;
		$sexo            = $this->model_perfil_red->sexo();
		$pais            = $this->model_perfil_red->get_pais();
		$style           = $this->general->get_style(1);
		$civil           = $this->model_perfil_red->edo_civil();
		$tipo_fiscal     = $this->model_perfil_red->tipo_fiscal();
		$estudios        = $this->model_perfil_red->get_estudios();
		$ocupacion       = $this->model_perfil_red->get_ocupacion();
		$tiempo_dedicado = $this->model_perfil_red->get_tiempo_dedicado();
		$redes 			 = $this->model_tipo_red->listarTodos();
		$tipos 			 = $this->model_tipo_usuario->listarTodos();
		
		$image 			 = $this->model_perfil_red->get_images($id);
		$red_forntales 	 = $this->model_tipo_red->ObtenerFrontales();
		
		
		
		$img_perfil="/template/img/empresario.jpg";
		foreach ($image as $img)
		{
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$img_perfil=$img->url;
			}
		}
		
		$this->template->set("sexo",$sexo);
		$this->template->set("civil",$civil);
		$this->template->set("pais",$pais);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		$this->template->set("redes",$redes);
		$this->template->set("tipos",$tipos);
		
		$this->template->set_theme('desktop');
		$this->template->set("style",$style);
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/comercial/red/NuevoUsuario');
	}
	
	function afiliar(){
		if (!$this->tank_auth->is_logged_in()){																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}
		
		$usuario=$this->general->get_username($id);
		
		$id              =  2;
		$style           = $this->general->get_style(1);
		
		$this->template->set_theme('desktop');
		$this->template->set("style",$style);
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/comercial/red/tipoAfiliacion');
	}
	
	function afiliar_existente(){
		if (!$this->tank_auth->is_logged_in()){																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}
		
		$usuario=$this->general->get_username($id);
		
		$id              =  2;
		$sexo            = $this->model_perfil_red->sexo();
		$pais            = $this->model_perfil_red->get_pais();
		$style           = $this->general->get_style(1);
		$civil           = $this->model_perfil_red->edo_civil();
		$tipo_fiscal     = $this->model_perfil_red->tipo_fiscal();
		$estudios        = $this->model_perfil_red->get_estudios();
		$ocupacion       = $this->model_perfil_red->get_ocupacion();
		$tiempo_dedicado = $this->model_perfil_red->get_tiempo_dedicado();
		$redes 			 = $this->model_tipo_red->listarTodos();
		$tipos 			 = $this->model_tipo_usuario->listarTodos();
		
		$image 			 = $this->model_perfil_red->get_images($id);
		$red_forntales 	 = $this->model_tipo_red->ObtenerFrontales();
		
		
		
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
		$this->template->set("redes",$redes);
		$this->template->set("tipos",$tipos);
		
		$this->template->set_theme('desktop');
		$this->template->set("style",$style);
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/comercial/red/AfiliarExistente');
	}
	function altaTipoDeUsuario(){
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
		
		$style=$this->modelo_dashboard->get_style(1);
		
		$tiposUsuario=$this->model_tipo_usuario->getTipoUsuarios();
		
		
		$this->template->set("tiposUsuario",$tiposUsuario);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		
		if ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');
		
		} elseif (!$this->config->item('allow_registration', 'tank_auth')) {	// registration is off
			$this->_show_message($this->lang->line('auth_message_registration_disabled'));
		
		} else {
			$use_username = $this->config->item('use_username', 'tank_auth');
			if ($use_username) {
				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|max_length['.$this->config->item('username_max_length', 'tank_auth').']|alpha_dash');
			}
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
			$email_activation = $this->config->item('email_activation', 'tank_auth');
		
			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->create_user(
						$use_username ? $this->form_validation->set_value('username') : '',
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password'),
						$email_activation))) {
							
				$this->model_tipo_usuario->newUser($_POST['nombre'],$_POST['apellido'],$_POST['tipo']);
				redirect('/bo/usuarios/listarTipoDeUsuario');
				/*
					$data['site_name'] = $this->config->item('website_name', 'tank_auth');
					$last_id=$this->general->get_last_id();
					$data['lst_id']=$last_id;
					if ($email_activation) {									// send "activate" email
						$data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;
						$id_nuevo_usr=$this->db->query("select id from users order by id desc limit 1");
						$data['id']=$id_nuevo_usr[0]->id;
						//$this->send_email_activate( $data['email'], $data);
		
						unset($data['password']); // Clear password (just for any case)
		
						//$this->_show_message($this->lang->line('auth_message_registration_completed_1'));
		
					} else {
		
						if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email
		
							//$this->_send_email('welcome', $data['email'], $data);
						}
						unset($data['password']); // Clear password (just for any case)
		
						//$this->_show_message($this->lang->line('auth_message_registration_completed_2').' '.anchor('/auth/login/', 'Login'));
					}*/
				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$data['use_username'] = $use_username;
			$this->template->set("data",$data);
			$this->template->set_theme('desktop');
			$this->template->set_layout('website/main');
			$this->template->set_partial('header', 'website/bo/header');
			$this->template->set_partial('footer', 'website/bo/footer');
			$this->template->build('website/bo/comercial/altas/usuarios/alta',$data);
				
		}

	}
	
	function listarTipoDeUsuario(){
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
	
		$style=$this->modelo_dashboard->get_style(1);
		$users=$this->model_tipo_usuario->get_all_users();

		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("users",$users);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comercial/altas/usuarios/listar');
	}
	
	function editarTipoDeUsuario(){
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style(1);
		$user	 	 = $this->model_tipo_usuario->getTipoUsuariosId($_POST['id']);
		$tiposUsuario=$this->model_tipo_usuario->getTipoUsuarios();
	
		$this->template->set("tiposUsuario",$tiposUsuario);
		$this->template->set("user",$user);
		$this->template->build('website/bo/comercial/altas/usuarios/editar');
	}
	
	function actualizar_users(){
		$_POST['mail']=$_POST['email'];
		$use_mail=$this->model_perfil_red->use_mail_modificar_perfil($_POST['id']);
		
		if($_POST['email']==""||$_POST['username']==""||$_POST['nombre']==""||$_POST['apellido']==""){
			echo "Faltaron datos por ingrensar";
			exit();
		}
		
		if($use_mail){
			echo "El Email ya existe , ingrese otro no existente";
			exit();
		}
		$use_username=$this->model_perfil_red->use_username_modificar($_POST['id']);
		
		if($use_username){
			echo "El nombre de usuario ya existe , ingrese otro no existente";
			exit();
		}

		$correcto = $this->model_tipo_usuario->actualizar_user();
		if($correcto){
			echo "Usuario Actualizado";
		}
		else{
			echo "No se puede actualizar el usuario";
		}
	
	}
	
	function kill_user()
	{
		$this->db->query("delete from users where id=".$_POST["id"]);
		$this->db->query("delete from user_profiles where user_id=".$_POST["id"]);
	}
	
	function afiliar_nuevo()
	{
	
		$resultado = $this->model_afiliado->crearUsuarioAdmin(2);
		
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
	
	function geneologico(){
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
		
		
		$id              = $_GET['id_afiliado'];
		$id_red			 = $_GET['id_red'];
		$nombre_red		 = $this->model_tipo_red->traer_nombre_red($id_red);
		$usuario         = $this->model_perfil_red->datos_perfil($id);
		$telefonos       = $this->model_perfil_red->telefonos($id);
		$sexo            = $this->model_perfil_red->sexo();
		$pais            = $this->model_perfil_red->get_pais();
		
		
		$style           = $this->general->get_style(1);
		$dir             = $this->model_perfil_red->dir($id);
		$civil           = $this->model_perfil_red->edo_civil();
		$tipo_fiscal     = $this->model_perfil_red->tipo_fiscal();
		$estudios        = $this->model_perfil_red->get_estudios();
		$ocupacion       = $this->model_perfil_red->get_ocupacion();
		$tiempo_dedicado = $this->model_perfil_red->get_tiempo_dedicado();
		$red          = $this->model_tipo_red->listarTodos();
		
		foreach ($red as $reds){
			$afiliadostree[$reds->id] = $this->model_perfil_red->get_afiliados($reds->id, $id);
		}
		
		$image 			 = $this->model_perfil_red->get_images($id);
		$red_forntales 	 = $this->model_tipo_red->ObtenerFrontales();
		
		
		
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
		$this->template->set("id_red",$id_red);
		$this->template->set("nombre_red",$nombre_red);
		$this->template->set("redes",$red);
		$this->template->set("style",$style);
		$this->template->set("afiliadostree",$afiliadostree);
		$this->template->set("sexo",$sexo);
		$this->template->set("civil",$civil);
		$this->template->set("pais",$pais);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		$this->template->set("img_perfil",$img_perfil);
		$this->template->set("red_frontales",$red_forntales);
		
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/comercial/red/geneologico_por_red');
	}
	
	function grafico1(){
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
		
		$id              = $_GET['id_afiliado'];
		$id_red			 = $_GET['id_red'];
		$nombre_red		 = $this->model_tipo_red->traer_nombre_red($id_red);
		
		$usuario         = $this->model_perfil_red->datos_perfil($id);
		$telefonos       = $this->model_perfil_red->telefonos($id);
		$sexo            = $this->model_perfil_red->sexo();
		$pais            = $this->model_perfil_red->get_pais();
		$style           = $this->general->get_style(1);
		$dir             = $this->model_perfil_red->dir($id);
		$civil           = $this->model_perfil_red->edo_civil();
		$tipo_fiscal     = $this->model_perfil_red->tipo_fiscal();
		$estudios        = $this->model_perfil_red->get_estudios();
		$ocupacion       = $this->model_perfil_red->get_ocupacion();
		$tiempo_dedicado = $this->model_perfil_red->get_tiempo_dedicado();
		$red          = $this->model_tipo_red->listarTodos();
	
		foreach ($red as $reds){
			$afiliados[$reds->id] = $this->model_perfil_red->get_afiliados($reds->id, $id);
		}
	
		$image 			 = $this->model_perfil_red->get_images($id);
		$red_forntales 	 = $this->model_tipo_red->ObtenerFrontales();
	
	
	
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
		$this->template->set("id_red",$id_red);
		$this->template->set("nombre_red",$nombre_red);
		$this->template->set("redes",$red);
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
		
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/comercial/red/grafico_1_por_red');
	}
	
	function grafico2(){
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
	
	
		$id              = $_GET['id_afiliado'];
		$id_red			 = $_GET['id_red'];
		$nombre_red		 = $this->model_tipo_red->traer_nombre_red($id_red);
		
		$usuario         = $this->model_perfil_red->datos_perfil($id);
		$telefonos       = $this->model_perfil_red->telefonos($id);
		$sexo            = $this->model_perfil_red->sexo();
		$pais            = $this->model_perfil_red->get_pais();
		$style           = $this->general->get_style(1);
		$dir             = $this->model_perfil_red->dir($id);
		$civil           = $this->model_perfil_red->edo_civil();
		$tipo_fiscal     = $this->model_perfil_red->tipo_fiscal();
		$estudios        = $this->model_perfil_red->get_estudios();
		$ocupacion       = $this->model_perfil_red->get_ocupacion();
		$tiempo_dedicado = $this->model_perfil_red->get_tiempo_dedicado();
		$red          = $this->model_tipo_red->listarTodos();
	
		foreach ($red as $reds){
			$afiliadostree[$reds->id] = $this->model_perfil_red->get_afiliados($reds->id, $id);
		}
	
		$image 			 = $this->model_perfil_red->get_images($id);
		$red_forntales 	 = $this->model_tipo_red->ObtenerFrontales();
	
	
	
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
		$this->template->set("id_red",$id_red);
		$this->template->set("nombre_red",$nombre_red);
		$this->template->set("redes",$red);
		$this->template->set("style",$style);
		$this->template->set("afiliadostree",$afiliadostree);
		$this->template->set("sexo",$sexo);
		$this->template->set("civil",$civil);
		$this->template->set("pais",$pais);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		$this->template->set("img_perfil",$img_perfil);
		$this->template->set("red_frontales",$red_forntales);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/comercial/red/genealogico2_por_red');
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
	            	<span class='quitar'  onclick='subred(".$afiliado[0]->user_id.",".$_POST['red'].")'><i class='fa fa-lg fa-plus-circle'></i> ".$afiliado[0]->nombre." ".$afiliado[0]->apellido."</span>
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
	
function subtree()
	{
		$id_red=$_POST['red'];
		$frontales 	 = $this->model_tipo_red->ObtenerFrontales();
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
		            	<a class='quitar' onclick='subtree(".$afiliado[0]->user_id.",".$id_red." )' style='background: url(".$img_perfil."); background-size: cover; background-position: center;' href='javascript:void(0)'></a>
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
}