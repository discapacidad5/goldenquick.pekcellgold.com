 <!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a>
				<span> 
					<a href="/ov/perfil_red/TipoAfiliacion"> > Tipo de Afiliacion</a>
					> Red
				</span>
			</h1>
		</div>
	</div>
<div class="well">
 <fieldset>
	<legend>Red</legend>
		<div class="row">
			<? foreach ($redes as $red ) { ?>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<?php if($_GET['tipo'] == 1){?>
							<a href="/ov/perfil_red/nuevo_afilido?id=<?= $red->id ?>">
						<?php } else if($_GET['tipo'] == 2) {?>
							<a href="/ov/perfil_red/afiliarExistente?id=<?= $red->id ?>">
						<?php } ?>
						<div class="well well-sm txt-color-white text-center link_dashboard" style="background:#60a917">
						<i class="fa fa-sitemap fa-3x"></i>
						<h5><?= $red->nombre;?></h5>
						</div>	
					</a>
				</div>
			<?php } ?>
</fieldset>
</div>
</div>