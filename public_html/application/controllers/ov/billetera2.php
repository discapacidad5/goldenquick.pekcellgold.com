
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class billetera2 extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->load->library('cart');
		$this->lang->load('tank_auth');
		$this->load->model('ov/general');
		$this->load->model('ov/modelo_billetera');
		$this->load->model('ov/modelo_dashboard');
		$this->load->model('model_tipo_red');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();


		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);

		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);

		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/billetera/dashboard');
		$this->template->build('website/ov/billetera/index');
	}
	
	function historial_cuenta()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
	
	
		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);
	
		$historial=$this->modelo_billetera->get_historial_cuenta($id);
		$ganancias=$this->modelo_billetera->get_monto($id);
		$ganancias=$ganancias[0]->monto;
		$comision_web_personal_mes = $this->modelo_billetera->get_historial_cuenta_web_personal($id);		
		$años = $this->modelo_billetera->añosCobro($id);

		if(count($comision_web_personal_mes) < count($historial)){
			foreach ($historial as $mes){
				foreach ($comision_web_personal_mes as $comision){
					if($comision->fecha == $mes->fecha){
						$mes->valor+=$comision->valor;
					}
				}
			}
			$this->template->set("historial",$historial);
		}else{
			foreach ($comision_web_personal_mes as $mes){
				foreach ($historial as $comision){
					if($comision->fecha == $mes->fecha){
						$mes->valor+=$comision->valor;
					}
				}
			}
			$this->template->set("historial",$comision_web_personal_mes);
		}
		
		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);
		//$this->template->set("historial",$historial);
		$this->template->set("ganancias",$ganancias);
		$this->template->set("años",$años);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/billetera/dashboard');
		$this->template->build('website/ov/billetera/historial_cuenta');
	}
	
	function historial()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
	
	
		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);
	
		$historial=$this->modelo_billetera->get_historial($id);
		$ganancias=$this->modelo_billetera->get_monto($id);
		$ganancias=$ganancias[0]->monto;
		$cobro=$this->modelo_billetera->get_cobro($id);
		$metodo_cobro=$this->modelo_billetera->get_metodo();
		$datatable=$this->modelo_billetera->datable($id);
		$años = $this->modelo_billetera->añosCobro($id);
		
		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);
		$this->template->set("historial",$historial);
		$this->template->set("ganancias",$ganancias);
		$this->template->set("datatable",$datatable);
		$this->template->set("metodo_cobro",$metodo_cobro);
		$this->template->set("años",$años);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/billetera/dashboard');
		$this->template->build('website/ov/billetera/historial');
	}

	function pedir_pago()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
	
	
		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);
	
		$redes = $this->model_tipo_red->listarTodos();
		$ganancias=array();
		foreach ($redes as $red){
			array_push($ganancias,$this->modelo_billetera->get_comisiones($id,$red->id));
		}
		
		$cobro=$this->modelo_billetera->get_cobros_total($id);
		$cobroPendientes=$this->modelo_billetera->get_cobros_pendientes_total_afiliado($id);
		$retenciones = $this->modelo_billetera->ValorRetencionesTotales($id);
		$comision_web_personal = $this->modelo_billetera->get_comisiones_web_personal($id);
		
		$this->template->set("style",$style);
		$this->template->set("comision_web_personal",$comision_web_personal[0]->valor);
		$this->template->set("usuario",$usuario);
		$this->template->set("ganancias",$ganancias);
		$this->template->set("cobro",$cobro);
		$this->template->set("cobroPendientes",$cobroPendientes);
		$this->template->set("retenciones",$retenciones);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/billetera/pago');
	}
	
	function cobrar()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		if(intval($_POST['cobro'])<=0){
			echo "ERROR <br>Valor del cobro invalido";
			exit();
		}
	
		if($_POST['ctitular']==""){
			echo "ERROR <br>Falta ingresar el nombre del titular de la cuenta";
			exit();
		}
		
		if(is_numeric($_POST['ctitular'])){
			echo "ERROR <br>El titular de la cuenta no debe contener valores numericos";
			exit();
		}
		
		if($_POST['cbanco']==""){
			echo "ERROR <br>Falta ingresar el banco de la cuenta";
			exit();
		}
		
		if(intval($_POST['ncuenta'])==0){
			echo "ERROR <br>El numero de la cuenta debe ser un numero valido";
			exit();
		}
	
		
		$id=$this->tank_auth->get_user_id();
		
		$comision_web_personal = $this->modelo_billetera->get_comisiones_web_personal($id);
		$comisiones = $this->modelo_billetera->get_total_comisiones_afiliado($id);
		$comisiones +=$comision_web_personal[0]->valor;
		$retenciones = $this->modelo_billetera->ValorRetencionesTotalesAfiliado();
		$cobrosPagos=$this->modelo_billetera->get_cobros_total_afiliado($id);
		$cobroPendientes=$this->modelo_billetera->get_cobros_pendientes_total_afiliado($id);

		if(($comisiones-($retenciones+$cobrosPagos+$_POST['cobro']+$cobroPendientes))>0){
			$estado = $this->modelo_billetera->cobrar($id,$_POST['ncuenta'],$_POST['ctitular'],$_POST['cbanco'],$_POST['cclabe']);
			echo "Felicitaciones<br> Tu cobro se esta procesando";
		}else {
			echo "ERROR <br>No cuentas con suficientes recursos para realizar el cobro";
		}

	}
	
	function estado()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
	
	
		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);
	
		$redes = $this->model_tipo_red->listarTodos();
		$ganancias=array();
		foreach ($redes as $red){
			array_push($ganancias,$this->modelo_billetera->get_comisiones($id,$red->id));
		}
		
		$comisiones = $this->modelo_billetera->get_total_comisiones_afiliado($id);
		$cobro=$this->modelo_billetera->get_cobros_total($id);
		$cobroPendientes=$this->modelo_billetera->get_cobros_pendientes_total_afiliado($id);
		$retenciones = $this->modelo_billetera->ValorRetencionesTotales($id);
		$comision_web_personal = $this->modelo_billetera->get_comisiones_web_personal($id);
		
		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);
		$this->template->set("comision_web_personal",$comision_web_personal[0]->valor);
		$this->template->set("comisiones",$comisiones);
		$this->template->set("ganancias",$ganancias);
		$this->template->set("cobro",$cobro);
		$this->template->set("cobroPendientes",$cobroPendientes);
		$this->template->set("retenciones",$retenciones);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/billetera/estadoCuenta');
	}
	
	function estado_historial()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
	
	
		$usuario= $this->general->get_username($id);
		$style=$this->general->get_style($id);
	
		$redes = $this->model_tipo_red->listarTodos();
		$ganancias=array();
		foreach ($redes as $red){
			array_push($ganancias,$this->modelo_billetera->get_comisiones_mes($id,$red->id,$_GET['fecha']));
		}
	
		$comision_web_personal = $this->modelo_billetera->comisionWebPersonal($id, $_GET['fecha']);
		$retenciones = $this->modelo_billetera->ValorRetenciones_historial($_GET['fecha'],$id);
		$cobro=$this->modelo_billetera->get_cobros_afiliado_mes($id,$_GET['fecha']);
		$cobroPendiente=$this->modelo_billetera->get_cobros_afiliado_mes_pendientes($id,$_GET['fecha']);

		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);
		$this->template->set("ganancias",$ganancias);
		$this->template->set("comision_web_personal",$comision_web_personal[0]->valor);
		$this->template->set("retenciones",$retenciones);
		$this->template->set("cobro",$cobro);
		$this->template->set("cobroPendiente",$cobroPendiente);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/billetera/dashboard');
		$this->template->build('website/ov/billetera/estado');
	}
}