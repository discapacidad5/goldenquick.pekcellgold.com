
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a> 
				<span>
					<a > </a> >	Web Personal
				</span>
			</h1>
		</div>
	</div>
	
	<?php if($this->session->flashdata('success')) {
		echo '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Exito! </strong> '.$this->session->flashdata('success').'
			</div>'; 
	}
?>	 
	
	<section id="widget-grid" class="" >
		<!-- START ROW -->
		<div class="row col-xs-12 col-md-12 col-sm-8 col-lg-6" style="padding-left: 0%;">
			<!-- NEW COL START -->
			
			
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1"
					data-widget-editbutton="false" data-widget-custombutton="false"
					data-widget-colorbutton="false">


					<!-- widget div-->


					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->
					<!-- widget content -->
					<div class="widget-body">
						<div class="tab-pane">
							<form class="smart-form" action="/ov/cgeneral/actualizar_clave_web_personal" method="POST" role="form">
							<div class="row col-xs-12 col-md-12 col-sm-8 col-lg-12 smart-form">
								<br>
									<section class="col col-xs-12 col-md-12 col-sm-8 col-lg-4" style="margin-top: 2rem;">
									
										<label > Clave de mi Web Personal 
										</label>
									</section>
									
									<section class="col col-xs-12 col-md-12 col-sm-8 col-lg-4" style="margin-top: 0.5rem;">
									
										<label class="input"> <i class="icon-append fa fa-briefcase"></i>
											<input name="clave" placeholder="Escribe tu clave" type="text" value='<?php $vacio=0; if(!isset($datos_web_personal[0]->clave)){echo "";$vacio=$vacio+1;}else{echo $datos_web_personal[0]->clave;}?>'>
										</label>
										
										<label class="input">
											<input name="username" class="hide" type="text" value='<?php echo $username;?>'>
										</label>
										<label class="input">
											<input name="vacio" class="hide" type="text" value='<?php echo $vacio;?>'>
										</label>
									</section>
									
									<section class="col col-xs-12 col-md-12 col-sm-8 col-lg-4">
										<button type="submit" class="btn btn-success col col-xs-12 col-md-12 col-sm-8 col-lg-12">
											Actualizar
										</button>
									</section>
									
							</div>
							<br>
							</form>
						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->
			</article>
		</div>
		
		<div class="row col-xs-12 col-md-12 col-sm-8 col-lg-6" style="padding-left: 0%;">
			<!-- NEW COL START -->
			
			
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1"
					data-widget-editbutton="false" data-widget-custombutton="false"
					data-widget-colorbutton="false">


					<!-- widget div-->


					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->
					<!-- widget content -->
					<div class="widget-body">
						<div class="tab-pane">
							<form class="smart-form" action="/ov/cgeneral/envia_mail_invitacion_web_personal" method="POST" role="form">
							<div class="row col-xs-12 col-md-12 col-sm-8 col-lg-12 smart-form">
								<br>
									<section class="col col-xs-12 col-md-12 col-sm-8 col-lg-4" style="margin-top: 2rem;">
									
										<label > Invitar a un cliente 
										</label>
									</section>
									
									<section class="col col-xs-12 col-md-12 col-sm-8 col-lg-4" style="margin-top: 0.5rem;">
									
										<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
											<input name="email_receptor" placeholder="e-mail de tu cliente" type="email">
										</label>
									</section>
									
									<section class="col col-xs-12 col-md-12 col-sm-8 col-lg-4">
										<button type="submit" class="btn btn-success col col-xs-12 col-md-12 col-sm-8 col-lg-12">
											Invitar
										</button>
									</section>
									
							</div>
							<br>
							</form>
						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->
			</article>
		</div>
		
	</section>
	
	
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1"
					data-widget-editbutton="false" data-widget-custombutton="false"
					data-widget-colorbutton="false">


					<!-- widget div-->


					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->
					<!-- widget content -->
					<div class="widget-body">
						<div class="tab-pane">

							<div class="row col-xs-12 col-md-12 col-sm-8 col-lg-5 pull-right">
								<div class="col-xs-6 col-md-10 col-sm-10 col-lg-10">
								</div>
								<div class="col-xs-6 col-md-2 col-sm-2 col-lg-2">
									<center>
										<a title="Descargar" href="#" class="txt-color-blue">
										<i class='fa fa-download fa-3x'></i></a> <br>Descargar
									</center>
								</div>
							</div>
							<br>
							<table  id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th data-hide="phone">ID</th>
										<th data-class="expand">Nombre</th>
										<th data-hide="phone">Tipo</th>	
										<th data-hide="phone">Usuario</th>
										<th data-hide="phone,tablet">Grupo</th>
										<th data-hide="phone,tablet">Descripci&oacute;n</th>
										<th data-hide="phone,tablet">Fecha</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo "id"; ?></td>
										<td><?php echo "n_publico"; ?></td>
										<td><?php echo "tipo"; ?></td>
										<td><?php echo "usuario"; ?></td>
										<td><?php echo "grupo"; ?></td>
										<td><?php echo "descripcion"; ?></td>
										<td><?php echo "fecha"; ?></td>
										
									</tr>
								</tbody>
							</table>
						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->
			</article>
		</div>
		<!-- end widget -->

		<!-- END COL -->

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
<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
<script src="/template/js/plugin/markdown/markdown.min.js"></script>
<script src="/template/js/plugin/markdown/to-markdown.min.js"></script>
<script src="/template/js/plugin/markdown/bootstrap-markdown.min.js"></script>
<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
<script
	src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script
	src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
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
	
</script>