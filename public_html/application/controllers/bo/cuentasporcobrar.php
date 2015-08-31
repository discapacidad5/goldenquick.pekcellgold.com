<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
require_once APPPATH.'controllers/ov/compras.php';

class cuentasporcobrar extends compras{
	function __construct() {
		parent::__construct ();
		
		$this->load->model ( 'bo/modelo_dashboard' );
	}
	
	function index() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		
		$id = $this->tank_auth->get_user_id ();
		
		if(!$this->general->isAValidUser($id,"administracion"))
		{
			redirect('/auth/logout');
		}
		
		$usuario=$this->general->get_username($id);
		
		$style = $this->modelo_dashboard->get_style(1);
		
		
		$cobros = $this->modelo_historial_consignacion->ListarHistorialPendiente ();
		
		$this->template->set ( "style", $style );
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "cobros", $cobros );
		
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		$this->template->set_partial ( 'header', 'website/ov/header' );
		$this->template->set_partial ( 'footer', 'website/ov/footer' );
		$this->template->build ( 'website/bo/administracion/CuentasCobrar/listar' );
	}
	
	function cambiar_estado(){
		
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		
		$id = $this->tank_auth->get_user_id ();
		
		if(!$this->general->isAValidUser($id,"administracion"))
		{
			redirect('/auth/logout');
		}
		
		$usuario = $this->general->get_username($id);
		
		$style = $this->modelo_dashboard->get_style(1);
		
		if(isset($_POST['id_venta']) && isset($_POST['id_historial'])){
			$id_venta = $_POST['id_venta'];
			$id_historial = $_POST['id_historial'];
			
			$this->modelo_historial_consignacion->CambiarEstadoPago($id_venta, $id_historial);
			
			$historico = $this->modelo_historial_consignacion->PagoBanco($id_historial);
			
			$this->ComisionBanco($historico);
			
			$this->EnvarMail($id_historial);
			echo  "La peticion se ha cambiado de estado a pago";
			//$this->session->set_flashdata('correcto', $correcto);
		}else{
			echo  "No se ha podido realizar el cambio de estado de la peticion.";
			//$this->session->set_flashdata('error', $error);
		}
	}
	
	private function ComisionBanco($historico){
		$venta_mercancia = $this->modelo_historial_consignacion->MercanciaPago($historico[0]->id_venta);
		
		$id_mercancia = $venta_mercancia[0]->id_mercancia;
		
		$costo = $venta_mercancia[0]->cantidad * $this->modelo_compras->CostoMercancia($id_mercancia);
		
		$id_categoria_mercancia = $this->modelo_compras->ObtenerCategoriaMercancia($id_mercancia);
		$costo_comision = $this->modelo_compras->ValorComision($id_categoria_mercancia);
		
		$id_red = $this->modelo_compras->ConsultarIdRedMercancia($id_categoria_mercancia);
		$capacidad_red = $this->model_tipo_red->CapacidadRed($id_red);
		$id_afiliado = $this->model_perfil_red->ConsultarIdPadre( $historico[0]->id_usuario, $id_red);
		
		$this->CalcularComision2($id_afiliado, $historico[0]->id_venta, $id_categoria_mercancia,$costo_comision, $capacidad_red ,1, $costo);
		
	}
	
	private function EnvarMail($id_historial){
		$datos = $this->modelo_historial_consignacion->Datos_Email($id_historial);
		
		$cobro['username'] = $datos[0]->username;
		$cobro['nombre'] = $datos[0]->nombre;
		$cobro['apellido'] = $datos[0]->apellido;
		$cobro['id_venta'] = $datos[0]->id_venta;
		$cobro['banco'] = $datos[0]->banco;
		$cobro['cuenta'] = $datos[0]->cuenta;
		$cobro['valor'] = $datos[0]->valor;
		$cobro['email'] = $datos[0]->email;
		$cobro['fecha'] = $datos[0]->fecha;
		
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($datos[0]->email);
		$this->email->subject('Confirmacion de pago por Banco');
		$this->email->message($this->load->view('email/CuentasCobrar-html', $cobro, TRUE));
		//$this->email->set_alt_message($this->load->view('email/activate-txt', $data, TRUE));
		$this->email->send();
	}
}