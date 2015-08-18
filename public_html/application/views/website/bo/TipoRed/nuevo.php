 <!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>> <a href="/bo/configuracion/"> Configuracion </a>
				> <a href="/bo/configuracion/tipoRed"> Tipo De Red </a>
				>	Alta
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

					<!-- widget div-->
	<div>
    <fieldset id="pswd">
		<form class="smart-form" action="/bo/tipo_red/guardar_red" method="POST" role="form">
			<legend>Nuevo Tipo de Red </legend><br>
			<div class="form-group" style="width: 20rem;">
			<label style="margin: 1rem;" class="input"><i class="icon-prepend fa fa-check-circle-o"></i>
				<input type="text" class="form-control" name="nombre" size="30" placeholder="Nombre">
	        </label>
	        <label class="textarea"> 										
				<textarea style="margin-left: 1rem;" rows="6" class="custom-scroll" name="descripcion" size="30" placeholder="Descripcion"></textarea> 
			</label>
			<button style="margin: 1rem;margin-bottom: 4rem;" type="submit" class="btn btn-success">Crear</button>
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