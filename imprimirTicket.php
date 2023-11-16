<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, fecha, total FROM ventas WHERE id = ?");
$sentencia->execute([$id]);
$venta = $sentencia->fetchObject();
if (!$venta) {
    exit("No existe venta con el id proporcionado");
}

$setenciaVuelos = $base_de_datos->prepare("SELECT v.modelo, v.lugar_salida, v.destino, v.precio, vv.cantidad
FROM vuelos v
INNER JOIN 
vuelos_vendidos vv
ON v.id = vv.id_vuelo
WHERE vv.id_venta = ?");
$setenciaVuelos->execute([$id]);
$vuelos = $setenciaVuelos->fetchAll();
if (!$vuelos) {
    exit("No hay vuelos");
}

?>
<style>
    * {
        font-size: 20px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        padding-top: 10px;
        padding-bottom: 10px;
        border-collapse: collapse;
    }

    td.vuelo,
    th.vuelo {
        width: 80px;
        max-width: 80px;
    }

    td.cantidad,
    th.cantidad {
        width: 175px;
        max-width: 175px;
        word-break: break-all;
    }

    td.precio,
    th.precio {
        width: 150px;
        max-width: 150px;
        word-break: break-all;
        text-align: right;
    }

    .centrado {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 700px;
        max-width: 700px;
    }

    img {
        border-radius: 50%;
        max-width: 100px;
        width: 100px;
    }

    @media print {

        .oculto-impresion,
        .oculto-impresion * {
            display: none !important;
        }
    }
</style>

<body>
    <div class="ticket">
        <h1><img src="./logo.jpg" alt="Logotipo">AeroLuna.</h1>
        <p class="centrado">TICKET DE VENTA
            <br><?php echo $venta->fecha; ?>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="vuelo">CANT</th>
                    <th class="precio">MODELO</th>
                    <th class="vuelo">SALIDA</th>
                    <th class="vuelo">DESTINO</th>
                    <th class="precio">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($vuelos as $vuelo) {
                    $subtotal = $vuelo->precio * $vuelo->cantidad;
                    $total += $subtotal;
                ?>
                    <tr>
                        <td class="vuelo"><?php echo $vuelo->cantidad;  ?></td>
                        <td class="precio"><?php echo $vuelo->modelo;  ?> </td>
                        <td class="cantidad"> <?php echo $vuelo->lugar_salida;  ?></td>
                        <td class="cantidad"><?php echo $vuelo->destino;  ?> <strong>$<?php echo number_format($vuelo->precio, 2) ?></strong></td>
                        <td class="precio">$<?php echo number_format($subtotal, 2)  ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="text-align: right;">TOTAL</td>
                    <td class="precio">
                        <strong>$<?php echo number_format($total, 2) ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
        </p>
    </div>
</body>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        window.print();
        setTimeout(() => {
            window.location.href = "./ventas.php";
        }, 1000);
    });
</script>