<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class noticias extends CI_Controller
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
		$this->load->model('bo/general');
		$this->load->model('bo/modelo_comercial');
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
		$this->template->build('website/bo/oficinaVirtual/noticias/index');
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
		
		$grupos=$this->modelo_comercial->get_groups("NOT");
		$this->template->set("grupos",$grupos);
	
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/noticias/alta');
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
	
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("style",$style);
		
		$noticias=$this->modelo_comercial->get_new();
		$this->template->set("noticias",$noticias);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/noticias/listar');
	}

	function ver_noticia()
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
	
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		
		$data=array();
		
			$data["noticia"]=$this->modelo_comercial->noticia_espec($_GET["idnw"]);
		
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/comercial/ver_noticia',$data);
	}
	
	function sube_noticia()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		//echo 'heey';
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}
	
		//Checamos si el directorio del usuario existe, si no, se crea
		if(!is_dir(getcwd()."/media/".$id))
		{
			mkdir(getcwd()."/media/".$id, 0777);
		}
	
		$ruta="/media/".$id."/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'jpg|png|gif|jpeg';
	
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		
		
		if ($_POST['nombre_frm']==""){
			$error = "Debe escribir un nombre para la presentacion.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/noticias/alta');
		}
		else if ($_POST['desc_frm']==""){
			$error = "Debe escribir una descripcion para la presentacion.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/noticias/alta');
		}
		//echo 'heey 2';
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_upload())
		{
			$error = "El tipo de archivo que esta cargando no esta permitido.";
				
				
				$this->session->set_flashdata('error', $error);
				redirect('/bo/noticias/alta');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$nombre=$data['upload_data']['file_name'];
			$filename=strrev($nombre);
			$explode=explode(".",$filename);
			$nombre=strrev($explode[1]);
			$extencion=strrev($explode[0]);
			$ext=strtolower($extencion);
			$descripcion = $_POST['desc_frm'];
			$descripcion = htmlentities($descripcion);
			//echo 'se supone que se debo de subir';
			
				//echo 'insert into noticia (id_usuario,nombre,contenido,imagen) values ('.$id.',"'.$_POST['nombre_frm'].'","'.$_POST['desc_frm'].'","'.$ruta.$_POST['file_nme'].'")';
				$this->db->query('insert into noticia (id_usuario,nombre,contenido,imagen,status,id_grupo)
				values ('.$id.',"'.$_POST['nombre_frm'].'","'.$descripcion.'","'.$ruta.$nombre.".".$ext.'","'.ACT.'","'.$_POST['grupo_frm'].'")');
			
			//echo 'ptm';
				
				
		}
		redirect('/bo/noticias/listar');
	}
	
	function borrar_noticia()
	{
		$this->db->query('delete from noticia where id='.$_GET['id']);
	
	}
	
	function estado_noticia(){
		$data=$_POST["info"];
		$data=json_decode($data,true);
		$this->db->query("update noticia set status = '".$data['estado']."' where id = '".$data['id']."'");
		return true;
	}

	function get_noticia()
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
		
		$grupos=$this->modelo_comercial->get_groups("NOT");
		$this->template->set("grupos",$grupos);
	
		$this->template->set("style",$style);
	
		$id_noticia = $_POST["id"];
		$noticia = $this->modelo_comercial->noticia_espec($id_noticia);
		$this->template->set("noticia",$noticia);
	
		$this->template->set_theme('desktop');
		$this->template->build('website/bo/oficinaVirtual/noticias/modificar');
	}

	function editar_noticia()
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
		
		if ($_POST['nombre_frm']==""){
			$error = "Debe escribir un nombre para la presentacion.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/noticias/listar');
		}
		else if ($_POST['desc_frm']==""){
			$error = "Debe escribir una descripcion para la presentacion.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/noticias/listar');
		}
		if ($_POST["file_nme"]==''){
			$descripcion = $_POST['desc_frm'];
			$descripcion = htmlentities($descripcion);
			$this->db->query('update noticia set nombre = "'.$_POST['nombre_frm'].'",
							contenido = "'.$descripcion.'",id_grupo = "'.$_POST['grupo_frm'].'"
							where id = "'.$_POST["id_noticia"].'"');
			redirect('/bo/noticias/listar');
		}
		else {
				
			
				
			//Checamos si el directorio del usuario existe, si no, se crea
			if(!is_dir(getcwd()."/media/".$id))
			{
				mkdir(getcwd()."/media/".$id, 0777);
			}
				
			$ruta="/media/".$id."/";
			//definimos la ruta para subir la imagen
			$config['upload_path'] 		= getcwd().$ruta;
			$config['allowed_types'] 	= 'jpg|png|gif|jpeg';
				
			//Cargamos la libreria con las configuraciones de arriba
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	
			//exit();
			//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
			if (!$this->upload->do_upload('userfile'))
			{
				echo "<script> alert('El archivo que estas ingresando no es valido.');
						location.href = '/bo/noticias/listar';</script>";
				//redirect('/bo/presentaciones/listar');
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$nombre=$data['upload_data']['file_name'];
				$filename=strrev($nombre);
				$explode=explode(".",$filename);
				$nombre=strrev($explode[1]);
				$extencion=strrev($explode[0]);
				$ext=strtolower($extencion);
				$descripcion = $_POST['desc_frm'];
				$descripcion = htmlentities($descripcion);
				//var_dump($this->upload->data(), "									bien");
				//exit();
				$this->db->query('update noticia set nombre = "'.$_POST['nombre_frm'].'",
							contenido = "'.$descripcion.'",id_grupo = "'.$_POST['grupo_frm'].'",
							imagen = "'.$ruta.$nombre.".".$ext.'"
							where id = "'.$_POST["id_noticia"].'"');
				redirect('/bo/noticias/listar');				
			}
		}
	
	}
}