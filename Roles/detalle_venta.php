<?php
session_start();

include '../Includes/conexion.php';

$conexion = new Conexion();
$conn = $conexion->getConectar();

$mensaje = "";

$venta_id = isset($_GET['id']) ? $_GET['id'] : 0;

if ($venta_id == 0) {
    header('Location: historialventas.php');
    exit();
}

$sql_detalles = "SELECT dv.id_producto, p.nombre, dv.cantidad, dv.subtotal
                 FROM detalle_venta dv
                 JOIN productos p ON dv.id_producto = p.id_producto
                 WHERE dv.id_venta = ?";
$stmt_detalles = $conn->prepare($sql_detalles);
$stmt_detalles->bind_param("i", $venta_id);
$stmt_detalles->execute();
$resultado_detalles = $stmt_detalles->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detalles de Venta - TiTiShop</title>
    <link rel="stylesheet" href="vendedor.css" />
    <link rel="stylesheet" href="historial.css" />
</head>
<body>
    <header class="navbar">
        <a href="#" class="logo">
            TiTiShop - Vista de Vendedor
        </a>
        <nav>
            <ul class="nav-links">
                <li><a href="registroventas.php">Registrar Venta <i class="fas fa-cash-register"></i></a></li>
                <li><a href="consultar_stock.php">Consultar Stock <i class="fas fa-boxes"></i></a></li>
                <li><a href="#">Historial de Ventas <i class="fas fa-history"></i></a></li>
                <li><a href="../logout.php">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </nav>
    </header>

    <main class="dashboard-content">
        <section class="sale-details-section">
            <h1>Detalles de Venta</h1>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultado_detalles->num_rows > 0) {
                        while ($detalle = $resultado_detalles->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $detalle['nombre'] . "</td>";
                            echo "<td>" . $detalle['cantidad'] . "</td>";
                            echo "<td>" . $detalle['subtotal'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No hay detalles para esta venta.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>