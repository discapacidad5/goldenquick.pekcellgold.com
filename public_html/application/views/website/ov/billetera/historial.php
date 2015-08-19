
			<!-- MAIN CONTENT -->
			<div id="content">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<h1 class="page-title txt-color-blueDark">
							<span>
							<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<a href="/ov/billetera2/index"> > Billetera</a>
							 > Historial</span>
							
						</h1>
					</div>
				</div>
				<!-- row -->
				<div class="row">

					
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
											
							
											<!-- widget div-->
											<div>
							
												<!-- widget edit box -->
												<div class="jarviswidget-editbox">
													<!-- This area used as dropdown edit box -->
												</div>
												<!-- end widget edit box -->
							
												<!-- widget content -->
												<div class="widget-body">
													<div id="myTabContent1" class="tab-content padding-10">
															<div class="col-lg-6 col-sm-6 col-md-12 col-xs-12">
																<label class="col-lg-6 col-sm-6 col-md-12 col-xs-12">Año
																	<select id="año" onChange="buscar()" class="form-control">
																		<option value="">-- Selecione Año --</option>
																	<? foreach ($años as $key) {?>
																			<option value="<?=$key->año?>"><?=$key->año?></option>
																	<?}?>
																	</select>
																</label>
																<label class="col-lg-6 col-sm-6 col-md-12 col-xs-12">Mes
																	<select id="mes" onChange="buscarmes()" class="form-control">
																		<option value="">-- Selecione Mes --</option>
																		<option value="01">Enero</option>
																		<option value="02">Febrero</option>
																		<option value="03">Marzo</option>
																		<option value="04">Abril</option>
																		<option value="05">Mayo</option>
																		<option value="06">Junio</option>
																		<option value="07">Julio</option>
																		<option value="08">Agosto</option>
																		<option value="09">Septiembre</option>
																		<option value="10">Octubre</option>
																		<option value="11">Noviembre</option>
																		<option value="12">Diciembre</option>
																	</select>
																</label>
															</div>
															<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
																<thead>			                
																	<tr>
																		<th data-hide="expand"><i class="fa fa-fw fa-calendar txt-color-blue hidden-md hidden-sm hidden-xs"></i> Fecha</th>
																		<th><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Monto</th>
																		<th data-hide="phone,tablet"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Método de pago</th>
																		<th data-hide="phone,tablet"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Titular Cuenta</th>
																		<th data-hide="phone,tablet"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> # Cuenta</th>
																		<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Banco</th>
																		<th data-hide="phone,tablet"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> CLABE</th>
																		<th>Estado</th>
																	</tr>
																</thead>
																<tbody>
																	<? foreach ($datatable as $key) {?>
																	<tr>
																		<td><?=$key->fecha?></td>
																		<td><?echo number_format($key->monto,2)?></td>
																		<td><?=$key->metodo?></td>
																		<td><?=$key->cuenta ?></td>
																		<td><?=$key->titular ?></td>
																		<td><?=$key->banco ?></td>
																		<td><?=$key->clabe ?></td>
																		<td><?=$key->estado ?></td>
																	</tr>
																	<?}?>
																</tbody>
															</table>
														
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
				$("#dt_basic_filter").children('label').addClass("hide");
	
			pageSetUp();

		})

			//setup_flots();
			/* end flot charts */
	function buscar(){
		var buscador = $("#dt_basic_filter").children('label').children("input");
		if(buscador.val() == "") 
			buscador.val($("#año").val());
		else{
			fecha = buscador.val();
			if(fecha.length <= 4)
				buscador.val($("#año").val());
			else{
				mes = fecha.substring(4, 7); 
				buscador.val($("#año").val()+mes);
				}
		}
		e = jQuery.Event("keyup");
		e.which = 13 //enter key
		jQuery('input').trigger(e);
		
	}

	function buscarmes(){
		var buscador = $("#dt_basic_filter").children('label').children("input");
		if(buscador.val() == "") 
			buscador.val($("#mes").val());
		else{
			año = buscador.val();
			if(año.length < 4 ){
				buscador.val($("#mes").val());
			}else if(año.length <= 4)
				buscador.val(año+"-"+$("#mes").val());
			else{
				año = año.substring(0, 4); 
				buscador.val(año+"-"+$("#mes").val());
				}
		}
		e = jQuery.Event("keyup");
		e.which = 13 //enter key
		jQuery('input').trigger(e);
	}

	$(function() {
		var buscador = $("#dt_basic_filter").children('label').children("input");
	    buscador.keydown();
	    buscador.keypress();
	});
	function simulateKeyPress(character) {
		  jQuery.event.trigger({ type : 'keypress', which : character.charCodeAt(0) });
		}
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