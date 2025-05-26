<?php 
include '../Includes/conexion.php';

// Crear instancia de la clase Conexion
$conexion = new Conexion();
$conn = $conexion->getConectar();

// Búsqueda de cliente por nombre
$sql = "SELECT * FROM clientes";
if (isset($_POST['buscar'])) {
    $busqueda = $_POST['nombre_cliente'];
    $sql = "SELECT * FROM clientes WHERE nombre LIKE '%$busqueda%'";
}
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="clientelist.css"> <!-- Asegúrate que el CSS esté bien enlazado -->
</head>
<body>
    <div class="contenedor">
        <!-- Menú -->
        <div class="menu">
            <div class="menuIzquierda">
                <span class="title">Tienda Admin</span> 
            </div>
            <div class="menuDerecha">
                <div class="menus">
                    <a href="../Productos/listar.php">Productos</a>
                    <a href="../clientes/">Clientes</a>
                    <a href="#">Usuarios</a>
                    <a href="#">Ventas</a>
                    <a href="#">Reportes</a>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="contenido">
            <h2 class="centrar">📋 Listado de Clientes</h2>
            <div class="tabla" style="gap: 30px; align-items: flex-start;">
                <!-- Tabla de clientes -->
                <div class="tablaLeft" style="width: 65%;">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Dirección</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if ($resultado->num_rows > 0) {
                                while($row = $resultado->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row['id_cliente']; ?></td>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['correo']; ?></td>
                                        <td><?php echo $row['direccion']; ?></td>
                                    </tr>
                            <?php } 
                            } else {
                                echo "<tr><td colspan='4'>No se encontraron clientes.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Formulario de búsqueda -->
                <div class="tablaRight" style="width: 30%;">
                    <div style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                        <h3 style="text-align: center; margin-bottom: 15px;">🔍 Buscar Cliente</h3>
                        <form method="post" action="">
                            <label for="nombre_cliente" style="font-weight: bold;">Nombre:</label>
                            <input type="text" name="nombre_cliente" placeholder="Ingrese nombre" class="form-control" style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;" required>

                            <button type="submit" name="buscar" class="registrar" style="width: 100%; padding: 10px; background-color: #1e2f3a; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">
                                Buscar
                            </button>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</body>
</html>