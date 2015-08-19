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
								Bloqueo
							</span>
						</h1>
					</div>
				</div>
				<div class="row">
					<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="well">
							<div class="row">
								<form class="smart-form" id="reporte-form" method="post">
									<div class="col col-xs-12 col-sm-6 col-md-4 col-lg-4">
										<fieldset>
											<legend>ALMACEN</legend>
											<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
												
												<label class="select">
													<select id="almacen" name="almacen" onchange="get_mercancias()">
														<option value="0" selected="" disabled="">Selecciona Almacen</option>
														<?foreach($almacenes as $almacen)
														{?> 
															<option value="<?=$almacen->id_almacen?>"><?=$almacen->nombre?></option>	
														<?}?>
														
														
													</select> <i></i> 
												</label>
											</section>
										</fieldset>
									</div>
									<div class="col col-xs-12 col-sm-6 col-md-4 col-lg-4">
										<fieldset>
											<legend>MERCANCIA</legend>
											<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
												
												<label class="select">
													<select id="mercancia" name="mercancia" onchange="get_existencia()">
														<option value="0" selected="" disabled="">Selecciona Mercancia</option>
														
														
													</select> <i></i> 
												</label>
											</section>
										</fieldset>
									</div>
									<div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<fieldset>
											<legend>ITEMS</legend>
											<section class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
												<label class="label">Disponibles</label>
												<label class="input state-disabled">
													<input type="text" id="existencia" class="input" disabled="disabled">
												</label>
												
											</section>
											<section class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
												<label class="label">Bloquear</label>
												<label id="block" class="input state-disabled">
													<input type="number" id="bloqueo" class="input" min="0" max="" disabled="disabled">
												</label>
											</section>
										</fieldset>
									</div>
								</form>		
								<a class="btn btn-warning pull-right" href="javascript:void(0);" onclick="bloquear()"><i class="fa fa-lock"></i> Bloquear</a>
							</div>
						</div>
					</article>					
				</div>
				<div class="row">
			        <div class="col-sm-12">
			            <br />
			            <br />
			        </div>
		        </div>
			</div>
		<script>
			$(document).ready(function() {
			 	
				pageSetUp(); 
				
			})
		</script>
		<script>
			function get_mercancias()
			{
				var id=$("#almacen").val();
				$.ajax({
					type : "post",
					url: "get_mercancia_almacen",
					data: {almacen:id}
				})
				.done(function(msg)
				{
					$("#mercancia").html(msg);
				});
			}
			function get_existencia()
			{
				var merca=$("#mercancia").val();
				$.ajax({
					type: "post",
					url: "get_existencia",
					data: {inventario:merca}
				})
				.done(function(msg)
				{
					$("#existencia").val(msg);
					$("#bloqueo").attr({
						"max" : msg
					});
					$("#block").removeClass("state-disabled");
					$("#bloqueo").prop('disabled', false);
				});
			}
			function bloquear()
			{
				var inventario=$("#mercancia").val();
				var bloqueo=$("#bloqueo").val();
				$.ajax({
					type: "post",
					url: "bloquear_mercancia",
					data: {inventario:inventario,cantidad:bloqueo}
				})
				.done(function(msg)
				{
					bootbox.dialog({
						message: "Se ha hecho el bloqueo de mercancia exitosamente.",
						title: "Exito",
						className: "",
						buttons: {
							success: {
								label: "Aceptar",
								className: "btn-success",
								callback: function(){
									window.location.href="/bo/logistico/bloqueo";
								}
							}
						}
					})
				});
			}
		</script>