
<!-- MAIN CONTENT -->
<div id="content">
	
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false"	>
					<!-- widget div-->
					
						<div class="widget-body">
							<form method="POST" enctype="multipart/form-data"   action="/bo/admin/update_mercancia" class="smart-form">
							
							<section class="col col-6" style="display:none;">
						            <label class="select"> 
						                <select id="tipo_merc" required name="tipo_merc">
						                	<option value="2">merc</option>
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
								
									<legend>Datos del Servicio</legend>
									<div id="form_mercancia">
										<div class="row">
												<fieldset>
												
													<section class="col col-2" style="width: 50%;">
														<label class="input">Nombre
															<input required type="text" value='<?php echo $data_merc[0]->nombre?>' id="nombre_s" name="nombre">
														</label>
													</section>
													
													<section class="col col-2" style="width: 50%;">
														<label class="input">Concepto
															<input required type="text" value='<?php echo $data_merc[0]->concepto?>' id="concepto" name="concepto">
														</label>
													</section>
													
													<section class="col col-2" style="width: 50%;">
														<label class="input">Fecha de inicio
														<input required name="fecha_inicio" id="startdate" readonly="readonly" type="date" value='<?php echo $data_merc[0]->fecha_inicio?>'> </label>
													</section>
													
													<section class="col col-2" style="width: 50%;">
														<label class="input">Fecha de termino
														<input name="fecha_fin" id="finishdate" readonly="readonly" type="text" value='<?php echo $data_merc[0]->fecha_fin?>'> </label>
													</section>
													
													<section class="col col-12" style="width: 100%;">RED
														<label class="select">
															<select name="red">
																<?foreach ($grupos as $key){
																	
																	if ($data_merc[0]->id_red == $key->id_grupo){?>
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
															<label class="label">
																Imágen
															</label>
																<div class="input input-file">
																	<span class="button">
																		<input id="img" name="img[]" onchange="this.parentNode.nextSibling.value = this.value" type="file" multiple>Buscar</span><input id="imagen_mr" placeholder="Agregar alguna imágen" type="text">
																</div>
															<small>
																<cite title="Source Title">Para ver el archivo que va a cargar, pulse con el puntero en el boton de "Buscar"</cite>
															</small>
														</section>
													
													
													</div>
														
												</fieldset>
												
												<fieldset id="moneda_field">
													<legend>Moneda y país</legend>
													
													<section class="col col-2" style="width: 50%;">
														<label class="input">
														Costo real
														<input type="text" value='<?php echo $mercancia[0]->real?>' name="real" >
														</label>
													</section>
													
													<section class="col col-2" style="width: 50%;">
														<label class="input">Costo distribuidores
														<input type="text" value='<?php echo $mercancia[0]->costo?>' name="costo">
														</label>
													</section>
													
													<section class="col col-2" style="width: 50%;">
														<label class="input">Costo publico
														<input type="text" value='<?php echo $mercancia[0]->costo_publico?>' name="costo_publico">
														</label>
													</section>
													<section class="col col-2" style="width: 50%;">
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
													
													<section class="col col-3" style="width: 50%;">
														<label class="input">
														Puntos comisionables
															<input type="number" min="1" max="" value='<?=$mercancia[0]->puntos_comisionables?>' name="puntos_com" id="puntos_com">
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
														<?}}?>	</label>
														</section>
													<?}?>
													<section class="col col-6" style="width: 50%">
													<br>
													<br>
														<a onclick="add_impuesto()" style='cursor: pointer;'>Agregar impuesto<i class="fa fa-plus"></i></a>
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
					</article>
				</div>
			
		</section>
	</div>
<script src="/template/js/plugin/markdown/markdown.min.js"></script>
<script src="/template/js/plugin/markdown/to-markdown.min.js"></script>
<script src="/template/js/plugin/markdown/bootstrap-markdown.min.js"></script>
<script type="text/javascript">



// DO NOT REMOVE : GLOBAL FUNCTIONS!
var i = <?= $i?>;

$(document).ready(function() {
	 
	$('#startdate').datepicker({
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat:"yy-mm-dd",
		changeYear: true,
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {
			$('#finishdate').datepicker('option', 'minDate', selectedDate);
		}
	});

	$('#finishdate').datepicker({
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat:"yy-mm-dd",
		changeYear: true,
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {
			$('#startdate').datepicker('option', 'maxDate', selectedDate);
		}
	});
	pageSetUp();

})

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