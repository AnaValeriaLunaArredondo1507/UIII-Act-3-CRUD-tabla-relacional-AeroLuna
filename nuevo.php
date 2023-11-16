<?php
#Salir si alguno de los datos no está presente
if
(!isset($_POST["modelo"]) || 
!isset($_POST["Capacidad_maletas"]) || 
!isset($_POST["id_empleado"]) || 
!isset($_POST["capacidad_pasajeros"]) || 
!isset($_POST["tipo_avion"]) || 
!isset($_POST["lugar_salida"]) || 
!isset($_POST["destino"]) || 
!isset($_POST["peso_max"]) || 
!isset($_POST["altura_max"]) || 
!isset($_POST["disponible"]) || 
!isset($_POST["precio"]))
 exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$modelo = $_POST["modelo"];
$Capacidad_maletas = $_POST["Capacidad_maletas"];
$id_empleado = $_POST["id_empleado"];
$capacidad_pasajeros = $_POST["capacidad_pasajeros"];
$tipo_avion = $_POST["tipo_avion"];
$lugar_salida = $_POST["lugar_salida"];
$destino = $_POST["destino"];
$peso_max = $_POST["peso_max"];
$altura_max = $_POST["altura_max"];
$disponible = $_POST["disponible"];
$precio = $_POST["precio"];

$sentencia = $base_de_datos->prepare("INSERT INTO `vuelos`(`modelo`, `Capacidad_maletas`, `id_empleado`, `capacidad_pasajeros`, `tipo_avion`, `lugar_salida`, `destino`,`peso_max`, `altura_max`, `disponible`, `precio`)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$modelo, $Capacidad_maletas, $id_empleado, $capacidad_pasajeros, $tipo_avion, $lugar_salida, $destino, $peso_max, $altura_max, $disponible, $precio]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>