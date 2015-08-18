			<!-- MAIN CONTENT -->
			<div id="content">

				<!-- row -->
				<div class="row">
				
					<!-- col -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><a href="/ov/dashboard"><i class="fa fa-home"></i> Inicio </a><span>>
							<a href="informacion">Informacion</a> > <?=$informacion[0]->nombre?></span></h1>
					</div>
					<!-- end col -->
				
				<!-- right side of the page with the sparkline graphs -->
				
				</div>
				<!-- end row -->
				
				<!-- row -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="well well-noticia">
							<div class="row">
								<blockquote>
									
										<h1>
											<p class="text-left font-lg">
												<strong><?=$informacion[0]->nombre?></strong>
											</p>
										</h1>
									
									</br></br>
									<p class="text-center" style="text-align: justify;">
										
											<img src="<?=$informacion[0]->img?>" class="noticia-imagen" style="width: 30rem; height: 30rem;">
										</p>
									</br>
									
										<blockquote class="parrafo-noticia-2">
											<p>
												<?=html_entity_decode($informacion[0]->descripcion)?>
											</p>
										</blockquote>
									
									
								</blockquote>
								
							</div>
						</div>	
					</div>
				</div>
				
				<!-- end row -->

			</div>
		<div class="row">         
         <!-- a blank row to get started -->
	    	<div class="col-sm-12">
	        	<br />
	        	<br />
	        </div>
        </div>
        <script src="/template/js/plugin/bootbox/bootbox.min.js"></script>

		<!-- PAGE RELATED PLUGIN(S) -->
			<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
		
		})

		</script>