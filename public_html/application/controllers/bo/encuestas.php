<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class encuestas extends CI_Controller
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
		$this->load->model('modelo_encuestas');
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
		$this->template->build('website/bo/oficinaVirtual/encuestas/index');
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
		$this->template->build('website/bo/oficinaVirtual/encuestas/alta');
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
		$encuestas=$this->modelo_comercial->get_encuestas();
		
		$this->template->set("style",$style);
		$this->template->set('encuestas',$encuestas);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/encuestas/listar');
	}
	
	function crear_encuesta(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}
		
		if(!isset($_POST['nombre'])){
			redirect("listar");
		}
		$style=$this->modelo_dashboard->get_style(1);
		
		
		$this->template->set("usuario",$id);
		$this->template->set("style",$style);
		$this->template->build('website/bo/comercial/crear_encuesta');
	}
	
	function insertar_encuesta()
	{
		$id_usuario=$this->tank_auth->get_user_id();
		$data=$_POST["info"];
		$data=json_decode($data,true);
		//print_r($data);
		$keys=array_keys($data);
		//print_r($keys);
		$this->db->query('insert into encuesta (nombre,descripcion,id_usuario,estatus) values ("'.$data['nombre'].'","'.$data['desc'].'",'.$id_usuario.',"DES")');
		$enc_id=mysql_insert_id();
		for($i=0 ; $i<$data['cantidad']; $i++)
		{
			$this->db->query('insert into encuesta_pregunta (id_encuesta,pregunta) values ('.$enc_id.',"'.$data[$keys[$i]]["pregunta"].'")');
			$preg_id = mysql_insert_id();
			//print_r($data[$keys[$i]]);
			//echo $data[$keys[$i]]["pregunta"];
			$resp_keys=array_keys($data[$keys[$i]]["respuestas"]);
			for($j=0;$j<sizeof($resp_keys);$j++)
			{
			//echo $data[$keys[$i]]["respuestas"][$resp_keys[$j]];
				//print_r($resp_keys);
				if($data[$keys[$i]]["respuestas"][$resp_keys[$j]]!="")
				{
					$this->db->query('insert into encuesta_respuesta (id_pregunta,respuesta) values ('.$preg_id.',"'.$data[$keys[$i]]["respuestas"][$resp_keys[$j]].'")');
				}
			}
		}
	}
	
	function estado_encuesta()
	{
		$data=$_GET["info"];
		$data=json_decode($data,true);
		$this->db->query('update encuesta set estatus="'.$data['tipo'].'" where id_encuesta='.$data['id']);
	}
	
	function borrar_encuesta()
	{
		$this->modelo_encuestas->BorarEncuesta($_GET['id']);
	}
	
	function editar_encuesta()
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
		
		$style = $this->modelo_dashboard->get_style(1);
		$encuesta = $this->modelo_encuestas->encuesta($_POST['id']);
		
		$preguntas = $this->modelo_encuestas->preguntas_encuesta($_POST['id']);
		
		$opciones = array();
		foreach ($preguntas as $pregunta){
			$respuestas = $this->modelo_encuestas->opciones_pregunta($pregunta->id_pregunta);
			foreach ($respuestas as $respuesta)
				array_push($opciones, $respuesta);
		}
		
		$this->template->set("usuario",$id);
		$this->template->set("encuesta",$encuesta);
		$this->template->set("preguntas",$preguntas);
		$this->template->set("opciones",$opciones);
		$this->template->set("style",$style);
		$this->template->build('website/bo/oficinaVirtual/encuestas/editar_encuesta');
	}
	function actualizar_encuesta(){
	if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}
		if(isset($_POST)){
			$id_encuesta = $_POST['id'];
			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];
			$cantidad = $_POST['cantidad'];
			
			$this->modelo_encuestas->ActualizarEncuesta($id_encuesta,$nombre,$descripcion,$id);
			
			//$this->modelo_encuestas->BorrarPreguntas($id_encuesta);
			for ($i = 1; $i <= $cantidad ; $i++){
				$this->modelo_encuestas->ActualizarPregunta($_POST['id_pregunta-'.$i], $_POST['pregunta-'.$i]);
				
				for ($j = 1; $j <= 5 ; $j++){
					$this->modelo_encuestas->ActualizarRepuesta($_POST['id_respuesta-'.$i.'-'.$j], $_POST['respuesta-'.$i.'-'.$j]);
				}	
			}
		}
	}
}
