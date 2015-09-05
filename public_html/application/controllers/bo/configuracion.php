<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class configuracion extends CI_Controller
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


		$this->load->model('bo/model_mercancia');

		$this->load->model('model_datos_generales_soporte_tecnico');
		$this->load->model('model_cat_grupo_soporte_tecnico');
		$this->load->model('model_tipo_red');
		$this->load->model('model_archivo_soporte_tecnico');


		$this->load->model('bo/model_mercancia');
		$this->load->model('model_datos_generales_soporte_tecnico');
		$this->load->model('model_cat_grupo_soporte_tecnico');
		
		$this->load->model('bo/model_soporte_tecnico');

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
		$this->template->build('website/bo/configuracion/index');
	}
	
	function comisiones()
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
		
		$categorias  = $this->model_mercancia->CategoriasMercancia();

		$this->template->set("categorias",$categorias);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/configuracion/comisiones');
	}

	function actualizar_comisiones(){
		
		$this->model_admin->new_profundidad();
		redirect('bo/configuracion/comisiones');
	}
	
	function tipoRed()
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
		$this->template->build('website/bo/configuracion/tipo_red');
	}
		
	function soporte_tecnico()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/configuracion/soporte_tecnico');
	}
	
	function videos_ver_redes()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
	
		$redes = $this->model_tipo_red->listarTodos();
	
		$this->template->set("style",$style);
		$this->template->set("redes",$redes);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/videos_ver_redes');
	}
	
	function videos()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
	
		$id_red = $_GET['id_red'];
	
		$this->template->set("style",$style);
		$this->template->set("id_red",$id_red);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/videos/index');
	}
	
	function alta_videos()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
	
		$id_red = $_GET['id_red'];
		$videos=$this->model_archivo_soporte_tecnico->get_video();
		$data=array();
		$data['videos']=$videos;
		$this->template->set("style",$style);
		
		$this->template->set("id_red",$id_red);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/videos/alta',$data);
	}
	
	function alta_normal_videos()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
		
		$id_red = $_GET['id_red'];
		
		$videos=$this->model_archivo_soporte_tecnico->get_video();
		$grupos = $this->model_cat_grupo_soporte_tecnico->get_groups("VID", $id_red);
		$data=array();
		$data['videos']=$videos;
		$data['grupos']=$grupos;
		
		$this->template->set("style",$style);
		$this->template->set("id_red",$id_red);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/videos/alta_normal',$data);
	}
	
	function sube_video()	{
		$id_red = $_GET['id_red'];
		//var_dump($id_red);
		//exit();
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
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
				redirect('/bo/configuracion/alta_normal_videos?id_red='.$id_red);
			}
				
			if($extImagen=="png"||$extImagen=="jpg"||$extImagen=="jpeg"||$extImagen=="gif"){
					
			}else {
				$this->session->set_flashdata('error','El tipo de archivo de imagen que se intenta subir no esta permitido');
				redirect('/bo/configuracion/alta_normal_videos?id_red='.$id_red);
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
					if (!isset($_POST['grupo_frm'])){
						$error = "Debe seleccionar un grupo para el archivo.";
						$this->session->set_flashdata('error', $error);
						redirect('/bo/configuracion/alta_normal_videos?id_red='.$id_red);
					}
					else {
						$this->db->query('insert into archivo_soporte_tecnico (id_usuario,id_grupo,id_tipo,descripcion,ruta,status,nombre_publico,id_red)
						values ('.$id.','.$_POST['grupo_frm'].',2,"'.$_POST['desc_frm'].'","'.$ruta.$key["file_name"].'","ACT","'.$_POST["nombre_publico"].'",'.$id_red.')');
						$video=mysql_insert_id();
					}
				}
				else
				{
					$this->db->query('insert into cat_img (url,nombre_completo,nombre,extencion,estatus)
					values ("'.$ruta.$key["file_name"].'","'.$key["file_name"].'","'.$nombre.'","'.$extencion.'","ACT")');
					$imgn=mysql_insert_id();
				}
	
			}
			$this->db->query('insert into cross_img_archivo_soporte_tecnico	values ('.$video.','.$imgn.')');
			redirect('/bo/configuracion/listar_videos?id_red='.$id_red);
		}
		
		$this->session->set_flashdata('error','El tipo de archivo de video que se intenta subir no esta permitido , solo se permiten videos en formato MP4');
		redirect('/bo/configuracion/alta_normal_videos?id_red='.$id_red);
	}
	
	function alta_youtube_videos()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
	
		$id_red = $_GET['id_red'];
		
		$videos=$this->model_archivo_soporte_tecnico->get_video();
		$grupos = $this->model_cat_grupo_soporte_tecnico->get_groups("VID", $id_red);
		$data=array();
		$data['videos']=$videos;
		$this->template->set("style",$style);
		$this->template->set("id_red",$id_red);
		$data['grupos']=$grupos;
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/videos/alta_youtube',$data);
	}
	
	function sube_video_youtube()
	{
		$id_red = $_GET['id_red'];
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
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
			redirect('/bo/configuracion/alta_youtube_videos?id_red='.$id_red);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$filename=strrev($data["upload_data"]["file_name"]);
			$explode=explode(".",$filename);
			$nombre=strrev($explode[1]);
			$extencion=strrev($explode[0]);
			$ext=strtolower($extencion);
			if($ext=='jpg'||$ext=="png"||$ext=="jpeg"||$ext=="gif")
			{
				$this->db->query('insert into cat_img (url,nombre_completo,nombre,extencion,estatus)
				values ("'.$ruta.$data["upload_data"]["file_name"].'","'.$data["upload_data"]["file_name"].'","'.$nombre.'","'.$extencion.'","ACT")');
				$imgn=mysql_insert_id();
	
				$this->db->query('insert into archivo_soporte_tecnico (id_usuario,id_grupo,id_tipo,descripcion,ruta,status,nombre_publico,id_red)
				values ('.$id.','.$_POST['grupo_frm'].',21,"'.$_POST['desc_frm'].'","'.$_POST["url"].'","ACT","'.$_POST["nombre_publico"].'",'.$id_red.')');
				$video=mysql_insert_id();
				$this->db->query('insert into cross_img_archivo_soporte_tecnico	values ('.$video.','.$imgn.')');
			}
			redirect('/bo/configuracion/listar_videos?id_red='.$id_red);
		}
		$this->session->set_flashdata('error','El tipo de archivo que se intenta subir no esta permitido');
		redirect('/bo/configuracion/alta_youtube_videos?id_red='.$id_red);
	}
	
	function listar_videos()
	{
		$id_red = $_GET['id_red'];
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$videos=$this->model_archivo_soporte_tecnico->get_video();
		$grupos = $this->model_cat_grupo_soporte_tecnico->get_groups("VID", $id_red);
		$comentarios=$this->model_archivo_soporte_tecnico->get_comments();
		$data['videos']=$videos;
		$data['grupos']=$grupos;
		$data['comentarios']=$comentarios;
		$this->template->set("style",$style);
		$this->template->set("id_red",$id_red);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/videos/listar',$data);
	}
	
	function insert_coment()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$id_user=$this->tank_auth->get_user_id();
		$data=$_GET["info"];
		$data=json_decode($data,true);
		$id=$data['video'];
		$coment=$data['comentario'];
		$this->db->query('insert into comentario_video_soporte_tecnico (comentario,id_video,autor) values ("'.$coment.'"," '.$id.'","'.$id_user.'")');
	}
	
	function cambiar_estado_video(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		$this->db->query("update archivo_soporte_tecnico set status = '".$_POST['estado']."' where id_archivo=".$_POST["id"]);
	}
	
	function kill_video(){
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$id = $_POST['id'];
		$q = $this->db->query('select * from cross_img_archivo_soporte_tecnico where id_archivo='.$id);
		$cross_img_archivo_s_t = $q->result();
		
		$id_img = $cross_img_archivo_s_t[0]->id_img;
		$q = $this->db->query('select * from cat_img where id_img='.$id_img);
		$cat_img = $q->result();
		$url_img = $cat_img[0]->url;
		
		$url = $this->model_archivo_soporte_tecnico->EliminarArchivo($id);
		if(unlink($_SERVER['DOCUMENT_ROOT'].$url)){
			echo "File Deleted.";
		}
		if(unlink($_SERVER['DOCUMENT_ROOT'].$url_img)){
			echo "File Deleted.";
		}
		$this->db->query('delete from cross_img_archivo_soporte_tecnico where id_img='.$id_img);
		$this->db->query('delete from cat_img where id_img='.$id_img);
		$this->db->query("delete from comentario_video_soporte_tecnico where id_video=".$id);
	}
	
	function kill_comentario(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$this->db->query("delete from comentario_video_soporte_tecnico where id=".$_POST["id"]);
	}
	
