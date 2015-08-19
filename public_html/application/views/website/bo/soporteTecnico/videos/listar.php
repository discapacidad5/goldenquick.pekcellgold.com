			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
							
							<!-- PAGE HEADER -->
								<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/configuracion/">Configuracion</a>
							</span>
							<span>>
								<a href="/bo/configuracion/soporte_tecnico">Soporte Técnico</a> 
							</span>
							<span>>
								<a href="/bo/configuracion/videos_ver_redes">Ver Redes</a>
							</span>
							<span>>
								<a href="/bo/configuracion/videos?id_red=<?php echo $id_red;?>">Videos</a> > Listar
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
										<div>
													<div>
													
														<!-- widget edit box -->
														<div class="jarviswidget-editbox">
															<!-- This area used as dropdown edit box -->
									
														</div>
														<!-- end widget edit box -->
									
														<!-- widget content -->
														<div class="widget-body no-padding">
															
															<div class="panel-group smart-accordion-default" id="accordion-2">
											<?php for($i=0;$i<sizeof($grupos);$i++)
											{
												$j=0;	
												
												echo '<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion-2" href="#collapse-'.$i.'" class="collapsed"> 
															<i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i>'. 
															$grupos[$i]->descripcion.
														'</a>
													</h4>
												</div>
												<div id="collapse-'.$i.'" class="panel-collapse collapse">
													<div class="panel-body">';
												for($j=0;$j<sizeof($videos);$j++)
												{
													if($videos[$j]->grupo==$grupos[$i]->descripcion)
													{
														echo '<div class="" style="vertical-align:middle;">
															<div class="col-lg-3 hidden-sm hidden-xs col-md-3">';
															if($videos[$j]->tipo==2)
															{
																echo	'<a href="javascript:void(0);" onclick="video(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><img style="margin-left: 1rem; height: 20rem; width: 30rem;" class="col-lg-12 col-md-12 video_img" style="max-height: 90px;" src="'.$videos[$j]->img.'"></a>';
															}
															if($videos[$j]->tipo==21)
															{
																echo	'<a href="javascript:void(0);" onclick="video_youtube(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><img style="margin-left: 1rem; height: 20rem; width: 30rem;" class="col-lg-12 col-md-12 video_img" style="max-height: 90px;" src="'.$videos[$j]->img.'"></a>';
															}															
													echo '</div>
															<div class="col-sm-3 hidden-lg hidden-md col-xs-6">
																<a href="'.$videos[$j]->ruta.'"><img class="col-xs-12 col-sm-12 video_img" src="'.$videos[$j]->img.'"></a>
															</div>
															<div class="col-lg-3 col-sm-9 col-xs-6 col-md-3">';
																if($videos[$j]->tipo==2)
																{
																	echo	'<p><strong>'.$videos[$j]->n_publico.'</strong></p>';
																}
																if($videos[$j]->tipo==21)
																{
																	echo	'<p><strong>'.$videos[$j]->n_publico.'</strong></p>';
																}		
																	echo '
																	<p>'.$videos[$j]->usuario.'</p>
																	
																	<p>'.$videos[$j]->fecha.'</p>
																	<p>'.$videos[$j]->descripcion.'</p>
															</div>
															<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">

																<!-- new widget -->
																<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" id="wid-id-1" data-widget-editbutton="false" data-widget-fullscreenbutton="false">							
																	<header>
																		<span class="widget-icon"> <i class="fa fa-comments txt-color-white"></i> </span>
																		<h2> Comentarios </h2>
																		<div class="widget-toolbar">								
																		</div>
																	</header>
									
																	<!-- widget div-->
																	<div>
																		<!-- widget edit box -->
																		<div class="jarviswidget-editbox">
																			<div>
																				<label>Title:</label>
																				<input type="text" />
																			</div>
																		</div>
																		<!-- end widget edit box -->
									
																		<div class="widget-body widget-hide-overflow no-padding">
																			<!-- content goes here -->
																			<br>
																			<div id="chat-body" class="col-lg-8 col-sm-8 col-xs-8 col-md-8 chat-body custom-scroll" style="height:150px;margin-left: 3rem;">';
																			
																				for($k=0;$k<sizeof($comentarios);$k++)
																				{
																					if($comentarios[$k]->id_video==$videos[$j]->id)
																					{
																						echo '<p class="alert alert-success"> 
																									<i class="fa fa-comment-o"></i>'
																									.$comentarios[$k]->comentario.
																									'<br><strong>'.$comentarios[$k]->username.'</strong>
																									<a class="txt-color-red" style="height: 1rem ! important;" href="javascript:void(0);" onclick="eliminarComentario('.$comentarios[$k]->id.')"><i class="fa fa-trash-o fa-2x"></i></a>
																								</p>';
																					}
																				}
																				
																			echo '</div><!-- end content -->
																		</div>
									
																	</div>
																	<!-- end widget div -->
																</div>
																<!-- end widget -->
															</div>
														
															<div class="col-lg-1 hidden-sm hidden-xs hidden-md" style="vertical-align:middle;">
																<ul class="demo-btns hidden-xs hidden-sm" style="vertical-align:middle;">
																	<li>';
																	if($videos[$j]->tipo==2)
																	{
																		echo	'<a style="height: 7rem ! important;" class="btn bg-color-greenLight txt-color-white" href="javascript:void(0);" onclick="video(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><i class="fa fa-eye fa-3x"></i></a>';
																	}
																	if($videos[$j]->tipo==21)
																	{
																		echo	'<a style="height: 7rem ! important;" class="btn bg-color-greenLight txt-color-white" href="javascript:void(0);" onclick="video_youtube(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><i class="fa fa-eye fa-3x"></i></a>';
																	}	
																	echo '	
																	</li>
																</ul><br>
							
																<ul class="demo-btns" style="vertical-align:middle;">
																	<li>
																		<a style="height: 7rem ! important;" class="btn bg-color-blue txt-color-white" href="javascript:void(0);" onclick="show_coment_panel('.$videos[$j]->id.')"><i class="fa fa-comment-o fa-3x"></i></a>
																	</li>
																</ul><br>
																<ul class="demo-btns" style="vertical-align:middle;">
																	<li>
																		<a style="height: 7rem ! important;" class="btn bg-color-red txt-color-white" href="javascript:void(0);" onclick="eliminar('.$videos[$j]->id.')"><i class="fa fa-trash-o fa-4x"></i></a>
																	</li>
																	<li>';
																	if($videos[$j]->status=='ACT')
																		echo '<a style="height: 7rem ! important;" class="btn txt-color-green" href="javascript:void(0);" onclick="estado(\'DES\','.$videos[$j]->id.')"><i class="fa fa-check-square-o fa-4x"></i></a>';
																	else 
																		echo '<a style="height: 7rem ! important;" class="btn txt-color-green" href="javascript:void(0);" onclick="estado(\'ACT\','.$videos[$j]->id.')"><i class="fa fa-square-o fa-4x"></i></a>';
																	
																	echo '</li>
																</ul><br>
															</div>
															<div class="col-md-1 hidden-sm hidden-xs hidden-lg" style="vertical-align:middle;">
																<ul class="demo-btns hidden-xs hidden-sm" style="vertical-align:middle;">
																	<li>';
																	if($videos[$j]->tipo==2)
																	{
																		echo	'<a class="btn bg-color-greenLight txt-color-white" href="javascript:void(0);" onclick="video(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><i class="fa fa-eye fa-3x"></i></a>';
																	}
																	if($videos[$j]->tipo==21)
																	{
																		echo	'<a class="btn bg-color-greenLight txt-color-white" href="javascript:void(0);" onclick="video_youtube(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><i class="fa fa-eye fa-3x"></i></a>';
																	}
																	echo '	
																	</li>
																</ul><br>
							
																<ul class="demo-btns" style="vertical-align:middle;">
																	<li>
																		<a class="btn bg-color-blue txt-color-white" href="javascript:void(0);" onclick="show_coment_panel('.$videos[$j]->id.')"><i class="fa fa-comment-o fa-3x"></i></a>
																	</li>
																</ul><br>
															</div>
															<div class="hidden-lg col-sm-12 col-xs-12 hidden-md" style="vertical-align:middle;">
																<ul class="demo-btns hidden-lg hidden-md" style="vertical-align:middle;">
																	<li>
																		<a class="btn bg-color-greenLight txt-color-white" href="'.$videos[$j]->ruta.'"><i class="fa fa-eye"></i>Ver video</a>
																	</li>
									
																	<li>
																		<a class="btn bg-color-blue txt-color-white" href="javascript:void(0);" onclick="show_coment_panel('.$videos[$j]->id.')"><i class="fa fa-comment-o"></i>Comentar</a>
																	</li>
																	<li>
																		<a class="btn bg-color-red txt-color-white" href="javascript:void(0);" onclick="eliminar('.$videos[$j]->id.')"><i class="fa fa-trash-o"></i>Eliminar</a>
																	</li>
																	<li>
																		<a class="btn bg-color-red txt-color-white" href="javascript:void(0);" onclick="estado('.$videos[$j]->id.')"><i class="fa fa-check-square-o"></i>Activar</a>
																	</li>
																</ul>
															</div>
														</div>
														<hr>';
													}
												}	
							
												echo '</div>
												</div>
											</div>';
											} ?>
																
															</div>
									
														</div>
														<!-- end widget content -->
									
													</div>
										 </div>
									</div>
								</fieldset>
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
		<!-- PAGE RELATED PLUGIN(S) -->

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
		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script src="/template/js/plugin/bootbox/bootbox.min.js"></script>
		
		<script type="text/javascript">
			function video(vid,name)
			{
				bootbox.dialog({
					message: '<div style="text-align:center;"><video style="width:60%;" controls><source src="'+vid+'" type="video/mp4">No es soportado por su navegador</video></div>',
					title: ""+name+"",
					className: "video-bootbox",
				});
			}
			function video_youtube(url,nombre)
			{
				var igual=url.indexOf('=');
				var andversa=url.indexOf('&');
				if(andversa==-1)
				{
					var video=url.substring(igual+1);
				}
				else
				{
					var video=url.substring(igual+1,andversa);
				}
				bootbox.dialog({
					message: '<div style="text-align:center;"><iframe style="width:100%; height:45rem;" src="http://www.youtube.com/embed/'+video+'"></iframe></div>',
					title: ""+nombre+"",
					className: "video-bootbox",
				});
			}
		</script>
		<script>
			function show_coment_panel(id)
			{
				bootbox.dialog({
					message: '<div class="jarviswidget jarviswidget-color-purple" id="wid-id" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false">'
								+'<header>'
									+'<h2><strong>Comentario</strong> </h2>'		
								+'</header>'
								+'<div>'
								+'<!-- widget edit box -->'
									+'<div class="jarviswidget-editbox">'
									+'<!-- This area used as dropdown edit box -->'
									+'</div>'
									+'<!-- end widget edit box -->'
									+'<!-- widget content -->'
										+'<div class="widget-body no-padding">'
											+'<textarea class="form-control no-border" placeholder="" id="coment" rows="4"> Escribe tu comentario. Máximo 140 caracteres.</textarea>'
											+'<div class="widget-footer">'
												+'<button class="btn btn-sm btn-primary" type="button" onclick="add_coment('+id+')">'
													+'Publicar'
												+'</button>'								
	
											+'</div>'
										+'</div>'
									+'</div>'
								+'</div>'
							+'</div>',
					title: "Agregue su comentario",	
				});
			}
		</script>
		<script type="text/javascript">
		
			function add_coment(id)
			{
				var coment=$("#coment").val();
				var datos={'comentario':coment,'video':id};
				$.ajax({
					 data:{info:JSON.stringify(datos)},
			         type: "get",
			         url: "/bo/configuracion/insert_coment",
			         success: function(){
			              alert("Tu comentario fue añadido con exito");
			              location.href = "/bo/configuracion/listar_videos?id_red=<?php echo $id_red;?>";
			         }
				});
			}
			function eliminar(id) {

				$.ajax({
					type: "POST",
					url: "/auth/show_dialog",
					data: {message: '¿ Esta seguro que desea Eliminar el Video ?'},
				})
				.done(function( msg )
				{
					bootbox.dialog({
					message: msg,
					title: 'Eliminar Video',
					buttons: {
						success: {
						label: "Aceptar",
						className: "btn-success",
						callback: function() {

								$.ajax({
									type: "POST",
									url: "/bo/configuracion/kill_video",
									data: {id: id}
								})
								.done(function( msg )
								{
									bootbox.dialog({
									message: "Se ha eliminado el Video.",
									title: 'Felicitaciones',
									buttons: {
										success: {
										label: "Aceptar",
										className: "btn-success",
										callback: function() {
											location.href = "/bo/configuracion/listar_videos?id_red=<?php echo $id_red;?>";
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
		}

		function eliminarComentario(id) {

				$.ajax({
					type: "POST",
					url: "/auth/show_dialog",
					data: {message: '¿ Esta seguro que desea Eliminar el Comentario ?'},
				})
				.done(function( msg )
				{
					bootbox.dialog({
					message: msg,
					title: 'Eliminar Comentario',
					buttons: {
						success: {
						label: "Aceptar",
						className: "btn-success",
						callback: function() {

								$.ajax({
									type: "POST",
									url: "/bo/configuracion/kill_comentario",
									data: {id: id}
								})
								.done(function( msg )
								{
									bootbox.dialog({
									message: "Se ha eliminado el Comentario.",
									title: 'Felicitaciones',
									buttons: {
										success: {
										label: "Aceptar",
										className: "btn-success",
										callback: function() {
											location.href = "/bo/configuracion/listar_videos?id_red=<?php echo $id_red;?>";
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
		}
		function estado(estatus, id)
		{
				
			$.ajax({
				type: "POST",
				url: "/bo/configuracion/cambiar_estado_video",
				data: {
					id:id, 
					estado: estatus
				},
				}).done(function( msg )
						{
							location.href = "/bo/configuracion/listar_videos?id_red=<?php echo $id_red;?>";
						
					})
			}
		</script>
				
