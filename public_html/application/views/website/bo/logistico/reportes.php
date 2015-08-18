<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
							
							<!-- PAGE HEADER -->
							<i class="fa-fw fa fa-pencil-square-o"></i> 
								<a href="/bo/dashboard">Dashboard</a> 
							<span>>
								<a href="/bo/logistico">Modulo log&iacute;stico</a> 
							</span>
							<span>>
								Reportes
							</span>
						</h1>
					</div>
				</div>
				<div class="row">
			


					<!-- NEW COL START -->
					<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="well">
							<div class="row">
								<form class="smart-form" id="reporte-form" method="post">
									<div class="row">			
										<section class="col col-lg-3 col-md-3 col-sm-12 col-xs-12">
											
											<label class="select">
												<select id="tipo-reporte">
													<option value="0" selected="" disabled="">Tipo de reporte</option>
													<option value="1">Usuarios SIO</option>
													<option value="2">Usuarios Telemarketing</option>
													<option value="3">Usuario CEDI</option>
													<option value="4">Proveedores</option>
													<option value="5">Productos y Servicios</option>
													<option value="6">Almacenes</option>
													<option value="7">CEDI's</option>
													<option value="8">Embarques</option>
													<option value="9">Orden de compra - Proveedores</option>
													<option value="10">Requisici&oacute;n de compra</option>
													<option value="11">Pedidos</option>
													<option value="12">Facturas Emitidas</option>
													<option value="13">Pagos</option>
													<option value="14">Ventas por Empresa</option>
													<option value="15">Ventas por Oficina Virtual</option>
													<option value="16">Ventas por Telemarkwting</option>
													<option value="17">Ventas por CEDI's</option>
													<option value="18">Ventas webs personales</option>
													<option value="19">Pedidos / Cuentas por cobrar</option>
													<option value="20">Facturacion / Pedidos Cobrados</option>
												</select> <i></i> </label>
										</section>
										<section class="col col-lg-3 col-md-3 col-sm-12 col-xs-12">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="startdate" id="startdate" placeholder="Del">
											</label>
										</section>
										<section class="col col-lg-3 col-md-3 col-sm-12 col-xs-12">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="finishdate" id="finishdate" placeholder="Al">
											</label>
										</section>
										<section class="col col-lg-3 col-md-3 col-sm-12 col-xs-12">
											<label class="input">
												<a id="genera-reporte" class="btn btn-primary col-xs-12 col-lg-12 col-md-12 col-sm-12">Generar Reporte</a>
											</label>
										</section>
									</div>
									<div class="row" id="row-print" style="display: none;">
										<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
											
										</section>
										<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
											
											<label class="input">
												<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
											</label>
										</section>
										
									</div>
									<div class="row" id="row-print-af" style="display: none;">
										<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
											
										</section>
										<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
											
											<label class="input">
												<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
											</label>
										</section>
										
									</div>
									<div class="row" id="row-print-usr" style="display: none;">
										<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
											
										</section>
										<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
											
											<label class="input">
												<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
											</label>
										</section>
										
									</div>
									<div class="row" id="row-print-red" style="display: none;">
										<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
											
										</section>
										<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
											
											<label class="input">
												<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
											</label>
										</section>
										
									</div>
									<div class="row" id="row-print-web" style="display: none;">
										<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
											
										</section>
										<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
											
											<label class="input">
												<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
											</label>
										</section>
										
									</div>
								</form>
							</div>
							
						</div>
									<!-- Widget ID (each widget will need unique ID)-->
						<div class="jarviswidget jarviswidget-color-blueDark" id="nuevos_afiliados" data-widget-editbutton="false">
							<!-- widget options:
							usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
			
							data-widget-colorbutton="false"
							data-widget-editbutton="false"
							data-widget-togglebutton="false"
							data-widget-deletebutton="false"
							data-widget-fullscreenbutton="false"
							data-widget-custombutton="false"
							data-widget-collapsed="true"
							data-widget-sortable="false"
			
							-->
							<header>
								<span class="widget-icon"> <i class="fa fa-table"></i> </span>
								<h2>Export to PDF / Excel</h2>
			
							</header>
						
								
							<!-- widget div-->
								<div>
									
											<!-- widget edit box -->
									<div class="jarviswidget-editbox">
		.										<!-- This area used as dropdown edit box -->
		.				
									</div>
									<!-- end widget edit box -->
									
									<!-- widget content -->
									<div class="widget-body no-padding" id="reporte_div">
						
										
				
									</div>
								<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
							</div>
							
							<!-- end widget -->
							<div class="well" id="well-print-af" style="display: none;">
								<div class="row">
									<form class="smart-form" id="reporte-form" method="post">
										
										<div class="row" >
											<section class="col col-lg-6 col-md-6 hidden-sm hidden-xs">
												
											</section>
											<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
												
												<label class="input">
													<a id="imprimir-2" href="reporte_afiliados_excel" class="btn btn-primary col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Crear excel</a>
												</label>
											</section>
											<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
												
												<label class="input">
													<a id="imprimir-2" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
												</label>
											</section>
											
										</div>
									</form>
								</div>
							</div>
							<div class="well" id="well-print-usr" style="display: none;">
								<div class="row">
									<form class="smart-form" id="reporte-form" method="post">
										
										<div class="row" >
											<section class="col col-lg-6 col-md-6 hidden-sm hidden-xs">
												
											</section>
											<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
												
												<label class="input">
													<a id="imprimir-2" onclick="reporte_excel_comprar_usr()" class="btn btn-primary col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Crear excel</a>
												</label>
											</section>
											<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
												
												<label class="input">
													<a id="imprimir-2" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
												</label>
											</section>
											
										</div>
									</form>
								</div>
							</div>
							<div class="well" id="well-print-red" style="display: none;">
								<div class="row">
									<form class="smart-form" id="reporte-form" method="post">
										
										<div class="row" >
											<section class="col col-lg-6 col-md-6 hidden-sm hidden-xs">
												
											</section>
											<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
												
												<label class="input">
													<a id="imprimir-2" onclick="" class="btn btn-primary col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Crear excel</a>
												</label>
											</section>
											<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
												
												<label class="input">
													<a id="imprimir-2" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
												</label>
											</section>
											
										</div>
									</form>
								</div>
							</div>
							<div class="well" id="well-print-web" style="display: none;">
								<div class="row">
									<form class="smart-form" id="reporte-form" method="post">
										
										<div class="row" >
											<section class="col col-lg-6 col-md-6 hidden-sm hidden-xs">
												
											</section>
											<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
												
												<label class="input">
													<a id="imprimir-2" onclick="" class="btn btn-primary col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Crear excel</a>
												</label>
											</section>
											<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
												
												<label class="input">
													<a id="imprimir-2" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
												</label>
											</section>
											
										</div>
									</form>
								</div>
							</div>
				
						</article>
						
						<!-- NEW WIDGET START -->
								<!-- WIDGET END -->
				
		
		
				</div>
				<div class="row">         
		         <!-- a blank row to get started -->
			    	<div class="col-sm-12">
			        	<br />
			        	<br />
			        </div>
		        </div>
			</div>
		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script>
			$("#genera-reporte").click(function()
			{
				var tipo=$("#tipo-reporte").val();
				var inicio=$("#startdate").val();
				var fin=$("#finishdate").val();
				if(inicio=='')
				{
					bootbox.dialog({
						message: "Porfavor, introduzca una fecha de inicio.",
						title: "Error",
						className: "",
						buttons: {
							success: {
								label: "Aceptar",
								className: "btn-success",
								callback: function(){
									
								}
							}
						}
					})
					tipo=0;
				}
				if(fin=='')
				{
					bootbox.dialog({
						message: "Porfavor, introduzca una fecha de fin.",
						title: "Error",
						className: "",
						buttons: {
							success: {
								label: "Aceptar",
								className: "btn-success",
								callback: function(){
									
								}
							}
						}
					})
					tipo=0;
				}
				switch(tipo)
				{
					case "1":
						$.ajax({
							type : "post",
							url : "reporte_usuarios_sio",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							$("#reporte_div").html(msg);
							var responsiveHelper_dt_basic = undefined;
							var responsiveHelper_datatable_fixed_column = undefined;
							var responsiveHelper_datatable_col_reorder = undefined;
							var responsiveHelper_datatable_tabletools = undefined;
							
							var breakpointDefinition = {
								tablet : 1024,
								phone : 480
							};
										var otable = $('#datatable_fixed_column1').DataTable({
					    	//"bFilter": false,
					    	//"bInfo": false,
					    	//"bLengthChange": false
					    	//"bAutoWidth": false,
					    	//"bPaginate": false,
					    	//"bStateSave": true // saves sort state using localStorage
							"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
									"t"+
									"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
							"autoWidth" : true,
							"preDrawCallback" : function() {
								// Initialize the responsive datatables helper once.
								if (!responsiveHelper_datatable_fixed_column) {
									responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column1'), breakpointDefinition);
								}
							},
							"rowCallback" : function(nRow) {
								responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
							},
							"drawCallback" : function(oSettings) {
								responsiveHelper_datatable_fixed_column.respond();
							}		
							
						    });
					    	//$("div.toolbar").html('<div class="text-right"><img src="/template/img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
					    	   
						    // Apply the filter
						    $("#datatable_fixed_column1 thead th input[type=text]").on( 'keyup change', function () {
						    	
						        otable
						            .column( $(this).parent().index()+':visible' )
						            .search( this.value )
						            .draw();
						            
						    } );
						   
						});
						break;
					case 2:
						$.ajax({
							type : "post",
							url : "reporte_usuarios_tel",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case 3:
						$.ajax({
							type : "post",
							url : "reporte_usuarios_cedi",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case "4":
						$.ajax({
							type : "post",
							url : "reporte_proveedores",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							$("#reporte_div").html(msg);
							var responsiveHelper_dt_basic = undefined;
							var responsiveHelper_datatable_fixed_column = undefined;
							var responsiveHelper_datatable_col_reorder = undefined;
							var responsiveHelper_datatable_tabletools = undefined;
							
							var breakpointDefinition = {
								tablet : 1024,
								phone : 480
							};
										var otable = $('#datatable_fixed_column1').DataTable({
					    	//"bFilter": false,
					    	//"bInfo": false,
					    	//"bLengthChange": false
					    	//"bAutoWidth": false,
					    	//"bPaginate": false,
					    	//"bStateSave": true // saves sort state using localStorage
							"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
									"t"+
									"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
							"autoWidth" : true,
							"preDrawCallback" : function() {
								// Initialize the responsive datatables helper once.
								if (!responsiveHelper_datatable_fixed_column) {
									responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column1'), breakpointDefinition);
								}
							},
							"rowCallback" : function(nRow) {
								responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
							},
							"drawCallback" : function(oSettings) {
								responsiveHelper_datatable_fixed_column.respond();
							}		
							
						    });
					    	//$("div.toolbar").html('<div class="text-right"><img src="/template/img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
					    	   
						    // Apply the filter
						    $("#datatable_fixed_column1 thead th input[type=text]").on( 'keyup change', function () {
						    	
						        otable
						            .column( $(this).parent().index()+':visible' )
						            .search( this.value )
						            .draw();
						            
						    } );
						});
						break;
					case 5:
						$.ajax({
							type : "post",
							url : "reporte_prodyserv",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case "6":
						$.ajax({
							type : "post",
							url : "reporte_almacenes",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							$("#reporte_div").html(msg);
							var responsiveHelper_dt_basic = undefined;
							var responsiveHelper_datatable_fixed_column = undefined;
							var responsiveHelper_datatable_col_reorder = undefined;
							var responsiveHelper_datatable_tabletools = undefined;
							
							var breakpointDefinition = {
								tablet : 1024,
								phone : 480
							};
										var otable = $('#datatable_fixed_column1').DataTable({
					    	//"bFilter": false,
					    	//"bInfo": false,
					    	//"bLengthChange": false
					    	//"bAutoWidth": false,
					    	//"bPaginate": false,
					    	//"bStateSave": true // saves sort state using localStorage
							"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
									"t"+
									"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
							"autoWidth" : true,
							"preDrawCallback" : function() {
								// Initialize the responsive datatables helper once.
								if (!responsiveHelper_datatable_fixed_column) {
									responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column1'), breakpointDefinition);
								}
							},
							"rowCallback" : function(nRow) {
								responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
							},
							"drawCallback" : function(oSettings) {
								responsiveHelper_datatable_fixed_column.respond();
							}		
							
						    });
					    	//$("div.toolbar").html('<div class="text-right"><img src="/template/img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
					    	   
						    // Apply the filter
						    $("#datatable_fixed_column1 thead th input[type=text]").on( 'keyup change', function () {
						    	
						        otable
						            .column( $(this).parent().index()+':visible' )
						            .search( this.value )
						            .draw();
						            
						    } );
						});
						break;
					case 7:
						$.ajax({
							type : "post",
							url : "reporte_cedis",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case 8:
						$.ajax({
							type : "post",
							url : "reporte_embarques",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case 9:
						$.ajax({
							type : "post",
							url : "reporte_orden_compra",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case 10:
						$.ajax({
							type : "post",
							url : "reporte_requesicion",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case 11:
						$.ajax({
							type : "post",
							url : "reporte_pedidos",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case 12:
						$.ajax({
							type : "post",
							url : "reporte_facturas_emitidas",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case 13:
						$.ajax({
							type : "post",
							url : "reporte_pagos",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case "14":
					$.ajax({
							type : "post",
							url : "reporte_ventas_empresa",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							$("#reporte_div").html(msg);
							var responsiveHelper_dt_basic = undefined;
							var responsiveHelper_datatable_fixed_column = undefined;
							var responsiveHelper_datatable_col_reorder = undefined;
							var responsiveHelper_datatable_tabletools = undefined;
							
							var breakpointDefinition = {
								tablet : 1024,
								phone : 480
							};
										var otable = $('#datatable_fixed_column1').DataTable({
					    	//"bFilter": false,
					    	//"bInfo": false,
					    	//"bLengthChange": false
					    	//"bAutoWidth": false,
					    	//"bPaginate": false,
					    	//"bStateSave": true // saves sort state using localStorage
							"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
									"t"+
									"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
							"autoWidth" : true,
							"preDrawCallback" : function() {
								// Initialize the responsive datatables helper once.
								if (!responsiveHelper_datatable_fixed_column) {
									responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column1'), breakpointDefinition);
								}
							},
							"rowCallback" : function(nRow) {
								responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
							},
							"drawCallback" : function(oSettings) {
								responsiveHelper_datatable_fixed_column.respond();
							}		
							
						    });
					    	//$("div.toolbar").html('<div class="text-right"><img src="/template/img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
					    	   
						    // Apply the filter
						    $("#datatable_fixed_column1 thead th input[type=text]").on( 'keyup change', function () {
						    	
						        otable
						            .column( $(this).parent().index()+':visible' )
						            .search( this.value )
						            .draw();
						            
						    } );
						});
						break;
					case 15:
						$.ajax({
							type : "post",
							url : "reporte_ventas_oficina",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case 16:
					$.ajax({
							type : "post",
							url : "reporte_ventas_tele",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case 17:
						$.ajax({
							type : "post",
							url : "reporte_ventas_cedi",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case 18:
						$.ajax({
							type : "post",
							url : "reporte_ventas_web",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case 19:
						$.ajax({
							type : "post",
							url : "reporte_pedidios_por_cobrar",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					case 20:
						$.ajax({
							type : "post",
							url : "reporte_pedidos_cobrados",
							data : {inicio:inicio,fin:fin}
						})
						.done(function(msg){
							
						});
						break;
					default:
						break;
				}
				
			});
		</script>
		<script>
			$(document).ready(function() {
			
			pageSetUp();
			
			/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
			*/	

			/* BASIC ;*/
				var responsiveHelper_dt_basic = undefined;
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;
				
				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};

				$('#dt_basic').dataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_dt_basic) {
							responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_dt_basic.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_dt_basic.respond();
					}
				});
	
			/* END BASIC */
			
			/* COLUMN FILTER  */
		    var otable = $('#datatable_fixed_column').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}		
			
		    });
		    
		    // custom toolbar
		    $("div.toolbar").html('<div class="text-right"><img src="/template/img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
		    	   
		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
		    	
		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();
		            
		    } );
		    /* END COLUMN FILTER */   
	    
			/* COLUMN SHOW - HIDE */
			$('#datatable_col_reorder').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_col_reorder) {
						responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_col_reorder.respond();
				}			
			});
			
			/* END COLUMN SHOW - HIDE */
	
			/* TABLETOOLS */
			$('#datatable_tabletools').dataTable({
				
				// Tabletools options: 
				//   https://datatables.net/extensions/tabletools/button_options
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
		        "oTableTools": {
		        	 "aButtons": [
		             "copy",
		             "csv",
		             "xls",
		                {
		                    "sExtends": "pdf",
		                    "sTitle": "SmartAdmin_PDF",
		                    "sPdfMessage": "SmartAdmin PDF Export",
		                    "sPdfSize": "letter"
		                },
		             	{
	                    	"sExtends": "print",
	                    	"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
	                	}
		             ],
		            "sSwfPath": "/template/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
		        },
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_tabletools) {
						responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_tabletools.respond();
				}
			});
			
			$('#startdate').datepicker({
				dateFormat : 'yy-mm-dd',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}
			});
			
			$('#finishdate').datepicker({
				dateFormat : 'yy-mm-dd',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#startdate').datepicker('option', 'maxDate', selectedDate);
				}
			});
			/* END TABLETOOLS */
		
		})
		</script>