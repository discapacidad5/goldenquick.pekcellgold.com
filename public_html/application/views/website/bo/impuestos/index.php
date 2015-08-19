
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
							<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/configuracion/">Configuracion</a> > 
								<a href="/bo/configuracion/impuestos"> Impuestos</a>
								> Listar Impuestos
							</span>
						</h1>
		</div>
	</div>
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false"	>


					<!-- widget div-->
					<div>
						
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							
						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body">
							<div class="tab-pane">
							
									<div class="row col-xs-12 col-md-6 col-sm-4 col-lg-3 pull-right">
										<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
											<center>
											<a title="Editar" style="cursor: pointer;" class="txt-color-blue"><i class="fa fa-pencil fa-3x"></i></a>
											<br>Editar
											</center>
										</div>
										<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
										<center>	
											<a title="Eliminar" style="cursor: pointer;" class="txt-color-red"><i class="fa fa-trash-o fa-3x"></i></a>
											<br>Eliminar
											</center>
										</div>
										<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
										<center>	
											<a title="Desactivar" style="cursor: pointer;" class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
											<br>Desactivado
											</center>
										</div>
										<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
											<center>
												<a title="Activar" style="cursor: pointer;" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
												<br>Activado
											</center>
										</div>
									</div>
						
										
									
									<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
											<thead>			                
												<tr>
													<th>ID</th>
													<th data-class="expand">Nombre</th>
													<th data-hide="phone,tablet">Porcentaje</th>
													<th data-hide="phone,tablet">Pais</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												
												<?foreach ($impuestos as $impuesto) {?>
													<tr>
														<td><?php echo $impuesto->id_impuesto; ?></td>
														<td><?php echo $impuesto->descripcion; ?></td>
														<td><?php echo $impuesto->porcentaje; ?> %</td>
														<td>
															<img class="flag flag-<?php echo strtolower($impuesto->Code2); ?>" >
															<?php echo $impuesto->Name; ?>
														</td>
														<td>
															<a title="Editar" style="cursor: pointer;" class="txt-color-blue" onclick="editar('<?php echo $impuesto->id_impuesto; ?>');"><i class="fa fa-pencil fa-3x"></i></a>
															<a title="Eliminar" style="cursor: pointer;" class="txt-color-red" onclick="eliminar('<?php echo $impuesto->id_impuesto; ?>');"><i class="fa fa-trash-o fa-3x"></i></a>
															<?php if($impuesto->estatus == 'ACT'){ ?>
																<a title="Desactivar" style="cursor: pointer;" onclick="estado('DES','<?php echo $impuesto->id_impuesto; ?>')" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
															<?php } else {?>
																<a title="Activar" style="cursor: pointer;" onclick="estado('ACT','<?php echo $impuesto->id_impuesto; ?>')" class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
															<?php } ?>
														</td>
													</tr>
												<?}?>
											</tbody>
										</table>
								</div>
								
							</div>
						</div>
						<!-- end widget content -->
						
					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->
			</article>
			<!-- END COL -->
		</div>
		<div class="row">         
	        <!-- a blank row to get started -->
	        <div class="col-sm-12">
	            <br />
	            <br />
	        </div>
        </div>            
		<!-- END ROW -->
	</section>
	<!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->
	<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
	<script src="/template/js/plugin/markdown/markdown.min.js"></script>
	<script src="/template/js/plugin/markdown/to-markdown.min.js"></script>
	<script src="/template/js/plugin/markdown/bootstrap-markdown.min.js"></script>
	<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
	<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
	<script src="/template/js/validacion.js"></script>
	<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {
	
	$("#mymarkdown").markdown({
					autofocus:false,
					savable:false
				})


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

	/* BASIC ;*/
		var responsiveHelper_dt_basic = undefined;
		var responsiveHelper_datatable_fixed_column = undefined;
		var responsiveHelper_datatable_col_reorder = undefined;
		var responsiveHelper_datatable_tabletools = undefined;
		
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};

		$('#dt_basic_paquete').dataTable({
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

	pageSetUp();

})

function editar(id){
	$.ajax({
		type: "POST",
		url: "/bo/configuracion/editar_impuesto",
		data: {
			id: id
			}
		
	})
	.done(function( msg ) {
		bootbox.dialog({
			message: msg,
			title: 'Modificar Impuesto',
				});
	});//fin Done ajax
}

function eliminar(id) {

		$.ajax({
			type: "POST",
			url: "/auth/show_dialog",
			data: {message: '¿ Esta seguro que desea Eliminar el impuesto ?'},
		})
		.done(function( msg )
		{
			bootbox.dialog({
			message: msg,
			title: 'Eliminar Impuesto',
			buttons: {
				success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {

						$.ajax({
							type: "POST",
							url: "/bo/admin/kill_impuesto",
							data: {id: id}
						})
						.done(function( msg )
						{
							bootbox.dialog({
							message: "Se ha eliminado el impuesto.",
							title: 'Felicitaciones',
							buttons: {
								success: {
								label: "Aceptar",
								className: "btn-success",
								callback: function() {
									location.href="/bo/configuracion/listar_impuestos";
									}
								}
							}
						})//fin done ajax
						});//Fin callback bootbox

					}
				},
					danger: {
					label: "Cancelar!",
					className: "btn-danger",
					callback: function() {

						}
				}
			}
		})
		});
}

function estado(estatus, id)
{
		
	$.ajax({
		type: "POST",
		url: "/bo/configuracion/cambiar_estado_impuesto",
		data: {
			id:id, 
			estado: estatus
		},
		}).done(function( msg )
				{
					location.href = "/bo/configuracion/listar_impuestos";
				
			})
	}
</script>