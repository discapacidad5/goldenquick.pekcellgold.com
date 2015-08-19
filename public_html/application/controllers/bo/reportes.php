<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class reportes extends CI_Controller
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
		$this->load->model('model_tipo_red');
		$this->load->model('model_servicio');
		$this->load->model('bo/modelo_reportes');
		$this->load->model('general');
		$this->load->model('modelo_cobros');
	}

	function index()
	{
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
		$this->template->build('website/bo/reportes/main_dashboard');
	}
	
	function index_actualizado_ventas_ov()
	{
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
		
		$total_costo = 0;
		$total_impuesto = 0;
		$total_comision = 0;
		$total_neto = 0;
		$redes = $this->model_tipo_red->listarTodos();
	
		$style=$this->modelo_dashboard->get_style($id);
		
		
		
		$servicios = $this->model_servicio->listar_todos_por_venta_y_fecha($_GET['startdate'], $_GET['finishdate'] );
	
		foreach ($servicios as $servicio){
			$total_costo = $total_costo + $servicio->costo;
			$total_impuesto = $total_impuesto + $servicio->impuesto;
			$total_comision = $total_comision + $servicio->comision;
			$total_neto = $total_neto + (($servicio->costo)-($servicio->impuesto+$servicio->comision));
		}
	
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("redes",$redes);
		$this->template->set("servicios",$servicios);
		$this->template->set("total_costo",$total_costo);
		$this->template->set("total_impuesto",$total_impuesto);
		$this->template->set("total_comision",$total_comision);
		$this->template->set("total_neto",$total_neto);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/reportes/main_dashboard_actualizada_ventas_ov');
	}
	
	function index_actualizado_()
	{
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
	
		$total_costo = 0;
		$total_impuesto = 0;
		$total_comision = 0;
		$total_neto = 0;
		$redes = $this->model_tipo_red->listarTodos();
	
		$style=$this->modelo_dashboard->get_style($id);
	
		$servicios = $this->model_servicio->listar_todos_por_venta_y_fecha($_POST['startdate'], $_POST['finishdate'] );
	
		foreach ($servicios as $servicio){
			$total_costo = $total_costo + $servicio->costo;
			$total_impuesto = $total_impuesto + $servicio->impuesto;
			$total_comision = $total_comision + $servicio->comision;
			$total_neto = $total_neto + (($servicio->costo)-($servicio->impuesto+$servicio->comision));
		}
	
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("redes",$redes);
		$this->template->set("servicios",$servicios);
		$this->template->set("total_costo",$total_costo);
		$this->template->set("total_impuesto",$total_impuesto);
		$this->template->set("total_comision",$total_comision);
		$this->template->set("total_neto",$total_neto);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/reportes/main_dashboard');
	}
	
	function reporte_afiliados()
	{
		$id=$this->tank_auth->get_user_id();
		
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
		
		$afiliados=$this->modelo_reportes->reporte_afiliados($_POST['startdate'],$_POST['finishdate']);
		echo 
			"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Email</th>
				</thead>
				<tbody>";
			for($i=0;$i<sizeof($afiliados);$i++)
			{
					echo "<tr>
					<td class='sorting_1'>".$afiliados[$i]->id."</td>
					<td>".$afiliados[$i]->usuario."</td>
					<td>".$afiliados[$i]->nombre."</td>
					<td>".$afiliados[$i]->apellido."</td>
					<td>".$afiliados[$i]->email."</td>
				</tr>";
			}
				
			
			echo "</tbody>
			</table><tr class='odd' role='row'>";
		
		
	}
	
	function reporte_afiliados_excel()
	{
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
		
		$id=$this->tank_auth->get_user_id();
		$inicio = "2000-01-01";
		if($_GET['inicio'] != null){
			$inicio = $_GET['inicio'];
		}
		
		$fin = "2200-12-31";
		if($_GET['fin'] != null){
			$fin = $_GET['fin'];
		}
		
		$afiliados=$this->modelo_reportes->reporte_afiliados($inicio,$fin);
		
		$this->load->library('excel');
		$this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte_afiliados.xls");
		for($i = 0;$i < count($afiliados);$i++)
		{
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($i+8), $afiliados[$i]->id);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($i+8), $afiliados[$i]->usuario);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $afiliados[$i]->nombre);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $afiliados[$i]->apellido);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($i+8), $afiliados[$i]->email);
		}
		
		$filename='Afiliados.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save('php://output');
	}
	
	function reporte_afiliados_mes()
	{
		$id=$this->tank_auth->get_user_id();
		$afiliados=$this->modelo_reportes->reporte_afiliados_mes();
		echo 
			"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Email</th>
				</thead>
				<tbody>";
			for($i=0;$i<sizeof($afiliados);$i++)
			{
					echo "<tr>
					<td class='sorting_1'>".$afiliados[$i]->id."</td>
					<td>".$afiliados[$i]->usuario."</td>
					<td>".$afiliados[$i]->nombre."</td>
					<td>".$afiliados[$i]->apellido."</td>
					<td>".$afiliados[$i]->email."</td>
				</tr>";
			}
				
			
			echo "</tbody>
			</table><tr class='odd' role='row'>";
		
		
	}
	
	function reporte_afiliados_mes_excel()
	{
		$id=$this->tank_auth->get_user_id();
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
		
	
		$afiliados= $this->modelo_reportes->reporte_afiliados_mes();
	
		$this->load->library('excel');
		$this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte_afiliados.xls");
		for($i = 0;$i < count($afiliados);$i++)
		{
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($i+8), $afiliados[$i]->id);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($i+8), $afiliados[$i]->usuario);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $afiliados[$i]->nombre);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $afiliados[$i]->apellido);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($i+8), $afiliados[$i]->email);
		}
	
		$filename='AfiliadosMes.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
	
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save('php://output');
	}
	
	function reporte_ventas_oficinas_virtuales()
	{
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
		
		$total_costo = 0;
		$total_impuesto = 0;
		$total_comision = 0;
		$total_neto = 0;
		$redes = $this->model_tipo_red->listarTodos();
		
		$style=$this->modelo_dashboard->get_style($id);
	
		$servicios = $this->model_servicio->listar_todos_por_venta_y_fecha($_POST['startdate'],$_POST['finishdate']);
		
		//var_dump($_POST['startdate']);
		
		$id=$this->tank_auth->get_user_id();
		echo
		"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th data-class='expand'>Red</th>
					<th data-hide='phone,tablet'>Servicio</th>
					<th data-hide='phone,tablet'>Cantidad</th>
					<th data-hide='phone,tablet'>Subtotal</th>
					<th data-hide='phone,tablet'>Total impuestos</th>
					<th data-hide='phone,tablet'>Total comisiones</th>
					<th data-hide='phone,tablet'>Total neto</th>
				</thead>
				<tbody>";
		
		if ($_POST['startdate']!=""){
			
			foreach ($servicios as $servicio){
				$total_costo = $total_costo + $servicio->costo;
				$total_impuesto = $total_impuesto + $servicio->impuesto;
				$total_comision = $total_comision + $servicio->comision;
				$total_neto = $total_neto + (($servicio->costo)-($servicio->impuesto+$servicio->comision));
			}
			
			foreach($servicios as $servicio)
			{
			echo "<tr>
			<td class='sorting_1'>".$servicio->nombre_red."</td>
			<td>".$servicio->nombre."</td>
			<td>".$servicio->cantidad."</td>
			<td> $	".$servicio->costo."</td>
			<td> $	".$servicio->impuesto."</td>
			<td> $	".$servicio->comision."</td>
			<td> $	".(($servicio->costo)-($servicio->impuesto+$servicio->comision))."</td>
			</tr>";
				}
	
				echo "<tr>
			<td class='sorting_1'></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>";
				
				echo "<tr>
			<td class='sorting_1'><b>TOTALES</b></td>
			<td></td>
			<td></td>
			<td><b> $	".$total_costo."</b></td>
			<td><b> $	".$total_impuesto."</b></td>
			<td><b> $	".$total_comision."</b></td>
			<td><b> $	".$total_neto."</b></td>
			</tr>";
		}
			echo "</tbody>
		</table><tr class='odd' role='row'>";
	
	}
	
	function reporte_ventas_oficinas_virtuales_excel()
		{
			if (!$this->tank_auth->is_logged_in())
			{																		// logged in
			redirect('/auth');
			}
			
			$id=$this->tank_auth->get_user_id();
			$usuario=$this->general->get_username($id);
			
			if($usuario[0]->id_tipo_usuario!=1)
			{
				redirect('/auth/logout');
			}
	
		if ($_GET['inicio']!=""){
			$total_costo = 0;
			$total_impuesto = 0;
			$total_comision = 0;
			$total_neto = 0;
			$redes = $this->model_tipo_red->listarTodos();
			
			$style=$this->modelo_dashboard->get_style($id);
		
			$servicios = $this->model_servicio->listar_todos_por_venta_y_fecha($_GET['inicio'],$_GET['fin']);
		
						$this->load->library('excel');
						$this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte_ventas_oficinas_virtuales.xls");
		
		foreach ($servicios as $servicio){
			$total_costo = $total_costo + $servicio->costo;
			$total_impuesto = $total_impuesto + $servicio->impuesto;
			$total_comision = $total_comision + $servicio->comision;
			$total_neto = $total_neto + (($servicio->costo)-($servicio->impuesto+$servicio->comision));
		}				
		$contador_filas = 0;
		for($i = 0;$i < count($servicios);$i++)
		{
			$contador_filas = $contador_filas+1;
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($contador_filas+8), $servicios[$i]->nombre_red);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($contador_filas+8), $servicios[$i]->nombre);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($contador_filas+8), $servicios[$i]->cantidad);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($contador_filas+8), $servicios[$i]->costo);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($contador_filas+8), $servicios[$i]->impuesto);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($contador_filas+8), $servicios[$i]->comision);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($contador_filas+8), (($servicios[$i]->costo)-($servicios[$i]->impuesto+$servicios[$i]->comision)));
		}
		$contador_filas = $contador_filas+1;
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($contador_filas+8), "TOTALES");
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($contador_filas+8), "");
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($contador_filas+8), "");
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($contador_filas+8), $total_costo);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($contador_filas+8), $total_impuesto);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($contador_filas+8), $total_comision);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($contador_filas+8), $total_neto);
		
		
		$filename='Ventas_Oficina_virtual_de '.$_GET['inicio'].' al '.$_GET['fin'].'.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
			header('Cache-Control: max-age=0'); //no cache
	
			//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
			//if you want to save it as .XLSX Excel 2007 format
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
			//force user to download the Excel file without writing it to server's HD
			//$objWriter->save(getcwd()."/media/reportes/".$filename);
			$objWriter->save('php://output');
		}
		
			
	}
	
	function reporte_proveedores()
	{
		$proveedor_p=$this->modelo_reportes->proveedores_prod();
		$proveedor_s=$this->modelo_reportes->proveedores_serv();
		$proveedor_c=$this->modelo_reportes->proveedores_comb();
		echo 
			"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Empresa</th>
					<th>Regimen</th>
					<th>Zona</th>
					<th>Mercancia</th>
					<th>Razon Social</th>
					<th>CURP</th>
					<th>RFC</th>
					<th>Impuesto</th>
					<th>Condicion Pago</th>
					<th>Promedio Pago</th>
					<th>Plazo Pago</th>
					<th>Plazo Suspension</th>
					<th>Interes Moratorio</th>
					<th>Dia Corte</th>
					<th>Dia Pago</th>
				</thead>
				<tbody>";
				$j=0;
			for($i=0;$i<sizeof($proveedor_p);$i++)
			{
					echo "<tr>
					<td class='sorting_1'>".($j+1)."</td>
					<td>".$proveedor_p[$i]->emp."</td>
					<td>".$proveedor_p[$i]->abreviatura." (".$proveedor_p[$i]->reg.")</td>
					<td>".$proveedor_p[$i]->zona."</td>
					<td>".$proveedor_p[$i]->merc."</td>
					<td>".$proveedor_p[$i]->razon_social."</td>
					<td>".$proveedor_p[$i]->curp."</td>
					<td>".$proveedor_p[$i]->rfc."</td>
					<td>".$proveedor_p[$i]->imp."</td>
					<td>".$proveedor_p[$i]->condicion_pago."</td>
					<td>".$proveedor_p[$i]->promedio_pago."</td>
					<td>".$proveedor_p[$i]->plazo_pago."</td>
					<td>".$proveedor_p[$i]->plazo_suspencion."</td>
					<td>".$proveedor_p[$i]->interes_moratorio."</td>
					<td>".$proveedor_p[$i]->dia_corte."</td>
					<td>".$proveedor_p[$i]->dia_pago."</td>
				</tr>";
				$j++;
			}
			for($i=0;$i<sizeof($proveedor_s);$i++)
			{
					echo "<tr>
					<td class='sorting_1'>".($j+1)."</td>
					<td>".$proveedor_s[$i]->emp."</td>
					<td>".$proveedor_s[$i]->abreviatura." (".$proveedor_p[$i]->reg.")</td>
					<td>".$proveedor_s[$i]->zona."</td>
					<td>".$proveedor_s[$i]->merc."</td>
					<td>".$proveedor_s[$i]->razon_social."</td>
					<td>".$proveedor_s[$i]->curp."</td>
					<td>".$proveedor_s[$i]->rfc."</td>
					<td>".$proveedor_s[$i]->imp."</td>
					<td>".$proveedor_s[$i]->condicion_pago."</td>
					<td>".$proveedor_s[$i]->promedio_pago."</td>
					<td>".$proveedor_s[$i]->plazo_pago."</td>
					<td>".$proveedor_s[$i]->plazo_suspencion."</td>
					<td>".$proveedor_s[$i]->interes_moratorio."</td>
					<td>".$proveedor_s[$i]->dia_corte."</td>
					<td>".$proveedor_s[$i]->dia_pago."</td>
				</tr>";
				$j++;
			}
			for($i=0;$i<sizeof($proveedor_c);$i++)
			{
					echo "<tr>
					<td class='sorting_1'>".($j+1)."</td>
					<td>".$proveedor_c[$i]->emp."</td>
					<td>".$proveedor_c[$i]->abreviatura." (".$proveedor_p[$i]->reg.")</td>
					<td>".$proveedor_c[$i]->zona."</td>
					<td>".$proveedor_c[$i]->merc."</td>
					<td>".$proveedor_c[$i]->razon_social."</td>
					<td>".$proveedor_c[$i]->curp."</td>
					<td>".$proveedor_c[$i]->rfc."</td>
					<td>".$proveedor_c[$i]->imp."</td>
					<td>".$proveedor_c[$i]->condicion_pago."</td>
					<td>".$proveedor_c[$i]->promedio_pago."</td>
					<td>".$proveedor_c[$i]->plazo_pago."</td>
					<td>".$proveedor_c[$i]->plazo_suspencion."</td>
					<td>".$proveedor_c[$i]->interes_moratorio."</td>
					<td>".$proveedor_c[$i]->dia_corte."</td>
					<td>".$proveedor_c[$i]->dia_pago."</td>
				</tr>";
				$j++;
				$j++;
			}
				
			
			echo "</tbody>
			</table><tr class='odd' role='row'>";
		
	}
	function reporte_usuarios()
	{
		$usuarios=$this->modelo_reportes->reporte_usuarios();
		echo 
			"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Username</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Sexo</th>
					<th>Estado Civil</th>
					<th>Tipo Usuario</th>
					<th>Estudio</th>
					<th>Ocupacion</th>
					<th>Tiempo Dedicado</th>
					<th>Tipo Fiscal</th>
					<th>Fecha Nacimiento</th>
					<th>Ultima Sesion</th>
				</thead>
				<tbody>";
			for($i=0;$i<sizeof($usuarios);$i++)
			{
					echo "<tr>
					<td class='sorting_1'>".$usuarios[$i]->id."</td>
					<td>".$usuarios[$i]->username."</td>
					<td>".$usuarios[$i]->nombre." ".$usuarios[$i]->apellido."</td>
					<td>".$usuarios[$i]->email."</td>
					<td>".$usuarios[$i]->sexo."</td>
					<td>".$usuarios[$i]->estado_civil."</td>
					<td>".$usuarios[$i]->tipo_usuario."</td>
					<td>".$usuarios[$i]->estudio."</td>
					<td>".$usuarios[$i]->ocupacion."</td>
					<td>".$usuarios[$i]->tiempo_dedicado."</td>
					<td>".$usuarios[$i]->fiscal."</td>
					<td>".$usuarios[$i]->fecha_nacimiento."</td>
					<td>".$usuarios[$i]->ultima_sesion."</td>
				</tr>";
			}
				
			
			echo "</tbody>
			</table><tr class='odd' role='row'>";
	}
	
	function reporte_cobros_pendientes(){
		$cobros = $this->modelo_cobros->ConsultarCobrosPendientes();
		echo
		"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Usuario</th>
					<th>Fecha</th>
					<th>Metodo de Pago</th>
					<th>Banco</th>
					<th>N° Cuenta</th>
					<th>Titular</th>
					<th>Clave</th>
					<th>Monto</th>
					<th>Estado</th>
				</thead>
				<tbody>";
		for($i=0;$i < sizeof($cobros);$i++)
		{
			echo "<tr>
			<td class='sorting_1'>".$cobros[$i]->id_cobro."</td>
			<td>".$cobros[$i]->usuario."</td>
			<td>".$cobros[$i]->fecha."</td>
			<td>".$cobros[$i]->metodo_pago."</td>
			<td>".$cobros[$i]->banco."</td>
			<td>".$cobros[$i]->cuenta."</td>
			<td>".$cobros[$i]->titular."</td>
			<td>".$cobros[$i]->clabe."</td>
			<td>$ ".number_format($cobros[$i]->monto,2)."</td>
			<td>".$cobros[$i]->estado."</td>
			</tr>";
		}
		
		
			echo "</tbody> </table> <tr class='odd' role='row'>";
	}
	
	function reporte_cobros_pendientes_excel()
	{
		$cobros = $this->modelo_cobros->ConsultarCobrosPendientes();
	
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
			
		}
	
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, ($ultima_fila+1), "Total");
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(8, ($ultima_fila+1), $total);
	
		$filename='Cuentas Por Pagar.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
	
	function reporte_cobros_historial(){
		$inicio = '2000-01-01';
		if(isset($_POST['inicio'])){
			$inicio = $_POST['inicio'];
		}
		$fin = '3000-12-12';
		if(isset($_POST['fin'])){
			$fin = $_POST['fin'];
		}
		
		$cobros = $this->modelo_cobros->listarCobrosPagos($inicio, $fin);
		echo
		"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Usuario</th>
					<th>Fecha Solicitud</th>
					<th>Fecha Pago</th>
					<th>Metodo de Pago</th>
					<th>Banco</th>
					<th>N° Cuenta</th>
					<th>Titular</th>
					<th>Clave</th>
					<th>Monto</th>
					<th>Estado</th>
				</thead>
				<tbody>";
		for($i=0;$i < sizeof($cobros);$i++)
		{
		echo "<tr>
			<td class='sorting_1'>".$cobros[$i]->id_cobro."</td>
			<td>".$cobros[$i]->usuario."</td>
			<td>".$cobros[$i]->fecha."</td>
			<td>".$cobros[$i]->fecha_pago."</td>
			<td>".$cobros[$i]->metodo_pago."</td>
			<td>".$cobros[$i]->banco."</td>
			<td>".$cobros[$i]->cuenta."</td>
			<td>".$cobros[$i]->titular."</td>
			<td>".$cobros[$i]->clabe."</td>
			<td>$ ".number_format($cobros[$i]->monto,2)."</td>
			<td>".$cobros[$i]->estado."</td>
			</tr>";
		}
		
		
		echo "</tbody> </table> <tr class='odd' role='row'>";
	}
	
	function reporte_cobros_pagos_excel()
	{
		$inicio = '2000-01-01';
		if($_GET['inicio'] != null){
			$inicio = $_GET['inicio'];
		}
		$fin = '3000-12-12';
		if($_GET['fin'] != null){
			$fin = $_GET['fin'];
		}
		
		$cobros = $this->modelo_cobros->listarCobrosPagos($inicio, $fin);
		
		$this->load->library('excel');
		$this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte-cobros_pagos.xls");
	
		$total = 0;
		$ultima_fila = 0;
		for($i = 0;$i < sizeof($cobros);$i++)
		{
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($i+8), $cobros[$i]->id_cobro);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($i+8), $cobros[$i]->fecha);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $cobros[$i]->fecha_pago);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $cobros[$i]->usuario);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($i+8), $cobros[$i]->banco);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($i+8), $cobros[$i]->cuenta);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($i+8), $cobros[$i]->titular);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, ($i+8), $cobros[$i]->clabe);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(8, ($i+8), $cobros[$i]->metodo_pago);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(9, ($i+8), $cobros[$i]->estado);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(10, ($i+8), $cobros[$i]->monto);
			$total = $total + $cobros[$i]->monto;
			$ultima_fila = $i+8;
			
		}
	
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(9, ($ultima_fila+1), "Total");
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(10, ($ultima_fila+1), $total);
	
		$filename='CuentasPagadas de '.$inicio.' al '.$fin.'.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
	
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
	
	function reporte_cobros_todos(){
		$inicio = '2000-01-01';
		if(isset($_POST['inicio'])){
			$inicio = $_POST['inicio'];
		}
		$fin = '3000-12-12';
		if(isset($_POST['fin'])){
			$fin = $_POST['fin'];
		}
		
		$cobros = $this->modelo_cobros->listarTodos($inicio, $fin);
		echo
		"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Usuario</th>
					<th>Fecha Solicitud</th>
					<th>Fecha Pago</th>
					<th>Metodo de Pago</th>
					<th>Banco</th>
					<th>N° Cuenta</th>
					<th>Titular</th>
					<th>Clave</th>
					<th>Monto</th>
					<th>Estado</th>
				</thead>
				<tbody>";
		for($i=0;$i < sizeof($cobros);$i++)
		{
		echo "<tr>
			<td class='sorting_1'>".$cobros[$i]->id_cobro."</td>
			<td>".$cobros[$i]->usuario."</td>
			<td>".$cobros[$i]->fecha."</td>
			<td>".$cobros[$i]->fecha_pago."</td>
			<td>".$cobros[$i]->metodo_pago."</td>
			<td>".$cobros[$i]->banco."</td>
			<td>".$cobros[$i]->cuenta."</td>
			<td>".$cobros[$i]->titular."</td>
			<td>".$cobros[$i]->clabe."</td>
			<td>$ ".number_format($cobros[$i]->monto,2)."</td>
			<td>".$cobros[$i]->estado."</td>
			</tr>";
		}
		
		
		echo "</tbody> </table> <tr class='odd' role='row'>";
	}
	
	function reporte_cobros_todos_excel()
	{
		$inicio = '2000-01-01';
		if($_GET['inicio'] != null){
			$inicio = $_GET['inicio'];
		}
		$fin = '3000-12-12';
		if($_GET['fin'] != null){
			$fin = $_GET['fin'];
		}
	
		$cobros = $this->modelo_cobros->listarTodos($inicio, $fin);
	
		$this->load->library('excel');
		$this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte-cobros_pagos.xls");
	
		$total = 0;
		$ultima_fila = 0;
		for($i = 0;$i < sizeof($cobros);$i++)
		{
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($i+8), $cobros[$i]->id_cobro);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($i+8), $cobros[$i]->fecha);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $cobros[$i]->fecha_pago);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $cobros[$i]->usuario);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($i+8), $cobros[$i]->banco);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($i+8), $cobros[$i]->cuenta);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($i+8), $cobros[$i]->titular);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, ($i+8), $cobros[$i]->clabe);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(8, ($i+8), $cobros[$i]->metodo_pago);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(9, ($i+8), $cobros[$i]->estado);
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(10, ($i+8), $cobros[$i]->monto);
		$total = $total + $cobros[$i]->monto;
		$ultima_fila = $i+8;
			
		}
	
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(9, ($ultima_fila+1), "Total");
		$this->excel->getActiveSheet()->setCellValueByColumnAndRow(10, ($ultima_fila+1), $total);
	
		$filename='CuentasPagadas de '.$inicio.' al '.$fin.'.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
	
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
}