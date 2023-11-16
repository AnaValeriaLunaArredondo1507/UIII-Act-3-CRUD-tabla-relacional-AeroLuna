<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	vuelos.modelo, '..',  vuelos.id_empleado, '..',  vuelos.tipo_avion, '..', vuelos_vendidos.cantidad SEPARATOR '__') AS vuelos FROM ventas INNER JOIN vuelos_vendidos ON vuelos_vendidos.id_venta = ventas.id INNER JOIN vuelos ON vuelos.id = vuelos_vendidos.id_vuelo GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Ventas</h1>
		<div>
			<a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>vuelos vendidos</th>
					<th>Total</th>
					<th>Ticket</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Modelo</th>
									<th>Piloto</th>
									<th>Cantidad</th>
									<th>Tipo de avión</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->vuelos) as $vuelosConcatenados){ 
								$vuelo = explode("..", $vuelosConcatenados)
								?>
								<tr>
									<td><?php echo $vuelo[0] ?></td>
									<td><?php echo $vuelo[1] ?></td>
									<td><?php echo $vuelo[3] ?></td>
									<td><?php echo $vuelo[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->total ?></td>
					<td><a class="btn btn-info" href="<?php echo "imprimirTicket.php?id=" . $venta->id?>"><i class="fa fa-print"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>