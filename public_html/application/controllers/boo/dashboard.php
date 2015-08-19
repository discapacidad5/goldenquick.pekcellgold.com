<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller
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
		$this->load->model('ov/modelo_billetera');
		
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$nombre=$usuario[0]->nombre;
		$sesion=$usuario[0]->ultima_sesion;

	
		if(!$this->general->isAValidUser($id,"oficina"))
		{
			redirect('/auth/logout');
		}

		$usuario=$this->general->get_username($id);

		$style=$this->modelo_dashboard->get_style(1);

		$this->template->set("id",1);
		$this->template->set("nombre",$nombre);
		$this->template->set("sesion",$sesion);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/boo/view_dashboard');
	}
	
}