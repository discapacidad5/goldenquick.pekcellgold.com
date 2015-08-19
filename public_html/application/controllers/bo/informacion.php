<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class informacion extends CI_Controller
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
		$this->template->build('website/bo/oficinaVirtual/informacion/index');
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
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/informacion/alta');
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
		
		$infos=$this->modelo_comercial->get_info();
		$this->template->set("infos",$infos);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/informacion/listar');
	}
	
	function sube_info()
	{
		if ($_POST['nombre_frm']==""){
			$error = "Debe escribir un nombre para la informacion.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/informacion/alta');
		}
		else if ($_POST['desc_frm']==""){
			$error = "Debe escribir una descripcion para la informacion.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/informacion/alta');
		}
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
		//echo 'heey 2';
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_upload())
		{
			$error = "El tipo de archivo que esta cargando no esta permitido.";
				
				
				$this->session->set_flashdata('error', $error);
				redirect('/bo/informacion/alta');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$nombre=$data['upload_data']['file_name'];
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
				$this->db->query('insert into informacion (id_usuario,nombre,descripcion,img,status)
				values ('.$id.',"'.$_POST['nombre_frm'].'","'.$descripcion.'","'.$ruta.$nombre.".".$ext.'","'.ACT.'")');
			//echo 'ptm';
				
				
		}
		redirect('/bo/informacion/listar');
	}
	
	function estado_informacion(){
		$data=$_POST["info"];
		$data=json_decode($data,true);
		$this->db->query("update informacion set status = '".$data['estado']."' where id = '".$data['id']."'");
		return true;
	}
	
	function borrar_informacion()
	{
		$this->db->query('delete from informacion where id='.$_GET['id']);
	}
	
	function get_informacion()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}
	
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("style",$style);
	
		$id_informacion = $_POST['id'];
		$informacion = $this->modelo_comercial->informacion_espec($id_informacion);
		$this->template->set("informacion",$informacion);
	
		$this->template->set_theme('desktop');
		$this->template->build('website/bo/oficinaVirtual/informacion/modificar');
	}
	
	function editar_info()
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
			$error = "Debe escribir un nombre para la informacion.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/informacion/listar');
		}
		else if ($_POST['desc_frm']==""){
			$error = "Debe escribir una descripcion para la informacion.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/informacion/listar');
		}
		if ($_POST["file_nme"]==''){
			
			$descripcion = $_POST['desc_frm'];
			$descripcion = htmlentities($descripcion);
			
			$this->db->query('update informacion set nombre = "'.$_POST['nombre_frm'].'",
							descripcion = "'.$descripcion.'"
							where id = "'.$_POST["id_informacion"].'"');
			redirect('/bo/informacion/listar');
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
						location.href = '/bo/informacion/listar';</script>";
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
				//var_dump($this->upload->data(), "									bien");
				//exit();
				$descripcion = $_POST['desc_frm'];
				$descripcion = htmlentities($descripcion);
				
				$this->db->query('update informacion set nombre = "'.$_POST['nombre_frm'].'",
							descripcion = "'.$descripcion.'",
							img = "'.$ruta.$nombre.".".$ext.'"
							where id = "'.$_POST["id_informacion"].'"');
				redirect('/bo/informacion/listar');
			}
		}
	
	}
	
	function ver_informacion()
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
	
		$id_informacion = $_GET['id'];
		$informacion = $this->modelo_comercial->informacion_espec($id_informacion);
		$this->template->set("informacion",$informacion);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/oficinaVirtual/informacion/ver_informacion');
	}
	
}
