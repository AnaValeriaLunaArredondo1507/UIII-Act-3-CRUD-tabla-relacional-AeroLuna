<?php
if (!isset($_POST["modelo"])) {
    return;
}

$modelo = $_POST["modelo"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM vuelos WHERE modelo = ? LIMIT 1;");
$sentencia->execute([$modelo]);
$vuelo = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$vuelo) {
    header("Location: ./vender.php?status=4");
    exit;
}
# Si no hay existencia...
if ($vuelo->disponible < 1) {
    header("Location: ./vender.php?status=5");
    exit;
}
session_start();
# Buscar vuelo dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->modelo === $modelo) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $vuelo->cantidad = 1;
    $vuelo->total = $vuelo->precio;
    array_push($_SESSION["carrito"], $vuelo);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $vuelo->disponible) {
        header("Location: ./vender.php?status=5");
        exit;
    }
    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio;
}
header("Location: ./vender.php");
