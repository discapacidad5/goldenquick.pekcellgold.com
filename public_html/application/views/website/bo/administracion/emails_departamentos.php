 <!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
								<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/configuracion/"> Configuracion</a> > Emails-departamentos
							</span>
						</h1>
					</div>
				</div>
				
										<?php if($this->session->flashdata('success')) {
		echo '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Felicidades </strong> '.$this->session->flashdata('success').'
			</div>'; 
	}
?>	

<?php if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Alerta </strong> '.$this->session->flashdata('error').'
			</div>'; 
	}
?>	
				
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

					<!-- widget div-->
	<div>
    <fieldset id="pswd">
		<form class="smart-form" action="/bo/administracion/actualizar_emails_departamentos" method="POST" role="form">
			<legend>Listado de emails por Departamentos </legend><br>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label  class="input col-xs-12 col-sm-9 col-md-2 col-lg-2">
						<b>Nombre del Departamento</b>
			        </label>
					<label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="text" class="form-control " name="departamento1" placeholder="escribe el nombre del departamento" value='<?php if(!isset($datos_departamentos[0]->nombre)){echo "";}else{echo $datos_departamentos[0]->nombre;}?>'>
			        </label>
			        
			        <label  class="input col-xs-12 col-sm-9 col-md-1 col-lg-1">
						<b><br>&nbsp;&nbsp;e-mail</b>
			        </label>
			        <label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="email" class="form-control" name="email1" placeholder="correo electronico" value='<?php if(!isset($datos_departamentos[0]->email)){echo "";}else{echo $datos_departamentos[0]->email;}?>'>
			        </label>
			        <label class="input col-xs-12 col-sm-12 col-md-3 col-lg-3">
			        <br><br><br>
			        </label>
		        </div>
		        
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label  class="input col-xs-12 col-sm-9 col-md-2 col-lg-2">
						<b>Nombre del Departamento</b>
			        </label>
					<label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="text" class="form-control " name="departamento2" placeholder="escribe el nombre del departamento" value='<?php if(!isset($datos_departamentos[1]->nombre)){echo "";}else{echo $datos_departamentos[1]->nombre;}?>'>
			        </label>
			        
			        <label  class="input col-xs-12 col-sm-9 col-md-1 col-lg-1">
						<b><br>&nbsp;&nbsp;e-mail</b>
			        </label>
			        <label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="email" class="form-control" name="email2" placeholder="correo electronico" value='<?php if(!isset($datos_departamentos[1]->email)){echo ""; }else{echo $datos_departamentos[1]->email;}?>'>
			        </label>
			        <label class="input col-xs-12 col-sm-12 col-md-3 col-lg-3">
			        <br><br><br>
			        </label>
		        </div>
		        
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label  class="input col-xs-12 col-sm-9 col-md-2 col-lg-2">
						<b>Nombre del Departamento</b>
			        </label>
					<label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="text" class="form-control " name="departamento3" placeholder="escribe el nombre del departamento" value='<?php if(!isset($datos_departamentos[2]->nombre)){echo "";}else{echo $datos_departamentos[2]->nombre;}?>'>
			        </label>
			        
			        <label  class="input col-xs-12 col-sm-9 col-md-1 col-lg-1">
						<b><br>&nbsp;&nbsp;e-mail</b>
			        </label>
			        <label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="email" class="form-control" name="email3" placeholder="correo electronico" value='<?php if(!isset($datos_departamentos[2]->email)){echo ""; }else{echo $datos_departamentos[2]->email;}?>'>
			        </label>
			        <label class="input col-xs-12 col-sm-12 col-md-3 col-lg-3">
			        <br><br><br>
			        </label>
		        </div>
		        
		       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label  class="input col-xs-12 col-sm-9 col-md-2 col-lg-2">
						<b>Nombre del Departamento</b>
			        </label>
					<label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="text" class="form-control " name="departamento4" placeholder="escribe el nombre del departamento" value='<?php if(!isset($datos_departamentos[3]->nombre)){echo "";}else{echo $datos_departamentos[3]->nombre;}?>'>
			        </label>
			        
			        <label  class="input col-xs-12 col-sm-9 col-md-1 col-lg-1">
						<b><br>&nbsp;&nbsp;e-mail</b>
			        </label>
			        <label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="email" class="form-control" name="email4" placeholder="correo electronico" value='<?php if(!isset($datos_departamentos[3]->email)){echo ""; }else{echo $datos_departamentos[3]->email;}?>'>
			        </label>
			        <label class="input col-xs-12 col-sm-12 col-md-3 col-lg-3">
			        <br><br><br>
			        </label>
		        </div>
		        
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label  class="input col-xs-12 col-sm-9 col-md-2 col-lg-2">
						<b>Nombre del Departamento</b>
			        </label>
					<label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="text" class="form-control " name="departamento5" placeholder="escribe el nombre del departamento" value='<?php if(!isset($datos_departamentos[4]->nombre)){echo "";}else{echo $datos_departamentos[4]->nombre;}?>'>
			        </label>
			        
			        <label  class="input col-xs-12 col-sm-9 col-md-1 col-lg-1">
						<b><br>&nbsp;&nbsp;e-mail</b>
			        </label>
			        <label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="email" class="form-control" name="email5" placeholder="correo electronico" value='<?php if(!isset($datos_departamentos[4]->email)){echo ""; }else{echo $datos_departamentos[4]->email;}?>'>
			        </label>
			        <label class="input col-xs-12 col-sm-12 col-md-3 col-lg-3">
			        <br><br><br>
			        </label>
		        </div>
		        
		       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label  class="input col-xs-12 col-sm-9 col-md-2 col-lg-2">
						<b>Nombre del Departamento</b>
			        </label>
					<label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="text" class="form-control " name="departamento6" placeholder="escribe el nombre del departamento" value='<?php if(!isset($datos_departamentos[5]->nombre)){echo "";}else{echo $datos_departamentos[5]->nombre;}?>'>
			        </label>
			        
			        <label  class="input col-xs-12 col-sm-9 col-md-1 col-lg-1">
						<b><br>&nbsp;&nbsp;e-mail</b>
			        </label>
			        <label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="email" class="form-control" name="email6" placeholder="correo electronico" value='<?php if(!isset($datos_departamentos[5]->email)){echo ""; }else{echo $datos_departamentos[5]->email;}?>'>
			        </label>
			        <label class="input col-xs-12 col-sm-12 col-md-3 col-lg-3">
			        <br><br><br>
			        </label>
		        </div>
		        
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label  class="input col-xs-12 col-sm-9 col-md-2 col-lg-2">
						<b>Nombre del Departamento</b>
			        </label>
					<label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="text" class="form-control " name="departamento7" placeholder="escribe el nombre del departamento" value='<?php if(!isset($datos_departamentos[6]->nombre)){echo "";}else{echo $datos_departamentos[6]->nombre;}?>'>
			        </label>
			        
			        <label  class="input col-xs-12 col-sm-9 col-md-1 col-lg-1">
						<b><br>&nbsp;&nbsp;e-mail</b>
			        </label>
			        <label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="email" class="form-control" name="email7" placeholder="correo electronico" value='<?php if(!isset($datos_departamentos[6]->email)){echo ""; }else{echo $datos_departamentos[6]->email;}?>'>
			        </label>
			        <label class="input col-xs-12 col-sm-12 col-md-3 col-lg-3">
			        <br><br><br>
			        </label>
		        </div>
		        
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label  class="input col-xs-12 col-sm-9 col-md-2 col-lg-2">
						<b>Nombre del Departamento</b>
			        </label>
					<label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="text" class="form-control " name="departamento8" placeholder="escribe el nombre del departamento" value='<?php if(!isset($datos_departamentos[7]->nombre)){echo "";}else{echo $datos_departamentos[7]->nombre;}?>'>
			        </label>
			        
			        <label  class="input col-xs-12 col-sm-9 col-md-1 col-lg-1">
						<b><br>&nbsp;&nbsp;e-mail</b>
			        </label>
			        <label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="email" class="form-control" name="email8" placeholder="correo electronico" value='<?php if(!isset($datos_departamentos[7]->email)){echo ""; }else{echo $datos_departamentos[7]->email;}?>'>
			        </label>
			        <label class="input col-xs-12 col-sm-12 col-md-3 col-lg-3">
			        <br><br><br>
			        </label>
		        </div>
		        
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label  class="input col-xs-12 col-sm-9 col-md-2 col-lg-2">
						<b>Nombre del Departamento</b>
			        </label>
					<label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="text" class="form-control " name="departamento9" placeholder="escribe el nombre del departamento" value='<?php if(!isset($datos_departamentos[8]->nombre)){echo "";}else{echo $datos_departamentos[8]->nombre;}?>'>
			        </label>
			        
			        <label  class="input col-xs-12 col-sm-9 col-md-1 col-lg-1" >
						<b><br>&nbsp;&nbsp;e-mail</b>
			        </label>
			        <label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="email" class="form-control" name="email9" placeholder="correo electronico" value='<?php if(!isset($datos_departamentos[8]->email)){echo ""; }else{echo $datos_departamentos[8]->email;}?>'>
			        </label>
			        <label class="input col-xs-12 col-sm-12 col-md-3 col-lg-3">
			        <br><br><br>
			        </label>
		        </div>
		        
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<label  class="input col-xs-12 col-sm-9 col-md-2 col-lg-2">
						<b>Nombre del Departamento</b>
			        </label>
					<label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="text" class="form-control " name="departamento10" placeholder="escribe el nombre del departamento" value='<?php if(!isset($datos_departamentos[9]->nombre)){echo "";}else{echo $datos_departamentos[9]->nombre;}?>'>
			        </label>
			        
			        <label  class="input col-xs-12 col-sm-9 col-md-1 col-lg-1" >
						<b><br>&nbsp;&nbsp;e-mail</b>
			        </label>
			        <label class="input col-xs-12 col-sm-9 col-md-3 col-lg-3">
						<input type="email" class="form-control" name="email10" placeholder="correo electronico" value='<?php if(!isset($datos_departamentos[9]->email)){echo ""; }else{echo $datos_departamentos[9]->email;}?>'>
			        </label>
			        <label class="input col-xs-12 col-sm-12 col-md-3 col-lg-3">
			        </label>
		        </div>
		        
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		        	<label class="input col-xs-12 col-sm-5 col-md-6 col-lg-6">
			        </label>
					<button style="margin-bottom: 4rem;" type="submit" class="btn btn-success col-xs-12 col-sm-4 col-md-3 col-lg-3">Actualizar</button>
				</div>
			</div>
		</form>
    </fieldset>
	</div>
  </div>
  </div>
</article>
</div>
</section>
</div>