<?php
session_start();

include '../Includes/conexion.php'; 

$conexion = new Conexion();
$conn = $conexion->getConectar();


if (!isset($_SESSION['rol']) || ($_SESSION['rol'] !== 'vendedor' && $_SESSION['rol'] !== 'admin')) {
    header('Location: ../intranet.php');
    exit();
}


$sql_ventas = "SELECT v.id_venta, v.fecha, v.total, c.nombre AS cliente_nombre
               FROM ventas v
               JOIN clientes c ON v.id_cliente = c.id_cliente
               ORDER BY v.fecha DESC"; 
$resultado_ventas = $conn->query($sql_ventas);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Historial de Ventas - Titishop</title>
    <link rel="stylesheet" href="vendedor.css" />
    <link rel="stylesheet" href="historial.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
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
                <li><a href="historial.php">Historial de Ventas <i class="fas fa-history"></i></a></li>
                <li><a href="../logout.php">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </nav>
    </header>

    <main class="dashboard-content">
        <section class="sales-history-section">
            <h1>Historial de Ventas</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID Venta</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultado_ventas->num_rows > 0) {
                        while ($venta = $resultado_ventas->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $venta['id_venta'] . "</td>";
                            echo "<td>" . $venta['cliente_nombre'] . "</td>";
                            echo "<td>" . $venta['fecha'] . "</td>";
                            echo "<td>" . $venta['total'] . "</td>";
                            echo "<td><a href='detalle_venta.php?id=" . $venta['id_venta'] . "'>Ver detalles</a></td>"; 
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se han realizado ventas aún.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>