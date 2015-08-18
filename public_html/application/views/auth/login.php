<!DOCTYPE html>
<html lang="en-us" id="extr-page">
	<head>
		<meta charset="utf-8">
		<title>Networksoft</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- #CSS Links -->
		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="/template/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/template/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
		<link rel="stylesheet" type="text/css" media="screen" href="/template/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/template/css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support is under construction
			 This RTL CSS will be released in version 1.5
		<link rel="stylesheet" type="text/css" media="screen" href="/template/css/smartadmin-rtl.min.css"> -->

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="/template/css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="/template/css/demo.min.css">

		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="/template/img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/template/img/favicon/favicon.ico" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- #APP SCREEN / ICONS -->
		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="/template/img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/template/img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/template/img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/template/img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="/template/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="/template/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="/template/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

	</head>
	
	<body class="animated fadeInDown">

		<header id="header" class="fade in">
		<br />
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Sistema Integral de Operaciones NetworkSoft &reg;</h1>
			</div>
		</header>

		<div id="main" role="main">

			<!-- MAIN CONTENT -->
			<div id="content" class="container">

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 hidden-xs hidden-sm">
						<img src="/template/img/login.jpg" class="img2" alt="" >
					</div>
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
						<div class="header2">
							<img id="compania" src="/logo.png" alt="">
						</div>
						<div class="well no-padding">
							<form id="login-form" method="POST" action="/auth/login" class="smart-form client-form">
								<header>
									Iniciar sesión
								</header>
								<fieldset>
								<?php
									
									if(isset($data['errors']))
									{
										$pswd="";
										if(isset($data['errors']['login']))
										{
											$login='Error en la cuenta. ';
										}
										if(isset($data['errors']['password']))
										{
											$pswd='Error en la contraseña. ';
										}
										if(isset($data['errors']['blocked']))
										{
											$pswd='Tu cuenta esta bloqueada , intenta ingresar en 30 Minutos.<br>';
										}
										if(isset($data['errors']['attempts']))
										{
											$pswd.='Solo te queda '.$data['errors']['attempts'].' intentos antes que se bloque la cuenta.<br>';
										}

									}
									
								?>

									<span style="color: red;"><?php if(isset($login)) echo $login?></span>
									<span style="color: red;"><?php if(isset($pswd)) echo $pswd?></span>
									<div class="hidden-xs hidden-md hidden-sm col-lg-6">
										<img src="/template/img/empresario.jpg" alt="Empresario">
									</div>
									<div class="col-xs-12 col-md-12 col-sm-12 col-lg-6">
										<section>
											<label class="label">Cuenta</label>
											<label class="input"> <i class="icon-append fa fa-user"></i>
												<input required type="text" placeholder="" name="login">
												<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Ingrese su id, usuario o correo</b></label>
										</section>

										<section>
											<label class="label">Contraseña</label>
											<label class="input"> <i class="icon-append fa fa-lock"></i>
												<input required type="password" placeholder="<?php if(isset($pswd)) echo $pswd?>" name="password">
												<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingrese la contraseña</b> </label>
											<div class="note">
												<a href="/auth/forgot_password">Olvidaste tu contraseña?</a>
											</div>
										</section>
									</div>
								</fieldset>
								<footer>
									<button id="enviar" type="submit" class="btn btn-primary">
										Iniciar
									</button>
								</footer>
							</form>

						</div>
					</div>
				</div>
			</div>

		</div>
		<div id="footer" class="fade in">
		<br />
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<small>Todos los derechos reservados </small>
			</div>
		</div>
		<!--================================================== -->	
		<style type="text/css" media="screen">
			#header
			{
				text-align: center; 
				color: #FFF !important;
				background: #2A9BDD !important;

			}
			#compania{width: 45%; margin: 0 auto;}
			#header h1{margin-top: -5px;}
			#login-form{
				-webkit-box-shadow: inset 0px 0px 10px #000;
				-moz-box-shadow: inset 0px 0px 10px #000;
				box-shadow: inset 0px 0px 10px #000;
			}
			#enviar{color: #FFF; font-weight: initial;}
			.header2{text-align: center; padding-bottom: 10px;}
			.img2{margin-top: 8%}
			#footer
			{
				height: 102px;
				text-align: center;color: #FFF !important;
				background: #2A9BDD !important;
			}
		</style>
		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script src="/template/js/plugin/pace/pace.min.js"></script>

	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script> if (!window.jQuery) { document.write('<script src="/template/js/libs/jquery-2.0.2.min.js"><\/script>');} </script>

	    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script> if (!window.jQuery.ui) { document.write('<script src="/template/js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="/template/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->		
		<script src="/template/js/bootstrap/bootstrap.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="/template/js/plugin/jquery-validate/jquery.validate.min.js"></script>
		
		<!-- JQUERY MASKED INPUT -->
		<script src="/template/js/plugin/masked-input/jquery.maskedinput.min.js"></script>
		
		<!--[if IE 8]>
			
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
			
		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="/template/js/app.min.js"></script>

		<script type="text/javascript">
			runAllForms();

			$(function() {
				// Validation
				$("#login-form").validate({
					// Rules for form validation
					rules : {
						email : {
							required : true,
							email : true
						},
						password : {
							required : true,
							minlength : 3,
							maxlength : 20
						}
					},

					// Messages for form validation
					messages : {
						email : {
							required : 'Por favor ingresa una cuenta de correo',
							email : 'Porfavor ingresa una cuenta de correo valida'
						},
						password : {
							required : 'Por favor ingresa tu correo'
						}
					},

					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
			});
		</script>

	</body>
</html>
