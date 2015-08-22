<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {

	// fuelux 

			  var wizard = $('.wizard').wizard();

			  wizard.on('finished', function (e, data) {

			  	var ids = new Array( 
						"#nombre",
					 	"#apellido",
					 	"#datepicker",
					 	"#cp",
					 	"#username",
					 	"#email",
					 	"#password",
					 	"#confirm_password"
					 	
					 );
					var mensajes = new Array( 
						"Por favor ingresa tu nombre",
					 	"Por favor ingresa tu apellido",
					 	"Por favor ingresa tu fecha de nacimiento",
					 	"Por favor ingresa tu código postal",
					 	"Por favor ingresa un nombre de usuario",
					 	"Por favor ingresa un correo",
					 	"Por favor ingresa una contraseña",
					 	"Por favor confirma tu contraseña"
					 );

					var idss=new Array(
						"#username"
					);
					var mensajess=new Array(
						"El nombre de usuario no puede contener espacios en blanco"
					);
					var validacion_=valida_espacios(idss,mensajess);
					var validacion=valida_vacios(ids,mensajes);
					if(validacion&&validacion_)
					{
						$( ".steps" ).slideUp();
						$( ".steps" ).remove();
						$( ".actions" ).slideUp();
						$( ".actions" ).remove();
						$("#myWizard").append('<div class="progress progress-sm progress-striped active"><div id="progress" class="progress-bar bg-color-darken"  role="progressbar" style=""></div></div>');
						
						$.ajax({
							type: "POST",
							url: "/auth/register",
							data: $('#register').serialize()
						})
						.done(function( msg1 ) {
							
							$("#progress").attr('style','width: 40%');
							var email=$("#email").val();
							$("#checkout-form").append("<input value='"+email+"' type='hidden' name='mail_important'>");
							$.ajax({
								type: "POST",
								url: "/ov/perfil_red/afiliar_nuevo",
								data: $('#checkout-form').serialize()
								})
								.done(function( msg ) {
									$("#progress").attr('style','width: 100%');
									bootbox.dialog({
										message: msg,
										title: "Atención",
										buttons: {
											success: {
											label: "Ok!",
											className: "btn-success",
											callback: function() {
												location.href="/ov/red/red_arbol1?id="+<?php echo $_GET['id']; ?>;
												}
											}
										}
									});
								});
						});//fin Done ajax
					}
					else
					{
						$.smallBox({
					      title: "<h1>Atención</h1>",
					      content: "<h3>Por favor reviza que todos los datos estén correctos</h3>",
					      color: "#C46A69",
					      icon : "fa fa-warning fadeInLeft animated",
					      timeout: 4000
					    });
					}
			    
			  });
	
	pageSetUp();
});


$("#remove_step").click(function() {
	$("#tipo_plan").attr("name","tipo_plan");
	$('.wizard').wizard('selectedItem', {
			step: 4
		});
	$( "#step4" ).slideUp();
	$( "#step4" ).remove();
	$( "#paso4" ).slideUp();
	$( "#paso4" ).remove();
	$( this ).slideUp();
	$( this ).remove();
});

$("#plan1").click(function(event) {
	$("#tipo_plan").attr("value","1");
	$("#planuno").addClass('packselected');
	$("#plandos").removeClass('packselected');
	$("#plantres").removeClass('packselected');
	$("#plancuatro").removeClass('packselected');
});

$("#plan2").click(function(event) {
	$("#tipo_plan").attr("value","2");
	$("#planuno").removeClass('packselected');
	$("#plandos").addClass('packselected');
	$("#plantres").removeClass('packselected');
	$("#plancuatro").removeClass('packselected');
});
$("#plan3").click(function(event) {
	$("#tipo_plan").attr("value","3");
	$("#planuno").removeClass('packselected');
	$("#plandos").removeClass('packselected');
	$("#plantres").addClass('packselected');
	$("#plancuatro").removeClass('packselected');
});
$("#plan4").click(function(event) {
	$("#tipo_plan").attr("value","4");
	$("#planuno").removeClass('packselected');
	$("#plandos").removeClass('packselected');
	$("#plantres").removeClass('packselected');
	$("#plancuatro").addClass('packselected');
});



/*
CODIGO PARA QUITAR ELEMENTO HACIENDO CLICK EN ELLOS
$("input").click(function() {
$( this ).slideUp();
$( this ).remove();
});
*/
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
function clickme()
{
}

