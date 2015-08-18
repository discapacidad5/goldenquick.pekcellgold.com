<div id="content">

	<!-- row -->
	<div class="row">

		<!-- col -->
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER -->
			<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a> 
			<span>>
				Encuestas </span></h1>
		</div>
		<!-- end col -->

		<!-- right side of the page with the sparkline graphs -->
		<!-- col -->
		<!-- end col -->

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
						<h2>Encuestas</h2>				
						
					</header>

					<!-- end row -->
				
					<!-- row -->
					<div>
										
										<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							
						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body">
							<ul id="myTab1" class="nav nav-tabs bordered">
								<li class="active">
									<a href="#s1" data-toggle="tab">Encuestas Abiertas</a>
								</li>
								<li>
									<a href="#s2" data-toggle="tab">Historico de Encuestas contestatadas</a>
								</li>
							</ul>
							<div id="myTabContent1" class="tab-content padding-10">
								<div class="tab-pane fade in active" id="s1">
									<div class="row">
								
										<div class="col-sm-12">
								
											<div class="well">
								
												<table class="table table-striped table-forum">
													<thead>
														<tr>
															<th colspan="2">Encuesta</th>
															<th class="text-center hidden-xs hidden-sm" style="width: 100px;">Usuario</th>
															<th class="text-center hidden-xs hidden-sm" style="width: 100px;">Fecha de creacion</th>
															<th class="text-center hidden-xs hidden-sm" style="width: 200px;">Veces que se ha contestado</th>
														</tr>
													</thead>
													<tbody>
														
														<!-- TR -->
															<?php
																for($i=0;$i<sizeof($encuestas);$i++)
																{
																	echo '<tr>
																			<td class="text-center" style="width: 40px;"><i class="fa fa-file-text-o fa-2x text-muted"></i></td>
																			<td>
																				<h4><a style="cursor:pointer;" onclick="contestar('.urlencode($encuestas[$i]->id_encuesta).')">'
																					.$encuestas[$i]->nombre.
																				'</a>
																					<small>'.$encuestas[$i]->descripcion.'</small>
																				</h4>
																			</td>
																			<td class="text-center hidden-xs hidden-sm">
																				'.$encuestas[$i]->username.'
																			</td>
																			<td class="text-center hidden-xs hidden-sm">
																				'.$encuestas[$i]->fecha_creacion.'
																			</td>
																			<td class="text-center hidden-xs hidden-sm">
																				'.$encuestas[$i]->veces.'
																			</td>
																		</tr>';
																}
															?>
								
														
														
													</tbody>
												</table>
								
												
								
								
											</div>
										</div>
								
									</div>
								</div>
							
								<div class="tab-pane fade " id="s2">
									<div class="row">
										<div class="col-sm-12">
								
											<div class="well">
												<table class="table table-striped table-forum">
													<thead>
														<tr>
															<th colspan="2">Encuesta</th>
															<th class="text-center hidden-xs hidden-sm" style="width: 250px;">Fecha en que se contesto</th>
															<th class="text-center hidden-xs hidden-sm" style="width: 150px;">Mas...</th>
													</thead>
													<tbody>
														
														<!-- TR -->
															<?php
																for($j=0;$j<sizeof($contestadas);$j++)
																{
																	echo '<tr>
																			<td class="text-center" style="width: 40px;"><i class="fa fa-check fa-2x text-muted"></i></td>
																			<td>
																				<h4><a style="cursor:pointer;" onclick="ver_resultados('.$contestadas[$j]->id_encuesta_contestada.',\''.$contestadas[$j]->nombre.'\')">'
																					.$contestadas[$j]->nombre.
																				'</a>
																					
																				</h4>
																			</td>
																			<td class="text-center hidden-xs hidden-sm">
																				'.$contestadas[$j]->fecha.'
																			</td>
																			<td class="text-center hidden-xs hidden-sm">
																				<a style="cursor:pointer;" onclick="ver_resultados('.$contestadas[$j]->id_encuesta_contestada.',\''.$contestadas[$j]->nombre.'\')">Ver Resultados</a>
																			</td>
																		</tr>';
																}
															?>
								
														
														
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
						
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</section>

	<!-- end row -->

	<!-- row -->

	<div class="row">

		<!-- a blank row to get started -->

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
<script>
	function contestar(id)
	{
		$.ajax({
			data:"id="+id,
			type: "post",
			url: "se_contesto"
		})
		.done(function(msg){
			if(msg=="no")
			{
				window.location.href="contestar_encuesta?id="+id;
			}
			else
			{
				bootbox.dialog({
		          	message:"Ya has contestato esta encuesta",
		          	title: "Error!",
		          	buttons: {
							danger: {
							label: "Aceptar",
							className: "btn-danger",
							callback: function() {
									
								}
							},		     
						}   
					});
			}
			
		});
	}
	
	function ver_resultados(id,nombre)
	{
		var pantalla1='<div class="row">'
						+'<div class="col-sm-12">'
							+'<div class="well">'
								+'<table class="table table-striped table-forum">'
									+'<thead>'
										+'<tr>'
											+'<th colspan="2">Pregunta</th>'
											+'<th class="text-center hidden-xs hidden-sm" style="width: 250px;">Respuesta</th>'
										+'</thead>'
									+'<tbody>';
										

				
						var pantalla2='</tbody>'
								+'</table>'
							+'</div>'
						+'</div>'
					+'</div>';
		$.ajax({
				 data:'id='+id,
		         type: "get",
		         url: "ver_resultados",
		         success: function(msg){
		              bootbox.dialog({
		              	message:pantalla1+msg+pantalla2,
		              	title:nombre,
		              });
		         }
			});
	}
</script>