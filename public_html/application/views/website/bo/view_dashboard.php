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
                           <!--
															<h1><small>Connections</small></h1>
															<ul class="list-inline friends-list">
																<li><img src="img/avatars/1.png" alt="friend-1">
																</li>
																<li><img src="img/avatars/2.png" alt="friend-2">
																</li>
																<li><img src="img/avatars/3.png" alt="friend-3">
																</li>
																<li><img src="img/avatars/4.png" alt="friend-4">
																</li>
																<li><img src="img/avatars/5.png" alt="friend-5">
																</li>
																<li><img src="img/avatars/male.png" alt="friend-6">
																</li>
																<li>
																	<a href="javascript:void(0);">413 more</a>
																</li>
															</ul>

															<h1><small>Recent visitors</small></h1>
															<ul class="list-inline friends-list">
																<li><img src="img/avatars/male.png" alt="friend-1">
																</li>
																<li><img src="img/avatars/female.png" alt="friend-2">
																</li>
																<li><img src="img/avatars/female.png" alt="friend-3">
																</li>
															</ul> -->
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
											<legend><b>Sistema Integral de Operaciones</b></legend>
											<div class="row">
												<?php $permiso=$ci->model_permissions->check($id,'perfil');
												//if($permiso){
												?>
												<div class="col-sm-4">
													<a href="configuracion/">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-wrench fa-3x"></i>
															<h5>Configuracion</h5>
														</div>
													</a>
												</div>

												<?php //}
												$permiso=$ci->model_permissions->check($id,'foto');
											//	if($permiso){
												?>
												<div class="col-sm-4">
													<a href="comercial/">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
															<i class="fa fa-money fa-3x"></i>
															<h5>Comercial</h5>
														</div>
													</a>
												</div>
												<?php //}
												?>

												<?php //}
												$permiso=$ci->model_permissions->check($id,'foto');
											//	if($permiso){
												?>
												<div class="col-sm-4">
													<a href="administracion/">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
															<i class="fa fa-folder-open fa-3x"></i>
															<h5>Administrativo</h5>
														</div>
													</a>
												</div>
												<?php //}
												?>
											</div>
											<div class="row">
												<?php $permiso=$ci->model_permissions->check($id,'perfil');
												//if($permiso){
												?>
												<div class="col-sm-4">
													<a href="oficinaVirtual/">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-desktop fa-3x"></i>
															<h5>Oficina Virtual</h5>
														</div>
													</a>
												</div>
												<?php //}
												?>

												<?php //}
												$permiso=$ci->model_permissions->check($id,'foto');
											//	if($permiso){
												?>
												<div class="col-sm-4">
													<a href="/bo/logistico2">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
															<i class="fa fa-cubes fa-3x"></i>
															<h5>Logistico</h5>
														</div>
													</a>
												</div>
												<?php //}
												?>
												
												<?php //}
												$permiso=$ci->model_permissions->check($id,'foto');
											//	if($permiso){
												?>
												<div class="col-sm-4">
													<a href="/bo/reportes">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
															<i class="fa fa-book fa-3x"></i>
															<h5>Reportes</h5>
														</div>
													</a>
												</div>
											</div>
									</fieldset>
									<!--Termina la secciion de perfil y red-->
									<footer>
										Version: <i>3.0.0</i>
										<a href="/changelog">Changelog</a>
									</footer>
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
