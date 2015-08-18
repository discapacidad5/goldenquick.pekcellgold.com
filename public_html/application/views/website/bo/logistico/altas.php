<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
							
							<!-- PAGE HEADER -->
							<i class="fa-fw fa fa-pencil-square-o"></i> 
								<a href="/bo/dashboard">Dashboard</a> 
							<span>>
								<a href="/bo/logistico">Modulo log&iacute;stico</a> 
							</span>
							<span>>
								Altas
							</span>
						</h1>
					</div>
				</div>
				<div>
					<section id="widget-grid" class="">
						<!-- START ROW -->
						<div class="row">
							<!-- NEW COL START -->
							<article class="col-sm-12 col-md-12 col-lg-12">
								<!-- Widget ID (each widget will need unique ID)-->
								<div class="jarviswidget"  data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false"	>
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
										<!--<h2>Datos personales</h2>-->				
										
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
												<li class="active">
													<a href="#s1" data-toggle="tab">Almacen</a>
												</li>
												<li>
													<a href="#s2" data-toggle="tab">Almacenes</a>
												</li>
											</ul>
											<div id="myTabContent1" class="tab-content padding-10">
												<div class="tab-pane fade in active" id="s1">
													<div class="row">
														<form id="almacen_register" class="smart-form" method="post" action="new_almacen">
															<fieldset>
																<legend>Información del almacen</legend>
																<section id="usuario" class="col col-3">
																	<label class="input"> <i class="icon-prepend fa fa-user"></i>
																		<input id="nombre" required type="text" name="nombre" placeholder="Nombre del Almacen">
																	</label>
																</section>
																<section id="correo" class="col col-5">
																	<textarea name="descripcion" style="max-width: 96%" id="mymarkdown"></textarea>
																</section>
																<? if($web==0)
																{?>
																<section class="col col-2">Almacen Web
																	<div class="inline-group">
																		<label class="radio">
																		<input type="radio" value="1" name="web" >
																		<i></i>Si</label>
																		<label class="radio">
																		<input type="radio" value="0" name="web" checked="">
																		<i></i>No</label>
																	</div>
																</section>
																<?}
																else{?>
																<section class="col col-2">Almacen Web
																	<div class="inline-group">
																		<!--<label class="radio state-disabled">
																		<input type="radio" value="1" name="web1" >
																		<i></i>Si</label>-->
																		<label class="radio state-disabled">
																		<input type="radio" value="0" name="web" checked="">
																		<i></i>No</label>
																	</div>
																</section>
																<?}?>
																<section class="col col-2">Activo
																	<div class="inline-group">
																		<label class="radio">
																		<input type="radio" value="1" name="activo" checked="">
																		<i></i>Si</label>
																		<label class="radio">
																		<input type="radio" value="0" name="activo">
																		<i></i>No</label>
																	</div>
																</section>
															</fieldset>
															<footer>
																<button type="submit" class="btn btn-primary">
																	Agregar Almacen 
																</button>
															</footer>
														</form>
													</div>
												</div>
												<div class="tab-pane fade" id="s2">
													<section id="widget-grid" class="">
				
														<!-- row -->
														<div class="row">
													
															<!-- NEW WIDGET START -->
															<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									
																<!-- Widget ID (each widget will need unique ID)-->
																<div class="jarviswidget jarviswidget-color-blueDark"  data-widget-editbutton="false">
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
																		<span class="widget-icon"> <i class="fa fa-table"></i> </span>
																		<h2>Entradas</h2>
													
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
													
																			<table id="datatable_fixed_column1" class="table table-striped table-bordered table-hover" width="100%">
																				<thead>
																					<tr>
																						<th data-hide="phone">ID</th>
																						<th data-class="expand">Nombre</th>
																						<th data-class="expand">Descrpcion</th>
																						<th>WEB</th>
																						<th></th>
																						
																					</tr>
																				</thead>
																				<tbody>
																					
																					<?php for($i=0;$i<sizeof($almacen);$i++)
																					{
																						echo 
																						"<tr>
																							<td>".$almacen[$i]->id_almacen."</td>
																							<td>".$almacen[$i]->nombre."</td>
																							<td>".$almacen[$i]->descripcion."</td>
																							<td>".$almacen[$i]->web."</td>";
																							if($almacen[$i]->estatus=="ACT")
																							{
																								echo "
																								<td class='text-center'>
																									<a title='Editar' href='#' onclick='editar_alm(".$almacen[$i]->id_almacen.",".$almacen[$i]->web.")' class='txt-color-blue'><i class='fa fa-pencil'></i></a>
																									<a title='Eliminar' href='#' onclick='eliminar_alm(".$almacen[$i]->id_almacen.")' class='txt-color-red'><i class='fa fa-trash-o'></i></a>
																									<a class='txt-color-green' style='cursor: pointer;' onclick='estatus_alm(".$almacen[$i]->id_almacen.",1)' title='Desctivar'><i class='fa fa-check-square-o'></i></a>
																								</td>";
																							}
																							else 
																							{
																								echo "
																								<td class='text-center'>
																									<a title='Editar' href='#' onclick='editar_alm(".$almacen[$i]->id_almacen.",".$almacen[$i]->web.")' class='txt-color-blue'><i class='fa fa-pencil'></i></a>
																									<a title='Eliminar' href='#' onclick='eliminar_alm(".$almacen[$i]->id_almacen.")' class='txt-color-red'><i class='fa fa-trash-o'></i></a>
																									<a class='txt-color-red' style='cursor: pointer;' onclick='estatus_alm(".$almacen[$i]->id_almacen.",0)' title='Activar'><i class='fa fa-square-o '></i></a>
																								</td>";
																							}
																						echo "</tr>";
																					} ?>
																					
																				</tbody>
																			</table>
													
																		</div>
																		<!-- end widget content -->
													
																	</div>
																	<!-- end widget div -->
																</div>
																<!-- end widget -->
													
															</article>
															
															
															<!-- WIDGET END -->
													
														</div>
													
													</section>
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
				</div>
			</div>
			<script src="/template/js/plugin/markdown/markdown.min.js"></script>
			<script src="/template/js/plugin/markdown/to-markdown.min.js"></script>
			<script src="/template/js/plugin/markdown/bootstrap-markdown.min.js"></script>

