
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">

				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-home"></i> <a href="/bo/dashboard"> Menu</a> <span>>
					<a href="/bo/comercial/"> Comercial</a> > <a
					href="/bo/CuentasPagar/index"> Cobros</a> > Historial
				</span>
			</h1>
		</div>
	</div>
	<?php if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Error </strong> '.$this->session->flashdata('error').'
			</div>'; 
	}
?>	 
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1"
					data-widget-editbutton="false" data-widget-custombutton="false"
					data-widget-colorbutton="false">


					<!-- widget div-->


					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->
					<!-- widget content -->
					<div class="widget-body">
						<div class="tab-pane">
							<div class="col-lg-6 col-sm-6 col-md-12 col-xs-12">
																<label class="col-lg-6 col-sm-6 col-md-12 col-xs-12">Año
																	<select id="año" onChange="buscar()" class="form-control">
																		<option value="" selected>Selecione año</option>
																	<? foreach ($años as $key) {?>
																			<option value="<?=$key->año?>"><?=$key->año?></option>
																	<?}?>
																	</select>
																</label>
																<label class="col-lg-6 col-sm-6 col-md-12 col-xs-12">Mes
																	<select id="mes" onChange="buscarmes()" class="form-control">
																		<option value="01">Enero</option>
																		<option value="02">Febrero</option>
																		<option value="03">Marzo</option>
																		<option value="04">Abril</option>
																		<option value="05">Mayo</option>
																		<option value="06">Junio</option>
																		<option value="07">Julio</option>
																		<option value="08">Agosto</option>
																		<option value="09">Septiembre</option>
																		<option value="10">Octubre</option>
																		<option value="11">Noviembre</option>
																		<option value="12">Diciembre</option>
																	</select>
																</label>
															</div>
							<br>
							<table  id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th data-hide="phone">ID</th>
										<th data-class="expand">Fecha Solicitud</th>
										<th data-hide="phone">Fecha Pago</th>	
										<th data-hide="phone">Usuario</th>
										<th data-hide="phone,tablet">Metodo</th>
										<th data-hide="phone,tablet">Valor</th>
										<th data-hide="phone,tablet">Estado</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($cobros as $cobro) {?>
										<tr>
											<td><?php echo $cobro->id_cobro; ?></td>
											<td><?php echo $cobro->fecha; ?></td>
											<td><?php echo $cobro->fecha_pago; ?></td>
											<td><?php echo $cobro->usuario; ?></td>
											<td><?php echo $cobro->metodo_pago; ?></td>
											<td>$ <?php echo number_format($cobro->monto,2); ?></td>
											<td><?php echo $cobro->estado; ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->
			</article>
		</div>
		<!-- end widget -->

		<!-- END COL -->

		<div class="row">
			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<br /> <br />
			</div>
		</div>
		<!-- END ROW -->
	</section>
	<!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->
<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
<script src="/template/js/plugin/markdown/markdown.min.js"></script>
<script src="/template/js/plugin/markdown/to-markdown.min.js"></script>
<script src="/template/js/plugin/markdown/bootstrap-markdown.min.js"></script>
<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
<script
	src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script
	src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script type="text/javascript">
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
	
		$("#dt_basic_filter").children('label').addClass("hide");
	pageSetUp();

})

function buscar(){
		var buscador = $("#dt_basic_filter").children('label').children("input");
		if(buscador.val() == "") 
			buscador.val($("#año").val());
		else{
			fecha = buscador.val();
			if(fecha.length <= 4)
				buscador.val($("#año").val());
			else{
				mes = fecha.substring(4, 7); 
				buscador.val($("#año").val()+mes);
				}
		}
		e = jQuery.Event("keyup");
		e.which = 13 //enter key
		jQuery('input').trigger(e);
		
	}

	function buscarmes(){
		var buscador = $("#dt_basic_filter").children('label').children("input");
		if(buscador.val() == "") 
			buscador.val($("#mes").val());
		else{
			año = buscador.val();
			alert(año.length);
			if(año.length >= 4){
				año = año.substring(0, 4); 
				buscador.val(año+"-"+$("#mes").val());
			}
			else{
					buscador.val($("#mes").val());
				}
		}
		e = jQuery.Event("keyup");
		e.which = 13 //enter key
		jQuery('input').trigger(e);
	}
</script>
