<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a> 
				<span>>
					Mensajes
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
						<h2>Mensajes</h2>				
						
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
									<a href="#s1" data-toggle="tab">Enviar</a>
								</li>
								<li>
									<a href="#s2" data-toggle="tab">Mis mensajes</a>
								</li>
							</ul>
							<div id="myTabContent1" class="tab-content padding-10">
								<div class="tab-pane fade in active" id="s1">
									<form action="send_mail" method="post" id="contact-form" class="smart-form">
										<header>Escribir mensaje</header>
										
										<fieldset>
											<div class="row">
												<section class="col col-8">
													<label class="label" >Título</label>
													<label class="input">
														<i class="icon-append fa fa-tag"></i>
														<input type="text" name="titulo" required>
													</label>
												</section>
												<section class="col col-4">
													<label class="label">Dirigido a</label>
													<label class="select select-multiple">
														<select name="dirigido" multiple="" class="custom-scroll">
															<?foreach ($afiliados as $key) 
															{?>
																<option value="<?=$key->id_afiliado?>"><?=$key->afiliado." ".$key->afiliado_p?> </option>
															<?}?>
														</select> </label>
													<div class="note">
														<strong>Nota:</strong> Manten presionado la tecla ctrl y escoge tus opciones.
													</div>
												</section>
											</div>
											<div class="row">
												<label>Mensaje:</label>
												<textarea name="textarea" class="jqte-test"></textarea>
											</div>
										</fieldset>	
										<footer>
											<button type="button" onclick="enviar()" class="btn btn-primary">
												Enviar
											</button>
										</footer>
									</form>
								</div>
								<div class="tab-pane fade" id="s2">
									<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
										<thead>
											<tr>
												<th class="text-center"><b>Enviado por</b></th>
												<th class="text-center hidden-xs hidden-sm"><b>Título</b></th>
												<th class="text-center hidden-xs hidden-sm"><b>Fecha</b></th>
												<th class="text-center hidden-xs hidden-sm"><b>Estado</b></th>
												<th class="text-center"><b>Acción</b></th>
											</tr>
										</thead>
										<tbody>
												<?foreach ($mensaje as $key){?>
												<!-- TR -->
												<tr>
													<td class="text-center hidden-xs hidden-sm">
														<?echo $key->enviado_n." ".$key->enviado_p?>
													</td>
													<td class="text-center hidden-xs hidden-sm">
														<?=$key->titulo?>
													</td>
													<td class="text-center hidden-xs hidden-sm">
														<?=$key->fecha?>
													</td>
													<td class="text-center hidden-xs hidden-sm">
														<?=$key->estado_mensaje?>
													</td>
													<td class="text-center">
														<a title="Ver mensaje" onclick="ver(<?=$key->id_mensaje?>)" class="txt-color-green" href="#">
															<i class="fa fa-2x fa-eye"></i>
														</a>
														<a title="Eliminar mensaje" onclick="eliminar(<?=$key->id_mensaje?>)" class="txt-color-red" href="#">
															<i class="fa fa-2x fa-trash-o"></i>
														</a>&nbsp;
													</td>
												</tr>
												<!-- end TR -->
												<?}?>
										</tbody>
									</table>
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

	<link type="text/css" rel="stylesheet" href="/plugins/jqueryte/jquery-te-1.4.0.css">
	<script src="/plugins/jqueryte/jquery-te-1.4.0.min.js"></script>

	<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
	<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

	<script type="text/javascript">
		
			// DO NOT REMOVE : GLOBAL FUNCTIONS!
			
			$(document).ready(function() {
				
				pageSetUp();

				$('.jqte-test').jqte();
	
				// settings of status
				var jqteStatus = true;
				$(".status").click(function()
				{
					jqteStatus = jqteStatus ? false : true;
					$('.jqte-test').jqte({"status" : jqteStatus})
				});

				/* COLUMN FILTER  */
		    	var otable = $('#datatable_fixed_column').DataTable({
		    			"columnDefs": [ {
			            "searchable": false,
			            "orderable": false,
			            "sortable": false,
			            "targets": 0
			        	} ],
			        	"order": [[ 1, 'asc' ]],
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
			
		    });
		    /* END COLUMN FILTER */  
			
			})
function enviar()
{
	$.ajax({
		type: "POST",
		url: "/ov/cgeneral/envia_sms",
		data: $('#contact-form').serialize()
	})
	.done(function( msg ) {

		bootbox.dialog({
		message: "Tu mensaje ha sido enviado con exito",
		title: "Mensaje",
		buttons: {
			success: {
			label: "Ok!",
			className: "btn-success",
			callback: function() {
				location.href='';
				}
			}
		}
	});

	});
}
function ver(id)
{
	$.ajax({
		type: "POST",
		url: "/ov/cgeneral/get_sms",
		data: {id_mensaje: id}
	})
	.done(function( msg ) {

		bootbox.dialog({
		message: msg,
		title: "Mensaje",
		buttons: {
			success: {
			label: "Cerrar",
			className: "btn-success",
			callback: function() {
				}
			}
		}
	});

	});
}
function eliminar(id)
{
	$.ajax({
		type: "POST",
		url: "/ov/cgeneral/del_sms",
		data: {id_mensaje: id}
	})
	.done(function( msg ) {

		bootbox.dialog({
		message: "Tu mensaje ha sido borrado",
		title: "Alerta",
		buttons: {
			success: {
			label: "Ok!",
			className: "btn-success",
			callback: function() {
				location.href='';
				}
			}
		}
	});

	});
}
</script>