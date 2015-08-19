<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mercancia extends CI_Controller
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
		$this->load->model('bo/model_mercancia');
		$this->load->model('bo/model_admin');
		
		$this->load->model('bo/modelo_comercial');
		$this->load->model('ov/model_perfil_red');
		$this->load->model('model_users');
		$this->load->model('model_tipo_red');
		$this->load->model('model_user_profiles');
		$this->load->model('model_coaplicante');
	}

	function index()
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
		$tipos = $this->model_mercancia->TiposMercancia();
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("tipos",$tipos);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comercial/altas/tipo_mercancia');
	}
	
	function nueva_mercancia(){
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
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$proveedores = array();
		if($_GET['id'] == 3){
			$proveedores	 = $this->model_mercancia->get_proveedor(2);
		}else{
			$proveedores	 = $this->model_mercancia->get_proveedor($_GET['id']);
		}
		
		$productos       = $this->model_admin->get_mercancia();
		
		$promo			 = $this->model_admin->get_promo();
		$grupos			 = $this->model_mercancia->CategoriasMercancia();
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
		$pais            = $this->model_admin->get_pais_activo();
		
		$redes           = $this->model_tipo_red->listarTodos();
		
		
		$this->template->set("pais",$pais);
		$this->template->set("redes",$redes);
		$this->template->set("productos",$productos);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("proveedores",$proveedores);
		$this->template->set("promo",$promo);
		$this->template->set("grupos",$grupos);
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
		if($_GET['id'] == 1){
			$this->template->build('website/bo/comercial/altas/mercancias/producto');
		}elseif ($_GET['id'] == 2){
			$this->template->build('website/bo/comercial/altas/mercancias/servicio');
		}else{
			$this->template->build('website/bo/comercial/altas/mercancias/combinado');
		}
		
	}
	
	private function validarMercancia($datos){
		if($datos['pais'] == "-"){
			return false;
		}
		if($datos['real'] == null){
			return false;
		}
		if($datos['costo'] == null){
			return false;
		}
		if( $datos['costo_publico'] == null){
			return false;
		}
		if($datos['nombre'] == null){
			return false;
		}
		if( $datos['red'] == null){
			return false;
		}
		return true;
	}
	function CrearServicio(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
		
		if(!isset($_POST['proveedor']))
			$_POST['proveedor']='Ninguno';
		
		$id = $this->tank_auth->get_user_id();
		
		if(!$this->validarMercancia($_POST)){
			$error = "Datos incompletos para crear la mercancia";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=2');
		}
		
		$ruta="/media/carrito/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|png';
		$config['max_width']  		= '4096';
		$config['max_height']   	= '3112';
		
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		
		if (!$this->upload->do_multi_upload('img'))
		{
			$error = "El tipo de archivo que esta cargando no esta permitido como imagen para el servicio.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=2');
		}
		else
		{
			$sku = $this->model_mercancia->nuevo_servicio();
			$data = array('upload_data' => $this->upload->get_multi_upload_data());
			$this->model_mercancia->img_merc($sku , $data["upload_data"]);
			redirect('/bo/comercial/carrito');
			
		}
		
	}
	
	function CrearProducto(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
	
		if(!isset($_POST['proveedor']))
			$_POST['proveedor']='Ninguno';
		
		if(!$this->validarMercancia($_POST)){
			$error = "Datos incompletos para crear la mercancia";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=1');
		}
		$id = $this->tank_auth->get_user_id();
	
		$ruta="/media/carrito/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|png';
		$config['max_width']  		= '4096';
		$config['max_height']   	= '3112';
	
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
	
		if (!$this->upload->do_multi_upload('img'))
		{
			$error = "El tipo de archivo que esta cargando no esta permitido como imagen para el producto.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=1');
		}
		else
		{
			$sku = $this->model_mercancia->nuevo_producto();
			$data = array('upload_data' => $this->upload->get_multi_upload_data());
			$this->model_mercancia->img_merc($sku , $data["upload_data"]);
			redirect('/bo/comercial/carrito');
		}
		
	}
	
	function CrearCombinado(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
		
		if(!isset($_POST['proveedor']))
			$_POST['proveedor']='Ninguno';
	
		$id = $this->tank_auth->get_user_id();
		
		if(!$this->validarMercancia($_POST)){
			$error = "Datos incompletos para crear la mercancia";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=3');
		}
		
		$ruta="/media/carrito/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|png';
		$config['max_width']  		= '4096';
		$config['max_height']   	= '3112';
	
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		
		if (!$this->upload->do_multi_upload('img'))
		{
			$error = "El tipo de archivo que esta cargando no esta permitido como imagen para el servicio.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=3');
		}
		else
		{
			$sku = $this->model_mercancia->nuevo_combinado();
			$data = array('upload_data' => $this->upload->get_multi_upload_data());
			$this->model_mercancia->img_merc($sku , $data["upload_data"]);
		}
		redirect('/bo/comercial/carrito');
	}
	
	function ImpuestaPais(){
		$impuestos = $this->model_mercancia->ImpuestoPais($_POST['pais']);
		echo json_encode($impuestos);
		
	}
	
	function new_proveedor()
	{
		if(isset($_POST)){
			if($this->ValidarProveedor()){
				
				$id=$this->tank_auth->get_user_id();
				$this->model_mercancia->new_proveedor($id);
			} 
		}
		
		
	}
	
	function ValidarProveedor(){
		if ($_POST['email'] == null){
			echo "El proveedor debe tener email";
			return false;
		}else if($_POST['empresa'] == null){
			echo "Seleciona Un pais para el proveedor";
			return false;
		}elseif($_POST['cp'] == null){
			echo "El proveedor debe tener un codigo postal";
			return false;
		}
		$i=0;
		foreach ($_POST['banco'] as $banco){
			if($banco == null){
				echo "El proveedor debe tener un banco";
				return false;
			}
			$i++;
		}
		
		foreach ($_POST['Cuenta'] as $banco){
			if($banco == null){
				echo "El proveedor debe tener minimo una cuenta de banco";
				return false;
			}
			$i++;
		}
		
		echo "El proveedor ha sido creado ".$_POST['nombre']." ".$_POST['apellido'];
		return true;
		
	}
}