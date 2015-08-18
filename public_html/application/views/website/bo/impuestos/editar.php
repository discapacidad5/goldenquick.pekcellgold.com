
<form id="nueva" class="smart-form"  novalidate="novalidate" >
							<fieldset>
								<label class="select"> Selecione Pais
									<select style="width: 25rem;" name="pais" required>
									<?php foreach ($paises as $pais){
										if($pais->Code==$impuesto[0]->id_pais)
											echo '<option value="'.$pais->Code.'" selected>'.$pais->Name.'</option>';
										else
											echo '<option value="'.$pais->Code.'">'.$pais->Name.'</option>';
										?>
									<?php } ?>
									</select>
								</label>
								<input type="text" class="hide" value="<?php echo $_POST['id']; ?>" name="id">
								<label class="input"> Nombre
								<input type="text" name="nombre" required placeholder="Nombre" style="width: 50%;" class="form-control" value="<?php echo $impuesto[0]->descripcion; ?>" required>
								<label class="input"> Porcentaje
								<input type="number" name="porcentaje" required placeholder="porcentaje" style="width: 50%;" class="form-control" value="<?php echo $impuesto[0]->porcentaje; ?>" required>
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
							url: "/bo/configuracion/actualizar_impuesto",
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
												location.href="/bo/configuracion/listar_impuestos";
												}
											}
										}
									});
						});//fin Done ajax
		
}
</script>