function SelecionarFase()
{
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/MensajeFase",
		data: {	id: <?php echo $id ?>, red: <?php echo $_GET['id']; ?> }
	})
	.done(function( msg )
	{
		bootbox.dialog({
			message: msg,
			title: "Informacion Personal",
			buttons: {
				success: {
				label: "Cerrar!",
				className: "hide",
				callback: function() {
					//location.href="";
					}
				}
			}
		});
	});
}

function faseCambio(fase){
	
	bootbox.dialog({
		message: "¿Estas Seguro?",
		title: "Atención",
		buttons: {
			success: {
			label: "Si",
			className: "btn-success",
			callback: function() {
				
				$.ajax({
					type: "POST",
					url: "/ov/perfil_red/CambioFase",
					data: {
						id: <?php echo $id ?>,
						red: <?php echo $_GET['id']; ?>,
						fase: fase
							},
					})
					.done(function(msg)
					{
						alert('Has Cambiado de fase'+msg);
						location.reload();
					})
				}
			},
			close:{
				label: "NO",
				className: "btn-danger",
				callback: function() {
					
					}
				}
		}
	});
	
}

function use_username()
{
	$("#msg_usuario").remove();
	var username=$("#username").val();
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/use_username",
		data: {username: username},
	})
	.done(function( msg )
	{
		if( msg != ''){
			$("#usuario2").html('<div id="msg_usuario" class="alert alert-success fade in">'
						+'<i class="fa-fw fa fa-check"></i>'
						+'<strong>Corecto </strong> Username Correcto'
					+'</div>')
		}else{
			$("#usuario2").html('<div id="msg_usuario" class="alert alert-danger fade in">'
						+'<i class="fa-fw fa fa-check"></i>'
						+'<strong>Error </strong> Username no esta registrado en el sistema'
					+'</div>')
			}
		
	});
}

function use_mail()
{
	$("#msg_correo").remove();
	var mail=$("#email").val();
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/use_mail",
		data: {mail: mail},
	})
	.done(function( msg )
	{
		if( msg != ''){
			$("#correo2").html('<div id="msg_correo" class="alert alert-success fade in">'
					
						+'<i class="fa-fw fa fa-check"></i>'
						+'<strong>Corecto </strong> Emial Correcto'
					+'</div>')
		}else{
			$("#correo2").html('<div id="msg_correo" class="alert alert-danger fade in">'
					
						+'<i class="fa-fw fa fa-check"></i>'
						+'<strong>Error </strong> Email no esta registrado en el sistema'
					+'</div>')
			}
		
		
	});
}
function otra()
{
	if($("#otro:checked").val()=="on")
	{
		$("#b_persona").removeClass("hidden");
		$("#afiliado_value").attr("name","afiliados");
	}
	else
	{
		$("#b_persona").addClass("hidden");
		$("#afiliado_value").attr("name","");
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
function agregar_red(tipo)
{
	if(tipo==1)
	{
		$("#tel_red").append("<section class='col col-6'><label class='input'> <i class='icon-prepend fa fa-mobile'></i><input type='tel' name='movil[]' placeholder='(999) 99-99-99-99-99'></label></section>");
	}
	else
	{
		$("#tel_red").append("<section class='col col-6'><label class='input'> <i class='icon-prepend fa fa-phone'></i><input type='tel' name='fijo[]' placeholder='(999) 99-99-99-99-99'></label></section>");
	}
}
 $(function()
 {
 	a = new Date();
	año = a.getFullYear()-19;
	$( "#datepicker" ).datepicker({
	changeMonth: true,
	numberOfMonths: 2,
	maxDate: año+"-12-31",
	dateFormat:"yy-mm-dd",
	changeYear: true
	});
});

function subred(id)
{
	$("#"+id).children(".quitar").attr('onclick','');
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/get_red_afiliar",
		data: {id: id,
				red: <?php echo $_GET['id']; ?>},
	})
	.done(function( msg )
	{
		$("#"+id).append(msg);
	});
}

function botbox(nombre, id, lado)
{
	bootbox.dialog({
		message: '<div class="row fuelux">'
		+'<form id="register" class="smart-form">'
			+'<fieldset>'
			+'<legend>Información de cuenta</legend>'
				+'<section id="usuario" class="col col-6">'
					+'<label class="input"> <i class="icon-prepend fa fa-user"></i>'
						+'<input id="username" onkeyup="use_username()" required type="text" name="username" placeholder="Usuario">'
					+'</label>'
					+'<div id="usuario2" > </div>'
				+'</section>'
				+'<section id="correo" class="col col-6">'
					+'<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>'
						+'<input id="email" onkeyup="use_mail()" required type="email" name="email" placeholder="Email">'
					+'</label>'
					+'<div id="correo2" > </div>'
				+'</section>'
				+'<input class="hide" type="text" name="red" id="red" value="<?php echo $_GET['id']; ?>" placeholder="">'
				+'<input type="text" name="id" value="'+id+'" class="hide">'
				+'<input type="text" name="lado" value="'+lado+'" class="hide">'
			+'</fieldset>'
			+'<input type="button" class="btn btn-primary" value="Afiliar" onclick="Crear()">'
		+'</form>',
		title: "Afiliar a "+nombre,
	});
	}

