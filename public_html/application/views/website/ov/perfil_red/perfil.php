<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span> > 
				<a href="/ov/perfil_red/">Perfil</a>
				>
					Datos Personales
				</span>
			</h1>
		</div>
	</div>
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
					<!-- widget options:
						usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

						data-widget-colorbutton="false"
						data-widget-editbutton="false"
						data-widget-togglebutton="false"
						data-widget-deletebutton="false"
						data-widget-fullscreenbutton="false"
						data-widget-custombutton="false"
						data-widget-collapsed="true"
						data-widget-sortable="false"

					-->
					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<h2>Datos personales</h2>

					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div id="contentForm" class="widget-body no-padding">
							<form method="POST" action="/perfil_red/actualizar" id="checkout-form" class="smart-form" novalidate="novalidate">
								<fieldset id="pswd">
                              <?php
                echo "<h4 style='color: green; margin-bottom: 1rem;'>".$this->session->flashdata('success')."</h4>";
              ?>
								</fieldset>
								<fieldset>
								<legend>Datos personales</legend>
									<div class="row">
										<section class="col col-3">
											<label class="input"> <i class="icon-prepend fa fa-user"></i>
												<input required type="text" value="<?=$usuario[0]->nombre?>" id="nombre" name="nombre" placeholder="Nombre">
											</label>
										</section>
										<section class="col col-3">
											<label class="input"> <i class="icon-prepend fa fa-user"></i>
												<input required type="text" value="<?=$usuario[0]->apellido?>" id="apellido" name="apellido" placeholder="Apellido">
											</label>
										</section>
										<section class="col col-3">
											<label class="input"> <i class="icon-prepend fa fa-calendar"></i>
												<input required id="datepicker" value="<?=$usuario[0]->nacimiento?>" type="text" name="nacimiento" placeholder="Fecha de nacimiento">
											</label>
										</section>
										<section class="col col-3">
											<label id="correo" class="input"><i class="icon-prepend fa fa-envelope-o"></i>
												<input required value="<?=$usuario[0]->email?>" id="email" type="email" name="email" placeholder="Correo electrónico" onkeyup="use_mail()">
												<b class="tooltip tooltip-top-left"> Ingrese un correo</b>
											</label>
										</section>
									</div>
									<div class="row">
									<div id="tel" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<?php
									foreach ($telefonos as $num)
									{
										if($num->tipo=="Fijo")
										{?>
										<section class="col col-3">
											<label class="input"> <i class="icon-prepend fa fa-phone"></i>
												<input value="<?=$num->numero?>" id="fijo" type="tel" name="fijo[]" placeholder="(99) 99-99-99-99" >
												<b class="tooltip tooltip-top-left"> Teléfono fijo</b>
											</label>
										</section>
									<?php }else{?>
										<section class="col col-3">
											<label class="input"> <i class="icon-prepend fa fa-mobile"></i>
												<input value="<?=$num->numero?>" id="movil" type="tel" name="movil[]" placeholder="(999) 99-99-99-99-99">
												<b class="tooltip tooltip-top-left"> Teléfono móvil</b>
											</label>
										</section>

									<?php }}?>
									</div>
									<section class="col col-3">
										<button type="button" onclick="agregar('1')" class="btn btn-primary">
											&nbsp;Agregar <i class="fa fa-mobile"></i>&nbsp;
										</button>
										<button type="button" onclick="agregar('2')" class="btn btn-primary">
											&nbsp;Agregar <i class="fa fa-phone"></i>&nbsp;
										</button>
									</section>
									</div>
								</fieldset>
								<fieldset>
									<legend>Datos fiscales</legend>
									<div class="row">
										<section class="col col-4">
											<label class="input">
												<input placeholder="RFC" type="text" value="<?=$usuario[0]->keyword?>" name="rfc">
											</label>
										</section>
										<section class="col col-4">
											<label class="select">
												<select id="tipo_fiscal" required name="tipo_fiscal">
												<?php foreach ($tipo_fiscal as $key){if($usuario[0]->id_fiscal==$key->id){?>

													<option selected value="<?=$key->id?>">
														<?=$key->descripcion?>
													</option>
													<?php }else{?>
													<option value="<?=$key->id?>">
														<?=$key->descripcion?>
													</option>
												<?php }}?>
												</select>
											</label>
										</section>
									</div>
								</fieldset>
								<fieldset>
								<legend>Dirección</legend>
									<div id="dir" class="row">
										<section class="col col-2">
											País
											<label class="select">
												<select id="pais" required name="pais">
												<?php foreach ($pais as $key){if($dir[0]->pais==$key->Code){?>

													<option selected value="<?=$key->Code?>">
														<?=$key->Name?>
													</option>
													<?php }else{?>
													<option value="<?=$key->Code?>">
														<?=$key->Name?>
													</option>
												<?php }}?>
												</select>
											</label>
										</section>
										<section class="col col-2">
											<label class="input">
												Código postal
												<input required type="text" id="cp" name="cp" value="<?=$dir[0]->cp?>">
											</label>
										</section>
										<section class="col col-2">
											<label class="input">
												Calle
												<input required type="text" name="calle" value="<?=$dir[0]->calle?>">
											</label>
										</section>
										<section id="colonia" class="col col-2">
											<label class="input">
												Colonia
												<input type="text" name="colonia" value="<?=$dir[0]->colonia?>">
											</label>
										</section>
										<section id="municipio" class="col col-2">
											<label class="input">
												Municipio
												<input type="text" name="municipio" value="<?=$dir[0]->municipio?>">
											</label>
										</section>
										<section id="estado" class="col col-2">
											<label class="input">
												Estado
												<input type="text" name="estado" value="<?=$dir[0]->estado?>">
											</label>
										</section>
									</div>
								</fieldset>
								<fieldset>
									<legend>Estadistica</legend>
									<div class="row">
										<section class="col col-3">Estado civil
											<label class="select">
												<select name="civil">
												<?php foreach ($civil as $key)
												{
													if($key->id_edo_civil==$usuario[0]->id_edo_civil)
														echo '<option selected value="'.$key->id_edo_civil.'">'.$key->descripcion.'</option>';
													else
													echo '<option value="'.$key->id_edo_civil.'">'.$key->descripcion.'</option>';

												}?>
												</select>
											</label>
										</section>
										<section class="col col-3">Edad
											<label class="input"><i class="icon-prepend fa fa-child"></i>
												<input readonly type="text" value="<?=$edad?>" placeholder="Edad">
											</label>
										</section>
										<section class="col col-2">Sexo&nbsp;
											<div class="inline-group">
												<?php
												foreach ($sexo as $value)
												{
													if($usuario[0]->sexo==$value->descripcion)
													{
												?>
														<label class="radio">
														<input checked="checked" type="radio" value="<?=$value->id_sexo?>" name="sexo" placeholder="sexo">
														<i></i><?=$value->descripcion?></label>
													<?php }
													else
													{
														?>
														<label class="radio">
														<input type="radio" value="<?=$value->id_sexo?>" name="sexo" placeholder="sexo">
														<i></i><?=$value->descripcion?></label>
													<?php }
												}?>
												</div>
										</section>
										<section class="col col-2">Estudio&nbsp;
											<div class="inline-group">
												<?php
												foreach ($estudios as $value)
												{
													if($usuario[0]->id_estudio==$value->id_estudio)
													{
												?>
														<label class="radio">
														<input checked="checked" type="radio" value="<?=$value->id_estudio?>" name="estudios">
														<i></i><?=$value->descripcion?></label>
													<?php }
													else
													{
														?>
														<label class="radio">
														<input type="radio" value="<?=$value->id_estudio?>" name="estudios">
														<i></i><?=$value->descripcion?></label>
													<?php }
												}?>
												</div>
										</section>
										<section class="col col-2">Ocupación&nbsp;
											<div class="inline-group">
												<?php
												foreach ($ocupacion as $value)
												{
													if($usuario[0]->id_ocupacion==$value->id_ocupacion)
													{
												?>
														<label class="radio">
														<input checked="checked" type="radio" value="<?=$value->id_ocupacion?>" name="ocupacion">
														<i></i><?=$value->descripcion?></label>
													<?php }
													else
													{
														?>
														<label class="radio">
														<input type="radio" value="<?=$value->id_ocupacion?>" name="ocupacion">
														<i></i><?=$value->descripcion?></label>
													<?php }
												}?>
												</div>
										</section>
										<section class="col col-2">Tiempo dedicado&nbsp;
											<div class="inline-group">
												<?php
												foreach ($tiempo_dedicado as $value)
												{
													if($usuario[0]->id_tiempo_dedicado==$value->id_tiempo_dedicado)
													{
												?>
														<label class="radio">
														<input checked="checked" type="radio" value="<?=$value->id_tiempo_dedicado?>" name="tiempo_dedicado">
														<i></i><?=$value->descripcion?></label>
													<?php }
													else
													{
														?>
														<label class="radio">
														<input type="radio" value="<?=$value->id_tiempo_dedicado?>" name="tiempo_dedicado">
														<i></i><?=$value->descripcion?></label>
													<?php }}?>
												</div>
										</section>
									</div>
								</fieldset>
								<fieldset class="hidden">
								<legend>Oficina virtual</legend>
									<div class="row">
										<section class="col col-3">
											<label class="input">
												Color de fondo
												<input type="color" name="bg_color" value="<?=$usuario[0]->bg_color?>">
											</label>
										</section>
										<section class="col col-3">
											<label class="input">
												Color de botones primarios
												<input type="color" name="color_1" value="<?=$usuario[0]->btn_1_color?>">
											</label>
										</section>
										<section class="col col-3">
											<label class="input">
												Color de botones secundarios
												<input type="color" name="color_2" value="<?=$usuario[0]->btn_2_color?>">
											</label>
										</section>
									</div>
								</fieldset>
								<footer>
									<button type="button" onclick="actualizar()" class="btn btn-success">
										Actualizar
									</button>
								</footer>
							</form>
						 </div>
						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->
			</article>
			<!-- END COL -->
		</div>
    <br/>
	  <br/>
		<!-- END ROW -->
	</section>
	<!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->
