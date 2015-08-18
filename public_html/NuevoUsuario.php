
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>
					> <a href="/bo/comercial">Comercial</a> 
					> <a href="/bo/comercial/red">Red</a>
					> <a href="/bo/usuarios/afiliar">Tipo de Afiliacion</a>
					> Afiliar Nuevo
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
				<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false">
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
						<div class="widget-body">
							<ul id="myTab1" class="nav nav-tabs bordered">
								<li id="tab1" class="active">
									<a href="#s1" data-toggle="tab">Frontal</a>
								</li>
								
							</ul>
							<div id="myTabContent1" class="tab-content padding-10">
								<div class="tab-pane fade in active" id="s1">
									
									<div id="uno" class="row fuelux">
									
	                                    
	                                	<div id="myWizard" class="wizard">
		                                	
											<ul class="steps">
											
												<li data-target="#step1" class="active">
													<span class="badge badge-info">1</span>Datos del registro<span class="chevron"></span>
												</li>
												<li data-target="#step2">
													<span class="badge">2</span>Datos personales<span class="chevron"></span>
												</li>
												<?php /* ?>
												<li data-target="#step3">
													<span class="badge">3</span>Selección del plan<span class="chevron"></span>
												</li>
												<li id="paso4" data-target="#step4">
													<span class="badge">4</span>Método de pago<span class="chevron"></span>
												</li>
												<?php */ ?>
											</ul>
											<div id="acciones" class="actions">
												<button type="button" class="final btn btn-sm btn-primary btn-prev">
													<i class="fa fa-arrow-left"></i>Anterior
												</button>
												<button type="button" class="final btn btn-sm btn-success btn-next" data-last="Afiliar">
													Siguiente<i class="fa fa-arrow-right"></i>
												</button>
											</div>
										</div>
										<div class="step-content">
											<div class="form-horizontal" id="fuelux-wizard" >
												<div class="step-pane active" id="step1">
													<form id="register" class="smart-form">
														<fieldset>
														
															<legend>Información de cuenta</legend>
															<section id="usuario" class="col col-6">
																<label class="input"> <i class="icon-prepend fa fa-user"></i>
																	<input id="username" onkeyup="use_username()" required type="text" name="username" placeholder="Usuario">
																</label>
															</section>
															<section id="correo" class="col col-6">
																<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
																	<input id="email" onkeyup="use_mail()" required type="email" name="email" placeholder="Email">
																</label>
															</section>
															<section class="col col-6">
																<label class="input"> <i class="icon-prepend fa fa-lock"></i>
																	<input id="password" required type="password" name="password" placeholder="Contraseña">
																</label>
															</section>
															<section class="col col-6">
																<label class="input"> <i class="icon-prepend fa fa-lock"></i>
																	<input id="confirm_password" required type="password" name="confirm_password" placeholder="Repite contraseña">
																</label>
															</section>
															
														</fieldset>
													</form>
												</div>
												<div class="step-pane" id="step2">
													<form method="POST" action="/perfil_red/afiliar_nuevo" id="checkout-form" class="smart-form" novalidate="novalidate">
														<fieldset>
															<legend>Datos personales del afiliado</legend>
															<section class="col col-3">
																<label class="input">RED
																	<select class="form-control input-sm" name="red">
																		<?php foreach ($redes as $red) { ?>
																			<option value="<?php echo $red->id; ?>"><?php echo $red->nombre; ?></option>
																		<?php }?>
																	</select>
																</label>
															</section>
															<div class="row">
																<section class="col col-3">
																	<label class="input"> <i class="icon-prepend fa fa-user"></i>
																		<input id="nombre" required type="text" name="nombre" placeholder="Nombre">
																	</label>
																</section>
																<section class="col col-3">
																	<label class="input"> <i class="icon-prepend fa fa-user"></i>
																		<input id="apellido" required type="text" name="apellido" placeholder="Apellido">
																	</label>
																</section>
																<section class="col col-3">
																	<label class="input"> <i class="icon-prepend fa fa-calendar"></i>
																		<input required id="datepicker" type="text" name="nacimiento" placeholder="Fecha de nacimiento">
																	</label>
																</section>
																<section class="col col-3" id="key">
																	<label id="key_" class="input"> <i class="icon-prepend fa fa-barcode"></i>
																		<input id="keyword" onkeyup="check_keyword()" placeholder="RFC o CURP" type="text" name="keyword">
																	</label>
																</section>
																<section class="col col-2">
																	Tipo de persona
																	<label class="select">
																		<select id="tipo_fiscal" required name="fiscal">
																		<?foreach ($tipo_fiscal as $key)
																		{?>
																			<option value="<?=$key->id?>">
																				<?=$key->descripcion?>
																			</option>
																		<?}?>
																		</select>
																	</label>
																</section>
															</div>
															<input type="hidden" name="tipo_plan" id="tipo_plan">
															<div class="row">
															<div id="tel" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																<section class="col col-3">
																	<label class="input"> <i class="icon-prepend fa fa-phone"></i>
																		<input required name="fijo[]" placeholder="(99) 99-99-99-99" type="tel">
																	</label>
																</section>
																<section class="col col-3">
																	<label class="input"> <i class="icon-prepend fa fa-mobile"></i>
																		<input required name="movil[]" placeholder="(999) 99-99-99-99-99" type="tel">
																	</label>
																</section>
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
															<legend>Datos co-aplicante</legend>
															<div class="row">
																<section class="col col-4">
																	<label class="input">
																		<input placeholder="Nombre" type="text" name="nombre_co">
																	</label>
																</section>
																<section class="col col-4">
																	<label class="input"> 
																		<input placeholder="Apellido" type="text" name="apellido_co">
																	</label>
																</section>
																<section class="col col-4" id="key_co">
																	<label id="key_1" class="input"> <i class=" icon-prepend fa fa-barcode"></i>
																		<input onkeyup="check_keyword_co()" placeholder="CURP o RFC" type="text" name="keyword_co" id="keyword_co">
																	</label>
																</section>
															</div>
														</fieldset>
														<fieldset>
														<legend>Dirección del afiliado</legend>
															<div id="dir" class="row">
																<section class="col col-2">
																	País
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
																<section class="col col-2">
																	<label class="input">
																		Código postal
																		<input required onkeyup="codpos()" type="text" id="cp" name="cp">
																	</label>
																</section>
																<section class="col col-2">
																	<label class="input">
																		Calle
																		<input required type="text" name="calle">
																	</label>
																</section>
																<section id="colonia" class="col col-2">
																	<label class="input">
																		Colonia
																		<input type="text" name="colonia" >
																	</label>
																</section>
																<section id="municipio" class="col col-2">
																	<label class="input">
																		Municipio
																		<input type="text" name="municipio" >
																	</label>
																</section>
																<section id="municipio" class="col col-2">
																	<label class="input">
																		Estado
																		<input type="text" name="estado" >
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
																		<?foreach ($civil as $key)
																		{
																			if($key->id_edo_civil==$usuario[0]->id_edo_civil)
																				echo '<option selected value="'.$key->id_edo_civil.'">'.$key->descripcion.'</option>';
																			else
																			echo '<option value="'.$key->id_edo_civil.'">'.$key->descripcion.'</option>';
																				
																		}?>
																		</select>
																	</label>
																</section>
																<section class="col col-2">Sexo&nbsp;
																	<div class="inline-group">
																		<?
																		foreach ($sexo as $value)
																		{?>
																			<label class="radio">
																			<input <?=($value->id_sexo==1) ? 'checked' : '' ?> type="radio" value="<?=$value->id_sexo?>" name="sexo" placeholder="sexo">
																			<i></i><?=$value->descripcion?></label>
																		<?}?>
																		</div>
																</section>
																<section class="col col-2">Estudio&nbsp;
																	<div class="inline-group">
																		<?
																		foreach ($estudios as $value)
																		{?>
																			<label class="radio">
																			<input <?=($value->id_estudio==1) ? 'checked' : '' ?> type="radio" value="<?=$value->id_estudio?>" name="estudios">
																			<i></i><?=$value->descripcion?></label>
																		<?}?>
																		</div>
																</section>
																<section class="col col-2">Ocupación&nbsp;
																	<div class="inline-group">
																		<?
																		foreach ($ocupacion as $value)
																		{?>
																			<label class="radio">
																			<input <?=($value->id_ocupacion==1) ? 'checked' : '' ?> type="radio" value="<?=$value->id_ocupacion?>" name="ocupacion">
																			<i></i><?=$value->descripcion?></label>
																		<?}?>
																		</div>
																</section>
																<section class="col col-2">Tiempo dedicado&nbsp;
																	<div class="inline-group">
																		<?
																		foreach ($tiempo_dedicado as $value)
																		{?>
																			<label class="radio">
																			<input <?=($value->id_tiempo_dedicado==1) ? 'checked' : '' ?> type="radio" value="<?=$value->id_tiempo_dedicado?>" name="tiempo_dedicado">
																			<i></i><?=$value->descripcion?></label>
																		<?}?>
																		</div>
																</section>
															</div>
														</fieldset>
															
													</form>
												</div>
												<div class="step-pane" id="step3">

													<div class="row">
														<br />
													</div>
													<div class="hidden-xs hidden-sm hidden-md col-lg-1"></div>
													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
														<div class="row">
													        <div id="planuno" class="col-xs-12 col-sm-6 col-md-3">
													            <div class="panel panel-success pricing-big">
													                <div class="panel-heading">
													                    <h3 class="panel-title">
													                       <i class="fa fa-plane"></i> Plan despegue</h3>
													                </div>
													                <div class="panel-body no-padding text-align-center">
													                    <div class="the-price">
													                        <h1>
													                            <strong>$85.25 USD</strong></h1>
													                    </div>
																		<div class="price-features">
																			<ul class="list-unstyled text-left">
																	          	<li><h1><i class="fa fa-check text-success"></i> <strong>8%</strong> de ganancia</h1></li>
																	        	<li><h1><i class="fa fa-check text-success"></i> <strong>60</strong> puntos de comisión</h1></li>
																	        	<li><i class="fa fa-check text-success"></i> <strong>1</strong> Aloe Detox (6 pack)</li>
																	        	<li><i class="fa fa-check text-success"></i> <strong>1</strong> Vita Live (6 pack)</li>
																	        	<li><i class="fa fa-check text-success"></i> <strong>1</strong> Linea Gala</li>
																	        </ul>
																		</div>
													                </div>
													                <div class="panel-footer text-align-center">
													                    <a id="plan1" href="javascript:void(0);" class="btn btn-primary btn-block" role="button">Seleccionar</span></a>
													                </div>
													            </div>
													        </div>
													        
													        <div id="plandos" class="col-xs-12 col-sm-6 col-md-3">
													            <div class="panel panel-teal pricing-big">
													            	
													                <div class="panel-heading">
													                    <h3 class="panel-title">
													                        <i class="fa fa-bar-chart-o"></i> Plan avance</h3>
													                </div>
													                <div class="panel-body no-padding text-align-center">
													                    <div class="the-price">
													                        <h1>
													                            <strong>$164.00 USD</strong></h1>
													                    </div>
																		<div class="price-features">
																			<ul class="list-unstyled text-left">
																	          	<li><h1><i class="fa fa-check text-success"></i> <strong>10%</strong> de ganancia</h1></li>
																	        	<li><h1><i class="fa fa-check text-success"></i> <strong>135</strong> puntos de comisión</h1></li>
																	        	<li><i class="fa fa-check text-success"></i> <strong>4</strong> Aloe Detox (6 pack)</li>
																	        	<li><i class="fa fa-check text-success"></i> <strong>3</strong> Vita Live (6 pack)</li>
																	        	<li><i class="fa fa-check text-success"></i> <strong>1</strong> Linea Gala</li>
																	        </ul>
																		</div>
													                </div>
													                <div class="panel-footer text-align-center">
													                    <a id="plan2" href="javascript:void(0);" class="btn btn-primary btn-block" role="button">Seleccionar</span></a>
													                </div>
													            </div>
													        </div>
													        
													        <div id="plantres" class="col-xs-12 col-sm-6 col-md-3">
													            <div class="panel panel-primary pricing-big">
													            	<img src="/template/img/ribbon.png" class="ribbon" alt="">
													                <div class="panel-heading">
													                    <h3 class="panel-title">
													                        <i class="fa fa-suitcase"></i> Plan empresarial</h3>
													                </div>
													                <div class="panel-body no-padding text-align-center">
													                    <div class="the-price">
													                        <h1>
													                            <strong>$454.25 USD</strong></h1>
													                    </div>
																		<div class="price-features">
																			<ul class="list-unstyled text-left">
																	          	<li><h1><i class="fa fa-check text-success"></i> <strong>12%</strong> de ganancia</h1></li>
																	        	<li><h1><i class="fa fa-check text-success"></i> <strong>420</strong> puntos de comisión</h1></li>
																	        	<li><i class="fa fa-check text-success"></i> <strong>10</strong> Aloe Detox (6 pack)</li>
																	        	<li><i class="fa fa-check text-success"></i> <strong>9</strong> Vita Live (6 pack)</li>
																	        	<li><i class="fa fa-check text-success"></i> <strong>4</strong> Linea Gala</li>
																	        </ul>
																		</div>
													                </div>
													                <div class="panel-footer text-align-center">
													                    <a id="plan3" href="javascript:void(0);" class="btn btn-primary btn-block" role="button">Seleccionar</span></a>
													                </div>
													            </div>
													        </div>
													        
													        <div id="plancuatro" class="col-xs-12 col-sm-6 col-md-3">
													            <div class="panel panel-darken pricing-big">
													            	
													                <div class="panel-heading">
													                    <h3 class="panel-title">
													                        <i class="fa fa-signal"></i> <i class="fa fa-male"></i> Plan inversionista</h3>
													                </div>
													                <div class="panel-body no-padding text-align-center">
													                    <div class="the-price">
													                        <h1>
													                            <strong>$920.00 USD</strong></h1>
													                    </div>
																		<div class="price-features">
																			<ul class="list-unstyled text-left">
																	          	<li><h1><i class="fa fa-check text-success"></i> <strong>15%</strong> de ganancia</h1></li>
																	        	<li><h1><i class="fa fa-check text-success"></i> <strong>850</strong> puntos de comisión</h1></li>
																	        	<li><i class="fa fa-check text-success"></i> <strong>20</strong> Aloe Detox (6 pack)</li>
																	        	<li><i class="fa fa-check text-success"></i> <strong>20</strong> Vita Live (6 pack)</li>
																	        	<li><i class="fa fa-check text-success"></i> <strong>8</strong> Linea Gala</li>
																	        	<li><i class="fa fa-check text-success"></i> <small>Podrás modificar la cantidad de producto que tengan el mismo precio que no insida en el valor y puntaje del plan</small></li>
																	        </ul>
																		</div>
													                </div>
													                <div class="panel-footer text-align-center">
													                    <a id="plan4" href="javascript:void(0);" class="btn btn-primary btn-block" role="button">Seleccionar</span></a>
													                </div>
													            </div>
													        </div>		    	
											    		</div>
											    		<br />
											    		<a id="remove_step" href="javascript:void(0);" class="btn btn-primary btn-block" role="button">Comprar el plan después</span></a>
											    	</div>
												</div>
												<div class="step-pane" id="step4">
													<div class="well">
