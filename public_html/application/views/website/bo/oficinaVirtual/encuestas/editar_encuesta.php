
<!-- MAIN CONTENT -->
<div id="content">
	
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1"
					data-widget-colorbutton="false" data-widget-editbutton="false"
					data-widget-togglebutton="false" data-widget-deletebutton="false"
					data-widget-sortable="false" data-widget-fullscreenbutton="false"
					data-widget-custombutton="false" data-widget-collapsed="false">
					<div>

						<!-- widget edit box -->
					
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body no-padding smart-form">
							<fieldset>
								<div class="contenidoBotones">
									<div class="col col-lg-12 col-md-12 col-xs-12 col-md-12">
									
										<form class="smart-form" id="encuesta_editar" method="post" action="actualizar_encuesta">
											<input type="hidden" value="<?php echo $encuesta[0]->id_encuesta; ?>" name='id'>
											<div class="row">
												<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
													id="busquedatodos">
													<label class="label">Nombre</label><label
														class="input">
														<input type="text"
														placeholder="Nombre de la Encuesta" id="enc_nom" name="nombre" value="<?php echo $encuesta[0]->nombre; ?>">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
													id="busquedatodos">
													<label class="label">Descripcion</label>
													<label
														class="textarea"><textarea rows="3"
															class="custom-scroll" id="desc_enc" name="descripcion"><?php echo $encuesta[0]->descripcion; ?></textarea>
													</label>
												</section>
											</div>
											<div class="row">
												
												<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
													id="busquedatodos">
													<label class="label">Cantidad de preguntas</label>
													<label
														class="input"><input type="number" id="preg_qty"
														min="1" max="30" value="<?php echo count($preguntas); ?>" readonly="readonly" name="cantidad">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<?php $i=0;
													foreach ($preguntas as $pregunta) {
													$i++;
													?>
													<fieldset>
														<div class="form-group has-error">
															<label>Pregunta <?php echo $i; ?></label>
															<label class="input">
																<input type="text" value="<?php echo $pregunta->pregunta; ?>" name="pregunta-<?php echo $i; ?>">
																<input type="hidden" value="<?php echo $pregunta->id_pregunta; ?>" name="id_pregunta-<?php echo $i; ?>">
															</label>
														</div>
														<br>
															<?php 
															$j = 0;
															foreach ($opciones as $opcion) {
															if($opcion->id_pregunta == $pregunta->id_pregunta){
																$j++;?>
															<div class="form-group has-success">
																<label class="col-md-2 control-label text-color-red">Opcion <?php echo $j; ?></label>
																<div class="col-md-10">
																	<input class="form-control" type="text" value="<?php echo $opcion->respuesta; ?>" name="respuesta-<?php echo $i."-".$j; ?>">
																	<input class="form-control" type="hidden" value="<?php echo $opcion->id_respuesta; ?>" name="id_respuesta-<?php echo $i."-".$j; ?>">
																</div>
															</div>
														
															<?php } 
															} ?>
														</fieldset>
													<?php }?>
												</section>
											</div>
											
											<div class="row">
												<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
													id="busquedatodos">
													<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
													<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4"><a onclick="actualizar_preguntas()"
															class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12">Actualizar</a>
													</div>
												</section>
											</div>
											
											
										</form>
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
	</section>
		<div class="row">
			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<br /> <br />
			</div>
		</div>

</div>
<!-- END MAIN CONTENT -->
<style>
.link {
	margin: 0.5rem;
}

.minh {
	padding: 50px;
}

.link a:hover {
	text-decoration: none !important;
}
</style>

<script
	src="/template/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
<script src="/template/js/plugin/bootbox/bootbox.min.js"></script>
<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
<script
	src="/template/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script type="text/javascript">

function actualizar_preguntas()
{
	bootbox.dialog({
		message: "La encuesta esta siendo actualizada, esto pueder tardar unos minutos.",
		title: 'Atencion !!!',
		buttons: {
			success: {
			label: "Aceptar",
			className: "btn-success",
			callback: function(msg) {
				
				
			}
		}
		}
	})

	$.ajax({
						 data: $('#encuesta_editar').serialize(),
				         type: "post",
				         url: "actualizar_encuesta",
				         success: function(){
				        	 bootbox.dialog({
									message: "Felicitaciones! La encuesta se a actualizado.",
									title: 'Felicitaciones',
									buttons: {
										success: {
										label: "Aceptar",
										className: "btn-success",
										callback: function(msg) {
											
											window.location.href="listar";
										}
									}
									}
								})
				        	 
				              
				         }
					});
	
}
</script>

