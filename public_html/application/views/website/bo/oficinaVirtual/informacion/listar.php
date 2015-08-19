			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/oficinaVirtual/"> Oficina Virtual</a> > <a href="/bo/oficinaVirtual/informacion"> Informacion</a> > Listar
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
					<div class="row">
					
						
									<section id="widget-grid" class="">
				
										<!-- row -->
										<div class="row">
											<div class="row col-xs-12 col-md-6 col-sm-4 col-lg-5 pull-right">
											<div class="col-xs-2 col-md-4 col-sm-4 col-lg-2">
												<center>
												<a title='Eliminar' class="txt-color-red"><i class="fa fa-trash-o fa-3x"></i></a>
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
													<a title="Activar" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
													<br>Activar
												</center>
											</div>
											<div class="col-xs-2 col-md-4 col-sm-4 col-lg-2">
												<center>
													<a title="Desactivar" class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
													<br>Desactivar
												</center>
											</div>
										</div>
											<!-- NEW WIDGET START -->
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
												<div style="padding-left: 30px; padding-right: 30px;">
													<header>
														
														<h2><span class="widget-icon"> <i class="fa fa-table"></i> </span>Informaci&oacute;n</h2>
									
													</header>
									
													<!-- widget div-->
													<div>
									
														<div >
									
															<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
																<thead>
																	<tr>
																		<th data-hide="phone">ID</th>
																		<th>Imagen</th>
																		<th data-class="expand">Nombre</th>
																		<th data-hide="phone,tablet">Usuario</th>
																		<th data-hide="phone,tablet">Fecha</th>
																		<th data-hide="phone">Descripci&oacute;n</th>
																		<th>Acciones</th>								
																	</tr>
																</thead>
																<tbody>
																	<?php for($i=0;$i<sizeof($infos);$i++)
																	{
																		$texto=json_encode(html_entity_decode($infos[$i]->descripcion));
																		$texto=trim($texto);
																		echo 
																		"<tr>
																			<td style='text-align:center; vertical-align: middle;'>".$infos[$i]->id."</td>
																			<td style='text-align:center; vertical-align: middle;' class='no-padding'>
																				<img src='".$infos[$i]->ruta."' style='width: 10rem; height: 10rem;'>
																			</td>
																			<td style='text-align:center; vertical-align: middle;'>".$infos[$i]->nombre."</td>
																			<td style='text-align:center; vertical-align: middle;'>".$infos[$i]->usuario."</td>
																			<td style='text-align:center; vertical-align: middle;'>".$infos[$i]->fecha."</td>
																			<td style='vertical-align: middle;'>".substr($infos[$i]->descripcion, 0, 100)."...
																				<a style='cursor: pointer;' href='ver_informacion?id=".$infos[$i]->id."'>ver mas</a></p>
																				
																			</td>
																			
																			<td class='text-center'>
																				
																				<a class='txt-color-red' style='cursor: pointer;' onclick='delete_info(".$infos[$i]->id.")' title='Eliminar'><i class='fa fa-trash-o fa-3x'></i></a>
																				<a class='txt-color-blue'  style='cursor: pointer;' onclick='editar(".$infos[$i]->id.")'  title='Editar'><i class='fa fa-pencil fa-3x'></i></a>";
                												if ($infos[$i]->status=='ACT'){
	                												echo '&nbsp;&nbsp;&nbsp;<a class="txt-color-green"  style="cursor: pointer;" onclick="estado_informacion('."'DES'".','.$infos[$i]->id.')"  title="Desactivar"><i class="fa fa-check-square-o fa-3x"></i></a>';
                												}
                												else echo '&nbsp;&nbsp;&nbsp;<a class="txt-color-green"  style="cursor: pointer;" onclick="estado_informacion('."'ACT'".','.$infos[$i]->id.')"  title="Activar"><i class="fa fa-square-o fa-3x"></i></a>';
																		"
																			</td>
																		</tr>";
																	} ?>
																</tbody>
															</table>
									
														</div>
														<!-- end widget content -->
									
													</div>
													<!-- end widget div -->
												</div>
												<!-- end widget -->
									
											</article>
											
											
											<!-- WIDGET END -->
									
										</div>
									
									</section>
									
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
		
		function estado_informacion(estatus, id)
		{		
			var datos={'id':id,'estado':estatus};
			$.ajax({
				type: "post",
				url: "estado_informacion",
				data:{info:JSON.stringify(datos)}
				}).done(function( msg )
						{
							location.href = "/bo/informacion/listar";
						
					});
		}

		function delete_info(id)
		{
			$.ajax({
				type: "POST",
				url: "/auth/show_dialog",
				data: {message: '¿ Esta seguro que desea Eliminar la información ?'},
			})
			.done(function( msg )
			{
				bootbox.dialog({
				message: msg,
				title: 'Eliminar Información',
				buttons: {
					success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {
							$.ajax({
								type: "GET",
								url: "borrar_informacion",
								data:'id='+id
							})
							.done(function( msg )
							{
								bootbox.dialog({
								message: "Se ha eliminado la Información.",
								title: 'Felicitaciones',
								buttons: {
									success: {
									label: "Aceptar",
									className: "btn-success",
									callback: function() {
										location.href="/bo/informacion/listar";
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

		function vermas_info(id)
		{
			$.ajax({
				type: "POST",
				url: "ver_informacion",
				data: {id:id}
			})
			.done(function( msg )
			{
				bootbox.dialog({
					//closeButton: false,
				message: msg,
				title: 'Información',
			})//fin done ajax
			});//Fin callback bootbox
		}

		function editar(id)
		{
			
			$.ajax({
				type: "POST",
				url: "get_informacion",
				data: {id:id}
			})
			.done(function( msg )
			{
				bootbox.dialog({
					//closeButton: false,
				message: msg,
				title: 'Modificar Información',
			})//fin done ajax
			});//Fin callback bootbox

		}
		</script>