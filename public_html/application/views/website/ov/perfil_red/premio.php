<div id="content">
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false">
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
						
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							
						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body">
							
							<h1 class="alert alert-success">Has ganado un <?php echo $premio[0]->nombre?></h1>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<img style="height: 15rem;" src="<?php echo $premio[0]->imagen; ?>" alt="<?php echo $premio[0]->nombre; ?>"></img>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<p class=""><?php echo $premio[0]->descripcion; ?></p>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<p class="text-danger">Nota: Verifica tus datos personales de tu perfil: direccion, telefonos, email</p>
							</div>
						</div>
						<!-- end widget content -->
						
					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->
			</article>
			<!-- END COL -->
		</div>
		         
		<!-- END ROW -->
	</section>
	<!-- end widget grid -->
</div>