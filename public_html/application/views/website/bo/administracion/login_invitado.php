
<div class="container">

	<div class="row">
	
		<div class="col-lg-6 col-md-6 ">
		
		<form id="login-form" method="POST" action="/bo/administracion/ingreso_invitado" class="smart-form client-form">
								<header>
									Iniciar sesión
								</header>
								<fieldset>
							

									<div class="hidden-xs hidden-md hidden-sm col-lg-6">
										<img src="/template/img/empresario.jpg" alt="Empresario">
									</div>
									<div class="col-xs-12 col-md-12 col-sm-12 col-lg-6">
										<section>
											<label class="label">Cuenta</label>
											<label class="input"> <i class="icon-append fa fa-user"></i>
												<input required type="text" placeholder="Username Afiliado" name="username">
												<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Ingrese su id, usuario o correo</b></label>
										</section>

										<section>
											<label class="label">Clave</label>
											<label class="input"> <i class="icon-append fa fa-lock"></i>
												<input required type="password" placeholder="Clave de Afiliado" name="password_invitado">
												<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingrese la contraseña</b> </label>
											
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