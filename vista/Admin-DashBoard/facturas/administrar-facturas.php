<div class="main_content_iner ">
	<div class="container-fluid p-0">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="white_box mb_30">
					<div class="main-page">
						<div class="tables">
							<h3 class="title1">Lista de Facturas</h3>
							<div class="table-responsive bs-example widget-shadow">
								
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>ID Factura</th>
											<th>Nombre Cliente</th>
											<th>Total</th>
											<th>Fecha Facturación</th>
											<th>Acción</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($fac as $factura) { ?>
										<tr>
											<th scope="row"><?= $factura->id_factura ?></th>
											<td><?= $factura->nombreCli ?></td>
											<td><?= $factura->total ?></td>
											<td><?= $factura->fechaemision ?></td>
											<td><a href="?c=factura&a=verFactura&id=<?= $factura->id_factura ?>">Detalle
													Factura</a></td>

										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>