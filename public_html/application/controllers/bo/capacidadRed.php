<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class capacidadRed extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('ov/general');
		$this->load->model('model_tipo_red');
	}

	public function index(){
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
		
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
		
		$redes= $this->model_tipo_red->listarTodos();
		
		$this->template->set("redes", $redes);
		
		$this->template->set("style",$style);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/TipoRed/index');
	}
	public function capacidad_de_la_red()
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
		$red = 0;
		if(isset($_GET['id'])){
			$red = $_GET['id'];
		}
		
		$id = $this->tank_auth->get_user_id();
		$style = $this->general->get_style($id);

		$capacidadRed = $this->model_tipo_red->getCapacidadRed($red);
		if(!isset($capacidadRed[0]->frontal)){
			redirect("/bo/capacidadRed/index");
		}
		$this->template->set("capacidadRed", $capacidadRed);
		
		$this->template->set("style",$style);
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/TipoRed/actualizarCapacidadRed');	
	}

	public function actualizar_capacidad_de_la_red(){
		if($_POST['red'] == ''){
			$error = "No se pudo actualizar la configuracion de la red.";
			$this->session->set_flashdata('error', $error);
		}else if(!is_numeric($_POST['frontal'])){
			$error = "La configuracion de la red en frontal debe ser un numero.";
			$this->session->set_flashdata('error', $error);
		}else if(!is_numeric($_POST['profundidad'])){
			$error = "La configuracion de la red en profundidad debe ser un numero.";
			$this->session->set_flashdata('error', $error);
		}else{
			$this->model_tipo_red->actualizarCapacidadRed($_POST['red'],$_POST['frontal'],$_POST['profundidad']);
			$correcto = "La configuracion de la red ha sido actualizada.";
			$this->session->set_flashdata('exito', $correcto);
		}
		redirect("/bo/capacidadRed/index");
	}

}