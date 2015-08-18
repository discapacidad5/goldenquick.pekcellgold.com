			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a> 
							<span>>
								<a href="/bo/oficinaVirtual/"> Oficina Virtual</a> > <a href="/bo/oficinaVirtual/presentaciones"> Presentaciones</a> > Listar
							</span>
						</h1>
					</div>
				</div>
				<?php if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Error </strong> '.$this->session->flashdata('error').'
			</div>'; 
	}
?>	
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false"
          data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-sortable="false"
          data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false">
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body no-padding smart-form">
                <fieldset>
                  <div class="contenidoBotones">
                  
	                  
	                  <div class="row col-xs-12 col-md-6 col-sm-4 col-lg-5 pull-right">
							<div class="col-xs-2 col-md-4 col-sm-4 col-lg-2">
								<center>
								<a title='Descargar' class="txt-color-blue"><i class="fa fa-download fa-3x"></i></a>
								<br>Descargar
								</center>
							</div>
							<div class="col-xs-2 col-md-4 col-sm-4 col-lg-2">
							<center>	
								<a title="Eliminar" class="txt-color-red"><i class="fa fa-trash-o fa-3x"></i></a>
								<br>Eliminar
								</center>
							</div>
							<div class="col-xs-2 col-md-4 col-sm-4 col-lg-2">
								<center>
									<a title="Editar" class="txt-color-blue"><i class="fa fa-pencil fa-3x"></i></a>
									<br>Editar
								</center>
							</div>
							<div class="col-xs-2 col-md-4 col-sm-4 col-lg-2">
								<center>
									<a title="Activado" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
									<br>Activado
								</center>
							</div>
							<div class="col-xs-2 col-md-4 col-sm-4 col-lg-2">
								<center>
									<a title="Desactivado" class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
									<br>Desactivado
								</center>
							</div>
					</div>
				
										<div class="row">
								<div class="tab-pane fade in active" id="s1">
									<section id="widget-grid" class="">
				
										<!-- row -->
										<div class="row">
									
											<!-- NEW WIDGET START -->
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												
												<!-- Widget ID (each widget will need unique ID)-->
												<div   data-widget-editbutton="false" style="padding-left: 50px; padding-right: 70px;">
													
													<header>
														<h2>Presentaciones</h2>
													</header>
													
															<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%" >
																<thead>
																	<tr>
																		<th data-hide="phone">ID</th>
																		<th data-class="expand">Nombre</th>
																		<th>Usuario</th>
																		<th data-hide="phone">Grupo</th>
																		<th data-hide="phone,tablet">Fecha</th>
																		<th data-hide="phone,tablet">Descripci&oacute;n</th>
																		<th>Acciones</th>
																		
																	</tr>
																</thead>
																<tbody>
																	
																	<?php foreach ($presentaciones as $presentacion)
																	{
																		echo 
																		'<tr>
																			<td>'.$presentacion->id.'</td>
																			<td>'.$presentacion->n_publico.'</td>
																			<td>'.$presentacion->nombreUsuario.' '.$presentacion->apellidoUsuario.'</td>
																			<td>'.$presentacion->grupo.'</td>
																			<td>'.$presentacion->fecha.'</td>
																			<td>'.html_entity_decode($presentacion->descripcion).'</td>
																			
																			<td class="text-center">
																				<a class="txt-color-blue" style="cursor: pointer;" onclick="" href="'.$presentacion->ruta.'" title="Descargar"><i class="fa fa-download fa-3x"></i></a>
																				<a class="txt-color-red" style="cursor: pointer;" onclick="delete_file('.$presentacion->id.',\''.$presentacion->ruta.'\')" title="Eliminar"><i class="fa fa-trash-o fa-3x"></i></a>
																				<a class="txt-color-blue" style="cursor: pointer;" onclick="editar('.$presentacion->id.')"  title="Editar"><i class="fa fa-pencil fa-3x"></i></a>
          																		';
																				 if ($presentacion->status=='ACT'){?>
																				
          																			<a class="txt-color-green" style="cursor: pointer;" onclick="estado_presentacion('DES','<?php echo $presentacion->id; ?>')" title="Desactivar"><i class="fa fa-check-square-o fa-3x"></i></a>
																			<?php }
																			else {?>
																				<a class="txt-color-green" style="cursor: pointer;" onclick="estado_presentacion('ACT','<?php echo $presentacion->id; ?>')" title="Activar"><i class="fa fa-square-o fa-3x"></i></a>
																				<?php }?>
          																
																			</td>
																		</tr>
																<?php	} ?>
																	
																</tbody>
															</table>
									
														
														<!-- end widget content -->
									
													
													<!-- end widget div -->
												</div>
												<!-- end widget -->
									
											</article>
									
										</div>
									
									</section>
								</div>
										 </div>
									</div>
								</fieldset>
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
			</div>
			<!-- END MAIN CONTENT -->
<style>
.link
{
	margin: 0.5rem;
}
.minh
{
	padding: 50px;
}
.link a:hover
{
	text-decoration: none !important;
}
</style>

		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script src="/template/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
		<script src="/template/js/plugin/bootbox/bootbox.min.js"></script>
		<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
		<script src="/template/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
		<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
		<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
		
<script type="text/javascript">

																	
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

		function delete_file(id,file) {
			
			$.ajax({
				type: "POST",
				url: "/auth/show_dialog",
				data: {message: '¿ Esta seguro que desea Eliminar la presentacion ?'},
			})
			.done(function( msg )
			{
				bootbox.dialog({
				message: msg,
				title: 'Eliminar Presentacion',
				buttons: {
					success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {
							var datos={'id':id,'file':file};
							$.ajax({
								type: "GET",
								url: "borrar_archivo",
								data:{info:JSON.stringify(datos)}
							})
							.done(function( msg )
							{
								bootbox.dialog({
								message: "Se ha eliminado la Presentacion.",
								title: 'Felicitaciones',
								buttons: {
									success: {
									label: "Aceptar",
									className: "btn-success",
									callback: function() {
										location.href="/bo/presentaciones/listar";
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

		function estado_presentacion(estatus, id)
		{		
			var datos={'id':id,'estado':estatus};
			$.ajax({
				type: "post",
				url: "estado_presentacion",
				data:{info:JSON.stringify(datos)}
				}).done(function( msg )
						{
							location.href = "/bo/presentaciones/listar";
						
					});
		}
		
		function editar(id)
		{
			
			$.ajax({
				type: "POST",
				url: "get_presentacion",
				data: {id:id},
			})
			.done(function( msg )
			{
				bootbox.dialog({
					//closeButton: false,
				message: msg,
				title: 'Modificar Presentacion',
			})//fin done ajax
			});//Fin callback bootbox

		}	
</script>