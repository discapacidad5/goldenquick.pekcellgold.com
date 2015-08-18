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
  <!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>
				> <a href="/ov/perfil_red/">Perfil</a>
				>
					Cambiar Contraseña
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
						<h2>Contraseña</h2>

					</header>

					<!-- widget div-->
		<div>
    <fieldset id="pswd">
      <form style="margin-bottom: 4rem;" class="smart-form" action="/auth/change_password" method="post" accept-charset="utf-8">
      <?php echo form_open($this->uri->uri_string()); ?>
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
               <input type="password" name="old_password" id="old_password" size="30" placeholder="Contraseña" value="">
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
      </form>
    </fieldset>
  </div>
  </div>
</article>
</div>
</section>
</div>
