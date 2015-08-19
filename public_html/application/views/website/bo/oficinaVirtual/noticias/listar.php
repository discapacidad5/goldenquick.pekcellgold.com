			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
							<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/oficinaVirtual/"> Oficina Virtual</a> > <a href="/bo/oficinaVirtual/noticias"> Noticias</a> > Listar
							</span>
						</h1>
					</div>
				</div>
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
		<?php if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Error </strong> '.$this->session->flashdata('error').'
			</div>'; 
	}
?>	
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
						<div class="row">
							<div >
								<section id="widget-grid" class="">
									<div class="row">
										<div class="row col-xs-12 col-md-6 col-sm-4 col-lg-5 pull-right">
											<div class="col-xs-2 col-md-4 col-sm-4 col-lg-2">
												<center>
												<a title='Eliminar' class="txt-color-red"><i class="fa fa-trash-o fa-3x"></i></a>
												<br>Eliminar
												</center>
											</div>
											<div class="col-xs-2 col-md-4 col-sm-4 col-lg-2">
											<center>	
												<a title="Editar" class="txt-color-blue"><i class="fa fa-pencil fa-3x"></i></a>
												<br>Editar
												</center>
											</div>
											<div class="col-xs-2 col-md-4 col-sm-4 col-lg-2">
												<center>
													<a title="Activar" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
													<br>Activar
												</center>
											</div>
											<div class="col-xs-2 col-md-4 col-sm-4 col-lg-2">
												<center>
													<a title="Desactivar" class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
													<br>Desactivar
												</center>
											</div>
										</div>
										<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
											<div style="padding-left: 30px; padding-right: 30px;">
												
												<header>
													<h2 class="font-md"><strong>Noticias</strong> <i></i></h2>				
												</header>
										
												<div>
													<div class="smart-timeline">
														<ul class="smart-timeline-list">
															<?php 
															for($i=0;$i<sizeof($noticias);$i++)
															{
																$texto=json_encode(html_entity_decode($noticias[$i]->contenido));
																$texto=trim($texto);
																echo
																'<li>	
																	<div class="smart-timeline-icon" style="cursor:pointer;" onclick="window.location.href=\"ver_noticia?idnw='.$noticias[$i]->id.'\"">
																		<img src='.$noticias[$i]->imagen.'>
																	</div>
																	<div class="smart-timeline-time">
																		<small>'.$noticias[$i]->fecha.'</small>
																	</div>
																	<div class="smart-timeline-content">
																		<p style="font-size:15px;">
																			<a href="ver_noticia?idnw='.$noticias[$i]->id.'"><strong>'.$noticias[$i]->nombre.'</strong></a>
																		</p>
																		
																		<p style="text-align:justify; padding-right:3%;" >'
																			.substr($noticias[$i]->contenido, 0, 100).
																			'... <a href="ver_noticia?idnw='.$noticias[$i]->id.'" >ver mas</a>
																			&nbsp;&nbsp;&nbsp;<a class="txt-color-red " style="cursor: pointer;" onclick="delete_new('.$noticias[$i]->id.')" title="Eliminar"><i class="fa fa-trash-o fa-3x"></i></a>
																			&nbsp;&nbsp;&nbsp;<a class="txt-color-blue"  style="cursor: pointer;" onclick="editar('.$noticias[$i]->id.')"  title="Editar"><i class="fa fa-pencil fa-3x"></i></a>
                															';
                												if ($noticias[$i]->status=='ACT'){
	                												echo '&nbsp;&nbsp;&nbsp;<a class="txt-color-green "  style="cursor: pointer;" onclick="estado_presentacion('."'DES'".','.$noticias[$i]->id.')"  title="Desactivar"><i class="fa fa-check-square-o fa-3x"></i></a>';
                												}
                												else echo '&nbsp;&nbsp;&nbsp;<a class="txt-color-green"  style="cursor: pointer;" onclick="estado_presentacion('."'ACT'".','.$noticias[$i]->id.')"  title="Activar"><i class="fa fa-square-o fa-3x"></i></a>';
																		'</p>
														
																	</div>
																</li>';
															}
															?>			
														</ul>
													</div>			
												</div>			
											</div>
										</article>					
									</div>
								</section>
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

<script type="text/javascript">		
															
	function delete_new(id)
			{
				$.ajax({
					type: "POST",
					url: "/auth/show_dialog",
					data: {message: '¿ Esta seguro que desea Eliminar la noticia ?'},
				})
				.done(function( msg )
				{
					bootbox.dialog({
					message: msg,
					title: 'Eliminar Noticia',
					buttons: {
						success: {
						label: "Aceptar",
						className: "btn-success",
						callback: function() {
								$.ajax({
									type: "GET",
									url: "borrar_noticia",
									data:'id='+id
								})
								.done(function( msg )
								{
									bootbox.dialog({
									message: "Se ha eliminado la Noticia.",
									title: 'Felicitaciones',
									buttons: {
										success: {
										label: "Aceptar",
										className: "btn-success",
										callback: function() {
											location.href="/bo/noticias/listar";
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

	function estado_presentacion(estatus, id)
	{		
		var datos={'id':id,'estado':estatus};
		$.ajax({
			type: "post",
			url: "estado_noticia",
			data:{info:JSON.stringify(datos)}
			}).done(function( msg )
					{
						location.href = "/bo/noticias/listar";
					
				});
	}

	function editar(id)
	{
		
		$.ajax({
			type: "POST",
			url: "get_noticia",
			data: {id:id},
		})
		.done(function( msg )
		{
			bootbox.dialog({
				//closeButton: false,
			message: msg,
			title: 'Modificar Noticia',
		})//fin done ajax
		});//Fin callback bootbox

	}
</script>