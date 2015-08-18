
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-pencil-square-o"></i> 
				<a href="/bo/comercial">Comercial</a>
				<!--<span>>
					<a href="/bo/admin">Módulo administrativo</a>
				</span>-->
				<span>>
					Mercancia
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
				<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false"	>
					
					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<h2>Mercancia</h2>				
						
					</header>

					<!-- widget div-->
					<div>
						<div class="widget-body">
							<form method="POST" enctype="multipart/form-data"  action="/bo/admin/new_mercancia" id="mercancia" class="smart-form" novalidate="novalidate">
								<fieldset>
									<legend>Alta de mercancía</legend>
									<section class="col col-3" id="b_persona">
										Tipo de mercancia
										<label class="select">
											<select onchange="formulario()" name="tipo_mercancia" id="tipo_mercancia" required name="">
												<option value="1">Producto</option>
												<option value="2">Servicio</option>
												<option value="3">Promocion</option>
											</select>
										</label>
									</section>
								</fieldset>
								<fieldset>
									<legend>Datos <span id="tipo_mercancia_txt">del producto</span></legend>
									<div id="form_mercancia">
										<div class="row">
											<fieldset>
												<section class="col col-2">
													<label class="input">
														Nombre
														<input required type="text" id="nombre_p" name="nombre">
													</label>
												</section>
												<section class="col col-2">
													<label class="input">
														Concepto
														<input required type="text" id="concepto" name="concepto">
													</label>
												</section>
												<section class="col col-2">
													<label class="input">
														Marca
														<input type="text" name="marca" id="marca">
													</label>
												</section>
												<section class="col col-2">
													<label class="input">
														Código de barras
														<input type="text" name="codigo_barras" id="codigo_barras">
													</label>
												</section>
												<section class="col col-3">Grupo
													<label class="select">
														<select name="grupo">
															<?foreach ($grupo as $key)
															{?>
															<option value="<?=$key->id_grupo?>"><?=$key->descripcion?></option>	
															<?}?>
														</select>
													</label>
													<a href="#" onclick="new_grupo()">Agregar grupo <i class="fa fa-plus"></i></a>
													<a href="#" class="pull-right" onclick="kill_grupo()">Eliminar grupo <i class="fa fa-minus"></i></a>
												</section>
												<div>
													<section style="padding-left: 0px;" class="col col-6">
														Descripcion
														<textarea name="descripcion" style="max-width: 96%" id="mymarkdown"></textarea>
													</section>
													<section id="imagenes" class="col col-6">
														<label class="label">Imágen</label>
														<div class="input input-file">
															<span class="button">
																<input id="img" name="img[]" onchange="this.parentNode.nextSibling.value = this.value" type="file" multiple>Buscar</span><input id="imagen_mr" placeholder="Agregar alguna imágen" readonly="" type="text">
															</div>
															<small>Para cargar múltiples archivos, presione la tecla ctrl y sin soltar selecione sus archivos.<br /><cite title="Source Title">Para ver los archivos que va a cargar, deje el puntero sobre el boton de "Buscar"</cite></small>
														</section>
													</div>
												</fieldset>
												<fieldset>
													<legend>Fisicos</legend>
													<section class="col col-2">
														<label class="input">
															Peso
															<input required type="number" min="0" name="peso" id="peso">
														</label>
													</section>
													<section id="colonia" class="col col-2">
														<label class="input">
															Alto
															<input type="number" min="0" name="alto" id="alto">
														</label>
													</section>
													<section id="municipio" class="col col-2">
														<label class="input">
															Ancho
															<input type="number" min="0" name="ancho" id="ancho">
														</label>
													</section>
													<section id="municipio" class="col col-2">
														<label class="input">
															Profundidad
															<input type="number" min="0" name="profundidad" id="profundidad">
														</label>
													</section>
													<section id="municipio" class="col col-2">
														<label class="input">
															Diametro
															<input type="number" min="0" name="diametro" id="diametro">
														</label>
													</section>
												</fieldset>
												<fieldset id="moneda_field">
													<legend>Moneda y país</legend>
													<section class="col col-2">
														<label class="input">
															Cantidad mínima de venta
															<input type="text" name="min_venta" id="min_venta">
														</label>
													</section>
													<section class="col col-2">
														<label class="input">
															Cantidad máxima de venta
															<input type="text" name="max_venta" id="max_venta">
														</label>
													</section>
													<section class="col col-2">
														<label class="input">
															Costo real
															<input type="text" name="real" id="real">
														</label>
													</section>
													<section class="col col-2">
														<label class="input">
															Costo distribuidores
															<input type="text" name="costo" id="costo">
														</label>
													</section>
													<section class="col col-2">
														<label class="input">
															Costo publico
															<input type="text" name="costo_publico" id="costo_publico">
														</label>
													</section>
													<section class="col col-2">
														<label class="input">
															Tiempo mínimo de entrega
															<input placeholder="En días" type="text" name="entrega" id="entrega">
														</label>
													</section>
													
													<section class="col col-3">Proveedor
														<label class="select">
															<select name="proveedor">
																<?foreach ($proveedores as $key)
																{?>
																<option value="<?=$key->id_usuario?>"><?=$key->nombre." ".$key->apellido?> comisión: %<?=$key->comision?></option>	
																<?}?>
															</select>
														</label>
													</section>
													
													<section class="col col-3">País de la mercancía
														<label class="select">
															<select id="pais" required name="pais">
																<?foreach ($pais as $key)
																{?>
																<option value="<?=$key->Code?>">
																	<?=$key->Name?>
																</option>
																<?}?>
															</select>
														</label>
													</section>
													<section class="col col-3">
														<label class="input">
															Puntos comisionables
															<input type="number" min="1" max="" name="puntos_com" id="puntos_com">
														</label>
													</section>
													<section class="col col-3">Impuesto
														<label class="select">
															<select name="id_impuesto[]">
																<?foreach ($impuesto as $key)
																{?>
																<option value="<?=$key->id_impuesto?>"><?=$key->descripcion." ".$key->porcentaje."%"?></option>	
																<?}?>
															</select>
														</label>
														<a href="#" onclick="add_impuesto()">Agregar impuesto<i class="fa fa-plus"></i></a>
														<a href="#" clas="pull-right" onclick="new_impuesto()">Nuevo impuesto<i class="fa fa-plus"></i></a>
														<a href="#" onclick="kill_impuesto()">Eliminar impuesto<i class="fa fa-plus"></i></a>
													</section>
												</fieldset>
												<fieldset>
													<legend>Extra</legend>
													<section class="col col-2">Requiere instalación
														<div class="inline-group">
															<label class="radio">
																<input type="radio" value="1" name="instalacion" checked="">
																<i></i>Si</label>
																<label class="radio">
																	<input type="radio" value="0" name="instalacion">
																	<i></i>No</label>
																</div>
															</section>
															<section class="col col-2">Requiere especificación
																<div class="inline-group">
																	<label class="radio">
																		<input type="radio" value="1" name="especificacion" checked="">
																		<i></i>Si</label>
																		<label class="radio">
																			<input type="radio" value="0" name="especificacion">
																			<i></i>No</label>
																		</div>
																	</section>
																	<section class="col col-2">Requiere producción
																		<div class="inline-group">
																			<label class="radio">
																				<input type="radio" value="1" name="produccion" checked="">
																				<i></i>Si</label>
																				<label class="radio">
																					<input type="radio" value="0" name="produccion">
																					<i></i>No</label>
																				</div>
																			</section>
																			<section class="col col-2">Producto de importación
																				<div class="inline-group">
																					<label class="radio">
																						<input type="radio" value="1" name="importacion" checked="">
																						<i></i>Si</label>
																						<label class="radio">
																							<input type="radio" value="0" name="importacion">
																							<i></i>No</label>
																						</div>
																					</section>
																					<section class="col col-2">Producto de sobrepedido
																						<div class="inline-group">
																							<label class="radio">
																								<input type="radio" value="1" name="sobrepedido" checked="">
																								<i></i>Si</label>
																								<label class="radio">
																									<input type="radio" value="0" name="sobrepedido">
																									<i></i>No</label>
																								</div>
																							</section>
																						</fieldset>
																					</div>
																				</div>
																			</fieldset>
																			<footer>
																				<button type="submit" class="btn btn-primary">
																					Agregar
																				</button>
																			</footer>
																		</form>
																	</div>

																</div>
																<!-- end widget div -->
															
														</article>
														<!-- END COL -->
													</div>

												</section>
												<!-- end widget grid -->
											</div>
											<!-- END MAIN CONTENT -->
											<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
											<script src="/template/js/plugin/markdown/markdown.min.js"></script>
											<script src="/template/js/plugin/markdown/to-markdown.min.js"></script>
											<script src="/template/js/plugin/markdown/bootstrap-markdown.min.js"></script>
											<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
											<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
											<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
											<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
											<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
											<script src="/template/js/validacion.js"></script>
											<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {
	
	$("#mymarkdown").markdown({
		autofocus:false,
		savable:false
	})


	/* BASIC ;*/
	var responsiveHelper_dt_basic = undefined;
	var responsiveHelper_datatable_fixed_column = undefined;
	var responsiveHelper_datatable_col_reorder = undefined;
	var responsiveHelper_datatable_tabletools = undefined;

	var breakpointDefinition = {
		tablet : 1024,
		phone : 480
	};

	$('#dt_basic').dataTable({
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
		"t"+
		"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		"autoWidth" : true,
		"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_basic) {
					responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_dt_basic.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_dt_basic.respond();
			}
		});

	/* END BASIC */

	/* BASIC ;*/
	var responsiveHelper_dt_basic = undefined;
	var responsiveHelper_datatable_fixed_column = undefined;
	var responsiveHelper_datatable_col_reorder = undefined;
	var responsiveHelper_datatable_tabletools = undefined;

	var breakpointDefinition = {
		tablet : 1024,
		phone : 480
	};

	$('#dt_basic_paquete').dataTable({
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
		"t"+
		"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		"autoWidth" : true,
		"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_basic) {
					responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_dt_basic.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_dt_basic.respond();
			}
		});

	/* END BASIC */

	pageSetUp();

})
function new_user()
{
	var ids=new Array(
		"#username",
		"#email",
		"#password",
		"#confirm_password",
		"#nombre",
		"#apellido",
		"#datepicker",
		"#pais",
		"#cp",
		"#calle"
		);
	var mensajes=new Array(
		"Por favor ingresa un nombre de usuario",
		"Por favor ingresa un correo electronico",
		"Por favor ingresa una contraseña",
		"Por favor confirma la contraseña",
		"Por favor ingresa tu nombre",
		"Por favor ingresa tu apellido",
		"Por favor ingresa tu fecha de nacimineto",
		"Por favor especifica tu pais",
		"Por favor ingresa tu codigo postal",
		"Por favor ingresa tu dirección"
		);
	var id_ml=new Array(
		"#email"
		);
	var eml_mns=new Array(
		"Por favor ingrese un correo valido"
		);
	var psswrds=new Array(
		"#password",
		"#confirm_password"
		);
	var id_tamano=Array(
		"#cp"
		);
	var mensaje_tamano=Array(
		"El codigo postal debe de tener al menos 5 caracteres"
		);
	var tamano_min=Array(
		"5"
		);
	var tamano_max=Array(
		"10"
		);
	var id_fecha=Array(
		"#datepicker"
		);
	var mensaje_fecha=Array(
		"El formato de al fecha es incorrecto (aaaa-mm-dd)"
		);
	var ids_esp=new Array(
		"#username"
		);
	var mensajes_esp=new Array(
		"El nombre de usuario no puede contener espacios en blanco"
		);
	
	var validacion=valida_vacios(ids,mensajes);
	var val_espacios=valida_espacios(ids_esp,mensajes_esp);
	var val_email=valida_correo(id_ml,eml_mns);
	var val_psswrds=valida_psswrds(psswrds,"Las contraseñas deben de ser iguales");
	var val_tamano=valida_tamano(id_tamano,tamano_min,tamano_max,mensaje_tamano);
	var val_fecha=valida_fecha(id_fecha,mensaje_fecha);
	if(val_espacios&&validacion&&val_email&&val_psswrds&&val_tamano&&val_fecha)
	{
		$("#afiliar").remove();
		$("#footer").append('<div class="progress progress-sm progress-striped active"><div id="progress" class="progress-bar bg-color-darken"  role="progressbar" style=""></div></div>');
		$.ajax({
			type: "POST",
			url: "/auth/register",
			data: $('#register').serialize()
		})
		.done(function( msg ) {
			$("#progress").attr('style','width: 40%');
			var email=$("#email").val();
			$("#checkout-form").append("<input value='"+email+"' type='hidden' name='mail_important'>");
			$.ajax({
				type: "POST",
				url: "/bo/admin/new_user",
				data: $('#checkout-form').serialize()
			})
			.done(function( msg ) {
				$("#progress").attr('style','width: 100%');
				bootbox.dialog({
					message: "El usuario ha sido registrado",
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
		});
	}	
}

function codpos()
{
	var pais = $("#pais").val();
	if(pais=="MEX")
	{
		var cp=$("#cp").val();
		$.ajax({
			type: "POST",
			url: "/bo/admin/cp",
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
function codpos_proveedor()
{
	var pais = $("#pais_proveedor").val();
	if(pais=="MEX")
	{
		var cp=$("#cp_proveedor").val();
		$.ajax({
			type: "POST",
			url: "/bo/admin/cp_proveedor",
			data: {cp: cp},
		})
		.done(function( msg )
		{
			$("#colonia_proveedor").remove();
			$("#municipio_proveedor").remove();
			$("#estado_proveedor").remove();
			$("#dir_proveedor").append(msg);
		})
	}
}
function use_username()
{
	$("#msg_usuario").remove();
	var username=$("#username").val();

	$.ajax({
		type: "POST",
		url: "/bo/admin/use_username",
		data: {username: username},
	})
	.done(function( msg )
	{
		$("#usuario").append("<p id='msg_usuario'>"+msg+"</msg>");
	});
}
function use_mail()
{
	$("#msg_correo").remove();
	var mail=$("#email").val();
	$.ajax({
		type: "POST",
		url: "/bo/admin/use_mail",
		data: {mail: mail},
	})
	.done(function( msg )
	{
		$("#correo").append("<p id='msg_correo'>"+msg+"</msg>")
	});
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
function agregar1(tipo)
{
	if(tipo==1)
	{
		$("#tel1").append("<section class='col col-3'><label class='input'> <i class='icon-prepend fa fa-mobile'></i><input type='tel' name='movil[]' placeholder='(999) 99-99-99-99-99'></label></section>");
	}
	else
	{
		$("#tel1").append("<section class='col col-3'><label class='input'> <i class='icon-prepend fa fa-phone'></i><input type='tel' name='fijo[]' placeholder='(999) 99-99-99-99-99'></label></section>");
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
$(function()
{
	$( "#datepicker1" ).datepicker({
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat:"yy-mm-dd",
		defaultDate: "1970-01-01",
		changeYear: true
	});
});
function formulario()
{
	var tipo=$("#tipo_mercancia").val();
	if(tipo==1)
	{
		$("#tipo_mercancia_txt").empty();
		$("#tipo_mercancia_txt").append("del producto");
		$("#form_mercancia").empty();
		$("#form_mercancia").append('<div class="row">'
			+'<fieldset>'
			+'<section class="col col-2">'
			+'<label class="input">Nombre'
			+'<input required type="text" id="nombre_p" name="nombre">'
			+'</label>'
			+'</section>'
			+'<section class="col col-2">'
			+'<label class="input">Concepto'
			+'<input required type="text" id="concepto" name="concepto">'
			+'</label>'
			+'</section>'
			+'<section class="col col-2">'
			+'<label class="input">Marca'
			+'<input type="text" name="marca" id="marca">'
			+'</label>'
			+'</section>'
			+'<section class="col col-2">'
			+'<label class="input">Código de barras'
			+'<input type="text" name="codigo_barras">'
			+'</label>'
			+'</section>'
			+'<section class="col col-3">Grupo'
			+'<label class="select">'
			+'<select name="grupo">'
			+'<?foreach ($grupo as $key){?>'
			+'<option value="<?=$key->id_grupo?>"><?=$key->descripcion?></option>'
			+'<?}?>'
			+'</select>'
			+'</label>'
			+'<a href="#" onclick="new_grupo()">Agregar grupo <i class="fa fa-plus"></i></a>'
			+'<a href="#" class="pull-right" onclick="kill_grupo()">Eliminar grupo <i class="fa fa-minus"></i></a>'
			+'</section>'
			+'<div>'
			+'<section style="padding-left: 0px;" class="col col-6">Descripcion'
			+'<textarea name="descripcion" style="max-width: 96%" id="mymarkdown"></textarea>'
			+'</section>'
			+'<section id="imagenes" class="col col-6">'
			+'<label class="label">Imágen</label>'
			+'<div class="input input-file"><span class="button"><input id="img" name="img[]" onchange="this.parentNode.nextSibling.value=this.value" type="file" multiple>Buscar</span>'
			+'<input id="imagen_mr" placeholder="Agregar alguna imágen" readonly="" type="text">'
			+'</div>'
			+'<small>Para cargar múltiples archivos, presione la tecla ctrl y sin soltar selecione sus archivos.<br/><cite title="Source Title">Para ver los archivos que va a cargar, deje el puntero sobre el boton de "Buscar"</cite></small>'
			+'</section>'
			+'</div>'
			+'</fieldset>'
			+'<fieldset>'
			+'<legend>Fisicos</legend>'
			+'<section class="col col-2">'
			+'<label class="input">Peso'
			+'<input required type="number" min="0" name="peso">'
			+'</label>'
			+'</section>'
			+'<section id="colonia" class="col col-2">'
			+'<label class="input">Alto'
			+'<input type="number" min="0" name="alto">'
			+'</label>'
			+'</section>'
			+'<section id="municipio" class="col col-2">'
			+'<label class="input">Ancho'
			+'<input type="number" min="0" name="ancho">'
			+'</label>'
			+'</section>'
			+'<section id="municipio" class="col col-2">'
			+'<label class="input">Profundidad'
			+'<input type="number" min="0" name="profundidad">'
			+'</label>'
			+'</section>'
			+'<section id="municipio" class="col col-2">'
			+'<label class="input">Diametro'
			+'<input type="number" min="0" name="diametro">'
			+'</label>'
			+'</section>'
			+'</fieldset>'
			+'<fieldset id="moneda_field">'
			+'<legend>Moneda y país</legend>'
			+'<section class="col col-2">'
			+'<label class="input">Cantidad mínima de venta'
			+'<input type="text" name="min_venta">'
			+'</label>'
			+'</section>'
			+'<section class="col col-2">'
			+'<label class="input">Cantidad máxima de venta'
			+'<input type="text" name="max_venta">'
			+'</label>'
			+'</section>'
			+'<section class="col col-2">'
			+'<label class="input">Costo distribuidores'
			+'<input type="text" name="costo">'
			+'</label>'
			+'</section>'
			+'<section class="col col-2">'
			+'<label class="input">'
			+'Costo real'
			+'<input type="text" name="real" >'
			+'</label>'
			+'</section>'
			+'<section class="col col-2">'
			+'<label class="input">Costo publico'
			+'<input type="text" name="costo_publico">'
			+'</label>'
			+'</section>'
			+'<section class="col col-2">'
			+'<label class="input">'
			+'Tiempo mínimo de entrega'
			+'<input placeholder="En días" type="text" name="entrega" >'
			+'</label>'
			+'</section>'
			+'<section class="col col-3">Impuesto'
			+'<label class="select">'
			+'<select name="id_impuesto[]">'
			+'<?foreach ($impuesto as $key){?>'
			+'<option value="<?=$key->id_impuesto?>"><?=$key->descripcion." ".$key->porcentaje."%"?></option>'	
			+'<?}?>'
			+'</select>'
			+'</label>'
			+'<a href="#" onclick="add_impuesto()">Agregar impuesto<i class="fa fa-plus"></i></a>'
			+'<a href="#" clas="pull-right" onclick="new_impuesto()">Nuevo impuesto<i class="fa fa-plus"></i></a>'
			+'<a href="#" onclick="kill_impuesto()">Eliminar impuesto<i class="fa fa-plus"></i></a>'
			+'</section>'
			+'<section class="col col-3">Proveedor'
			+'<label class="select">'
			+'<select name="proveedor">'
			+'<?foreach ($proveedores as $key){?>'
			+'<option value="<?=$key->id_usuario?>">'
			+'<?=$key->nombre." ".$key->apellido?> comisión: %'
			+'<?=$key->comision?></option>'
			+'<?}?>'
			+'</select>'
			+'</label>'
			+'</section>'
			+'<section class="col col-3">País del producto'
			+'<label class="select">'
			+'<select id="pais" required name="pais">'
			+'<?foreach ($pais as $key){?>'
			+'<option value="<?=$key->Code?>">'
			+'<?=$key->Name?></option>'
			+'<?}?>'
			+'</select>'
			+'</label>'
			+'</section>'
			+'<section class="col col-3">'
			+'<label class="input">'
			+'Puntos comisionables'
			+'<input type="number" min="1" max="" name="puntos_com" id="puntos_com">'
			+'</label>'
			+'</section>'
			+'</fieldset>'
			+'<fieldset>'
			+'<legend>Extra</legend>'
			+'<section class="col col-2">Requiere instalación'
			+'<div class="inline-group">'
			+'<label class="radio">'
			+'<input type="radio" value="1" name="instalacion" checked=""><i></i>Si</label>'
			+'<label class="radio">'
			+'<input type="radio" value="0" name="instalacion"><i></i>No</label>'
			+'</div>'
			+'</section>'
			+'<section class="col col-2">Requiere especificación'
			+'<div class="inline-group">'
			+'<label class="radio">'
			+'<input type="radio" value="1" name="especificacion" checked=""><i></i>Si</label>'
			+'<label class="radio">'
			+'<input type="radio" value="0" name="especificacion"><i></i>No</label>'
			+'</div>'
			+'</section>'
			+'<section class="col col-2">Requiere producción'
			+'<div class="inline-group">'
			+'<label class="radio">'
			+'<input type="radio" value="1" name="produccion" checked=""><i></i>Si</label>'
			+'<label class="radio">'
			+'<input type="radio" value="0" name="produccion"><i></i>No</label>'
			+'</div>'
			+'</section>'
			+'<section class="col col-2">Producto de importación'
			+'<div class="inline-group">'
			+'<label class="radio">'
			+'<input type="radio" value="1" name="importacion" checked=""><i></i>Si</label>'
			+'<label class="radio">'
			+'<input type="radio" value="0" name="importacion"><i></i>No</label>'
			+'</div>'
			+'</section>'
			+'<section class="col col-2">Producto de sobrepedido'
			+'<div class="inline-group">'
			+'<label class="radio">'
			+'<input type="radio" value="1" name="sobrepedido" checked=""><i></i>Si</label>'
			+'<label class="radio">'
			+'<input type="radio" value="0" name="sobrepedido"><i></i>No</label>'
			+'</div>'
			+'</section>'
			+'</fieldset>'
			+'</div>');

$("#mymarkdown").markdown({
	autofocus:false,
	savable:false
})
}
if(tipo==2)
{
	$("#tipo_mercancia_txt").empty();
	$("#tipo_mercancia_txt").append("del servicio");
	$("#form_mercancia").empty();
	$("#form_mercancia").append('<div class="row">'
		+'<fieldset>'
		+'<section class="col col-2">'
		+'<label class="input">Nombre'
		+'<input required type="text" id="nombre_s" name="nombre">'
		+'</label>'
		+'</section>'
		+'<section class="col col-2">'
		+'<label class="input">Concepto'
		+'<input required type="text" id="concepto" name="concepto">'
		+'</label>'
		+'</section>'
		+'<section class="col col-2">'
		+'<label class="input">Fecha de inicio'
		+'<input required type="text" name="fecha_inicio" id="startdate" /> </label>'
		+'</section>'
		+'<section class="col col-2">'
		+'<label class="input">Fecha de termino'
		+'<input type="text" name="fecha_fin" id="finishdate" /> </label>'
		+'</section>'
		+'<div>'
		+'<section style="padding-left: 0px;" class="col col-6">Descripcion'
		+'<textarea name="descripcion" style="max-width: 96%" id="mymarkdown"></textarea>'
		+'</section>'
		+'<section id="imagenes" class="col col-6">'
		+'<label class="label">Imágen</label>'
		+'<div class="input input-file"><span class="button"><input id="img" name="img[]" onchange="this.parentNode.nextSibling.value=this.value" type="file" multiple>Buscar</span>'
		+'<input id="imagen_mr" placeholder="Agregar alguna imágen" readonly="" type="text">'
		+'</div><small>Para cargar múltiples archivos, presione la tecla ctrl y sin soltar selecione sus archivos.<br/><cite title="Source Title">Para ver los archivos que va a cargar, deje el puntero sobre el boton de "Buscar"</cite></small>'
		+'</section>'
		+'</div>'
		+'</fieldset>'
		+'<fieldset id="moneda_field">'
		+'<legend>Moneda y país</legend>'
		+'<section class="col col-2">'
		+'<label class="input">'
		+'Costo real'
		+'<input type="text" name="real" id="real">'
		+'</label>'
		+'</section>'
		+'<section class="col col-2">'
		+'<label class="input">Costo distribuidores'
		+'<input type="text" name="costo" id="costo">'
		+'</label>'
		+'</section>'
		+'<section class="col col-2">'
		+'<label class="input">Costo publico'
		+'<input type="text" name="costo_publico" id="costo_publico">'
		+'</label>'
		+'</section>'
		+'<section class="col col-2">'
		+'<label class="input">'
		+'Tiempo mínimo de entrega'
		+'<input placeholder="En días" type="text" name="entrega" id="entrega">'
		+'</label>'
		+'</section>'
		+'<section class="col col-3">Impuesto'
		+'<label class="select">'
		+'<select name="id_impuesto[]">'
		+'<?foreach ($impuesto as $key){?>'
		+'<option value="<?=$key->id_impuesto?>"><?=$key->descripcion." ".$key->porcentaje."%"?></option>'	
		+'<?}?>'
		+'</select>'
		+'</label>'
		+'<a href="#" onclick="add_impuesto()">Agregar impuesto<i class="fa fa-plus"></i></a>'
		+'<a href="#" clas="pull-right" onclick="new_impuesto()">Nuevo impuesto<i class="fa fa-plus"></i></a>'
		+'<a href="#" onclick="kill_impuesto()">Eliminar impuesto<i class="fa fa-plus"></i></a>'
		+'</section>'
		+'<section class="col col-3">Proveedor'
		+'<label class="select">'
		+'<select name="proveedor">'
		+'<?foreach ($proveedores as $key){?>'
		+'<option value="<?=$key->id_usuario?>">'
		+'<?=$key->nombre." ".$key->apellido?> comisión: %'
		+'<?=$key->comision?></option>'
		+'<?}?>'
		+'</select>'
		+'</label>'
		+'</section>'
		+'<section class="col col-3">País del producto'
		+'<label class="select">'
		+'<select id="pais" required name="pais">'
		+'<?foreach ($pais as $key){?>'
		+'<option value="<?=$key->Code?>">'
		+'<?=$key->Name?></option>'
		+'<?}?>'
		+'</select>'
		+'</label>'
		+'</section>'
		+'<section class="col col-3">'
		+'<label class="input">'
		+'Puntos comisionables'
		+'<input type="number" min="1" max="" name="puntos_com" id="puntos_com">'
		+'</label>'
		+'</section>'
		+'</fieldset>'
		+'</div>'
		);

$("#mymarkdown").markdown({
	autofocus:false,
	savable:false
})

		// START AND FINISH DATE
		$('#startdate').datepicker({
			changeMonth: true,
			numberOfMonths: 2,
			dateFormat:"yy-mm-dd",
			changeYear: true,
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#finishdate').datepicker('option', 'minDate', selectedDate);
			}
		});

		$('#finishdate').datepicker({
			changeMonth: true,
			numberOfMonths: 2,
			dateFormat:"yy-mm-dd",
			changeYear: true,
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#startdate').datepicker('option', 'maxDate', selectedDate);
			}
		});
	}
	if(tipo==3)
	{
		$("#tipo_mercancia_txt").empty();
		$("#tipo_mercancia_txt").append("de la promoción");
		$("#form_mercancia").empty();
		$("#form_mercancia").append('<div class="row">'
			+'<fieldset>'
			+'<section class="col col-3">Tipo de promocion'
			+'<label class="select">'
			+'<select onchange="tipo_promo()" id="tipo" name="tipo">'
			+'<?foreach ($promo as $key){?>'
			+'<option value="<?=$key->id_promo?>">'
			+'<?=$key->descripcion?></option>'
			+'<?}?>'
			+'</select>'
			+'</label>'
			+'</section>'
			+'</fieldset><fieldset>'
			+'<legend>Datos <span id="tipo_mercancia_txt">del producto</span></legend>'
			+'<section class="col col-2">'
			+'<label class="input">Nombre'
			+'<input type="text" name="nombre" id="nombre_pr">'
			+'</label>'
			+'</section>'
			+'<div id="tipo_promo">'

			+'<section class="col col-2">'
			+'<label class="input"><span id="labelextra">Descuento del paquete</span>'
			+'<input id="precio_promo" type="text" name="descuento">'
			+'</label>'
			+'</section><div class="row"><br /></div>'
			+'<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="prods">'
			+'<section class="col col-8">Productos'
			+'<label class="select">'
			+'<select class="custom-scroll"  name="producto[]">'
			+'<option value="0">Ninguno</option>'
			+'<?foreach ($producto as $key){?>'
			+'<option value="<?=$key->id_mercancia?>">'
			+'<?=$key->nombre?></option>'
			+'<?}?>'
			+'</select>'
			+'</label>'
			+'</section>'
			+'<section class="col col-4">'
			+'<label class="input">Cantidad de productos'
			+'<input type="number" min="1" name="n_productos[]" id="prod_qty">'
			+'</label>'
			+'</section>'
			+'</div>'
			+'<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="servs">'
			+'<section class="col col-8">Servicios'
			+'<label class="select">'
			+'<select class="custom-scroll" name="servicio[]">'
			+'<option value="0">Ninguno</option>'
			+'<?foreach ($servicio as $key){?>'
			+'<option value="<?=$key->id_mercancia?>">'
			+'<?=$key->nombre?></option>'
			+'<?}?>'
			+'</select>'
			+'</label>'
			+'</section>'
			+'<section class="col col-4">'
			+'<label class="input">Cantidad de servicios'
			+'<input type="number" min="1" name="n_servicios[]" id="serv_qty">'
			+'</label>'
			+'</section>'
			+'</div>'
			+'</div>'
			+'</fieldset>'
			+'<div id="agregar" class=" text-center row"><a onclick="new_product()">Agregar producto <i class="fa fa-plus"></i></a>  <a  onclick="new_service()">Agregar servicio <i class="fa fa-plus"></i></a></div>'
			+'<div id="moneda"><fieldset id="moneda_field">'
			+'<legend>Moneda y país</legend>'
			+'<section class="col col-2">'
			+'<label class="input">'
			+'Costo real'
			+'<input type="text" name="real" id="real">'
			+'</label>'
			+'</section>'
			+'<section class="col col-2">'
			+'<label class="input">Costo distribuidores'
			+'<input type="text" name="costo" id="costo">'
			+'</label>'
			+'</section>'
			+'<section class="col col-2">'
			+'<label class="input">Costo publico'
			+'<input type="text" name="costo_publico" id="costo_publico">'
			+'</label>'
			+'</section>'
			+'<section class="col col-2">'
			+'<label class="input">'
			+'Tiempo mínimo de entrega'
			+'<input placeholder="En días" type="text" name="entrega" id="entrega">'
			+'</label>'
			+'</section>'
			+'<section class="col col-3">Impuesto'
			+'<label class="select">'
			+'<select name="id_impuesto[]">'
			+'<?foreach ($impuesto as $key){?>'
			+'<option value="<?=$key->id_impuesto?>"><?=$key->descripcion." ".$key->porcentaje."%"?></option>'	
			+'<?}?>'
			+'</select>'
			+'</label>'
			+'<a href="#" onclick="add_impuesto()">Agregar impuesto<i class="fa fa-plus"></i></a>'
			+'<a href="#" clas="pull-right" onclick="new_impuesto()">Nuevo impuesto<i class="fa fa-plus"></i></a>'
			+'<a href="#" onclick="kill_impuesto()">Eliminar impuesto<i class="fa fa-plus"></i></a>'
			+'</section>'
			+'<section class="col col-3">Proveedor'
			+'<label class="select">'
			+'<select name="proveedor">'
			+'<?foreach ($proveedores as $key){?>'
			+'<option value="<?=$key->id_usuario?>">'
			+'<?=$key->nombre." ".$key->apellido?> comisión: %'
			+'<?=$key->comision?></option>'
			+'<?}?>'
			+'</select>'
			+'</label>'
			+'</section>'
			+'<section class="col col-3">País del producto'
			+'<label class="select">'
			+'<select id="pais" required name="pais">'
			+'<?foreach ($pais as $key){?>'
			+'<option value="<?=$key->Code?>">'
			+'<?=$key->Name?></option>'
			+'<?}?>'
			+'</select>'
			+'</label>'
			+'</section>'
			+'<section class="col col-3">'
			+'<label class="input">'
			+'Puntos comisionables'
			+'<input type="number" min="1" max="" name="puntos_com" id="puntos_com">'
			+'</label>'
			+'</section>'
			+'</fieldset></div>'
			+'<div>'
			+'<section style="padding-left: 0px;" class="col col-6">Descripcion'
			+'<textarea name="descripcion" style="max-width: 96%" id="mymarkdown"></textarea>'
			+'</section>'
			+'<section id="imagenes" class="col col-6">'
			+'<label class="label">Imágen</label>'
			+'<div class="input input-file"><span class="button"><input id="img" name="img[]" onchange="this.parentNode.nextSibling.value=this.value" type="file" multiple>Buscar</span>'
			+'<input id="imagen_mr" placeholder="Agregar alguna imágen" readonly="" type="text">'
			+'</div><small>Para cargar múltiples archivos, presione la tecla ctrl y sin soltar selecione sus archivos.<br/><cite title="Source Title">Para ver los archivos que va a cargar, deje el puntero sobre el boton de "Buscar"</cite></small>'
			+'</section>'
			+'</div>'
			+'</fieldset>'
			+'</div>');

$("#mymarkdown").markdown({
	autofocus:false,
	savable:false
})
}
}
function tipo_promo()
{
	var tipo=$("#tipo").val();
	if(tipo==1)
	{
		$("#tipo_promo").empty();
		$("#labelextra").empty();
		$("#labelextra").append('Descuento del paquete');
		$('#agregar').append('<a onclick="new_product()">Agregar producto <i class="fa fa-plus"></i></a>  <a  onclick="new_service()">Agregar servicio <i class="fa fa-plus"></i></a>');
		$('#precio_promo').attr('name','descuento')
		$("#tipo_promo").append('<section class="col col-2">'
			+'<label class="input"><span id="labelextra">Descuento del paquete</span>'
			+'<input id="precio_promo" type="text" name="descuento">'
			+'</label>'
			+'</section><div class="row"><br /></div>'
			+'<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="prods">'
			+'<section class="col col-8">Productos'
			+'<label class="select">'
			+'<select class="custom-scroll"  name="producto[]">'
			+'<option value="0">Ninguno</option>'
			+'<?foreach ($producto as $key){?>'
			+'<option value="<?=$key->id_mercancia?>">'
			+'<?=$key->nombre?></option>'
			+'<?}?>'
			+'</select>'
			+'</label>'
			+'</section>'
			+'<section class="col col-4">'
			+'<label class="input">Cantidad de productos'
			+'<input type="number" min="1" name="n_productos[]" id="prod_qty">'
			+'</label>'
			+'</section>'
			+'</div>'
			+'<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="servs">'
			+'<section class="col col-8">Servicios'
			+'<label class="select">'
			+'<select class="custom-scroll" name="servicio[]">'
			+'<option value="0">Ninguno</option>'
			+'<?foreach ($servicio as $key){?>'
			+'<option value="<?=$key->id_mercancia?>">'
			+'<?=$key->nombre?></option>'
			+'<?}?>'
			+'</select>'
			+'</label>'
			+'</section>'
			+'<section class="col col-4">'
			+'<label class="input">Cantidad de servicios'
			+'<input type="number" min="1" name="n_servicios[]" id="serv_qty">'
			+'</label>'
			+'</section>'
			+'</div>');
$("#moneda").append('<fieldset id="moneda_field"> '
	+'<legend>Moneda y país</legend>'
	+'<section class="col col-2">'
	+'<label class="input">'
	+'Costo real'
	+'<input type="text" name="real" id="real">'
	+'</label>'
	+'</section>'
	+'<section class="col col-2">'
	+'<label class="input">Costo distribuidores'
	+'<input type="text" name="costo" id="costo">'
	+'</label>'
	+'</section>'
	+'<section class="col col-2">'
	+'<label class="input">Costo publico'
	+'<input type="text" name="costo_publico" id="costo_publico">'
	+'</label>'
	+'</section>'
	+'<section class="col col-2">'
	+'<label class="input">'
	+'Tiempo mínimo de entrega'
	+'<input placeholder="En días" type="text" name="entrega" id="entrega">'
	+'</label>'
	+'</section>'
	+'<section class="col col-3">Impuesto'
	+'<label class="select">'
	+'<select name="id_impuesto[]">'
	+'<?foreach ($impuesto as $key){?>'
	+'<option value="<?=$key->id_impuesto?>"><?=$key->descripcion." ".$key->porcentaje."%"?></option>'	
	+'<?}?>'
	+'</select>'
	+'</label>'
	+'<a href="#" onclick="add_impuesto()">Agregar impuesto<i class="fa fa-plus"></i></a>'
	+'<a href="#" clas="pull-right" onclick="new_impuesto()">Nuevo impuesto<i class="fa fa-plus"></i></a>'
	+'<a href="#" onclick="kill_impuesto()">Eliminar impuesto<i class="fa fa-plus"></i></a>'
	+'</section>'
	+'<section class="col col-3">Proveedor'
	+'<label class="select">'
	+'<select name="proveedor">'
	+'<?foreach ($proveedores as $key){?>'
	+'<option value="<?=$key->id_usuario?>">'
	+'<?=$key->nombre." ".$key->apellido?> comisión: %'
	+'<?=$key->comision?></option>'
	+'<?}?>'
	+'</select>'
	+'</label>'
	+'</section>'
	+'<section class="col col-3">País del producto'
	+'<label class="select">'
	+'<select id="pais" required name="pais">'
	+'<?foreach ($pais as $key){?>'
	+'<option value="<?=$key->Code?>">'
	+'<?=$key->Name?></option>'
	+'<?}?>'
	+'</select>'
	+'</label>'
	+'</section>'
	+'<section class="col col-3">'
	+'<label class="input">'
	+'Puntos comisionables'
	+'<input type="number" min="1" max="" name="puntos_com" id="puntos_com">'
	+'</label>'
	+'</section>'
	+'</fieldset>');
}
if(tipo==2)
{
	$('#precio_promo').attr('name','extra');
	$("#moneda").empty();
	$("#labelextra").empty();
	$("#labelextra").append('Costo extra por regalo');
	$("#tipo_promo").empty();
	$('#agregar').empty();
	$("#tipo_promo").append('<section class="col col-3">Mercancia'
		+'<label class="select">'
		+'<select class="custom-scroll"  name="mercancia">'
		+'<?foreach ($producto as $key){?>'
		+'<option value="<?=$key->id_mercancia?>">'
		+'<?=$key->nombre?></option>'
		+'<?}?>'
		+'<?foreach ($servicio as $key){?>'
		+'<option value="<?=$key->id_mercancia?>">'
		+'<?=$key->nombre?></option>'
		+'<?}?>'
		+'<?foreach ($combinado as $key){?>'
		+'<option value="<?=$key->id_mercancia?>">'
		+'<?=$key->nombre?></option>'
		+'<?}?>'
		+'</select>'
		+'</label>'
		+'</section>'
		+'<section class="col col-2">'
		+'<label class="input">Cantidad de mercancia'
		+'<input type="number" min="1" name="n_mercancia" id="n_mercancia">'
		+'</label>'
		+'</section>'
		+'<section class="col col-2">'
		+'<label class="input">Fecha de inicio'
		+'<input required type="text" name="fecha_inicio" id="startdate" /> </label>'
		+'</section>'
		+'<section class="col col-2">'
		+'<label class="input">Fecha de termino'
		+'<input type="text" name="fecha_fin" id="finishdate" /> </label>'
		+'</section>');

$('#startdate').datepicker({
	changeMonth: true,
	numberOfMonths: 2,
	dateFormat:"yy-mm-dd",
	changeYear: true,
	prevText : '<i class="fa fa-chevron-left"></i>',
	nextText : '<i class="fa fa-chevron-right"></i>',
	onSelect : function(selectedDate) {
		$('#finishdate').datepicker('option', 'minDate', selectedDate);
	}
});

$('#finishdate').datepicker({
	changeMonth: true,
	numberOfMonths: 2,
	dateFormat:"yy-mm-dd",
	changeYear: true,
	prevText : '<i class="fa fa-chevron-left"></i>',
	nextText : '<i class="fa fa-chevron-right"></i>',
	onSelect : function(selectedDate) {
		$('#startdate').datepicker('option', 'maxDate', selectedDate);
	}
});
}
}
function new_product()
{
	$('#prods').append('<section class="col col-8">Productos'
		+'<label class="select">'
		+'<select class="custom-scroll"  name="producto[]">'
		+'<option value="0">Ninguno</option>'
		+'<?foreach ($producto as $key){?>'
		+'<option value="<?=$key->id_mercancia?>">'
		+'<?=$key->nombre?></option>'
		+'<?}?>'
		+'</select>'
		+'</label>'
		+'</section>'
		+'<section class="col col-4">'
		+'<label class="input">Cantidad de productos'
		+'<input type="number" min="1" name="n_productos[]">'
		+'</label>'
		+'</section>');
}
function new_service()
{
	$('#servs').append('<section class="col col-8">Servicios'
		+'<label class="select">'
		+'<select class="custom-scroll" name="servicio[]">'
		+'<option value="0">Ninguno</option>'
		+'<?foreach ($servicio as $key){?>'
		+'<option value="<?=$key->id_mercancia?>">'
		+'<?=$key->nombre?></option>'
		+'<?}?>'
		+'</select>'
		+'</label>'
		+'</section>'
		+'<section class="col col-4">'
		+'<label class="input">Cantidad de servicios'
		+'<input type="number" min="1" name="n_servicios[]">'
		+'</label>'
		+'</section>');
}
function new_grupo()
{
	bootbox.dialog({
		message: "<label>Nombre del grupo</label><input id='desc'  type='text'/>",
		title: 'Agregar grupo',
		buttons: {
			success: {
				label: "Agregar",
				className: "btn-success",
				callback: function() {
					var desc=$("#desc").val()
					$.ajax({
						type: "POST",
						url: "/bo/admin/new_grupo",
						data: {descripcion: desc},
					})
					.done(function( msg )
					{
						bootbox.dialog({
							message: "El grupo fue añadido con exito",
							title: 'Atención',
							buttons: {
								success: {
									label: "Ok",
									className: "btn-success",
									callback: function() {

									}
								}
							}
						})
						location.href='';
					})
				}
			}
		}
	})
}
function kill_grupo()
{
	bootbox.dialog({
		message: "<form class='smart-form'><label class='select text-center'><select id='imp_sel'><? foreach($grupo as $grp){?><option value='<?=$grp->id_grupo?>'><?=$grp->descripcion?></option><?}?></select></label></form>",
		title: 'Eliminar grupo',
		buttons: {
			success: {
				label: "Eliminar",
				className: "btn-danger",
				callback: function() {
					var id_g=$("#imp_sel").val()
					$.ajax({
						type: "POST",
						url: "/bo/admin/kill_grupo",
						data: {id: id_g},
					})
					.done(function( msg )
					{
						bootbox.dialog({
							message: "El grupo fue eliminado con exito",
							title: 'Atención',
							buttons: {
								success: {
									label: "Ok",
									className: "btn-success",
									callback: function() {

									}
								}
							}
						})
						location.href='';
					})
				}
			}
		}
	})
}
function new_impuesto()
{
	bootbox.dialog({
		message: "<label>Nombre del impuesto</label><input id='desc'  type='text'/><br>br><label>Porcentaje de impuesto</label><input id='porc'  type='text'/>",
		title: 'Agregar grupo',
		buttons: {
			success: {
				label: "Agregar",
				className: "btn-success",
				callback: function() {
					var desc=$("#desc").val()
					var porc=$("#porc").val()
					$.ajax({
						type: "POST",
						url: "/bo/admin/new_impuesto",
						data: {descripcion: desc, porcentaje: porc},
					})
					.done(function( msg )
					{
						bootbox.dialog({
							message: "El impuesto fue añadido con exito",
							title: 'Atención',
							buttons: {
								success: {
									label: "Ok",
									className: "btn-success",
									callback: function() {

									}
								}
							}
						})
						location.href='';
					})
				}
			}
		}
	})
}
function kill_impuesto()
{
	bootbox.dialog({
		message: "<form class='smart-form'><label class='select text-center'><select id='imp_sel'><? foreach($impuesto as $imp){?><option value='<?=$imp->id_impuesto?>'><?=$imp->descripcion?> (<?=$imp->porcentaje?> %)</option><?}?></select></label></form>",
		title: 'Eliminar grupo',
		buttons: {
			success: {
				label: "Eliminar",
				className: "btn-danger",
				callback: function() {
					var id_g=$("#imp_sel").val()
					$.ajax({
						type: "POST",
						url: "/bo/admin/kill_impuesto",
						data: {id: id_g},
					})
					.done(function( msg )
					{
						bootbox.dialog({
							message: "El impuesto fue eliminado con exito",
							title: 'Atención',
							buttons: {
								success: {
									label: "Ok",
									className: "btn-success",
									callback: function() {

									}
								}
							}
						})
						location.href='';
					})
				}
			}
		}
	})
}
function dato_pais(codigo,nombre)
{

	$.ajax({
		type: "POST",
		url: "/bo/admin/dato_pais",
		data: {pais: codigo},
	})
	.done(function( msg )
	{
		bootbox.dialog({
			message: msg,
			title: nombre,
			buttons: {
				success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {

						$.ajax({
							type: "POST",
							url: "/bo/admin/actualiza_pais",
							data: $("#"+codigo).serialize(),
						})
						.done(function( msg )
						{
							bootbox.dialog({
								message: "Se han actualizado los cambios",
								title: nombre,
								buttons: {
									success: {
										label: "Aceptar",
										className: "btn-success",
										callback: function() {
										}
									}
								}
					})//fin done ajax
					});//Fin callback bootbox

					}
				},
				danger: {
					label: "Cancelar!",
					className: "btn-danger",
					callback: function() {

					}
				}
			}
		})
	});
}
function dato_pais_multiple()
{
	/*bootbox.dialog({
		message: "Espere mientras se procesan los datos",
		title: "Espere",
		timeOut : 1000,
	})//fin done ajax*/

$.ajax({
	type: "POST",
	url: "/bo/admin/dato_pais_multiple",
	data: $("#multiple_pais").serialize(),
})
.done(function( msg )
{
	bootbox.dialog({
		message: msg,
		title: "Editar",
		buttons: {
			success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {
				/*bootbox.dialog({
					message: "Espere mientras se procesan los datos",
					title: "Espere",
				})//fin done ajax*/
	$.each( $('.pais_check:checked'), function( i, val ) {

				  	//alert($(val).val());
				  	$.ajax({
				  		type: "POST",
				  		url: "/bo/admin/actualiza_pais",
				  		data: $("#"+$(val).val()).serialize(),
				  	})
				  	.done(function( msg )
				  	{
					});//Fin callback bootbox

				  });
	bootbox.dialog({
		message: "Se han realizado los cambios con exito",
		title: "Prueba",
		buttons: {
			success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {
				}
			}
		}
					})//fin done ajax
}
},
danger: {
	label: "Cancelar!",
	className: "btn-danger",
	callback: function() {

	}
}
}
})
});
}
function editar(id_merc)
{
	$.ajax({
		type: "POST",
		url: "/bo/admin/edit_merc",
		data: {id: id_merc},
	})
	.done(function( msg )
	{
		bootbox.dialog({
			message: msg,
			title: 'Edicion',
			buttons: {
				success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {
						$("#update_merc").submit();
					}
				}
			}
	})//fin done ajax
	});//Fin callback bootbox
}
function eliminar(id)
{
	bootbox.dialog({
		message: "Confirme eliminacion(esta acción no se puede deshacer)",
		title: "Eliminar",
		buttons: {
			success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {

					$.ajax({
						type: "POST",
						url: "/bo/admin/del_merc",
						data: {id: id},
					})
					.done(function( msg )
					{
						bootbox.dialog({
							message: "Se ha eliminado la mercancia",
							title: 'Alerta',
							buttons: {
								success: {
									label: "Aceptar",
									className: "btn-success",
									callback: function() {
									}
								}
							}
					})//fin done ajax
					});//Fin callback bootbox

				}
			},
			danger: {
				label: "Cancelar!",
				className: "btn-danger",
				callback: function() {

				}
			}
		}
	})
}
function estatus(tipo,id)
{
	if (tipo==1){
		bootbox.dialog({
			message: "Confirme que desea activar en carrito de compra",
			title: "Activar",
			buttons: {
				success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {

						$.ajax({
							type: "POST",
							url: "/bo/admin/estado_mercancia",
							data: {tipo: tipo, id: id},
						})
						.done(function( msg )
						{
							bootbox.dialog({
								message: "Se ha activado el producto",
								title: 'Activar',
								buttons: {
									success: {
										label: "Aceptar",
										className: "btn-success",
										callback: function() {
										}
									}
								}
					})//fin done ajax
					});//Fin callback bootbox

					}
				},
				danger: {
					label: "Cancelar!",
					className: "btn-danger",
					callback: function() {

					}
				}
			}
		})
	}
	else
	{
		bootbox.dialog({
			message: "Confirme que desea desactivar en carrito de compra",
			title: "Descativar",
			buttons: {
				success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {

						$.ajax({
							type: "POST",
							url: "/bo/admin/estado_mercancia",
							data: {tipo: tipo, id: id},
						})
						.done(function( msg )
						{
							bootbox.dialog({
								message: "Se ha desactivado el producto",
								title: 'Descativar',
								buttons: {
									success: {
										label: "Aceptar",
										className: "btn-success",
										callback: function() {
										}
									}
								}
					})//fin done ajax
					});//Fin callback bootbox

					}
				},
				danger: {
					label: "Cancelar!",
					className: "btn-danger",
					callback: function() {

					}
				}
			}
		})
	}
}
function new_empresa()
{
	bootbox.dialog({
		message: '<form id="form_empresa" method="post" action="/bo/admin/new_empresa" class="smart-form">'
		+'<fieldset>'
		+'<legend>Información de cuenta</legend>'
		+'<section id="usuario" class="col col-6">'
		+'<label class="input">Razón social'
		+'<input required type="text" name="nombre" placeholder="Empresa">'
		+'</label>'
		+'</section>'
		+'<section id="usuario" class="col col-6">'
		+'<label class="input">Correo electrónico'
		+'<input required type="email" name="email">'
		+'</label>'
		+'</section>'
		+'<section id="usuario" class="col col-6">'
		+'<label class="input">Sítio web'
		+'<input required type="url" name="site">'
		+'</label>'
		+'</section>'
		+'<section class="col col-6">Regimen fiscal'
		+'<label class="select">'
		+'<select class="custom-scroll" name="regimen">'
		+'<?foreach ($regimen as $key){?>'
		+'<option value="<?=$key->id_regimen?>">'
		+'<?=$key->abreviatura." ".$key->descripcion?></option>'
		+'<?}?>'
		+'</select>'
		+'</label>'
		+'</section>'
		+'</fieldset>'
		+'<fieldset>'
		+'<legend>Dirección de la empresa</legend>'
		+'<div id="dir" class="row">'
		+'<section class="col col-6">'
		+'País'
		+'<label class="select">'
		+'<select id="pais" required name="pais">'
		+'<?foreach ($pais as $key){?>'
		+'<option value="<?=$key->Code?>">'
		+'<?=$key->Name?>'
		+'</option>'
		+'<?}?>'
		+'</select>'
		+'</label>'
		+'</section>'
		+'<section class="col col-6">'
		+'<label class="input">'
		+'Código postal'
		+'<input required  type="text" id="cp" name="cp">'
		+'</label>'
		+'</section>'
		+'<section class="col col-6">'
		+'<label class="input">'
		+'Dirección domicilio'
		+'<input required type="text" name="calle">'
		+'</label>'
		+'</section>'
		+'<section class="col col-6">'
		+'<label class="input">'
		+'Número interior'
		+'<input required type="text" name="interior">'
		+'</label>'
		+'</section>'
		+'<section class="col col-6">'
		+'<label class="input">'
		+'Número exterior'
		+'<input required type="text" name="exterior">'
		+'</label>'
		+'</section>'
		+'<section id="colonia" class="col col-6">'
		+'<label class="input">'
		+'Ciudad'
		+'<input type="text" name="colonia" >'
		+'</label>'
		+'</section>'
		+'<section id="municipio" class="col col-6">'
		+'<label class="input">'
		+'Provincia'
		+'<input type="text" name="municipio" >'
		+'</label>'
		+'</section>'
		+'</div>'
		+'</fieldset>'
		+'</form>',
		title: "Editar",
		buttons: {
			submit: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {

					$.ajax({
						type: "POST",
						url: "/bo/admin/new_empresa",
						data: $("#form_empresa").serialize(),
					})
					.done(function( msg )
					{
						bootbox.dialog({
							message: "Se agregado la empresa",
							title: 'Empresa',
							buttons: {
								success: {
									label: "Aceptar",
									className: "btn-success",
									callback: function() {
									}
								}
							}
					})//fin done ajax
					});//Fin callback bootbox

				}
			},
			danger: {
				label: "Cancelar!",
				className: "btn-danger",
				callback: function() {

				}
			}
		}
	})
}
function agregar_cuenta()
{
	
	$("#cuenta").append('<section class="col col-3">'
		+'<label class="input">CLABE'
		+'<input required name="clabe[]" placeholder="02112312345678901" type="text">'
		+'</label>'
		+'</section>');
}
function check_keyword()
{
	$("#msg_key").remove();
	$("#key_").append('<i id="ajax_" class="icon-append fa fa-spinner fa-spin"></i>');

	var keyword=$("#keyword").val();
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/use_keyword",
		data: {keyword: keyword},
	})
	.done(function( msg )
	{
		$("#msg_key").remove();
		$("#key").append("<p id='msg_key'>"+msg+"</msg>");
		$("#ajax_").remove();
	});
}
function check_keyword_co()
{
	$("#msg_key_co").remove();
	$("#key_1").append('<i id="ajax_1" class="icon-append fa fa-spinner fa-spin"></i>');
	var keyword=$("#keyword_co").val();
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/use_keyword",
		data: {keyword: keyword},
	})
	.done(function( msg )
	{
		$("#msg_key_co").remove();
		$("#key_co").append("<p id='msg_key_co'>"+msg+"</msg>");
		$("#ajax_1").remove();
	});
}
function new_proveedor()
{
	$.ajax({
		type: "POST",
		url: "/auth/register",
		data: $('#register1').serialize()
	})
	.done(function( msg ) {
		var email=$("#email1").val();
		$("#proveedor").append("<input value='"+email+"' type='hidden' name='mail_important'>");
		$.ajax({
			type: "POST",
			url: "/bo/admin/new_proveedor",
			data: $('#proveedor').serialize()
		})
		.done(function( msg ) {
			bootbox.dialog({
				message: "Se ha afiliado al usuario",
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
	});
}
function use_username1()
{
	$("#msg_usuario1").remove();
	var username=$("#username1").val();
	$.ajax({
		type: "POST",
		url: "/bo/admin/use_username",
		data: {username: username},
	})
	.done(function( msg )
	{
		$("#usuario1").append("<p id='msg_usuario1'>"+msg+"</msg>")
	});
}
function use_mail1()
{
	$("#msg_correo1").remove();
	var mail=$("#email1").val();
	$.ajax({
		type: "POST",
		url: "/bo/admin/use_mail",
		data: {mail: mail},
	})
	.done(function( msg )
	{
		$("#correo1").append("<p id='msg_correo1'>"+msg+"</msg>")
	});
}
function add_impuesto()
{
	var code=	'<section class="col col-3">Impuesto'
	+'<label class="select">'
	+'<select name="id_impuesto[]">'
	<?foreach ($impuesto as $key)
	{
		echo "+'<option value=".$key->id_impuesto.">".$key->descripcion." ".$key->porcentaje."%"."</option>'";
	}?>
	+'</select>'
	+'</label>'
	+'</section>';
	$("#moneda_field").append(code);
}
function add_impuesto_boot()
{
	var code=	'<section class="col col-6">Impuesto'
	+'<label class="select">'
	+'<select name="id_impuesto[]">'
	<?foreach ($impuesto as $key)
	{
		echo "+'<option value=".$key->id_impuesto.">".$key->descripcion." ".$key->porcentaje."%"."</option>'";
	}?>
	+'</select>'
	+'</label>'
	+'</section>';
	$("#moneda_field_boot").append(code);
}
$("#mercancia").submit(function(event){
	var tipo_merc=$("#tipo_mercancia").val();
	if(tipo_merc==1)
	{
		var ids=Array(
			"#nombre_p",
			"#concepto",
			"#marca",
			"#codigo_barras",
			"#mymarkdown",
			"#min_venta",
			"#max_venta",
			"#real",
			"#costo",
			"#costo_publico",
			"#entrega",
			"#puntos_com"
			);
		var mensajes=Array(
			"Por favor ingresa un nombre del producto",
			"Por favor ingresa un concepto",
			"Por favor ingresa una marca",
			"Por favor ingres el codigo de barras",
			"Por favor intriduzca una descripcion",
			"Por favor especifica la canidad minima de venta",
			"Por favor especifica la cantidad maxima de venta",
			"Por favor especifica el costo real",
			"Por favor especifica el costo",
			"Por favor especifica el costo publico",
			"Por favor epsecifica un tiempo de entrega",
			"Por favor especifica la cantidad de puntos comisionables"
			);
		var id_entero=Array(
			"#codigo_barras",
			"#min_venta",
			"#max_venta",
			"#entrega"
			);
		var mensaje_entero=Array(
			"El codigo de barras debe contener solo numeros",
			"El minimo de venta debe de ser entero",
			"El maximo de venta debe de ser entero",
			"El tiempo de entrega debe de ser un numero entero"
			);
		var ids_esp=Array(
			"#codigo_barras"
			);
		var mensajes_esp=Array(
			"El codigo de barras no puede contener espacios en blanco"
			);
		var id_dec=Array(
			"#peso",
			"#alto",
			"#ancho",
			"#profundidad",
			"#diametro",
			"#real",
			"#costo",
			"#costo_publico"
			);
		var msj_dec=Array(
			"El peso debe de ser un numero",
			"El alto debe de ser un numero",
			"El anchp debe de ser un numero",
			"La profundidad debe de ser un numero",
			"El diametro debe de ser un numero",
			"El costo real debe de ser un numero",
			"El costo debe de ser un numero",
			"El costo_publico debe de ser un numero"
			);

		var validacion=valida_vacios(ids,mensajes);
		var val_espacios=valida_espacios(ids_esp,mensajes_esp);
		var val_email=true;
		var val_psswrds=true;
		var val_tamano=true;
		var val_entero=valida_entero(id_entero,mensaje_entero);
		var val_fecha=true;
		//var val_decimales=valida_decimales(id_dec, msj_dec);	

	}
	if(tipo_merc==2)
	{
		var ids=new Array(
			"#nombre_s",
			"#concepto",
			"#startdate",
			"#finishdate",
			"#mymarkdown",
			"#real",
			"#costo",
			"#costo_publico",
			"#entrega",
			"#puntos_com"
			);
		var mensajes=new Array(
			"Por favor ingresa un nombre del producto",
			"Por favor ingresa un concepto",
			"Por favor ingrese la fecha de inicio",
			"Por favor especifica la fecha de finalizacion",
			"Por favor intriduzca una descripcion",
			"Por favor especifica el costo real",
			"Por favor especifica el costo",
			"Por favor especifica el costo publico",
			"Por favor epsecifica un tiempo de entrega",
			"Por favor especifica la cantidad de puntos comisionables"
			);
		var id_entero=Array(
			"#entrega"
			);
		var mensaje_entero=Array(
			"El tiempo de entrega debe de ser un numero entero"
			);
		var id_fecha=Array(
			"#startdate",
			"#finishdate"
			);
		var mensaje_fecha=Array(
			"El formato de la fecha es incorrecto (aaaa-mm-dd)",
			"El formato de la fecha es incorrecto (aaaa-mm-dd)"
			);
		
		var id_dec=new Array(
			"#real",
			"#costo",
			"#costo_publico"
			);
		var msj_dec=new Array(
			"El costo real debe de ser un numero",
			"El costo debe de ser un numero",
			"El costo_publico debe de ser un numero"
			);
		//var val_decimales=valida_decimales(id_dec, msj_dec);
		var validacion=valida_vacios(ids,mensajes);
		var val_espacios=true;
		var val_email=true;
		var val_psswrds=true;
		var val_tamano=true;
		var val_entero=valida_entero(id_entero,mensaje_entero);
		var val_fecha=valida_fecha(id_fecha,mensaje_fecha);
		
	}
	if(tipo_merc==3)
	{
		var tipo_promo=("#tipo").val();
		if(tipo_promo==1)
		{
			var ids=new Array(
				"#nombre_pr",
				"#prod_qty",
				"#serv_qty",
				"#precio_promo",
				"#real",
				"#costo",
				"#costo_publico",
				"#entrega",
				"#puntos_com"
				);
			var mensajes=new Array(
				"Por favor ingresa un nombre del producto",
				"Por favor especifica la cantidad de producto",
				"Por favor especifica la cantidad de servicio",
				"Por favor especifica el descuento de la promocion",
				"Por favor intriduzca una descripcion",
				"Por favor especifica el costo real",
				"Por favor especifica el costo",
				"Por favor especifica el costo publico",
				"Por favor epsecifica un tiempo de entrega",
				"Por favor especifica la cantidad de puntos comisionables"
				);
			var id_entero=Array(
				"#entrega",
				"prod_qty",
				"serv_qty"
				);
			var mensaje_entero=Array(
				"El tiempo de entrega debe de ser un numero entero",
				"La cantidad de prducto debe ser un numero entero",
				"La cantidad de servcio debe ser un numero entero"
				);
			
			var id_dec=new Array(
				"#real",
				"#costo",
				"#costo_publico"
				);
			var msj_dec=new Array(
				"El costo real debe de ser un numero",
				"El costo debe de ser un numero",
				"El costo_publico debe de ser un numero"
				);
			//var val_decimales=valida_decimales(id_dec, msj_dec);
			var validacion=valida_vacios(ids,mensajes);
			var val_espacios=true;
			var val_email=true;
			var val_psswrds=true;
			var val_tamano=true;
			var val_entero=valida_entero(id_entero,mensaje_entero);
			var val_fecha=true;
		}
		if(tipo_promo==2)
		{
			var ids=new Array(
				"#nombre_pr",
				"#n_mercancia",
				"#startdate",
				"#finishdate",
				"#precio_promo"
				);
			var mensajes=new Array(
				"Por favor ingresa un nombre de la promocion",
				"Por favor ingresa la cantidad de mercancia",
				"Por favor ingrese la fecha de inicio",
				"Por favor especifica la fecha de finalizacion",
				"Por favor especifica el descuento de la promocion"
				);
			var id_entero=Array(
				"#n_mercancia"
				);
			var mensaje_entero=Array(
				"La cantidad de mercancia debe ser un numero entero"
				);
			var id_fecha=Array(
				"#startdate",
				"#finishdate"
				);
			var mensaje_fecha=Array(
				"El formato de la fecha es incorrecto (aaaa-mm-dd)",
				"El formato de la fecha es incorrecto (aaaa-mm-dd)"
				);
			
			//var val_decimales=valida_decimales(id_dec, msj_dec);
			var validacion=valida_vacios(ids,mensajes);
			var val_espacios=true;
			var val_email=true;
			var val_psswrds=true;
			var val_tamano=true;
			var val_entero=valida_entero(id_entero,mensaje_entero);
			var val_fecha=valida_fecha(id_fecha,mensaje_fecha);
		}
	}

		//AQUII MAS CODIGO AMIGO JAJA


		if(val_espacios&&validacion&&val_email&&val_psswrds&&val_entero&&val_tamano&&val_fecha)
		{

			return;
		}

		event.preventDefault();

	});

function new_pack()
{
	bootbox.dialog({
		message: '<form id="form_paquete" method="post" action="/bo/admin/alta_paquete" class="smart-form">'
		+'<div class="row">'
		+'<fieldset>'
		+'<legend>Datos del paquete</legend>'
		+'<section class="col col-12">Tipo del paquete'
		+'<label class="select">'
		+'<select class="custom-scroll"  name="tipo_paquete">'
		+'<?foreach ($tipo_paquete as $key){?>'
		+'<option value="<?=$key->id_tipo?>">'
		+'<?=$key->descripcion?></option>'
		+'<?}?>'
		+'</select>'
		+'</label>'
		+'</section>'
		+'<section class="col col-6">'
		+'<label class="input">Nombre'
		+'<input type="text" name="nombre" id="nombre_pr">'
		+'</label>'
		+'</section>'
		+'<div id="tipo_promo">'
		+'<section class="col col-6">'
		+'<label class="input"><span id="labelextra">Precio</span>'
		+'<input id="precio_promo" type="text" name="precio">'
		+'</label>'
		+'</section>'
		+'<section class="col col-6">'
		+'<label class="input"><span id="labelextra">Puntos comisionables</span>'
		+'<input id="precio_promo" type="text" name="puntos">'
		+'</label>'
		+'</section>'
		+'<section class="col col-12">Visibilidad'
		+'<label class="select">'
		+'<select class="custom-scroll"  name="visible">'
		+'<option value="1">Afiliar</option>'
		+'<option value="2">Carrito</option>'
		+'<option value="3">Afiliar y carrito</option>'
		+'</select>'
		+'</label>'
		+'</section>'
		+'<div class="row"><br /></div>'
		+'<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="prods">'
		+'<section class="col col-10">Productos'
		+'<label class="select">'
		+'<select class="custom-scroll"  name="producto[]">'
		+'<option value="0">Ninguno</option>'
		+'<?foreach ($producto as $key){?>'
		+'<option value="<?=$key->id_mercancia?>">'
		+'<?=$key->nombre?></option>'
		+'<?}?>'
		+'</select>'
		+'</label>'
		+'</section>'
		+'<section class="col col-10">'
		+'<label class="input">Cantidad de productos'
		+'<input type="number" min="1" name="n_productos[]" id="prod_qty">'
		+'</label>'
		+'</section>'
		+'</div>'
		+'<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="servs">'
		+'<section class="col col-10">Servicios'
		+'<label class="select">'
		+'<select class="custom-scroll" name="servicio[]">'
		+'<option value="0">Ninguno</option>'
		+'<?foreach ($servicio as $key){?>'
		+'<option value="<?=$key->id_mercancia?>">'
		+'<?=$key->nombre?></option>'
		+'<?}?>'
		+'</select>'
		+'</label>'
		+'</section>'
		+'<section class="col col-10">'
		+'<label class="input">Cantidad de servicios'
		+'<input type="number" min="1" name="n_servicios[]" id="serv_qty">'
		+'</label>'
		+'</section>'
		+'</div>'
		+'</div>'
		+'</fieldset>'
		+'<div id="agregar" class=" text-center row"><a onclick="new_product()">Agregar producto <i class="fa fa-plus"></i></a>  <a  onclick="new_service()">Agregar servicio <i class="fa fa-plus"></i></a></div>'
		+'</fieldset>'
		+'</div>'
		+'</form>',
		title: "Agregar paquete",
		buttons: {
			submit: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {

					$.ajax({
						type: "POST",
						url: "/bo/admin/alta_paquete",
						data: $("#form_paquete").serialize(),
					})
					.done(function( msg )
					{
						bootbox.dialog({
							message: msg,
							title: 'Paquete',
							buttons: {
								success: {
									label: "Aceptar",
									className: "btn-success",
									callback: function() {
									}
								}
							}
					})//fin done ajax
					});//Fin callback bootbox

				}
			},
			danger: {
				label: "Cancelar!",
				className: "btn-danger",
				callback: function() {

				}
			}
		}
	})
}
</script>