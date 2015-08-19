			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/administracion">Administración </a>
								<a href="/bo/usuarios"> > Usuarios </a>
								 > Alta
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
				<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false"
          data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-sortable="false"
          data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false">
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body no-padding smart-form">
                <fieldset>
	                <div class="contenidoBotones">
						<div class="row col-xs-8 col-sm-6 col-md-4 col-lg-4" style="margin: 4rem;">
							<div class="">
									<section>
										<div>
											<?php
											if ($use_username) {
												$username = array(
													'name'	=> 'username',
													'id'	=> 'username',
													'value' => set_value('username'),
													'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
													'size'	=> 30,
												);
												
											}
											$email = array(
												'name'	=> 'email',
												'id'	=> 'email',
												'value'	=> set_value('email'),
												'maxlength'	=> 80,
												'size'	=> 30,
											);
											$password = array(
												'name'	=> 'password',
												'id'	=> 'password',
												'value' => set_value('password'),
												'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
												'size'	=> 30,
													
											);
											$confirm_password = array(
												'name'	=> 'confirm_password',
												'id'	=> 'confirm_password',
												'value' => set_value('confirm_password'),
												'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
												'size'	=> 30,
											);
											?>
											<?php echo form_open($this->uri->uri_string()); ?>
											<label class="select">
													<label class="label">Seleccione un tipo de usuario</label>
													<select name="tipo" id="tipo" required="">
													<?foreach ($tiposUsuario as $tipo) {?>
														<option value="<?php echo $tipo->id_tipo_usuario; ?>">
															<?php echo $tipo->descripcion; ?>
														</option>
													<?}?>
													</select>
											</label><br>
											<table>
												<?php if ($use_username) { ?>
												<tr>
													<td>Nombre de Usuario</td>
													<td><?php echo form_input($username); ?></td>
													<td style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></td>
												</tr>
												<?php } ?>
												<tr>
													<td>Nombre</td>
													<td><input name="nombre" value="" id="username" maxlength="60" size="30" type="text" required></td>
													<td style="color: red;"></td>
												</tr>
												<tr>
													<td>Apellido</td>
													<td><input name="apellido" value="" id="username" maxlength="60" size="30" type="text" required></td>
													<td style="color: red;"></td>
												</tr>
												<tr>
													<td>Email</td>
													<td><?php echo form_input($email); ?></td>
													<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
												</tr>
												<tr>
													<td>Contraseña</td>
													<td><?php echo form_password($password); ?></td>
													<td style="color: red;"><?php echo form_error($password['name']); ?></td>
												</tr>
												<tr>
													<td>Confirmar contraseña</td>
													<td><?php echo form_password($confirm_password); ?></td>
													<td style="color: red;"><?php echo form_error($confirm_password['name']); ?></td>
												</tr>
											</table>
											<br>
											<input name="register" value="Crear Usuario" type="submit" class="btn-success">
											<?php echo form_close(); ?>
										</div>
									</section>
							</div>
						</div>
					</div>
				</fieldset>
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
			</div>
			<!-- END MAIN CONTENT -->
<<script type="text/javascript">
function new_user()
{
	var tipo=$("#tipo").val();
	if(tipo!="")
	{
		$.ajax({
			data: {tipo: tipo},
			type: "post",
			url: "newUser",
			success: function(){
				location.href="/bo/usuarios/listarTipoDeUsuario"
			}
		});
	}
}
</script>
<style>
.link
{
	margin: 0.5rem;
}
.minh
{
	padding: 50px;
}
.link a:hover
{
	text-decoration: none !important;
}
</style>
			
