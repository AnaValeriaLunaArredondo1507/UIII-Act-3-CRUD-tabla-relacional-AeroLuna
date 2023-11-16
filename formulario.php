<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
	<label for="modelo">Modelo:</label>
			<input class="form-control" name="modelo" required type="text" id="modelo" placeholder="Escribe el modelo">

			<label for="Capacidad_maletas">Capacidad de maletas:</label>
			<input class="form-control" name="Capacidad_maletas" required type="text" id="Capacidad_maletas" placeholder="Capacidad de maletas">

			<label for="id_empleado">ID del piloto:</label>
			<input class="form-control" name="id_empleado" required type="text" id="id_empleado" placeholder="ID del piloto">

			<label for="capacidad_pasajeros">Capacidad de pasajeros:</label>
			<input class="form-control" name="capacidad_pasajeros" required type="number" id="capacidad_pasajeros" placeholder="Capacidad de pasajeros">

			<label for="tipo_avion">Tipo de avión:</label>
			<input class="form-control" name="tipo_avion" required type="text" id="tipo_avion" placeholder="Escribe el tipo de avión">

			<label for="lugar_salida">Lugar de salida:</label>
			<input class="form-control" name="lugar_salida" required type="text" id="lugar_salida" placeholder="Escribe el lugar de salida">

			<label for="destino">Destino:</label>
			<input class="form-control" name="destino" required type="text" id="destino" placeholder="Escribe el Destino">

			<label for="peso_max">Peso máximo:</label>
			<input class="form-control" name="peso_max" required type="text" id="peso_max" placeholder="Escribe el peso máximo">

			<label for="altura_max">Altura máxima:</label>
			<input class="form-control" name="altura_max" required type="text" id="altura_max" placeholder="Escribe la altura máxima">

			<label for="disponible">Boletos disponibles:</label>
			<input class="form-control" name="disponible" required type="text" id="disponible" placeholder="Escribe los boletos disponibles">

			<label for="precio">Precio de vuelo:</label>
			<input class="form-control" name="precio" required type="text" id="precio" placeholder="Escribe el precio">

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>