function Crear() {
	
	var ids = new Array( 
					
				 	"#username",
				 	"#email"
				 	
				 );
				var mensajes = new Array( 
					"Por favor ingresa un nombre de usuario",
				 	"Por favor ingresa un correo"
				 );

				var idss=new Array(
					"#username"
				);
				var mensajess=new Array(
					"El nombre de usuario no puede contener espacios en blanco"
				);
				var validacion_=valida_espacios(idss,mensajess);
				var validacion=valida_vacios(ids,mensajes);
				if(validacion&&validacion_)
				{
					$("#myWizard").append('<div class="progress progress-sm progress-striped active"><div id="progress" class="progress-bar bg-color-darken"  role="progressbar" style=""></div></div>');
					$.ajax({
						type: "POST",
						url: "/ov/perfil_red/AgregarUsuarioRed",
						data: $('#register').serialize()
					})
					.done(function( msg1 ) {
						
						$("#progress").attr('style','width: 100%');
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
						
						var email=$("#email").val();
						$("#checkout-form").append("<input value='"+email+"' type='hidden' name='mail_important'>");
						
					});//fin Done ajax
				}
				else
				{
					$.smallBox({
				      title: "<h1>Atención</h1>",
				      content: "<h3>Por favor reviza que todos los datos estén correctos</h3>",
				      color: "#C46A69",
				      icon : "fa fa-warning fadeInLeft animated",
				      timeout: 4000
				    });
				}
		    
		  

pageSetUp();
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
function check_keyword_red()
{
	$("#msg_key_red").remove();
	var keyword=$("#keyword_red").val();
	$("#key_2").append('<i id="ajax_2" class="icon-append fa fa-spinner fa-spin"></i>');
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/use_keyword",
		data: {keyword: keyword},
	})
	.done(function( msg )
	{
		$("#key_red").append("<p id='msg_key_red'>"+msg+"</msg>");
		$("#ajax_2").remove();
	});
}
function check_keyword_red_co()
{
	$("#msg_key_red_co").remove();
	var keyword=$("#keyword_red_co").val();
	$("#key_3").append('<i id="ajax_3" class="icon-append fa fa-spinner fa-spin"></i>');
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/use_keyword",
		data: {keyword: keyword},
	})
	.done(function( msg )
	{
		$("#msg_key_red_co").remove();
		$("#key_red_co").append("<p id='msg_key_red_co'>"+msg+"</msg>");
		$("#ajax_3").remove();
	});
}
function codpos_red()
{
	var pais = $("#pais_red").val();
	if(pais=="MEX")
	{
		var cp=$("#cp_red").val();
		$.ajax({
			type: "POST",
			url: "/ov/perfil_red/cp_red",
			data: {cp: cp},
		})
		.done(function( msg )
		{
			$("#colonia_red").remove();
			$("#municipio_red").remove();
			$("#estado_red").remove();
			$("#dir_red").append(msg);
		})
	}
}
function detalles(id)
{
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/detalle_usuario",
		data: {id: id},
	})
	.done(function( msg )
	{
		bootbox.dialog({
			message: msg,
			title: "Detalles",
			buttons: {
				success: {
				label: "Cerrar!",
				className: "btn-success",
				callback: function() {
					//location.href="";
					}
				}
			}
		});
	});
}
</script>
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a> <span>
					> <a href="/ov/perfil_red/TipoAfiliacion">Tipo de Afiliacion</a> >
					<a href="/ov/perfil_red/afiliarExistente?tipo=2">Red</a> > <a
					href="/ov/perfil_red/afiliarExistente?id=<?php echo $_GET['id']; ?>">Afiliar
						Usuario</a> > Red
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
						<h2>Datos personales</h2>
					</header>

					<!-- widget div-->
					<div style="height: 35rem; overflow: auto;">

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body">
							<div id="myTabContent1" class="tab-content padding-10">
								<div class="tab-pane fade in active" id="s2">

									<div id="dos" class="row">
										<!--
										We will create a family tree1 using just CSS(3)
										The markup will be simple nested lists
										-->
										<div class="tree1" style="width: 10000rem;">
											<ul>
												<li><a style="background: url('<?=$img_perfil?>'); background-size: cover; background-position: center;" href="#"><div
															class="nombre">Tú</div></a>
													<ul>
													<?
													$aux = 0;
													foreach ( $afiliados as $key ) {
														$aux ++;
														$key->img ? $img = $key->img : $img = "/template/img/empresario.jpg";
														if ($key->debajo_de == $id) {
															?>
														<li id="<?=$key->id_afiliado?>"><a class="quitar" style="background: url('<?=$img?>'); background-size: cover; background-position: center;" onclick="subred(<?=$key->id_afiliado?>)" href="#"></a>
															<div onclick="detalles(<?=$key->id_afiliado?>)"
																class="<?=($key->directo==0) ? 'todo' : 'todo1'?>"><?=$key->afiliado?> <?=$key->afiliado_p?><br />Detalles
															</div></li>
														<?
														
}
													}
													for($i = $aux; $i < $red_frontales [0]->frontal; $i ++) {
														?>
															<li><a
															onclick='botbox("<?php echo 'Tu'; ?>","<?php echo $id; ?>","<?php echo $i; ?> ")'
															href='javascript:void(0)'>Afiliar Aqui</a></li>
														<? } ?>
													</ul></li>
											</ul>
										</div>
									</div>

								</div>
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
		<div class="row">
			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<br /> <br />
			</div>
		</div>
		<!-- END ROW -->
	</section>
	<!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->
