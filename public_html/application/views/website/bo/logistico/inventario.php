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
								Inventario
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
													<a href="#s1" data-toggle="tab">Registrar Entrada</a>
												</li>
												<li>
													<a href="#s2" data-toggle="tab">Ver Entradas</a>
												</li>
												<li>
													<a href="#s3" data-toggle="tab">Registrar Salida</a>
												</li>
												<li>
													<a href="#s4" data-toggle="tab">Ver Salidas</a>
												</li>
											</ul>
											<div id="myTabContent1" class="tab-content padding-10">
												<div class="tab-pane fade in active" id="s1">
													<div class="row">
														
														<form id="entradas" class="smart-form" method="post" action="new_entrada">
															
															<fieldset>
																<legend>Datos de Entrada</legend>
																<section  class="col col-3">
																	<label class="select">
																		<select id="tipo_movimiento_in" required type="text" name="tipo_movimiento_in">
																			<option value="0">Escoja un tipo</option>
																			<? foreach($movimientos_in as $mov){?>
																				<option value="<?=$mov->id_movimiento?>"><?=$mov->descripcion?></option>
																			<?}?>
																		</select>
																	</label>
																</section>
																<section class="col col-3">
																	<label class="input"> <i class="icon-prepend fa fa-barcode"></i>
																		<input id="clave_in"  required type="text" name="clave_in" placeholder="Clave / Factura">
																	</label>
																</section>
															</fieldset>
															<fieldset>
																<legend>Almacen</legend>
																<section class="col col-3">
																	<label class="input"> <i class="icon-prepend fa fa-plane"></i>
																		<input id="origen_in"  required type="text" name="origen_in" placeholder="Origen">
																	</label>
																</section>
																<section  class="col col-3">
																	<label class="select">
																		<select id="destino_in" required type="text" name="destino_in">
																			<option value="0">Escoja un almacen</option>
																			<? foreach($almacenes as $almacen){?>
																				<option value="<?=$almacen->id_almacen?>"><?=$almacen->nombre?></option>
																			<?}?>
																		</select>
																	</label>
																</section>
															</fieldset>
															<fieldset id="general_field_in">
																<legend>General</legend>
																<section class="col col-3">
																	<label class="select">
																		<select id="mercancia_in" required type="text" name="mercancia_in">
																			<option value="0">Escoja una mercancia</option>
																			<? foreach($mercancias as $mercancia){?>
																				<option value="<?=$mercancia->id?>"><?=$mercancia->sku_2?></option>
																			<?}?>
																		</select>
																	</label>
																</section>
																<section class="col col-3">
																	<label class="input"> <i class="icon-prepend fa fa-unsorted  "></i>
																		<input id="cantidad_in"  required type="number" min="1" name="cantidad_in" placeholder="Cantidad">
																	</label>
																</section>
																<section class="col col-3">
																	<label class="select">
																		<select id="impuesto_in" required type="text" name="impuesto_in">
																			<option value="0">Escoja un impuesto</option>
																			<? foreach($impuestos as $impuesto){?>
																				<option value="<?=$impuesto->id_impuesto?>"><?=$impuesto->descripcion?> <?=$impuesto->porcentaje?> %</option>
																			<?}?>
																		</select>
																	</label>
																</section>
																<section id="importe_sec_in" class="col col-3">
																	<label class="input state-disabled"> <i class="icon-prepend fa fa-pencil-square-o"></i>
																		<input id="importe_in"  required type="text" name="importe_in" placeholder="Importe">
																	</label>
																</section>
																<section id="subtotal_sec_in" class="col col-3">
																	<label class="input state-disabled" > <i class="icon-prepend fa fa-money "></i>
																		<input id="subtotal_in"  required type="text"  name="subtotal_in" placeholder="Subtotal">
																	</label>
																</section>
																
																<section id="total_sec_in" class="col col-3">
																	<label class="input state-disabled"> <i class="icon-prepend fa fa-money"></i>
																		<input id="total_in"  required type="text"  name="total_in" placeholder="Total">
																	</label>
																</section>
															</fieldset>
															<footer>
																<button type="submit" class="btn btn-success">
																	Guardar Entrada
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
													
																			<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
																				<thead>
																					<tr>
																						<th data-hide="phone">ID</th>
																						<th data-class="expand">Clave</th>
																						<th data-class="expand">Tipo</th>
																						<th>Origen</th>
																						<th data-hide="phone">Destino</th>
																						<th data-hide="phone,tablet">Fecha</th>
																						<th data-hide="phone,tablet">Estatus</th>
																						<th></th>
																						
																					</tr>
																				</thead>
																				<tbody>
																					
																					<?php for($i=0;$i<sizeof($entradas);$i++)
																					{
																						echo 
																						"<tr>
																							<td>".$entradas[$i]->id_movimiento."</td>
																							<td>".$entradas[$i]->keyword."</td>
																							<td>".$entradas[$i]->tipo."</td>
																							<td>".$entradas[$i]->origen."</td>
																							<td>".$entradas[$i]->destino."</td>
																							<td>".$entradas[$i]->fecha."</td>
																							<td>".$entradas[$i]->estatus."</td>
																							<td class='text-center'>
																								<a class='txt-color-blue' style='cursor: pointer;' onclick='detalle_movimiento(".$entradas[$i]->id_movimiento.")' title='Detalles'><i class='fa fa-eye'></i></a>
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
															
															
															<!-- WIDGET END -->
													
														</div>
													
													</section>
												</div>
												<div class="tab-pane fade" id="s3">
													<div class="row">
														
														<form id="salidas" class="smart-form" method="post" action="new_salida">
															
															<fieldset>
																<legend>Datos de Salida</legend>
																<section  class="col col-3">
																	<label class="select">
																		<select id="tipo_movimiento_out" required type="text" name="tipo_movimiento_out">
																			<option value="0">Escoja un tipo</option>
																			<? foreach($movimientos_out as $mov){?>
																				<option value="<?=$mov->id_movimiento?>"><?=$mov->descripcion?></option>
																			<?}?>
																		</select>
																	</label>
																</section>
																<section class="col col-3">
																	<label class="input"> <i class="icon-prepend fa fa-barcode"></i>
																		<input id="clave_out"  required type="text" name="clave_out" placeholder="Clave / Factura">
																	</label>
																</section>
															</fieldset>
															<fieldset>
																<legend>Almacen</legend>
																<section  class="col col-3">
																	<label class="select">
																		<select id="origen_out" required type="text" name="origen_out">
																			<option value="0">Escoja un almacen</option>
																			<? foreach($almacenes as $almacen){?>
																				<option value="<?=$almacen->id_almacen?>"><?=$almacen->nombre?></option>
																			<?}?>
																		</select>
																	</label>
																</section>
																<section class="col col-3">
																	<label class="input"> <i class="icon-prepend fa fa-plane"></i>
																		<input id="destino_out"  required type="text" name="destino_out" placeholder="Origen">
																	</label>
																</section>
																
															</fieldset>
															<fieldset id="general_field_out">
																<legend>General</legend>
																<section class="col col-3">
																	<label class="select">
																		<select id="mercancia_out" required type="text" name="mercancia_out">
																			<option value="0">Escoja una mercancia</option>
																			<? foreach($mercancias as $mercancia){?>
																				<option value="<?=$mercancia->id?>"><?=$mercancia->sku_2?></option>
																			<?}?>
																		</select>
																	</label>
																</section>
																<section class="col col-3">
																	<label class="input"> <i class="icon-prepend fa fa-unsorted "></i>
																		<input id="cantidad_out" required type="number" min="1" name="cantidad_out" placeholder="Cantidad">
																	</label>
																</section>
																<section  class="col col-3">
																	<label class="select">
																		<select id="impuesto_out" required type="text" name="impuesto_out">
																			<option value="0">Escoja un impuesto</option>
																			<? foreach($impuestos as $impuesto){?>
																				<option value="<?=$impuesto->id_impuesto?>"><?=$impuesto->descripcion?> <?=$impuesto->porcentaje?> %</option>
																			<?}?>
																		</select>
																	</label>
																</section>
																<section id="importe_sec_out" class="col col-3">
																	<label class="input state-disabled"> <i class="icon-prepend fa fa-pencil-square-o"></i>
																		<input id="importe_out"  required type="text" disabled="disabled" name="importe_out" placeholder="Importe">
																	</label>
																</section>
																<section id="subtotal_sec_out" class="col col-3">
																	<label class="input state-disabled"> <i class="icon-prepend fa fa-money "></i>
																		<input id="subtotal_out"  required type="text" disabled="disabled" name="subtotal_out" placeholder="Subtotal">
																	</label>
																</section>
														
																<section id="total_sec_out" class="col col-3">
																	<label class="input state-disabled"> <i class="icon-prepend fa fa-money"></i>
																		<input id="total_out"  required type="text" disabled="disabled" name="total_out" placeholder="Total">
																	</label>
																</section>
															</fieldset>
															<footer>
																<button type="button" onclick="envia_salida()" class="btn btn-success">
																	Guardar Salida
																</button>
															</footer>
														</form>
													</div>	
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
																		<h2>Salidas</h2>
													
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
																						<th data-class="expand">Clave</th>
																						<th data-class="expand">Tipo</th>
																						<th>Origen</th>
																						<th data-hide="phone">Destino</th>
																						<th data-hide="phone,tablet">Fecha</th>
																						<th data-hide="phone,tablet">Estatus</th>
																						<th></th>
																						
																					</tr>
																				</thead>
																				<tbody>
																					
																					<?php for($i=0;$i<sizeof($salidas);$i++)
																					{
																						echo 
																						"<tr>
																							<td>".$salidas[$i]->id_movimiento."</td>
																							<td>".$salidas[$i]->keyword."</td>
																							<td>".$salidas[$i]->tipo."</td>
																							<td>".$salidas[$i]->origen."</td>
																							<td>".$salidas[$i]->destino."</td>
																							<td>".$salidas[$i]->fecha."</td>
																							<td>".$salidas[$i]->estatus."</td>
																							<td class='text-center'>
																								<a class='txt-color-blue' style='cursor: pointer;' onclick='detalle_movimiento(".$salidas[$i]->id_movimiento.")' title='Detalles'><i class='fa fa-eye'></i></a>
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
		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
<script>
	$("#impuesto_in").change(function(){
		if($("#cantidad_in").val()>0&&$("#mercancia_in").val()!=0&&$("#impuesto_in").val()!=0)
		{
			var merc=$("#mercancia_in").val();
			var imp=$("#impuesto_in").val();
			var cant=$("#cantidad_in").val();
			$.ajax({
				type: "post",
				url: "calcular_movimiento_in",
				data: {mercancia : merc, impuesto : imp, cantidad : cant},
				success: function(msg)
				{
					$("#subtotal_sec_in").remove();
					$("#importe_sec_in").remove();
					$("#total_sec_in").remove();
					$("#general_field_in").append(msg);
				}
			});
		}
		else
		{
			$("#subtotal_in").val("0");
			$("#importe_in").val("0");
			$("#total_in").val("0");
		}
	});
	$("#impuesto_out").change(function(){
		if($("#cantidad_out").val()>0&&$("#mercancia_out").val()!=0&&$("#impuesto_out").val()!=0)
		{
			var merc=$("#mercancia_out").val();
			var imp=$("#impuesto_out").val();
			var cant=$("#cantidad_out").val();
			$.ajax({
				type: "post",
				url: "calcular_movimiento_out",
				data: {mercancia : merc, impuesto : imp, cantidad : cant},
				success: function(msg)
				{
					$("#subtotal_sec_out").remove();
					$("#importe_sec_out").remove();
					$("#total_sec_out").remove();
					$("#general_field_out").append(msg);
				}
			});
		}
		else
		{
			$("#subtotal_out").val("0");
			$("#importe_out").val("0");
			$("#total_out").val("0");
		}
	});
	$("#mercancia_in").change(function(){
		if($("#cantidad_in").val()>0&&$("#mercancia_in").val()!=0&&$("#impuesto_in").val()!=0)
		{
			var merc=$("#mercancia_in").val();
			var imp=$("#impuesto_in").val();
			var cant=$("#cantidad_in").val();
			$.ajax({
				type: "post",
				url: "calcular_movimiento_in",
				data: {mercancia : merc, impuesto : imp, cantidad : cant},
				success: function(msg)
				{
					$("#subtotal_sec_in").remove();
					$("#importe_sec_in").remove();
					$("#total_sec_in").remove();
					$("#general_field_in").append(msg);
				}
			});
		}
		else
		{
			$("#subtotal_in").val("0");
			$("#importe_in").val("0");
			$("#total_in").val("0");
		}
	});
	$("#mercancia_out").change(function(){
		if($("#cantidad_out").val()>0&&$("#mercancia_out").val()!=0&&$("#impuesto_out").val()!=0)
		{
			var merc=$("#mercancia_out").val();
			var imp=$("#impuesto_out").val();
			var cant=$("#cantidad_out").val();
			$.ajax({
				type: "post",
				url: "calcular_movimiento_out",
				data: {mercancia : merc, impuesto : imp, cantidad : cant},
				success: function(msg)
				{
					$("#subtotal_sec_out").remove();
					$("#importe_sec_out").remove();
					$("#total_sec_out").remove();
					$("#general_field_out").append(msg);
				}
			});
		}
		else
		{
			$("#subtotal_out").val("0");
			$("#importe_out").val("0");
			$("#total_out").val("0");
		}
	});
	$("#cantidad_in").change(function(){
		if($("#cantidad_in").val()>0&&$("#mercancia_in").val()!=0&&$("#impuesto_in").val()!=0)
		{
			var merc=$("#mercancia_in").val();
			var imp=$("#impuesto_in").val();
			var cant=$("#cantidad_in").val();
			$.ajax({
				type: "post",
				url: "calcular_movimiento_in",
				data: {mercancia : merc, impuesto : imp, cantidad : cant},
				success: function(msg)
				{
					$("#subtotal_sec_in").remove();
					$("#importe_sec_in").remove();
					$("#total_sec_in").remove();
					$("#general_field_in").append(msg);
				}
			});
		}
		else
		{
			$("#subtotal_in").val("0");
			$("#importe_in").val("0");
			$("#total_in").val("0");
		}
	});
	$("#cantidad_out").change(function(){
		if($("#cantidad_out").val()>0&&$("#mercancia_out").val()!=0&&$("#impuesto_out").val()!=0)
		{
			var merc=$("#mercancia_out").val();
			var imp=$("#impuesto_out").val();
			var cant=$("#cantidad_out").val();
			$.ajax({
				type: "post",
				url: "calcular_movimiento_out",
				data: {mercancia : merc, impuesto : imp, cantidad : cant},
				success: function(msg)
				{
					$("#subtotal_sec_out").remove();
					$("#importe_sec_out").remove();
					$("#total_sec_out").remove();
					$("#general_field_out").append(msg);
				}
			});
		}
		else
		{
			$("#subtotal_out").val("0");
			$("#importe_out").val("0");
			$("#total_out").val("0");
		}
	});
	function detalle_movimiento(id)
	{
		if(id=1)
		{
			var titulo="Detalles Entrada";
		}
		else
		{
			var titulo="Detalles Salida"
		}
		$.ajax({
			type: "post",
			url: "detalle_movimiento",
			data: {id : id},
			success: function(msg)
			{
				bootbox.dialog({
					message: msg,
					title: titulo,
					className: "",
				});
			}
		});
	}
	function envia_salida()
	{
		var cant=$("#cantidad_out").val();
		var merc=$("#mercancia_out").val();
		var alm=$("#origen_out").val();
		$.ajax({
			type: "post",
			url: "ver_existentes",
			data: {cantidad : cant , mercancia : merc , almacen : alm},
			success: function(msg)
			{	
				
				if(msg=="La cantidad de salida es mayor que la existene en almacen"||msg=="Esta mercancia aun no tiene existencias en almacen")
				{
					
					//event.preventDefault();
					bootbox.dialog({
						message: msg,
						title: "Error",
						className: "",
						buttons: {
							danger: {
								label: "Ok!",
								className: "btn-danger",
								callback: function() {
									}
							}
						}
					});
				}
				else
				{
					
					bootbox.dialog({
						message: msg,
						title: "Exito",
						className: "",
						buttons: {
							success: {
								label: "Ok!",
								className: "btn-success",
								callback: function() {
									}
							}
						}
					});
					$("#salidas").submit();
				}
				
			}
		});

	}
	/*$("#salidas").submit(function(event){
		//alert("0");
		var cant=$("#cantidad_out").val();
		var merc=$("#mercancia_out").val();
		var alm=$("#origen_out").val();
		
		//alert(cant+merc+alm);
		//event.preventDefault();
		event.stopPropagation();

		$.ajax({
			type: "post",
			url: "ver_existentes",
			data: {cantidad : cant , mercancia : merc , almacen : alm},
			timeout: 10000,
			success: function(msg)
			{	
				alert("no");
				if(msg=="La cantidad de salida es mayor que la existene en almacen"||msg=="Esta mercancia aun no tiene existencias en almacen")
				{
					alert("2");
					event.preventDefault();
					bootbox.dialog({
						message: msg,
						title: "Error",
						className: "",
					});
					
				}
				else
				{
					alert("3");
					bootbox.dialog({
						message: msg,
						title: "Exito",
						className: "",
					});
					event.preventDefault();
				}
				
			}
		});
	});*/
	$("#entradas").submit(function(event){
		bootbox.dialog({
			message: "El movimiento se ha hecho con exito",
			title: "Exito",
			className: "",
			buttons: {
				success: {
				label: "Ok!",
				className: "btn-success",
				callback: function() {
					}
				}
			}
		});
		return;
	});
</script>
<script>
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
		    var otable = $('#datatable_fixed_column1').DataTable({
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
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column1'), breakpointDefinition);
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
		    $("div.toolbar").html('<div class="text-right"></div>');
		    	   
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