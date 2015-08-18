
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/comercial">Comercial</a> > <a href="/bo/comercial/carrito_de_compras"> Carrito de Compras </a> > Listar
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
					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<h2>Carrito de Compras</h2>				
						
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
							<div class="tab-pane" id="s5">
									<div class="row">
										<div class="col-xs-12 col-md-6 col-sm-8 col-lg-4"><h5><center>Productos en sistema</center></h5></div>
										<br>
											<div class="col-xs-4 col-md-6 col-sm-4 col-lg-1" style="float: right;">
												<center>
													<a title="Editar" style="cursor: pointer;" class="txt-color-blue"><i class="fa fa-pencil fa-3x"></i></a>
													<br> Editar 
												</center>
											</div>
											
											<div class="col-xs-4 col-md-6 col-sm-4 col-lg-1" style="float: right;">
												<center>
													<a title="Eliminar" style="cursor: pointer;" class="txt-color-red"><i class="fa fa-trash-o fa-3x"></i></a> 
													<br> Eliminar 
												</center>
											</div>
											
											<div class="col-xs-4 col-md-6 col-sm-4 col-lg-1" style="float: right;">
												<center>
													<a title="Activar" style="cursor: pointer;" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a> 
													<br> Activado 
												</center>
											</div>
											
											<div class="col-xs-4 col-md-6 col-sm-4 col-lg-1" style="float: right;">
												<center>
													<a title="Desactivar" style="cursor: pointer;" class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
													<br>Desactivado 
												</center>
											</div>
									</div>
									
									<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
											<thead>			                
												<tr>
													<th data-hide="phone,tablet">ID</th>
													<th data-class="expand">NOMBRE</th>
													<th data-hide="phone">IMAGEN</th>
													<th data-hide="phone,tablet">RED</th>
													<th data-hide="phone">PAIS</th>
													<th data-hide="phone,tablet"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> TIPO</th>
													<th data-hide="phone,tablet"><i class="fa fa-fw fa-calendar txt-color-blue hidden-md hidden-sm hidden-xs"></i> ALTA</th>
													<th data-hide="phone,tablet"><i class="fa fa-fw fa-calendar txt-color-blue hidden-md hidden-sm hidden-xs"></i> PRECIO REAL</th>
													<th data-hide="phone,tablet"><i class="fa fa-fw fa-calendar txt-color-blue hidden-md hidden-sm hidden-xs"></i> PRECIO COSTO</th>
													<th data-hide="phone,tablet"><i class="fa fa-fw fa-calendar txt-color-blue hidden-md hidden-sm hidden-xs"></i> PRECIO COSTO PUBLICO</th>
													<th>ACCION</th>
												</tr>
											</thead>
											<tbody>
												<?foreach ($productos as $key) {?>
												<tr>
													<td><?=$key->id?></td>
													<td><?=$key->nombre?></td>
													<td><img style="width: 10rem; height: 10rem;" src="<?=$key->url?>"></img></td>
													<td><?=$key->red?></td>
													<td>
															<img class="flag flag-<?php echo strtolower($key->Code2); ?>">
															<?php echo $key->Name; ?>
													</td>
													<td><?=$key->descripcion?></td>
													<td><?=$key->fecha_alta?></td>
													<td><?=$key->real?></td>
													<td><?=$key->costo?></td>
													<td><?=$key->costo_publico?></td>
													<td class="text-center">
														<a title="Editar"  style="cursor: pointer;" onclick="editar(<?=$key->id?>)" class="txt-color-blue"><i class="fa fa-pencil fa-3x"></i></a>
														<a title="Eliminar" style="cursor: pointer;" onclick="eliminar(<?=$key->id?>)" class="txt-color-red"><i class="fa fa-trash-o fa-3x"></i></a>
														<?if($key->estatus=='DES'){?>
															<a title="Activar" style="cursor: pointer;" onclick="estatus(1,<?=$key->id?>)" class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
														<?}else{?>
															<a title="Desactivar" style="cursor: pointer;" onclick="estatus(2,<?=$key->id?>)" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
														<?}?>
													</td>
												</tr>
												<?}?>
												
												<?foreach ($servicios as $key) {?>
												<tr>
													<td><?=$key->id?></td>
													<td><?=$key->nombre?></td>
													<td><img style="width: 10rem; height: 10rem;" src="<?=$key->url?>"></img></td>
													<td><?=$key->red?></td>
													<td>
															<img class="flag flag-<?php echo strtolower($key->Code2); ?>">
															<?php echo $key->Name; ?>
													</td>													<td><?=$key->descripcion?></td>
													<td><?=$key->fecha_alta?></td>
													<td><?=$key->real?></td>
													<td><?=$key->costo?></td>
													<td><?=$key->costo_publico?></td>
													<td class="text-center"><a title="Editar" style="cursor: pointer;" onclick="editar(<?=$key->id?>)" class="txt-color-blue"><i class="fa fa-pencil fa-3x"></i></a>
														<a title="Eliminar" style="cursor: pointer;" onclick="eliminar(<?=$key->id?>)" class="txt-color-red"><i class="fa fa-trash-o fa-3x"></i></a>
														<?if($key->estatus=='DES'){?>
															<a title="Activar" style="cursor: pointer;" onclick="estatus(1,<?=$key->id?>)" class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
														<?}else{?>
															<a title="Desactivar" style="cursor: pointer;" onclick="estatus(2,<?=$key->id?>)" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
														<?}?>
													</td>
												</tr>
												<?}?>
												
												<?foreach ($combinados as $key) {?>
												<tr>
													<td><?=$key->id?></td>
													<td><?=$key->nombre?></td>
													<td><img style="width: 10rem; height: 10rem;" src="<?=$key->url?>"></img></td>
													<td><?=$key->red?></td>
													<td>
															<img class="flag flag-<?php echo strtolower($key->Code2); ?>">
															<?php echo $key->Name; ?>
													</td>
													<td><?=$key->descripcion?></td>
													<td><?=$key->fecha_alta?></td>
													<td><?=$key->real?></td>
													<td><?=$key->costo?></td>
													<td><?=$key->costo_publico?></td>
													<td class="text-center"><a title="Editar" style="cursor: pointer;" onclick="editar(<?=$key->id?>)" class="txt-color-blue"><i class="fa fa-pencil fa-3x"></i></a>
														<a title="Eliminar" style="cursor: pointer;" onclick="eliminar(<?=$key->id?>)" class="txt-color-red"><i class="fa fa-trash-o fa-3x"></i></a>
														<?if($key->estatus=='DES'){?>
															<a title="Activar" style="cursor: pointer;" onclick="estatus(1,<?=$key->id?>)" class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
														<?}else{?>
															<a title="Desactivar" style="cursor: pointer;" onclick="estatus(2,<?=$key->id?>)" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
														<?}?>
													</td>
												</tr>
												<?}?>
												
											</tbody>
										</table>
								</div>
							
							</div>
						</div>
						<!-- end widget content -->
						
					</div>
					<!-- end widget div -->
					</article>
				</div>
				<!-- end widget -->
			
			<!-- END COL -->
			
			</section>
		</div>
		<div class="row">         
	        <!-- a blank row to get started -->
	        <div class="col-sm-12">
	            <br />
	            <br />
	        </div>
        </div>            
		<!-- END ROW -->
	
	<!-- end widget grid -->

