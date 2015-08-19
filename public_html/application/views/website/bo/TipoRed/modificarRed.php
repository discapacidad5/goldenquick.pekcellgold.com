<div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; margin-right: 0px; margin-left: 0px; padding-bottom: 3rem;" class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<form action="/bo/tipo_red/actualizar_red" method="POST" role="form">
	
		<div class="form-group">
			
			<input type="text" class="hide" name="id" value = '<?= $id_red;?>' >
			
			<label for="">Nombre</label>
			<input type="text" class="form-control" name="nombre" value = '<?= $datosDeRed[0]->nombre;?>'>

			<label for="">Descripcion</label>
			<textarea class="form-control" name="descripcion" ><?= $datosDeRed[0]->descripcion;?></textarea>
		</div>
		<button type="submit" class="btn btn-success" >Actualizar</button>
	</form>
</div>
</div>