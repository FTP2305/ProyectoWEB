<?php
session_start();
include '../Includes/conexion.php';


$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['email'];
    $clave = $_POST['password'];

    $conexion = new Conexion();
    $conn = $conexion->getConectar();

    $sql = "SELECT * FROM clientes WHERE correo = '$correo' AND contrasena = '$clave'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows === 1) {
        $cliente = $resultado->fetch_assoc();
        $_SESSION['id_cliente'] = $cliente['id_cliente'];
        $_SESSION['nombre'] = $cliente['nombre'];
        header("Location: ..//Home.php"); 
        exit();
    } else {
        $mensaje = "Correo o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TITI SHOP | Iniciar Sesión</title>
  <link rel="stylesheet" href="../estilo.css">
</head>
<body>
  <header>
    <div class="navbar">
      <img src="..//img/LOGOTITI.jpeg" alt="Logo TITI SHOP" class="logo">
      <h3><a href="Home.html" style="color: black;">Inicio</a></h3>
      <h3><a href="Productos.html" style="color: black;">Productos</a></h3>
      <h3><a href="Contactanos.html" style="color: black;">Contáctanos</a></h3>
      <h3><a href="Nosotros.html" style="color: black;">Nosotros</a></h3>
      <h3><a href="Preguntas.html" style="color: black;">Preguntas Frecuentes</a></h3>
      <div class="user-menu a">
        <a href="http://localhost/ProyectoWEB/Cliente/Login.php"><img src="..//img/loginsinfondo.png" alt="Usuario" class="icono"></a>
        <a href="#"><img src="..//img/historial de compras.png" alt="Historial" class="icono"></a>
        <a href="#"><img src="..//img/carrocomprassinfondo.png" alt="Carro de Compras" class="icono"></a>
      </div>
    </div>
  </header>

  <main>
    <div class="container_login">
      <div class="logo-central">
        <img src="../img/LOGOTITI.jpeg" alt="Logo TITI SHOP">
      </div>
      <div class="login-box">
        <h2>INICIO DE SESIÓN</h2>
        <form method="POST" action="Login.php">
          <label for="email">Correo electrónico</label>
          <input type="email" id="email" name="email" required>

          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" required>

          <a href="#" class="forgot-link">¿Olvidaste tu contraseña?</a>

          <button type="submit" class="btn ingresar">INGRESAR</button>
          <a href="http://localhost/ProyectoWEB/Cliente/Registrarse.php" class="btn registrarse">REGISTRARSE</a>

          <?php if ($mensaje): ?>
            <p style="color: red; font-size: 14px;"><?php echo $mensaje; ?></p>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </main>

  <footer>
    <div class="footer-columns">
      <div>
        <h4><a href="Contactanos.html">Contáctanos</a></h4>
        <p>WhatsApp: +51 123 456 789</p>
        <p>Atención: Lun-Sáb 9am-6pm</p>
      </div>
      <div>
        <h4><a href="Nosotros.html">Sobre Nosotros</a></h4>
        <p><a href="Nosotros.html">¿Quiénes somos?</a></p>
        <p><a href="Nosotros.html">Misión</a></p>
        <p><a href="Nosotros.html">Visión</a></p>
      </div>
      <div>
        <h4><a href="#">Políticas de empresa</a></h4>
        <p><a href="#">Política de garantía</a></p>
        <p><a href="#">Devolución y cambio</a></p>
        <p><a href="#">Privacidad</a></p>
        <p><a href="#">Envíos</a></p>
      </div>
      <div>
        <h4>Síguenos</h4>
        <p>Facebook / TikTok / Instagram</p>
        <div class="redes-sociales">
          <a href="https://facebook.com"><img src="../img/fb_sinfondo.png" alt="Facebook" width="50"></a>
          <a href="https://tiktok.com"><img src="../img/tiktok_sinfondo.png" alt="TikTok" width="50"></a>
          <a href="https://instagram.com"><img src="../img/logo_insta_sinfondo.png" alt="Instagram" width="50"></a>
        </div>
      </div>
    </div>
    <p class="copyright">
      © 2025 TITI SHOP. RUC: 12345678901 | Razón Social: TITI SHOP IMPORTACIONES E.I.R.L.
    </p>
  </footer>
</body>
</html>