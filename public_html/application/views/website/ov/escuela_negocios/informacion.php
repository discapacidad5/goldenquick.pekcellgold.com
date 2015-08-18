<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">
							<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a> 
							<span>> 
								Informaci&oacute;n
							</span>
						</h1>
					</div>
				</div>
				
				<!-- widget grid -->
				<section id="widget-grid" class="">
				
					<!-- row -->
					<div class="row">
				
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
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
									<h2>Información</h2>
				
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
				
										<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
											<thead>
												<tr>
													<th data-hide="phone">ID</th>
													<th data-class="expand">Nombre</th>
													<th data-hide="phone,tablet">Fecha</th>
													<th data-hide="phone,tablet">Descripci&oacute;n</th>
													
												</tr>
											</thead>
											<tbody>
												<?php for($i=0;$i<sizeof($infos);$i++)
												{
													$texto=json_encode(html_entity_decode($infos[$i]->descripcion));
														$texto=trim($texto);
													echo 
													"<tr>
														<td style='text-align:center; vertical-align: middle;'>".($i+1)."</td>
														<td style='text-align:center; vertical-align: middle;'>".$infos[$i]->nombre."</td>
														<td style='text-align:center; vertical-align: middle;'>".$infos[$i]->fecha."</td>
														<td style='vertical-align: middle;'>".substr($infos[$i]->descripcion, 0, 100)."...
															<a href='ver_informacion?id=".$infos[$i]->id."' >ver mas</a></p>
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
				
					</div>
				
				</section>
				<!-- end widget grid -->

			</div>
			<!-- END MAIN CONTENT -->
		<div class="row">         
         <!-- a blank row to get started -->
	    	<div class="col-sm-12">
	        	<br />
	        	<br />
	        </div>
        </div>

		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script src="/template/js/plugin/bootbox/bootbox.min.js"></script>
		<script type="text/javascript">
			function vermas(texto,date,titulo)
			{
				var mensaje='<table class="table table-striped table-forum">'
								+'<thead>'
									+'<tr>'
										+'<th >Contenido</th>'
										+'<th class="text-center hidden-xs hidden-sm" style="width: 100px;">Imagen</th>'
									+'</tr>'
								+'<\/thead>'
								+'<tbody>'
									+'<tr>'
										+'<td class="text-center">'+texto+'</td>'	
										+'<td class="text-center"><img src = '+date+' style="max-height:90px"></td>'					
								+'<\/tbody>'
							+'<\/table>';
				bootbox.dialog({
					message: mensaje,
					title: ""+titulo+"",
					
				});
			}
			
		</script>