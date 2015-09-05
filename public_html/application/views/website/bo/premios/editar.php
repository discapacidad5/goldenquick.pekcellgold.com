<form id="nueva" class="smart-form"  novalidate="novalidate" method="POST" action="/bo/premios/actualizar" enctype="multipart/form-data">
							<fieldset>
							<?php $nombre_completo = $premio[0]->imagen; 
			  $nombre = substr ( $premio[0]->imagen,15);?>
			  
			  	<input name="nombre_archivo" class="hide" type="text" id="nombre_archivo" value='<?php echo $nombre;?>'>
			<input name="nombre_completo" class="hide" type="text" id="nombre_completo" value='<?php echo $nombre_completo;?>'>
			
								<label class="input" required>
									<input style="width: 25rem;" required class="hide" type="text" name="id" value='<?php echo $premio[0]->id?>' class="form-control" required>
								</label>
								<label class="input" required>
									Nombre
									<input style="width: 25rem;" required type="text" name="nombre" value='<?php echo $premio[0]->nombre?>' class="form-control" required>
								</label>
								<br>
								<div class="row" style="width: 28rem;">
									<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos" >
										Descripcion
										<label class="textarea">								
											<textarea required rows="3" class="custom-scroll" name="desc_frm"><?php echo $premio[0]->descripcion?></textarea>
										</label>
									</section>
								</div>
											
								<label class="input" required>
									Nivel de profundidad
									<input style="width: 25rem;" required type="number" name="nivel" value='<?php echo $premio[0]->nivel?>' class="form-control" required>
								</label>
								<br>
								<label class="input" required>
									Cantidad de afiliados necesarios
									<input style="width: 25rem;" required type="number" name="cantidad" value='<?php echo $premio[0]->num_afiliados?>'class="form-control" required>
								</label>
								<br>
								Selecione Red
								<label class="select" style="width: 25rem;"> 
									<select style="width: 25rem;" name="red" required>
										<?php foreach ($redes as $red){
										
											if ($red->id==$premio[0]->id_red){?>
												<option selected value="<?php echo $red->id; ?>"><?php echo $red->nombre; ?></option>
											<?php } else { ?>
												<option value="<?php echo $red->id; ?>"><?php echo $red->nombre; ?></option>
										<?php }
										} ?>
									</select> <i></i> 
								</label>
								<br>		
								Frecuencia
								<label class="select" style="width: 25rem;"> 
									<select style="width: 25rem;" name="frecuencia" required>
									<?php if ($premio[0]->frecuencia=='Mensual'){?>
										<option selected value="Mensual">Mensual</option>
										<option value="Anual">Anual</option>
										<?php } else{?>
										<option value="Mensual">Mensual</option>
										<option selected value="Anual">Anual</option>
										<?php }?>
									</select> <i></i> 
								</label>
								
								<br>
								
								<section id="imagenes2" class="col col-12">
						        	<label class="label">
						        		Imágen actual
						        	</label>
							         	<div class="no-padding col-xs-12 col-sm-12 col-md-6 col-lg-6"><img style="max-height: 150px;" src='<?php echo $premio[0]->imagen;?>'></div>
					            </section>
								<br><br>
								<br><br>
								<br><br>
								<br><br>
								<br><br>
								<br><br>
								<section id="imagenes" class="">
									<label class="label"> Imágen </label>
									<div class="input input-file">
										<span class="button"> <input id="file" name="userfile"
											onchange="this.parentNode.nextSibling.value = this.value"
											type="file" multiple>Buscar
										</span><input id="file_frm" name="file_nme"
											placeholder='<?php echo $nombre;?>' type="text">
									</div>
									<small><cite
										title="Source Title">Para ver el archivo que va a cargar, pulse con el puntero en el boton de "Buscar"</cite>
									</small>
								</section>
								
								<br>
								
								<div class="row">
									<section  id="div_subir" style="width: 25rem;">
																									
										<div style="width: 25rem;">
											<input type="submit" class="btn btn-success" style="margin-left: 6% ! important; width: 40%;" id="boton_subir" value="Agregar">
										</div>
									</section>
								</div>	
									
							</fieldset>
						
						</form>
