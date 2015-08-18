<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class upload extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

	}
	function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}	
		$this->load->view('website/escuela_negocios/form_carga', array('error' => ' ' ));
	}
	function do_upload_presentaciones()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$config['upload_path'] = 'presentaciones';
		$config['allowed_types'] = 'ppt|pptx|pdf';
		$config['max_size']	= '10000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$data['usuario']=$this->tank_auth->get_username();
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
			$this->load->view('website/escuela_negocios/form_carga', $error);
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$this->load->view('website/escuela_negocios/exito_carga', $data);
		}
	}	
}
?>