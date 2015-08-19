
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-pencil-square-o"></i> 
					Reportes

			</h1>
		</div>
	</div>
	


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
											<option value="2">Compras personales</option>
											<option value="3">Ventas de la red</option>
											<option value="4">Ventas web personal</option>
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
						</form>
					</div>
			</div>
							<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-blueDark" id="nuevos-afiliados" data-widget-editbutton="false">
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
							<div class="widget-body no-padding">
				
								<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
									<thead id="tablacabeza">
										<th>ID</th>
										<th>Fecha de Registro</th>
										<th>Usuario</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Fecha de Nacimiento</th>
										<th>Sexo</th>
										<th>Estado Civil</th>
									</thead>
									<tbody id="tablacuerpo">
									</tbody>
								</table>
		
							</div>
						<!-- end widget content -->
		
						</div>
						<!-- end widget div -->
					</div>
					<!-- end widget -->
		
				</article>
				
				<!-- NEW WIDGET START -->
						<!-- WIDGET END -->
		


			</div>
		</div>
<!-- END MAIN CONTENT -->

<!-- PAGE RELATED PLUGIN(S) -->
		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

		<script type="text/javascript">
			$("#tipo-reporte").change(function()
			{
				if($("#tipo-reporte").val()==1)
				{
					$("#startdate").prop( "disabled", true );
					$("#finishdate").prop( "disabled", true );
				}
				else
				{
					$("#startdate").prop( "disabled", false);
					$("#finishdate").prop( "disabled", false );
				}
			});
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
						})
						.done(function( msg )
						{
							$("#tablacuerpo").html(msg);
						});
						break;
					case 2:
						break;
					case 3:
						break;
					case 4:
						break;
					default:
						break;
				}
				
			});
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
				$("#nuevos-afiliados").hide();
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
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}
			});
			
			$('#finishdate').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#startdate').datepicker('option', 'maxDate', selectedDate);
				}
			});
			/* END TABLETOOLS */
		
		})

		</script>