 <!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a> 
				<span>
				>	Ver Redes
				</span>
			</h1>
		</div>
	</div>
<section id="widget-grid" class="">
<div class="row" style="background: rgb(255, 255, 255) none repeat scroll 0% 0%;margin-bottom:2rem;">	
<div class="well">
		<fieldset>
											<legend>Redes</legend>
											<div class="row">
											<? foreach ($redes as $red ) { ?>
												<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
													<a href="/ov/cgeneral/soporte_tecnico?id_red=<?= $red->id; ?>">
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
</section>	
</div>	