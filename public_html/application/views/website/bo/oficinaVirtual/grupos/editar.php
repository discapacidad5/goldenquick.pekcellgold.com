
					<form id="nueva" class="smart-form"  novalidate="novalidate" >
							<fieldset>
								<input type="text" class="hide" value="<?php echo $_POST['id']; ?>" name="id">
								<label class="select">
								<label class="label">Seleccione una categoria</label>
									<select name="tipo" id="tipo" required="" style="width: 20rem">
										<option value="PRE" <?php if($grupo[0]->tipo=="PRE")echo 'selected="selected"';?>>Presentaciones</option>
										<option value="DES" <?php if($grupo[0]->tipo=="DES")echo 'selected="selected"';?>>Descargas</option>
										<option value="EBO" <?php if($grupo[0]->tipo=="EBO")echo 'selected="selected"';?>>E-books</option>
										<option value="NOT" <?php if($grupo[0]->tipo=="NOT")echo 'selected="selected"';?>>Noticias</option>
										<option value="VID" <?php if($grupo[0]->tipo=="VID")echo 'selected="selected"';?>>Videos</option>
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
							url: "/bo/grupos/actualizar_grupo",
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
												location.href="/bo/grupos/listar";
												}
											}
										}
									});
						});//fin Done ajax
		
}
</script>