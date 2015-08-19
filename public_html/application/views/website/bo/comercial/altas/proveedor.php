
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>&gt;
								<a href="/bo/comercial">Comercial</a> > 
								<a href="/bo/comercial/altas">Altas</a>
								> Proveedor
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
				<div class="jarviswidget" id="wid-id-1"
					data-widget-editbutton="false" data-widget-custombutton="false"
					data-widget-colorbutton="false">
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
						<span class="widget-icon"> <i class="fa fa-edit"></i>
						</span>
						<h2>Nuevo Proveedor</h2>
					</header>

					<!-- widget div-->
					<div>
						<form method="POST"
							id="proveedor" class="smart-form" novalidate="novalidate">
							<fieldset>
								<legend>Datos personales del proveedor</legend>
								<div class="row">
									<section class="col col-3">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<input required type="text" name="nombre" id="nombre"
											placeholder="Nombre">
										</label>
									</section>
									<section class="col col-3">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<input required type="text" name="apellido" id="apellido"
											placeholder="Apellido">
										</label>
									</section>
									<section id="correo1" class="col col-3">
										<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
											<input id="email" required type="email"
											name="email" placeholder="Email">
										</label>
									</section>
								</div>
								<div class="row">
									<div id="tel1" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<section class="col col-3">
											<label class="input"> <i class="icon-prepend fa fa-phone"></i>
												<input required name="fijo[]" placeholder="(99) 99-99-99-99"
												type="tel">
											</label>
										</section>
										<section class="col col-3">
											<label class="input"> <i class="icon-prepend fa fa-mobile"></i>
												<input required name="movil[]"
												placeholder="(999) 99-99-99-99-99" type="tel">
											</label>
										</section>
									</div>
									<section class="col col-3">
										<button type="button" onclick="agregar1('1')"
											class="btn btn-primary">
											&nbsp;Agregar <i class="fa fa-mobile"></i>&nbsp;
										</button>
										<button type="button" onclick="agregar1('2')"
											class="btn btn-primary">
											&nbsp;Agregar <i class="fa fa-phone"></i>&nbsp;
										</button>
									</section>
								</div>
							</fieldset>
							<fieldset>
								<legend>Configuración del proveedor</legend>
								<section class="col col-3">
									<label class="select">Selecciona el tipo de proveedor <select
										id="tipo_proveedor" required name="tipo_proveedor">
								<? foreach ( $tipo_proveedor as $key ) {
									echo '<option value="'.$key->id_tipo.'">' . $key->descripcion . '</option>';
								}
								?>
							</select>
									</label>
								</section>
								<section class="col col-3">
									<label class="select">Selecciona la empresa <select
										id="empresa" required name="empresa">
								<? foreach ( $empresa as $key ) {
									echo '<option value="' . $key->id_empresa . '">' . $key->nombre . '</option>';
								}
								?>
							</select>
									</label> <a href="#" onclick="new_empresa()">Agregar empresa <i
										class="fa fa-plus"></i></a>
								</section>
								<section class="col col-3">
									<label class="input">Comisión por producto <input required
										type="text" name="comision" placeholder="%">
									</label>
								</section>
							</fieldset>
							<fieldset>
								<legend>Dirección del proveedor</legend>
								<div id="dir" class="row">
									<section class="col col-4">
										<label class="input"> Dirección de domicilio <input required
											type="text" name="calle">
										</label>
									</section>
									<section id="colonia" class="col col-2">
										<label class="input"> Ciudad <input type="text" name="colonia">
										</label>
									</section>
									<section id="municipio" class="col col-2">
										<label class="input"> Provincia <input type="text"
											name="municipio">
										</label>
									</section>
									<section class="col col-2">
										<label class="input"> Código postal <input required
											onkeyup="codpos()" type="text" id="cp" name="cp">
										</label>
									</section>
									<section class="col col-2">
										País <label class="select"> <select id="pais" required
											name="pais" onChange="ImpuestosPais()"> 
													<? foreach ( $pais as $key ) { ?>
													<option value="<?=$key->Code?>">
														<?=$key->Name?>
													</option>
													<?}?>
												</select>
										</label>
									</section>
								</div>
							</fieldset>
							<fieldset>
								<legend>Datos fiscales del proveedor</legend>
								<div class="row">
									<section class="col col-3">
										<label class="input">Razón social <input required type="text"
											name="razon">
										</label>
									</section>
									<section class="col col-3">
										<label class="input">CURP <input required type="text"
											name="curp">
										</label>
									</section>
									<section class="col col-3">
										<label class="input">RFC <input required type="text"
											name="rfc">
										</label>
									</section>
									<section class="col col-3">
										Regimen fiscal 
										<label class="select"> 
										<select class="custom-scroll" name="regimen">
											<?foreach ($regimen as $key){?>
											<option value="<?=$key->id_regimen?>">
												<?=$key->abreviatura." ".$key->descripcion?></option>
											<?}?>
										</select>
										</label>
									</section>
									<section class="col col-3">
										Zona <label class="select"> <select class="custom-scroll"
											name="zona">
								<?foreach ($zona as $key){?>
								<option value="<?=$key->id_zona?>">
									<?=$key->descripcion?></option>
									<?}?>
								</select>
										</label>
									</section>
								</div>
								<div class="row">
									<div id="cuenta" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<section class="col col-3">Banco
											<label class="select"> 
											<select class="custom-scroll" name="banco[]" id="banco" required>
												<?foreach ($bancos as $key){?>
												<option value="<?=$key->clave ?>">
													<?=$key->descripcion?></option>
												<?}?>
											</select>
											</label>
										</section>
										<section class="col col-3">
											<label class="input">Cuenta <input id="cuenta" required name="Cuenta[]" placeholder="02112312345678901" type="text">
											</label>
										</section>
									</div>
									<section class="col col-3">
										<button type="button" onclick="agregar_cuenta()"
											class="btn btn-primary">&nbsp;Agregar cuenta &nbsp;</button>
									</section>
								</div>
							</fieldset>
							<fieldset>
								<legend>Datos de cobro</legend>
								<div class="row">
									<section class="col col-3">
										<label class="input">Condiciones de pago <input required
											type="text" name="condicion_pago">
										</label>
									</section>
									<section class="col col-3">
										<label class="input">Tiempo promedio de entrega <input
											required type="text" name="promedio_entrega"
											placeholder="En días">
										</label>
									</section>
									<section class="col col-3">
										<label class="input">Tiempo de entrega de documentación <input
											required type="text" name="promedio_entrega_documentacion"
											placeholder="En días">
										</label>
									</section>
								</div>
							</fieldset>
							<fieldset>
								<legend>Credito</legend>
								<div class="row">
									<section class="col col-3">
										<label class="input">Plazo de pago <input required
											type="number" min="0" name="plazo_pago" placeholder="En días">
										</label>
									</section>
									<section class="col col-3">
										<label class="input">Plazo de suspención <input required
											type="number" min="0" name="plazo_suspencion"
											placeholder="En días">
										</label>
									</section>
									<section class="col col-3">
										<label class="input">Plazo de suspención de firma <input
											required type="number" min="0" name="plazo_suspencion_firma"
											placeholder="En días">
										</label>
									</section>
									<section class="col col-3">
										<label class="input">Interes moratorio <input required
											type="number" min="0" name="interes_moratorio"
											placeholder="En %">
										</label>
									</section>
									<section class="col col-3">
										<label class="input">Día de corte <input required
											type="number" min="0" name="dia_corte" placeholder="En días">
										</label>
									</section>
									<section class="col col-3">
										<label class="input">Día de pago <input required type="number"
											min="0" name="dia_pago" placeholder="En días">
										</label>
									</section>
									<section class="col col-3">
										<label class="select">Impuesto 
										<select name="impuesto" id="impuesto">
									<?foreach ($impuesto as $key){?>
									<option value="<?=$key->id_impuesto?>"><?=$key->descripcion." ".$key->porcentaje."%"?></option>
									<?}?>
								</select>
										</label>
									</section>
									<section class="col col-3">
										Credito autorizado
										<div class="inline-group">
											<label class="radio"> <input type="radio" value="1"
												name="credito_autorizado" checked> <i></i>Si
											</label> <label class="radio"> <input type="radio" value="0"
												name="credito_autorizado"> <i></i>No
											</label>
										</div>
									</section>
									<section class="col col-3">
										Credito suspendido
										<div class="inline-group">
											<label class="radio">
												<input type="radio" value="1" name="credito_suspendido">Si
											</label>
											<label class="radio">
												<input type="radio" value="0" name="credito_suspendido" checked> <i></i>No
											</label>
										</div>
									</section>
								</div>
							</fieldset>


							<footer>
								<a type="button" onclick="new_proveedor()"
									class="btn btn-primary">Agregar</a>
							</footer>
						</form>
					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->
			</article>
			<!-- END COL -->
		</div>
		<div class="row">
			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<br /> <br />
			</div>
		</div>
		<!-- END ROW -->
	</section>
