<form id="evento" class="smart-form"  novalidate="novalidate">
													<fieldset>
														<div class="form-group">
															<b>Selecciona el icono del evento</b>
															<div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">
																<label class="btn btn-default <?php if ($evento[0]->id_tipo=='1') echo 'active'; ?>">
																	<input type="radio" name="iconselect" id="icon-1" value="fa-info" <?php if ($evento[0]->id_tipo=='1') echo 'checked'; ?>>
																	<i class="fa fa-info text-muted"></i> </label>
																<label class="btn btn-default <?php if ($evento[0]->id_tipo=='2') echo 'active'; ?>">
																	<input type="radio" name="iconselect" id="icon-2" value="fa-warning" <?php if ($evento[0]->id_tipo=='2') echo 'checked'; ?>>
																	<i class="fa fa-warning text-muted"></i> </label>
																<label class="btn btn-default <?php if ($evento[0]->id_tipo=='3') echo 'active'; ?>">
																	<input type="radio" name="iconselect" id="icon-3" value="fa-check" <?php if ($evento[0]->id_tipo=='3') echo 'checked'; ?>>
																	<i class="fa fa-check text-muted"></i> </label>
																<label class="btn btn-default <?php if ($evento[0]->id_tipo=='4') echo 'active'; ?>">
																	<input type="radio" name="iconselect" id="icon-4" value="fa-user" <?php if ($evento[0]->id_tipo=='4') echo 'checked'; ?>>
																	<i class="fa fa-user text-muted"></i> </label>
																<label class="btn btn-default <?php if ($evento[0]->id_tipo=='5') echo 'active'; ?>">
																	<input type="radio" name="iconselect" id="icon-5" value="fa-lock" <?php if ($evento[0]->id_tipo=='5') echo 'checked'; ?>>
																	<i class="fa fa-lock text-muted"></i> </label>
																<label class="btn btn-default <?php if ($evento[0]->id_tipo=='6') echo 'active'; ?>">
																	<input type="radio" name="iconselect" id="icon-6" value="fa-clock-o" <?php if ($evento[0]->id_tipo=='6') echo 'checked'; ?>>
																	<i class="fa fa-clock-o text-muted"></i> </label>
															</div>
														</div><br>
														<div class="form-group">
															<b>Titulo del Evento</b>
															<input class="form-control"  id="title_ev" name="title" type="text" 
															placeholder="Titulo del Evento" value="<?php echo $evento[0]->nombre; ?>">
														</div><br>
														<div class="form-group">
															<b>Descripcion del Evento</b>
															<textarea class="form-control" placeholder="Por favor sea breve" rows="3" maxlength="140" id="description_ev"><?php echo $evento[0]->descripcion; ?></textarea>
															<p class="note">Tama&ntilde;o maximo 140 caracteres</p>
														</div><br>
														<div class="form-group">
															<b>Lugar del Evento</b>
															<input class="form-control"  id="lugar_ev" name="title"  type="text" placeholder="Lugar del Evento" value="<?php echo $evento[0]->lugar; ?>">
														</div><br>
														<div class="form-group">
															<b>Costo del Evento</b>
															<input class="form-control"  id="costo_ev" name="title" maxlength="10" type="textju8ie" value="<?php echo $evento[0]->costo; ?>" onChange="validarSiNumero(this.value);">
														</div><br>
														<div class="form-group">
															<b>Direccion</b>
															<textarea class="form-control" placeholder="Direccion" rows="3" id="direccion_ev"><?php echo $evento[0]->direccion; ?></textarea>
														</div><br>
														<div class="form-group">
															<b>URL del mapa</b>
															<input class="form-control"  id="url_ev" name="title" type="text" placeholder="http://maps.google.com..." value="<?php echo htmlentities($evento[0]->url); ?>">
															<a href="/media/Maps.pdf" target="_blank"><h2 class="row-seperator-header"><i class="fa fa-question-circle"></i> ¿ No sabes cual es la url del mapa ?</h2></a>
														</div><br>
														<div class="form-group">
															<b>Observaciones</b>
															<textarea class="form-control" placeholder="Por favor sea breve" rows="3" maxlength="50" id="observacion_ev"><?php echo $evento[0]->observaciones; ?></textarea>
															<p class="note">Tama&ntilde;o maximo 50 caracteres</p>
														</div><br>
														<div class="form-group">
															<b>Selecciona el color del evento</b>
															<div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
																<label class="btn bg-color-darken <?php if ($evento[0]->id_color=='1') echo 'active'; ?>">
																	<input type="radio" name="priority" id="option1" value="bg-color-darken txt-color-white" <?php if ($evento[0]->id_color=='1') echo 'checked'; ?>>
																	<i class="fa fa-check txt-color-white"></i> </label>
																<label class="btn bg-color-blue <?php if ($evento[0]->id_color=='2') echo 'active'; ?>">
																	<input type="radio" name="priority" id="option2" value="bg-color-blue txt-color-white" <?php if ($evento[0]->id_color=='2') echo 'checked'; ?>>
																	<i class="fa fa-check txt-color-white"></i> </label>
																<label class="btn bg-color-orange <?php if ($evento[0]->id_color=='3') echo 'active'; ?>">
																	<input type="radio" name="priority+" id="option3" value="bg-color-orange txt-color-white" <?php if ($evento[0]->id_color=='3') echo 'checked'; ?>>
																	<i class="fa fa-check txt-color-white"></i> </label>
																<label class="btn bg-color-greenLight <?php if ($evento[0]->id_color=='4') echo 'active'; ?>">
																	<input type="radio" name="priority" id="option4" value="bg-color-greenLight txt-color-white" <?php if ($evento[0]->id_color=='4') echo 'checked'; ?>>
																	<i class="fa fa-check txt-color-white"></i> </label>
																<label class="btn bg-color-blueLight <?php if ($evento[0]->id_color=='5') echo 'active'; ?>">
																	<input type="radio" name="priority" id="option5" value="bg-color-blueLight txt-color-white" <?php if ($evento[0]->id_color=='5') echo 'checked'; ?>>
																	<i class="fa fa-check txt-color-white"></i> </label>
																<label class="btn bg-color-red <?php if ($evento[0]->id_color=='6') echo 'active'; ?>">
																	<input type="radio" name="priority" id="option6" value="bg-color-red txt-color-white" <?php if ($evento[0]->id_color=='6') echo 'checked'; ?>>
																	<i class="fa fa-check txt-color-white"></i> </label>
															</div>
														</div><br>
														<div class="row">
															<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<section class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
																	<label class="input"> <i class="icon-append fa fa-calendar"></i>
																		<input type="text" name="startdate" id="startdate" placeholder="Fecha de Inicio" value="<?php $date = date_create(''.$evento[0]->inicio.''); echo date_format($date, 'd-m-Y'); ?>">
																	</label>
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-3 col-xs-6">
																	<label class="select">
																		<select id="hora_ini">
																			<option value="none">Hora</option>
																			<option value="00">00</option>
																			<option value="01">01</option>
																			<option value="02">02</option>
																			<option value="03">03</option>
																			<option value="04">04</option>
																			<option value="05">05</option>
																			<option value="06">06</option>
																			<option value="07">07</option>
																			<option value="08">08</option>
																			<option value="09">09</option>
																			<option value="10">10</option>
																			<option value="11">11</option>
																			<option value="12">12</option>
																			<option value="13">13</option>
																			<option value="14">14</option>
																			<option value="15">15</option>
																			<option value="16">16</option>
																			<option value="17">17</option>
																			<option value="18">18</option>
																			<option value="19">19</option>
																			<option value="20">20</option>
																			<option value="21">21</option>
																			<option value="22">22</option>
																			<option value="23">23</option>
																		</select> <i></i> </label>
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-3 col-xs-6">
																	<label class="select">
																		<select id="minuto_ini">
																			<option value="none">Minuto</option>
																			<option value="00">00</option>
																			<option value="01">01</option>
																			<option value="02">02</option>
																			<option value="03">03</option>
																			<option value="04">04</option>
																			<option value="05">05</option>
																			<option value="06">06</option>
																			<option value="07">07</option>
																			<option value="08">08</option>
																			<option value="09">09</option>
																			<option value="10">10</option>
																			<option value="11">11</option>
																			<option value="12">12</option>
																			<option value="13">13</option>
																			<option value="14">14</option>
																			<option value="15">15</option>
																			<option value="16">16</option>
																			<option value="17">17</option>
																			<option value="18">18</option>
																			<option value="19">19</option>
																			<option value="20">20</option>
																			<option value="21">21</option>
																			<option value="22">22</option>
																			<option value="23">23</option>
																			<option value="24">24</option>
																			<option value="25">25</option>
																			<option value="26">26</option>																			<option value="23">23</option>
																			<option value="27">27</option>
																			<option value="28">28</option>
																			<option value="29">29</option>
																			<option value="30">30</option>
																			<option value="31">31</option>
																			<option value="32">32</option>
																			<option value="33">33</option>
																			<option value="34">34</option>
																			<option value="35">35</option>
																			<option value="36">36</option>
																			<option value="37">37</option>
																			<option value="38">38</option>
																			<option value="39">39</option>
																			<option value="40">40</option>
																			<option value="41">41</option>
																			<option value="42">42</option>
																			<option value="43">43</option>
																			<option value="44">44</option>
																			<option value="45">45</option>
																			<option value="46">46</option>																			<option value="23">23</option>
																			<option value="47">47</option>
																			<option value="48">48</option>
																			<option value="49">49</option>
																			<option value="50">50</option>
																			<option value="51">51</option>
																			<option value="52">52</option>
																			<option value="53">53</option>
																			<option value="54">54</option>
																			<option value="55">55</option>
																			<option value="56">56</option>																			<option value="23">23</option>
																			<option value="57">57</option>
																			<option value="58">58</option>
																			<option value="59">59</option>
																			
																		</select> <i></i> </label>
																</section>
															</div>
														</div>
														<div class="row">
															<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<section class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
																	<label class="input"> <i class="icon-append fa fa-calendar"></i>
																		<input type="text" name="finishdate" id="finishdate" placeholder="Fecha de Finalizacion" value="<?php $date = date_create(''.$evento[0]->fin.''); echo date_format($date, 'd-m-Y'); ?>">
																	</label>
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-3 col-xs-6">
																	<label class="select">
																		<select id="hora_fin">
																			<option value="none">Hora</option>
																			<option value="00">00</option>
																			<option value="01">01</option>
																			<option value="02">02</option>
																			<option value="03">03</option>
																			<option value="04">04</option>
																			<option value="05">05</option>
																			<option value="06">06</option>
																			<option value="07">07</option>
																			<option value="08">08</option>
																			<option value="09">09</option>
																			<option value="10">10</option>
																			<option value="11">11</option>
																			<option value="12">12</option>
																			<option value="13">13</option>
																			<option value="14">14</option>
																			<option value="15">15</option>
																			<option value="16">16</option>
																			<option value="17">17</option>
																			<option value="18">18</option>
																			<option value="19">19</option>
																			<option value="20">20</option>
																			<option value="21">21</option>
																			<option value="22">22</option>
																			<option value="23">23</option>
																		</select> <i></i> </label>
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-3 col-xs-6">
																	<label class="select">
																		<select id="minuto_fin">
																			<option value="none">Minuto</option>
																			<option value="00">00</option>
																			<option value="01">01</option>
																			<option value="02">02</option>
																			<option value="03">03</option>
																			<option value="04">04</option>
																			<option value="05">05</option>
																			<option value="06">06</option>
																			<option value="07">07</option>
																			<option value="08">08</option>
																			<option value="09">09</option>
																			<option value="10">10</option>
																			<option value="11">11</option>
																			<option value="12">12</option>
																			<option value="13">13</option>
																			<option value="14">14</option>
																			<option value="15">15</option>
																			<option value="16">16</option>
																			<option value="17">17</option>
																			<option value="18">18</option>
																			<option value="19">19</option>
																			<option value="20">20</option>
																			<option value="21">21</option>
																			<option value="22">22</option>
																			<option value="23">23</option>
																			<option value="24">24</option>
																			<option value="25">25</option>
																			<option value="26">26</option>																			<option value="23">23</option>
																			<option value="27">27</option>
																			<option value="28">28</option>
																			<option value="29">29</option>
																			<option value="30">30</option>
																			<option value="31">31</option>
																			<option value="32">32</option>
																			<option value="33">33</option>
																			<option value="34">34</option>
																			<option value="35">35</option>
																			<option value="36">36</option>
																			<option value="37">37</option>
																			<option value="38">38</option>
																			<option value="39">39</option>
																			<option value="40">40</option>
																			<option value="41">41</option>
																			<option value="42">42</option>
																			<option value="43">43</option>
																			<option value="44">44</option>
																			<option value="45">45</option>
																			<option value="46">46</option>																			<option value="23">23</option>
																			<option value="47">47</option>
																			<option value="48">48</option>
																			<option value="49">49</option>
																			<option value="50">50</option>
																			<option value="51">51</option>
																			<option value="52">52</option>
																			<option value="53">53</option>
																			<option value="54">54</option>
																			<option value="55">55</option>
																			<option value="56">56</option>																			<option value="23">23</option>
																			<option value="57">57</option>
																			<option value="58">58</option>
																			<option value="59">59</option>
																			
																		</select> <i></i> </label>
																</section>
															</div>
														</div>
													</fieldset>
													
								<a class="btn btn-success" onclick="enviar()">
									Guardar
								</a>
													</div>
												</form>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">

