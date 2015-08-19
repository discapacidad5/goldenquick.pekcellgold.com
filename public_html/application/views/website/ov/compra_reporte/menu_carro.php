<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>> 
					Carrito de Compras
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
	if($this->session->flashdata('exito')) {
		echo '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong> </strong> '.$this->session->flashdata('exito').'
			</div>';
	}
?>	
<div class="well">
 <fieldset>
	<legend>Carrito de Compras</legend>
							<div class="row">
							<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
								<a href="carrito?tipo=1">
									<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>;">
										<i class="fa fa-user fa-3x"></i>
										<h5>Compra Personal</h5>
									</div>
								</a>
							</div>
							<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
								<a onclick="comprador()" style="cursor: pointer;">
									<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
										<i class="fa fa-group fa-3x"></i>
										<h5>Compra por otra persona</h5>
									</div>     
								</a>
							</div>
							<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
								<a href="carrito?tipo=3">
									<div class="well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_1_color?>;">
										<i class="fa fa-clock-o fa-3x"></i>
										<h5>Compra Autom&aacute;tica</h5>
									</div>
								</a>
							</div>
						</div>
		</fieldset>
</div>

</div>	
<script>
	function comprador()
	{
		$.ajax({
			type: "get",
			url: "select_af",
			success: function(msg){
				bootbox.dialog({
						message: msg,
						title: "Selecciona un afiliado",
						className: "",
				});
			}
		});
	}
	function enviar_carro()
	{
		if($("#afiliado_id").val()==0)
		{
			alert("Selecciona un afiliado");
		}
		else
		{
			var afiliado=$("#afiliado_id").val();
			if (confirm('¿Seguro que desea realizar una compra para este afiliado?')) {
			    window.location.assign("carrito?tipo=2&usr="+afiliado)
			} else {
			    // Do nothing!
			}
		}
	}
</script>