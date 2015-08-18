			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/oficinaVirtual/"> Oficina Virtual</a> > <a href="/bo/oficinaVirtual/grupos"> Grupos</a> > Alta
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
						<div class="row col-xs-8 col-sm-6 col-md-4 col-lg-4" style="margin: 4rem;">
							<div class="">
									<section>
										<div>
												<label class="select">
													<label class="label">Seleccione una categoria</label>
													<select name="tipo" id="tipo" required="">
														<option value="PRE">Presentaciones</option>
														<option value="DES">Descargas</option>
														<option value="EBO">E-books</option>
														<option value="NOT">Noticias</option>
														<option value="VID">Videos</option>
													</select>
											</label><br>
											<label class="input">
												<input type="text" placeholder="Nombre grupo" id="grupo" class="form-control">
											</label>
										</div><br>
										<div>
											<button class="btn btn-success" onclick="new_grupo()" id="anadir">
												<i class="fa fa-plus"></i> <span >Crear</span>
											</button>
										</div>
									</section>
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
<<script type="text/javascript">
function new_grupo()
{
	var grupo=$("#grupo").val();
	var tipo=$("#tipo").val();
	if(grupo!="")
	{
		$.ajax({
			data: {grupo: grupo, tipo: tipo},
			type: "post",
			url: "add_grupo",
			success: function(){
				location.href="/bo/grupos/listar"
			}
		});
	}
}
</script>
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
			
