<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class videos extends CI_Controller
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
		$this->template->build('website/bo/oficinaVirtual/videos/index');
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
		$videos=$this->modelo_comercial->get_video();
		$data=array();
		$data['videos']=$videos;
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/videos/alta',$data);
	}
	
	function alta_normal()
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
		$videos=$this->modelo_comercial->get_video();
		$grupos=$this->modelo_comercial->get_groups("VID");
		$data=array();
		$data['videos']=$videos;
		$data['grupos']=$grupos;
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/videos/alta_normal',$data);
	}
	
	function alta_youtube()
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
		$videos=$this->modelo_comercial->get_video();
		$grupos=$this->modelo_comercial->get_groups("VID");
		$data=array();
		$data['videos']=$videos;
		$this->template->set("style",$style);
		$data['grupos']=$grupos;
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/videos/alta_youtube',$data);
	}
	
function sube_video()	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

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
		$config['allowed_types'] 	= 'mp4|jpg|png|jpeg';

		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);

		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_multi_upload('userfile'))
		{

			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->get_multi_upload_data());
			
			$contador=0;
			$extVideo="";
			$extImagen="";
			
			foreach ($data["upload_data"] as $key)
			{
				if($contador==0){
					$filename=strrev($key["file_name"]);
					$explode=explode(".",$filename);
					$nombre=strrev($explode[1]);
					$extencion=strrev($explode[0]);
					$extVideo=strtolower($extencion);
			
				}
				else{
					$filename=strrev($key["file_name"]);
					$explode=explode(".",$filename);
					$nombre=strrev($explode[1]);
					$extencion=strrev($explode[0]);
					$extImagen=strtolower($extencion);
				}
				$contador++;
			}

			if($extVideo=="mp4"){
				
			}else {
				$this->session->set_flashdata('error','El tipo de archivo de video que se intenta subir no esta permitido , solo se permiten videos en formato MP4');
				redirect('/bo/videos/alta_normal');
			}
			
			if($extImagen=="png"||$extImagen=="jpg"||$extImagen=="jpeg"){
			
			}else {
				$this->session->set_flashdata('error','El tipo de archivo de imagen que se intenta subir no esta permitido');
				redirect('/bo/videos/alta_normal');
			}
			
			
			
			foreach ($data["upload_data"] as $key) 
			{
				if($contador==0){
					$filename=strrev($key["file_name"]);
					$explode=explode(".",$filename);
					$nombre=strrev($explode[1]);
					$extencion=strrev($explode[0]);
					$extVideo=strtolower($extencion);

				}	
				else{
					$filename=strrev($key["file_name"]);
					$explode=explode(".",$filename);
					$nombre=strrev($explode[1]);
					$extencion=strrev($explode[0]);
					$extImagen=strtolower($extencion);
				}
				echo $extVideo." - ".$extImagen;
				$contador++;
				
				$filename=strrev($key["file_name"]);
				$explode=explode(".",$filename);
				$nombre=strrev($explode[1]);
				$extencion=strrev($explode[0]);
				$ext=strtolower($extencion);
				if($ext=="mp4")
				{
					$this->db->query('insert into archivo (id_usuario,id_grupo,id_tipo,descripcion,ruta,status,nombre_publico) 
					values ('.$id.','.$_POST['grupo_frm'].',2,"'.$_POST['desc_frm'].'","'.$ruta.$key["file_name"].'","ACT","'.$_POST["nombre_publico"].'")');
					$video=mysql_insert_id();
				}
				else 
				{
					$this->db->query('insert into cat_img (url,nombre_completo,nombre,extencion,estatus) 
					values ("'.$ruta.$key["file_name"].'","'.$key["file_name"].'","'.$nombre.'","'.$extencion.'","ACT")');
					$imgn=mysql_insert_id();
				}
								
			}
			$this->db->query('insert into cross_img_archivo	values ('.$video.','.$imgn.')');
			redirect('/bo/videos/listar');
		}  
			$this->session->set_flashdata('error','El tipo de archivo de video que se intenta subir no esta permitido , solo se permiten videos en formato MP4');
			redirect('/bo/videos/alta_normal');
	}
	
function sube_video_youtube()
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

		if (!$this->upload->do_upload())
		{

			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error','El tipo de archivo que se intenta subir no esta permitido');
			redirect('/bo/videos/alta_youtube');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$filename=strrev($data["upload_data"]["file_name"]);
			$explode=explode(".",$filename);
			$nombre=strrev($explode[1]);
			$extencion=strrev($explode[0]);
			$ext=strtolower($extencion);
			if($ext=='jpg'||$ext=="png"||$ext=="jpeg")
			{
				$this->db->query('insert into cat_img (url,nombre_completo,nombre,extencion,estatus)
				values ("'.$ruta.$data["upload_data"]["file_name"].'","'.$data["upload_data"]["file_name"].'","'.$nombre.'","'.$extencion.'","ACT")');
				$imgn=mysql_insert_id();
	
				$this->db->query('insert into archivo (id_usuario,id_grupo,id_tipo,descripcion,ruta,status,nombre_publico)
				values ('.$id.','.$_POST['grupo_frm'].',21,"'.$_POST['desc_frm'].'","'.$_POST["url"].'","ACT","'.$_POST["nombre_publico"].'")');
				$video=mysql_insert_id();
				$this->db->query('insert into cross_img_archivo	values ('.$video.','.$imgn.')');
			}
			redirect('/bo/videos/listar');
		}
		$this->session->set_flashdata('error','El tipo de archivo que se intenta subir no esta permitido');
		redirect('/bo/videos/alta_youtube');
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
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$videos=$this->modelo_comercial->get_video();
		$grupos=$this->modelo_comercial->get_groups("VID");
		$comentarios=$this->modelo_comercial->get_comments();
		$style=$this->modelo_dashboard->get_style(1);
		$data['videos']=$videos;
		$data['grupos']=$grupos;
		$data['comentarios']=$comentarios;
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/videos/listar',$data);
	}
	
	function insert_coment()
	{
		$id_user=$this->tank_auth->get_user_id();
		$data=$_GET["info"];
		$data=json_decode($data,true);
		$id=$data['video'];
		$coment=$data['comentario'];
		$this->db->query('insert into comentario (comentario,id_video,autor) values ("'.$coment.'"," '.$id.'","'.$id_user.'")');
	}
	
	function cambiar_estado_video(){
		$this->db->query("update archivo set status = '".$_POST['estado']."' where id_archivo=".$_POST["id"]);
		
	}
	
	function kill_video(){
		$this->db->query("delete from archivo where id_archivo=".$_POST["id"]);
	}
	
	function kill_comentario(){
		$this->db->query("delete from comentario where id=".$_POST["id"]);
	}
}
