 <!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span> 
				> <a href="/ov/perfil_red/TipoAfiliacion">Tipo de Afiliacion</a>
				> <a href="/ov/perfil_red/afiliar?tipo=2">Redes</a>
				> Afiliar Usuario
				</span>
			</h1>
		</div>
	</div>
<div class="well">
				<fieldset>
					<legend>Red</legend>
					<div class="row">
						<div class="col-lg-1 col-sm-1 col-md-1 col-xs-12"></div>
						<div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
							<a href="afiliar_frontal_existente?id=<?php echo $_GET['id']; ?>">
								<div
									class="well well-sm txt-color-white text-center link_dashboard"
									style="background: #60a917">
									<i class="fa fa-sitemap fa-3x"></i>
									<h5>Afiliar en Frontal</h5>
								</div>
							</a>
						</div>
						<div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
							<a href="afiliar_red_existente?id=<?php echo $_GET['id']; ?>">
								<div
									class="well well-sm txt-color-white text-center link_dashboard"
									style="background: #60a917">
									<i class="fa fa-sitemap fa-3x"></i>
									<h5>Afiliar en Red</h5>
								</div>
							</a>
						</div>
					</div>
				</fieldset>
</div>
</div>
