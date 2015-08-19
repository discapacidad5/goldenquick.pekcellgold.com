<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class descargas extends CI_Controller
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
		$this->load->model('bo/modelo_comercial');
		$this->load->model('bo/model_descargas');
		$this->load->model('bo/general');
	}
	function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style(1);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/descargas/index');
	}

	function alta()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$grupos=$this->modelo_comercial->get_groups("DES");
		$this->template->set("grupos",$grupos);
		
		$style=$this->modelo_dashboard->get_style(1);
		
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/descargas/alta');
	}
	function listar()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}
		
		
		$archivos = $this->model_descargas->Archivos();
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		$style=$this->modelo_dashboard->get_style(1);
		
		$this->template->set("style",$style);
		$this->template->set("archivos",$archivos);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/descargas/listar');
	}
	
	function CrearArchivo(){
		$grupo = $_POST['grupo'];
		$nombre_ebook = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}
		
		$id = $this->tank_auth->get_user_id();
		
		//Checamos si el directorio del usuario existe, si no, se crea
		if(!is_dir(getcwd()."/media/archivos/"))
		{
			mkdir(getcwd()."/media/archivos/", 0777);
		}
		
		$ruta="/media/archivos/";
		//definimos la ruta para subir el archivo
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= '*';
		
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		
		$this->upload->initialize($config);
		
		if ($grupo == "0"){
			$error = "Debe seleccionar un grupo para el archivo.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/descargas/alta');
		}
		
		if(!isset($nombre) && !isset($descripcion)){
			$error = "Debe darle un nombre y descripcion para el archivo.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/descargas/alta');
		}
		
		$extension =  explode('.', $_FILES['userfile1']['name']);
		$id_archivo = $this->model_descargas-> BuscarTipo(end($extension));
		if($id_archivo == null){
			$error = "El tipo de archivo que esta cargando no esta permitido.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/descargas/listar');
		}
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_upload('userfile1'))
		{	
			$error = "El tipo de archivo que esta cargando no esta permitido.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/descargas/alta');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$nombre = $data['upload_data']['file_name'];
			$filename = strrev($nombre);
			$explode = explode(".",$filename);
			$extencion = strrev($explode[0]);
			$ext=strtolower($extencion);

			$this->model_descargas->CrearArchivo($id, $grupo, $ext,$nombre_ebook, $descripcion, $ruta.$nombre);
			redirect('/bo/descargas/listar');
		}
		
	}
	
	function cambiar_estado_archivo(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		$id = $_POST['id'];
		$estado = $_POST['estado'];
		$this->model_descargas->CambiarEstado($id, $estado);
	}
	
	function eliminar_archivo(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		$id = $_POST['id'];
		$url = $this->model_descargas->EliminarArchivo($id);
		if(unlink($_SERVER['DOCUMENT_ROOT'].$url)){
				echo "File Deleted.";
		}
	}
	
	function editar_archivo(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		$style=$this->modelo_dashboard->get_style($id);
	
		$this->template->set("style",$style);
	
		
		$archivos = $this->model_descargas->consultar_archivo($_POST["id"]);
		
	
		$this->template->set("archivo",$archivos);
		
		$grupos=$this->modelo_comercial->get_groups("DES");
		$this->template->set("grupos",$grupos);
	
		$this->template->build('website/bo/oficinaVirtual/descargas/modificar');
	}
	
	function ActualizarArchivo(){
		
		$grupo = $_POST['grupo'];
		$nomre_archivo = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$estado = $_POST['estado'];
	
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id = $this->tank_auth->get_user_id();
		
		if($_FILES['userfile1']['name'] != ""){
			$extension =  explode('.', $_FILES['userfile1']['name']);
			$id_archivo = $this->model_descargas-> BuscarTipo(end($extension));
			if($id_archivo == null){
				$error = "El tipo de archivo que esta cargando no esta permitido.";
				$this->session->set_flashdata('error', $error);
				redirect('/bo/descargas/listar');
			}
		}
		
		//Checamos si el directorio del usuario existe, si no, se crea
		if(!is_dir(getcwd()."/media/archivos/"))
		{
			mkdir(getcwd()."/media/archivos/", 0777);
		}
		
		$ruta="/media/archivos/";
		//definimos la ruta para subir el archivo
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= '*';
	
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
	
		$this->upload->initialize($config);
	
		if ($grupo == "0"){
			$error = "Debe seleccionar un grupo para al archivo.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/descargas/listar');
		}
	
		if(!isset($nombre) && !isset($descripcion)){
			
			$error = "Debe darle un nombre y descripcion al archivo.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/descargas/listar');
		}
	
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_upload('userfile1')){
			$extension =  explode('.', $_FILES['userfile1']['name']);
			$error = array('error' => $this->upload->display_errors());
			//var_dump($error); exit;
			if(isset($extension[1])){
				$error = "El tipo de archivo que esta cargando no esta permitido.";
				$this->session->set_flashdata('error', $error);
				
			}
			$this->model_descargas->ActualizarArchivo2($_POST['id'], $id ,$grupo, $nomre_archivo, $descripcion, $estado);
		} else {
			$data = array('upload_data' => $this->upload->data());
	
			$nombre = $data['upload_data']['file_name'];
			$filename = strrev($nombre);
			$explode = explode(".",$filename);
			$extencion = strrev($explode[0]);
			$ext=strtolower($extencion);
			
			$this->model_descargas->ActualizarArchvo($_POST['id'], $id, $grupo, $ext,$nomre_archivo, $descripcion, $ruta.$nombre, $estado);
			
			
		}
		redirect('/bo/descargas/listar');
	}
}