<!-- PAGE RELATED PLUGIN(S) -->
<style type="text/css">
/*Now the CSS*/
* {
	margin: 0;
	padding: 0;
}

.nombre {
	background: rgba(255, 255, 255, .3);
	width: 100px;
	margin-top: -5px;
	margin-left: -11px;
}

.todo {
	font-size: 11px;
	width: 100%;
	background: rgba(0, 0, 0, .5);
	margin-top: -4px;
	color: #FFF;
	cursor: pointer;
}

.todo1 {
	font-size: 11px;
	width: 100%;
	background: rgba(70, 120, 250, .8);
	margin-top: -4px;
	color: #FFF;
	cursor: pointer;
}

.todo:hover {
	font-size: 11px;
	text-decoration: underline;
	width: 100%;
	margin-top: -4px;
	background: rgba(0, 0, 0, .7);
	color: #FFF;
	cursor: pointer;
}

.todo1:hover {
	font-size: 11px;
	text-decoration: underline;
	width: 100%;
	margin-top: -4px;
	background: rgba(70, 120, 250, 1);
	color: #FFF;
	cursor: pointer;
}

.tree1 ul {
	padding-top: 20px;
	position: relative;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree1 li {
	float: left;
	text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/
.tree1 li::before, .tree1 li::after {
	content: '';
	position: absolute;
	top: 0;
	right: 50%;
	border-top: 3px solid #ccc;
	width: 50%;
	height: 20px;
}

.tree1 li::after {
	right: auto;
	left: 50%;
	border-left: 3px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree1 li:only-child::after, .tree1 li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree1 li:only-child {
	padding-top: 0;
}

/*Remove left connector from first child and 
right connector from last child*/
.tree1 li:first-child::before, .tree1 li:last-child::after {
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree1 li:last-child::before {
	border-right: 3px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}

.tree1 li:first-child::after {
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree1 ul ul::before {
	content: '';
	position: absolute;
	top: 0;
	left: 50%;
	border-left: 3px solid #ccc;
	width: 0;
	height: 20px;
}

.tree1 li a {
	height: 100px;
	width: 100px;
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #000;
	font-size: 13px;
	display: inline-block;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree1 li a:hover, .tree1 li a:hover+ul li a {
	background: #c8e4f8;
	color: #000;
	border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree1 li a:hover+ul li::after, .tree1 li a:hover+ul li::before, .tree1 li a:hover+ul::before,
	.tree1 li a:hover+ul ul::before {
	border-color: #94a0b4;
}

.packselected {
	border-top: solid 5px #CCC;
	border-bottom: solid 5px #CCC;
	-webkit-box-shadow: 0px 0px 10px #CCC;
	-moz-box-shadow: 0px 0px 10px #CCC;
	box-shadow: 0px 0px 10px #CCC;
}
/*Thats all. I hope you enjoyed it.
Thanks :)*/
</style>