<?php 
$hour_ini = date("H", strtotime($evento[0]->inicio));
$minutes_ini = date("i", strtotime($evento[0]->inicio));

$hour_fin = date("H", strtotime($evento[0]->fin));
$minutes_fin = date("i", strtotime($evento[0]->fin));
?>

$("#hora_ini").val("<?php echo $hour_ini?>");
$("#minuto_ini").val("<?php echo $minutes_ini?>");

$("#hora_fin").val("<?php echo $hour_fin?>");
$("#minuto_fin").val("<?php echo $minutes_fin?>");

$('#startdate').datepicker({
	dateFormat : 'dd-mm-yy',
	prevText : '<i class="fa fa-chevron-left"></i>',
	nextText : '<i class="fa fa-chevron-right"></i>',
	onSelect : function(selectedDate) {
		$('#finishdate').datepicker('option', 'minDate', selectedDate);
	}
});

$('#finishdate').datepicker({
	dateFormat : 'dd-mm-yy',
	prevText : '<i class="fa fa-chevron-left"></i>',
	nextText : '<i class="fa fa-chevron-right"></i>',
	onSelect : function(selectedDate) {
		$('#startdate').datepicker('option', 'maxDate', selectedDate);
	}
});
function enviar()
{
	if($('#icon-1').is(':checked'))
	{
		var tipo=1;
	}
	if($('#icon-2').is(':checked'))
	{
		var tipo=2;
	}
	if($('#icon-3').is(':checked'))
	{
		var tipo=3;
	}
	if($('#icon-4').is(':checked'))
	{
		var tipo=4;
	}
	if($('#icon-5').is(':checked'))
	{
		var tipo=5;
	}
	if($('#icon-6').is(':checked'))
	{
		var tipo=6;
	}
	if($('#option1').is(':checked'))
	{
		var color=1;
	}
	if($('#option2').is(':checked'))
	{
		var color=2;
	}
	if($('#option3').is(':checked'))
	{
		var color=3;
	}
	if($('#option4').is(':checked'))
	{
		var color=4;
	}
	if($('#option5').is(':checked'))
	{
		var color=5;
	}
	if($('#option6').is(':checked'))
	{
		var color=6;
	}
	var nombre=$("#title_ev").val();
	var descripcion=$("#description_ev").val();
	var dia_ini=$("#startdate").val();
	var dia_fin=$("#finishdate").val();
	var hora_ini=$("#hora_ini").val();
	var hora_fin=$("#hora_fin").val();
	var minuto_ini=$("#minuto_ini").val();
	var minuto_fin=$("#minuto_fin").val();
	var lugar=$("#lugar_ev").val();
	var costo=$("#costo_ev").val();
	var direct=$("#direccion_ev").val();
	var url=$("#url_ev").val();
	var observ=$("#observacion_ev").val();
	var id='<?php echo $evento[0]->id; ?>'

	if(costo=='')
	{
		$("#costo_ev").val('0')
	}
	

	if(nombre=='')
	{
		alert('Campo nombre es requerido');
	}
	else
	{
		if(descripcion=='')
		{
			alert('Campo descripcion es requerido');
		}
		else
		{
			if(dia_ini==''||hora_ini=='none'||minuto_ini=='none')
			{
				alert('Inicio del evento no especificado');
			}
			else
			{
				if(dia_fin==''||hora_fin=='none'||minuto_fin=='none')
				{
					alert('Fin del evento no especificado');
				}
				else
				{
					if((dia_fin==dia_ini&&hora_ini>hora_fin)||(dia_fin==dia_ini&&hora_ini==hora_fin&&minuto_ini>minuto_fin))
					{
						alert('La hora de inicio no puede ser mayor que la hora de finalizacion');
					}
					else
					{
						var datos={'id':id,'tipo':tipo,'color':color,'nombre':nombre,'descripcion':descripcion,'dia_ini':dia_ini,'dia_fin':dia_fin,'hora_ini':hora_ini,'hora_fin':hora_fin,'minuto_ini':minuto_ini,'minuto_fin':minuto_fin,'lugar':lugar,'costo':costo,'direccion':direct,'url':url,'observaciones':observ};
						
						 $.ajax({
												url: "/bo/eventos/actualizar_evento",
												data:{info:JSON.stringify(datos)},
										        type: "get"
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
																	location.href="/bo/eventos/listar";
																	}
																}
															}
														});
											});//fin Done ajax
					}
				}
				
			}
		}
	}
	
}
function validarSiNumero(numero){
    if (!/^([0-9])*$/.test(numero)){
      alert("El valor " + numero + " no es un número");
      $("#costo_ev").val('')
    }
  }
</script>
