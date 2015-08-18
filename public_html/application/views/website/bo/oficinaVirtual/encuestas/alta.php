
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a> <span>>
					<a href="/bo/oficinaVirtual/"> Oficina Virtual</a> > <a
					href="/bo/oficinaVirtual/encuestas"> Encuestas</a> > Alta
				</span>
			</h1>
		</div>
	</div>
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1"
					data-widget-colorbutton="false" data-widget-editbutton="false"
					data-widget-togglebutton="false" data-widget-deletebutton="false"
					data-widget-sortable="false" data-widget-fullscreenbutton="false"
					data-widget-custombutton="false" data-widget-collapsed="false">
					<div>

						<!-- widget edit box -->
					
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body no-padding smart-form">
							<fieldset>
								<div class="contenidoBotones">
									<div class="col col-lg-12 col-md-12 col-xs-12 col-md-12">
										<form class="smart-form" id="reporte-form" method="post" action="crear_encuesta">
											<div class="row">
												<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
													id="busquedatodos">
													<label class="label">Nombre</label><label
														class="input"><input type="text"
														placeholder="Nombre de la Encuesta" id="enc_nom">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
													id="busquedatodos">
													<label class="label">Descripcion</label>
													<label
														class="textarea"><textarea rows="3"
															class="custom-scroll" id="desc_enc"></textarea>
													</label>
												</section>
											</div>
											<div class="row">
												
												<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
													id="busquedatodos">
													<label class="label">Cantidad de preguntas</label>
													<label
														class="input"><input type="number" id="preg_qty"
														min="1" max="30">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
													id="busquedatodos">
													<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
													<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4"><a onclick="agregar_preguntas()"
															class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12">Siguiente</a>
													</div>
												</section>
											</div>
										</form>
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
	</section>
		<div class="row">
			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<br /> <br />
			</div>
		</div>

</div>
<!-- END MAIN CONTENT -->
<style>
.link {
	margin: 0.5rem;
}

.minh {
	padding: 50px;
}

.link a:hover {
	text-decoration: none !important;
}
</style>

<script
	src="/template/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
<script src="/template/js/plugin/bootbox/bootbox.min.js"></script>
<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
<script
	src="/template/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script type="text/javascript">
function agregar_preguntas()
{
	var nom=$("#enc_nom").val();
	var qty=$("#preg_qty").val();
	var desc=$("#desc_enc").val();
	if(nom=="")
	{
		alert("El campo nombre es requerido")
	}
	else
	{
		if(qty<1||qty>30)
		{
			alert("La cantidad de preguntas debe de estar entre 1 y 30")
		}
		else
		{
			$.ajax({
				data: {
					nombre: nom,
					cantidad: qty,
					descripcion: desc
					},
				type: "post",
				url: "crear_encuesta",
				success: function(msg){
			             
			             bootbox.dialog({
							message: msg,
							title: "Preguntas",
							className: "",
							buttons: {
								success: {
									label: "Ok",
									className: "hide",
									callback: function() {
										}
								}
							}
						})
			    }
			});
			
		}
	}
}
</script>

