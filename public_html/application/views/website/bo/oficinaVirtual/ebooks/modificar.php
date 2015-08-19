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
	<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<form class="smart-form" id="reporte-form" method="post"
			action="ActualizarEbook" enctype="multipart/form-data">
			<input type="text" name="id" value="<?php echo $ebook[0]->id_archivo; ?>" class="hide">
			<div class="row">
				<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
					id="busquedatodos">
					<label class="label">Grupo</label> <label class="select"> <select
						name="grupo" id="grupo" required>
							<option value="0">Selecciona el grupo</option>
																<?php
																
																foreach ( $grupos as $grupo ) {
																	
																	if ($grupo->id == $ebook [0]->id_grupo) {
																		?>
																		<option value="<?php echo $grupo->id; ?>" selected><?php echo $grupo->descripcion; ?></option>
																	<?php }else{ ?>
																		<option value="<?php echo $grupo->id; ?>"><?php echo $grupo->descripcion; ?></option>
																<?php }} ?>
															</select>
					</label>
				</section>

			</div>
			<div class="row">
				<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
					id="busquedatodos">
					<label class="label">Nombre del e-book</label> <label class="input">
						<input name="nombre" id="nombre" placeholder="Nombre" type="text"
						id="nombre_publico"
						value="<?php echo $ebook[0]->nombre_publico; ?>" required>
					</label>
				</section>
			</div>
			<div class="row">
				<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
					id="busquedatodos">
					<label class="label">Descripcion</label> <label class="textarea"> <textarea
							rows="3" class="custom-scroll" name="descripcion"
							id="descripcion" required><?php echo $ebook[0]->descripcion; ?></textarea>
					</label>
				</section>
			</div>
			<div class="row">

				<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
					id="busquedatodos">
					<label class="label">Archivo</label>
					<div class="input input-file col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<span class="button"> <input id="file"
							onchange="this.parentNode.nextSibling.value = this.value"
							name="userfile1" type="file" >Buscar
						</span><input name="file_nme_2"
							placeholder="Seleccione una imagen para el e-book" type="text"
							id="file_frm_2" >
					</div>
				</section>
			</div>
			<div class="row">
				<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"
					id="busquedatodos">

					<label class="label">Imagen</label>
					<div class="no-padding col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<img style="max-height: 150px;"
							src="<?php echo $ebook[0]->url; ?>">
					</div>
					<div class="input input-file col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<span class="button"> <input id="file"
							onchange="this.parentNode.nextSibling.value = this.value"
							name="userfile2" type="file" >Buscar
						</span><input name="file_nme_2"
							placeholder="Seleccione una imagen para el e-book" type="text"
							id="file_frm_2" value="<?php echo $ebook[0]->nombre_completo; ?>"
							required>
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
							id="boton_subir" value="Actualizar E-Books">
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

<script type="text/javascript">	
							

</script>

