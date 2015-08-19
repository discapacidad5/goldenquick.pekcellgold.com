 <!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
							
							<!-- PAGE HEADER -->
								<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/configuracion/">Configuracion</a>
							</span>
							<span>>
								<a href="/bo/configuracion/soporte_tecnico">Soporte Técnico</a> 
							</span>
							<span>>
								<a href="/bo/configuracion/datos_generales_ver_redes">Ver Redes</a> > Datos Generales
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
		<form class="smart-form" action="/bo/configuracion/actualizar_datos_generales" method="POST" role="form">
			<legend>Actualizar Datos Generales </legend><br>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 30rem;">
				
				<label style=" width: 40%; margin: 1rem;" class="input col-xs-9 col-sm-10 col-md-10 col-lg-10">
					<b>Skype</b>
		        </label>
				<label style="margin: 1rem;" class="input col-xs-10 col-sm-10 col-md-10 col-lg-10"><i class="icon-prepend fa fa-check-circle-o"></i>
					<input type="text" class="form-control " name="skype" placeholder="Correo vinculado con Skype" value='<?php $vacio=0;if(!isset($datos_generales[0]->skype)){echo "";$vacio=$vacio+1;}else{echo $datos_generales[0]->skype;}?>'>
		        </label>
		        
		        <label style=" width: 50%; margin: 1rem;" class="input col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<b>Pekey</b>
		        </label>
		        <label style="margin: 1rem;" class="input col-xs-10 col-sm-10 col-md-10 col-lg-10"><i class="icon-prepend fa fa-check-circle-o"></i>
					<input type="text" class="form-control" name="pekey" placeholder="Numero de Telefono" value='<?php if(!isset($datos_generales[0]->pekey)){echo ""; $vacio=$vacio+1;}else{echo $datos_generales[0]->pekey;}?>'>
		        </label>
		        
		        <label style=" width: 50%; margin: 1rem;" class="input col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<b>Pinkost</b>
		        </label>
		        <label style="margin: 1rem;" class="input col-xs-10 col-sm-10 col-md-10 col-lg-10"><i class="icon-prepend fa fa-check-circle-o"></i>
					<input type="text" class="form-control" name="pinkost" placeholder="Numero de Telefono" value='<?php if(!isset($datos_generales[0]->pinkost)){echo ""; $vacio=$vacio+1;}else{echo $datos_generales[0]->pinkost;}?>'>
		        </label>
		        
		        <label style="margin: 1rem;" class="input col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<input type="text" class="hide" name="vacio" placeholder="Numero de Telefono" value='<?php echo $vacio?>'>
		        </label>
		        
		        <label style="margin: 1rem;" class="input col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<input type="text" class="hide" name="id_red" placeholder="Numero de Telefono" value='<?php echo $id_red?>'>
		        </label>
		        
				<button style="margin: 1rem;margin-bottom: 4rem;" type="submit" class="btn btn-success  col-xs-10 col-sm-10 col-md-10 col-lg-10">Actualizar</button>
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