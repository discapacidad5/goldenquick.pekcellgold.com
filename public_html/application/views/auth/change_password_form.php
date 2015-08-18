<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'value' => set_value('old_password'),
	'size' 	=> 30,
);
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
);
?>
<div class="widget-body" style="margin-bottom: 10rem;">
<form class="smart-form" action="/auth/change_password" method="post" accept-charset="utf-8">
<?php echo form_open($this->uri->uri_string()); ?>
<fieldset id="pswd">
	<legend>Contraseña</legend>
		<div>
			<section>
				<?php if(form_error($confirm_new_password['name'])){
					echo "<span style='color:red;'>El password de confirmacion no conside con el nuevo password.</span><br>";
				}; 
				?><br>
			<!--	<?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?>-->
			</section>
			<section id="old_password" style="width: 20rem;">
				<label class="input"><i class="icon-prepend fa fa-lock"></i>
				 <input type="password" name="old_password" id="old_password" size="30" placeholder="Contraseña">
				</label>
			</section><br>
			<section id="new_password">
				<label class="input"> <i class="icon-prepend fa fa-lock"></i>
					<input style="width: 20rem;" placeholder="Nueva contraseña" name="new_password" id="newPassword" type="password">
				</label>
			</section><br>
			<section id="confirm_new_password">
				<label class="input"> <i class="icon-prepend fa fa-lock"></i>
					<input style="width: 20rem;" placeholder="Repita nueva contraseña" name="confirm_new_password" id="confirmNewPassword" type="password">
				</label>
			</section>
		</div>
		<input name="change" value="Cambiar Contraseña" type="submit" class="btn-success">
</fieldset>
</div>
