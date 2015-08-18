 <div class="row">
 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<img alt="<?php  echo $usuario[0]->nombre; ?>" src="<?php echo $img_perfil; ?>" style="max-width: 100%; max-height: 100%">
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="demo-icon-font">Pais
				<img class="flag flag-<?php echo strtolower($pais); ?>" >
            </div>
			<div class="row">
				Id: <b><?php echo $id; ?></b>
			</div>
			<div class="row">
				Username: <b><?php echo $username; ?></b>
			</div>
			<div class="row">
				Nombre: <b><?php echo $usuario[0]->nombre; ?></b>
			</div>
			<div class="row">
				Apellido: <b><?php echo $usuario[0]->apellido; ?></b>
			</div>
			<div class="row">
				Nivel Alcanzado: <b>Diamante</b>
			</div>
			<div class="row">
				Compras: <b>$ <?php echo number_format($compras,2); ?></b>
			</div>
			<div class="row">
				Comision: <b>$ <?php echo number_format($comision,2); ?></b>
			</div>
		</div>
	</div>
</div>