<!-- PAGE RELATED PLUGIN(S) -->
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {

	pageSetUp();
});
function actualizar()
{
	var ids = new Array(
		"#nombre",
	 	"#apellido",
	 	"#datepicker",
	 	"#cp"
	 );
	var mensajes = new Array(
		"Por favor ingresa tu nombre",
	 	"Por favor ingresa tu apellido",
	 	"Por favor ingresa tu fecha de nacimiento",
	 	"Por favor ingresa tu código postal"
	 );

	var validacion=valida_vacios(ids,mensajes);
	if(validacion)
	{
		$.ajax({
		type: "POST",
		url: "/ov/perfil_red/actualizar",
		data: $('#checkout-form').serialize()
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
							location.href="";
							}
						}
					}
				});
		});
	}
}
function changepswd()
{

		$.ajax({
			type: "POST",
			url: "/auth/change_password",
			data: $('#pswd').serialize()
		})
		.done(function( msg ) {
			bootbox.dialog({
						message: "¿ Estas seguro que deseas cambiar la contraseña ?",
						title: "Atención",
						buttons: {
							success: {
							label: "Ok!",
							className: "btn-success",
							callback: function() {
								location.href="/auth/change_password";
								}
							}
						}
					});
			});
}
function codpos()
{
	var pais = $("#pais").val();
	if(pais=="MEX")
	{
		var cp=$("#cp").val();
		$.ajax({
			type: "POST",
			url: "/ov/perfil_red/cp",
			data: {cp: cp},
		})
		.done(function( msg )
		{
			$("#colonia").remove();
			$("#municipio").remove();
			$("#estado").remove();
			$("#dir").append(msg);
		})
	}
}
function agregar(tipo)
{
	if(tipo==1)
	{
		$("#tel").append("<section class='col col-3'><label class='input'> <i class='icon-prepend fa fa-mobile'></i><input type='tel' name='movil[]' placeholder='(999) 99-99-99-99-99'></label></section>");
	}
	else
	{
		$("#tel").append("<section class='col col-3'><label class='input'> <i class='icon-prepend fa fa-phone'></i><input type='tel' name='fijo[]' placeholder='(999) 99-99-99-99-99'></label></section>");
	}
}
 $(function()
 {
	$( "#datepicker" ).datepicker({
	changeMonth: true,
	numberOfMonths: 2,
	dateFormat:"yy-mm-dd",
	defaultDate: "1970-01-01",
	changeYear: true
	});
});
 
 function use_mail()
 {
 	$("#msg_correo").remove();
 	var mail=$("#email").val();

 	$.ajax({
 		type: "POST",
 		url: "/ov/perfil_red/use_mail_editar_perfil",
 		data: {mail: mail},
 	})
 	.done(function( msg )
 	{
 		$("#correo").append("<p id='msg_correo'>"+msg+"</msg>")
 	});
 }
</script>
