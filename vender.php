<?php
session_start();
include_once "encabezado.php";
if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
<div class="col-xs-12">
	<h1>Vender</h1>
	<?php
	if (isset($_GET["status"])) {
		if ($_GET["status"] === "1") {
	?>
			<div class="alert alert-success">
				<strong>¡Correcto!</strong> Venta realizada correctamente
			</div>
		<?php
		} else if ($_GET["status"] === "2") {
		?>
			<div class="alert alert-info">
				<strong>Venta cancelada</strong>
			</div>
		<?php
		} else if ($_GET["status"] === "3") {
		?>
			<div class="alert alert-info">
				<strong>Ok</strong> vuelo quitado de la lista
			</div>
		<?php
		} else if ($_GET["status"] === "4") {
		?>
			<div class="alert alert-warning">
				<strong>Error:</strong> El vuelo que buscas no existe
			</div>
		<?php
		} else if ($_GET["status"] === "5") {
		?>
			<div class="alert alert-danger">
				<strong>Error: </strong>El vuelo está agotado
			</div>
		<?php
		} else {
		?>
			<div class="alert alert-danger">
				<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
			</div>
	<?php
		}
	}
	?>
	<br>
	<form method="post" action="agregarAlCarrito.php">
		<label for="modelo">Modelo:</label>
		<input autocomplete="off" autofocus class="form-control" name="modelo" required type="text" id="modelo" placeholder="Escribe el Modelo">
	</form>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Modelo</th>
				<th>Capacidad de maletas</th>
				<th>ID de piloto</th>
				<th>Capacidad de pasajeros</th>
				<th>Tipo de avión</th>
				<th>Lugar salida</th>
				<th>Destino</th>
				<th>Peso máximo</th>
				<th>Altura máxima</th>
				<th>Disponible</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Total</th>
				<th>Quitar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($_SESSION["carrito"] as $indice => $vuelo) {
				$granTotal += $vuelo->total;
			?>
				<tr>
					<td><?php echo $vuelo->id ?></td>
					<td><?php echo $vuelo->modelo ?></td>
					<td><?php echo $vuelo->Capacidad_maletas ?></td>
					<td><?php echo $vuelo->id_empleado ?></td>
					<td><?php echo $vuelo->capacidad_pasajeros ?></td>
					<td><?php echo $vuelo->tipo_avion ?></td>
					<td><?php echo $vuelo->lugar_salida ?></td>
					<td><?php echo $vuelo->destino ?></td>
					<td><?php echo $vuelo->peso_max ?></td>
					<td><?php echo $vuelo->altura_max ?></td>
					<td><?php echo $vuelo->disponible ?></td>
					<td><?php echo $vuelo->precio ?></td>
					<td>
						<form action="cambiar_cantidad.php" method="post">
							<input name="indice" type="hidden" value="<?php echo $indice; ?>">
							<input min="1" name="cantidad" class="form-control" required type="number" step="1" value="<?php echo $vuelo->cantidad; ?>">
						</form>
					</td>
					<td><?php echo $vuelo->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<h3>Total: <?php echo $granTotal; ?></h3>
	<form action="./terminarVenta.php" method="POST">
		<input name="total" type="hidden" value="<?php echo $granTotal; ?>">
		<button type="submit" class="btn btn-success">Terminar venta</button>
		<a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
	</form>
</div>
<?php include_once "pie.php" ?>