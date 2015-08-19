					
					
					<div id="content">

						<div class="jarviswidget jarviswidget-color-purple" id="wid-id-6" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false">
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
									<h2><strong>Escriba aqui su texto</strong>  </h2>				
									<div class="widget-toolbar"> 
										
											
										
									</div>
								</header>

								<!-- widget div-->
								<div>
									
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
									</div>
									<!-- end widget edit box -->
									
									<!-- widget content -->
									<div class="widget-body no-padding">
										
										<div class="widget-body-toolbar">

												<div class="btn-group">
													<button type="button" class="btn btn-default">
														<i class="fa fa-bold"></i>
													</button>
													<button type="button" class="btn btn-default">
														<i class="fa fa-italic"></i>
													</button>
													<button type="button" class="btn btn-default">
														<i class="fa fa-underline"></i>
													</button>
												</div>

												<div class="btn-group">
													<button type="button" class="btn btn-default">
														<i class="fa fa-align-left"></i>
													</button>
													<button type="button" class="btn btn-default">
														<i class="fa fa-align-center"></i>
													</button>
													<button type="button" class="btn btn-default">
														<i class="fa fa-align-right"></i>
													</button>
													<button type="button" class="btn btn-default">
														<i class="fa fa-align-justify"></i>
													</button>
												</div>

										</div>
										<textarea class="form-control no-border" placeholder="Textarea" rows="4"> This is a textarea - below me is widget footer and above is the widget toolbar!</textarea>
										<div class="widget-footer">

											<button class="btn btn-md btn-primary" type="button">
												VideoCall
											</button>		
											
											<button class="btn btn-md btn-primary" type="button">
												Conference
											</button>	
											
											<button class="btn btn-md btn-danger disabled pull-left" type="button">
												Send
											</button>	
											
										</div>
										
									</div>
									<!-- end widget content -->
									
								</div>
								<!-- end widget div -->
								
							</div>
							<!-- end widget -->
						</div>
					<!-- PAGE RELATED PLUGIN(S) 
		<script src="..."></script>-->

		<script src="js/smartwidgets/jarvis.widget.min.js"></script>
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			
			// PAGE RELATED SCRIPTS
		
			// switch style change
			$('input[name="checkbox-style"]').change(function() {
				//alert($(this).val())
				$this = $(this);
		
				if ($this.attr('value') === "switch-1") {
					$("#switch-1").show();
					$("#switch-2").hide();
				} else if ($this.attr('value') === "switch-2") {
					$("#switch-1").hide();
					$("#switch-2").show();
				}
		
			}); 
			
			// tab - pills toggle
			$('#show-tabs').click(function() {
				$this = $(this);
				if($this.prop('checked')){
					$("#widget-tab-1").removeClass("nav-pills").addClass("nav-tabs");
				} else {
					$("#widget-tab-1").removeClass("nav-tabs").addClass("nav-pills");
				}
				
			});			
		
		});

		</script>