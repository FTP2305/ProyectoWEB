<?php
session_start();

include '../Includes/conexion.php'; 

$conexion = new Conexion();
$conn = $conexion->getConectar();

$mensaje = "";

// Redirigir si no es un vendedor o admin
if (!isset($_SESSION['rol']) || ($_SESSION['rol'] !== 'vendedor' && $_SESSION['rol'] !== 'admin')) {
    header('Location: ../intranet.php');
    exit();
}

// Obtener productos de la base de datos
$sql_productos = "SELECT * FROM productos";
$resultado_productos = $conn->query($sql_productos);

// Agregar producto al carrito
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];

    // Guardar cliente seleccionado en la sesión
    if (isset($_POST['cliente_id'])) {
        $_SESSION['cliente_id'] = $_POST['cliente_id'];  // Guardar el cliente seleccionado
    }

    // Validar existencia del producto y su stock
    $sql_producto = "SELECT nombre, precio, stock FROM productos WHERE id_producto = ?";
    $stmt_producto = $conn->prepare($sql_producto);
    $stmt_producto->bind_param("i", $producto_id);
    $stmt_producto->execute();
    $stmt_producto->bind_result($nombre_producto, $precio, $stock);
    $stmt_producto->fetch();

    if ($cantidad > $stock) {
        $mensaje = "No hay suficiente stock del producto: $nombre_producto. Quedan $stock unidades disponibles.";
    } else {
        // Verificar si el producto ya está en la sesión
        $producto_en_sesion = false;
        if (isset($_SESSION['productos'])) {
            foreach ($_SESSION['productos'] as &$producto) {
                if ($producto['producto_id'] == $producto_id) {
                    $producto['cantidad'] += $cantidad;  // Incrementar cantidad si ya está en el carrito
                    $producto['subtotal'] = $producto['precio'] * $producto['cantidad'];  // Actualizar subtotal
                    $producto_en_sesion = true;
                    break;
                }
            }
        }

        // Si no está en la sesión, agregarlo
        if (!$producto_en_sesion) {
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
        }

        $mensaje = "Producto '$nombre_producto' agregado correctamente.";

        // Redirigir para actualizar la página y mostrar los productos agregados
        header("Location: registroventas.php");
        exit();
    }
}

// Finalizar venta
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['finalizar_venta'])) {
    $cliente_id = $_POST['cliente_id'];
    $total = 0;
    $productos = $_SESSION['productos'];

    // Guardar cliente en la sesión
    $_SESSION['cliente_id'] = $cliente_id;

    $conn->begin_transaction();
    try {
        // Registrar venta
        $sql_venta = "INSERT INTO ventas (id_cliente, total) VALUES (?, ?)";
        $stmt_venta = $conn->prepare($sql_venta);
        $stmt_venta->bind_param("id", $cliente_id, $total);
        $stmt_venta->execute();

        $venta_id = $stmt_venta->insert_id;

        // Registrar detalles de la venta
        $sql_detalle = "INSERT INTO detalle_venta (id_venta, id_producto, cantidad, subtotal) VALUES (?, ?, ?, ?)";
        $stmt_detalle = $conn->prepare($sql_detalle);

        foreach ($productos as $producto) {
            $stmt_detalle->bind_param("iiid", $venta_id, $producto['producto_id'], $producto['cantidad'], $producto['subtotal']);
            $stmt_detalle->execute();

            // Actualizar stock de productos
            $sql_update_stock = "UPDATE productos SET stock = stock - ? WHERE id_producto = ?";
            $stmt_update_stock = $conn->prepare($sql_update_stock);
            $stmt_update_stock->bind_param("ii", $producto['cantidad'], $producto['producto_id']);
            $stmt_update_stock->execute();

            $total += $producto['subtotal'];
        }

        // Actualizar total de la venta
        $sql_update = "UPDATE ventas SET total = ? WHERE id_venta = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("di", $total, $venta_id);
        $stmt_update->execute();

        // Confirmar transacción
        $conn->commit();
        unset($_SESSION['productos']);  // Limpiar la sesión de productos después de la venta

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
                    <label for="cliente_id">Cliente</label>
                    <select name="cliente_id" required>
                        <option value="">Seleccionar cliente</option>
                        <?php
                        // Obtener clientes desde la base de datos
                        $sql_clientes = "SELECT id_cliente, nombre, apellidos FROM clientes";
                        $resultado_clientes = $conn->query($sql_clientes);

                        // Recuperar el cliente seleccionado de la sesión
                        $cliente_seleccionado = isset($_SESSION['cliente_id']) ? $_SESSION['cliente_id'] : '';

                        while ($cliente = $resultado_clientes->fetch_assoc()) {
                            // Marcar el cliente como seleccionado si coincide
                            $selected = ($cliente['id_cliente'] == $cliente_seleccionado) ? 'selected' : '';
                            echo "<option value='{$cliente['id_cliente']}' $selected>" . htmlspecialchars($cliente['nombre']) . " " . htmlspecialchars($cliente['apellidos']) . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="productos">Productos</label>
                    <div id="productos">
                        <select name="producto_id" required>
                            <option value="">Seleccionar producto</option>
                            <?php
                            $resultado_productos->data_seek(0); // Reiniciar el puntero de los productos
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
                            // Mostrar productos agregados al carrito
                            if (isset($_SESSION['productos'])) {
                                foreach ($_SESSION['productos'] as $producto) { ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                                        <td><?php echo $producto['cantidad']; ?></td>
                                        <td>S/ <?php echo number_format($producto['subtotal'], 2); ?></td>
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
