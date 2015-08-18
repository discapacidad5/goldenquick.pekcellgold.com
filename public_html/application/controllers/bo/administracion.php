<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class administracion extends CI_Controller
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
		$this->load->model('model_emails_departamentos');
		$this->load->model('model_invitado');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"administracion"))
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
		$this->template->build('website/bo/administracion/index');
	}
	
	function emails_departamentos()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		if(!$this->general->isAValidUser($id,"administracion"))
		{
			redirect('/auth/logout');
		}
	
		$style=$this->modelo_dashboard->get_style(1);
		
		$datos_departamentos = $this->model_emails_departamentos->buscar();
		
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("datos_departamentos",$datos_departamentos);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/administracion/emails_departamentos');
	}
	
	function actualizar_emails_departamentos()
	{
		$nombre = array($_POST['departamento1'],$_POST['departamento2'],$_POST['departamento3'],$_POST['departamento4']
					   ,$_POST['departamento5'],$_POST['departamento6'],$_POST['departamento7'],$_POST['departamento8']
					   ,$_POST['departamento9'],$_POST['departamento10']);
		
		$email = array($_POST['email1'],$_POST['email2'],$_POST['email3'],$_POST['email4'],$_POST['email5'],
					   $_POST['email6'],$_POST['email7'],$_POST['email8'],$_POST['email9'],$_POST['email10']);
		
		$datos_departamentos = $this->model_emails_departamentos->eliminar();
		$hay_error=false;
		
		for ($i=0; $i<10;$i++){
			if ($nombre[$i]=='' && $email[$i]!=''){
				$error = "Debe escribir un nombre para el departamento de e-mail ".$email[$i].".";
				$this->session->set_flashdata('error', $error);
				$hay_error=true;
				//redirect("/bo/administracion/emails_departamentos");
			}	
			else if ($nombre[$i]!='' && $email[$i]==''){
				$error = "Debe escribir un e-mail para el departamento de nombre ".$nombre[$i].".";
				$this->session->set_flashdata('error', $error);
				$hay_error=true;
				//redirect("/bo/administracion/emails_departamentos");
			}
			else	$datos_departamentos = $this->model_emails_departamentos->insertar($nombre[$i],$email[$i]);
		}
		
		if ($hay_error){
		}
		else{
			$success = "El cambio se ha efectuado satisfactoriamente.";
			$this->session->set_flashdata('success', $success);
		}
			redirect("/bo/administracion/emails_departamentos");
	}

	
	function  login_web_personal(){
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$style=$this->modelo_dashboard->get_style(1);
		
		$this->template->set("style",$style);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		
		$this->template->build('website/bo/administracion/login_invitado');
		
	}
	
	function ingreso_invitado(){
		
		$consultar_id_usuario=null;
       
     
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$style=$this->modelo_dashboard->get_style(1);
		
        $username = $_POST['username'];
        $password = $_POST['password_invitado'];
      	$consultar_id_usuario = $this->model_invitado->consultar_username_afiliado($username,$password);
     
		$this->template->set("style",$style);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		
		if ($consultar_id_usuario != null){
			redirect("/ov/compras/carrito_publico?usernameAfiliado=".$username);
		}else{
			$this->template->build('website/bo/administracion/login_invitado');
		}
		
	}
	
	function invitar_gente(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$style=$this->modelo_dashboard->get_style(1);
		

		$this->template->set("style",$style);	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		
		$this->template->build('website/bo/administracion/email_invitado');
	}
	
	function enviar_invitacion(){
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$style=$this->modelo_dashboard->get_style(1);	
		$this->template->set("style",$style);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		
		
		$email=$_POST['email_invitado'];
		echo $email;
	}
}