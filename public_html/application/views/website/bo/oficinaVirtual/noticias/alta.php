			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
							<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/oficinaVirtual/"> Oficina Virtual</a> > <a href="/bo/oficinaVirtual/noticias"> Noticias</a> > Alta
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
                  <div class="contenidoBotones" style="padding-left: 50px; padding-right: 50px;">
										<div class="row col-xs-12 col-md-6 col-sm-12 col-lg-5">
											<div class="row">
												<form class="smart-form" id="reporte-form" method="post" action="sube_noticia" enctype="multipart/form-data">
												<label class="select" style="">
															<select name="grupo_frm">
																	<?php for($o=0;$o<sizeof($grupos);$o++)
																	{
																		echo '<option value="'.$grupos[$o]->id.'">'.$grupos[$o]->descripcion.'</option>';
																	}
																?>
															</select>
														<i></i>
													</label><br>
													<div class="row">
														<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">
															<label class="label">Nombre</label>
															<label class="input">
																<input required type="text" placeholder="Nombre"  name="nombre_frm">
															</label>
														</section>
													</div>
													
													<div class="row">
														<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">
															<label class="label">Descripcion</label>
															<label class="textarea">								
																<textarea required rows="3" class="custom-scroll" name="desc_frm"></textarea> 
															</label>
														</section>
													</div>
													
													<div class="row">
														<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">
															<label class="label">Imagen</label>
															<div class="input input-file">
																<span class="button"><input required id="userfile" name="userfile" onchange="this.parentNode.nextSibling.value = this.value" type="file">Buscar</span><input placeholder="Seleccione un archivo" readonly="" type="text" id="file_frm" name="file_nme">
															</div>
														</section>
													</div>
													
													<div class="row">
														<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_subir">
															<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
															<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4" >
																<input type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" id="boton_subir" value="Agregar noticia">
															</div>
														</section>
													</div>
												</form>
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
			
