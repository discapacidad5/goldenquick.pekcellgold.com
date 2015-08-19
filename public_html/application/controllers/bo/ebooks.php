<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ebooks extends CI_Controller
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
		$this->load->model('bo/general');
		$this->load->model('bo/model_ebook');
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
		$this->template->build('website/bo/oficinaVirtual/ebooks/index');
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
	
		$style=$this->modelo_dashboard->get_style(1);
		$this->template->set("style",$style);
		
		$grupos=$this->modelo_comercial->get_groups("EBO");
		$this->template->set("grupos",$grupos);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/ebooks/alta');
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
		
		$ebooks=$this->model_ebook->ebooks();
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("style",$style);
		$this->template->set("ebooks",$ebooks);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/ebooks/listar');
	}
	
	function CrearEbook(){
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
		
		$this->ComprovarArchivos();
		//Checamos si el directorio del usuario existe, si no, se crea
		if(!is_dir(getcwd()."/media/ebooks/"))
		{
			mkdir(getcwd()."/media/ebooks/", 0777);
		}
		
		$ruta="/media/ebooks/";
		//definimos la ruta para subir el archivo
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'pdf|png|jpg|jpeg|PNG';
		
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		
		$this->upload->initialize($config);
		
		if ($grupo == "0"){
			$error = "Debe seleccionar un grupo para el ebook.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/ebooks/alta');
		}
		
		if(!isset($nombre) && !isset($descripcion)){
			$error = "Debe darle un nombre y descripcion al ebook.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/ebooks/alta');
		}
		$ebook;
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_upload('userfile1'))
		{	
			$error = "El tipo de archivo que esta cargando no esta permitido para el ebook debe ser un pdf.";
			//$error = array('error' => $this->upload->display_errors());
			//var_dump($error); exit;
			$this->session->set_flashdata('error', $error);
			
			redirect('/bo/ebooks/alta');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$nombre = $data['upload_data']['file_name'];
			$filename = strrev($nombre);
			$explode = explode(".",$filename);
			$extencion = strrev($explode[0]);
			$ext=strtolower($extencion);
			if($ext=="pdf")
				{
					$ebook = $this->model_ebook->CrearEbook($id, $grupo, $nombre_ebook, $descripcion, $ruta.$nombre);
				}else {
					$error = "El tipo de archivo que esta cargando no esta permitido para el ebook debe ser un pdf.";
					$this->session->set_flashdata('error', $error);
						
					redirect('/bo/ebooks/alta');
				}		
		}
		
		if (!$this->upload->do_upload('userfile2'))
		{
			$this->model_ebook->eliminararchivo($ebook);
			$error = "El tipo de archivo que esta cargando no esta permitido debe ser una imagen.";
			$this->session->set_flashdata('error', $error);
				
			redirect('/bo/ebooks/alta');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$nombre = $data['upload_data']['file_name'];
			$filename = strrev($nombre);
			$explode = explode(".",$filename);
			$extencion = strrev($explode[0]);
			$ext=strtolower($extencion);
			if($ext != 'pdf'){
				$nombre_archivo = explode(".", $nombre);
				$this->model_ebook->CargarImagenEbook($ebook, $ruta.$nombre, $nombre, $nombre_archivo[0], $extencion);
				redirect("/bo/ebooks/listar");
			}else{
				$this->model_ebook->eliminararchivo($ebook);
				$error = "El tipo de archivo que esta cargando no esta permitido debe ser una imagen.";
				$this->session->set_flashdata('error', $error);
				
				redirect('/bo/ebooks/alta');
			}
		
		}
	}
	
	private function ComprovarArchivos(){
		$pdf = explode(".", $_FILES['userfile1']['name']);
		$imagen = explode(".", $_FILES['userfile2']['name']);
		
		if(end($pdf) != 'pdf'){
			$error = "El tipo de archivo que esta cargando no esta permitido para el ebook debe ser un pdf.";
			$this->session->set_flashdata('error', $error);
						
			redirect('/bo/ebooks/alta');	
		}
		
		if(end($imagen) != 'png')
			if(end($imagen) != 'jpg')
				if( end($imagen) != 'jpeg')
					if( end($imagen) != 'gif'){
							
							$error = "El tipo de archivo que esta cargando no esta permitido debe ser una imagen.";
							$this->session->set_flashdata('error', $error);
							
							redirect('/bo/ebooks/alta');
		}
		return true;
	}
	
	function cambiar_estado_ebook(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
				$id = $_POST['id'];
		$estado = $_POST['estado'];
		$this->model_ebook->CambiarEstado($id, $estado);
	}
	
	function eliminar_ebook(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		$id = $_POST['id'];
		$urls = $this->model_ebook->EliminarEbook($id);
		
		foreach ($urls as $url){
			if(unlink($_SERVER['DOCUMENT_ROOT'].$url)){
				echo "File Deleted.";
			}
		}
		 exit;
	}
	
	function editar_ebook(){
		$id_ebook= $_POST["id"];
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$style=$this->modelo_dashboard->get_style($id);
		
		$this->template->set("style",$style);
		
		
		$ebook = $this->model_ebook->ebook($id_ebook);
		
		$this->template->set("ebook",$ebook);
		
		$grupos=$this->modelo_comercial->get_groups("EBO");
		$this->template->set("grupos",$grupos);
		
		$this->template->build('website/bo/oficinaVirtual/ebooks/modificar');
	}
	
	function ActualizarEbook(){
		$grupo = $_POST['grupo'];
		$nombre_ebook = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id = $this->tank_auth->get_user_id();
		
		//Checamos si el directorio del usuario existe, si no, se crea
		if(!is_dir(getcwd()."/media/ebooks/"))
		{
			mkdir(getcwd()."/media/ebooks/", 0777);
		}
		
		$ruta="/media/ebooks/";
		//definimos la ruta para subir el archivo
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'pdf|png|jpg|jpeg|PNG';
		
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		
		$this->upload->initialize($config);
		
		if ($grupo == "0"){
			$error = "Debe seleccionar un grupo para el ebook.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/ebooks/listar');
		}
		
		if(!isset($nombre) && !isset($descripcion)){
			$error = "Debe darle un nombre y descripcion al ebook.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/ebooks/listar');
		}
		
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_upload('userfile1')){
			$extension =  explode('.', $_FILES['userfile1']['name']);
			if(isset($extension[1])){
				$error = "El tipo de archivo que esta cargando no esta permitido para el ebook debe ser un pdf.";
				$this->session->set_flashdata('error', $error);
				redirect('/bo/ebooks/listar');
			}
			$this->model_ebook->ActualizarEbook2($_POST['id'], $grupo, $nombre_ebook, $descripcion);
		} else {
			$data = array('upload_data' => $this->upload->data());
				
			$nombre = $data['upload_data']['file_name'];
			$filename = strrev($nombre);
			$explode = explode(".",$filename);
			$extencion = strrev($explode[0]);
			$ext=strtolower($extencion);
			if($ext=="pdf")
			{
				$this->model_ebook->ActualizarEbook($_POST['id'], $id, $grupo, $nombre_ebook, $descripcion, $ruta.$nombre);
				
			}else {
				$error = "El tipo de archivo que esta cargando no esta permitido para el ebook debe ser un pdf.";
				$this->session->set_flashdata('error', $error);
		
				redirect('/bo/ebooks/listar');
			}
		}
		
		if (!$this->upload->do_upload('userfile2'))
		{
			$extension =  explode('.', $_FILES['userfile2']['name']);
			if(isset($extension[1])){
				$error = "El tipo de archivo que esta cargando no esta permitido para el ebook debe ser una imagen.";
				$this->session->set_flashdata('error', $error);
				redirect('/bo/ebooks/listar');
			}
			redirect('/bo/ebooks/listar');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$nombre = $data['upload_data']['file_name'];
			$filename = strrev($nombre);
			$explode = explode(".",$filename);
			$extencion = strrev($explode[0]);
			$ext=strtolower($extencion);
			if($ext != 'pdf'){
				$nombre_archivo = explode(".", $nombre);
				$this->model_ebook->ActualizarImagenEbook($_POST['id'], $ruta.$nombre, $nombre, $nombre_archivo[0], $extencion);
				redirect("/bo/ebooks/listar");
			}else{
				$error = "El tipo de archivo que esta cargando no esta permitido debe ser una imagen.";
				$this->session->set_flashdata('error', $error);
		
				redirect('/bo/ebooks/listar');
			}
		
		}
	}
}
