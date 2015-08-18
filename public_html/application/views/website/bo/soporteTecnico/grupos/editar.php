
					<form id="nueva" class="smart-form"  novalidate="novalidate" >
							<fieldset>
								<input type="text" class="hide" value="<?php echo $_POST['id']; ?>" name="id">
								<label class="hide">
								<label class="label">Seleccione una categoria</label>
									<select name="tipo" id="tipo" required="" style="width: 20rem">
										<option value="INF" <?php if($grupo[0]->tipo=="INF")echo 'selected="selected"';?>>Información</option>
										<option value="VID" <?php if($grupo[0]->tipo=="VID")echo 'selected="selected"';?>>Videos</option>
									</select>
								</label>
								<br>
								<label class="select">
								<label class="label">Seleccione la red de la categoria</label>
									<select name="red" id="red" required="">
										<?php 
											foreach ($redes as $red){
												if ($grupo[0]->id_red == $red->id){
													echo '<option selected value='.$red->id.'>'.$red->nombre.'</option>';
												}
												else echo '<option value='.$red->id.'>'.$red->nombre.'</option>';
											}
										?>
									</select>
								</label>
								<br>
								<label class="input"> Nombre
								<input type="text" name="descripcion" required placeholder="Nombre" style="width: 50%;" class="form-control" value="<?php echo $grupo[0]->descripcion; ?>" required>
								<br>
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
							url: "/bo/configuracion/actualizar_grupo",
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
												location.href="/bo/configuracion/listar_grupos_soporte_tecnico";
												}
											}
										}
									});
						});//fin Done ajax
		
}
</script>