	
<div class="well">
 <fieldset>
		<div class="row">
			<? foreach ($bancos as $banco ) { ?>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<a onclick="Enviar(<?= $banco->id_banco ?>,<?= $id_mercancia ?>,<?= $cantidad ?>,<?= $dni ?>,<?= $id_afiliado ?>)">
						<div class="well well-sm txt-color-white text-center link_dashboard" style="background:#60a917">
							<i class="fa fa-bank fa-3x"></i>
							<h5><?= $banco->descripcion; ?></h5>
						</div>	
					</a>
				</div>
			<?php } ?>
		</div>
</fieldset>
</div>
<script type="text/javascript">
	function Enviar(banco, id, cantidad, dni, id_afiliado){
		bootbox.dialog({
			message: "Estas Seguro(a) <br> El pago tendra un plazo de 24 horas para ser realizado de lo contrarrio debera realizar de nuevo la peticion",
			title: "Pago",
			className: "",
			buttons: {
				success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {
						Registrar(id,cantidad,banco,dni,id_afiliado);
					}
				},
			cancelar: {
				label: "Cancelar",
				className: "btn-danger",
				callback: function() {
					}
				}
			}
		})
	}
	function Registrar(id,cantidad,banco,dni,id_afiliado){
		$.ajax({
			data:{
				id_mercancia : id,
				cantidad : cantidad,
				dni : dni,
				id_afiliado : id_afiliado,
				banco : banco,
				usr : <?php if(isset($_GET['usr'])){ echo $_GET['usr']; } else { echo '0'; } ?>
				},
			type:"post",
			url:"RegistrarVentaConsignacionWebPersonal",
			success: function(msg){
				bootbox.dialog({
					message: msg,
					title: "Pago",
					className: "",
					buttons: {
						success: {
						label: "Aceptar",
						className: "btn-success",
						callback: function() {
							 window.location="";
							}
						}
					}
				})
			}
		});	
	}
</script>
