<?php $ci = &get_instance();
   	$ci ->load ->model("model_permissions");?>
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
					      	<div class="col-sm-12 col-md-12 col-lg-6">
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

														<div class="col-sm-3 profile-pic">
															<img src="<?=$user?>" alt="demo user">
															<div class="padding-10">
															<!--	<h4 class="font-md"><strong>1,543</strong>
																<br>
																<small>Followers</small></h4>
																<br>
																<h4 class="font-md"><strong>419</strong>
																<br>
																<small>Connections</small></h4> -->
															</div>
														</div>
														<div class="col-sm-6">
															<h1><?=$usuario[0]->nombre?> <span class="semi-bold"><?=$usuario[0]->apellido?></span>
															<br>
															<small> Diamante</small></h1>

															<ul class="list-unstyled ">
                                <li>
                                <div class="demo-icon-font">
																		<img class="flag flag-<?=strtolower($pais)?>">
                                </div>
																</li>
																<li>
																	<p class="text-muted">
																		<i class="fa fa-phone"></i>&nbsp;&nbsp;(<span class="txt-color-darken"><?=$telefono?></span>)</span>
																	</p>
																</li>
																<li>
																	<p class="text-muted">
																		<i class="fa fa-envelope"></i>&nbsp;&nbsp;<a ><?=$email?></a>
																	</p>
																</li>
																<li>
																	<p class="text-muted">
																		<i class="fa fa-user"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?=$username?></span>
																	</p>
																</li>
																<li>
																	<p class="text-muted">
																		<i class="fa fa-calendar"></i>&nbsp;&nbsp;<span class="txt-color-darken">Ultima sesión: <a href="javascript:void(0);" rel="tooltip" title="" data-placement="top" data-original-title="Create an Appointment"><?=$ultima?></a></span>
																	</p>
																</li>
                                <li>
                                <?php
                                if(($id_sponsor[0]->id_usuario!=1)){
                                ?>
                               <b>Patrocinador:</b>
                              <?=$name_sponsor[0]->nombre?> <?=$name_sponsor[0]->apellido?> con id <?=$id_sponsor[0]->id_usuario?><br/>

                              <?php }else{?>
                              Eres un nodo raíz, fuiste patrocinado por la empresa<br />
                              <?php }?>
                                </li>
															</ul>
															<br>
														</div>
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
                <div class="col-sm-12 col-md-12 col-lg-6">
									<!--Inica la secciion de la perfil y red-->
									<div class="well" style="box-shadow: 0px 0px 0px !important;border-color: transparent;">
										<fieldset>
											<legend><b>Perfil y red</b></legend>
											<div class="row">
												<?php $permiso=$ci->model_permissions->check($id,'perfil');
												if($permiso){
												?>
												<div class="col-sm-6">
													<a href="perfil_red/">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>">
															<i class="fa fa-user fa-3x"></i>
															<h5>Perfil</h5>
														</div>
													</a>
												</div>

												<?php }$permiso=$ci->model_permissions->check($id,'foto');
												if($permiso){
												?>
												<div class="col-sm-6">
													<a href="perfil_red/foto">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
															<i class="fa fa-camera fa-3x"></i>
															<h5>Foto</h5>
														</div>
													</a>
												</div>
												<?php }?>
											</div>
											<div class="row">
												<?php $permiso= $ci->model_permissions->check($id,'afiliar');
												if($permiso){
												?>
												<div class="col-sm-6">
													<a href="/ov/perfil_red/TipoAfiliacion">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-edit fa-3x"></i>
															<h5>Afiliar</h5>
														</div>
													</a>
												</div>
												<?php }$permiso=$ci->model_permissions->check($id,'red');
												if($permiso){
												?>
												<div class="col-sm-6">
													<a href="/ov/red/index">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>;">
															<i class="fa fa-sitemap fa-3x"></i>
															<h5>Red</h5>
														</div>
													</a>
												</div>

												<?php }?>
											</div>
										</div>
									</fieldset>
									<!--Termina la secciion de perfil y red-->
								</div>
						    </div>
				      </div>
          </div>
        </div>
				<!-- end row -->
				<div>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-10">
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-6">
									<!--Inica la secciion de compras y reportes-->
									<div class="well">
										<fieldset>
											<legend><b>Compras y comisiones</b></legend>
											<div class="row">
												<?php $permiso=$ci->model_permissions->check($id,'carrito');
												if($permiso){
												?>
												<div class="col-sm-6">
													<a href="compras/carrito_menu">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-shopping-cart fa-3x"></i>
															<h5>Carrito</h5>
														</div>
													</a>
												</div>
												<?php }?>
                        <?php $permiso=$ci->model_permissions->check($id,'billetera');
												if($permiso){
												?>
												<div class="col-sm-6">
													<a href="billetera2/index">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>;">
															<i class="fa fa-money fa-3x"></i>
															<h5>Billetera</h5>
														</div>
													</a>
												</div>
												<?php }?>
											</div>
											<div class="row">
                        <?php $permiso=$ci->model_permissions->check($id,'reportes');
												if($permiso){
												?>
												<div class="col-sm-6">
													<a href="compras/reportes">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>;">
															<i class="fa fa-table fa-3x"></i>
															<h5>Reportes</h5>
														</div>
													</a>
												</div>
												<?php }?>
                      <?php $permiso=$ci->model_permissions->check($id,'tickets');
												if($permiso){
												?>
												<div class="col-sm-6">
													<a href="compras/reportes">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
															<i class="fa   fa-ticket  fa-3x"></i>
															<h5>Tickets/Boletos</h5>
														</div>
													</a>
												</div>
												<?php }?>
											</div>
										</fieldset>
									</div>
								  <!--Termina la secciion de compras y reportes-->
								</div>
                <div class="col-sm-12 col-md-12 col-lg-6">
									<!--Inica la secciion de compras y reportes-->
									<div class="well">
															<fieldset>
											<legend><b>General</b></legend>
											<div class="row">
												<?php $permiso=$ci->model_permissions->check($id,'encuestas');
												if($permiso){
												?>
												<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
													<a href="cgeneral/encuestas">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>;">
															<i class="fa fa-file-text-o fa-3x"></i>
															<h5>Encuestas</h5>
														</div>
													</a>
												</div>
												<?php }$permiso=$ci->model_permissions->check($id,'archivero');
												if($permiso){
												?>
												<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
													<a href="cabecera/archivo">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-archive fa-3x"></i>
															<h5>Archivero</h5>
														</div>
													</a>
												</div>
												<?php }?>
											</div>
											<div class="row">
												<?php $permiso=$ci->model_permissions->check($id,'tablero');
												if($permiso){
												?>
												<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
													<a href="cabecera/tablero">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
															<i class="fa fa-cogs fa-3x"></i>
															<h5>Tablero</h5>
														</div>
													</a>
												</div>
												<?php }$permiso=$ci->model_permissions->check($id,'compartir');
												if($permiso){
												?>
												<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
													<a href="cabecera/compartir">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>">
															<i class="fa  fa-folder-open-o  fa-3x"></i>
															<h5>Compartir</h5>
														</div>
													</a>
												</div>
												<?php }?>
											</div>
										</fieldset>
									</div>
								  <!--Termina la secciion de compras y reportes-->
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12">
									<!--Inicia la secciion de escuela y negocios-->
									<div class="well">
										<div class="row">
											<fieldset>
												<legend><b>Información y capacitación</b></legend>
												<div class="col-sm-1">
												</div>
												<?php $permiso=$ci->model_permissions->check($id,'informacion');
												if($permiso){
												?>
												<div class="col-sm-2">
													<a href="escuela_negocios/informacion">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-info fa-3x"></i>
															<h5>Información</h5>
														</div>
													</a>
												</div>
												<?php }$permiso=$ci->model_permissions->check($id,'presentaciones');
												if($permiso){
												?>
												<div class="col-sm-2">
													<a href="escuela_negocios/presentaciones">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>;">
															<i class="fa fa-desktop fa-3x"></i>
															<h5>Presentaciones</h5>
														</div>
													</a>
												</div>
												<?php }$permiso=$ci->model_permissions->check($id,'e_books');
												if($permiso){
												?>
												<div class="col-sm-2">
													<a href="escuela_negocios/ebooks">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-book fa-3x"></i>
															<h5>E-books</h5>
														</div>
													</a>
												</div>
												<?php }$permiso=$ci->model_permissions->check($id,'descargas');
												if($permiso){
												?>
												<div class="col-sm-2">
													<a href="escuela_negocios/descargas">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>">
															<i class="fa fa-download fa-3x"></i>
															<h5>Descargas</h5>
														</div>
													</a>
												</div>
												<?php }$permiso=$ci->model_permissions->check($id,'promociones');
												if($permiso){
												?>
												<div class="col-sm-2">
													<a href="escuela_negocios/promociones">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-gift  fa-3x"></i>
															<h5>Promociones</h5>
														</div>
													</a>
												</div>
												<?php }?>
											</fieldset>
										</div>
										<div class="row">
											<div class="col-sm-1">
											</div>
											<?php $permiso=$ci->model_permissions->check($id,'eventos');
											if($permiso){
											?>
											<div class="col-sm-2">
												<a href="escuela_negocios/eventos">
													<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>;">
														<i class="fa fa-calendar fa-3x"></i>
														<h5>Eventos</h5>
													</div>
												</a>
											</div>
											<?php }$permiso=$ci->model_permissions->check($id,'noticias');
											if($permiso){
											?>
											<div class="col-sm-2">
												<a href="escuela_negocios/noticias">
													<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
														<i class="fa fa-bullhorn fa-3x"></i>
														<h5>Noticias</h5>
													</div>
												</a>
											</div>
											<?php }$permiso=$ci->model_permissions->check($id,'videos');
												if($permiso){
												?>
												<div class="col-sm-2">
													<a href="escuela_negocios/videos">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>;">
															<i class="fa fa-file-video-o fa-3x"></i>
															<h5>Vídeos</h5>
														</div>
													</a>
												</div>
											<?php }$permiso=$ci->model_permissions->check($id,'reconocimientos');
											if($permiso){
											?>
											<div class="col-sm-2">
												<a href="escuela_negocios/reconocimientos">
													<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
														<i class="fa fa-star fa-3x"></i>
														<h5>Reconocimientos</h5>
													</div>
												</a>
											</div>
                      <?php } ?>
                    	<?php $permiso=$ci->model_permissions->check($id,'estadisticas');
												if($permiso){
												?>
												<div class="col-sm-2">
													<a href="compras/estadistica">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>">
															<i class="fa fa-bar-chart-o fa-3x"></i>
															<h5>Estadisticas</h5>
														</div>
													</a>
												</div>
												<?php } ?>
										</div>
									</div>
									<!--Termina la secciion de escuela y negocios-->
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-sm-12 col-md-12">
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12">
									<!--Inicia la secciion general-->
									<div class="well">
										<fieldset>
											<legend><b>Comunicación</b></legend>
											<div class="row">
											<?php $permiso=$ci->model_permissions->check($id,'soporte_tecnico');
												if($permiso){
												?>
												<div class="col-sm-12">
													<a href="cgeneral/soporte_tecnico_ver_redes">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>">
															<i class="fa fa-support fa-3x"></i>
															<h5>Soporte Técnico</h5>
														</div>
													</a>
												</div>
												<?php }?>
											</div>
											<div class="row">
												<?php $permiso=$ci->model_permissions->check($id,'mensajes');
												if($permiso){
												?>
												<div class="col-sm-12">
													<a href="cgeneral/web_personal">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-globe fa-3x"></i>
															<h5>Web Personal</h5>
														</div>
													</a>
												</div>
												<?php }?>
											</div>
											<div class="row">
												<?php $permiso=$ci->model_permissions->check($id,'chat');
												if($permiso){
												?>
												<div class="col-sm-12">
													<a href="cgeneral/chat">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>;">
															<i class="fa fa-weixin fa-3x"></i>
															<h5>Chat</h5>
														</div>
													</a>
												</div>
												<?php }?>
											</div>
											<div class="row">
												<?php $permiso=$ci->model_permissions->check($id,'e_mail');
												if($permiso){
												?>
												<div class="col-sm-12">
													<a href="cabecera/email">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-envelope fa-3x"></i>
															<h5>E-mail</h5>
														</div>
													</a>
												</div>
												<?php }?>
											</div>
											<div class="row">
                      <?php $permiso=$ci->model_permissions->check($id,'videollamadas');
											if($permiso){
											?>
											<div class="col-sm-12">
												<a href="cgeneral/videollamada">
													<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>">
														<i class="fa fa-video-camera fa-3x"></i>
														<h5>Vídeollamadas</h5>
													</div>
												</a>
											</div>
											<?php }?>
								<!--				<?php $permiso=$ci->model_permissions->check($id,'social_network');
												if($permiso){
												?>
												<div class="col-sm-12">
													<a href="cgeneral/social_network">
														<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>;">
															<div class="row">
																<i class="fa fa-facebook fa-1x"></i>
																<i class="fa fa-twitter fa-1x"></i>
															</div>
															<div class="row">
																<i class="fa fa-skype fa-1x"></i>
																<i class="fa fa-youtube fa-1x"></i>
															</div>
															<h5>Social network</h5>
														</div>
													</a>
												</div>
												<?php }?>	 -->
											</div>
										</fieldset>
									</div>
									<!--Termina la secciion general-->
								</div>
							</div>
						</div>
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
