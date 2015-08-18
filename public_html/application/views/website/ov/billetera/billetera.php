
			<!-- MAIN CONTENT -->
			<div id="content">

				<!-- row -->
				<div class="row">

					<!-- col -->
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">
						<!-- PAGE HEADER -->
						<a href="/ov/dashboard">
						<i class="fa fa-home"></i> Inicio</a> > Billetera</h1>
					</div>
					<!-- end col -->
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
										<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">
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
														<?if($estatus=="DES"){?>
													<form action="/ov/billetera/crea_pswd" method="post" id="review-form" class="smart-form">
														<header>
															Crear una nueva contraseña
														</header>
														<fieldset>
															<section>
																<label class="input"> <i class="icon-append fa fa-lock"></i>
																	<input name="password" id="password" placeholder="Contraseña" type="password">
																</label>
															</section>
															<section>
																<label class="input"> <i class="icon-append fa fa-lock"></i>
																	<input name="confirm_password" id="confirm_password" placeholder="Repite contraseña" type="password">
																</label>
															</section>
														</fieldset>
														<footer>
															<a href="#" onclick="crea_pswd()" class="btn btn-primary">
																Confirmar
															</a>
														</footer>
													</form>
														<?}else{?>
														<form action="/ov/billetera/login_billetera" method="post" id="review-form" class="smart-form">
															<header>
																Inicia tu billetera
															</header>
															<fieldset>
																<section>
																	<label class="input"> <i class="icon-append fa fa-lock"></i>
																		<input name="password" id="password" placeholder="Contraseña" type="password">
																	</label>
																</section>
															</fieldset>
															<footer>
																<button class="btn btn-primary">
																	Entrar
																</button>
															</footer>
														</form>
														<?}?>
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
		<script src="..."></script>-->

		<script type="text/javascript">
			$(document).ready(function() {
			 	
				/* DO NOT REMOVE : GLOBAL FUNCTIONS!
				 *
				 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
				 *
				 * // activate tooltips
				 * $("[rel=tooltip]").tooltip();
				 *
				 * // activate popovers
				 * $("[rel=popover]").popover();
				 *
				 * // activate popovers with hover states
				 * $("[rel=popover-hover]").popover({ trigger: "hover" });
				 *
				 * // activate inline charts
				 * runAllCharts();
				 *
				 * // setup widgets
				 * setup_widgets_desktop();
				 *
				 * // run form elements
				 * runAllForms();
				 *
				 ********************************
				 *
				 * pageSetUp() is needed whenever you load a page.
				 * It initializes and checks for all basic elements of the page
				 * and makes rendering easier.
				 *
				 */
				
				 pageSetUp();
				
			})
		</script>
		<script type="text/javascript">
function crea_pswd()
{
		$.ajax({
			type: "POST",
			url: "/ov/billetera/crea_pswd",
			data: $('#review-form').serialize()
		})
		.done(function( msg ) {

			bootbox.dialog({
			message: msg,
			title: "Contraseña",
			buttons: {
				success: {
				label: "Ok!",
				className: "btn-success",
				callback: function() {
					location.href="";
					}
				}
			}
		});

		});

}
</script>