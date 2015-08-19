
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a> <span>>
					<a href="/bo/oficinaVirtual/"> Oficina Virtual</a> > <a
					href="/bo/oficinaVirtual/encuestas"> Encuestas</a> > Listar
				</span>
			</h1>
		</div>
	</div>
	<section id="widget-grid">
		<!-- START ROW -->
		<div class="container row">
			<!-- NEW COL START -->
			<article class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1"
					data-widget-colorbutton="false" data-widget-editbutton="false"
					data-widget-togglebutton="false" data-widget-deletebutton="false"
					data-widget-sortable="false" data-widget-fullscreenbutton="false"
					data-widget-custombutton="false" data-widget-collapsed="false">
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						
						<div class="widget-body col-xs-12 col-md-12 col-sm-12 col-lg-12">
							
							<div class="row col-xs-12 col-md-12 col-sm-8 col-lg-4 pull-right">
								
								<div class="col-xs-6 col-md-2 col-sm-2 col-lg-2">
									<center>
										<a title="Editar" href="#" class="txt-color-blue"><i
												class="fa fa-pencil fa-3x"></i></a> <br>Editar
									</center>
								</div>
								<div class="col-xs-6 col-md-2 col-sm-2 col-lg-2">
									<center>
										<a title="Eliminar" href="#" class="txt-color-red"><i
											class="fa fa-trash-o fa-3x"></i></a> <br>Eliminar
									</center>
								</div>
								<div class="col-xs-6 col-md-2 col-sm-2 col-lg-2">
									<center>
										<a title="Desactivar" href="#" class="txt-color-green"><i
											class="fa fa-square-o fa-3x"></i></a> <br>Desactivado
									</center>
								</div>
								<div class="col-xs-6 col-md-2 col-sm-2 col-lg-2">
									<center>
										<a title="Activar" href="#" class="txt-color-green"><i
											class="fa fa-check-square-o fa-3x"></i></a> <br>Activado
									</center>
								</div>
							</div>
							
								
										<!-- MAIN CONTENT -->
										<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">

											<table  id="dt_basic" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th data-class="expand">Nombre</th>
														<th data-hide="phone">Descripcion</th>
														<th data-hide="phone">Usuario</th>
														<th data-hide="phone, tablet">Fecha de creacion</th>
														<th data-hide="phone, tablet">Veces que se ha contestado</th>
														<th data-hide="phone">Aciones</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($encuestas as $encuesta) { ?>
														<tr>
															<td>
																<h4>
																	<i class="fa fa-file-text-o text-muted"></i> <?php echo $encuesta->nombre; ?>
																</h4>
															</td>
															<td>
																<?php echo $encuesta->descripcion; ?>
															</td>
															<td>
																<?php echo $encuesta->username; ?>
															</td>
															<td>
																<?php echo $encuesta->fecha_creacion; ?>
															</td>
															<td>
																<?php echo $encuesta->veces; ?>
															</td>
															<td>
																<a class="txt-color-red" style="cursor: pointer;" onclick="delete_encuesta(<?php echo $encuesta->id_encuesta ?>)" title="Eliminar"><i class="fa fa-trash-o fa-3x"></i></a>
																<a class="txt-color-blue" style="cursor: pointer;" onclick="editar(<?php echo $encuesta->id_encuesta; ?>)"  title="Editar"><i class="fa fa-pencil fa-3x"></i></a>
																<?php if ($encuesta->estatus == 'DES') { ?>
																	<a class="txt-color-green" style="cursor: pointer;" onclick="estatus_encuesta(1,'<?php echo $encuesta->id_encuesta ?>')"  title="Activar"><i class="fa fa-square-o fa-3x"></i></a>
																<?php } else { ?>
																	<a class="txt-color-green" style="cursor: pointer;" onclick="estatus_encuesta(2,'<?php echo $encuesta->id_encuesta; ?>')"  title="Desactivar"><i class="fa fa-check-square-o fa-3x"></i></a>
																<?php } ?>
															</td>
														</tr>
														<?php }	?>
												</tbody>
											</table>

										</div>
								<!-- end widget -->
							
						</div>
					</div>
				</div>
			</article>


			<!-- END COL -->
		</div>
		<div class="row">
			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<br /> <br />
			</div>
		</div>
		<!-- END ROW -->
	</section>
	<!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->
<!-- PAGE RELATED PLUGIN(S) -->


<div class="row">
	<!-- a blank row to get started -->
	<div class="col-sm-12">
		<br /> <br />
	</div>
</div>


<!-- END MAIN CONTENT -->
<style>
.link {
	margin: 0.5rem;
}

.minh {
	padding: 50px;
}

.link a:hover {
	text-decoration: none !important;
}
</style>

<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
<script
	src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script
	src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
<script
	src="/template/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
<script src="/template/js/plugin/bootbox/bootbox.min.js"></script>
<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
<script
	src="/template/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script type="text/javascript">
			
			function estatus_encuesta(tipo,id)
			{
				if (tipo==1){
					bootbox.dialog({
						message: "¿Seguro que desea dar de alta esta encuesta?",
						title: "Activar",
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
									
									var datos={'tipo':'ACT','id':id};
									$.ajax({
										data:{info:JSON.stringify(datos)},
								        type: "get",
								        url: "estado_encuesta",
								        success: function(){
								             alert('Se ha activado la encuesta');
								             location.reload();
								        }
									});
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
				}
				else
				{
					bootbox.dialog({
						message: "¿Seguro que desea desactivar esta encuesta?",
						title: "Descativar",
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
									var datos={'tipo':'DES','id':id};
									$.ajax({
										data:{info:JSON.stringify(datos)},
								        type: "get",
								        url: "estado_encuesta",
								        success: function(){
								             alert('Se ha desactivado la encuesta');
								             location.reload();
								        }
									});
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
				}
			}

			function delete_encuesta(id)
			{
				bootbox.dialog({
					message: "<p class='text-center'>¿Seguro que desea eliminar esta encuesta?<br> Se eliminara todo el historial de esta</p>",
					title: "Eliminar Encuesta",
					buttons: {
						success: {
						label: "Aceptar",
						className: "btn-success",
						callback: function() {
							$.ajax({
								data:'id='+id,
						        type: "get",
						        url: "borrar_encuesta",
						        success: function(){
						        	bootbox.dialog({
										message: "La encuesta a sido eliminada.",
										title: 'Eliminar Encuesta',
										buttons: {
											success: {
											label: "Aceptar",
											className: "btn-success",
											callback: function(msg) {
												
												window.location.href="listar";
											}
										}
										}
									})
						             location.reload();
						        }
							})
							}
						}, danger: {
							label: "Cancelar!",
							className: "btn-danger",
							callback: function() {
								
								}
							}
					}
				})
			}

			function editar(id){
				
				$.ajax({
					type: "POST",
					url: "editar_encuesta",
					data: {
						id: id
						}
					
				})
				.done(function( msg ) {
					
					bootbox.dialog({
						message: msg,
						title: 'Modificar Encuesta',
							});
				});//fin Done ajax
			}
			
		
	

	</script>		
<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {

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
	

		</script>