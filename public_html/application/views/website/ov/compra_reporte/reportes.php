
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				
				<!-- PAGE HEADER -->
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>> 
					Reportes
				</span>
			</h1>
		</div>
	</div>
	

<div class="spinner2"></div>
		<!-- START ROW -->

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
											<option value="1">Afliados nuevos</option>
											<option value="5">Compras por Banco</option>
											<option value="6">Ver consecutivo de mi red</option>
											<option value="7">Ver compras de mi red</option>
											<option value="8">Ver mis compras</option>
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
										<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12 hide"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
									</label>
								</section>
								
							</div>
							<div class="row" id="row-print-af" style="display: none;">
								<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
									
								</section>
								<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
									
									<label class="input">
										<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12 hide"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
									</label>
								</section>
								
							</div>
							<div class="row" id="row-print-usr" style="display: none;">
								<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
									
								</section>
								<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
									
									<label class="input">
										<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12 hide"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
									</label>
								</section>
								
							</div>
							<div class="row" id="row-print-red" style="display: none;">
								<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
									
								</section>
								<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
									
									<label class="input" id="remplazar">
										<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12 hide"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
									</label>
								</section>
								
							</div>
							<div class="row" id="row-print-web" style="display: none;">
								<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
									
								</section>
								<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
									
									<label class="input">
										<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12 hide"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
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
					<div class="well hide" id="well-print-af" style="display: none;">
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
					<div class="well hide" id="well-print-usr" style="display: none;">
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
					<div class="well hide" id="well-print-red" style="display: none;">
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
					<div class="well hide" id="well-print-web" style="display: none;">
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
		</div>
		<div class="row">         
         <!-- a blank row to get started -->
	    	<div class="col-sm-12">
	        	<br />
	        	<br />
	        </div>
        </div>
<!-- END MAIN CONTENT -->

