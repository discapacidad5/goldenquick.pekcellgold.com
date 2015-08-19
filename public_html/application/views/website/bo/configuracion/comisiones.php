			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
					<span>> <a href="/bo/configuracion/"> Configuracion </a>
					> Comisiones
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
	}elseif ($this->session->flashdata('correcto')) {
		echo '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Correcto </strong> '.$this->session->flashdata('correcto').'
			</div>';
	}
	?>		
	<div class="well">
 <fieldset>
	<legend>Categoria</legend>
		<div class="row">
			<? foreach ($categorias as $categoria ) { ?>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<a href="/bo/comisiones/editar?id=<?= $categoria->id_grupo ?>">
						<div class="well well-sm txt-color-white text-center link_dashboard" style="background:#60a917">
							<i class="fa fa-tags  fa-3x"></i>
							<h5><?= $categoria->descripcion." ( ".$categoria->red." )";?></h5>
						</div>	
					</a>
				</div>
			<?php } ?>
		</div>
</fieldset>

	
				<div class="row">         
			        <!-- a blank row to get started -->
			        <div class="col-md-4">
			            <br />
			            <br />
			        </div>
		        </div>
			</div>
			<!-- END MAIN CONTENT -->
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
