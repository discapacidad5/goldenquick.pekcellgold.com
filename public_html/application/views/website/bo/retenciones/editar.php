
<form id="nueva" class="smart-form"  novalidate="novalidate" >
							<fieldset>
								<input type="text" class="hide" value="<?php echo $_POST['id']; ?>" name="id">
								<label class="input"> Nombre
								<input type="text" name="nombre" required placeholder="Nombre" style="width: 50%;" class="form-control" value="<?php echo $retencion[0]->descripcion; ?>" required>
								<label class="input"> Valor
								<input type="number" name="porcentaje" required placeholder="valor" style="width: 50%;" class="form-control" value="<?php echo $retencion[0]->porcentaje; ?>" required>
								<br><div class="inline-group">
										<label class="radio">
											<input <?php if($retencion[0]->duracion == 'UNI') echo 'checked=""';?> 
											value="UNI" name="duracion" placeholder="duracion" type="radio">
										<i></i>Unica</label>
										<label class="radio">
											<input <?php if($retencion[0]->duracion == 'ANO') echo 'checked=""';?> 
											value="ANO" name="duracion" placeholder="duracion" type="radio">
										<i></i>Anual</label>
										<label class="radio">
											<input <?php if($retencion[0]->duracion == 'MES') echo 'checked=""';?>
											value="MES" name="duracion" placeholder="duracion" type="radio">
										<i></i>Mensual</label>
										<label class="radio">
											<input <?php if($retencion[0]->duracion == 'SEM') echo 'checked=""';?> 
											value="SEM" name="duracion" placeholder="duracion" type="radio">
										<i></i>Semanal</label>
										<label class="radio">
											<input <?php if($retencion[0]->duracion == 'DIA') echo 'checked=""';?> 
											value="DIA" name="duracion" placeholder="duracion" type="radio">
										<i></i>Diario</label>
								</div>

							</fieldset>
							<footer>
								<a class="btn btn-success" onclick="enviar()">
									Guardar
								</a>
							</footer>
						</form>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">
function enviar() {
	
	 $.ajax({
							type: "POST",
							url: "/bo/configuracion/actualizar_retencion",
							data: $('#nueva').serialize()
						})
						.done(function( msg ) {
							
									bootbox.dialog({
										message: msg,
										title: "Atención",
										buttons: {
											success: {
											label: "Ok!",
											className: "btn-success",
											callback: function() {
												location.href="/bo/configuracion/listar_retenciones";
												}
											}
										}
									});
						});//fin Done ajax
		
}
</script>