</div>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">
function new_proveedor()
{
		var ids = new Array( 
			"#nombre",
		 	"#apellido",
		 	"#pais",
		 	"#cp",
		 	"#tipo_proveedor",
		 	"#email",
		 	"#empresa"
		 );
		var mensajes = new Array( 
			"Por favor ingresa tu nombre",
		 	"Por favor ingresa tu apellido",
		 	"Por favor seleciona un pais",
		 	"Por favor ingresa tu código postal",
		 	"Por favor seleciona el tipo de proveedor",
		 	"Por favor ingresa un correo",
		 	"Por favor seleciona una empresa"
		 );
		
		var validacion = valida_vacios(ids,mensajes);
		
		if(validacion)
		{
			
			$.ajax({
				type: "POST",
				url: "/bo/mercancia/new_proveedor",
				data: $('#proveedor').serialize()
			})
			.done(function( msg1) {
				
					bootbox.dialog({
						message: msg1,
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
		}else{
			$.smallBox({
			      title: "<h1>Atención</h1>",
			      content: "<h3>Por favor reviza que todos los datos estén correctos</h3>",
			      color: "#C46A69",
			      icon : "fa fa-warning fadeInLeft animated",
			      timeout: 4000
			    });
			}
}

function new_empresa()
{
	bootbox.dialog({
		message: '<form id="form_empresa" method="post" class="smart-form">'
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
		title: "Nueva Empresa",
		buttons: {
			submit: {
			label: "Aceptar",
			className: "btn-success",
			callback: function() {

					$.ajax({
						type: "POST",
						url: "/bo/admin/new_empresa",
						data: $("#form_empresa").serialize()
					})
					.done(function( msg )
					{
						var empresa = JSON.parse(msg);	
						$("#empresa").append("<option value="+empresa['id']+">"+empresa['nombre']+"</option>");
						$("#empresa").val(empresa['id']);
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

function agregar_cuenta()
{
	
	$("#cuenta").append('<section class="col col-3">Banco'
			+'<label class="select"> '
			+'<select class="custom-scroll" name="banco[]" id="banco" required>'
				+'<?foreach ($bancos as $key){?>'
				+'<option value="<?=$key->clave ?>">'
					+'<?=$key->descripcion?></option>'
				+'<?}?>'
			+'</select>'
			+'</label>'
		+'</section>'
		+'<section class="col col-3">'
			+'<label class="input">Cuenta <input id="cuenta" required name="Cuenta[]" placeholder="02112312345678901" type="text">'
			+'</label>'
		+'</section>');
}


 $(function()
 {
 	var a = new Date();
 	año = a.getFullYear()-19;
 	
	$( "#datepicker1" ).datepicker({
	changeMonth: true,
	numberOfMonths: 2,
	dateFormat:"yy-mm-dd",
	maxDate: año+"-12-31",
	changeYear: true
	});
});

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

function ImpuestosPais(){
	var pa = $("#pais").val();
	
	$.ajax({
		type: "POST",
		url: "/bo/mercancia/ImpuestaPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		$('#impuesto option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var impuestos = $('#impuesto');
		      $('#impuesto').each(function() {
				  $(this).append('<option value="'+datos[i]['id_impuesto']+'">'+datos[i]['descripcion']+' '+datos[i]['porcentaje']+'</option>');
			    
			});
	    	  
	        
	      }
	});
}
</script>