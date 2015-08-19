<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class bandera extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
 
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('general');
	}



	function mapa()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);

		$this->template->set("usuario",$usuario);
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/header');
		$this->template->build('website/pais');
	}
}