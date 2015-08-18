
			<!-- MAIN CONTENT -->
			<div id="content">

				<!-- row -->
				<div class="row">

					<!-- col -->
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-file-o"></i> Billetera</h1>
					</div>
					<!-- end col -->
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
						<ul id="sparks" class="">
							<li class="sparks-info">
								<h5> Mis ganancias <span class="txt-color-blue"><?=number_format($ganancias,2)?></span></h5>
							</li>
							<li class="sparks-info">
								<h5><span class="txt-color-blue"><a href="/ov/billetera/logout_billetera">Salir de billetera</a></span></h5>
							</li>
						</ul>
					</div>
				</div>
				<!-- end row -->

				<!-- row -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="well">

							<section id="widget-grid" class="">
							
								<!-- row -->
								<div class="row">
							
									<!-- NEW WIDGET START -->
									<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

										<!-- Widget ID (each widget will need unique ID)-->
										<div class="jarviswidget jarviswidget-color-purity" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="true">
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
												<span class="widget-icon"> </span>
												<h2>Billetera</h2>
							
											</header>
							
											<!-- widget div-->
											<div>
							
												<!-- widget edit box -->
												<div class="jarviswidget-editbox">
													<!-- This area used as dropdown edit box -->
												</div>
												<!-- end widget edit box -->
							
												<!-- widget content -->
												<div class="widget-body">
													<ul id="myTab1" class="nav nav-tabs bordered">
														<li class="active">
															<a href="#s1" data-toggle="tab">Gráfica</a>
														</li>
														<li>
															<a href="#s2" data-toggle="tab">Historial</a>
														</li>
														<li>
															<a href="#s3" data-toggle="tab">Pedir dinero</a>
														</li>
													</ul>
														<div id="myTabContent1" class="tab-content padding-10">
														<div class="tab-pane fade in active" id="s1">
															<div id="sales-graph" class="chart no-padding"></div>
														</div>
														<div class="tab-pane fade" id="s2">
															<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
																<thead>			                
																	<tr>
																		<th data-hide="phone,tablet"><i class="fa fa-fw fa-calendar txt-color-blue hidden-md hidden-sm hidden-xs"></i> Fecha</th>
																		<th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Monto</th>
																		<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Método de pago</th>
																	</tr>
																</thead>
																<tbody>
																	<?foreach ($datatable as $key)
																	{?>
																	<tr>
																		<td><?=$key->fecha?></td>
																		<td><?echo number_format($key->monto,2)?></td>
																		<td><?=$key->metodo?></td>
																	</tr>
																	<?}?>
																</tbody>
															</table>
														</div>
														<div class="tab-pane fade" id="s3">
															<form action="send_mail" method="post" id="contact-form1"  class="smart-form">
																<header>Usted dispone de: $<?=number_format($ganancias,2)?></header>
																<fieldset>
																	<section class="col col-4">
																		<label class="label">Método de pago</label>
																		<label class="select">
																			<select required name="metodo">
																			<?foreach ($metodo_cobro as $key)
																			{
																				echo '<option value="'.$key->id_metodo.'">'.$key->descripcion.'</option>';
																			}?>
																			</select>
																		</label>
																	</section>
																	<section class="col col-4">
																		<label class="label">Retenciones por método de pago</label>
																		<label class="input">
																			<input value="1" type="text" readonly />
																		</label>
																	</section>
																	<section class="col col-2">
																		<label class="label">Cobro mínimo </label>
																		<label class="input">
																			<input value="1" type="text" readonly />
																		</label>
																	</section>
																<section class="col col-2">
																	<label class="label">Cantidad por cobrar </label>
																	<label class="input">
																		<input name="cobro" type="text" />
																	</label>
																</section>
																</fieldset>	
																<footer>
																	<button type="button" onclick="cobrar()" class="btn btn-primary">
																		Cobrar
																	</button>
																</footer>
															</form>
														</div>
													</div>
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
					</div>
				<!-- row -->
				</div>
				<div class="row">
			        <div class="col-sm-12">
			            <br />
			            <br />
			        </div>
		        </div>
				<!-- end row -->

			</div>
			<!-- END MAIN CONTENT -->

		<!-- PAGE RELATED PLUGIN(S) 
		<!-- Morris Chart Dependencies -->
		<script src="/template/js/plugin/morris/raphael.min.js"></script>
		<script src="/template/js/plugin/morris/morris.min.js"></script>

		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

		<script type="text/javascript">
			// PAGE RELATED SCRIPTS

			/*
			 * Run all morris chart on this page
			 */
			$(document).ready(function() {
				
				// DO NOT REMOVE : GLOBAL FUNCTIONS!
				pageSetUp();

				if ($('#sales-graph').length) {

					Morris.Area({
						element : 'sales-graph',
						data : [
						<?foreach ($historial as $key) 
						{?>
							{
								period : '<?=$key->fecha?>',
								dinerillo : <?=$key->monto?>,
							},
						<?}?>
						],
						xkey : 'period',
						ykeys : ['dinerillo'],
						labels : ['Ganancias'],
						pointSize : 4,
						hideHover : 'auto'
					});
				}

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

			});

			//setup_flots();
			/* end flot charts */
	function cobrar()
	{
		$.ajax({
		type: "POST",
		url: "/ov/billetera/cobrar",
		data: $('#contact-form1').serialize()
		})
		.done(function( msg ) {

			bootbox.dialog({
			message: "Tu cobro se esta procesando",
			title: "Cobro",
			buttons: {
				success: {
				label: "Ok!",
				className: "btn-success",
				callback: function() {
					location.href='';
					}
				}
			}
		});

		});
	}
	</script>