-														<p>El pago se realizara despues, en la enttrega de su primer pedido</p>
-													</div>
												</div>
				
											</div>
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
	            <br />
	            <br />
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
* {margin: 0; padding: 0;}
.nombre{background: rgba(255,255,255,.3); width: 100px; margin-top: -5px; margin-left: -11px;}
.todo{font-size: 11px; width: 100%; background: rgba(0,0,0,.5); margin-top: -4px; color: #FFF; cursor: pointer;}
.todo1{font-size: 11px; width: 100%; background: rgba(70, 120, 250, .8); margin-top: -4px; color: #FFF; cursor: pointer;}
.todo:hover{font-size: 11px; text-decoration: underline; width: 100%; margin-top:-4px; background: rgba(0,0,0,.7); color: #FFF; cursor: pointer;}
.todo1:hover{font-size: 11px; text-decoration: underline; width: 100%; margin-top:-4px; background: rgba(70, 120, 250, 1); color: #FFF; cursor: pointer;}
.tree1 ul {
	padding-top: 20px; position: relative;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree1 li {
	float: left; text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree1 li::before, .tree1 li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 3px solid #ccc;
	width: 50%; height: 20px;
}
.tree1 li::after{
	right: auto; left: 50%;
	border-left: 3px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree1 li:only-child::after, .tree1 li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree1 li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree1 li:first-child::before, .tree1 li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree1 li:last-child::before{
	border-right: 3px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree1 li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree1 ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 3px solid #ccc;
	width: 0; height: 20px;
}

.tree1 li a{

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
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree1 li a:hover+ul li::after, 
.tree1 li a:hover+ul li::before, 
.tree1 li a:hover+ul::before, 
.tree1 li a:hover+ul ul::before{
	border-color:  #94a0b4;
}

.packselected
{
	border-top: solid 5px #CCC;
	border-bottom: solid 5px #CCC;
	-webkit-box-shadow: 0px 0px 10px #CCC;
	-moz-box-shadow: 0px 0px 10px #CCC;
	box-shadow: 0px 0px 10px #CCC;
}
/*Thats all. I hope you enjoyed it.
Thanks :)*/
</style>
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">

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
								url: "/bo/usuarios/afiliar_nuevo",
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
												location.href="";
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
})
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
		$("#usuario").append("<p id='msg_usuario'>"+msg+"</msg>")
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
		$("#correo").append("<p id='msg_correo'>"+msg+"</msg>")
	});
}
function use_username_r()
{
	$("#msg_usuario_r").remove();
	var username=$("#username_r").val();
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/use_username",
		data: {username: username},
	})
	.done(function( msg )
	{
		$("#usuario_r").append("<p id='msg_usuario_r'>"+msg+"</msg>")
	});
}
function use_mail_r()
{
	$("#msg_correo_r").remove();
	var mail=$("#email_r").val();
	$("#mail_important").attr('value',mail);
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/use_mail",
		data: {mail: mail},
	})
	.done(function( msg )
	{
		$("#correo_r").append("<p id='msg_correo_r'>"+msg+"</msg>")
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