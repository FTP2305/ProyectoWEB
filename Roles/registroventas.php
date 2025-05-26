<?php
session_start();

include '../Includes/conexion.php'; 

$conexion = new Conexion();
$conn = $conexion->getConectar();

$mensaje = "";


if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'vendedor') {
    header('Location: ../intranet.php');
    exit();
}


$sql_productos = "SELECT * FROM productos";
$resultado_productos = $conn->query($sql_productos);


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];


    $sql_producto = "SELECT nombre, precio, stock FROM productos WHERE id_producto = ?";
    $stmt_producto = $conn->prepare($sql_producto);
    $stmt_producto->bind_param("i", $producto_id);
    $stmt_producto->execute();
    $stmt_producto->bind_result($nombre_producto, $precio, $stock);
    $stmt_producto->fetch();


    if ($cantidad > $stock) {
        $mensaje = "No hay suficiente stock del producto: $nombre_producto. Quedan $stock unidades disponibles.";
    } else {
        if (!isset($_SESSION['productos'])) {
            $_SESSION['productos'] = [];
        }
        $_SESSION['productos'][] = [
            'producto_id' => $producto_id,
            'nombre' => $nombre_producto,
            'cantidad' => $cantidad,
            'precio' => $precio,
            'subtotal' => $precio * $cantidad
        ];

        $mensaje = "Producto '$nombre_producto' agregado correctamente.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['finalizar_venta'])) {
    $cliente_id = $_POST['cliente_id'];
    $total = 0;
    $productos = $_SESSION['productos'];

    $conn->begin_transaction();
    try {
        $sql_venta = "INSERT INTO ventas (id_cliente, total) VALUES (?, ?)";
        $stmt_venta = $conn->prepare($sql_venta);
        $stmt_venta->bind_param("id", $cliente_id, $total);
        $stmt_venta->execute();

        $venta_id = $stmt_venta->insert_id;

        $sql_detalle = "INSERT INTO detalle_venta (id_venta, id_producto, cantidad, subtotal) VALUES (?, ?, ?, ?)";
        $stmt_detalle = $conn->prepare($sql_detalle);

        foreach ($productos as $producto) {
            $stmt_detalle->bind_param("iiid", $venta_id, $producto['producto_id'], $producto['cantidad'], $producto['subtotal']);
            $stmt_detalle->execute();

            
            $sql_update_stock = "UPDATE productos SET stock = stock - ? WHERE id_producto = ?";
            $stmt_update_stock = $conn->prepare($sql_update_stock);
            $stmt_update_stock->bind_param("ii", $producto['cantidad'], $producto['producto_id']);
            $stmt_update_stock->execute();

            
            $total += $producto['subtotal'];
        }

       
        $sql_update = "UPDATE ventas SET total = ? WHERE id_venta = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("di", $total, $venta_id);
        $stmt_update->execute();

       
        $conn->commit();
        unset($_SESSION['productos']); 

        $mensaje = "Venta registrada exitosamente.";

    } catch (Exception $e) {

        $conn->rollback();
        $mensaje = "Error al registrar la venta: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Panel de Vendedor - Titishop</title>
    <link rel="stylesheet" href="vendedor.css" />
    <link rel="stylesheet" href="regisven.css" />
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
        <section class="register-sale-section">
            <h1>Registrar Venta</h1>
            <form method="POST" action="registroventas.php">
                
                <div class="form-group">
                    <label for="productos">Productos</label>
                    <div id="productos">
                        <select name="producto_id" required>
                            <?php
                            $resultado_productos->data_seek(0);
                            while ($producto = $resultado_productos->fetch_assoc()) {
                                echo "<option value='{$producto['id_producto']}'>".$producto['nombre']." - $".$producto['precio']."</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="cantidad" placeholder="Cantidad" min="1" required />
                        <button type="submit" name="add_product" class="submit-btn">Agregar Producto</button>
                    </div>
                </div>

                <div class="product-table">
                    <h3>Productos Agregados</h3>
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
                            if (isset($_SESSION['productos'])) {
                                foreach ($_SESSION['productos'] as $producto) { ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($producto['nombre']); ?></td> 
                                        <td><?php echo $producto['cantidad']; ?></td>
                                        <td><?php echo $producto['subtotal']; ?></td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="3">No hay productos agregados.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <button type="submit" name="finalizar_venta" class="submit-btn">Finalizar Venta</button>
            </form>
            <div class="mensaje">
                <?php echo $mensaje; ?>
            </div>
        </section>
    </main>
</body>
</html>