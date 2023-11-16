<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM  vuelos;");
$vuelos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Vuelos</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
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
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($vuelos as $vuelo){ ?>
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
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $vuelo->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $vuelo->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>