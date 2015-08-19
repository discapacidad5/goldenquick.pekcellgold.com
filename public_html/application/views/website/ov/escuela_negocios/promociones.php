<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a> 
				<span>>
					promociones
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
				<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false"	>
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
					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<h2>Promociones</h2>				
						
					</header>

					<!-- widget div-->
					<div>
						
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							
						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body">
							<ul id="myTab1" class="nav nav-tabs bordered">
								<li onclick="mes()" class="active">
									<a href="#s1" data-toggle="tab">Del mes</a>
								</li>
								<li onclick="historico()">
									<a href="#s2" data-toggle="tab">Historico</a>
								</li>
							</ul>
							<div id="myTabContent1" class="tab-content padding-10">
								<div class="tab-pane fade in active" id="s1">
									<div class="row">
										<!-- SuperBox -->
										<div class="superbox col-sm-12">
											<div class="superbox-list">
												<img src="/media/carrito/Desert.jpg" data-img="/media/carrito/Desert.jpg" alt="Participa en esta promocion" title="Promocion 1" class="superbox-img">
											</div>
											<div class="superbox-float"></div>
										</div>
										<!-- /SuperBox -->

										<div class="superbox-show" style="height:300px; display: none"></div>
									</div>
								</div>
								<div class="tab-pane fade" id="s2">
									
								</div>
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
		<div class="row">         
	        <!-- a blank row to get started -->
	        <div class="col-sm-12">
	            <br />
	            <br />
	        </div>
        </div>            
		<!-- END ROW -->
	</section>
	<!-- end widget grid -->
</div>
	
	<script src="/template/js/plugin/superbox/superbox.min.js"></script>

	<script type="text/javascript">
		
			// DO NOT REMOVE : GLOBAL FUNCTIONS!
			
			$(document).ready(function() {
				
				pageSetUp();

				$('.superbox').SuperBox();
			});
function mes()
{
	var msg='<div class="row">'
				+'<div class="superbox col-sm-12">'
					+'<div class="superbox-list">'
						+'<img src="/media/carrito/Desert.jpg" data-img="/media/carrito/Desert.jpg" alt="Participa en esta promocion" title="Promocion 1" class="superbox-img">'
					+'</div>'
					+'<div class="superbox-float"></div>'
				+'</div>'
				+'<div class="superbox-show" style="height:300px; display: none"></div>'
			+'</div>';
	$('#s2').empty();
	$('#s1').append(msg);
	$('.superbox').SuperBox();
}
function historico()
{
	var msg='<div class="row">'
				+'<div class="superbox col-sm-12">'
					+'<div class="superbox-list">'
						+'<img src="/template/img/superbox/superbox-full-2.jpg" data-img="/template/img/superbox/superbox-full-2.jpg" alt="Participa en esta promocion" title="Promocion 1" class="superbox-img">'
					+'</div>'
					+'<div class="superbox-list">'
						+'<img src="/media/carrito/Desert.jpg" data-img="/media/carrito/Desert.jpg" alt="Participa en esta promocion" title="Promocion 2" class="superbox-img">'
					+'</div>'
					+'<div class="superbox-float"></div>'
				'</div>'
				+'<div class="superbox-show" style="height:300px; display: none"></div>'
			+'</div>';
	$('#s1').empty();
	$('#s2').append(msg);
	$('.superbox').SuperBox();
}
</script>