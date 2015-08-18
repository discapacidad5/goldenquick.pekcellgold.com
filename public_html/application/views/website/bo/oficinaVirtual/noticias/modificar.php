			<!-- MAIN CONTENT -->
			<div id="content" >

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
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				
					<div>
	<?php $nombre = substr ( $noticia[0]->imagen,9);?>
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body no-padding smart-form">
                <fieldset>
                  <div class="contenidoBotones" style="padding-left: 50px; padding-right: 50px;">
										<div class="row col-xs-12 col-md-12 col-sm-12 col-lg-12">
											<div class="row">
												<form class="smart-form" id="reporte-form" method="post" action="editar_noticia" enctype="multipart/form-data">
													<input name="id_noticia" class="hide" type="text" id="id_noticia" value='<?php echo $noticia[0]->id;?>'>
													<section class="" id="busquedatodos">
														<label class="label">
														Grupo
														</label>
														
														<label class="select">
																<select name="grupo_frm" id="grupo_frm">
																	<?php for($o=0;$o<sizeof($grupos);$o++){
																		
																		if($grupos[$o]->id == $noticia[0]->id_grupo){
																			echo '<option selected value="'.$grupos[$o]->id.'">'.$grupos[$o]->descripcion.'</option>';
																		}
																		else {
																			echo '<option value="'.$grupos[$o]->id.'">'.$grupos[$o]->descripcion.'</option>';
																		}
																	}
																	?>
																</select>
															<i></i>
														</label>
													</section>
													<input name="ruta" class="hide" type="text" id="ruta" value='<?php echo $noticia[0]->imagen;?>'>
			
													<div class="row">
														<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">
															<label class="label">Nombre</label>
															<label class="input">
																<input required type="text" placeholder="Nombre"  name="nombre_frm" value='<?= html_entity_decode($noticia[0]->nombre);?>'>
															</label>
														</section>
													</div>
													
													<div class="row">
														<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">
															<label class="label">Descripcion</label>
															<label class="textarea">								
																<textarea required rows="3" class="custom-scroll" name="desc_frm"><?= html_entity_decode($noticia[0]->contenido);?></textarea> 
															</label>
														</section>
													</div>
													
													<div class="row">
														<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">
															<label class="label">Imagen</label>
															<div class="input input-file">
																<span class="button"><input id="userfile" name="userfile" onchange="this.parentNode.nextSibling.value = this.value" type="file">Buscar</span><input placeholder='<?= $nombre;?>' readonly="" type="text" id="file_frm" name="file_nme">
															</div>
														</section>
													</div>
													
													<div class="row">
														<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_subir">
															<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
															<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4" >
																<input type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" id="boton_subir" value="Actualizar noticia">
															</div>
														</section>
													</div>
												</form>
											</div>
										 </div>
									</div>
								</fieldset>
						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->
	
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
			
