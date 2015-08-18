			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/oficinaVirtual/"> Oficina Virtual</a> > <a href="/bo/oficinaVirtual/videos"> Videos</a> 
								> <a href="/bo/videos/alta"> Alta</a> > Video
							</span>
						</h1>
					</div>
				</div>
	<?php if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error</strong> '.$this->session->flashdata('error').'
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
                  <div class="contenidoBotones">
								<div class="col-xs-12 col-sm-8 col-md-6 col-lg-4" style="margin-bottom: 2rem;">
									<form class="smart-form" id="reporte-form" method="post" action="sube_video" enctype="multipart/form-data">
												<label class="label">Grupo</label>
												<label class="select">
													<select name="grupo_frm">
														<?php
														 	for($o=0;$o<sizeof($grupos);$o++)
														 	{
														 		echo '<option value="'.$grupos[$o]->id.'">'.$grupos[$o]->descripcion.'</option>';
														 	}
														 ?>
													</select> 
													<i></i> 
												</label>
												<label class="label">Nombre del video</label>
												<label class="input">	
													<input name="nombre_publico" placeholder="Nombre" type="text" id="nombre_publico" required>
												</label>	
												<label class="label">Descripcion</label>
												<label class="textarea">								
													<textarea rows="3" class="custom-scroll" name="desc_frm"></textarea> 
												</label>
												<label class="label">Archivo de Video</label>
												<section>
													<div class="input input-file">
														<span class="button"><input id="file" onchange="this.parentNode.nextSibling.value = this.value" name="userfile[]" type="file" required>Buscar</span><input placeholder="Seleccione un archivo" readonly="" type="text">
													</div>
												</section>
												<label class="label">Imagen</label>
												<section>
													<div class="input input-file">
														<span class="button"><input id="file" onchange="this.parentNode.nextSibling.value = this.value" name="userfile[]" type="file" required>Buscar</span><input placeholder="Seleccione un archivo" readonly="" type="text">
													</div>
												</section>
												<br>
												<input type="submit" class="btn btn-success" id="boton_subir" value="Subir archivo">
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
			
