<div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; margin-right: 0px; margin-left: 0px; padding-bottom: 3rem;" class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<form action="/bo/comercial/actualizar_afiliado" method="POST" role="form" class="smart-form">
			<legend>Modificar Datos del Afiliado</legend>


			<div class="form-group">

				<input type="text" class="hide" name="id" id="id" value = '<?= $id_afiliado; ?>' >
					<div class="row col-xs-12 col-md-6 col-sm-4 col-lg-12">
					
						<section style="width: 50%;" class="col col-2">
							<label style="width: 100%">Nombre <br>
								<input type="text" class="form-control" name="nombre" id="nombre" required>
							</label>
						</section>
						
						<section style="width: 50%;" class="col col-2">
							<label for="">Apellido</label>
							<input type="text" class="form-control" name="apellido" id="apellido" required>
						</section>
						
						<section id="usuario" style="width: 50%;" class="col col-2">
							<label for="">Usuario</label>
							<input type="text" onkeyup="use_username()" class="form-control" name="username" id="username" required>
						</section>
						
						<section id="correo" style="width: 50%;" class="col col-2">
							e-mail
							<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
								<input type="text" onkeyup="use_mail()" class="form-control" name="mail" id="mail" required>
							</label>
						</section>
					
						<section style="width: 50%;" class="col col-2">
							
							<label class="input"> 
								<input type="text" class="hide" name="" id="" >
							</label>
						</section>
				
						<section style="width: 50%;" class="col col-2">
							Sexo
		
							<label class="select">
								<select id="sexo" required name="sexo">
									
									<?	foreach ($tiposDeSexo as $key)
										{		?>
												<option value="<?=$key->id_sexo?>" >
													<?= $key->descripcion;?>	
												</option>
										<?  
										}
									?>
		
								</select>
							</label>
						</section>

						<section style="width: 50%;" class="col col-2">
						Fecha de nacimiento
							<label class="input"> <i class="icon-prepend fa fa-calendar"></i>
								<input required readonly id="datepicker" type="text" name="nacimiento" >
							</label>
						</section>
		
						<section style="width: 50%;" class="col col-2">
							Estado Civil
		
							<label class="select">
								<select id="estadoCivil"  name="estadoCivil">
		
									<?	foreach ($tiposDeEstadoCivil as $key)
										{
											?>
												<option value="<?=$key->id_edo_civil?>" >
													<?= $key->descripcion;?>	
												</option>
										<?  
										}
									?>
		
								</select>
							</label>
						</section>
		
						<section style="width: 50%;" class="col col-2 hide">
							Tipo de Usuario
						
							<label class="hide">
								<select id="tipoUsuario"  name="tipoUsuario">
									
									<?	/*foreach ($tiposDeUsuario as $key)
										{
											?>
												<option value="<?=$key->id_tipo_usuario?>" >
													<?= $key->descripcion;?>	
												</option>
										<?  
										}*/
									?>
		
								</select>
							</label>
						</section>
		
		
						<section style="width: 50%;" class="col col-2">
							Nivel de Estudios
						
							<label class="select">
								<select id="estudio"  name="estudio">
									
									<?	foreach ($tiposDeEstudio as $key)
										{
											?>
												<option value="<?=$key->id_estudio?>" >
													<?= $key->descripcion;?>	
												</option>
										<?  
										}
									?>
		
								</select>
							</label>
						</section>
		
						<section style="width: 50%;" class="col col-2">
							Ocupación
						
							<label class="select">
								<select id="ocupacion"  name="ocupacion">
									
									<?	foreach ($tiposDeOcupacion as $key)
										{
											?>
												<option value="<?=$key->id_ocupacion?>" >
													<?= $key->descripcion;?>	
												</option>
										<?  
										}
									?>
		
								</select>
							</label>
						</section>
		
						<section style="width: 50%;" class="col col-2">
							Tiempo de Dedicación
						
							<label class="select">
								<select id="tiempoDedicado"  name="tiempoDedicado">
									
									<?	foreach ($tiposDeTiempoDedicacion as $key)
										{?>
												<option value="<?=$key->id_tiempo_dedicado?>" >
													<?= $key->descripcion;?>	
												</option>
										<?  
										}
									?>
		
								</select>
							</label>
						</section>
		
						<section style="width: 50%;" class="col col-2">
							Estado de Afiliado
						
							<label class="select">
								<select id="estadoAfiliado"  name="estadoAfiliado">
									
									<?	foreach ($tiposDeEstadosAfiliado as $key)
										{									?>
											
												<option value="<?=$key->id_estatus?>" >
													<?= $key->descripcion;?>	
												</option>
										<?  
										}
									?>
		
								</select>
							</label>
						</section>
						
						<section style="width: 50%;" class="col col-2">
							<label for="">Nombre del Co-aplicante</label>
							<input type="text" class="form-control" name="nombreCo" id="nombreCo"  >
						</section>
						
						<section style="width: 50%;" class="col col-2">
							<label for="">Apellido del Co-aplicante</label>
							<input type="text" class="form-control" name="apellidoCo" id="apellidoCo" >
						</section>
				</div>
			</div>
			<button type="submit" class="btn btn-success pull-right " >Actualizar</button>
		</form>
		
	</div>
</div>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>

<script type="text/javascript">


$(function()
{
	var a = new Date();
 	año = a.getFullYear()-19;
	$( "#datepicker" ).datepicker({
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat:"yy-mm-dd",
		maxDate: año+"-12-31",
		changeYear: true
	});
});

function mensaje_notificacion(){
	bootbox.dialog({
		  message: "La modificación del afiliado ha sido exitosa.",
		  title: "Modificación del afiliado",
		  buttons: {
		    success: {
		      label: "Ok",
		      className: "hide",
		      callback: function() {
		    	  location.href="/bo/comercial/red_tabla?id_red";
		      }
		    }
		  }
		})
}

function use_username()
{
	$("#msg_usuario").remove();
	var username=$("#username").val();
	var id=$("#id").val();
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/use_username_modificar",
		data: {username: username,id: id},
	})
	.done(function( msg )
	{
		$("#usuario").append("<p id='msg_usuario'>"+msg+"</msg>")
	});
}
function use_mail()
{
	$("#msg_correo").remove();
	var mail=$("#mail").val();
	var id=$("#id").val();
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/use_mail_modificar",
		data: {mail: mail, id:id},
	})
	.done(function( msg )
	{
		$("#correo").append("<p id='msg_correo'>"+msg+"</msg>")
	});
}

</script>
<!-- 
select U.id, UP.nombre, UP.apellido, U.username, U.email, CS.descripcion as sexo,
CEC.descripcion as estado_civil, CTU.descripcion as tipo_usuario, CE.descripcion as estudio,
CO.descripcion as ocupacion, CTD.descripcion as tiempo_dedicado, CEA.descripcion

from users U, user_profiles UP, cat_sexo CS, cat_edo_civil CEC, cat_tipo_usuario CTU,
cat_estudios CE, cat_ocupacion CO, cat_tiempo_dedicado CTD, cat_estatus_afiliado CEA
 
where UP.id_sexo = CS.id_sexo and UP.id_edo_civil = CEC.id_edo_civil and UP.id_tipo_usuario = CTU.id_tipo_usuario
and UP.id_estudio = CE.id_estudio and UP.id_ocupacion = CO.id_ocupacion and U.id = UP.user_id 
and UP.id_tiempo_dedicado = CTD.id_tiempo_dedicado and UP.id_estatus = CEA.id_estatus

 group by (U.id);
 -->
