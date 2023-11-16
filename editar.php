<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM vuelos WHERE id = ?;");
$sentencia->execute([$id]);
$vuelo = $sentencia->fetch(PDO::FETCH_OBJ);
if($vuelo === FALSE){
	echo "¡No existe algún vuelo con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar vuelo con el ID <?php echo $vuelo->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $vuelo->id; ?>">
			<label for="modelo">Modelo:</label>
			<input value="<?php echo $vuelo->modelo ?>" class="form-control" name="modelo" required type="text" id="modelo" placeholder="Escribe el modelo">

			<label for="Capacidad_maletas">Capacidad de maletas:</label>
			<input value="<?php echo $vuelo->Capacidad_maletas ?>" class="form-control" name="Capacidad_maletas" required type="text" id="Capacidad_maletas" placeholder="Capacidad de maletas">

			<label for="id_empleado">ID del piloto:</label>
			<input value="<?php echo $vuelo->id_empleado ?>" class="form-control" name="id_empleado" required type="text" id="id_empleado" placeholder="ID del piloto">

			<label for="capacidad_pasajeros">Capacidad de pasajeros:</label>
			<input value="<?php echo $vuelo->capacidad_pasajeros ?>" class="form-control" name="capacidad_pasajeros" required type="number" id="capacidad_pasajeros" placeholder="Capacidad de pasajeros">

			<label for="tipo_avion">Tipo de avión:</label>
			<input value="<?php echo $vuelo->tipo_avion ?>" class="form-control" name="tipo_avion" required type="text" id="tipo_avion" placeholder="Escribe el tipo de avión">

			<label for="lugar_salida">Lugar de salida:</label>
			<input value="<?php echo $vuelo->lugar_salida ?>" class="form-control" name="lugar_salida" required type="text" id="lugar_salida" placeholder="Escribe el lugar de salida">

			<label for="destino">Destino:</label>
			<input value="<?php echo $vuelo->destino ?>" class="form-control" name="destino" required type="text" id="destino" placeholder="Escribe el Destino">

			<label for="peso_max">Peso máximo:</label>
			<input value="<?php echo $vuelo->peso_max ?>" class="form-control" name="peso_max" required type="text" id="peso_max" placeholder="Escribe el peso máximo">

			<label for="altura_max">Altura máxima:</label>
			<input value="<?php echo $vuelo->altura_max ?>" class="form-control" name="altura_max" required type="text" id="altura_max" placeholder="Escribe la altura máxima">

			<label for="disponible">Asientos disponibles:</label>
			<input value="<?php echo $vuelo->disponible ?>" class="form-control" name="disponible" required type="text" id="disponible" placeholder="Escribe los boletos disponibles">
			
			<label for="precio">Precio de vuelo:</label>
			<input value="<?php echo $vuelo->precio ?>" class="form-control" name="precio" required type="text" id="precio" placeholder="Escribe el precio">
			
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