<!-- END MAIN CONTENT -->
	<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
	<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
	<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
	<script src="/template/js/validacion.js"></script>
	
	<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {

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

	/* BASIC ;*/
		var responsiveHelper_dt_basic = undefined;
		var responsiveHelper_datatable_fixed_column = undefined;
		var responsiveHelper_datatable_col_reorder = undefined;
		var responsiveHelper_datatable_tabletools = undefined;
		
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};

		$('#dt_basic_paquete').dataTable({
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
	
		
	pageSetUp();

})

function editar(id_merc)
{
	$.ajax({
		type: "POST",
		url: "/bo/admin/edit_merc",
		data: {id: id_merc},
	})
	.done(function( msg )
	{
		bootbox.dialog({
		message: msg,
		title: 'Atención !!!',
	})//fin done ajax
	});//Fin callback bootbox
}

function eliminar(id)
{
	bootbox.dialog({
		message: " ¿ Esta seguro que desea eliminar la mercancia?. <br>Recuerde que esta acción no se puede deshacer.",
		title: "Eliminar",
		buttons: {
			success: {
			label: "Aceptar",
			className: "btn-success",
			callback: function() {

				var request = $.ajax({
						type: "POST",
						url: "/bo/admin/del_merc",
						data: {id: id},
					});
				
					request.done(function( msg )
					{
						bootbox.dialog({
						message: msg,
						title: 'Atención !!!',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								location.href = "/bo/comercial/carrito";
								}
							}
						}
					})//fin done ajax
					});//Fin callback bootbox

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

function estatus(tipo,id)
{
	if (tipo==1){
		bootbox.dialog({
			message: "Confirme que desea activar en carrito de compra",
			title: "Atención !!!",
			buttons: {
				success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {

						$.ajax({
						type: "POST",
						url: "/bo/admin/estado_mercancia",
						data: {tipo: tipo, id: id},
					})
					.done(function( msg )
					{	location.href = "/bo/comercial/carrito";
						
					});//Fin callback bootbox

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
			message: "Confirme que desea desactivar en carrito de compra",
			title: "Atención !!!",
			buttons: {
				success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {

						$.ajax({
						type: "POST",
						url: "/bo/admin/estado_mercancia",
						data: {tipo: tipo, id: id},
					})
					.done(function( msg )
					{	
						location.href = "/bo/comercial/carrito";
						
					});//Fin callback bootbox

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
	pageSetUp();
}

</script>