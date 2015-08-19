<table  id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th data-hide="phone">ID</th>
										<th data-class="expand">Fecha Solicitud</th>	
										<th data-hide="phone">Usuario</th>
										<th data-hide="phone">Banco</th>
										<th data-hide="phone">Cuenta</th>
										<th data-hide="phone">Titular</th>
										<th data-hide="phone">Clave</th>
										<th data-hide="phone,tablet">Metodo</th>
										<th data-hide="phone,tablet">Valor</th>
										<th data-hide="phone,tablet">Estado</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($cobros as $cobro) {?>
										<tr>
											<td><?php echo $cobro->id_cobro; ?></td>
											<td><?php echo $cobro->fecha; ?></td>
											<td><?php echo $cobro->usuario; ?></td>
											<td><?php echo $cobro->banco; ?></td>
											<td><?php echo $cobro->cuenta; ?></td>
											<td><?php echo $cobro->titular; ?></td>
											<td><?php echo $cobro->clabe; ?></td>
											<td><?php echo $cobro->metodo_pago; ?></td>
											<td>$ <?php echo number_format($cobro->monto,2); ?></td>
											<td><?php echo $cobro->estado; ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
