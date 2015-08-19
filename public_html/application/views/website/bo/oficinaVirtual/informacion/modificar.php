
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
<?php $nombre = substr ( $informacion[0]->img,9);?>
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				
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
										<div class="row" style="padding-left: 50px; padding-right: 20px;">
											
											<div class="row col-xs-11 col-sm-5 col-md-5 col-lg-12" >
												<form class="smart-form" id="reporte-form" method="post" action="editar_info" enctype="multipart/form-data">
													
													<input name="id_informacion" class="hide" type="text" id="id_informacion" value='<?php echo $informacion[0]->id;?>'>
													<input name="ruta" class="hide" type="text" id="ruta" value='<?php echo $informacion[0]->img;?>'>
													
													<div class="row">
														<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">
															<label class="label">Nombre</label>
															<label class="input">
																<input required type="text" placeholder="Nombre"  name="nombre_frm" value='<?= $informacion[0]->nombre;?>'>
															</label>
														</section>
													</div>
													
													<div class="row">
														<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">
															<label class="label">Descripcion</label>
															<label class="textarea">								
																<textarea required rows="3" class="custom-scroll" name="desc_frm"><?= html_entity_decode($informacion[0]->descripcion);?></textarea>
															</label>
														</section>
													</div>
										
													<div class="row" style="padding-left: 15px; padding-right: 15px;">
														
														<section>
															<label class="label">Imagen</label>
															<div class="input input-file">
																<span class="button"><input id="file" name="userfile" onchange="this.parentNode.nextSibling.value = this.value" type="file">Buscar</span><input required placeholder="<?= $nombre; ?>" readonly="" type="text" id="file_frm" name="file_nme">
															</div>
														</section>
													</div>
													
													<div class="row" >
														<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_subir">
															<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
															<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4" >
																<input required type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" id="boton_subir" value="Agregar informacion">
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
			
