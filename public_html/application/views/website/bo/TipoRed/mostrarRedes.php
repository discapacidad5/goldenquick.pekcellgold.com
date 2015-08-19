 <!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>> <a href="/bo/configuracion/"> Configuracion </a>
				> <a href="/bo/configuracion/tipoRed"> Tipo De Red </a>
				>	Listar
				</span>
			</h1>
		</div>
	</div>
<?php if($this->session->flashdata('exito')) {
		echo '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Exito</strong> '.$this->session->flashdata('exito').'
			</div>'; 
	}
?>
<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
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

					<!-- widget div-->
	<div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<legend>Mostrar Redes</legend>
		<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($redes as $red) {?>
				<tr>
					<td><?= $red->id;?></td>
					<td><?= $red->nombre;?></td>
					<td><?= $red->descripcion;?></td>
					<td>
					<a onclick="modificar(<?= $red->id;?>)" href="#" title="Modificar">
					    <i class="txt-color-blue fa fa-pencil fa-3x fa-3x">
					    </i>
					</a>
					<a onclick="eliminar(<?= $red->id;?>)" href="#" title="Modificar">
						<i class="txt-color-red fa fa-trash-o fa-3x "></i>
						</i>
					</a>
					</td>
				</tr>
			<? } ?>
		</tbody>
	</table>
	</div>
	</div>
  </div>
  </div>
</article>
</div>
</section>
</div>
<script type="text/javascript">
function modificar(id_red)
{

$.ajax({
	type: "POST",
	url: "/bo/tipo_red/modificar_red",
	data: {id: id_red},
})
.done(function( msg )
{
	bootbox.dialog({
	message: msg,
	title: 'Atención !!!',
})//fin done ajax
});//Fin callback bootbox
}
function eliminar(id) {

	$.ajax({
		type: "POST",
		url: "/auth/show_dialog",
		data: {message: '¿ Esta seguro que desea Eliminar la Tipo de red ?'},
	})
	.done(function( msg )
	{
		bootbox.dialog({
		message: msg,
		title: 'Atención !!!',
		buttons: {
			success: {
			label: "Aceptar",
			className: "btn-success",
			callback: function() {

					$.ajax({
						type: "POST",
						url: "/bo/admin/kill_tipo_red",
						data: {id: id}
					})
					.done(function( msg )
					{
						bootbox.dialog({
						message: msg,
						title: 'Atención !!!',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								location.href="/bo/tipo_red/mostrar_redes";
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
	});
}
</script>
