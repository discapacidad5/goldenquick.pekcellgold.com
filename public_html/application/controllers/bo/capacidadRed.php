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

		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);

		$capacidadRed = $this->model_tipo_red->traerCapacidadRed();
		
		$this->template->set("capacidadRed", $capacidadRed);
		
		$this->template->set("style",$style);
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/bo/TipoRed/actualizarCapacidadRed');	
	}

	public function actualizar_capacidad_de_la_red(){
			$this->model_tipo_red->actualizarCapacidadRed($_POST['frontal'],$_POST['profundidad']);
			redirect("/bo/capacidadRed/capacidad_de_la_red");
	}

}