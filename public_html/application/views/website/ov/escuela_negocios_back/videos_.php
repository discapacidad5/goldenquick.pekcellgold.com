
			
			
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">
							<i class="fa fa-table fa-fw "></i> 
								Escuela de negocios 
							<span>> 
								Videos
							</span>
						</h1>
					</div>
				</div>
				
				<!-- widget grid -->
				<section id="widget-grid" class="">
				
					<!-- row -->
					<div class="row">
				
						<!-- NEW WIDGET START -->
						<article class="col-sm-12 col-md-12 col-lg-6">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-blueLight" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false">
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
									<div class="jarviswidget-ctrls" role="menu">   
										<a data-placement="bottom" title="" rel="tooltip" class="button-icon jarviswidget-toggle-btn" href="javascript:void(0);" data-original-title="Collapse">
											<i class="fa fa-minus "></i>
										</a> 
										<a data-placement="bottom" title="" rel="tooltip" class="button-icon jarviswidget-fullscreen-btn" href="javascript:void(0);" data-original-title="Fullscreen">
											<i class="fa fa-expand "></i>
										</a> 
										<a data-placement="bottom" title="" rel="tooltip" class="button-icon jarviswidget-delete-btn" href="javascript:void(0);" data-original-title="Delete">
											<i class="fa fa-times"></i>
										</a>
									</div>
									<span class="widget-icon"> <i class="fa fa-list-alt"></i> </span>
									<h2>Grupos </h2>
				
										
				
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
											
											<div class="row">
												
												<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
													<div class="input-group">
														<input type="text" placeholder="Nuevo grupo" id="prepend" class="form-control">
													</div>
												</div>
												<div class="col-xs-3 col-sm-7 col-md-7 col-lg-7 text-right">
													
													<button class="btn btn-success" id="anadir">
														<i class="fa fa-plus"></i> <span class="hidden-mobile">Crear</span>
													</button>
													
												</div>
												
											</div>
											
												

										</div>
										<div class="panel-group smart-accordion-default" id="accordion-2">
											<?php for($i=0;$i<$tamano;$i++)
											{
												
												echo '<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion-2" href="#collapse-'.$i.'" class="collapsed"> 
															<i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i>'. 
															$grupo[$i]->descripcion.
														'</a>
													</h4>
												</div>
												<div id="collapse-'.$i.'" class="panel-collapse collapse">
													<div class="panel-body">
														<div>
				
															<!-- widget edit box -->
															<div class="jarviswidget-editbox">
																<!-- This area used as dropdown edit box -->
										
															</div>
															<!-- end widget edit box -->
										
															<!-- widget content -->
															<div class="widget-body">
															<form action="upload.php" class="dropzone" id="mydropzone"></form>
															</div>
															<!-- end widget content -->
										
														</div>
													</div>
												</div>
											</div>';
											} ?>
											
										</div>
				
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->
				
						</article>
						<!-- WIDGET END -->
						
						<article class="col-sm-12 col-md-12 col-lg-6">
							<!-- Widget ID (each widget will need unique ID)-->
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
									<h2><strong>Video</strong>	</h2>			
									<div class="widget-toolbar"> 
										
											<div class="progress progress-striped active" rel="tooltip" data-original-title="55%" data-placement="bottom">
												<div class="progress-bar progress-bar-success" role="progressbar" style="width: 60%">60 %</div>
											</div>
										
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
									<div class="widget-body">
										<div class="col-sm-1 col-lg-1 col-xs-1 col-md-1" ></div>
										<video class="col-sm-10 col-lg-10 col-xs-10 col-md-10" style="margin-bottom: 5%;" controls>
											<source src="/template/videos/prueba_video.mp4" type="video/mp4">
											No es soportado por su navegador
										</video>
										<div class="col-sm-1 col-lg-1 col-xs-1 col-md-1"></div>
										
										
									</div>
									<!-- end widget content -->
									
								</div>
								<!-- end widget div -->
								
							</div>
							<!-- end widget -->
						</article>
				
					</div>
				
				</section>
				<!-- end widget grid -->

			</div>

		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>

		<!-- Scripts de la imaginacion chevre del autor de la pagina-->
			<script type="text/javascript">
			
				$("#anadir").click(function(){var grupo=$('#prepend').val();
				var drop='<div><div class="jarviswidget-editbox"></div><div class="widget-body"><form action="upload.php" class="dropzone" id="mydropzone"></form></div></div>';
					$( "#accordion-2" ).append( $('<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapse-<?php $tamano++; echo $tamano; ?>" class="collapsed"><i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i>'+grupo+'</a></h4></div><div id="collapse-<?php echo $tamano; ?>" class="panel-collapse collapse"><div class="panel-body">'+drop+'</div></div></div>'));
				 	var datos = $("#prepend").val();
				  	$.ajax({
				         data: 'grupo='+datos,
				         type: "get",
				         url: "nuevo_grupo",
				         success: function(data){
				              alert("Grupo creado con exito: " + datos);
				         }
					});
				});
			</script>



		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
			*/	
			
			Dropzone.autoDiscover = false;
			$(".dropzone").dropzone({
				paramName: "video",
        		url: "/escuela_negocios/sube_video",
				addRemoveLinks : true,
				maxFilesize: 15,
				dictResponseError: 'Error uploading file!'
			});
			/*
			 * Autostart Carousel
			 */
			$('.carousel.slide').carousel({
				interval : 3000,
				cycle : true
			});
			$('.carousel.fade').carousel({
				interval : 3000,
				cycle : true
			});
		
			// Fill all progress bars with animation
			
			$('.progress-bar').progressbar({
				display_text : 'fill'
			});
			
		
			/*
			 * Smart Notifications
			 */
			$('#eg1').click(function(e) {
		
				$.bigBox({
					title : "Big Information box",
					content : "This message will dissapear in 6 seconds!",
					color : "#C46A69",
					//timeout: 6000,
					icon : "fa fa-warning shake animated",
					number : "1",
					timeout : 6000
				});
		
				e.preventDefault();
		
			})
		
			$('#eg2').click(function(e) {
		
				$.bigBox({
					title : "Big Information box",
					content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
					color : "#3276B1",
					//timeout: 8000,
					icon : "fa fa-bell swing animated",
					number : "2"
				});
		
				e.preventDefault();
			})
		
			$('#eg3').click(function(e) {
		
				$.bigBox({
					title : "Shield is up and running!",
					content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
					color : "#C79121",
					//timeout: 8000,
					icon : "fa fa-shield fadeInLeft animated",
					number : "3"
				});
		
				e.preventDefault();
		
			})
		
			$('#eg4').click(function(e) {
		
				$.bigBox({
					title : "Success Message Example",
					content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
					color : "#739E73",
					//timeout: 8000,
					icon : "fa fa-check",
					number : "4"
				}, function() {
					closedthis();
				});
		
				e.preventDefault();
		
			})
	
			
		
			$('#eg5').click(function() {
		
				$.smallBox({
					title : "Ding Dong!",
					content : "Someone's at the door...shall one get it sir? <p class='text-align-right'><a href='javascript:void(0);' class='btn btn-primary btn-sm'>Yes</a> <a href='javascript:void(0);' class='btn btn-danger btn-sm'>No</a></p>",
					color : "#296191",
					//timeout: 8000,
					icon : "fa fa-bell swing animated"
				});
		
			});
		

		
			$('#eg6').click(function() {
		
				$.smallBox({
					title : "Big Information box",
					content : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
					color : "#5384AF",
					//timeout: 8000,
					icon : "fa fa-bell"
				});
		
			})
		
			$('#eg7').click(function() {
		
				$.smallBox({
					title : "James Simmons liked your comment",
					content : "<i class='fa fa-clock-o'></i> <i>2 seconds ago...</i>",
					color : "#296191",
					iconSmall : "fa fa-thumbs-up bounce animated",
					timeout : 4000
				});
		
			})
			
			function closedthis() {
				$.smallBox({
					title : "Great! You just closed that last alert!",
					content : "This message will be gone in 5 seconds!",
					color : "#739E73",
					iconSmall : "fa fa-cloud",
					timeout : 5000
				});
			}
		
			/*
			* SmartAlerts
			*/
			// With Callback
			$("#smart-mod-eg1").click(function(e) {
				$.SmartMessageBox({
					title : "Smart Alert!",
					content : "This is a confirmation box. Can be programmed for button callback",
					buttons : '[No][Yes]'
				}, function(ButtonPressed) {
					if (ButtonPressed === "Yes") {
		
						$.smallBox({
							title : "Callback function",
							content : "<i class='fa fa-clock-o'></i> <i>You pressed Yes...</i>",
							color : "#659265",
							iconSmall : "fa fa-check fa-2x fadeInRight animated",
							timeout : 4000
						});
					}
					if (ButtonPressed === "No") {
						$.smallBox({
							title : "Callback function",
							content : "<i class='fa fa-clock-o'></i> <i>You pressed No...</i>",
							color : "#C46A69",
							iconSmall : "fa fa-times fa-2x fadeInRight animated",
							timeout : 4000
						});
					}
		
				});
				e.preventDefault();
			})
			// With Input
			$("#smart-mod-eg2").click(function(e) {
		
				$.SmartMessageBox({
					title : "Smart Alert: Input",
					content : "Please enter your user name",
					buttons : "[Accept]",
					input : "text",
					placeholder : "Enter your user name"
				}, function(ButtonPress, Value) {
					alert(ButtonPress + " " + Value);
				});
		
				e.preventDefault();
			})
			// With Buttons
			$("#smart-mod-eg3").click(function(e) {
		
				$.SmartMessageBox({
					title : "Smart Notification: Buttons",
					content : "Lots of buttons to go...",
					buttons : '[Need?][You][Do][Buttons][Many][How]'
				});
		
				e.preventDefault();
			})
			// With Select
			$("#smart-mod-eg4").click(function(e) {
		
				$.SmartMessageBox({
					title : "Smart Alert: Select",
					content : "You can even create a group of options.",
					buttons : "[Done]",
					input : "select",
					options : "[Costa Rica][United States][Autralia][Spain]"
				}, function(ButtonPress, Value) {
					alert(ButtonPress + " " + Value);
				});
		
				e.preventDefault();
			});
		
			// With Login
			$("#smart-mod-eg5").click(function(e) {
		
				$.SmartMessageBox({
					title : "Login form",
					content : "Please enter your user name",
					buttons : "[Cancel][Accept]",
					input : "text",
					placeholder : "Enter your user name"
				}, function(ButtonPress, Value) {
					if (ButtonPress == "Cancel") {
						alert("Why did you cancel that? :(");
						return 0;
					}
		
					Value1 = Value.toUpperCase();
					ValueOriginal = Value;
					$.SmartMessageBox({
						title : "Hey! <strong>" + Value1 + ",</strong>",
						content : "And now please provide your password:",
						buttons : "[Login]",
						input : "password",
						placeholder : "Password"
					}, function(ButtonPress, Value) {
						alert("Username: " + ValueOriginal + " and your password is: " + Value);
					});
				});
		
				e.preventDefault();
			});			

		
		})

		</script>