function informacion_ver_redes()
	{
			$id_para_soporte = $_GET['id'];
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
	
		$redes = $this->model_tipo_red->listarTodos();
	
		$this->template->set("style",$style);
		$this->template->set("redes",$redes);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		if($id_para_soporte==0){
			$this->template->build('website/bo/soporteTecnico/informacion_ver_redes');
				
		}else{
			
			$this->template->build('website/bo/soporteTecnico/redes_chat');
		}
	}
	
	
function chat_soporte(){
		$red_temporal=$_GET['id_red'];
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		if (!($_COOKIE['red1']=="3")){
			header("Refresh:0;url='/bo/configuracion/chat_soporte?id_red=".$red_temporal."'");
		}
		
		include_once("cometchat/model_soporte_chat.php");
		$chat_r=new Red_chat;
		$chat_r->soporte_red();

		
		
		$id=$this->tank_auth->get_user_id();		
		$style=$this->modelo_dashboard->get_style(1);		
		$this->template->set("style",$style);
	
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		
		$consultar_siesta_asignada=$this->model_soporte_tecnico->consultar_asignacion_de_soporte($id);
		
		if($consultar_siesta_asignada!=null){
			$this->model_soporte_tecnico->actualizar_asignacion_de_red($id);
		}else{
			$this->model_soporte_tecnico->asignar_red_de_soporte($id);
		}
	
		
 		$this->template->build('website/bo/soporteTecnico/chat_soporte');
 	
		
		
}

	function informacion()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
	
		$style=$this->modelo_dashboard->get_style(1);
	
		$id_red = $_GET['id_red'];
	
		$this->template->set("style",$style);
		$this->template->set("id_red",$id_red);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/informacion/index');
	}
	
	function alta_informacion()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
		$id_red = $_GET['id_red'];
		$this->template->set("id_red",$id_red);
		
		$grupos = $this->model_cat_grupo_soporte_tecnico->get_groups("INF", $id_red);
		$this->template->set("grupos",$grupos);
	
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/informacion/alta');
	}
	
	function CrearArchivoInformacion(){
		
		$grupo = $_POST['grupo'];
		$nombre_ebook = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$id_red = $_POST['id_red'];
	
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
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
			$error = "Debe seleccionar un grupo para el archivo.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/configuracion/alta_informacion?id_red='.$id_red);
		}
	
		if(!isset($nombre) && !isset($descripcion)){
			$error = "Debe darle un nombre y descripcion para el archivo.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/configuracion/alta_informacion?id_red='.$id_red);
		}
	
		$extension =  explode('.', $_FILES['userfile1']['name']);
		$id_archivo = $this->model_archivo_soporte_tecnico-> BuscarTipo(end($extension));
		if($id_archivo == null){
			$error = "El tipo de archivo que esta cargando no esta permitido.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/configuracion/alta_informacion?id_red='.$id_red);
		}
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_upload('userfile1'))
		{
			$error = "El tipo de archivo que esta cargando no esta permitido.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/configuracion/alta_informacion?id_red='.$id_red);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
				
			$nombre = $data['upload_data']['file_name'];
			$filename = strrev($nombre);
			$explode = explode(".",$filename);
			$extencion = strrev($explode[0]);
			$ext=strtolower($extencion);
	
			$this->model_archivo_soporte_tecnico->CrearArchivo($id, $grupo, $ext,$nombre_ebook, $descripcion, $ruta.$nombre, $id_red);
			redirect('/bo/configuracion/listar_informacion?id_red='.$id_red);
		}
	}
	
	function listar_informacion()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
		$id_red = $_GET['id_red'];
		$archivos = $this->model_archivo_soporte_tecnico->Archivos($id_red);
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);

		$this->template->set("id_red",$id_red);
		$this->template->set("style",$style);
		$this->template->set("archivos",$archivos);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/informacion/listar');
	}
	
	function cambiar_estado_archivo_soporte_tecnico(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
	
		$id = $_POST['id'];
		$estado = $_POST['estado'];
		$this->model_archivo_soporte_tecnico->CambiarEstado($id, $estado);
	}
	
	function eliminar_archivo_soporte_tecnico(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$id = $_POST['id'];
		$url = $this->model_archivo_soporte_tecnico->EliminarArchivo($id);
		if(unlink($_SERVER['DOCUMENT_ROOT'].$url)){
			echo "File Deleted.";
		}
	}
	
	function editar_archivo_soporte_tecnico(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("style",$style);
	
		$archivo = $this->model_archivo_soporte_tecnico->consultar_archivo($_POST["id"]);
	
		$this->template->set("archivo",$archivo);
	
		$grupos = $this->model_cat_grupo_soporte_tecnico->get_groups("INF", $_GET['id_red']);
		$this->template->set("grupos",$grupos);
		$this->template->set("id_red",$_GET['id_red']);
	
		$this->template->build('website/bo/soporteTecnico/informacion/modificar');
	}
	
	function ActualizarArchivo_soporte_tecnico(){
	
		$grupo = $_POST['grupo'];
		$nomre_archivo = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$estado = $_POST['estado'];
		$id_red = $_POST['id_red'];
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		if ($grupo == "0"){
			$error = "Debe seleccionar un grupo para al archivo.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/configuracion/listar_informacion?id_red='.$id_red);
		}
				
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id = $this->tank_auth->get_user_id();
	
		$extension =  explode('.', $_FILES['userfile1']['name']);
	
		$id_archivo = $this->model_archivo_soporte_tecnico-> BuscarTipo(end($extension));
		
		if ($_POST["file_nme"]==''){
				
			$this->model_archivo_soporte_tecnico->ActualizarArchivo2($_POST['id'], $id ,$grupo, $nomre_archivo, $descripcion, $estado);
			redirect('/bo/configuracion/listar_informacion?id_red='.$id_red);
		}
		
		if($id_archivo == null){
			$error = "El cambio de datos no ha sido efectuado.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/configuracion/listar_informacion?id_red='.$id_red);
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
	
		if(!isset($nombre) && !isset($descripcion)){
				
			$error = "Debe darle un nombre y descripcion al archivo.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/configuracion/listar_informacion?id_red='.$id_red);
		}
	
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_upload('userfile1')){
			$extension =  explode('.', $_FILES['userfile1']['name']);
			$error = array('error' => $this->upload->display_errors());
			var_dump($error); exit;
			if(isset($extension[1])){
				
			}
			$this->model_archivo_soporte_tecnico->ActualizarArchivo2($_POST['id'], $id ,$grupo, $nomre_archivo, $descripcion, $estado);
		} else {
			$data = array('upload_data' => $this->upload->data());
	
			$nombre = $data['upload_data']['file_name'];
			$filename = strrev($nombre);
			$explode = explode(".",$filename);
			$extencion = strrev($explode[0]);
			$ext=strtolower($extencion);
				
			$this->model_archivo_soporte_tecnico->ActualizarArchvo($_POST['id'], $id, $grupo, $ext,$nomre_archivo, $descripcion, $ruta.$nombre, $estado);
				
				
		}
		redirect('/bo/configuracion/listar_informacion?id_red='.$id_red);
	}
	
	function datos_generales_ver_redes()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
		
		$redes = $this->model_tipo_red->listarTodos();
	
		$this->template->set("style",$style);
		$this->template->set("redes",$redes);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/datos_generales_ver_redes');
	}
	
	function datos_generales()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
		
		$id_red = $_GET['id_red'];
		$datos_generales = $this->model_datos_generales_soporte_tecnico->traer_por_red($id_red);
		$vacio = 0;
		
		$this->template->set("style",$style);
		$this->template->set("datos_generales",$datos_generales);
		$this->template->set("vacio",$vacio);
		$this->template->set("id_red",$id_red);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/datos_generales');
	}
	
	function actualizar_datos_generales()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}

		if ($_POST['vacio']==3){
			$this->model_datos_generales_soporte_tecnico->insertar($_POST['skype'], $_POST['pekey'], $_POST['pinkost'], $_POST['id_red']);
		}
		else $this->model_datos_generales_soporte_tecnico->actualizar($_POST['skype'], $_POST['pekey'], $_POST['pinkost'], $_POST['id_red']);
		
		$success = "El cambio se ha efectuado satisfactoriamente.";
		$this->session->set_flashdata('success', $success);
		
		redirect('/bo/configuracion/datos_generales?id_red='.$_POST['id_red']);
	}
	
	function grupos_soporte_tecnico()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/grupos/index');
	} 
	
	function alta_grupos_soporte_tecnico()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
		$redes = $this->model_tipo_red->listarTodos();
		
		$this->template->set("style",$style);
		$this->template->set("redes",$redes);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/grupos/alta');
	}
	
	function listar_grupos_soporte_tecnico()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
	
		$grupos  = $this->model_cat_grupo_soporte_tecnico->listar();
		$redes = $this->model_tipo_red->listarTodos();
	
		$this->template->set("style",$style);
		$this->template->set("grupos",$grupos);
		$this->template->set("redes",$redes);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/soporteTecnico/grupos/listar');
	}
	
	function add_grupo_soporte_tecnico()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
	
		$this->db->query("insert into cat_grupo_soporte_tecnico (descripcion,estatus,tipo,id_red) values ('".$_POST['grupo']."','ACT','".$_POST['tipo']."','".$_POST['red']."')");
	}
	
	function editar_grupo(){
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$id              = $this->tank_auth->get_user_id();
		
		$redes = $this->model_tipo_red->listarTodos();
		$grupo  = $this->model_cat_grupo_soporte_tecnico->traer_grupo($_POST['id']);
		
		$this->template->set("grupo",$grupo);
		$this->template->set("redes",$redes);
		$this->template->build('website/bo/soporteTecnico/grupos/editar');
	}
	
	function actualizar_grupo(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$correcto = $this->model_cat_grupo_soporte_tecnico->actualizar_grupo();
		if($correcto){
			echo "Grupo Actualizado";
		}
		else{
			echo "No se logro actualizar el grupo";
		}
	
	}
	
	function kill_grupo()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$q = $this->db->query("select * from archivo_soporte_tecnico where id_grupo=".$_POST["id"]);
		$archivo_s_t = $q->result();
		
		if ($archivo_s_t == null){
			$this->db->query("delete from cat_grupo_soporte_tecnico where id=".$_POST["id"]);
			echo "Felicidades<br> La categoria ha sido eliminada.";
		}
		else{
			echo "La categoria que intenta borrar tiene archivos en su contenido,
			 <br> para poder eliminarla debe eliminar primero dichos archivos.
			 <br>          Otra opción es que deshabilite la categoria.";
		}
	}
	
	function cambiar_estado_grupo(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"soporte"))
		{
			redirect('/auth/logout');
		}
		
		$this->db->query("update cat_grupo_soporte_tecnico set estatus = '".$_POST['estado']."' where id=".$_POST["id"]);
	}
	
	function categorias()
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
		$this->template->build('website/bo/configuracion/categorias');
	}
	
	function premios()
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
		$this->template->build('website/bo/configuracion/premios');
	}
	
	function retenciones()
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
		$this->template->build('website/bo/configuracion/retenciones');
	}
	
	function nueva_retencion()
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
		$this->template->build('website/bo/configuracion/nueva_retencion');
	}
	
	function listar_retenciones()
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
		};
		
		$retenciones 	 = $this->model_admin->get_retencion();
		
		$style=$this->modelo_dashboard->get_style($id);
	
		$this->template->set("style",$style);
		$this->template->set("retenciones",$retenciones);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/retenciones/index');
	}
	function cambiar_estado_retencion(){
		$correcto = $this->model_admin->cambiar_estatus_retencion();
		echo "";
	}
	function editar_retencion(){
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
		$retencion	 	 = $this->model_admin->get_retencion_id($_POST['id']);
	
		$this->template->set("retencion",$retencion);
		$this->template->build('website/bo/retenciones/editar');
	}
	
	function actualizar_retencion(){
		$correcto = $this->model_admin->actualizar_retencion();
		if($correcto){
			echo "Retencion Actualizada";
		}
		else{
			echo "No se logro actualizar la Retencion";
		}
	
	}
	
	function eliminar_retencion(){
		echo "Retencion Eliminada";
	
	}
	
	function impuestos()
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
		$this->template->build('website/bo/configuracion/impuestos');
	}
	
	function nuevo_impuesto()
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
		
		
		$paises            = $this->model_admin->get_pais_activo();
		
		$style=$this->modelo_dashboard->get_style($id);
	
		$this->template->set("style",$style);
		$this->template->set("paises",$paises);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/configuracion/nuevo_impuesto');
	}
	
	function listar_impuestos()
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
		
		
		$impuestos 	 = $this->model_admin->get_impuestos();
	
		$style=$this->modelo_dashboard->get_style($id);
	
		$this->template->set("style",$style);
		$this->template->set("impuestos",$impuestos);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/impuestos/index');
	}
	function cambiar_estado_impuesto(){
		$correcto = $this->model_admin->cambiar_estatus_impuesto();
	}
	function editar_impuesto(){
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
		$impuesto	 	 = $this->model_admin->get_impuesto_id($_POST['id']);
	
		$paises            = $this->model_admin->get_pais_activo();
		$this->template->set("paises",$paises);
		$this->template->set("impuesto",$impuesto);
		$this->template->build('website/bo/impuestos/editar');
	}
	
	function actualizar_impuesto(){
		$correcto = $this->model_admin->actualizar_impuesto();
		if($correcto){
			echo "Impuesto Actualizado";
		}
		else{
			echo "No se logro actualizar el impuesto";
		}
	
	}
	
	function eliminar_impuesto(){
		echo "Impuesto Eliminado";
	}
}
