
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a> <span>>
					<a href="/bo/configuracion/"> Configuracion </a>
					> <a href="/bo/capacidadRed/index"> Frontalidad /
					Profundidad </a>
					> Configuracion
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
					data-widget-editbutton="false" data-widget-custombutton="false">
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
							<form class="smart-form" action="/bo/capacidadRed/actualizar_capacidad_de_la_red" method="POST" role="form">

								<legend>Capacidad de la Red </legend>
								<div class="form-group" style="width: 5rem; margin-top: 2rem;">
									<label>Frontales</label> <input style="padding-left: 3rem;"
										type="text" class="form-control" name="frontal"
										value='<?=$capacidadRed [0]->frontal;?>'> <label>Profundidad</label> <input style="padding-left: 3rem;"
										type="text" class="form-control" name="profundidad"
										value='<?=$capacidadRed [0]->profundidad;?>'>
										<input type="hidden" value="<?php echo $_GET['id']; ?>" name="red">
								</div>
								<button style="margin-bottom: 4rem; margin-top: 2rem;"
									type="submit" class="btn btn-success">Actualizar</button>
							</form>
						</fieldset>
					</div>
				</div>
			</article>
		</div>
	</section>
</div>