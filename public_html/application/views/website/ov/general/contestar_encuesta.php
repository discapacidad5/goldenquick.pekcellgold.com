<div id="content">

	<!-- Bread crumb is created dynamically -->
	<!-- row -->
	<div class="row">

		<!-- col -->
		<div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
			<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-file-o"></i> <a href="encuestas">Encuestas</a> <span>>
				<?php echo $encuesta[0]->nombre ?> </span></h1>
		</div>
		<!-- end col -->

		<!-- right side of the page with the sparkline graphs -->
		<!-- col -->
		

	</div>
	<!-- end row -->

	<!-- row -->
	<div class="row">

		<div class="col-sm-12">

			<div class="well">

				<table class="table table-striped table-forum">
					<thead>
						<tr>
							<th colspan="2"><h3 class="text-primary"><?php echo $encuesta[0]->nombre ?></h3></th>
						</tr>
					</thead>
					<tbody>
						<?php
							for($i=0;$i<sizeof($pregunta);$i++)
							{
								echo '	<tr>
											<td class="text-center"> &nbsp; <strong>'.($i+1).'</strong></a></td>
											<td>'.$pregunta[$i]->pregunta.'</td>
										</tr>
										<tr>
											<td class="text-center" style="width: 12%;">
											</td>
											<td>
												<form class="smart-form" id="pregunta_'.$i.'">
													<div class="row">';
														for($j=0;$j<sizeof($respuesta);$j++)
														{
															if($respuesta[$j]->id_pregunta==$pregunta[$i]->id_pregunta)
															{
																echo '	<label class="radio">
																			<input type="radio" name="radio" id="pregunta'.$i.'" value="'.$respuesta[$j]->id_respuesta.'" checked="checked">
																			<i></i>'.$respuesta[$j]->respuesta.'
																		</label>';
															}
														}
														echo'
													</div>
												</form>
											</td>
										</tr>';
							}
						?>
						<tr>
							<td></td>
							<td><a onclick="enviar_encuesta(<?php echo $encuesta[0]->id_encuesta ?>)" class="btn btn-success pull-right"><i class="fa fa-check"></i> Enviar encuesta</a></td>
						</tr>
						
						<!-- end Post -->

						<!-- Post -->

					</tbody>
					
				</table>
				

			</div>
		</div>

	</div>

	<!-- end row -->

</div>
<!-- END MAIN CONTENT -->
<div class="row">         
         <!-- a blank row to get started -->
	<div class="col-sm-12">
    	<br />
    	<br /> 
    </div>
</div> 
<script>
	function enviar_encuesta(id)
	{
			<?php for($i=0;$i<sizeof($pregunta);$i++)
			{
				echo 'var respuesta'.$i.'=$("#pregunta_'.$i.' input[type=\'radio\']:checked").val();';
			}?>
			var respuestas={<?php for($i=0;$i<sizeof($pregunta);$i++)
			{
				echo '"resp'.$i.'":respuesta'.$i.',';
			}
			echo '"id":id'?>}
			$.ajax({
				 data:{info:JSON.stringify(respuestas)},
		         type: "get",
		         url: "guardar_encuesta",
		         success: function(){
		              alert("Se ha enviado la encuesta. Gracias por tu participación");
		              window.location.href = '/ov/cgeneral/encuestas';
		         }
			});
	}
</script>