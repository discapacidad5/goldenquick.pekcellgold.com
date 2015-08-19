
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-pencil-square-o"></i> 
					<a href="/bo/dashboard">Dashboard</a>
				<span>>
					<a href="/bo/comisiones">Comisiones</a>
				</span>
				<span>>
					<a href="/bo/comisiones/uno">Bono uno</a>
				</span>
				<span>>
					Parcial
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
				<div class="jarviswidget" id="wid-id-01" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false"	>
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
						<h2>Bono de inicio r&aacute;pido</h2>				
						
					</header>

					<!-- widget div-->
					<div>
						
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body">

							<form id="comision" action="/bo/comisiones/parcial_uno" method="POST" class="smart-form">
								<fieldset>
									<legend>Periodo</legend>
									<div class="row">
										<section class="col col-5">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input required id="from" value="<?=(isset($from)) ? $from : '' ?>" type="text" name="from" placeholder="Fecha de inicio">
											</label>
										</section>
										<section class="col col-5">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" id="to" value="<?=(isset($to)) ? $to : '' ?>" name="to" placeholder="Fecha de final">
											</label>
										</section>
										<section class="col col-2">
											<a onclick="consulta()" class="text-color" href="#"><h4><i class=" fa fa-book"></i> Consultar</h4></a>
										</section>
									</div>
								</fieldset>
							</form>
							<div>
									<div class="row">&nbsp;</div>
									<table id="datatable_abc" class="table table-striped table-bordered" width="100%">
								        <thead>
								            <tr>
								            	<th class="text-center">ID</th>
							                    <th class="text-center">Nombre</th>
							                    <th class="text-center">Nivel</th>
							                    <th class="text-center">Comision</th>
							                    <th class="text-center">Impuesto</th>
							                    <th class="text-center">Total</th>
							                    <th class="text-center">Banco</th>
							                    <th class="text-center">Cuenta</th>
								            </tr>
								        </thead>
			
								        <tbody>
								        	<?if(isset($ventas2)){ foreach ($ventas2 as $venta) {
								        	?>
								            <tr>
								                <td><?=$venta->id_user?></td>
								                <td><?=$nombres[$venta->id_user][0]->nombre." ".$nombres[$venta->id_user][0]->apellido?></td>
								                <td><?=$rango[$venta->id_user]->rango?></td>
								                <td><?=$segundo_sandwich[$venta->id_user]?></td>
								                <td>Ninguno</td>
								                <td><?=$segundo_sandwich[$venta->id_user]?></td>
								                <td>Banco</td>
								                <td>Cuenta</td>
								            </tr>
								            <?}}?>
								        </tbody>
									</table>

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
<!-- END MAIN CONTENT -->
	<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
	<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
	<script src="/template/js/validacion.js"></script>
	<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {

$.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: 'Ant',
 nextText: 'Sig',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);

	  $( "#from" ).datepicker({
		numberOfMonths: 2,
		dateFormat:"yy-mm-dd",
		defaultDate: "<?=date('Y-m-d')?>",
		changeMonth: true,
		onClose: function( selectedDate ) {
		$( "#to" ).datepicker( "option", "minDate", selectedDate );
		}
		});
		$( "#to" ).datepicker({
		numberOfMonths: 2,
		dateFormat:"yy-mm-dd",
		defaultDate: "<?=date('Y-m-d')?>",
		maxDate: "<?=date('Y-m-d')?>", 
		changeMonth: true,
		onClose: function( selectedDate ) {
		$( "#from" ).datepicker( "option", "maxDate", selectedDate );
		}
	});

	/* COLUMN FILTER  */
		    var otable = $('#datatable_abc').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true	
			
		    });
		    /* END COLUMN FILTER */

	pageSetUp();

})
function consulta()
{

	$("#comision").submit();
	
}
</script>