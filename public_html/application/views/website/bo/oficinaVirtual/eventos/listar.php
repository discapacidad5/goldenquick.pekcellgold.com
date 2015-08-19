
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/oficinaVirtual/"> Oficina Virtual</a> > <a href="/bo/oficinaVirtual/eventos"> Eventos</a> > Listar
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
											<a title="Editar" href="#" class="txt-color-blue"><i class="fa fa-pencil fa-3x"></i></a>
											<br>Editar
											</center>
										</div>
										<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
										<center>	
											<a title="Eliminar" href="#" class="txt-color-red"><i class="fa fa-trash-o fa-3x"></i></a>
											<br>Eliminar
											</center>
										</div>
										<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
										<center>	
											<a title="Desactivar" href="#" class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
											<br>Desactivado
											</center>
										</div>
										<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
											<center>
												<a title="Activar" href="#" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
												<br>Activado
											</center>
										</div>
									</div><br>
									<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<th data-hide="phone">ID</th>
											<th data-class="expand">Nombre</th>
											<th>Descripcion</th>
											<th data-hide="phone">Fecha inicio</th>
											<th>Fecha fin</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php for($i=0;$i<sizeof($eventos);$i++)
									{
										echo'
										<tr>
											<td>'.($i+1).'</td>
											<td>'.$eventos[$i]->nombre.'</td>
											<td>'.$eventos[$i]->descripcion.'</td>
											<td>'.$eventos[$i]->inicio.'</td>
											<td>'.$eventos[$i]->fin.'</td>
											<td class="text-center">
												<a class="txt-color-blue"  style="cursor: pointer;" onclick="editar_evento('.$eventos[$i]->id.')"  title="Editar"><i class="fa fa-pencil fa-3x"></i></a>									
												<a class="txt-color-red" style="cursor: pointer;" onclick="eliminar('.$eventos[$i]->id.')" title="Eliminar""><i class="fa fa-trash-o fa-3x"></i></a>
											';
											if($eventos[$i]->estatus == 'ACT'){ ?>
												<a style="cursor: pointer;"title="Desactivar" onclick="estado_evento('DES','<?php echo $eventos[$i]->id; ?>')" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
												<?php } else {?>
												<a style="cursor: pointer;" title="Activar" onclick="estado_evento('ACT','<?php echo $eventos[$i]->id; ?>')" class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
											<?php } ?>
			
											</td>
											
								<?php } ?>
										
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
	
	function estado_evento(estatus, id)
{		
	$.ajax({
		type: "POST",
		url: "/bo/eventos/cambiar_estado_evento",
		data: {
			id:id, 
			estado: estatus
		},
		}).done(function( msg )
				{
					location.href = "/bo/eventos/listar";
				
			})
	}

	function editar_evento(id){
		$.ajax({
			type: "POST",
			url: "/bo/eventos/editar_evento",
			data: {
				id: id
				}
			
		})
		.done(function( msg ) {
			bootbox.dialog({
				message: msg,
				title: 'Modificar Evento',
					});
		});//fin Done ajax
	}

	function eliminar(id) {

		$.ajax({
			type: "POST",
			url: "/auth/show_dialog",
			data: {message: '¿ Esta seguro que desea Eliminar el Evento ?'},
		})
		.done(function( msg )
		{
			bootbox.dialog({
			message: msg,
			title: 'Eliminar Evento',
			buttons: {
				success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {

						$.ajax({
							type: "POST",
							url: "/bo/eventos/kill_evento",
							data: {id: id}
						})
						.done(function( msg )
						{
							bootbox.dialog({
							message: "Se ha eliminado el Evento.",
							title: 'Felicitaciones',
							buttons: {
								success: {
								label: "Aceptar",
								className: "btn-success",
								callback: function() {
									location.href="/bo/eventos/listar";
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
</script>
