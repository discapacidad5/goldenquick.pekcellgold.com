			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
								<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a> >
							<span>
								<a href="/ov/cgeneral/soporte_tecnico_ver_redes"> Ver Redes</a> >	Soporte Técnico
							</span>
						</h1>
					</div>
				</div>
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false"
          data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-sortable="false"
          data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false">
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body no-padding smart-form">
                <fieldset>
                  <div class="contenidoBotones">
										<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
											<div class="col-sm-3 link">
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="padding-left: 13%;">
												
												<div class="col-xs-10 col-sm-10 col-md-3 col-lg-3" style="padding-right: 1%;padding-bottom: 3rem">
												<a href="/ov/cgeneral/listar_informacion?id_red=<?php echo $id_red;?>">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
														<i class="fa fa-info fa-3x"></i>
														<h1>Informacion</h1>
													</div>
												</a>
												</div>
												
												<div class="col-xs-10 col-sm-10 col-md-3 col-lg-3" style="padding-right: 1%;padding-bottom: 3rem">
												<a href="/ov/cgeneral/listar_videos?id_red=<?php echo $id_red;?>">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
														<i class="fa fa-file-video-o fa-3x"></i>
														<h1>Videos</h1>
													</div>
												</a>
												</div>
												
												<div class="col-xs-10 col-sm-10 col-md-3 col-lg-3" style="padding-right: 1%;padding-bottom: 3rem">
												<a  href="/ov/cgeneral/chat_soporte?id=red_soporte">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
														<i class="fa fa-wechat fa-3x"></i>
														<h1>Chat</h1>
													</div>
												</a>
												</div>
												
											</div>
										 </div>
									</div>
								</fieldset>
								
								<h2 style=" font-size: 16px; font-family: italic"><center></center></h2>
								
								
								
								<div class="row col-xs-12 col-md-11 col-sm-11 col-lg-11" >
									<center>
										<div class="col-xs-0 col-md-4 col-sm-3 col-lg-4">
											
										</div>
										
										<div class="col-xs-12 col-md-2 col-sm-4 col-lg-2">
										<center>	
											<a title="Skype" href="" class="txt-color-gray"><i class="fa fa-skype fa-3x"></i></a>
											<br><h2 style=" font-size: 14px; font-family: italic"><b>Skype:</b> <?php if(!isset($datos_generales[0]->skype)){echo "";} else{echo $datos_generales[0]->skype;}?></h2>
											</center>
										</div>
								
										
										<div class="col-xs-12 col-md-2 col-sm-2 col-lg-2">
											<center>
											<a title="PeKey" href="" class="txt-color-gray"><i class="fa fa-mobile-phone fa-3x"></i></a>
											<br><h2 style=" font-size: 14px; font-family: italic"><b>Pekey:</b> <?php if(!isset($datos_generales[0]->pekey)){echo "";} else{echo $datos_generales[0]->pekey;}?></h2>
											</center>
										</div>
										
										
										
										<div class="col-xs-12 col-md-2 col-sm-2 col-lg-2">
											<center>
												<a title="PinKost" href="" class="txt-color-gray"><i class="fa fa-phone  fa-3x"></i></a>
												<br><h2 style=" font-size: 14px; font-family: italic " ><b>PinKost:</b> <?php if(!isset($datos_generales[0]->pinkost)){echo "";} else{echo $datos_generales[0]->pinkost;}?><br><br><br><br></h2>
											</center>
										</div>
									</center>
								</div>
						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->
			</article>
			<!-- END COL -->
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
.link
{
	margin: 0.5rem;
}
.minh
{
	padding: 50px;
}
.link a:hover
{
	text-decoration: none !important;
}
</style>
			
