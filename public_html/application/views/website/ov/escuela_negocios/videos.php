
			
			
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">
							<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a> 
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
						<article class="col-sm-12 col-md-12 col-lg-12">
				
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
									<h2>Videos</h2>
				
										
				
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
										<!--<div class="widget-body-toolbar">
											
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
											
											

										</div>-->
										<div class="panel-group smart-accordion-default" id="accordion-2">
											<?php for($i=0;$i<sizeof($grupos);$i++)
											{
												$j=0;	
												
												echo '<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion-2" href="#collapse-'.$i.'" class="collapsed"> 
															<i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i>'. 
															$grupos[$i]->descripcion.
														'</a>
													</h4>
												</div>
												<div id="collapse-'.$i.'" class="panel-collapse collapse">
													<div class="panel-body">';
												for($j=0;$j<sizeof($videos);$j++)
												{
													if($videos[$j]->grupo==$grupos[$i]->descripcion)
													{
														echo '<div class="row" style="vertical-align:middle;">
															<div class="col-lg-3 hidden-sm hidden-xs col-md-3">';
															if($videos[$j]->tipo==2)
															{
																echo	'<a href="javascript:void(0);" onclick="video(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><img class="col-lg-12 col-md-12 video_img" src="'.$videos[$j]->img.'"></a>';
															}
															if($videos[$j]->tipo==21)
															{
																echo	'<a href="javascript:void(0);" onclick="video_youtube(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><img class="col-lg-12 col-md-12 video_img" src="'.$videos[$j]->img.'"></a>';
															}															
													echo '</div>
															<div class="col-sm-3 hidden-lg hidden-md col-xs-6">
																<a href="'.$videos[$j]->ruta.'"><img class="col-xs-12 col-sm-12 video_img" src="'.$videos[$j]->img.'"></a>
															</div>
															<div class="col-lg-3 col-sm-9 col-xs-6 col-md-3">';
																if($videos[$j]->tipo==2)
																{
																	echo	'<p><strong>'.$videos[$j]->n_publico.'</strong></p>';
																}
																if($videos[$j]->tipo==21)
																{
																	echo	'<p><strong>'.$videos[$j]->n_publico.'</strong></p>';
																}		
																	echo '
																	<p>'.$videos[$j]->usuario.'</p>
																	
																	<p>'.$videos[$j]->fecha.'</p>
																	<p>'.$videos[$j]->descripcion.'</p>
															</div>
															<div class="col-sm-12 col-md-5 col-lg-5 col-xs-12">

																<!-- new widget -->
																<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" data-widget-fullscreenbutton="false">							
																	<header>
																		<span class="widget-icon"> <i class="fa fa-comments txt-color-white"></i> </span>
																		<h2> Comentarios </h2>
																		<div class="widget-toolbar">								
																		</div>
																	</header>
									
																	<!-- widget div-->
																	<div>
																		<!-- widget edit box -->
																		<div class="jarviswidget-editbox">
																			<div>
																				<label>Title:</label>
																				<input type="text" />
																			</div>
																		</div>
																		<!-- end widget edit box -->
									
																		<div class="widget-body widget-hide-overflow no-padding">
																			<!-- content goes here -->
																			<br>
																			<div id="chat-body" class="col-lg-12 col-sm-12 col-xs-12 col-md-12 chat-body custom-scroll" style="height:150px;">';
																			
																				for($k=0;$k<sizeof($comentarios);$k++)
																				{
																					if($comentarios[$k]->id_video==$videos[$j]->id)
																					{
																						echo '<p class="alert alert-success"> 
																									<i class="fa fa-comment-o"></i>'
																									.$comentarios[$k]->comentario.
																									'<br><strong>'.$comentarios[$k]->username.'</strong>
																								</p>';
																					}
																				}
																				
																			echo '</div><!-- end content -->
																		</div>
									
																	</div>
																	<!-- end widget div -->
																</div>
																<!-- end widget -->
															</div>
														
															<div class="col-lg-1 hidden-sm hidden-xs hidden-md" style="vertical-align:middle;">
																<ul class="demo-btns hidden-xs hidden-sm" style="vertical-align:middle;">
																	<li>';
																	if($videos[$j]->tipo==2)
																	{
																		echo	'<a class="btn bg-color-greenLight txt-color-white" href="javascript:void(0);" onclick="video(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><i class="fa fa-eye fa-4x"></i></a>';
																	}
																	if($videos[$j]->tipo==21)
																	{
																		echo	'<a class="btn bg-color-greenLight txt-color-white" href="javascript:void(0);" onclick="video_youtube(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><i class="fa fa-eye fa-4x"></i></a>';
																	}	
																	echo '	
																	</li>
																</ul><br>
							
																<ul class="demo-btns" style="vertical-align:middle;">
																	<li>
																		<a class="btn bg-color-blue txt-color-white" href="javascript:void(0);" onclick="show_coment_panel('.$videos[$j]->id.')"><i class="fa fa-comment-o fa-4x"></i></a>
																	</li>
																</ul><br>
															</div>
															<div class="col-md-1 hidden-sm hidden-xs hidden-lg" style="vertical-align:middle;">
																<ul class="demo-btns hidden-xs hidden-sm" style="vertical-align:middle;">
																	<li>';
																	if($videos[$j]->tipo==2)
																	{
																		echo	'<a class="btn bg-color-greenLight txt-color-white" href="javascript:void(0);" onclick="video(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><i class="fa fa-eye fa-3x"></i></a>';
																	}
																	if($videos[$j]->tipo==21)
																	{
																		echo	'<a class="btn bg-color-greenLight txt-color-white" href="javascript:void(0);" onclick="video_youtube(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><i class="fa fa-eye fa-3x"></i></a>';
																	}
																	echo '	
																	</li>
																</ul><br>
							
																<ul class="demo-btns" style="vertical-align:middle;">
																	<li>
																		<a class="btn bg-color-blue txt-color-white" href="javascript:void(0);" onclick="show_coment_panel('.$videos[$j]->id.')"><i class="fa fa-comment-o fa-3x"></i></a>
																	</li>
																</ul><br>
															</div>
															<div class="hidden-lg col-sm-12 col-xs-12 hidden-md" style="vertical-align:middle;">
																<ul class="demo-btns hidden-lg hidden-md" style="vertical-align:middle;">
																	<li>
																		<a class="btn bg-color-greenLight txt-color-white" href="'.$videos[$j]->ruta.'"><i class="fa fa-eye"></i>Ver video</a>
																	</li>
									
																	<li>
																		<a class="btn bg-color-blue txt-color-white" href="javascript:void(0);" onclick="show_coment_panel('.$videos[$j]->id.')"><i class="fa fa-comment-o"></i>Comentar</a>
																	</li>
																</ul>
															</div>
														</div>
														<hr>';
													}
												}	
							
												echo '</div>
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
						<!-- NEW WIDGET START -->
						
						
						<!-- WIDGET END -->
				
					</div>
				
				</section>
				<!-- end widget grid -->

			</div>
			<!-- END MAIN CONTENT -->
			<div class="row">         
         <!-- a blank row to get started -->
	    	<div class="col-sm-12">
	        	<br />
	        	<br />
	        </div>
        </div>
		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script src="/template/js/plugin/bootbox/bootbox.min.js"></script>
		
		<script type="text/javascript">
			function video(vid,name)
			{
				bootbox.dialog({
					message: '<div style="text-align:center;"><video style="width:60%;" controls><source src="'+vid+'" type="video/mp4">No es soportado por su navegador</video></div>',
					title: ""+name+"",
					className: "video-bootbox",
				});
			}
			function video_youtube(url,nombre)
			{
				var igual=url.indexOf('=');
				var andversa=url.indexOf('&');
				if(andversa==-1)
				{
					var video=url.substring(igual+1);
				}
				else
				{
					var video=url.substring(igual+1,andversa);
				}
				bootbox.dialog({
					message: '<div style="text-align:center;"><iframe style="width:100%; height:45rem;" src="http://www.youtube.com/embed/'+video+'"></iframe></div>',
					title: ""+nombre+"",
					className: "video-bootbox",
				});
			}
		</script>
		<script>
			function show_coment_panel(id)
			{
				bootbox.dialog({
					message: '<div class="jarviswidget jarviswidget-color-purple" id="wid-id" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false">'
								+'<header>'
									+'<h2><strong>Comentario</strong> </h2>'		
								+'</header>'
								+'<div>'
								+'<!-- widget edit box -->'
									+'<div class="jarviswidget-editbox">'
									+'<!-- This area used as dropdown edit box -->'
									+'</div>'
									+'<!-- end widget edit box -->'
									+'<!-- widget content -->'
										+'<div class="widget-body no-padding">'
											+'<textarea class="form-control no-border" placeholder="" id="coment" rows="4"> Escribe tu comentario. Máximo 140 caracteres.</textarea>'
											+'<div class="widget-footer">'
												+'<button class="btn btn-sm btn-primary" type="button" onclick="add_coment('+id+')">'
													+'Publicar'
												+'</button>'								
											+'</div>'
										+'</div>'
									+'</div>'
								+'</div>'
							+'</div>',
					title: "Agregue su comentario",	
				});
			}
		</script>
		<script type="text/javascript">
			function add_coment(id)
			{
				var coment=$("#coment").val();
				var datos={'comentario':coment,'video':id};
				$.ajax({
					 data:{info:JSON.stringify(datos)},
			         type: "get",
			         url: "insert_coment",
			         success: function(){
			              alert("Tu comentario fue añadido con exito");
			              location.href="/ov/escuela_negocios/videos";
			         }
				});
			}
		</script>
		<!-- Scripts de la imaginacion chevre del autor de la pagina-->
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
			
			
			
			
			/* BASIC ;*/
				var responsiveHelper_dt_basic = undefined;
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;
				
				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};
	
				$('#dt_basic').dataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_dt_basic) {
							responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_dt_basic.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_dt_basic.respond();
					}
				});
	
			/* END BASIC */
			
			/* COLUMN FILTER  */
		    var otable = $('#datatable_fixed_column').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}		
			
		    });
		    
		    // custom toolbar
		    $("div.toolbar").html('<div class="text-right"><img src="/template/img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
		    	   
		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
		    	
		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();
		            
		    } );
		    /* END COLUMN FILTER */   
	    
			/* COLUMN SHOW - HIDE */
			$('#datatable_col_reorder').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_col_reorder) {
						responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_col_reorder.respond();
				}			
			});
			
			/* END COLUMN SHOW - HIDE */
	
			/* TABLETOOLS */
			$('#datatable_tabletools').dataTable({
				
				// Tabletools options: 
				//   https://datatables.net/extensions/tabletools/button_options
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
		        "oTableTools": {
		        	 "aButtons": [
		             "copy",
		             "csv",
		             "xls",
		                {
		                    "sExtends": "pdf",
		                    "sTitle": "SmartAdmin_PDF",
		                    "sPdfMessage": "SmartAdmin PDF Export",
		                    "sPdfSize": "letter"
		                },
		             	{
	                    	"sExtends": "print",
	                    	"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
	                	}
		             ],
		            "sSwfPath": "/template/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
		        },
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_tabletools) {
						responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_tabletools.respond();
				}
			});
			
			/* END TABLETOOLS */
		
		})

		</script>