<script>
	function editar_alm(id,web)
	{
		$.ajax({
			type: "post",
			url: "almacen_form",
			data: {id:id,es_web:web,web:<?=$web?>}
		})
		.done(function(msg)
		{
			bootbox.dialog({
				message: msg,
				title: "Editar",
				className: "",
				buttons: {
					success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {
						$.ajax({
							type: "post",
							data: $('#almacen_update').serialize(),
							url: "editar_almacen"
						})
						.done(function(msg){
							bootbox.dialog({
								message: "Se ha editado este almacen exitosamente.",
								title: "Exito",
								className: "",
								buttons: {
									success: {
										label: "Aceptar",
										className: "btn-success",
										callback: function(){
											window.location.href="/bo/logistico/altas";
										}
									}
								}
							})
						});
					}
				},
				danger: {
					label: "Cancelar",
					className: "btn-danger",
					callback: function(){
					
					}
				}
			}
		});
	});
		
		
	$("#mymarkdown").markdown({
					autofocus:false,
					savable:false
			})
	}
	function eliminar_alm(id)
	{
		bootbox.dialog({
			message: "¿Seguro que desea eliminar definitivamente este almacen?",
			title: "Eliminar",
			className: "",
			buttons: {
				success: {
				label: "Si",
				className: "btn-success",
				callback: function() {
					$.ajax({
						type: "post",
						data: {id:id},
						url: "eliminar_almacen"
					})
					.done(function(msg){
						bootbox.dialog({
							message: "Se ha eliminado este almacen exitosamente.",
							title: "Exito",
							className: "",
							buttons: {
								success: {
									label: "Aceptar",
									className: "btn-success",
									callback: function(){
										window.location.href="/bo/logistico/altas";
									}
								}
							}
						})
					});
				}
			},
			danger: {
				label: "No",
				className: "btn-danger",
				callback: function(){
				
				}
			}
		}
	});
	}
	function estatus_alm(id,estatus)
	{
		if(estatus==1)
		{
			var mensaje="¿Desea desactivar este almacen?";
		}
		else
		{
			var mensaje="¿Desea activar este almacen?";
		}
		bootbox.dialog({
			message: mensaje,
			title: "Estatus",
			className: "",
			buttons: {
				success: {
				label: "Si",
				className: "btn-success",
				callback: function() {
					$.ajax({
						type: "post",
						data: {id:id,estatus:estatus},
						url: "estatus_almacen"
					})
					.done(function(msg){
						bootbox.dialog({
							message: "Se ha cambiado el estatus de este almacen exitosamente.",
							title: "Exito",
							className: "",
							buttons: {
								success: {
									label: "Aceptar",
									className: "btn-success",
									callback: function(){
										window.location.href="/bo/logistico/altas";
									}
								}
							}
						})
					});
				}
			},
			danger: {
				label: "No",
				className: "btn-danger",
				callback: function(){
				
				}
			}
		}
	});
	}
</script>
<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {
	
	$("#mymarkdown").markdown({
					autofocus:false,
					savable:false
			})
	});
</script>