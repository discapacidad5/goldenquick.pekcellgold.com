
<!-- MAIN CONTENT -->
<div id="content">
	
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
									<!-- widget div-->
					<div>
						<div class="widget-body">
							<form method="POST" enctype="multipart/form-data"   action="/bo/admin/update_mercancia" class="smart-form">
								
									<section class="col col-6" style="display:none;">
										<label class="select"> 
											<select id="tipo_merc" required name="tipo_merc">
										             	<option value="1">merc</option>
										        </select>
										</label>
									</section>
									
									<section class="col col-6" style="display:none;">
										<label class="select"> 
											<select id="id_merc" required name="id_merc">
									                	<option value='<?php echo $id_mercancia?>'>merc</option>
									                </select>
									        </label>
									</section>
									
								<fieldset>
									<legend>Datos del producto</legend>
									<div id="form_mercancia">
										<div class="row">
											<fieldset>
												<section class="col col-12" style="width: 50%;">
													<label class="input">
														Nombre
														<input required type="text" value='<?php echo $data_merc[0]->nombre?>' id="nombre_p" name="nombre">
													</label>
												</section>
												
												<section class="col col-12" style="width: 50%;">
													<label class="input">
														Concepto
														<input required type="text" value='<?php echo $data_merc[0]->concepto?>' id="concepto" name="concepto">
													</label>
												</section>
												
												<section class="col col-12" style="width: 50%;">
													<label class="input">
														Marca
														<input type="text" value='<?php echo $data_merc[0]->marca?>' name="marca" id="marca">
													</label>
												</section>
												
												<section class="col col-12" style="width: 50%;">
													<label class="input">
														Código de barras
														<input type="text" value='<?php echo $data_merc[0]->codigo_barras?>' name="codigo_barras">
													</label>
												</section>
												
												<section class="col col-12" style="width: 100%;">GRUPO
															<label class="select">
																<select name="grupo">
																<?foreach ($grupos as $key){
																	
																	if ($data_merc[0]->id_grupo == $key->id_grupo){?>
																		<option selected value='<?=$key->id_grupo?>'>
																			<?= $key->descripcion." (".$key->red.")" ?>
																		</option>
																	<? }	else{?>
																		<option value='<?=$key->id_grupo ?>'>
																			<?= $key->descripcion." (".$key->red.")" ?>
																		</option>
																	<? }?>
																<?}?>
																</select>
															</label>
												</section>
												
												<div>
													<section style="padding-left: 15px; width: 100%;" class="col col-12">
														Descripcion
														<label class="textarea"> 										
															<textarea name="descripcion" rows="3" class="custom-scroll"><?php echo $data_merc[0]->descripcion?></textarea> 
														</label>
													</section>
													
													
													<section id="imagenes2" class="col col-12">
											        	<label class="label">
											        		Imágen actual
											        	</label>
															<?php foreach ($img as $key)
												                {
												                	echo '<div class="no-padding col-xs-12 col-sm-12 col-md-6 col-lg-6"><img style="max-height: 150px;" src="'.$key[0]->url.'"></div>';
												                }
												            ?>
										            </section>
													
													<section id="imagenes" class="col col-12">
														<label class="label"> Imágen </label>
														<div class="input input-file">
															<span class="button"> <input id="img" name="img[]"
																onchange="this.parentNode.nextSibling.value = this.value"
																type="file" multiple>Buscar
															</span><input id="imagen_mr"
																placeholder="Agregar alguna imágen" type="text">
														</div>
														<small><cite
															title="Source Title">Para ver el archivo que va a cargar, pulse con el puntero en el boton de "Buscar"</cite>
														</small>
													</section>
												
												</div>
													
											</fieldset>
											
											<fieldset>
												<legend>Fisicos</legend>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Peso
															<input required type="number" value='<?php echo $data_merc[0]->peso?>' min="0" name="peso">
														</label>
													</section>
													
													<section id="colonia" class="col col-12" style="width: 50%;">
														<label class="input">
															Alto
															<input type="number" min="0" value='<?php echo $data_merc[0]->alto?>' name="alto">
														</label>
													</section>
													
													<section id="municipio" class="col col-12" style="width: 50%;">
														<label class="input">
															Ancho
															<input type="number" min="0" value='<?php echo $data_merc[0]->ancho?>' name="ancho">
														</label>
													</section>
													
													<section id="municipio" class="col col-12" style="width: 50%;">
														<label class="input">
															Profundidad
															<input type="number" min="0" value='<?php echo $data_merc[0]->profundidad?>' name="profundidad">
														</label>
													</section>
													
													<section id="municipio" class="col col-12" style="width: 50%;">
														<label class="input">
															Diametro
															<input type="number" min="0" value='<?php echo $data_merc[0]->diametro?>' name="diametro">
														</label>
													</section>
											</fieldset>
											
											<fieldset id="moneda_field">
												
												<legend>Moneda y país</legend>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Cantidad mínima de venta
															<input type="text" value='<?php echo $data_merc[0]->min_venta?>' name="min_venta">
														</label>
													</section>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Cantidad máxima de venta
															 <input type="text" value='<?php echo $data_merc[0]->max_venta?>' name="max_venta">
														</label>
													</section>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Costo real
															<input type="text" value='<?php echo $mercancia[0]->real?>' name="real">
														</label>
													</section>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Costo distribuidores
															<input type="text" value='<?php echo $mercancia[0]->costo?>' name="costo">
														</label>
													</section>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Costo publico
															<input type="text" value='<?php echo $mercancia[0]->costo_publico?>' name="costo_publico">
														</label>
													</section>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Tiempo mínimo de entrega
															<input placeholder="En días" type="text" value='<?php echo $mercancia[0]->entrega?>' name="entrega" >
														</label>
													</section>
													
													<section class="col col-12" style="width: 50%;">Proveedor
														<label class="select">
															<select name="proveedor">
																<?foreach ($proveedores as $key)
																{ if ($mercancia[0]->id_proveedor == $key->user_id){?>
																		<option selected value="<?=$key->user_id?>">
																			<?=$key->nombre." ".$key->apellido?>
																		</option>	
																	<?}	else{?>
																		<option value="<?=$key->user_id?>">
																			<?=$key->nombre." ".$key->apellido?>
																		</option>
																	<?}?>
																<?}?>
															</select>
														</label>
													</section>
													
													<section class="col col-12" style="width: 50%;">País de la mercancía
														<label class="select">
															<select id="pais2" required name="pais" onChange="ImpuestosPais()">
																<?foreach ($pais as $key)
																{	if ($mercancia[0]->pais == $key->Code){?>
																		<option selected value="<?=$key->Code?>">
																			<?=$key->Name?>
																		</option>
																	<?}else{?>
																		<option value="<?=$key->Code?>">
																			<?=$key->Name?>
																		</option>
																	<?}?>
																<?}?>
															</select>
														</label>
													</section>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Puntos comisionables
															<input type="number" min="1" max="" value='<?php echo $mercancia[0]->puntos_comisionables?>' name="puntos_com" id="puntos_com">
														</label>
													</section>
													<?$i=0?>
													<?foreach($impuestos_merc as $merc)
													{?>	
														<section class="col col-6" id="<?= $i=$i+1?>">Impuesto
															<label class="select">
																
																	<?foreach ($impuesto as $key){
																		if($key->id_pais==$mercancia[0]->pais){?>
																		
																		<select name="id_impuesto[]">
																		<?if($merc->id_impuesto==$key->id_impuesto)
																		{?>
																			<option selected value='<?php echo $key->id_impuesto?>'>
																				<?php echo $key->descripcion.' '.$key->porcentaje.' % (ACTIVO)'?>
																			</option>
																				<?}
																		else 
																		{?>
																			<option value='<?php echo $key->id_impuesto?>'>
																				<?php echo $key->descripcion.' '.$key->porcentaje.' %'?>
																			</option>
																		<?}?>
																		
																	
																</select>
																<a class='txt-color-red' onclick="dell_impuesto(<?=$i?>)" style='cursor: pointer;'>Eliminar <i class="fa fa-minus"></i></a>
														<?}
																	}?>	</label>
															
														</section>
													<?}?>
													
													<section class="col col-6" style="width: 50%">
														<br>
														<br>
														<a onclick="add_impuesto()" style='cursor: pointer;'>Agregar impuesto<i class="fa fa-plus"></i></a>
													</section>
												
											</fieldset>
												
											<fieldset>
												<legend>Extra</legend>
													<section class="col col-12" style="width: 33.4%;">Requiere instalación
														<div class="inline-group">
															<?if($data_merc[0]->instalacion==1){?>
																<label class="radio">
															    	<input type="radio" value="1" checked name="instalacion"><i></i>Si
															    </label>
															    <label class="radio">
															    	<input type="radio" value="0" name="instalacion"><i></i>No
															    </label>
															<?}	else {?>
																<label class="radio">
															        <input type="radio" value="1" name="instalacion"><i></i>Si
															    </label>
															    <label class="radio">
															        <input type="radio" value="0" checked name="instalacion"><i></i>No
															    </label>
															<?}?> 
														</div>
													</section>

													
													<section class="col col-12" style="width: 33.3%;">Requiere especificación
														<div class="inline-group">
															<?if($data_merc[0]->especificacion==1){?>
																<label class="radio">
															    	<input type="radio" value="1" checked name="especificacion"><i></i>Si
															    </label>
															    <label class="radio">
															    	<input type="radio" value="0" name="especificacion"><i></i>No
															    </label>
															<?}	else {?>
																<label class="radio">
															        <input type="radio" value="1" name="especificacion"><i></i>Si
															    </label>
															    <label class="radio">
															        <input type="radio" value="0" checked name="especificacion"><i></i>No
															    </label>
															<?}?> 
														</div>
													</section>
													
													<section class="col col-12" style="width: 33.3%;">Requiere producción
														<div class="inline-group">
															<?if($data_merc[0]->produccion==1){?>
																<label class="radio">
															    	<input type="radio" value="1" checked name="produccion"><i></i>Si
															    </label>
															    <label class="radio">
															    	<input type="radio" value="0" name="produccion"><i></i>No
															    </label>
															<?}	else {?>
																<label class="radio">
															        <input type="radio" value="1" name="produccion"><i></i>Si
															    </label>
															    <label class="radio">
															        <input type="radio" value="0" checked name="produccion"><i></i>No
															    </label>
															<?}?> 
														</div>
													</section>
														
													<section class="col col-12" style="width: 50%; padding-left: 80px;">Producto de importación
														<div class="inline-group">
															<?if($data_merc[0]->importacion==1){?>
																<label class="radio">
															    	<input type="radio" value="1" checked name="importacion"><i></i>Si
															    </label>
															    <label class="radio">
															    	<input type="radio" value="0" name="importacion"><i></i>No
															    </label>
															<?}	else {?>
																<label class="radio">
															        <input type="radio" value="1" name="importacion"><i></i>Si
															    </label>
															    <label class="radio">
															        <input type="radio" value="0" checked name="importacion"><i></i>No
															    </label>
															<?}?> 
														</div>
													</section>
														
													<section class="col col-12" style="width: 50%; padding-right: 80px;">Producto de sobrepedido
														<div class="inline-group">
														<?if($data_merc[0]->sobrepedido==1){?>
																<label class="radio">
															    	<input type="radio" value="1" checked name="sobrepedido"><i></i>Si
															    </label>
															    <label class="radio">
															    	<input type="radio" value="0" name="sobrepedido"><i></i>No
															    </label>
															<?}	else {?>
																<label class="radio">
															        <input type="radio" value="1" name="sobrepedido"><i></i>Si
															    </label>
															    <label class="radio">
															        <input type="radio" value="0" checked name="sobrepedido"><i></i>No
															    </label>
															<?}?>
														</div>
													</section>
											</fieldset>
													
										</div>
								</div>
							</fieldset>
							<section class="col col-12 pull-right" >
								<button type="submit" class="btn btn-success">
									Agregar
								</button>
							</section>
						</form>
					</div>
				</div>
																<!-- end widget div -->
			</article>
														<!-- END COL -->
		</div>

	</section>
												<!-- end widget grid -->
