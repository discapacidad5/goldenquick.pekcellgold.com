			<div id="content">

				<div class="row">
				
					<!-- col -->
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER -->
						<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a> 
						<span>>
							Noticias </span></h1>
					</div>
					<!-- end col -->
				
				<!-- right side of the page with the sparkline graphs -->
				
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
									<span class="widget-icon"> <i class="fa fa-list-alt"></i> </span>
									<h2>Noticias</h2>
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
																<div class="smart-timeline">
																	<ul class="smart-timeline-list">
																	<?php foreach ($noticias as $noticia)
																			{
																				if($noticia->id_grupo == $grupo->id){
																					
																				$texto=json_encode(html_entity_decode($noticia->contenido));
																				$texto=trim($texto);
																				echo
																				"<li>	
																					<div class='smart-timeline-icon' style='cursor:pointer;' onclick='window.location.href=\"ver_noticia?idnw=".$noticia->id_noticia."\"'>
																						<img src='".$noticia->imagen."'>
																					</div>
																					<div class='smart-timeline-time'>
																						<small>".$noticia->fecha."</small>
																					</div>
																					<div class='smart-timeline-content'>
																						<p style='font-size:15px;'>
																							<a href='ver_noticia?idnw=".$noticia->id_noticia."'><strong>".$noticia->nombre."</strong></a>
																						</p>
																						<p style='text-align:justify; padding-right:3%;'>"
																							.substr($texto, 0, 100).
																						"... <a href='ver_noticia?idnw=".$noticia->id_noticia."'>ver mas</a></p>
																						<p><strong>"
																							.$noticia->nombre_usuario." ".$noticia->apellido_usuario.
																						"</strong></p>									
																							
																					</div>
																				</li>";
																				 }
																			} ?>
																			</ul>
																		</div>
																		
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
	        	<br />
	        	<br />
	        	<br />
	        </div>
        </div>
		<!-- PAGE RELATED PLUGIN(S) -->
		</div>
		
	
		<!-- PAGE RELATED PLUGIN(S) -->

        <script src="/template/js/plugin/bootbox/bootbox.min.js"></script>
		<script type="text/javascript">
			function vermas(texto,autor,img,titulo)
			{
				bootbox.dialog({
					message: '<div style="text-align:justify;"><p>'+texto+'</p><p><strong>'+autor+'</strong></p><br><img src="'+img+'" width="150"></div>',
					title: ""+titulo+"",
					
				});
			}
		</script>
		<!-- PAGE RELATED PLUGIN(S) -->
		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
		
		})

		</script>