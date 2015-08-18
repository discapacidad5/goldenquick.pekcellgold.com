<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-pencil-square-o"></i> 
					<a href="/bo/dashboard">Dashboard</a>
				<!--<span>>
					<a href="/bo/comercial">Módulo comercial</a>
				</span>-->
				<span>>
					Oficina virtual
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
									<a href="#s1" data-toggle="tab">Presentaciones</a>
								</li>
								<li>
									<a href="#s2" data-toggle="tab">Descargas</a>
								</li>
								<li>
									<a href="#s3" data-toggle="tab">E-Book's</a>
								</li>
								<li>
									<a href="#s4" data-toggle="tab">Información</a>
								</li>
								<li>
									<a href="#s5" data-toggle="tab">Noticias</a>
								</li>
								<li>
									<a href="#s6" data-toggle="tab">Vídeos</a>
								</li>
								<li>
									<a href="#s7" data-toggle="tab">Conferencias</a>
								</li>
								<li>
									<a href="#s8" data-toggle="tab">Eventos</a>
								</li>
								<li>
									<a href="#s9" data-toggle="tab">Cupones - Boletos</a>
								</li>
								<li>
									<a href="#s10" data-toggle="tab">Reconocimientos</a>
								</li>
								<li>
									<a href="#s11" data-toggle="tab">Encuestas</a>
								</li>
							</ul>
							<div id="myTabContent1" class="tab-content padding-10">
							
							///////////////////////////////////////////////////////////////////////////////////////////////////
								<div class="tab-pane fade in active" id="s1">
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
														<h2>Presentaciones</h2>
									
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
									
															<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
																<thead>
																	<tr>
																		<th data-hide="phone">ID</th>
																		<th data-class="expand">Nombre</th>
																		<th>Usuario</th>
																		<th data-hide="phone">Grupo</th>
																		<th data-hide="phone,tablet">Fecha</th>
																		<th data-hide="phone,tablet">Descripci&oacute;n</th>
																		<th></th>
																		
																	</tr>
																</thead>
																<tbody>
																	
																	<?php foreach ($presentaciones as $presentacion)
																	{
																		echo 
																		"<tr>
																			<td>".$presentacion->id."</td>
																			<td>".$presentacion->n_publico."</td>
																			<td>".$presentacion->nombreUsuario." ".$presentacion->apellidoUsuario."</td>
																			<td>".$presentacion->grupo."</td>
																			<td>".$presentacion->fecha."</td>
																			<td>".$presentacion->descripcion."</td>
																			
																			<td class='text-center'>
																				<a class='txt-color-blue' onclick='' href='".$presentacion->ruta."' title='Descargar'><i class='fa fa-download'></i></a>
																				<a class='txt-color-red' style='cursor: pointer;' onclick='delete_file(".$presentacion->id.",\"".$presentacion->ruta."\")' title='Eliminar'><i class='fa fa-trash-o'></i></a>
																				<a class='txt-color-green' style='cursor: pointer;' onclick='editar(1,".$presentacion->id.")'  title='Editar'><i class='fa fa-edit'></i></a>
																			</td>
																		</tr>";
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
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="well">
													<div class="row">
														<form class="smart-form" id="reporte-form" method="post">
															<div class="row">
																<section class="col col-lg-9 col-md-9 col-sm-6 col-xs-12" id="">
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12" id="buscarcomb">
																	<label class="input">
																		<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="nuevo_archivo(1)">
																		<i class='fa fa-desktop'>
																		</i>&nbsp;Nueva Presentacion</a>
																	</label>
																</section>
															</div>
														</form>
													</div>
												</div>
											</article>	
											
											<!-- WIDGET END -->
									
										</div>
									
									</section>
								</div>
								///////////////////////////////
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
														<h2>Descargas</h2>
									
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
																		<th data-class="expand">Tipo</th>
																		<th>Usuario</th>
																		<th data-hide="phone">Grupo</th>
																		<th data-hide="phone,tablet">Fecha</th>
																		<th data-hide="phone,tablet">Descripci&oacute;n</th>
																		<th data-class="expand"></th>
																	</tr>
																</thead>
																<tbody>
																	<?php for($i=0;$i<sizeof($files);$i++)
																	{
																		switch($files[$i]->tipo)
																		{	
																			case 1:
																				$tipo='E-Book';
																				break;
																			case 2:
																				$tipo='Video';
																				break;
																			case 3:
																				$tipo='Presentacion';
																				break;
																			case 4:
																				$tipo='Presentacion';
																				break;
																			case 5:	
																				$tipo='Imagen';
																				break;
																			case 6:
																				$tipo='Imagen';
																				break;
																			default:	
																				$tipo='-';
																				break;
																		}
																		echo 
																		"<tr>
																			<td>".($i+1)."</td>
																			<td>".$files[$i]->n_publico."</td>
																			<td>".$tipo."</td>
																			<td>".$files[$i]->usuario."</td>
																			<td>".$files[$i]->grupo."</td>
																			<td>".$files[$i]->fecha."</td>
																			<td>".$files[$i]->descripcion."</td>
																			<td class='text-center'>
																				<a class='txt-color-blue' onclick='' href='".$files[$i]->ruta."' title='Descargar'><i class='fa fa-download'></i></a>
																				<a class='txt-color-red' style='cursor: pointer;' onclick='delete_file(".$files[$i]->id.",\"".$files[$i]->ruta."\")' title='Eliminar'><i class='fa fa-trash-o'></i></a>&nbsp;";
																				if($files[$i]->estado=='DES')
																				{
																					echo '<a class="txt-color-green" style="cursor: pointer;" onclick="estatus_file(1,'.$files[$i]->id.')"  title="Activar"><i class="fa fa-square-o"></i></a>';
																				}
																				else {
																					echo '<a class="txt-color-green" style="cursor: pointer;" onclick="estatus_file(2,'.$files[$i]->id.')"  title="Desactivar"><i class="fa fa-check-square-o"></i></a>';
																				}
																			echo "</td>
																		</tr>";
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
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="well">
													<div class="row">
														<form class="smart-form" id="reporte-form" method="post">
															<div class="row">
																<section class="col col-lg-9 col-md-9 col-sm-6 col-xs-12" id="">
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12" id="buscarcomb">
																	<label class="input">
																		<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="nuevo_archivo(5)"><i class='fa fa-upload'></i>&nbsp;Nuevo Archivo</a>
																	</label>
																</section>
															</div>
														</form>
													</div>
												</div>
											</article>	
											
											<!-- WIDGET END -->
									
										</div>
									
									</section>
								</div>
								<div class="tab-pane fade" id="s3">
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
														<h2>E-Books</h2>
									
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
									
															<table id="datatable_fixed_column2" class="table table-striped table-bordered table-hover" width="100%">
																<thead>
																	<tr>
																		<th data-hide="phone">ID</th>
																		<th></th>
																		<th data-class="expand">Nombre</th>
																		<th>Usuario</th>
																		<th data-hide="phone">Grupo</th>
																		<th data-hide="phone,tablet">Fecha</th>
																		<th data-hide="phone,tablet">Descripci&oacute;n</th>
																		<th data-class="expand"></th>
																		
																	</tr>
																</thead>
																<tbody>
																	<?php for($i=0;$i<sizeof($ebooks);$i++)
																	{
																		echo 
																		"<tr>
																			<td style='vertical-align: middle;'>".($i+1)."</td>
																			<td style='text-align:center; vertical-align: middle;'>
																				<a href='".$ebooks[$i]->ruta."'><img src='".$ebooks[$i]->img."' style='max-height: 90px;'></a>
																			</td>
																			<td style='vertical-align: middle;'>".$ebooks[$i]->n_publico."</td>
																			<td style='vertical-align: middle;'>".$ebooks[$i]->usuario."</td>
																			<td style='vertical-align: middle;'>".$ebooks[$i]->grupo."</td>
																			<td style='vertical-align: middle;'>".$ebooks[$i]->fecha."</td>
																			<td style='vertical-align: middle;'>".$ebooks[$i]->descripcion."</td>
																		
																			<td class='text-center'>
																				<a class='txt-color-blue' onclick='' href='".$ebooks[$i]->ruta."' title='Descargar'><i class='fa fa-download'></i></a>
																				<a class='txt-color-red' style='cursor: pointer;' onclick='delete_file(".$ebooks[$i]->id.",\"".$ebooks[$i]->ruta."\")' title='Eliminar'><i class='fa fa-trash-o'></i></a>
																				<a class='txt-color-green' style='cursor: pointer;' onclick='editar(1,".$ebooks[$i]->id.")' title='Editar'><i class='fa fa-edit'></i></a>
																			</td>
																		</tr>";
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
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="well">
													<div class="row">
														<form class="smart-form" id="reporte-form" method="post">
															<div class="row">
																<section class="col col-lg-9 col-md-9 col-sm-6 col-xs-12" id="">
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12" id="buscarcomb">
																	<label class="input">
																		<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="nuevo_archivo(4)"><i class='fa fa-book'></i>&nbsp;Nuevo E-Book</a>
																	</label>
																</section>
															</div>
														</form>
													</div>
												</div>
											</article>	
											
											<!-- WIDGET END -->
									
										</div>
									
									</section>
								</div>
								<div class="tab-pane fade" id="s4">
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
														<h2>Informaci&oacute;n/h2>
									
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
									
															<table id="datatable_fixed_column3" class="table table-striped table-bordered table-hover" width="100%">
																<thead>
																	<tr>
																		<th data-hide="phone">ID</th>
																		<th></th>
																		<th data-class="expand">Nombre</th>
																		<th>Usuario</th>
																		<th data-hide="phone,tablet">Fecha</th>
																		<th>Descripci&oacute;n</th>
																		<th></th>
																		
																	</tr>
																</thead>
																<tbody>
																	<?php for($i=0;$i<sizeof($infos);$i++)
																	{
																		$texto=json_encode($infos[$i]->descripcion);
																		$texto=trim($texto);
																		echo 
																		"<tr>
																			<td style='text-align:center; vertical-align: middle;'>".($i+1)."</td>
																			<td style='text-align:center; vertical-align: middle;' class='no-padding'>
																				<img src='".$infos[$i]->ruta."' style='max-height:90px '>
																			</td>
																			<td style='text-align:center; vertical-align: middle;'>".$infos[$i]->nombre."</td>
																			<td style='text-align:center; vertical-align: middle;'>".$infos[$i]->usuario."</td>
																			<td style='text-align:center; vertical-align: middle;'>".$infos[$i]->fecha."</td>
																			<td style='vertical-align: middle;'>".substr($infos[$i]->descripcion, 0, 100)."...
																				<a href='javascript:void(0);' onclick='vermas_info(".$texto.",\"".$infos[$i]->usuario."\",\"".$infos[$i]->ruta."\",\"".$infos[$i]->nombre."\")'>ver mas</a></p>
																				
																			</td>
																			
																			<td class='text-center'>
																				
																				<a class='txt-color-red' style='cursor: pointer;' onclick='delete_info(".$infos[$i]->id.")' title='Eliminar'><i class='fa fa-trash-o'></i></a>
																				<a class='txt-color-green'  style='cursor: pointer;' onclick='editar(2,".$infos[$i]->id.")'  title='Editar'><i class='fa fa-edit'></i></a>
																			</td>
																		</tr>";
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
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="well">
													<div class="row">
														<form class="smart-form" id="reporte-form" method="post">
															<div class="row">
																<section class="col col-lg-9 col-md-9 col-sm-6 col-xs-12" id="">
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12" id="buscarcomb">
																	<label class="input">
																		<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="nuevo_archivo(6)"><i class='fa fa-info'></i>&nbsp;Nueva Informaci&oacute;n</a>
																	</label>
																</section>
															</div>
														</form>
													</div>
												</div>
											</article>	
											
											<!-- WIDGET END -->
									
										</div>
									
									</section>
								</div>
								<div class="tab-pane fade" id="s5">
									<section id="widget-grid" class="">
				
										<!-- row -->
										<div class="row">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="jarviswidget jarviswidget-color-darken" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
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
														
														<h2 class="font-md"><strong>Noticias</strong> <i></i></h2>				
														
													</header>
					
													<!-- widget div-->
													<div>
														
														<!-- widget edit box -->
														<div class="smart-timeline">
															<ul class="smart-timeline-list">
																<?php 
																	for($i=0;$i<sizeof($noticias);$i++)
																	{
																		$texto=json_encode($noticias[$i]->contenido);
																		$texto=trim($texto);
																		echo
																		"<li>	
																			<div class='smart-timeline-icon' style='cursor:pointer;' onclick='window.location.href=\"ver_noticia?idnw=".$noticias[$i]->id."\"'>
																				<img src='".$noticias[$i]->imagen."'>
																			</div>
																			<div class='smart-timeline-time'>
																				<small>".$noticias[$i]->fecha."</small>
																			</div>
																			<div class='smart-timeline-content'>
																				<p style='font-size:15px;'>
																					<a href='ver_noticia?idnw=".$noticias[$i]->id."'><strong>".$noticias[$i]->nombre."</strong></a>
																				</p>
																				<p style='text-align:justify; padding-right:3%;'>"
																					.substr($noticias[$i]->contenido, 0, 100).
																				"... <a href='ver_noticia?idnw=".$noticias[$i]->id."'>ver mas</a>
																				&nbsp;&nbsp;&nbsp;<a class='txt-color-red' style='cursor: pointer;' onclick='delete_new(".$noticias[$i]->id.")' title='Eliminar'><i class='fa fa-trash-o'></i></a>
																				&nbsp;&nbsp;&nbsp;<a class='txt-color-green'  style='cursor: pointer;' onclick='editar(3,".$noticias[$i]->id.")'  title='Editar'><i class='fa fa-edit'></i></a></p>
																				<p><strong>"
																					.$noticias[$i]->usuario.
																				"
																				</strong></p>									
																				
																			</div>
																		</li>";
																	}
																?>
																
															</ul>
														</div>
														<!-- end widget content -->
														
													</div>
													<!-- end widget div -->
													
												</div>
											<!-- Timeline Content -->
											</article>
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="well">
													<div class="row">
														<form class="smart-form" id="reporte-form" method="post">
															<div class="row">
																<section class="col col-lg-9 col-md-9 col-sm-6 col-xs-12" id="">
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12" id="buscarcomb">
																	<label class="input">
																		<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="nuevo_archivo(3)"><i class='fa fa-bullhorn'></i>&nbsp;Nueva Noticia</a>
																	</label>
																</section>
															</div>
														</form>
													</div>
												</div>
											</article>	
										</div>
									</section>
								</div>
								<div class="tab-pane fade" id="s6">
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
																echo	'<a href="javascript:void(0);" onclick="video(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><img class="col-lg-12 col-md-12 video_img" style="max-height: 90px;" src="'.$videos[$j]->img.'"></a>';
															}
															if($videos[$j]->tipo==8)
															{
																echo	'<a href="javascript:void(0);" onclick="video_youtube(\''.$videos[$j]->ruta.'\',\''.$videos[$j]->n_publico.'\')"><img class="col-lg-12 col-md-12 video_img" style="max-height: 90px;" src="'.$videos[$j]->img.'"></a>';
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
																if($videos[$j]->tipo==8)
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
																	if($videos[$j]->tipo==8)
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
																	if($videos[$j]->tipo==8)
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
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="well">
													<div class="row">
														<form class="smart-form" id="reporte-form" method="post">
															<div class="row">
																<section class="col col-lg-6 col-md-6 hidden-sm col-xs-12" id="">
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12" id="buscarcomb">
																	<label class="input">
																		<a id="eliminar_carro" class="btn btn-danger btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="nuevo_archivo(7)"><i class='fa fa-youtube-play '></i>&nbsp;Video de Youtube</a>
																	</label>
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12" id="buscarcomb">
																	<label class="input">
																		<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="nuevo_archivo(2)"><i class='fa fa-video-camera'></i>&nbsp;Nuevo Video</a>
																	</label>
																</section>
															</div>
														</form>
													</div>
												</div>
											</article>	
										</div>
									</section>
								</div>
								<div class="tab-pane fade" id="s7">
									Contenido
								</div>
								<div class="tab-pane fade" id="s8">
									<section id="widget-grid" class="">
				
										<!-- row -->
										<div class="row">
											<div class="col-sm-12 col-md-12 col-lg-12">
						
												<!-- new widget -->
												<div class="jarviswidget jarviswidget-color-blueDark">
										
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
														<span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
														<h2> Mis eventos </h2>
														<div class="widget-toolbar">
															<!-- add: non-hidden - to disable auto hide -->
															<div class="btn-group">
																<button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
																	Mostrando <i class="fa fa-caret-down"></i>
																</button>
																<ul class="dropdown-menu js-status-update pull-right">
																	<li>
																		<a href="javascript:void(0);" id="mt">Mes</a>
																	</li>
																	<li>
																		<a href="javascript:void(0);" id="ag">Agenda</a>
																	</li>
																	<li>
																		<a href="javascript:void(0);" id="td">Hoy</a>
																	</li>
																</ul>
															</div>
														</div>
													</header>
										
													<!-- widget div-->
													<div>
										
														<div class="widget-body no-padding">
															<!-- content goes here -->
															<div class="widget-body-toolbar">
										
																<div id="calendar-buttons">
										
																	<div class="btn-group">
																		<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
																		<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>
																	</div>
																</div>
															</div>
															<div id="calendar"></div>
										
															<!-- end content -->
														</div>
										
													</div>
													<!-- end widget div -->
												</div>
												<!-- end widget -->
										
											</div>
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="well">
													<div class="row">
														<form class="smart-form" id="reporte-form" method="post">
															<div class="row">
																<section class="col col-lg-6 col-md-6 hidden-sm hidden-xs" id="">
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12" id="buscarcomb">
																	<label class="input">
																		<a id="eliminar_carro" class="btn btn-success btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="ver_eventos()"><i class='fa fa-calendar'></i>&nbsp;Ver eventos</a>
																	</label>
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12" id="buscarcomb">
																	<label class="input">
																		<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="nuevo_evento()"><i class='fa fa-calendar'></i>&nbsp;Nuevo Evento</a>
																	</label>
																</section>
															</div>
														</form>
													</div>
												</div>
											</article>	
										</div>
									</section>
								</div>
								<div class="tab-pane fade" id="s9">
									<section id="widget-grid" class="">
				
										<!-- row -->
										<div class="row">
									
											<!-- NEW WIDGET START -->
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
												<!-- Widget ID (each widget will need unique ID)-->
												<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
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
														<h2>Cupones</h2>
									
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
									
															<table id="datatable_fixed_column5" class="table table-striped table-bordered table-hover" width="100%">
																<thead>
																	<tr>
																		<th data-hide="phone">ID</th>
																		<th data-class="expand">Codigo</th>
																		<th>Descripcion</th>
																		<th data-hide="phone">Fecha adicion</th>
																		<th></th>
																		
																	</tr>
																</thead>
																<tbody>
																	<?php 
																	for($i=0;$i<sizeof($cupones);$i++)
																	{
																		echo '<tr>
																				<td>'.$cupones[$i]->id_cupon.'</td>
																				<td>'.$cupones[$i]->codigo.'</td>
																				<td>'.$cupones[$i]->descripcion.'</td>
																				<td>'.$cupones[$i]->fecha_adicion.'</td>
																				<td class="text-center">
																					<a class="txt-color-red" style="cursor: pointer;" onclick="delete_cupon('.$cupones[$i]->id_cupon.')" title="Eliminar"><i class="fa fa-trash-o"></i></a>
																					<a class="txt-color-green" style="cursor: pointer;" onclick="editar(4,'.$cupones[$i]->id_cupon.')"  title="Editar"><i class="fa fa-edit"></i></a>
																					<a class="txt-color-green" style="cursor: pointer;" onclick="asignar_form('.$cupones[$i]->id_cupon.')"  title="Asignar"><i class="fa fa-exchange"></i></a>&nbsp;';
																				if($cupones[$i]->estado=='DES')
																				{
																					echo '<a class="txt-color-green" style="cursor: pointer;" onclick="estatus(1,'.$cupones[$i]->id_cupon.')"  title="Activar"><i class="fa fa-square-o"></i></a>';
																				}
																				else {
																					echo '<a class="txt-color-green" style="cursor: pointer;" onclick="estatus(2,'.$cupones[$i]->id_cupon.')"  title="Desactivar"><i class="fa fa-check-square-o"></i></a>';
																				}
																					
																				echo '</td>
																			</tr>';
																	}
																	?>
																	
																</tbody>
															</table>
									
														</div>
														<!-- end widget content -->
									
													</div>
													<!-- end widget div -->
												</div>
												<!-- end widget -->
									
											</article>
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="well">
													<div class="row" >
														<form class="smart-form" id="reporte-form" method="post">
															<div class="row">
																<section class="col col-lg-9 col-md-9 col-sm-6 col-xs-12" id="">
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12" id="buscarcomb">
																	<label class="input">
																		<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="agregar_cupon()"><i class='fa fa-info'></i>&nbsp;Nuevo Cupón</a>
																	</label>
																</section>
															</div>
														</form>
													</div>
												</div>
											</article>	
											<!-- WIDGET END -->
									
										</div>
									
									</section>
								</div>
								<div class="tab-pane fade" id="s10">
									Contenido
								</div>
								<div class="tab-pane fade" id="s11">
									<section id="widget-grid" class="">
										<!-- START ROW -->
										<div class="row">
											<!-- NEW COL START -->
											<article class="col-sm-12 col-md-12 col-lg-12">
												<!-- Widget ID (each widget will need unique ID)-->
												
												
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
																		<th class="text-center" style="width: 100px;">Mas...</th>
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
																							<h4><a style="cursor:pointer;" href="#">'
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
																						<td class="text-center">
																							<h5><a class="txt-color-red" style="cursor: pointer;" onclick="delete_encuesta('.$encuestas[$i]->id_encuesta.')" title="Eliminar"><i class="fa fa-trash-o"></i></a>
																							<a class="txt-color-green" style="cursor: pointer;" onclick="editar(5,'.$encuestas[$i]->id_encuesta.')"  title="Editar"><i class="fa fa-edit"></i></a>&nbsp;';
																						if($encuestas[$i]->estatus=='DES')
																						{
																							echo '<a class="txt-color-green" style="cursor: pointer;" onclick="estatus_encuesta(1,'.$encuestas[$i]->id_encuesta.')"  title="Activar"><i class="fa fa-square-o"></i></a>';
																						}
																						else {
																							echo '<a class="txt-color-green" style="cursor: pointer;" onclick="estatus_encuesta(2,'.$encuestas[$i]->id_encuesta.')"  title="Desactivar"><i class="fa fa-check-square-o"></i></a>';
																						}
																					
																						'</h5></td>
																					</tr>';
																			}
																		?>
											
																	
																	
																</tbody>
															</table>
											
															
											
											
														</div>
													</div>
											
												</div>
														
											</article>
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="well">
													<div class="row" >
														<form class="smart-form" id="reporte-form" method="post">
															<div class="row">
																<section class="col col-lg-9 col-md-9 col-sm-6 col-xs-12" id="">
																</section>
																<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12" id="buscarcomb">
																	<label class="input">
																		<a id="eliminar_carro" class="btn btn-primary btn-sm col-xs-12 col-lg-12 col-md-12 col-sm-12" onclick="agregar_encuesta()"><i class='fa fa-info'></i>&nbsp;Nueva Encuesta</a>
																	</label>
																</section>
															</div>
														</form>
													</div>
												</div>
											</article>	
										</div>
									</section>
								</div>
							</div>
						</div>
						<!-- end widget content -->
						
					</div>
					<!-- end widget div -->
				</div>
				<div class="well">
					<div class="row">
						<section>
							<div class="col-xs-9 col-sm-6 col-md-6 col-lg-6">
								<label class="input col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" placeholder="Nuevo grupo" id="grupo" class="form-control">
								</label>
							</div>
							<div class="col-xs-3 col-sm-6 col-md-6 col-lg-6  text-right">
								
								<button class="btn btn-success col-xs-12 col-sm-12 col-md-12 col-lg-12" onclick="new_grupo()" id="anadir">
									<i class="fa fa-plus"></i> <span class="hidden-mobile">Crear</span>
								</button>
								
							</div>
						</section>
						
					</div>
					
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
<!-- END MAIN CONTENT -->
<!-- PAGE RELATED PLUGIN(S) -->
		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script src="/template/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
		<script src="/template/js/plugin/bootbox/bootbox.min.js"></script>
		<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
		<script src="/template/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
		<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
		<script type="text/javascript">
			function new_grupo()
			{
				var grupo=$("#grupo").val();
				if(grupo!="")
				{
					$.ajax({
						data: 'grupo='+grupo,
						type: "post",
						url: "add_grupo",
						success: function(){
								             alert('Se ha creado el grupo '+grupo);
								             location.reload();
								        }
					});
				}
			}
			function agregar_encuesta()
			{
				form1='	<div class="row">'
							+'<form class="smart-form" id="reporte-form" method="post">'
								+'<div class="row">'
									+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
										+'<label class="label">Nombre</label>'
										+'<label class="input">'
											+'<input type="text" placeholder="Nombre de la Encuesta" id="enc_nom">'
										+'</label>'
									+'</section>'
								+'</div>'
								+'<div class="row">'
									+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
										+'<label class="label">Descripcion</label>'
										+'<label class="textarea">'								
											+'<textarea rows="3" class="custom-scroll" id="desc_enc"></textarea>' 
										+'</label>'
									+'</section>'
								+'</div>'
								+'<div class="row">'
									+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
										+'<label class="label">Cantidad de preguntas</label>'
										+'<label class="input">'								
											+'<input type="number" id="preg_qty" min="1" max="30">' 
										+'</label>'
									+'</section>'
								+'</div>'
								+'<div class="row">'
									+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
										+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
										+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">'
											+'<a onclick="agregar_preguntas()" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12">Siguiente</a>'
										+'</div>'
									+'</section>'
								+'</div>'
							+'</form>'
						+'</div>';
				bootbox.dialog({
					message: form1,
					title: "Nueva Encuesta",
					className: "",
				});
			}
			function agregar_preguntas()
			{
				var nom=$("#enc_nom").val();
				var qty=$("#preg_qty").val();
				var desc=$("#desc_enc").val();
				if(nom=="")
				{
					alert("El campo nombre es requerido")
				}
				else
				{
					if(qty<1||qty>30)
					{
						alert("La cantidad de preguntas debe de estar entre 1 y 30")
					}
					else
					{
						window.location.href="crear_encuesta?nombre="+nom+"&qty="+qty+"&desc="+desc;
					}
				}
			}
			function estatus_encuesta(tipo,id)
			{
				if (tipo==1){
					bootbox.dialog({
						message: "¿Seguro que desea dar de alta esta encuesta?",
						title: "Activar",
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
									
									var datos={'tipo':'ACT','id':id};
									$.ajax({
										data:{info:JSON.stringify(datos)},
								        type: "get",
								        url: "estado_encuesta",
								        success: function(){
								             alert('Se ha activado la encuesta');
								             location.reload();
								        }
									});
								}
							},
							danger: {
							label: "Cancelar!",
							className: "btn-danger",
							callback: function() {
									
								}
							}
						}
					})
				}
				else
				{
					bootbox.dialog({
						message: "¿Seguro que desea desactivar esta encuesta?",
						title: "Descativar",
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
									var datos={'tipo':'DES','id':id};
									$.ajax({
										data:{info:JSON.stringify(datos)},
								        type: "get",
								        url: "estado_encuesta",
								        success: function(){
								             alert('Se ha desactivado la encuesta');
								             location.reload();
								        }
									});
								}
							},
							danger: {
							label: "Cancelar!",
							className: "btn-danger",
							callback: function() {
									
								}
							}
						}
					})
				}
			}
			function estatus(tipo,id)
			{
				if (tipo==1){
					bootbox.dialog({
						message: "¿Seguro que desea dar de alta este cupon?",
						title: "Activar",
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
									
									var datos={'tipo':'ACT','id':id};
									$.ajax({
										data:{info:JSON.stringify(datos)},
								        type: "get",
								        url: "estado_cupon",
								        success: function(){
								             alert('Se ha activado el cupon');
								             location.reload();
								        }
									});
								}
							},
							danger: {
							label: "Cancelar!",
							className: "btn-danger",
							callback: function() {
									
								}
							}
						}
					})
				}
				else
				{
					bootbox.dialog({
						message: "¿Seguro que desea desactivar este cupon?",
						title: "Descativar",
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
									var datos={'tipo':'DES','id':id};
									$.ajax({
										data:{info:JSON.stringify(datos)},
								        type: "get",
								        url: "estado_cupon",
								        success: function(){
								             alert('Se ha desactivado el cupon');
								             location.reload();
								        }
									});
								}
							},
							danger: {
							label: "Cancelar!",
							className: "btn-danger",
							callback: function() {
									
								}
							}
						}
					})
				}
			}
			function estatus_file(tipo,id)
			{
				if (tipo==1){
					bootbox.dialog({
						message: "¿Seguro que desea activar este archivo?",
						title: "Activar",
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
									
									var datos={'tipo':'ACT','id':id};
									$.ajax({
										data:{info:JSON.stringify(datos)},
								        type: "get",
								        url: "estado_archivo",
								        success: function(){
								             alert('Se ha activado el archivo');
								             location.reload();
								        }
									});
								}
							},
							danger: {
							label: "Cancelar!",
							className: "btn-danger",
							callback: function() {
									
								}
							}
						}
					})
				}
				else
				{
					bootbox.dialog({
						message: "¿Seguro que desea desactivar este archivo?",
						title: "Descativar",
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
									var datos={'tipo':'DES','id':id};
									$.ajax({
										data:{info:JSON.stringify(datos)},
								        type: "get",
								        url: "estado_archivo",
								        success: function(){
								             alert('Se ha desactivado el archivo');
								             location.reload();
								        }
									});
								}
							},
							danger: {
							label: "Cancelar!",
							className: "btn-danger",
							callback: function() {
									
								}
							}
						}
					})
				}
			}
			function vermas_info(texto,autor,img,titulo)
			{
				bootbox.dialog({
					message: '<div style="text-align:justify;"><p>'+texto+'</p><p><strong>'+autor+'</strong></p><br><img src="'+img+'" width="150"></div>',
					title: ""+titulo+"",
					
				});
			}
			function ver_mas_news(texto,autor,img,titulo)
			{
				bootbox.dialog({
					message: '<div style="text-align:justify;"><p>'+texto+'</p><p><strong>'+autor+'</strong></p><br><img src="'+img+'" width="150"></div>',
					title: ""+titulo+"",
					
				});
			}
		</script>
		<script type="text/javascript">
			function delete_evento(id)
			{
				$.ajax({
					data: 'id='+id,
					url: "borrar_evento",
					type:"get",
					success:function(msg){
						alert("Se ha eiminado el evento con exito");
						location.reload();
					}
				});
			}
			function ver_eventos()
			{
				var form1='<div class="row">'//noticia
									+'<form class="smart-form" id="usrslct">'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="eventos_tbl">'
												
											+'</section>'
										+'</div>'
									+'</form>'
								+'</div>';
				bootbox.dialog({
					message: form1,
					title: "Eventos",
					className: "",
				});
				$.ajax({
					url: "ver_eventos",
					type:"get",
					success:function(msg){
						$("#eventos_tbl").html(msg);					}
				});
			}
			function asignar_cupon(id)
			{
				var usuario=$("#usrslct input[type='radio']:checked").val();
				alert(usuario);
				var datos={'cupon':id,'usuario':usuario};
				$.ajax({
					data:{info:JSON.stringify(datos)},
					url: "insert_cupon_usr",
					type:"get",
					success:function(msg){
						alert("Se le ha asignado este cupon al usuario")					}
				});
			}
			function asignar_form(id)
			{
				var form1='<div class="row">'//noticia
									+'<form class="smart-form" id="usrslct">'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Usuario</label>'
												+'<label class="input">'
													+'<input type="text" placeholder="Nombre de Usuario" onkeyup="buscar_usr()" onchange="buscar_usr()" id="nombre_frm">'
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="users">'
											
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
												+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">'
													+'<a class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" onclick="asignar_cupon('+id+')"> Asignar a usuario </a>'
												+'</div>'
											+'</section>'
										+'</div>'
									+'</form>'
								+'</div>';
				bootbox.dialog({
					message: form1,
					title: "Asignar cupones",
					className: "",
				});
			}
			function buscar_usr()
			{
				var nombre=$("#nombre_frm").val();
				$.ajax({
					data:"nombre="+nombre,
					url: "buscar_usr",
					type:"get",
					success:function(msg){
						$("#users").html(msg);					}
				});
			}
			function editar(tipo,id)
			{
				switch(tipo)
				{
					case 1:
						var form1='<div class="row">' 
							+'<form class="smart-form">'
								+'<div class="row">'
									+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
										+'<label class="label">Grupo</label>'
										+'<label class="select">'
											+'<select id="grupo_frm">'
												+'<option value="0">Selecciona el grupo</option>'
												+<?php
												 	for($o=0;$o<sizeof($grupos);$o++)
												 	{
												 		echo '\'<option value="'.$grupos[$o]->id.'">'.$grupos[$o]->descripcion.'</option>\'+';
												 	}
												 ?>
											'</select>' 
											+'<i></i>' 
										+'</label>'
									+'</section>'
								+'</div>'
								+'<div class="row">'
									+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
										+'<label class="label">Descripcion</label>'
										+'<label class="textarea">'								
											+'<textarea rows="3" class="custom-scroll" id="desc_frm"></textarea>' 
										+'</label>'
									+'</section>'
								+'</div>'
								+'<div class="row">'
									+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
										+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
										+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">'
											+'<a class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" onclick="editar_archivo('+tipo+','+id+')"> Editar archivo </a>'
										+'</div>'
									+'</section>'
								+'</div>'
							+'</form>'
						+'</div>';
						break;
					case 2:
						var form1='<div class="row">'//noticia
									+'<form class="smart-form" id="reporte-form" method="post" action="sube_noticia" enctype="multipart/form-data">'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Nombre</label>'
												+'<label class="input">'
													+'<input type="text" placeholder="Nombre"  id="grupo_frm">'
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Descripcion</label>'
												+'<label class="textarea">'								
													+'<textarea rows="3" class="custom-scroll" id="desc_frm"></textarea>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
												+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">'
													+'<a class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" onclick="editar_archivo('+tipo+','+id+')"> Editar informacion </a>'
												+'</div>'
											+'</section>'
										+'</div>'
									+'</form>'
								+'</div>';
						break;
					case 3:
						var form1='<div class="row">'//noticia
									+'<form class="smart-form" id="reporte-form" method="post" action="sube_noticia" enctype="multipart/form-data">'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Nombre</label>'
												+'<label class="input">'
													+'<input type="text" placeholder="Nombre"  id="grupo_frm">'
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Descripcion</label>'
												+'<label class="textarea">'								
													+'<textarea rows="3" class="custom-scroll" id="desc_frm"></textarea>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
												+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">'
													+'<a class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" onclick="editar_archivo('+tipo+','+id+')"> Editar noticia </a>'
												+'</div>'
											+'</section>'
										+'</div>'
									+'</form>'
								+'</div>';
						break;
					case 4:
						var form1='<div class="row">'//noticia
									+'<form class="smart-form" id="reporte-form" method="post" action="sube_noticia" enctype="multipart/form-data">'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Codigo</label>'
												+'<label class="input">'
													+'<input type="text" placeholder="Codigo"  id="grupo_frm">'
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Descripcion</label>'
												+'<label class="textarea">'								
													+'<textarea rows="3" class="custom-scroll" id="desc_frm"></textarea>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
												+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">'
													+'<a class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" onclick="editar_archivo('+tipo+','+id+')"> Editar cup&oacute;n </a>'
												+'</div>'
											+'</section>'
										+'</div>'
									+'</form>'
								+'</div>';
						break;
				}
				

				bootbox.dialog({
					message: form1,
					title: "Editar",
					className: "",
				});
				
			}
			function editar_archivo(tipo,id)
			{
				var grupo=$("#grupo_frm").val();
				var desc=$("#desc_frm").val();
				var datos={'grupo':grupo,'desc':desc,'tipo':tipo,'id':id};
				
				$.ajax({
					 data:{info:JSON.stringify(datos)},
			         type: "get",
			         url: "editar_archivo",
			         success: function(){
			              alert("Editado exitosamente");
			              location.reload();
			         }
				});	
			}
			function editar_evento(id)
			{
				var editarevento= '<div class="jarviswidget jarviswidget-color-blueDark">'
										+'<header>'
											+'<h2> Agregar Evento </h2>'
										+'</header>'
										+'<div>'
											+'<div class="widget-body">'
												+'<form id="add-event-form">'
													+'<fieldset>'
														+'<div class="form-group">'
															+'<label>Selecciona el icono del evento</label>'
															+'<div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">'
																+'<label class="btn btn-default active">'
																	+'<input type="radio" name="iconselect" id="icon-1" value="fa-info" checked>'
																	+'<i class="fa fa-info text-muted"></i> </label>'
																+'<label class="btn btn-default">'
																	+'<input type="radio" name="iconselect" id="icon-2" value="fa-warning">'
																	+'<i class="fa fa-warning text-muted"></i> </label>'
																+'<label class="btn btn-default">'
																	+'<input type="radio" name="iconselect" id="icon-3" value="fa-check">'
																	+'<i class="fa fa-check text-muted"></i> </label>'
																+'<label class="btn btn-default">'
																	+'<input type="radio" name="iconselect" id="icon-4" value="fa-user">'
																	+'<i class="fa fa-user text-muted"></i> </label>'
																+'<label class="btn btn-default">'
																	+'<input type="radio" name="iconselect" id="icon-5" value="fa-lock">'
																	+'<i class="fa fa-lock text-muted"></i> </label>'
																+'<label class="btn btn-default">'
																	+'<input type="radio" name="iconselect" id="icon-6" value="fa-clock-o">'
																	+'<i class="fa fa-clock-o text-muted"></i> </label>'
															+'</div>'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Titulo del Evento</label>'
															+'<input class="form-control"  id="title_ev" name="title" maxlength="40" type="text" placeholder="Titulo del Evento">'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Descripcion del Evento</label>'
															+'<textarea class="form-control" placeholder="Por favor sea breve" rows="3" maxlength="40" id="description_ev"></textarea>'
															+'<p class="note">Tama&ntilde;o maximo 40 caracteres</p>'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Lugar del Evento</label>'
															+'<input class="form-control"  id="title_ev" name="title" maxlength="40" type="text" placeholder="Titulo del Evento">'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Costo del Evento</label>'
															+'<input class="form-control"  id="title_ev" name="title" maxlength="40" type="text" placeholder="Titulo del Evento">'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Direccion</label>'
															+'<textarea class="form-control" placeholder="Por favor sea breve" rows="3" maxlength="40" id="description_ev"></textarea>'
															+'<p class="note">Tama&ntilde;o maximo 40 caracteres</p>'
														+'</div>'
														+'<div class="form-group">'
															+'<label>URL del mapa</label>'
															+'<input class="form-control"  id="title_ev" name="title" maxlength="40" type="text" placeholder="Titulo del Evento">'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Observaciones</label>'
															+'<textarea class="form-control" placeholder="Por favor sea breve" rows="3" maxlength="40" id="description_ev"></textarea>'
															+'<p class="note">Tama&ntilde;o maximo 40 caracteres</p>'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Selecciona el color del evento</label>'
															+'<div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">'
																+'<label class="btn bg-color-darken active">'
																	+'<input type="radio" name="priority" id="option1" value="bg-color-darken txt-color-white" checked>'
																	+'<i class="fa fa-check txt-color-white"></i> </label>'
																+'<label class="btn bg-color-blue">'
																	+'<input type="radio" name="priority" id="option2" value="bg-color-blue txt-color-white">'
																	+'<i class="fa fa-check txt-color-white"></i> </label>'
																+'<label class="btn bg-color-orange">'
																	+'<input type="radio" name="priority+" id="option3" value="bg-color-orange txt-color-white">'
																	+'<i class="fa fa-check txt-color-white"></i> </label>'
																+'<label class="btn bg-color-greenLight">'
																	+'<input type="radio" name="priority" id="option4" value="bg-color-greenLight txt-color-white">'
																	+'<i class="fa fa-check txt-color-white"></i> </label>'
																+'<label class="btn bg-color-blueLight">'
																	+'<input type="radio" name="priority" id="option5" value="bg-color-blueLight txt-color-white">'
																	+'<i class="fa fa-check txt-color-white"></i> </label>'
																+'<label class="btn bg-color-red">'
																	+'<input type="radio" name="priority" id="option6" value="bg-color-red txt-color-white">'
																	+'<i class="fa fa-check txt-color-white"></i> </label>'
															+'</div>'
														+'</div>'
														+'<div class="row">'
															+'<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">'
																+'<section class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">'
																	+'<label class="input"> <i class="icon-append fa fa-calendar"></i>'
																		+'<input type="text" name="startdate" id="startdate" placeholder="Expected start date">'
																	+'</label>'
																+'</section>'
																+'<section class="col col-lg-3 col-md-3 col-sm-3 col-xs-6">'
																	+'<label class="select">'
																		+'<select id="hora_ini">'
																			+'<option value="none">Hora</option>'
																			+'<option value="00">00</option>'
																			+'<option value="01">01</option>'
																			+'<option value="02">02</option>'
																			+'<option value="03">03</option>'
																			+'<option value="04">04</option>'
																			+'<option value="05">05</option>'
																			+'<option value="06">06</option>'
																			+'<option value="07">07</option>'
																			+'<option value="08">08</option>'
																			+'<option value="09">09</option>'
																			+'<option value="10">10</option>'
																			+'<option value="11">11</option>'
																			+'<option value="12">12</option>'
																			+'<option value="13">13</option>'
																			+'<option value="14">14</option>'
																			+'<option value="15">15</option>'
																			+'<option value="16">16</option>'
																			+'<option value="17">17</option>'
																			+'<option value="18">18</option>'
																			+'<option value="19">19</option>'
																			+'<option value="20">20</option>'
																			+'<option value="21">21</option>'
																			+'<option value="22">22</option>'
																			+'<option value="23">23</option>'
																		+'</select> <i></i> </label>'
																+'</section>'
																+'<section class="col col-lg-3 col-md-3 col-sm-3 col-xs-6">'
																	+'<label class="select">'
																		+'<select id="minuto_ini">'
																			+'<option value="none">Minuto</option>'
																			+'<option value="00">00</option>'
																			+'<option value="01">01</option>'
																			+'<option value="02">02</option>'
																			+'<option value="03">03</option>'
																			+'<option value="04">04</option>'
																			+'<option value="05">05</option>'
																			+'<option value="06">06</option>'
																			+'<option value="07">07</option>'
																			+'<option value="08">08</option>'
																			+'<option value="09">09</option>'
																			+'<option value="10">10</option>'
																			+'<option value="11">11</option>'
																			+'<option value="12">12</option>'
																			+'<option value="13">13</option>'
																			+'<option value="14">14</option>'
																			+'<option value="15">15</option>'
																			+'<option value="16">16</option>'
																			+'<option value="17">17</option>'
																			+'<option value="18">18</option>'
																			+'<option value="19">19</option>'
																			+'<option value="20">20</option>'
																			+'<option value="21">21</option>'
																			+'<option value="22">22</option>'
																			+'<option value="23">23</option>'
																			+'<option value="24">24</option>'
																			+'<option value="25">25</option>'
																			+'<option value="26">26</option>'																			+'<option value="23">23</option>'
																			+'<option value="27">27</option>'
																			+'<option value="28">28</option>'
																			+'<option value="29">29</option>'
																			+'<option value="30">30</option>'
																			+'<option value="31">31</option>'
																			+'<option value="32">32</option>'
																			+'<option value="33">33</option>'
																			+'<option value="34">34</option>'
																			+'<option value="35">35</option>'
																			+'<option value="36">36</option>'
																			+'<option value="37">37</option>'
																			+'<option value="38">38</option>'
																			+'<option value="39">39</option>'
																			+'<option value="40">40</option>'
																			+'<option value="41">41</option>'
																			+'<option value="42">42</option>'
																			+'<option value="43">43</option>'
																			+'<option value="44">44</option>'
																			+'<option value="45">45</option>'
																			+'<option value="46">46</option>'																			+'<option value="23">23</option>'
																			+'<option value="47">47</option>'
																			+'<option value="48">48</option>'
																			+'<option value="49">49</option>'
																			+'<option value="50">50</option>'
																			+'<option value="51">51</option>'
																			+'<option value="52">52</option>'
																			+'<option value="53">53</option>'
																			+'<option value="54">54</option>'
																			+'<option value="55">55</option>'
																			+'<option value="56">56</option>'																			+'<option value="23">23</option>'
																			+'<option value="57">57</option>'
																			+'<option value="58">58</option>'
																			+'<option value="59">59</option>'
																			
																		+'</select> <i></i> </label>'
																+'</section>'
															+'</div>'
														+'</div>'
														+'<div class="row">'
															+'<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">'
																+'<section class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">'
																	+'<label class="input"> <i class="icon-append fa fa-calendar"></i>'
																		+'<input type="text" name="finishdate" id="finishdate" placeholder="Expected finish date">'
																	+'</label>'
																+'</section>'
																+'<section class="col col-lg-3 col-md-3 col-sm-3 col-xs-6">'
																	+'<label class="select">'
																		+'<select id="hora_fin">'
																			+'<option value="none">Hora</option>'
																			+'<option value="00">00</option>'
																			+'<option value="01">01</option>'
																			+'<option value="02">02</option>'
																			+'<option value="03">03</option>'
																			+'<option value="04">04</option>'
																			+'<option value="05">05</option>'
																			+'<option value="06">06</option>'
																			+'<option value="07">07</option>'
																			+'<option value="08">08</option>'
																			+'<option value="09">09</option>'
																			+'<option value="10">10</option>'
																			+'<option value="11">11</option>'
																			+'<option value="12">12</option>'
																			+'<option value="13">13</option>'
																			+'<option value="14">14</option>'
																			+'<option value="15">15</option>'
																			+'<option value="16">16</option>'
																			+'<option value="17">17</option>'
																			+'<option value="18">18</option>'
																			+'<option value="19">19</option>'
																			+'<option value="20">20</option>'
																			+'<option value="21">21</option>'
																			+'<option value="22">22</option>'
																			+'<option value="23">23</option>'
																		+'</select> <i></i> </label>'
																+'</section>'
																+'<section class="col col-lg-3 col-md-3 col-sm-3 col-xs-6">'
																	+'<label class="select">'
																		+'<select id="minuto_fin">'
																			+'<option value="none">Minuto</option>'
																			+'<option value="00">00</option>'
																			+'<option value="01">01</option>'
																			+'<option value="02">02</option>'
																			+'<option value="03">03</option>'
																			+'<option value="04">04</option>'
																			+'<option value="05">05</option>'
																			+'<option value="06">06</option>'
																			+'<option value="07">07</option>'
																			+'<option value="08">08</option>'
																			+'<option value="09">09</option>'
																			+'<option value="10">10</option>'
																			+'<option value="11">11</option>'
																			+'<option value="12">12</option>'
																			+'<option value="13">13</option>'
																			+'<option value="14">14</option>'
																			+'<option value="15">15</option>'
																			+'<option value="16">16</option>'
																			+'<option value="17">17</option>'
																			+'<option value="18">18</option>'
																			+'<option value="19">19</option>'
																			+'<option value="20">20</option>'
																			+'<option value="21">21</option>'
																			+'<option value="22">22</option>'
																			+'<option value="23">23</option>'
																			+'<option value="24">24</option>'
																			+'<option value="25">25</option>'
																			+'<option value="26">26</option>'																			+'<option value="23">23</option>'
																			+'<option value="27">27</option>'
																			+'<option value="28">28</option>'
																			+'<option value="29">29</option>'
																			+'<option value="30">30</option>'
																			+'<option value="31">31</option>'
																			+'<option value="32">32</option>'
																			+'<option value="33">33</option>'
																			+'<option value="34">34</option>'
																			+'<option value="35">35</option>'
																			+'<option value="36">36</option>'
																			+'<option value="37">37</option>'
																			+'<option value="38">38</option>'
																			+'<option value="39">39</option>'
																			+'<option value="40">40</option>'
																			+'<option value="41">41</option>'
																			+'<option value="42">42</option>'
																			+'<option value="43">43</option>'
																			+'<option value="44">44</option>'
																			+'<option value="45">45</option>'
																			+'<option value="46">46</option>'																			+'<option value="23">23</option>'
																			+'<option value="47">47</option>'
																			+'<option value="48">48</option>'
																			+'<option value="49">49</option>'
																			+'<option value="50">50</option>'
																			+'<option value="51">51</option>'
																			+'<option value="52">52</option>'
																			+'<option value="53">53</option>'
																			+'<option value="54">54</option>'
																			+'<option value="55">55</option>'
																			+'<option value="56">56</option>'																			+'<option value="23">23</option>'
																			+'<option value="57">57</option>'
																			+'<option value="58">58</option>'
																			+'<option value="59">59</option>'
																			
																		+'</select> <i></i> </label>'
																+'</section>'
															+'</div>'
														+'</div>'
													+'</fieldset>'
													
													+'<div class="form-actions">'
														+'<div class="row">'
															+'<div class="col-md-12">'
																+'<button class="btn btn-default" type="button" id="new_evento" onclick="update_evento('+id+')" >'
																	+'Editar'
																+'</button>'
															+'</div>'
														+'</div>'
													+'</div>'
												+'</form>'
											+'</div>'
										+'</div>'
									
								+'</div>';
				bootbox.dialog({
					message: ''+editarevento+'',
					title: "Editar Evento",
					className: "",
				});
				$('#startdate').datepicker({
					dateFormat : 'dd-mm-yy',
					prevText : '<i class="fa fa-chevron-left"></i>',
					nextText : '<i class="fa fa-chevron-right"></i>',
					onSelect : function(selectedDate) {
						$('#finishdate').datepicker('option', 'minDate', selectedDate);
					}
				});
				
				$('#finishdate').datepicker({
					dateFormat : 'dd-mm-yy',
					prevText : '<i class="fa fa-chevron-left"></i>',
					nextText : '<i class="fa fa-chevron-right"></i>',
					onSelect : function(selectedDate) {
						$('#startdate').datepicker('option', 'maxDate', selectedDate);
					}
				});
			}
			function update_evento(id)
			{
				if($('#icon-1').is(':checked'))
				{
					var tipo=1;
				}
				if($('#icon-2').is(':checked'))
				{
					var tipo=3;
				}
				if($('#icon-3').is(':checked'))
				{
					var tipo=5;
				}
				if($('#icon-4').is(':checked'))
				{
					var tipo=4;
				}
				if($('#icon-5').is(':checked'))
				{
					var tipo=2;
				}
				if($('#icon-6').is(':checked'))
				{
					var tipo=6;
				}
				if($('#option1').is(':checked'))
				{
					var color=1;
				}
				if($('#option2').is(':checked'))
				{
					var color=2;
				}
				if($('#option3').is(':checked'))
				{
					var color=3;
				}
				if($('#option4').is(':checked'))
				{
					var color=5;
				}
				if($('#option5').is(':checked'))
				{
					var color=6;
				}
				if($('#option6').is(':checked'))
				{
					var color=4;
				}
				var nombre=$("#title_ev").val();
				var descripcion=$("#description_ev").val();
				var dia_ini=$("#startdate").val();
				var dia_fin=$("#finishdate").val();
				var hora_ini=$("#hora_ini").val();
				var hora_fin=$("#hora_fin").val();
				var minuto_ini=$("#minuto_ini").val();
				var minuto_fin=$("#minuto_fin").val();
				if(nombre=='')
				{
					alert('Campo nombre es requerido');
				}
				else
				{
					if(descripcion=='')
					{
						alert('Campo descripcion es requerido');
					}
					else
					{
						if(dia_ini==''||hora_ini=='none'||minuto_ini=='none')
						{
							alert('Inicio del evento no especificado');
						}
						else
						{
							if(dia_fin==''||hora_fin=='none'||minuto_fin=='none')
							{
								alert('Fin del evento no especificado');
							}
							else
							{
								if((dia_fin==dia_ini&&hora_ini>hora_fin)||(dia_fin==dia_ini&&hora_ini==hora_fin&&minuto_ini>minuto_fin))
								{
									alert('La hora de inicio no puede ser mayor que la hora de finalizacion');
								}
								else
								{
									var datos={'id':id,'tipo':tipo,'color':color,'nombre':nombre,'descripcion':descripcion,'dia_ini':dia_ini,'dia_fin':dia_fin,'hora_ini':hora_ini,'hora_fin':hora_fin,'minuto_ini':minuto_ini,'minuto_fin':minuto_fin};
									$.ajax({
										 data:{info:JSON.stringify(datos)},
								         type: "get",
								         url: "update_evento",
								         success: function(){
								              alert("Se edito el evento con exito");
								              location.reload();
								         }
									});
								}
							}
							
						}
					}
				}
				
			}
			function nuevo_archivo(tipo)
			{
				switch(tipo)
				{
					case 1: //presentaciones
						var form1='<div class="row">' 
									+'<form class="smart-form" id="reporte-form" method="post" action="sube_presentacion" enctype="multipart/form-data">'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Grupo</label>'
												+'<label class="select">'
													+'<select name="grupo_frm">'
														+'<option value="0">Selecciona el grupo</option>'
														+<?php
														 	for($o=0;$o<sizeof($grupos);$o++)
														 	{
														 		echo '\'<option value="'.$grupos[$o]->id.'">'.$grupos[$o]->descripcion.'</option>\'+';
														 	}
														 ?>
													'</select>' 
													+'<i></i>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Nombre de la presentacion</label>'
												+'<label class="input">'	
													+'<input name="nombre_publico" placeholder="Nombre" type="text" id="nombre_publico">'
												+'</label>'	
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Descripcion</label>'
												+'<label class="textarea">'								
													+'<textarea rows="3" class="custom-scroll" name="desc_frm"></textarea>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Archivo</label>'
												+'<div class="input input-file">'
													+'<span class="button">'
														+'<input id="file" onchange="this.parentNode.nextSibling.value = this.value" name="userfile" type="file">Buscar'
													+'</span>'
													+'<input name="file_nme" placeholder="Seleccione un archivo" readonly=""  type="text" id="file_frm">'
												+'</div>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_subir">'
												+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
												+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">'
													+'<input type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" id="boton_subir" value="Subir archivo">'
												+'</div>'
											+'</section>'
										+'</div>'
									+'</form>'
								+'</div>';
						break;
					case 2:
						var form1='<div class="row">' //videos
									+'<form class="smart-form" id="reporte-form" method="post" action="sube_video" enctype="multipart/form-data">'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Grupo</label>'
												+'<label class="select">'
													+'<select name="grupo_frm">'
														+'<option value="0">Selecciona el grupo</option>'
														+<?php
														 	for($o=0;$o<sizeof($grupos);$o++)
														 	{
														 		echo '\'<option value="'.$grupos[$o]->id.'">'.$grupos[$o]->descripcion.'</option>\'+';
														 	}
														 ?>
													'</select>' 
													+'<i></i>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Nombre del video</label>'
												+'<label class="input">'	
													+'<input name="nombre_publico" placeholder="Nombre" type="text" id="nombre_publico">'
												+'</label>'	
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Descripcion</label>'
												+'<label class="textarea">'								
													+'<textarea rows="3" class="custom-scroll" name="desc_frm"></textarea>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Archivo</label>'
												+'<div class="input input-file">'
													+'<span class="button">'
														+'<input id="file" onchange="this.parentNode.nextSibling.value = this.value" name="userfile[]" type="file">Buscar'
													+'</span>'
													+'<input name="file_nme" placeholder="Seleccione un archivo" readonly=""  type="text" id="file_frm">'
												+'</div>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Imagen</label>'
												+'<div class="input input-file">' 
													+'<span class="button">'
														+'<input id="file" onchange="this.parentNode.nextSibling.value = this.value" name="userfile[]" type="file">Buscar'
													+'</span>'
													+'<input name="file_nme_2" placeholder="Seleccione una imagen para el video" readonly=""  type="text" id="file_frm_2">'
												+'</div>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_subir">'
												+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
												+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4" >'
													+'<input type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" id="boton_subir" value="Subir archivo">'
												+'</div>'
											+'</section>'
										+'</div>'
									+'</form>'
								+'</div>';
						break;
					case 3:
						var form1='<div class="row">'//noticia
									+'<form class="smart-form" id="reporte-form" method="post" action="sube_noticia" enctype="multipart/form-data">'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Nombre</label>'
												+'<label class="input">'
													+'<input type="text" placeholder="Nombre"  name="nombre_frm">'
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Descripcion</label>'
												+'<label class="textarea">'								
													+'<textarea rows="3" class="custom-scroll" name="desc_frm"></textarea>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Imagen</label>'
												+'<div class="input input-file">'
													+'<span class="button">'
														+'<input id="file" name="userfile" onchange="this.parentNode.nextSibling.value = this.value" type="file">Buscar'
													+'</span>'
													+'<input placeholder="Seleccione un archivo" readonly="" type="text" id="file_frm" name="file_nme">'
												+'</div>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_subir">'
												+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
												+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4" >'
													+'<input type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" id="boton_subir" value="Agregar noticia">'
												+'</div>'
											+'</section>'
										+'</div>'
									+'</form>'
								+'</div>';
						break;
					case 4: //ebook
						var form1='<div class="row">'
									+'<form class="smart-form" id="reporte-form" method="post" action="sube_ebook" enctype="multipart/form-data">'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Grupo</label>'
												+'<label class="select">'
													+'<select name="grupo_frm">'
														+'<option value="0">Selecciona el grupo</option>'
														+<?php
														 	for($o=0;$o<sizeof($grupos);$o++)
														 	{
														 		echo '\'<option value="'.$grupos[$o]->id.'">'.$grupos[$o]->descripcion.'</option>\'+';
														 	}
														 ?>
													'</select>' 
													+'<i></i>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Nombre del e-book</label>'
												+'<label class="input">'	
													+'<input name="nombre_publico" placeholder="Nombre" type="text" id="nombre_publico">'
												+'</label>'	
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Descripcion</label>'
												+'<label class="textarea">'								
													+'<textarea rows="3" class="custom-scroll" name="desc_frm"></textarea>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Archivo</label>'
												+'<div class="input input-file">'
													+'<span class="button">'
														+'<input id="file" onchange="this.parentNode.nextSibling.value = this.value" name="userfile[]" type="file">Buscar'
													+'</span>'
													+'<input name="file_nme" placeholder="Seleccione un archivo" readonly=""  type="text" id="file_frm">'
												+'</div>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Imagen</label>'
												+'<div class="input input-file">'
													+'<span class="button">'
														+'<input id="file" onchange="this.parentNode.nextSibling.value = this.value" name="userfile[]" type="file">Buscar'
													+'</span>'
													+'<input name="file_nme_2" placeholder="Seleccione una imagen para el e-book" readonly=""  type="text" id="file_frm_2">'
												+'</div>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_subir">'
												+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
												+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4" >'
													+'<input type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" id="boton_subir" value="Subir archivo">'
												+'</div>'
											+'</section>'
										+'</div>'
									+'</form>'
								+'</div>';
						break;
					case 5: //descargas
						var form1='<div class="row">' 
									+'<form class="smart-form" id="reporte-form" method="post" action="sube_archivo" enctype="multipart/form-data">'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Grupo</label>'
												+'<label class="select">'
													+'<select name="grupo_frm">'
														+'<option value="0">Selecciona el grupo</option>'
														+<?php
														 	for($o=0;$o<sizeof($grupos);$o++)
														 	{
														 		echo '\'<option value="'.$grupos[$o]->id.'">'.$grupos[$o]->descripcion.'</option>\'+';
														 	}
														 ?>
													'</select>' 
													+'<i></i>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Nombre del archivo</label>'
												+'<label class="input">'	
													+'<input name="nombre_publico" placeholder="Nombre" type="text" id="nombre_publico">'
												+'</label>'	
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Descripcion</label>'
												+'<label class="textarea">'								
													+'<textarea rows="3" class="custom-scroll" name="desc_frm"></textarea>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Archivo</label>'
												+'<div class="input input-file">'
													+'<span class="button">'
														+'<input id="file" onchange="this.parentNode.nextSibling.value = this.value" name="userfile" type="file">Buscar'
													+'</span>'
													+'<input name="file_nme" placeholder="Seleccione un archivo" readonly=""  type="text" id="file_frm">'
												+'</div>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_subir">'
												+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
												+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4" >'
													+'<input type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" id="boton_subir" value="Subir archivo">'
												+'</div>'
											+'</section>'
										+'</div>'
									+'</form>'
								+'</div>';
						break; 
					case 6: //info
						var form1='<div class="row">'
									+'<form class="smart-form" id="reporte-form" method="post" action="sube_info" enctype="multipart/form-data">'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Nombre</label>'
												+'<label class="input">'
													+'<input type="text" placeholder="Nombre"  name="nombre_frm">'
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Descripcion</label>'
												+'<label class="textarea">'								
													+'<textarea rows="3" class="custom-scroll" name="desc_frm"></textarea>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Imagen</label>'
												+'<div class="input input-file">'
													+'<span class="button">'
														+'<input id="file" name="userfile" onchange="this.parentNode.nextSibling.value = this.value" type="file">Buscar'
													+'</span>'
													+'<input placeholder="Seleccione un archivo" readonly="" type="text" id="file_frm" name="file_nme">'
												+'</div>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_subir">'
												+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
												+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4" >'
													+'<input type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" id="boton_subir" value="Agregar informacion">'
												+'</div>'
											+'</section>'
										+'</div>'
									+'</form>'
								+'</div>';
						break;
					case 7:
						var form1='<div class="row">' //video_youtube
									+'<form class="smart-form" id="reporte-form" method="post" action="sube_video_youtube" enctype="multipart/form-data">'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Grupo</label>'
												+'<label class="select">'
													+'<select name="grupo_frm">'
														+'<option value="0">Selecciona el grupo</option>'
														+<?php
														 	for($o=0;$o<sizeof($grupos);$o++)
														 	{
														 		echo '\'<option value="'.$grupos[$o]->id.'">'.$grupos[$o]->descripcion.'</option>\'+';
														 	}
														 ?>
													'</select>' 
													+'<i></i>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Nombre del video</label>'
												+'<label class="input">'	
													+'<input name="nombre_publico" placeholder="Nombre" type="text" id="nombre_publico">'
												+'</label>'	
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Descripcion</label>'
												+'<label class="textarea">'								
													+'<textarea rows="3" class="custom-scroll" name="desc_frm"></textarea>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">URL del Video</label>'
												+'<label class="input">'	
													+'<input name="url" placeholder="http://youtube.com/..." type="text" id="url">'
												+'</label>'	
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Imagen</label>'
												+'<div class="input input-file">' 
													+'<span class="button">'
														+'<input id="file" onchange="this.parentNode.nextSibling.value = this.value" name="userfile" type="file">Buscar'
													+'</span>'
													+'<input name="file_nme_2" placeholder="Seleccione una imagen para el video" readonly=""  type="text" id="file_frm_2">'
												+'</div>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_subir">'
												+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
												+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4" >'
													+'<input type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" id="boton_subir" value="Subir video">'
												+'</div>'
											+'</section>'
										+'</div>'
									+'</form>'
								+'</div>';
						break;
							
					default:
				}
				
				bootbox.dialog({
					message: form1,
					title: "Cargar archivo",
					className: "",
				});
				
			}
			function nuevo_evento()
			{
				var nuevoevento= '<div class="jarviswidget jarviswidget-color-blueDark">'
										+'<header>'
											+'<h2> Agregar Evento </h2>'
										+'</header>'
										+'<div>'
											+'<div class="widget-body">'
												+'<form id="add-event-form">'
													+'<fieldset>'
														+'<div class="form-group">'
															+'<label>Selecciona el icono del evento</label>'
															+'<div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">'
																+'<label class="btn btn-default active">'
																	+'<input type="radio" name="iconselect" id="icon-1" value="fa-info" checked>'
																	+'<i class="fa fa-info text-muted"></i> </label>'
																+'<label class="btn btn-default">'
																	+'<input type="radio" name="iconselect" id="icon-2" value="fa-warning">'
																	+'<i class="fa fa-warning text-muted"></i> </label>'
																+'<label class="btn btn-default">'
																	+'<input type="radio" name="iconselect" id="icon-3" value="fa-check">'
																	+'<i class="fa fa-check text-muted"></i> </label>'
																+'<label class="btn btn-default">'
																	+'<input type="radio" name="iconselect" id="icon-4" value="fa-user">'
																	+'<i class="fa fa-user text-muted"></i> </label>'
																+'<label class="btn btn-default">'
																	+'<input type="radio" name="iconselect" id="icon-5" value="fa-lock">'
																	+'<i class="fa fa-lock text-muted"></i> </label>'
																+'<label class="btn btn-default">'
																	+'<input type="radio" name="iconselect" id="icon-6" value="fa-clock-o">'
																	+'<i class="fa fa-clock-o text-muted"></i> </label>'
															+'</div>'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Titulo del Evento</label>'
															+'<input class="form-control"  id="title_ev" name="title" type="text" placeholder="Titulo del Evento">'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Descripcion del Evento</label>'
															+'<textarea class="form-control" placeholder="Por favor sea breve" rows="3" maxlength="140" id="description_ev"></textarea>'
															+'<p class="note">Tama&ntilde;o maximo 140 caracteres</p>'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Lugar del Evento</label>'
															+'<input class="form-control"  id="lugar_ev" name="title" maxlength="40" type="text" placeholder="Lugar del Evento">'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Costo del Evento</label>'
															+'<input class="form-control"  id="costo_ev" name="title" maxlength="40" type="text" placeholder="Costo del Evento">'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Direccion</label>'
															+'<textarea class="form-control" placeholder="Direccion" rows="3" id="direccion_ev"></textarea>'
														+'</div>'
														+'<div class="form-group">'
															+'<label>URL del mapa</label>'
															+'<input class="form-control"  id="url_ev" name="title" maxlength="40" type="text" placeholder="http://maps.google.com...">'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Observaciones</label>'
															+'<textarea class="form-control" placeholder="Por favor sea breve" rows="3" maxlength="50" id="observacion_ev"></textarea>'
															+'<p class="note">Tama&ntilde;o maximo 50 caracteres</p>'
														+'</div>'
														+'<div class="form-group">'
															+'<label>Selecciona el color del evento</label>'
															+'<div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">'
																+'<label class="btn bg-color-darken active">'
																	+'<input type="radio" name="priority" id="option1" value="bg-color-darken txt-color-white" checked>'
																	+'<i class="fa fa-check txt-color-white"></i> </label>'
																+'<label class="btn bg-color-blue">'
																	+'<input type="radio" name="priority" id="option2" value="bg-color-blue txt-color-white">'
																	+'<i class="fa fa-check txt-color-white"></i> </label>'
																+'<label class="btn bg-color-orange">'
																	+'<input type="radio" name="priority+" id="option3" value="bg-color-orange txt-color-white">'
																	+'<i class="fa fa-check txt-color-white"></i> </label>'
																+'<label class="btn bg-color-greenLight">'
																	+'<input type="radio" name="priority" id="option4" value="bg-color-greenLight txt-color-white">'
																	+'<i class="fa fa-check txt-color-white"></i> </label>'
																+'<label class="btn bg-color-blueLight">'
																	+'<input type="radio" name="priority" id="option5" value="bg-color-blueLight txt-color-white">'
																	+'<i class="fa fa-check txt-color-white"></i> </label>'
																+'<label class="btn bg-color-red">'
																	+'<input type="radio" name="priority" id="option6" value="bg-color-red txt-color-white">'
																	+'<i class="fa fa-check txt-color-white"></i> </label>'
															+'</div>'
														+'</div>'
														+'<div class="row">'
															+'<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">'
																+'<section class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">'
																	+'<label class="input"> <i class="icon-append fa fa-calendar"></i>'
																		+'<input type="text" name="startdate" id="startdate" placeholder="Expected start date">'
																	+'</label>'
																+'</section>'
																+'<section class="col col-lg-3 col-md-3 col-sm-3 col-xs-6">'
																	+'<label class="select">'
																		+'<select id="hora_ini">'
																			+'<option value="none">Hora</option>'
																			+'<option value="00">00</option>'
																			+'<option value="01">01</option>'
																			+'<option value="02">02</option>'
																			+'<option value="03">03</option>'
																			+'<option value="04">04</option>'
																			+'<option value="05">05</option>'
																			+'<option value="06">06</option>'
																			+'<option value="07">07</option>'
																			+'<option value="08">08</option>'
																			+'<option value="09">09</option>'
																			+'<option value="10">10</option>'
																			+'<option value="11">11</option>'
																			+'<option value="12">12</option>'
																			+'<option value="13">13</option>'
																			+'<option value="14">14</option>'
																			+'<option value="15">15</option>'
																			+'<option value="16">16</option>'
																			+'<option value="17">17</option>'
																			+'<option value="18">18</option>'
																			+'<option value="19">19</option>'
																			+'<option value="20">20</option>'
																			+'<option value="21">21</option>'
																			+'<option value="22">22</option>'
																			+'<option value="23">23</option>'
																		+'</select> <i></i> </label>'
																+'</section>'
																+'<section class="col col-lg-3 col-md-3 col-sm-3 col-xs-6">'
																	+'<label class="select">'
																		+'<select id="minuto_ini">'
																			+'<option value="none">Minuto</option>'
																			+'<option value="00">00</option>'
																			+'<option value="01">01</option>'
																			+'<option value="02">02</option>'
																			+'<option value="03">03</option>'
																			+'<option value="04">04</option>'
																			+'<option value="05">05</option>'
																			+'<option value="06">06</option>'
																			+'<option value="07">07</option>'
																			+'<option value="08">08</option>'
																			+'<option value="09">09</option>'
																			+'<option value="10">10</option>'
																			+'<option value="11">11</option>'
																			+'<option value="12">12</option>'
																			+'<option value="13">13</option>'
																			+'<option value="14">14</option>'
																			+'<option value="15">15</option>'
																			+'<option value="16">16</option>'
																			+'<option value="17">17</option>'
																			+'<option value="18">18</option>'
																			+'<option value="19">19</option>'
																			+'<option value="20">20</option>'
																			+'<option value="21">21</option>'
																			+'<option value="22">22</option>'
																			+'<option value="23">23</option>'
																			+'<option value="24">24</option>'
																			+'<option value="25">25</option>'
																			+'<option value="26">26</option>'																			+'<option value="23">23</option>'
																			+'<option value="27">27</option>'
																			+'<option value="28">28</option>'
																			+'<option value="29">29</option>'
																			+'<option value="30">30</option>'
																			+'<option value="31">31</option>'
																			+'<option value="32">32</option>'
																			+'<option value="33">33</option>'
																			+'<option value="34">34</option>'
																			+'<option value="35">35</option>'
																			+'<option value="36">36</option>'
																			+'<option value="37">37</option>'
																			+'<option value="38">38</option>'
																			+'<option value="39">39</option>'
																			+'<option value="40">40</option>'
																			+'<option value="41">41</option>'
																			+'<option value="42">42</option>'
																			+'<option value="43">43</option>'
																			+'<option value="44">44</option>'
																			+'<option value="45">45</option>'
																			+'<option value="46">46</option>'																			+'<option value="23">23</option>'
																			+'<option value="47">47</option>'
																			+'<option value="48">48</option>'
																			+'<option value="49">49</option>'
																			+'<option value="50">50</option>'
																			+'<option value="51">51</option>'
																			+'<option value="52">52</option>'
																			+'<option value="53">53</option>'
																			+'<option value="54">54</option>'
																			+'<option value="55">55</option>'
																			+'<option value="56">56</option>'																			+'<option value="23">23</option>'
																			+'<option value="57">57</option>'
																			+'<option value="58">58</option>'
																			+'<option value="59">59</option>'
																			
																		+'</select> <i></i> </label>'
																+'</section>'
															+'</div>'
														+'</div>'
														+'<div class="row">'
															+'<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">'
																+'<section class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">'
																	+'<label class="input"> <i class="icon-append fa fa-calendar"></i>'
																		+'<input type="text" name="finishdate" id="finishdate" placeholder="Expected finish date">'
																	+'</label>'
																+'</section>'
																+'<section class="col col-lg-3 col-md-3 col-sm-3 col-xs-6">'
																	+'<label class="select">'
																		+'<select id="hora_fin">'
																			+'<option value="none">Hora</option>'
																			+'<option value="00">00</option>'
																			+'<option value="01">01</option>'
																			+'<option value="02">02</option>'
																			+'<option value="03">03</option>'
																			+'<option value="04">04</option>'
																			+'<option value="05">05</option>'
																			+'<option value="06">06</option>'
																			+'<option value="07">07</option>'
																			+'<option value="08">08</option>'
																			+'<option value="09">09</option>'
																			+'<option value="10">10</option>'
																			+'<option value="11">11</option>'
																			+'<option value="12">12</option>'
																			+'<option value="13">13</option>'
																			+'<option value="14">14</option>'
																			+'<option value="15">15</option>'
																			+'<option value="16">16</option>'
																			+'<option value="17">17</option>'
																			+'<option value="18">18</option>'
																			+'<option value="19">19</option>'
																			+'<option value="20">20</option>'
																			+'<option value="21">21</option>'
																			+'<option value="22">22</option>'
																			+'<option value="23">23</option>'
																		+'</select> <i></i> </label>'
																+'</section>'
																+'<section class="col col-lg-3 col-md-3 col-sm-3 col-xs-6">'
																	+'<label class="select">'
																		+'<select id="minuto_fin">'
																			+'<option value="none">Minuto</option>'
																			+'<option value="00">00</option>'
																			+'<option value="01">01</option>'
																			+'<option value="02">02</option>'
																			+'<option value="03">03</option>'
																			+'<option value="04">04</option>'
																			+'<option value="05">05</option>'
																			+'<option value="06">06</option>'
																			+'<option value="07">07</option>'
																			+'<option value="08">08</option>'
																			+'<option value="09">09</option>'
																			+'<option value="10">10</option>'
																			+'<option value="11">11</option>'
																			+'<option value="12">12</option>'
																			+'<option value="13">13</option>'
																			+'<option value="14">14</option>'
																			+'<option value="15">15</option>'
																			+'<option value="16">16</option>'
																			+'<option value="17">17</option>'
																			+'<option value="18">18</option>'
																			+'<option value="19">19</option>'
																			+'<option value="20">20</option>'
																			+'<option value="21">21</option>'
																			+'<option value="22">22</option>'
																			+'<option value="23">23</option>'
																			+'<option value="24">24</option>'
																			+'<option value="25">25</option>'
																			+'<option value="26">26</option>'																			+'<option value="23">23</option>'
																			+'<option value="27">27</option>'
																			+'<option value="28">28</option>'
																			+'<option value="29">29</option>'
																			+'<option value="30">30</option>'
																			+'<option value="31">31</option>'
																			+'<option value="32">32</option>'
																			+'<option value="33">33</option>'
																			+'<option value="34">34</option>'
																			+'<option value="35">35</option>'
																			+'<option value="36">36</option>'
																			+'<option value="37">37</option>'
																			+'<option value="38">38</option>'
																			+'<option value="39">39</option>'
																			+'<option value="40">40</option>'
																			+'<option value="41">41</option>'
																			+'<option value="42">42</option>'
																			+'<option value="43">43</option>'
																			+'<option value="44">44</option>'
																			+'<option value="45">45</option>'
																			+'<option value="46">46</option>'																			+'<option value="23">23</option>'
																			+'<option value="47">47</option>'
																			+'<option value="48">48</option>'
																			+'<option value="49">49</option>'
																			+'<option value="50">50</option>'
																			+'<option value="51">51</option>'
																			+'<option value="52">52</option>'
																			+'<option value="53">53</option>'
																			+'<option value="54">54</option>'
																			+'<option value="55">55</option>'
																			+'<option value="56">56</option>'																			+'<option value="23">23</option>'
																			+'<option value="57">57</option>'
																			+'<option value="58">58</option>'
																			+'<option value="59">59</option>'
																			
																		+'</select> <i></i> </label>'
																+'</section>'
															+'</div>'
														+'</div>'
													+'</fieldset>'
													
													+'<div class="form-actions">'
														+'<div class="row">'
															+'<div class="col-md-12">'
																+'<button class="btn btn-default" type="button" id="new_evento" onclick="agregar_evento()" >'
																	+'A&ntilde;adir evento'
																+'</button>'
															+'</div>'
														+'</div>'
													+'</div>'
												+'</form>'
											+'</div>'
										+'</div>'
									
								+'</div>';
				bootbox.dialog({
					message: ''+nuevoevento+'',
					title: "Nuevo Evento",
					className: "",
				});
				$('#startdate').datepicker({
					dateFormat : 'dd-mm-yy',
					prevText : '<i class="fa fa-chevron-left"></i>',
					nextText : '<i class="fa fa-chevron-right"></i>',
					onSelect : function(selectedDate) {
						$('#finishdate').datepicker('option', 'minDate', selectedDate);
					}
				});
				
				$('#finishdate').datepicker({
					dateFormat : 'dd-mm-yy',
					prevText : '<i class="fa fa-chevron-left"></i>',
					nextText : '<i class="fa fa-chevron-right"></i>',
					onSelect : function(selectedDate) {
						$('#startdate').datepicker('option', 'maxDate', selectedDate);
					}
				});
			}
			
			function delete_file(id,file)
			{
				if (confirm('¿Esta seguro de borrar este archivo?')) {
					var datos={'id':id,'file':file};
					$.ajax({
						data:{info:JSON.stringify(datos)},
				        type: "get",
				        url: "borrar_archivo",
				        success: function(){
				             alert("Se ha eliminado el archivo");
				        }
					});
				    // Save it!
				} else {
				    // Do nothing!
				}
				
				
			}
			function delete_new(id)
			{
				if (confirm('¿Esta seguro de borrar esta noticia?')) {
			
					$.ajax({
						data:'id='+id,
				        type: "get",
				        url: "borrar_noticia",
				        success: function(){
				             alert("Se ha eliminado la noticia");
				        }
					});
				    // Save it!
				} else {
				    // Do nothing!
				}
			}
			function delete_info(id)
			{
				if (confirm('¿Esta seguro de borrar esta informacion?')) {
			
					$.ajax({
						data:'id='+id,
				        type: "get",
				        url: "borrar_info",
				        success: function(){
				             alert("Se ha eliminado la informacion");
				        }
					});
				    // Save it!
				} else {
				    // Do nothing!
				}
			}
			function delete_event()
			{
			}
			function delete_cupon(id)
			{
				if (confirm('¿Esta seguro de borrar este cupon?')) {
			
					$.ajax({
						data:'id='+id,
				        type: "get",
				        url: "borrar_cupon",
				        success: function(){
				             alert("Se ha eliminado el cupon");
				             location.reload();
				        }
					});
				    // Save it!
				} else {
				    // Do nothing!
				}
			}
			function delete_encuesta(id)
			{
				if (confirm('¿Esta seguro de borrar esta encuesta?')) {
			
					$.ajax({
						data:'id='+id,
				        type: "get",
				        url: "borrar_encuesta",
				        success: function(){
				             alert("Se ha eliminado la encuesta");
				             location.reload();
				        }
					});
				    // Save it!
				} else {
				    // Do nothing!
				}
			}
		</script>
		<script type="text/javascript">
			function video(vid,name)
			{
				bootbox.dialog({
					message: '<div style="text-align:center;"><video style="margin-bottom: 5%;" controls><source src="'+vid+'" type="video/mp4">No es soportado por su navegador</video></div>',
					title: ""+name+"",
					className: "video-bootbox",
				});
			}
		</script>
		<script type="text/javascript">
			
			function agregar_cupon()
			{
				form1='<div class="row">'
									+'<form class="smart-form" id="reporte-form" method="post">'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Codigo</label>'
												+'<label class="input">'
													+'<input type="text" placeholder="Codigo"  id="codigo_frm">'
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="label">Descripcion</label>'
												+'<label class="textarea">'								
													+'<textarea rows="3" class="custom-scroll" id="desc_frm"></textarea>' 
												+'</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<label class="checkbox">'
													+'<input type="checkbox" id="activo" checked="checked" name="checkbox">'
													+'<i></i>Activo</label>'
											+'</section>'
										+'</div>'
										+'<div class="row">'
											+'<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">'
												+'<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>'
												+'<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">'
													+'<a onclick="cupon_nuevo()" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12">Agregar cupon</a>'
												+'</div>'
											+'</section>'
										+'</div>'
									+'</form>'
								+'</div>';
				bootbox.dialog({
					message: form1,
					title: "Crear cupon",
					className: "",
				});
			}
			function cupon_nuevo()
			{
				var codigo=$("#codigo_frm").val();
				var desc=$("#desc_frm").val();
				if($('#activo').prop('checked'))
				{
					var act='ACT';
				}
				else
				{
					var act='DES';
				}
				var datos={'cod':codigo,'desc':desc,'act':act};
				$.ajax({
					 data:{info:JSON.stringify(datos)},
			         type: "get",
			         url: "nuevo_cupon",
			         success: function(){
			              alert("El cupon ha sido cargado al sistema");
			         }
				});	
			}
				
		</script>
		<script>
			function show_coment_panel(id)
			{
				
				bootbox.dialog({
					message: '<div class="jarviswidget jarviswidget-color-purple"  data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false">'
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
											+'<textarea class="form-control no-border" placeholder="" id="coment" rows="4"> </textarea>'
											+'<p class="note">Tama&ntilde;o maximo 140 caracteres</p>'
											+'<div class="widget-footer">'
												+'<button class="btn btn-sm btn-primary" type="button" onclick="add_coment('+id+')">'
													+'Publicar'
												+'</button>'								
												+'<button class="btn btn-sm btn-danger pull-left" type="button">'
													+'Cancelar'
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
			         }
				});
			}
			
			$("#boton_subir").click(function(){
				alert("HOla");
				$("#div_subir").html("<i class='fa fa-gear fa-2x fa-spin'> Este proceso puede tomar unos segundos... </i>");
			});
		</script>
		<script type="text/javascript">
		
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
					message: '<div style="text-align:center;"><iframe style="margin-bottom: 5%; width:420px; height:315px;" src="http://www.youtube.com/embed/'+video+'"></iframe></div>',
					title: ""+nombre+"",
					className: "video-bootbox",
				});
			}
			
			function agregar_evento()
			{
				if($('#icon-1').is(':checked'))
				{
					var tipo=1;
				}
				if($('#icon-2').is(':checked'))
				{
					var tipo=3;
				}
				if($('#icon-3').is(':checked'))
				{
					var tipo=5;
				}
				if($('#icon-4').is(':checked'))
				{
					var tipo=4;
				}
				if($('#icon-5').is(':checked'))
				{
					var tipo=2;
				}
				if($('#icon-6').is(':checked'))
				{
					var tipo=6;
				}
				if($('#option1').is(':checked'))
				{
					var color=1;
				}
				if($('#option2').is(':checked'))
				{
					var color=2;
				}
				if($('#option3').is(':checked'))
				{
					var color=3;
				}
				if($('#option4').is(':checked'))
				{
					var color=5;
				}
				if($('#option5').is(':checked'))
				{
					var color=6;
				}
				if($('#option6').is(':checked'))
				{
					var color=4;
				}
				var nombre=$("#title_ev").val();
				var descripcion=$("#description_ev").val();
				var dia_ini=$("#startdate").val();
				var dia_fin=$("#finishdate").val();
				var hora_ini=$("#hora_ini").val();
				var hora_fin=$("#hora_fin").val();
				var minuto_ini=$("#minuto_ini").val();
				var minuto_fin=$("#minuto_fin").val();
				var lugar=$("#lugar_ev").val();
				var costo=$("#costo_ev").val();
				var direct=$("#direccion_ev").val();
				var url=$("#url_ev").val();
				var observ=$("#observacion_ev").val();
				if(nombre=='')
				{
					alert('Campo nombre es requerido');
				}
				else
				{
					if(descripcion=='')
					{
						alert('Campo descripcion es requerido');
					}
					else
					{
						if(dia_ini==''||hora_ini=='none'||minuto_ini=='none')
						{
							alert('Inicio del evento no especificado');
						}
						else
						{
							if(dia_fin==''||hora_fin=='none'||minuto_fin=='none')
							{
								alert('Fin del evento no especificado');
							}
							else
							{
								if((dia_fin==dia_ini&&hora_ini>hora_fin)||(dia_fin==dia_ini&&hora_ini==hora_fin&&minuto_ini>minuto_fin))
								{
									alert('La hora de inicio no puede ser mayor que la hora de finalizacion');
								}
								else
								{
									var datos={'tipo':tipo,'color':color,'nombre':nombre,'descripcion':descripcion,'dia_ini':dia_ini,'dia_fin':dia_fin,'hora_ini':hora_ini,'hora_fin':hora_fin,'minuto_ini':minuto_ini,'minuto_fin':minuto_fin,'lugar':lugar,'costo':costo,'direccion':direct,'url':url,'observacion':observ};
									$.ajax({
										 data:{info:JSON.stringify(datos)},
								         type: "get",
								         url: "nuevo_evento",
								         success: function(){
								              alert("Se añadido el evento");
								              location.reload();
								         }
									});
								}
							}
							
						}
					}
				}
				
			}
			

			
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
			"use strict";
			
			    var date = new Date();
			    var d = date.getDate();
			    var m = date.getMonth();
			    var y = date.getFullYear();
			
			    var hdr = {
			        left: 'title',
			        center: 'month,agendaWeek,agendaDay',
			        right: 'prev,today,next'
			    };
			
			    
			
			    
			    /* initialize the external events

			    /* initialize the calendar
				 -----------------------------------------------------------------*/
			
			    $('#calendar').fullCalendar({
			
			        header: hdr,
			        buttonText: {
			            prev: '<i class="fa fa-chevron-left"></i>',
			            next: '<i class="fa fa-chevron-right"></i>'
			        },
			
			      
			      
			        
			
			        select: function (start, end, allDay) {
			            var title = prompt('Event Title:');
			            if (title) {
			                calendar.fullCalendar('renderEvent', {
			                        title: title,
			                        start: start,
			                        end: end,
			                        allDay: allDay
			                    }, true // make the event "stick"
			                );
			            }
			            calendar.fullCalendar('unselect');
			        },
			
			        events: [
			        <?php for($i=0;$i<sizeof($eventos);$i++)
						{
						switch($eventos[$i]->color)
						{
							case 1:
								$color="bg-color-darken";
								break;
							case 2:
								$color="bg-color-blue";
								break;
							case 3:
								$color="bg-color-orange";
								break;
							case 4:
								$color="bg-color-red";
								break;
							case 5:
								$color="bg-color-greenLight";
								break;
							case 6:
								$color="bg-color-blueLight";
								break;
						}
						switch($eventos[$i]->tipo)
						{
							case 1:
								$icono="fa-info";
								break;
							case 2:
								$icono="fa-lock";
								break;
							case 3:
								$icono="fa-warning";
								break;
							case 4:
								$icono="fa-user";
								break;
							case 5:
								$icono="fa-check";
								break;
							case 6:
								$icono="fa-clock-o";
								break;
						}
			        	echo 
			        	"{
			        		title: '".$eventos[$i]->nombre."',
				            start: new Date(".substr($eventos[$i]->inicio,0,-15).", ".(substr($eventos[$i]->inicio,5,-12)-1).", ".substr($eventos[$i]->inicio,8,-9).", ".(substr($eventos[$i]->inicio,11,-6)*1).", ".(substr($eventos[$i]->inicio,14,-3)*1)."),
				            end: new Date(".substr($eventos[$i]->fin,0,-15).", ".(substr($eventos[$i]->inicio,5,-12)-1).", ".substr($eventos[$i]->fin,8,-9).", ".(substr($eventos[$i]->fin,11,-6)*1).", ".(substr($eventos[$i]->fin,14,-3)*1)."),
				            description: '".$eventos[$i]->descripcion."',
				            className: ['event', '".$color."'],
				            icon: '".$icono."'
			        	},";
			        	}
			        ?>
			        ],
			
			        eventRender: function (event, element, icon) {
			            if (!event.description == "") {
			                element.find('.fc-event-title').append("<br/><span class='ultra-light'>" + event.description +
			                    "</span>");
			            }
			            if (!event.icon == "") {
			                element.find('.fc-event-title').append("<i class='air air-top-right fa " + event.icon +
			                    " '></i>");
			            }
			        },
			
			        windowResize: function (event, ui) {
			            $('#calendar').fullCalendar('render');
			        }
			    });
			
			    /* hide default buttons */
			    $('.fc-header-right, .fc-header-center').hide();

			
				$('#calendar-buttons #btn-prev').click(function () {
				    $('.fc-button-prev').click();
				    return false;
				});
				
				$('#calendar-buttons #btn-next').click(function () {
				    $('.fc-button-next').click();
				    return false;
				});
				
				$('#calendar-buttons #btn-today').click(function () {
				    $('.fc-button-today').click();
				    return false;
				});
				
				$('#mt').click(function () {
				    $('#calendar').fullCalendar('changeView', 'month');
				});
				
				$('#ag').click(function () {
				    $('#calendar').fullCalendar('changeView', 'agendaWeek');
				});
				
				$('#td').click(function () {
				    $('#calendar').fullCalendar('changeView', 'agendaDay');
				});			
			

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
		    
		     var otable1 = $('#datatable_fixed_column1').DataTable({
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
		    
		    var otable2= $('#datatable_fixed_column2').DataTable({
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
		    var otable3 = $('#datatable_fixed_column3').DataTable({
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
		    var otable4 = $('#datatable_fixed_column4').DataTable({
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
		    var otable5 = $('#datatable_fixed_column5').DataTable({
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
		    //$("div.toolbar").html('<div class="text-right"><img src="/template/img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
		    	   
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