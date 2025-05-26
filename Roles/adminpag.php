<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') { 
    header('Location: ../intranet.php'); 
    exit();
}

include '../Includes/conexion.php'; 

$conexion = new Conexion();
$conn = $conexion->getConectar();

$mensaje_registro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_type']) && $_POST['form_type'] === 'register_user') {
    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $contrasena_plana = trim($_POST["contrasena"]);
    $rol = trim($_POST["rol"]);

    if (empty($nombre) || empty($correo) || empty($contrasena_plana) || empty($rol)) {
        $mensaje_registro = "Todos los campos son obligatorios para el registro.";
    } elseif ($rol !== "admin" && $rol !== "vendedor") {
        $mensaje_registro = "Rol no permitido. Solo 'admin' o 'vendedor' son válidos.";
    } else {
        $contrasena_hasheada = password_hash($contrasena_plana, PASSWORD_DEFAULT);

        $check_sql = "SELECT id_usuario FROM usuarios WHERE correo = ?";
        $stmt_check = $conn->prepare($check_sql);
        if ($stmt_check) {
            $stmt_check->bind_param("s", $correo);
            $stmt_check->execute();
            $existe = $stmt_check->get_result();

            if ($existe->num_rows > 0) {
                $mensaje_registro = "El correo '" . htmlspecialchars($correo) . "' ya está registrado.";
            } else {
                $insert_sql = "INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES (?, ?, ?, ?)";
                $stmt_insert = $conn->prepare($insert_sql);
                if ($stmt_insert) {
                    $stmt_insert->bind_param("ssss", $nombre, $correo, $contrasena_hasheada, $rol);
                    if ($stmt_insert->execute()) {
                        $mensaje_registro = "Usuario '" . htmlspecialchars($nombre) . "' registrado exitosamente.";
                    } else {
                        $mensaje_registro = "Error al registrar el usuario: " . $stmt_insert->error;
                    }
                    $stmt_insert->close();
                } else {
                    $mensaje_registro = "Error al preparar la consulta de inserción: " . $conn->error;
                }
            }
            $stmt_check->close();
        } else {
            $mensaje_registro = "Error al preparar la consulta de verificación de correo: " . $conn->error;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador - Titishop</title>
    <link rel="stylesheet" href="../estilo.css"> 
    <link rel="stylesheet" href="admin.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header class="navbar">
        <div class="navbar-container">
            <a href="#" class="logo" onclick="showSection('welcome-overview-section'); return false;">
                TiTiShop - Vista de Administrador
            </a>
            <nav>
                <ul class="nav-links">
                    <li><a href="..//Home.php" onclick="showSection('welcome-overview-section'); return false;">Inicio</a></li>
                    <li><a href="..//Productos/listar.php">Productos</a></li>
                    <li><a href="#" >Ventas</a></li>
                    <li><a href="../intranet.php?logout=true">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="dashboard-content">
        <section id="welcome-overview-section" class="dashboard-section">
            <div class="welcome-section">
                <h1>¡Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>!</h1>
                <p>Este es el panel de administración de Titishop. Aquí puedes gestionar todos los aspectos del negocio.</p>
            </div>

            <div class="action-buttons">
                <a href="..//Productos/registrar.php" class="action-button">
                    <div class="icon-circle"><i class="fas fa-box"></i></div>
                    Gestión de Productos
                </a>
                <a href="..//Cliente/listar.php" class="action-button" >
                    <div class="icon-circle"><i class="fas fa-users"></i></div>
                    Gestión de Clientes
                </a>
                <a href="#" class="action-button" onclick="showSection('register-user-section'); return false;">
                    <div class="icon-circle"><i class="fas fa-user-plus"></i></div>
                    Registrar Nuevo Usuario
                </a>
                <a href="#" class="action-button" onclick="showSection('sales-management-section'); return false;">
                    <div class="icon-circle"><i class="fas fa-dollar-sign"></i></div>
                    Gestión de Ventas
                </a>
                <a href="..//Usuarios/listar.php" class="action-button">
                    <div class="icon-circle"><i class="fas fa-user"></i></div>
                    Gestión de Usuarios
                </a>
            </div>
        </section>


        <section id="register-user-section" class="dashboard-section" style="display:none;">
            <h2><i class="fas fa-user-plus"></i> Registrar Nuevo Usuario</h2>
            <form class="auth-form" method="POST" action="adminpag.php"> <input type="hidden" name="form_type" value="register_user">

                <?php if (!empty($mensaje_registro)): ?>
                    <p class="
                        <?php echo (strpos($mensaje_registro, 'exitosamente') !== false) ? 'success-message' : 'error-message'; ?>
                    ">
                        <?php echo $mensaje_registro; ?>
                    </p>
                <?php endif; ?>

                <div class="input-group">
                    <label for="reg_nombre">Nombre completo</label>
                    <div class="input-wrapper">
                        <input type="text" id="reg_nombre" name="nombre" placeholder="Nombre del nuevo usuario" required>
                        <span class="icon">&#128100;</span>
                    </div>
                </div>

                <div class="input-group">
                    <label for="reg_correo">Correo electrónico</label>
                    <div class="input-wrapper">
                        <input type="email" id="reg_correo" name="correo" placeholder="Correo del nuevo usuario" required>
                        <span class="icon">&#9993;</span>
                    </div>
                </div>

                <div class="input-group">
                    <label for="reg_contrasena">Contraseña</label>
                    <div class="input-wrapper">
                        <input type="password" id="reg_contrasena" name="contrasena" placeholder="Contraseña para el nuevo usuario" required>
                        <span class="icon">&#128065;</span>
                    </div>
                </div>

                <div class="input-group">
                    <label for="reg_rol">Rol</label>
                    <div class="input-wrapper">
                        <select id="reg_rol" name="rol" required>
                            <option value="vendedor">Vendedor</option>
                            <option value="admin">Administrador</option>
                        </select>
                        <span class="icon">&#9881;</span>
                    </div>
                </div>

                <button type="submit" class="btn-auth register">Registrar Usuario</button>
            </form>
        </section>

        <section id="user-management-section" class="dashboard-section" style="display:none;">
            <h2><i class="fas fa-users-cog"></i> Gestión de Usuarios Existentes</h2>
            <p>Aquí podrás listar, editar roles o eliminar usuarios ya registrados.</p>
            <button class="btn-auth">Listar Usuarios</button>
            <button class="btn-auth register" onclick="showSection('register-user-section'); return false;">Ir a Registrar Nuevo Usuario</button>
        </section>

        <section id="sales-management-section" class="dashboard-section" style="display:none;">
            <h2><i class="fas fa-dollar-sign"></i> Gestión de Ventas</h2>
            <p>Aquí podrás ver el historial de ventas, generar reportes, etc.</p>
            <button class="btn-auth">Ver Historial de Ventas</button>
            <button class="btn-auth register">Registrar Nueva Venta</button>
        </section>
    </main>

    <script src="admin.js"></script> <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (!empty($mensaje_registro)): ?>
                showSection('register-user-section');
            <?php else: ?>
                showSection('welcome-overview-section');
            <?php endif; ?>
        });
    </script>
</body>
</html>