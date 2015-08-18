<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class bancos extends CI_Controller
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
		$this->load->model('modelo_bancos');
	}
	
	function index()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario = $this->general->get_username($id);
	
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/configuracion/Bancos/index');
	}
	
	function alta()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario = $this->general->get_username($id);
	
		$style=$this->modelo_dashboard->get_style(1);
		$paises            = $this->model_admin->get_pais_activo();
		
		$this->template->set("style",$style);
		$this->template->set("paices",$paises);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/configuracion/Bancos/alta');
	}
	
	function nuevo_banco(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id = $this->tank_auth->get_user_id();
		
		if(isset($_POST)){
			$banco = $_POST['banco'];
			$pais = $_POST['pais'];
			$cuenta = $_POST['cuenta'];
			$clabe = $_POST['clabe'];
			if($this->ValidarDatos($banco,$pais,$cuenta, $clabe)){
				
				$this->modelo_bancos->crear_banco($banco, $cuenta, $pais, $clabe);
				echo "El Banco a sido añadido";
			}
			
			
		}
	}
	
	function ValidarDatos($banco,$pais,$cuenta, $clabe){
		if (!isset($banco) && !isset($pais) && !isset($cuenta)){
			echo "Por favor llena el formulario";
			return false;
		}else{
			return true;
		}
	}
	
	function listar()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario = $this->general->get_username($id);
	
		$style=$this->modelo_dashboard->get_style(1);
		$bancos = $this->modelo_bancos->Bancos();
		
		$this->template->set("style",$style);
		$this->template->set("bancos",$bancos);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/configuracion/Bancos/listar');
	}
	
	function eliminar_banco(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario = $this->general->get_username($id);
		
		if(isset($_POST['id'])){
			$ventas = $this->modelo_bancos->ConsultarTransacionBanco($_POST['id']);
			
			if(isset($ventas[0]->id_banco)){
				echo "El Banco no se puede eliminar debido a que ya se han realizado pagos por medio del banco";
			}else{
				$this->modelo_bancos->EliminarBanco($_POST['id']);
				echo "El banco con id ".$_POST['id']." ha sido eliminado";
			}
		}
	}
	
	function cambiar_estado_banco(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario = $this->general->get_username($id);
		
		
		if(isset($_POST['id'])){
			$this->modelo_bancos->CambiarEstadoBanco($_POST['id'], $_POST['estado']);
		}
	}
	
	function editar_banco(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario = $this->general->get_username($id);
		$paises            = $this->model_admin->get_pais_activo();
		
		$style=$this->modelo_dashboard->get_style(1);
		$banco = $this->modelo_bancos->Banco($_POST['id']);
		
		$this->template->set("style",$style);
		$this->template->set("banco",$banco);
		$this->template->set("paices",$paises);
		
		$this->template->build('website/bo/configuracion/Bancos/editar');
	}
	
	function actualizar_banco(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id = $this->tank_auth->get_user_id();
	
		if(isset($_POST)){
			$id_banco = $_POST['id'];
			$banco = $_POST['banco'];
			$pais = $_POST['pais'];
			$cuenta = $_POST['cuenta'];
			$clabe = $_POST['clabe'];
				
			if($this->ValidarDatos2($banco, $pais, $cuenta, $clabe)){
					
				$this->ValidarDatos2($banco,$pais,$cuenta, $clabe);
			
				$this->modelo_bancos->actualizar_banco($id_banco, $banco, $cuenta, $pais, $clabe);
				echo "El Banco a sido actualizado.";
					
					
			}
		}
	}
	
	function ValidarDatos2($banco,$pais,$cuenta, $clabe){
		if (!isset($banco) && !isset($pais) && !isset($cuenta)){
			
			echo "Por favor llena el formulario.";
			return false;
		}else{
			return true;
		}
	}
	
}