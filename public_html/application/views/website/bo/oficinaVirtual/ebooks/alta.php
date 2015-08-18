
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a> <span>>
					<a href="/bo/oficinaVirtual/"> Oficina Virtual</a> > <a
					href="/bo/oficinaVirtual/ebooks"> E-Books</a> > Alta
				</span>
			</h1>
		</div>
	</div>
	<?php if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Error </strong> '.$this->session->flashdata('error').'
			</div>'; 
	}
?>	
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1"
					data-widget-colorbutton="false" data-widget-editbutton="false"
					data-widget-togglebutton="false" data-widget-deletebutton="false"
					data-widget-sortable="false" data-widget-fullscreenbutton="false"
					data-widget-custombutton="false" data-widget-collapsed="false">
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
									<div class="row">
										<div class="col col-xs-12 col-sm-9 col-md-9 col-lg-9">
											<div class="widget-body">
												<form class="smart-form" id="reporte-form" method="post" action="CrearEbook" enctype="multipart/form-data">
													<div class="row">
														<section
															class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
															id="busquedatodos">
															<label class="label">Grupo</label> 
															<label class="select">
																<select name="grupo" id="grupo" required>
																	<option value="0">Selecciona el grupo</option>
																<?php foreach ($grupos as $grupo) {?>
																	<option value="<?php echo $grupo->id; ?>"><?php echo $grupo->descripcion; ?></option>
																<?php } ?>
															</select>
															</label>
														</section>

													</div>
													<div class="row">
														<section
															class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
															id="busquedatodos">
															<label class="label">Nombre del e-book</label> <label
																class="input"> <input name="nombre" id="nombre"
																placeholder="Nombre" type="text" id="nombre_publico"
																required>
															</label>
														</section>
													</div>
													<div class="row">
														<section
															class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
															id="busquedatodos">
															<label class="label">Descripcion</label> <label
																class="textarea"> <textarea rows="3"
																	class="custom-scroll" name="descripcion"
																	id="descripcion" required></textarea>
															</label>
														</section>
													</div>
													<div class="row">
													
														<section
															class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
															id="busquedatodos">
															<label class="label">Archivo</label>
															<div class="input input-file">
																<span class="button"> <input id="file"
																	onchange="this.parentNode.nextSibling.value = this.value"
																	name="userfile1" type="file" >Buscar
																</span><input name="file_nme"
																	placeholder="Seleccione el archivo del e-book en formato pdf"
																	type="text" id="file_frm" required readonly="readonly">
															</div>
														</section>
													</div>
													<div class="row">
														<section
															class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
															id="busquedatodos">
															<label class="label">Imagen</label>
															<div class="input input-file">
																<span class="button"> <input id="file"
																	onchange="this.parentNode.nextSibling.value = this.value"
																	name="userfile2" type="file">Buscar
																</span><input name="file_nme_2"
																	placeholder="Seleccione una imagen para el e-book"
																	type="text" id="file_frm_2" required readonly="readonly">
															</div>
														</section>
													</div>
													<div class="row">
														<section
															class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
															id="div_subir">
															<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
															<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">
																<input type="submit"
																	class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12"
																	id="boton_subir" value="Subir E-Books">
															</div>
														</section>
													</div>
												</form>
											</div>
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
				<br /> <br />
			</div>
		</div>
	</section>
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
<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script src="/template/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
		<script src="/template/js/plugin/bootbox/bootbox.min.js"></script>
		<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
		<script src="/template/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
		<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>

