<?php
session_start();
include 'Includes/conexion.php';

$conexion = new Conexion();
$conn = $conexion->getConectar();

$mensaje_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST["correo"]);
    $contrasena = trim($_POST["contrasena"]);

    if (empty($correo) || empty($contrasena)) {
        $mensaje_error = "Por favor, ingresa tu correo y contraseña.";
    } else {
        $sql = "SELECT id_usuario, nombre, contrasena, rol FROM usuarios WHERE correo = ? AND contrasena = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $correo, $contrasena);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows == 1) {
                $usuario = $resultado->fetch_assoc();

                $_SESSION["usuario_id"] = $usuario["id_usuario"];
                $_SESSION["usuario_nombre"] = $usuario["nombre"];
                $_SESSION["rol"] = $usuario["rol"];

                if ($usuario["rol"] == "admin") {
                    header("Location: Roles/adminpag.php");
                    exit();
                } elseif ($usuario["rol"] == "vendedor") {
                    header("Location: Roles/vendedorpag.php");
                    exit();
                } else {
                    $mensaje_error = "Rol de usuario no reconocido.";
                }
            } else {
                $mensaje_error = "Correo o contraseña incorrectos.";
            }
            $stmt->close();
        } else {
            $mensaje_error = "Error al preparar la consulta: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Titishop Intranet - Iniciar Sesión</title>
    <link rel="stylesheet" href="styleintra.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="illustration-section">
            <img src="img/Banner_intranet" alt="Ilustración de Bienvenida" />
        </div>
        <div class="auth-section">
            <div class="auth-header">
                <img src="img/LOGOTITI.jpeg" alt="Logo Titishop" class="titishop-logo" />
                <h2>La intranet de Titishop</h2>
                <p>Tu experiencia de gestión de ventas y productos</p>
            </div>
            <form class="auth-form" method="POST" action="intranet.php">
                <p>Ingresa tus datos para <span class="highlight">iniciar sesión</span>.</p>

                <?php if (!empty($mensaje_error)): ?>
                    <p class="error-message"><?php echo htmlspecialchars($mensaje_error); ?></p>
                <?php endif; ?>

                <div class="input-group">
                    <label for="correo">Correo electrónico</label>
                    <div class="input-wrapper">
                        <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo" required />
                    </div>
                </div>

                <div class="input-group">
                    <label for="contrasena">Contraseña</label>
                    <div class="input-wrapper">
                        <input type="password" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña" required />
                    </div>
                </div>


                <button type="submit" class="btn-auth">Iniciar Sesión</button>

                <div class="centered">
                    <h3><a href="Home.php" style="color: black;">Volver a Inicio</a></h3>
                </div>
            </form>
        </div>
    </div>
</body>
</html>