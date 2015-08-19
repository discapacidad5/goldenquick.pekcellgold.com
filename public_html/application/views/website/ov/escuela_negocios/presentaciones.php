<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script src="/template/js/plugin/bootbox/bootbox.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
<!-- PAGE RELATED PLUGIN(S) -->
		
		
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">
							<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a>
							<span>> 
								Presentaciones
							</span>
						</h1>
					</div>
				</div>
				
				<!-- widget grid -->
				<section id="widget-grid" class="">
				
					<!-- row -->
					<div class="row">
						<article class="col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-blueLight" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false">
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
									<div class="jarviswidget-ctrls" role="menu">   
										<a data-placement="bottom" title="" rel="tooltip" class="button-icon jarviswidget-toggle-btn" href="javascript:void(0);" data-original-title="Collapse">
											<i class="fa fa-minus "></i>
										</a> 
										<a data-placement="bottom" title="" rel="tooltip" class="button-icon jarviswidget-fullscreen-btn" href="javascript:void(0);" data-original-title="Fullscreen">
											<i class="fa fa-expand "></i>
										</a> 
										<a data-placement="bottom" title="" rel="tooltip" class="button-icon jarviswidget-delete-btn" href="javascript:void(0);" data-original-title="Delete">
											<i class="fa fa-times"></i>
										</a>
									</div>
									<span class="widget-icon"> <i class="fa fa-list-alt"></i> </span>
									<h2>Presentaciones</h2>
				
										
				
								</header>
				
								<!-- widget div-->
								<div>
								
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
										<!--<div class="widget-body-toolbar">
											
											<div class="row">
												
												<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
													<div class="input-group">
														<input type="text" placeholder="Nuevo grupo" id="prepend" class="form-control">
													</div>
												</div>
												<div class="col-xs-3 col-sm-7 col-md-7 col-lg-7 text-right">
													
													<button class="btn btn-success" id="anadir">
														<i class="fa fa-plus"></i> <span class="hidden-mobile">Crear</span>
													</button>
													
												</div>
												
											</div>
											
											

										</div>-->
										<div class="panel-group smart-accordion-default" id="accordion-2">
											<?php foreach ($grupos as $grupo) { ?>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion-2" href="#collapse-<?php echo $grupo->id; ?>" class="collapsed"> 
															<i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
															<?php echo $grupo->descripcion; ?>
														</a>
													</h4>
												</div>
												<div id="collapse-<?php echo $grupo->id; ?>" class="panel-collapse collapse">
													<div class="panel-body">
													
														<div class="row" style="vertical-align:middle;">
															<div class="col-lg-12 col-md-12 col-xs-12">
																<table id="dt_basic<?php echo $grupo->id; ?>" class="table table-striped table-bordered table-hover">
																	<thead>
																		<tr>
																			<th data-hide="phone">ID</th>
																			<th data-class="expand">Nombre</th>
																			<th data-hide="phone">Grupo</th>
																			<th data-hide="phone,tablet">Fecha</th>
																			<th data-hide="phone,tablet">Descripci&oacute;n</th>
																			<th></th>
																			
																		</tr>
																	</thead>
																	<tbody>
																		<?php foreach ($presentaciones as $presentacion)
																		{
																			if($presentacion->grupo == $grupo->id){ ?>
																			<tr>
																				<td><?php echo $presentacion->id; ?></td>
																				<td><?php echo $presentacion->n_publico; ?></td>
																				<td><?php echo $presentacion->grupo; ?></td>
																				<td><?php echo $presentacion->fecha; ?></td>
																				<td><?php echo html_entity_decode($presentacion->descripcion); ?></td>
																				<td style='text-align:center;'>
																						<a class='btn btn-success' href='<?php echo $presentacion->ruta; ?>'><i class='fa fa-download fa-lg fa-3x'></i></a>
																					
																				</td>
																			</tr>
																		<?php }
																		} ?>
																		
																	</tbody>
																</table>
																<script type="text/javascript">
																
																

																/* BASIC ;*/
																var responsiveHelper_dt_basic = undefined;
																var responsiveHelper_datatable_fixed_column = undefined;
																var responsiveHelper_datatable_col_reorder = undefined;
																var responsiveHelper_datatable_tabletools = undefined;
																
																var breakpointDefinition = {
																	tablet : 1024,
																	phone : 480
																};
													
																$('#dt_basic<?php echo $grupo->id; ?>').dataTable({
																	"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
																		"t"+
																		"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
																	"autoWidth" : true,
																	"preDrawCallback" : function() {
																		// Initialize the responsive datatables helper once.
																		if (!responsiveHelper_dt_basic) {
																			responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic<?php echo $grupo->id; ?>'), breakpointDefinition);
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

																$("#dt_basic_filter").children('label').addClass("");
																	
																													
																</script>
															</div>
														</div>
													</div>
												</div>
											</div>
															
											<?php } ?>
										</div>
				
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
				
				</section>
				<!-- end widget grid -->

			
			<!-- END MAIN CONTENT -->
			<div class="row">         
         <!-- a blank row to get started -->
	    	<div class="col-sm-12">
	        	<br />
	        	<br />
	        </div>
        </div>
		<!-- PAGE RELATED PLUGIN(S) -->
		</div>
		
		<!-- Scripts de la imaginacion chevre del autor de la pagina-->
			<script type="text/javascript">
 		$(document).ready(function() {
				
				// DO NOT REMOVE : GLOBAL FUNCTIONS!
				pageSetUp();

				

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

				$("#dt_basic_filter").children('label').addClass("");
					});

		</script>