</div>
											<!-- END MAIN CONTENT -->
							
<script type="text/javascript">
var i = <?= $i?>;
// DO NOT REMOVE : GLOBAL FUNCTIONS!

function add_impuesto()
{
	var code=	'<div id="'+i+'"><section class="col col-3" id="impuesto">Impuesto'
	+'<label class="select">'
	+'<select name="id_impuesto[]">'
	<?foreach ($impuesto as $key)
	{
		echo "+'<option value=".$key->id_impuesto.">".$key->descripcion." ".$key->porcentaje."%"."</option>'";
	}?>
	+'</select>'
	+'</label>'
	+'<a class="txt-color-red" onclick="dell_impuesto('+i+')" style="cursor: pointer;">Eliminar <i class="fa fa-minus"></i></a>'
	+'</section></div>';
	$("#moneda_field").append(code);
	ImpuestosPais();
	i = i + 1
}

function dell_impuesto(id)
{	
	$("#"+id+"").remove();
	
}

function ImpuestosPais(){
	var pa = $("#pais2").val();
	
	$.ajax({
		type: "POST",
		url: "/bo/mercancia/ImpuestaPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		$('#impuesto option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var impuestos = $('#impuesto');
		      $('#impuesto select').each(function() {
				  $(this).append('<option value="'+datos[i]['id_impuesto']+'">'+datos[i]['descripcion']+' '+datos[i]['porcentaje']+'</option>');
			    
			});
	    	  
	        
	      }
	});
}

</script>
	</html>