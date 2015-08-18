<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class logistico2 extends CI_Controller
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
		$this->load->model('bo/modelo_logistico');
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
		$this->template->build('website/bo/logistico2/index');
	}
	
	function pedidos(){
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
		$this->template->build('website/bo/logistico2/embarque/index');
	}

	function pedidos_pendientes(){
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
		
		$surtido_movimiento =$this->modelo_logistico->get_surtidos();
		$surtidos = array();
		foreach ($surtido_movimiento as $movimiento){
			$mercancia = $this->modelo_logistico->ObtenerMercancia($movimiento->id_mercancia);
			$surtidos[] = array(
					'id_surtido' => $movimiento->id_surtido,
					'id_venta' => $movimiento->id_venta,
					'keyword' => $movimiento->keyword,
					'mercancia' => $mercancia[0]->nombre,
					'cantidad'  => $movimiento->cantidad,
					'origen' => $movimiento->origen,
					'usuario' => $movimiento->destino,
					'email'	=> $movimiento->correo,
					'fecha' => $movimiento->fecha,
					'estatus' => $movimiento->estatus_e
			);
		}
		
		
		
		$this->template->set("style",$style);
		$this->template->set("surtidos",$surtidos);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/embarque/pedidos_pendientes');
	}
	function surtir()
	{
		$this->modelo_logistico->surtir();
	
	
	}
	function pedidos_transito(){
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
		$this->template->set("usuario",$usuario);
		
	
		$this->template->set("usuario",$usuario);
	
		$por_embarcar = $this->modelo_logistico->get_embarque();
		
		$surtidos = array();
		
		foreach ($por_embarcar as $movimiento){
			$mercancia = $this->modelo_logistico->ObtenerMercancia($movimiento->id_mercancia);
			$surtidos[] = array(
					'id_embarque' => $movimiento->id_embarque,
					'keyword' => $movimiento->keyword,
					'mercancia' => $mercancia[0]->nombre,
					'cantidad'  => $movimiento->cantidad,
					'origen' => $movimiento->origen,
					'usuario' => $movimiento->destino,
					'email'	=> $movimiento->correo,
					'fecha' => $movimiento->fecha_entrega,
					'estatus' => $movimiento->estado_e
			);
		}
	
	
	
		$this->template->set("style",$style);
		$this->template->set("surtidos",$surtidos);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/embarque/pedidos_transito');
	}
	
	function embarcar()
	{
		$this->modelo_logistico->embarcar();
	}
	
	function pedidos_embarcados(){
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
		
		$this->template->set("usuario",$usuario);
		
		
		$embarcados=$this->modelo_logistico->get_embarcados();
		
		$surtidos = array();
	
		foreach ($embarcados as $movimiento){
			
			$mercancia = $this->modelo_logistico->ObtenerMercancia($movimiento->id_mercancia);
			$surtidos[] = array(
					'id_embarque' => $movimiento->id_embarque,
					'keyword' => $movimiento->keyword,
					'mercancia' => $mercancia[0]->nombre,
					'cantidad'  => $movimiento->cantidad,
					'origen' => $movimiento->origen,
					'usuario' => $movimiento->destino,
					'email'	=> $movimiento->correo,
					'fecha' => $movimiento->fecha_entrega,
					'estatus' => $movimiento->estado_e
			);
		}
		
		$this->template->set("style",$style);
		$this->template->set("surtidos",$surtidos);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/embarque/pedidos_embarcados');
	}
}