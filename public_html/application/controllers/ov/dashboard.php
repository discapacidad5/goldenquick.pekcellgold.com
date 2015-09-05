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
		$this->load->model('ov/modelo_compras');
		$this->load->model('modelo_premios');
		$this->load->model('model_tipo_red');
	}
	
	private function VerificarCompras($id_afiliado,$id_red,$nivel){
	
		$afiliados = $this->modelo_compras->traer_afiliados_red($id_afiliado, $id_red);
	
		$id_categoria = $this->modelo_compras->ConsultarIdCategoriaMercancia($id_red);
		$contador = 0;
	
		foreach ($afiliados as $afiliado2){
				
			if($this->modelo_compras->ComprovarCompraProducto($afiliado2->id_afiliado, $id_categoria)){
				$contador = 1;
			}
			if(isset($this->afiliados[$nivel])){
				$this->afiliados[$nivel] =  $contador + $this->afiliados[$nivel];
			}else{
				$this->afiliados[$nivel] = $contador;
			}
			$this->VerificarCompras($afiliado2->id_afiliado, $id_red,$nivel+1);
		}
		//var_dump($afiliados);
		//exit();
	}
	
	private function DeterminarPremio($id_afiliado,$id_red){
	
		$this->VerificarCompras($id_afiliado, $id_red, 0);
		//var_dump($this->afiliados); exit;
		$premio = 0;
		$premios = $this->modelo_premios->getPremiosCondicion($id_red);
		$i=1;
		foreach ($this->afiliados as $nivel){
			foreach ($premios as $premio_cond){
				if($premio_cond->nivel == $i && $nivel == $premio_cond->num_afiliados){
					$premio = $premio_cond->id;
				}
			}
			$i++;
		}
		if($premio != 0){
			$enviar = $this->RegistrarPremioAfiliado($id_afiliado,$premio);
			if($enviar){
				$this->EnviarMail($id_afiliado, $premio);
			}
		}
		return $premio;
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
		
		$estadoPremio = array();
		
		$redes = $this->model_tipo_red->RedesUsuario($id);
		$i = 0;
		foreach ($redes as $red){
			$premio[$i] = $this->DeterminarPremio($id, $red->id);
			$i++;
		}
		
		$infoPremios = $this->modelo_premios->verEstadoPremio($id);

		/*
		$i = 0;
		foreach ($infoPremios as $infoPremio){
			$estadoPremio[$i] = $infoPremio->estado;
			$premioPendiente[$i] = $infoPremio->nombre;
			$i++;
		}*/
		
		$this->template->set("infoPremios",$infoPremios);
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
	
	function ConsultarPremio(){
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$nombre_red = $_POST['nombre_red'];
		$imagen = $_POST['imagen'];
		
		var_dump($nombre);exit();
		
		$this->template->set("nombre",$nombre);
		$this->template->set("descripcion",$descripcion);
		$this->template->set("nombre_red",$nombre_red);
		$this->template->set("imagen",$imagen);
		$this->template->build('website/ov/perfil_red/premio');
	}
}
