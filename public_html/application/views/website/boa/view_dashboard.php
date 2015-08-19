<?$ci = &get_instance();
$ci->load->model("model_permissions");?>
			<!-- MAIN CONTENT -->
			<div id="content" >

				<!-- row -->
				<div class="row">
				<br /><br /><br />
				</div>
				<!-- end row -->

      <div class="row">
					<div class="col-sm-12">
							<div class="well well-sm">
								<div class="row">
					      	<div class="col-sm-12 col-md-12 col-lg-4" style="margin-top: 12rem;">
										<div class="well well-light well-sm no-margin no-padding">
											<div class="row">
												<div class="col-sm-12">
													<div id="myCarousel" class="carousel fade profile-carousel">
														<div class="air air-top-left padding-10">
															<h4 class="txt-color-white font-md"></h4>
														</div>
														<div class="carousel-inner">
															<!-- Slide 1 -->
															<div class="item active">
																<img src="/template/img/demo/m3.jpg" alt="demo user">
															</div>
														</div>
													</div>
												</div>

												<div class="col-sm-12">

													<div class="row">
															<div class="col-sm-3">
														</div>
													</div>
												</div>
											</div>
  									</div>
									</div>
                	<div class="col-sm-12 col-md-12 col-lg-8">
									<!--Inica la secciion de la perfil y red-->
								  	<div class="well" style="box-shadow: 0px 0px 0px !important;border-color: transparent;">
										<fieldset>
											<legend><b>Sistema Integral de Operaciones Administrativo</b></legend>
											                  <div class="contenidoBotones">
										<div class="row">
											<div class="col-sm-12 link">
											<div class="col-sm-6 link">
													<a href="/bo/usuarios">
														<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-user fa-3x"></i>
															<h1>Usuarios<br>&nbsp</h1>
														</div>
													</a>
											</div>
												<div class="col-sm-6 link">	
													<a href="http://pekcell.com:2095/" target="_blank">
														<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
															<i class="fa fa-envelope fa-3x"></i>
															<h1>Email <br>&nbsp</h1>
														</div>
													</a>
												</div>
											<div class="col-sm-6 link">	
													<a href="/bo/CuentasPagar/PorPagar">
														<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
															<i class="fa fa-money fa-3x"></i>
															<h1>Cuentas por Pagar</h1>
														</div>
													</a>
												</div>
												<div class="col-sm-6 link">	
													<a href="/bo/cuentasporcobrar/index">
														<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
															<i class="fa fa-bank fa-3x"></i>
															<h1>Cuentas Por Cobrar</h1>
														</div>
													</a>
												</div>
											</div>
										 </div>
									</div>
						</div> 
						</div>
				</div>
          	</div>
        </div>
				<!-- end row -->
				<div>
										</div>
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
.minh
{
	padding: 50px;
}
.link a:hover
{
	text-decoration: none !important;
}
</style>
