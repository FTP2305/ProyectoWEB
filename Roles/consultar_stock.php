<?php
session_start();

// Verificar que el vendedor esté logueado
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'vendedor') {
    header('Location: ../intranet.php');
    exit();
}

include '../Includes/conexion.php'; // Incluir la conexión a la base de datos

$conexion = new Conexion();
$conn = $conexion->getConectar();

// Cargar productos desde la base de datos
$sql_productos = "SELECT * FROM productos";
$resultado_productos = $conn->query($sql_productos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consultar Stock - Titishop</title>
    <link rel="stylesheet" href="vendedor.css" />
    <link rel="stylesheet" href="stock.css" />
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
        <section class="stock-section">
            <h1>Consultar Stock de Productos</h1>
            
            <table class="stock-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultado_productos->num_rows > 0) {
                        while ($producto = $resultado_productos->fetch_assoc()) {
                            // Obtener el nombre de la categoría
                            $categoria_id = $producto['id_categoria'];
                            $sql_categoria = "SELECT nombre_categoria FROM categorias WHERE id_categoria = ?";
                            $stmt_categoria = $conn->prepare($sql_categoria);
                            $stmt_categoria->bind_param("i", $categoria_id);
                            $stmt_categoria->execute();
                            $stmt_categoria->bind_result($nombre_categoria);
                            $stmt_categoria->fetch();
                            ?>
                            <tr>
                                <td><?php echo $producto['nombre']; ?></td>
                                <td><?php echo $nombre_categoria; ?></td>
                                <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                                <td><?php echo $producto['stock']; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='4'>No se encontraron productos.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>