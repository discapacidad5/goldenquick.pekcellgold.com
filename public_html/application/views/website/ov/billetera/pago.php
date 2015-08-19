
			<!-- MAIN CONTENT -->
			<div id="content">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<h1 class="page-title txt-color-blueDark">
							<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>
							<a href="/ov/billetera2/index"> > Billetera</a>
							 > Pedir Plata</span>
							
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
																							<!-- widget content -->
												<div class="widget-body">
													<div id="myTabContent1" class="tab-content padding-10">
													<h1 class="text-center"></h1>
													
													<div class="table-responsive">
													<table class="table">
													<thead>
														<tr>
															<th> <i class="fa fa-sitemap"></i> Red</th>
															<th> <i class="fa fa-money"></i> Comision</th>
														</tr>
													</thead>
													<tbody>
												<?php 
													$total = 0; 
													foreach ($ganancias as $gred){
														if($gred[0]->puntos){
														echo '<tr class="success">
																<td>'.$gred[0]->nombre.'</td>
																<td>$ '.number_format($gred[0]->valor,2).'</td>
															</tr>';
														$total += $gred[0]->valor;
														}else {
															echo '<tr class="warning">
																<td>'.$gred[0]->nombre.'</td>
																<td>$ 0</td>
															</tr>';
														}
													} if($comision_web_personal){ ?>  
														<tr class="success">
															<td>Comision Web Personal</td>
															<td>$ <?php echo number_format($comision_web_personal,2);?></td>
														</tr>
													<?php 
														$total += $comision_web_personal;
													} ?>
													<tr class="success">
														<td><h4><b>TOTAL</b></h4></td>
														<td><h4><b>$ <?php echo number_format($total,2);?></b></h4></td>
													</tr>
													</tbody>
													</table>
														
													</div>

													
															<table id="dt_basic" class="table table-striped table-bordered table-hover">
																
																	<?php 
																	$retenciones_total=0;
																	foreach ($retenciones as $retencion) {?>
																	<tr class="danger">
																		<td><b>Retencion por <?php echo $retencion['descripcion']; ?></b></b></td>
																		<td></td>
																		<td>$ <?php 
																		$retenciones_total+=$retencion['valor'];
																		echo number_format($retencion['valor'],2); ?></td>
																	</tr>
																	<?php $total;
																	} ?>
																
																	<tr class="danger">
																		<td><b>Cobros Pendientes</b></td>
																		<td></td>
																		<td>$ <?php 
																		if($cobroPendientes==null)
																			echo "0";
																		else
																			echo number_format($cobroPendientes,2);
																		?></td> 
																	</tr>
																
																	<?php foreach ($cobro as $cobros){
																	?>
																	<tr class="danger">
																		<td><b>Cobros Pagos</b></td>
																		<td></td>
																		<td>$ 
																		<?php 
																		if($cobros->monto==null){
																		  echo '0';
																		  $cobro=0;
																		}
																		else {
																		  echo number_format($cobros->monto,2);
																		  $cobro=$cobros->monto;
																		}
																		?></td>
																	</tr>
																	<?php 
																	}?>
																	<tr class="info">
																		<td><h4><b>Saldo Neto</b></h4>
																		<td></td>
																		<td><h4><b>$ <?php echo number_format(($total-($cobro+$retenciones_total+$cobroPendientes)),2); ?></b></h4></td>
																	</tr>
																</table>
														
													</div>
													
													
														<form action="send_mail" method="post" id="contact-form1"  class="smart-form col-xs-12 col-sm-8 col-md-6 col-lg-4">
																<fieldset>
																	<section class="col col-10">
																		<label class="label "><b>Saldo Disponible</b></label>
																		<label class="input input state-success">
																			<input type="text" name="saldo" class="from-control" id="saldo" value="<?php echo ($total-($cobro+$retenciones_total+$cobroPendientes)); ?>" readonly />
																		</label>
																	</section>
																	<section class="col col-10">
																		<label class="label"><b>Pedir Dinero</b></label>
																		<label class="input">
																			<input name="cobro" type="number" class="from-control" id="cobro"/>
																		</label>
																	</section>
																	<section class="col col-10">
																		<label class="label"><b>Saldo Final</b></label>
																		<label class="input input state-error">
																			<input value="" type="number" name="neto" id="neto" class="from-control" readonly />
																		</label>
																	</section>
																</fieldset>	
																<fieldset>
																	<section class="col col-10">
																		<label class="label"><b>Titular Cuenta</b></label>
																		<label class="input">
																			<input name="ctitular" type="text" class="from-control" id="ctitular"/>
																		</label>
																	</section>
																	<section class="col col-10">
																		<label class="label "><b>Numero de la cuenta</b></label>
																		<label class="input input">
																			<input type="number" name="ncuenta" class="from-control" id="ncuenta" value="" required/>
																		</label>
																	</section>
																	<section class="col col-10">
																		<label class="label"><b>Banco</b></label>
																		<label class="input">
																			<input name="cbanco" type="text" class="from-control" id="cbanco"/>
																		</label>
																	</section>
																	<section class="col col-10">
																		<label class="label"><b>CLABE (Solo en Mexico)</b></label>
																		<label class="input input">
																			<input value="" type="number" name="cclabe" id="cclabe" class="from-control" />
																		</label>
																	</section>
																</fieldset>	
																
																<footer>
																	<button type="button" onclick="cobrar()" class="btn btn-primary" id="enviar">
																		Cobrar
																	</button>
																</footer>
															</form>
													
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

				$("#cobro").keypress(CalcularSaldo);
				$('#enviar').attr("disabled", true);
					});

			//setup_flots();
			/* end flot charts */
			
function CalcularSaldo(evt){
				
				var saldo = $("#saldo").val();
				var pago = $("#cobro").val() + String.fromCharCode(evt.charCode);
				var neto = saldo-pago;
				$("#neto").val(neto);
				if(neto > 0){
					$('#enviar').attr("disabled", false);
					}else{
						$('#enviar').attr("disabled", true);
					}
			}

function cobrar() {

	if(validarCampos()){
	$.ajax({
		type: "POST",
		url: "/auth/show_dialog",
		data: {message: '¿ Esta seguro que desea Pedir el pago con los datos que se acabaron de ingresar ?'},
	})
	.done(function( msg )
	{
		bootbox.dialog({
		message: msg,
		title: 'Transacion',
		buttons: {
			success: {
			label: "Aceptar",
			className: "btn-success",
			callback: function() {

					$.ajax({
						type: "POST",
						url: "/ov/billetera2/cobrar",
						data: $('#contact-form1').serialize()
					})
					.done(function( msg )
					{
						bootbox.dialog({
						message: msg,
						title: '',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								location.href='historial';
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
	}else {
		alert("Los datos de la cuenta o el cobro estan incompletos o erroneos");
	}
}
function validarCampos(){

	if(parseInt($('#cobro').val())<=0)
		return false;
	
	if($('#ctitular').val()=="")
		return false;
			
	if($('#ncuenta').val()=="")
		return false;
	
	if($('#cbanco').val()=="")
		return false;

	return true;
}
	</script>