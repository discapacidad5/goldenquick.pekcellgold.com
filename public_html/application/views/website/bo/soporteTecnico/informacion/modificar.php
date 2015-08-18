<div class="row">
<?php

		if ($this->session->flashdata ( 'error' )) {
			echo '<div class="alert alert-danger fade in">
										<button class="close" data-dismiss="alert">
											×
										</button>
										<i class="fa-fw fa fa-check"></i>
										<strong>Error </strong> ' . $this->session->flashdata ( 'error' ) . '
					</div>';
		}
		?>	
		<?php $nombre_completo = $archivo[0]->ruta; 
			  $nombre = substr ( $archivo[0]->ruta,16);?>
	<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<form class="smart-form" id="reporte-form" class="smart-form" method="post" action="/bo/configuracion/ActualizarArchivo_soporte_tecnico" enctype="multipart/form-data" >
			<input type="text" name="id" value="<?php echo $archivo[0]->id_archivo; ?>" class="hide">
			<div class="row">
				<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
					id="busquedatodos">
					<label class="label">Grupo</label> <label class="select"> 
						<select name="grupo" id="grupo" required>
							<option value="0">Selecciona el grupo</option>
								<?php foreach ( $grupos as $grupo ) {
									if ($grupo->id == $archivo[0]->id_grupo) { ?>
										<option value="<?php echo $grupo->id; ?>" selected><?php echo $grupo->descripcion; ?></option>
									<?php }else{ ?>
										<option value="<?php echo $grupo->id; ?>"><?php echo $grupo->descripcion; ?></option>
								<?php }} ?>
							</select>
					</label>
					
					<input type="text" class="hide" value="<?php echo $id_red; ?>" name="id_red">
				</section>

			</div>
			<div class="row">
				<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
					id="busquedatodos">
					<label class="label">Nombre del archivo</label> <label class="input">
						<input name="nombre" placeholder="Nombre" type="text"
						id="nombre_publico"
						value="<?php echo $archivo[0]->nombre_publico; ?>" required>
					</label>
				</section>
			</div>
			
			<div class="row">
				<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
					id="busquedatodos">
					<label class="label">Descripcion</label> <label class="textarea"> <textarea
							rows="3" class="custom-scroll" name="descripcion"
							id="descripcion" required><?php echo $archivo[0]->descripcion; ?></textarea>
					</label>
				</section>
			</div>
			<div class="row">
			
				<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
					id="busquedatodos">
					<label class="label">Estado</label> <label class="select"> 
						<select name="estado" id="estado" required>
								<?php if($archivo[0]->status == "ACT") { ?>
										<option value="ACT" selected>Activado</option>
										<option value="DES">Desactivado</option>
									<?php }else{ ?>
										<option value="ACT">Activado</option>
										<option value="DES" selected>Desactivado</option>
								<?php } ?>
							</select>
					</label>
				</section>

			</div>
			<div class="row">

				<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos">
					<label class="label">Archivo</label>
					<div class="input input-file">
						<span class="button">
						<input id="file" onchange="this.parentNode.nextSibling.value = this.value" name="userfile1" type="file" >Buscar
															</span><input name="file_nme"
																	placeholder='<?php echo $nombre;?>'
																	type="text" id="file_frm" required readonly="readonly">
															</div>
														</section>
			</div>
			<div class="row">
				<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
					id="div_subir">
					<div class="col col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
					<div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<input type="submit"
							class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12"
							 value="Actualizar Archivo">
					</div>
				</section>
			</div>
		</form>
	</div>
</div>

<style>
.link {
	margin: 0.5rem;
}

.minh {
	padding: 50px;
}

.link a:hover {
	text-decoration: none !important;
}
</style>

