
					<form id="nueva" class="smart-form"  novalidate="novalidate" >
							<fieldset>
								<input type="text" class="hide" value="<?php echo $_POST['id']; ?>" name="id">
								<label class="select">
								<label class="label">Seleccione un tipo de usuario</label>
									<select name="tipo" id="tipo" required="">
										<?foreach ($tiposUsuario as $tipo) {?>
											<option value="<?php echo $tipo->id_tipo_usuario; ?>" <?php if($tipo->id_tipo_usuario==$user[0]->tipoId)echo 'selected="selected"';?>>
												<?php echo $tipo->descripcion; ?>
											</option>
										<?}?>
									</select>
								<br>
								<label class="input"> Nombre de Usuario
									<input name="username" value="<?php echo $user[0]->username?>" id="username" maxlength="60" size="30" required="" type="text">
								<br>
								<label class="input"> Nombre
									<input name="nombre" value="<?php echo $user[0]->nombre?>" id="nombre" maxlength="60" size="30" required="" type="text">
								<br>
								<label class="input"> Apellido
									<input name="apellido" value="<?php echo $user[0]->apellido?>" id="apellido" maxlength="60" size="30" required="" type="text">
								<br>
								<label class="input"> Email
									<input name="email" value="<?php echo $user[0]->email?>" id="email" maxlength="60" size="30" required="" type="text">
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
							url: "/bo/usuarios/actualizar_users",
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
												location.href="/bo/usuarios/listarTipoDeUsuario";
												}
											}
										}
									});
						});//fin Done ajax
		
}
</script>