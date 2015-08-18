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
		$this->load->model('ov/modelo_dashboard');
		$this->load->model('ov/general');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);

		$style=$this->modelo_dashboard->get_style($id);

		$id_sponsor=$this->modelo_dashboard->get_red($id);
		$ultima=$this->modelo_dashboard->get_ultima($id);
	    $telefono=$this->modelo_dashboard->get_user_phone($id);
	    $email=$this->modelo_dashboard->get_user_email($id);
	    $username=$this->modelo_dashboard->get_user_name($id);
	    $pais=$this->modelo_dashboard->get_user_country_code($id);

		$name_sponsor=$this->general->get_username($id_sponsor[0]->id_usuario);

		$image=$this->modelo_dashboard->get_images($id);
		$fondo="/template/img/portada.jpg";
		$user="/template/img/empresario.jpg";
		foreach ($image as $img) {
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$user=$img->url;
			}
			if($cadena[0]=="fondo")
			{
				$fondo=$img->url;
			}
		}
		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("id",$id);
		$this->template->set("usuario",$usuario);
	    $this->template->set("telefono",$telefono);
	    $this->template->set("email",$email);
	    $this->template->set("username",$username);
	    $this->template->set("pais",$pais);
		$this->template->set("style",$style);
		$this->template->set("user",$user);
		$this->template->set("fondo",$fondo);
		$this->template->set("id_sponsor",$id_sponsor);
		$this->template->set("name_sponsor",$name_sponsor);
		$this->template->set("ultima",$ultima);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/view_dashboard');
	}
}
