<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class changelog extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('ov/modelo_dashboard');
	}



	function index()
	{
		$style=$this->modelo_dashboard->get_style(1);
		$this->template->set("style",$style);
		$this->template->build('website/changelog');
	}

}