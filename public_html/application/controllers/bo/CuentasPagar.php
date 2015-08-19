<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CuentasPagar extends CI_Controller
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
		$this->load->model('bo/modelo_comercial');
		$this->load->model('ov/model_perfil_red');
		$this->load->model('model_cat_tipo_usuario');
		$this->load->model('model_cat_sexo');
		$this->load->model('model_cat_edo_civil');
		$this->load->model('model_cat_estudios');
		$this->load->model('model_cat_ocupacion');
		$this->load->model('model_cat_estatus_afiliado');
		$this->load->model('model_cat_tiempo_dedicado');
		$this->load->model('model_cat_usuario_fiscal');
		$this->load->model('model_users');
		$this->load->model('model_user_profiles');
		$this->load->model('model_coaplicante');
		$this->load->model('bo/model_admin');
		$this->load->model('bo/model_mercancia');
		$this->load->model('ov/modelo_compras');
		$this->load->model('modelo_cobros');
	}

	function index(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}

		$usuario=$this->general->get_username($id);
		
		$style=$this->modelo_dashboard->get_style(1);
		
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comercial/Cuentas/index');
	}
	
	function historial(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}

		$usuario=$this->general->get_username($id);
		
		$cobros = $this->modelo_cobros->listarTodos($_GET['inicio'],$_GET['final']);
		$style=$this->modelo_dashboard->get_style(1);
		$años = $this->modelo_cobros->añosCobros();
	
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("cobros",$cobros);
		$this->template->set("años",$años);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comercial/Cuentas/historial');
	}
	
	function PorPagar(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"administracion"))
		{
			redirect('/auth/logout');
		}

		$usuario=$this->general->get_username($id);
		
		$style=$this->modelo_dashboard->get_style(1);
		$años = $this->modelo_cobros->añosCobros();
	
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/administracion/Cuentas/PorPagar');
	}
	
	function reporte_cobros(){
		$fecha_inicio = $_POST['fecha_inicio'];
		$fecha_fin = $_POST['fecha_fin'];
		
		$cobros = $this->modelo_cobros->ConsultarCobrosFecha($fecha_inicio, $fecha_fin);
		
		$this->template->set("cobros",$cobros);
		$this->template->set_theme('desktop');
		$this->template->build('website/bo/comercial/Cuentas/CobrosSinPagar');
	}
	
	function reporte_cobros_excel()
	{
		//load our new PHPExcel library
		
		$fecha_inicio = $_GET['inicio'];
		$fecha_fin = $_GET['fin'];
		
		$cobros = $this->modelo_cobros->ConsultarCobrosFecha($fecha_inicio, $fecha_fin);
		
		$this->load->library('excel');
		$this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte-cobros.xls");
		
		$total = 0;
		$ultima_fila = 0;
		for($i = 0;$i < sizeof($cobros);$i++)
		{
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($i+8), $cobros[$i]->id_cobro);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($i+8), $cobros[$i]->fecha);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $cobros[$i]->usuario);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $cobros[$i]->banco);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($i+8), $cobros[$i]->cuenta);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($i+8), $cobros[$i]->titular);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($i+8), $cobros[$i]->clabe);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, ($i+8), $cobros[$i]->metodo_pago);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(8, ($i+8), $cobros[$i]->monto);
			$total = $total + $cobros[$i]->monto;
			$ultima_fila = $i+8;
			$usuario = $this->modelo_cobros->CambiarEstadoCobro($cobros[$i]->id_cobro);
			$this->enviar_email($usuario[0]->email, $usuario);
		}
		
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, ($ultima_fila+1), "Total");
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(8, ($ultima_fila+1), $total);
		
		$filename='CuentasPorPagar de '.$fecha_inicio.' al '.$fecha_fin.'.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		 
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save('php://output');
	}
	
	function Email(){
		
		$usuario = $this->modelo_cobros->CambiarEstadoCobro(15);
		
		$cobro['username'] = $usuario[0]->username;
		$cobro['nombre'] = $usuario[0]->nombre;
		$cobro['apellido'] = $usuario[0]->apellido;
		$cobro['id_cobro'] = $usuario[0]->id_cobro;
		$cobro['banco'] = $usuario[0]->banco;
		$cobro['cuenta'] = $usuario[0]->cuenta;
		$cobro['titular'] = $usuario[0]->titular;
		$cobro['clave'] = $usuario[0]->clabe;
		$cobro['monto'] = $usuario[0]->monto;
		$cobro['email'] = $usuario[0]->email;
		$cobro['fecha'] = $usuario[0]->fecha;
		$this->load->view('email/Cobros-html', $cobro);
	}
	
	function enviar_email($email, $usuario)
	{
		$cobro['username'] = $usuario[0]->username;
		$cobro['nombre'] = $usuario[0]->nombre;
		$cobro['apellido'] = $usuario[0]->apellido;
		$cobro['id_cobro'] = $usuario[0]->id_cobro;
		$cobro['banco'] = $usuario[0]->banco;
		$cobro['cuenta'] = $usuario[0]->cuenta;
		$cobro['titular'] = $usuario[0]->titular;
		$cobro['clave'] = $usuario[0]->clabe;
		$cobro['monto'] = $usuario[0]->monto;
		$cobro['email'] = $usuario[0]->email;
		$cobro['fecha'] = $usuario[0]->fecha;
		
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($email);
		$this->email->subject('Pago de Comision');
		$this->email->message($this->load->view('email/Cobros-html', $cobro, TRUE));
		//$this->email->set_alt_message($this->load->view('email/activate-txt', $data, TRUE));
		$this->email->send();
	}
	
	function Archivero(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}
		
		$usuario=$this->general->get_username($id);
		
		$style=$this->modelo_dashboard->get_style(1);
		
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comercial/Archivero/index');
	}
	
	function Archivos(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
	
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}
	
		$usuario = $this->general->get_username($id);
		$style = $this->modelo_dashboard->get_style(1);
	
		$archivos = array();
		$ruta = $_SERVER['DOCUMENT_ROOT']."/media/reportes/";
		if(is_dir($ruta)){
			if($aux = opendir($ruta)){
				while (($archivo = readdir($aux)) != false){
					if(!is_dir($archivo) && $archivo != 'index.html'){
						$archi = explode(".", $archivo);
						$filename = explode("de", $archi[0]);
						array_push($archivos, array('nombre' => $filename[0], 'fecha' => $filename[1],'ruta' => "/media/reportes/".$archivo));
					}
				}
			}
		}
		
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("archivos",$archivos);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comercial/Archivero/archivos_pagos');
	}
}