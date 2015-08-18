<div class="row">
<?php if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Error </strong> '.$this->session->flashdata('error').'
			</div>'; 
	}
?>	
	<div class="row">
	<form class="smart-form col-xs-12 col-sm-6 col-md-7 col-lg-12" id="reporte-form" method="post" enctype="multipart/form-data" action = "editar_archivo">
		<?php $nombre_completo = $presentacion[0]->ruta; 
			  $nombre = substr ( $presentacion[0]->ruta,9);?>
		<div class="row">
			<input name="id_presentacion" class="hide" type="text" id="id_presentacion" value='<?php echo $presentacion[0]->id_archivo;?>'>
			<input name="ruta" class="hide" type="text" id="ruta" value='<?php echo $presentacion[0]->ruta;?>'>
			<input name="nombre_archivo" class="hide" type="text" id="nombre_archivo" value='<?php echo $nombre;?>'>
			<input name="nombre_completo" class="hide" type="text" id="nombre_completo" value='<?php echo $nombre_completo;?>'>
		
			<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos" style="padding-right: 70px ! important;">
				<label class="label" style="padding-left: 50px;">
				Grupo
				</label>
				
				<label class="select" style="padding-left: 50px;">
						<select name="grupo_frm" id="grupo_frm">
							<?php for($o=0;$o<sizeof($grupos);$o++){
								
								if($grupos[$o]->id == $presentacion[0]->id_grupo){
									echo '<option selected value="'.$grupos[$o]->id.'">'.$grupos[$o]->descripcion.'</option>';
								}
								else {
									echo '<option value="'.$grupos[$o]->id.'">'.$grupos[$o]->descripcion.'</option>';
								}
							}
							?>
						</select>
					<i></i>
				</label>
			</section>
		</div>
										
		<div class="row">
			<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos" style="padding-right: 70px ! important;">
				<label class="label" style="padding-left: 50px;">
					Nombre de la presentacion
				</label>
				
				<label class="input" style="padding-left: 50px;">	
					<input required name="nombre_publico" placeholder="Nombre" type="text" id="nombre_publico" value='<?php echo $presentacion[0]->nombre_publico;?>'>
				</label>	
			</section>
		</div>
		
		<div class="row">
			<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos" style="padding-right: 70px ! important;">
				<label class="label" style="padding-left: 50px;">
					Descripcion
				</label>
				<label class="textarea" style="padding-left: 50px;">							
					<textarea required rows="3" class="custom-scroll" name="desc_frm" id="desc_frm"><?php echo html_entity_decode($presentacion[0]->descripcion);?></textarea>
				</label>
			</section>
		</div>
		
		<div class="row" class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos" style="padding-right: 70px ! important;">
		<section>
		
		
			<label class="label" style="padding-left: 65px;">Archivo</label>
			<div class="input input-file" style="padding-left: 65px;">
			<span class="button"><input id="userfile" name="userfile" onchange="this.parentNode.nextSibling.value = this.value" type="file">Buscar</span><input name="file_nme" placeholder='<?php echo $nombre;?>' readonly="" id="file_frm" type="text">
			</div>
		</section>
		
		</div>
		
		<div class="row">
			<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-6" id="div_subir" style="padding-right: 70px ! important;">
																			
				<div class="col col-lg-6 col-md-6 col-sm-7 col-xs-9" style="padding-left: 50px;">
					<input type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" id="boton_subir" value="Actualizar archivo" onclick = "agregar_presentacion()">
				</div>
			</section>
		</div>
		
	</form>
</div>
</div>
									
<style>
.link
{
	margin: 0.5rem;
}
.minh
{
	padding: 50px;
}
.link a:hover
{
	text-decoration: none !important;
}
</style>

<script type="text/javascript">	
							
function agregar_presentacion()
{
	
	var grupo = $("#grupo_frm").val();
	var nombre_publico = $("#nombre_publico").val();
	var descripcion = $("#desc_frm").val();
	var archivo = $("#userfile").val();
	var ruta = $("#ruta").val();
	var id_presentacion = $("#id_presentacion").val();
	var la_ruta_tiene_algo_nuevo = true;
	var nombre_archivo = $("#nombre_archivo").val();
	
	if(grupo==0)
	{
		alert('Olvidaste elegir un grupo para la presentacion');
	}
	else
	{
		if(nombre_publico=='')
		{
			alert('Olvidaste escribir un nombre para la presentacion');
		}
		else
		{
			if(descripcion=='')
			{
				alert('Olvidaste escribir una descripcion para la presentacion');
			}
			else
			{
			}
			
		}
	}
	
}
</script>