<!-- PAGE RELATED PLUGIN(S) -->
		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script src="/template/js/spin.js"></script>
		<script type="text/javascript">
		function Enviar(id)
		{
			bootbox.dialog({
				message: "¿Desea enviar este registro ahora?",
				title: "Enviar Venta ".concat(id),
				className: "",
				buttons: {
					success: {
					label: "Si",
					className: "btn-success",
					callback: function() {
						$.ajax({
							type: "post",
							data: {id:id},
							url: "Cambiar_estado_enviar"
						})
						.done(function(msg){
							bootbox.dialog({
								message: "Se han enviado estos producto exitosamente.",
								title: "Exito",
								className: "",
								buttons: {
									success: {
										label: "Aceptar",
										className: "btn-success",
										callback: function(){
											window.location.href="reportes";
										}
									}
								}
							})
						});
					}
				},
				danger: {
					label: "No",
					className: "btn-danger",
					callback: function(){
					
					}
				}
			}
		});
					
		}

		</script>
		
		<script type="text/javascript">
			$("#tipo-reporte").change(function()
			{
				if($("#tipo-reporte").val()==1 || $("#tipo-reporte").val()==6)
				{
					$("#startdate").prop( "disabled", true );
					$("#finishdate").prop( "disabled", true );
				}
				else
				{
					$("#startdate").prop( "disabled", false);
					$("#finishdate").prop( "disabled", false );
					$("#imprimir-1").prop( "hide", true );
				}
			});
		</script>
		<script type="text/javascript" id="script_fila">
			function nueva_fila()
			{
				alert("hola");
			}
		</script>
		
		<script type="text/javascript">
		
			$("#genera-reporte").click(function()
			{
				tipo=$("#tipo-reporte").val();
				switch(tipo)
				{
					case '1':
						$("#nuevos-afiliados").show();
						$.ajax({
					         type: "post",
					         url: "reporte_afiliados",
							success: function( msg )
							{
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
						    	$("div.toolbar").html('<div class="text-right"><img src="" alt="" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
						    	   
							    // Apply the filter
							    $("#datatable_fixed_column1 thead th input[type=text]").on( 'keyup change', function () {
							    	
							        otable
							            .column( $(this).parent().index()+':visible' )
							            .search( this.value )
							            .draw();
							            
							    } );
							    $("#well-print-usr").hide();
								$("#row-print-usr").hide();
								$("#well-print-red").hide();
								$("#row-print-red").hide();
								$("#well-print-web").hide();
								$("#row-print-web").hide();
							    $("#well-print-af").show();
								$("#row-print-af").show();
						    // custom toolbar
								 var obj = '<a onclick="reporte_excel()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12 " ><i class="fa fa-print"></i>&nbsp;Crear excel</a>'
										$("#remplazar").html(obj);
										$("#row-print-red").show();
							}
						});
						
						break;
					case '2':
						var inicio=$("#startdate").val();
						var fin=$("#finishdate").val();
						if(inicio=='')
						{
							alert('Introduzca fecha de inicio');
						}
						else
						{
							if(fin=='')
							{
								alert('Introduzca fecha de fin');
							}
							else
							{
								$("#nuevos_afiliados").show();
								var datos={'inicio':inicio,'fin':fin};
								$.ajax({
									 data: {info:JSON.stringify(datos)},
							         type: "get",
							         url: "reporte_compras_usr",
									success: function( msg )
									{
										$("#reporte_div").html(msg);
										var responsiveHelper_dt_basic = undefined;
										var responsiveHelper_datatable_fixed_column = undefined;
										var responsiveHelper_datatable_col_reorder = undefined;
										var responsiveHelper_datatable_tabletools = undefined;
										
										var breakpointDefinition = {
											tablet : 1024,
											phone : 480
										};
													var otable = $('#datatable_fixed_column2').DataTable({
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
												responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column2'), breakpointDefinition);
											}
										},
										"rowCallback" : function(nRow) {
											responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
										},
										"drawCallback" : function(oSettings) {
											responsiveHelper_datatable_fixed_column.respond();
										}		
										
									    });
								    	$("div.toolbar").html('<div class="text-right"><img src="" alt="" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
								    	   
									    // Apply the filter
									    $("#datatable_fixed_column2 thead th input[type=text]").on( 'keyup change', function () {
									    	
									        otable
									            .column( $(this).parent().index()+':visible' )
									            .search( this.value )
									            .draw();
									            
									    } );
									    $("#well-print-red").hide();
										$("#row-print-red").hide();
										$("#well-print-af").hide();
										$("#row-print-af").hide();
										$("#well-print-web").hide();
										$("#row-print-web").hide();
									    $("#well-print-usr").show();
										$("#row-print-usr").show();
								    // custom toolbar
										 var obj = '<a onclick="" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12 " ><i class="fa fa-print"></i>&nbsp;Crear excel</a>'
												$("#remplazar").html(obj);
												$("#row-print-red").show();
									}
								});
								$.ajax({
									 data: {info:JSON.stringify(datos)},
							         type: "get",
							         url: "reporte_compras_usr_well",
									success: function( msg )
									{
										$("#well-print-usr").html(msg);
									}
								});
							}
						}	
						
						
						break;
					case '3':
						var inicio=$("#startdate").val();
						var fin=$("#finishdate").val();
						if(inicio=='')
						{
							alert('Introduzca fecha de inicio');
						}
						else
						{
							if(fin=='')
							{
								alert('Introduzca fecha de fin');
							}
							else
							{
								$("#nuevos_afiliados").show();
								var datos={'inicio':inicio,'fin':fin};
								$.ajax({
									 data: {info:JSON.stringify(datos)},
							         type: "get",
							         url: "reporte_compras",
									success: function( msg )
									{
										$("#reporte_div").html(msg);
										var responsiveHelper_dt_basic = undefined;
										var responsiveHelper_datatable_fixed_column = undefined;
										var responsiveHelper_datatable_col_reorder = undefined;
										var responsiveHelper_datatable_tabletools = undefined;
										
										var breakpointDefinition = {
											tablet : 1024,
											phone : 480
										};
													var otable = $('#datatable_fixed_column3').DataTable({
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
												responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column3'), breakpointDefinition);
											}
										},
										"rowCallback" : function(nRow) {
											responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
										},
										"drawCallback" : function(oSettings) {
											responsiveHelper_datatable_fixed_column.respond();
										}		
										
									    });
								    	$("div.toolbar").html('<div class="text-right"><img src="" alt="" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
								    	   
									    // Apply the filter
									    $("#datatable_fixed_column3 thead th input[type=text]").on( 'keyup change', function () {
									    	
									        otable
									            .column( $(this).parent().index()+':visible' )
									            .search( this.value )
									            .draw();
									            
									    } );
									    $("#well-print-usr").hide();
										$("#row-print-usr").hide();
										$("#well-print-af").hide();
										$("#row-print-af").hide();
										$("#well-print-web").hide();
										$("#row-print-web").hide();
									    $("#well-print-red").show();
										$("#row-print-red").show();
								    // custom toolbar
								    
									}
								});
								$.ajax({
									 data: {info:JSON.stringify(datos)},
							         type: "get",
							         url: "reporte_compras_red_well",
									success: function( msg )
									{
										$("#well-print-red").html(msg);
									}
								});
							}
						}	
						
						
						break;
					
					case '5':{
						$("#well-print-usr").hide();
						$("#row-print-usr").hide();
						$("#well-print-af").hide();
						$("#row-print-af").hide();
						$("#well-print-web").hide();
						$("#row-print-web").hide();
						var inicio=$("#startdate").val();
						var fin=$("#finishdate").val();
						if (inicio == '' || fin == ''){
							alert('Introduzca las fechas para buscar');
							return 0;
						}
						iniciarSpinner();
						$.ajax({
							type: "POST",
							data: {inicio : inicio, fin : fin},
							url: "/ov/compras/ReportePagosBanco"
						})
						.done(function( msg ) {
							
							FinalizarSpinner();
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
					    	$("div.toolbar").html('<div class="text-right"><img src="" alt="" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
					    	   
						    // Apply the filter
						    $("#datatable_fixed_column1 thead th input[type=text]").on( 'keyup change', function () {
						    	
						        otable
						            .column( $(this).parent().index()+':visible' )
						            .search( this.value )
						            .draw();

						       
						    } );
							var obj = '<a onclick="ReportePagoBancoExcel()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12 " ><i class="fa fa-print"></i>&nbsp;Crear excel</a>'
								$("#remplazar").html(obj);
								$("#row-print-red").show();
							});
						}
					break;

					case '6':
						$("#nuevos-afiliados").show();
						$.ajax({
					         type: "post",
					         url: "reporte_afiliados_todos",
							success: function( msg )
							{
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
						    	$("div.toolbar").html('<div class="text-right"><img src="" alt="" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
						    	   
							    // Apply the filter
							    $("#datatable_fixed_column1 thead th input[type=text]").on( 'keyup change', function () {
							    	
							        otable
							            .column( $(this).parent().index()+':visible' )
							            .search( this.value )
							            .draw();

							       
							    } );
							    $("#well-print-usr").hide();
								$("#row-print-usr").hide();
								$("#well-print-red").hide();
								$("#row-print-red").hide();
								$("#well-print-web").hide();
								$("#row-print-web").hide();
							    $("#well-print-af").show();
								$("#row-print-af").show();
								
						    // custom toolbar
								 var obj = '<a onclick="reporte_excel()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12 " ><i class="fa fa-print"></i>&nbsp;Crear excel</a>'
										$("#remplazar").html(obj);
										$("#row-print-red").show();
							}
						});
						
						break;

					case '7':
						var inicio=$("#startdate").val();
						var fin=$("#finishdate").val();
						if (inicio == '' || fin == ''){
							alert('Introduzca las fechas para buscar');
							return 0;
						}
						$("#nuevos-afiliados").show();
						$.ajax({
					         type: "post",
					         data: {inicio : inicio, fin : fin},
					         url: "reporte_compras_afiliados_todos",
							success: function( msg )
							{
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
						    	$("div.toolbar").html('<div class="text-right"><img src="" alt="" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
						    	   
							    // Apply the filter
							    $("#datatable_fixed_column1 thead th input[type=text]").on( 'keyup change', function () {
							    	
							        otable
							            .column( $(this).parent().index()+':visible' )
							            .search( this.value )
							            .draw();

							       
							    } );
							    $("#well-print-usr").hide();
								$("#row-print-usr").hide();
								$("#well-print-red").hide();
								$("#row-print-red").hide();
								$("#well-print-web").hide();
								$("#row-print-web").hide();
							    $("#well-print-af").show();
								$("#row-print-af").show();
								
						    // custom toolbar
								 var obj = '<a onclick="reporte_excel()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12 " ><i class="fa fa-print"></i>&nbsp;Crear excel</a>'
										$("#remplazar").html(obj);
										$("#row-print-red").show();
							}
						});
						
						break;

					case '8':
						var inicio=$("#startdate").val();
						var fin=$("#finishdate").val();
						if (inicio == '' || fin == ''){
							alert('Introduzca las fechas para buscar');
							return 0;
						}
						$("#nuevos-afiliados").show();
						$.ajax({
					         type: "post",
					         data: {inicio : inicio, fin : fin},
					         url: "reporte_compras_personales",
							success: function( msg )
							{
								$("#reporte_div").html(msg);
								var responsiveHelper_dt_basic = undefined;
								var responsiveHelper_datatable_fixed_column = undefined;
								var responsiveHelper_datatable_col_reorder = undefined;
								var responsiveHelper_datatable_tabletools = undefined;
								
								var breakpointDefinition = {
									tablet : 1024,
									phone : 480
								};
											var otable = $('#dt_basic').DataTable({
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
						    	$("div.toolbar").html('<div class="text-right"><img src="" alt="" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
						    	   
							   
							    $("#well-print-usr").hide();
								$("#row-print-usr").hide();
								$("#well-print-red").hide();
								$("#row-print-red").hide();
								$("#well-print-web").hide();
								$("#row-print-web").hide();
							    $("#well-print-af").show();
								$("#row-print-af").show();
								
						    // custom toolbar
								 var obj = '<a onclick="reporte_excel()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12 " ><i class="fa fa-print"></i>&nbsp;Crear excel</a>'
										$("#remplazar").html(obj);
										$("#row-print-red").show();
							}
						});
						
						break;
						
					default:
						break;
				}

			
			});

		function ReportePagoBancoExcel(){
			var inicio=$("#startdate").val();
			var fin=$("#finishdate").val();
			if (inicio == '' || fin == ''){
				alert('Introduzca las fechas para buscar');
				return 0;
			}
			window.location="/ov/compras/reporte_pagos_banco_excel?inicio="+inicio+"&&fin="+fin
		}

		function reporte_excel(){
			
			var inicio=$("#startdate").val();
			var fin=$("#finishdate").val();
			
			switch($("#tipo-reporte").val()){
				
			case "1" :{
				window.location="/ov/compras/reporte_afiliados_todos_excel";
			}
			break;
			case "7" :{
				window.location="/ov/compras/reporte_compras_afiliados_todos_excel?inicio="+inicio+"&fin="+fin;
			}
			break;
			case "8" :{
				window.location="/ov/compras/reporte_compras_personales_excel?inicio="+inicio+"&fin="+fin;
			}
			break;
			}
		}
		</script>
		<script>
			function reporte_excel_comprar_usr()
			{
				var inicio=$("#startdate").val();
						var fin=$("#finishdate").val();
						if(inicio=='')
						{
							alert('Introduzca fecha de inicio');
						}
						else
						{
							if(fin=='')
							{
								alert('Introduzca fecha de fin');
							}
							else
							{
								$("#nuevos_afiliados").show();
								var datos={'inicio':inicio,'fin':fin};
								$.ajax({
							         type: "get",
							         url: "reporte_compras_excel/"+inicio+fin,
								});
							}
						}	
			}

			function iniciarSpinner(){
				
				var opts = {
						  lines: 12 // The number of lines to draw
						, length: 28 // The length of each line
						, width: 14 // The line thickness
						, radius: 42 // The radius of the inner circle
						, scale: 1 // Scales overall size of the spinner
						, corners: 1 // Corner roundness (0..1)
						, color: '#3276B1' // #rgb or #rrggbb or array of colors
						, opacity: 0.25 // Opacity of the lines
						, rotate: 0 // The rotation offset
						, direction: 1 // 1: clockwise, -1: counterclockwise
						, speed: 1 // Rounds per second
						, trail: 60 // Afterglow percentage
						, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
						, zIndex: 2e9 // The z-index (defaults to 2000000000)
						, className: 'spinner' // The CSS class to assign to the spinner
						, top: '50%' // Top position relative to parent
						, left: '50%' // Left position relative to parent
						, shadow: false // Whether to render a shadow
						, hwaccel: true // Whether to use hardware acceleration
						, position: 'absolute' // Element positioning
						}
						
						var spinner = new Spinner(opts).spin(document.getElementById('spinner2'));
				}

			function FinalizarSpinner(){
				
				$("#spinner2").html('');
			}
		</script>
		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
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
		    $("div.toolbar").html('<div class="text-right"><img src="" alt="" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
		    	   
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