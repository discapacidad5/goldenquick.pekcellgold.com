<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class grupos extends CI_Controller
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
		$this->load->model('bo/modelo_comercial');
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
		$this->template->build('website/bo/oficinaVirtual/grupos/index');
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
		$this->template->build('website/bo/oficinaVirtual/grupos/alta');
	}
	
	function add_grupo()
	{
		$this->db->query("insert into cat_grupo (descripcion,tipo) values ('".$_POST['grupo']."','".$_POST['tipo']."')");
	}
	
	function editar_grupo(){
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
		$grupo	 	 = $this->modelo_comercial->get_groups_id($_POST['id']);
	
		$this->template->set("grupo",$grupo);
		$this->template->build('website/bo/oficinaVirtual/grupos/editar');
	}
	
	function actualizar_grupo(){
		$correcto = $this->modelo_comercial->actualizar_grupo();
		if($correcto){
			echo "Grupo Actualizado";
		}
		else{
			echo "No se logro actualizar el grupo";
		}
	
	}
	
	function cambiar_estado_grupo(){
		$this->db->query("update cat_grupo set estatus = '".$_POST['estado']."' where id=".$_POST["id"]);

	}
	
	function kill_grupo()
	{
		$this->db->query("delete from cat_grupo where id=".$_POST["id"]);
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
	
		
		$grupos  = $this->modelo_comercial->get_groups_all();
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("style",$style);
		$this->template->set("grupos",$grupos);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/grupos/listar');
	}
}
