
<!-- MAIN CONTENT -->
<div id="content">
	
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
				<!-- Widget ID (each widget will need unique ID)  action="/ov/compras/guardar_info_comprador" -->
									<!-- widget div-->
					<div>
						<div class="widget-body">
							<form class="smart-form" id="form-comprador" method="post" action="/ov/compras/actualizar_comprador">
								<fieldset>
											
									<section class="col-sm-12 col-md-12 col-lg-12" >
										<label class="input">
											DNI: 
											<input required type="text" value='' id="dni_comprador" name="dni_comprador">
										</label>
									</section>
									
									<section class="col-sm-12 col-md-12 col-lg-12 ">
										<label class="input">
											Nombre: 
											<input type="text" value='' id="nombre_comprador" name="nombre_comprador">
										</label>
									</section>
									
									<section class="col-sm-12 col-md-12 col-lg-12 ">
										<label class="input">
											Apellido: 
											<input type="text" value='' id="apellido_comprador" name="apellido_comprador">
										</label>
									</section>
									
									<section class="col-sm-12 col-md-12 col-lg-12 ">País de residencia
											<label class="select">
												<select id="pais_comprador" name="pais_comprador" >
													<option value="-" selected>-- Seleciona un pais --</option>
													<?foreach ($pais as $key)
													{?>
													<option value="<?=$key->Code?>">
														<?=$key->Name?>
													</option>
													<?}?>
												</select>
											</label>
									</section>
									
									<section class="col-sm-12 col-md-12 col-lg-12 ">
										<label class="input">
											Estado: 
											<input type="text" value='' id="estado_comprador" name="estado_comprador">
										</label>
									</section>
									
									<section class="col-sm-12 col-md-12 col-lg-12 ">
										<label class="input">
											Municipio: 
											<input type="text" value='' id="municipio_comprador" name="municipio_comprador">
										</label>
									</section>
									
									<section class="col-sm-12 col-md-12 col-lg-12 " >
										<label class="input">
											Colonia: 
											<input type="text" value='' id="colonia_comprador" name="colonia_comprador">
										</label>
									</section>
									
									<section class="col-sm-12 col-md-12 col-lg-12 " >
										<label class="input">
											Dirección: 
											<input type="text" value='' id="direccion_comprador" name="direccion_comprador">
										</label>
									</section>
									
									<section class="col-sm-12 col-md-12 col-lg-12 " >
										<label class="input">
											e-mail: 
											<input type="email" value='' id="email_comprador" name="email_comprador">
										</label>
									</section>
									
									<section class="col-sm-12 col-md-12 col-lg-12 " >
										<label class="input">
											Telefono: 
											<input type="number" value='' id="telefono_comprador" name="telefono_comprador">
										</label>
									</section>
								</fieldset>
								<input type="text" class = "hide" value='<?php echo $username; ?>' name="usernameAfiliado">
							<section class="col col-12 pull-right" >
								<button type="submit" class="btn btn-success" onclick="CrearComprador()">
									Agregar
								</button>
							</section>
						</form>
					</div>
				</div>			
		</div>

	</section>

</div>

							
<script type="text/javascript">
function CrearComprador(){
	
	$.ajax({
		type: "post",
		url: "/ov/compras/actualizar_comprador",
		data: $('#form-comprador').serialize()
		})
		.done(function( msg ) {
			alert(msg);
			bootbox.dialog({
				message: msg,
				title: "Atención",
				buttons: {
					success: {
					label: "Ok!",
					className: "btn-success",
					callback: function() {
						
							//a_comprar();
						}
					}
				}
			});
		});
}
													
function buscar_persona()
{
	var dni = $("#dni_comprador").val();
	
	$.ajax({
		type: "POST",
		url: "/ov/compras/buscar_comprador_web_personal",
		data: {dni: dni},
	})
	.done(function( msg )
	{
		alert(msg);
		if(msg == 1){
			//a_comprar();
		}else{
			$("#")
		}
	});
		//va en la vista a_comprar
}
</script>
	</html>