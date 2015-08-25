<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class premios extends CI_Controller
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
		$this->load->model('general');
		$this->load->model('modelo_premios');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style(1);

		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/premios/index');
	}
	
	function premios_pendientes(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$premios = $this->modelo_premios->PremiosPendientes();
		
		$this->template->set("style",$style);
		$this->template->set("premios",$premios);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/premios/premios_pendientes');
	}
	
	function surtir()
	{
		$this->modelo_premios->cambiarEstadoPremio($_POST['id_premio'], $_POST['fecha'],'EnTransito');
	}
	
	function premios_transito(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$premios = $this->modelo_premios->PremiosTransito();
	
		$this->template->set("style",$style);
		$this->template->set("premios",$premios);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/premios/premios_transito');
	}
	
	function embarcar()
	{
		if(isset($_POST['id']))
			$this->modelo_premios->cambiarEstadoPremioEmbarcar($_POST['id'],'Embarcado');
	}
	
	function premios_embarcados(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		//$premios = $this->modelo_premios->PremiosEmbarcados();
	
		$this->template->set("style",$style);
		//$this->template->set("premios",$premios);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/premios/premios_embarcados');
	}
	
	function embarcados(){
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}
		echo "<h1 class='text-success'>Premios Entregados</h1>";
		if(isset($_POST)){
			if($_POST['inicio'] == ''){
				echo "<h1 class='alert alert-danger'>Seleciona un rango de fecha para consultar</h1>";
			}elseif ($_POST['fin'] == ''){
				echo "<h1 class='alert alert-danger'>Seleciona un rango de fecha para consultar</h1>";
			}else{
				
				//var_dump($_POST);
				$premios = $this->modelo_premios->PremiosEmbarcadosFecha($_POST['inicio'],$_POST['fin']);
				
				$this->template->set("premios",$premios);
				$this->template->build('website/bo/logistico2/premios/embarcados');
			}
		}
	}
}