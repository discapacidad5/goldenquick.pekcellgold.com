
<form id="nueva" class="smart-form"  novalidate="novalidate" method="POST" action="/bo/categorias/actualizar_categoria" >
							<fieldset>
								<input type="text" class="hide" value="<?php echo $_POST['id']; ?>" name="id">
								<label class="input" required> Nombre
											<input type="text" name="nombre"  placeholder="Nombre"class="form-control" value="<?php echo $categoria[0]->descripcion; ?>" required>
										</label>
										 Selecione Red
										<label class="select">
											<select name="red">
												<?php foreach ($redes as $red){
												
													if( $categoria[0]->id_red == $red->id ) {?>
														<option value="<?php echo $red->id; ?>" selected="selected"><?php echo $red->nombre; ?></option>
													<?php }else { ?> 
														<option value="<?php echo $red->id; ?>"><?php echo $red->nombre; ?></option>
													<?php }
													}?>
											</select> <i></i> </label>
											Estatus
										<label class="select" > 
											<select name="estado" required value="<?php echo $categoria[0]->estatus; ?>">
												<?php if($categoria[0]->estatus == 'ACT'){ ?>
													<option value="ACT" selected="selected">Activado</option>
													<option value="DES">Desactivado</option>
												<?php } else {?>
													<option value="ACT" >Activado</option>
													<option value="DES" selected="selected">Desactivado</option>
												<?php }?>
											</select> <i></i> </label>
											<br><br>
									<div class="row">
											<section  id="div_subir" >
																											
												<div >
													<input type="submit" class="btn btn-success pull-right" style="margin-right: 3%;" id="boton_subir" value="Actualizar">
												</div>
											</section>
										</div>	
							</fieldset>
						
						</form>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">
function enviar() {
	
	 $.ajax({
							type: "POST",
							url: "/bo/categorias/actualizar_categoria",
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
												location.href="/bo/categorias/index";
												}
											}
										}
									});
						});//fin Done ajax
		
}
</script>