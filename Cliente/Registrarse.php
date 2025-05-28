<?php
include '../Includes/conexion.php';


$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $conexion = new Conexion();
    $conn = $conexion->getConectar();

    $verificar = "SELECT * FROM clientes WHERE correo = '$correo'";
    $verificado = $conn->query($verificar);

    if ($verificado->num_rows > 0) {
        $mensaje = "El correo ya está registrado.";
    } else {
        $sql = "INSERT INTO clientes (nombre, apellidos, correo, contrasena) 
                VALUES ('$nombres', '$apellidos', '$correo', '$contrasena')";

        if ($conn->query($sql)) {
            $mensaje = "Registro exitoso. ¡Ya puedes iniciar sesión!";
        } else {
            $mensaje = "Error al registrar. Intenta de nuevo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TITI SHOP | Registro</title>
  <link rel="stylesheet" href="..//estilo.css">
</head>
<body>
  <!-- ENCABEZADO -->
  <header>
    <div class="navbar">
      <img src="..//img/LOGOTITI.jpeg" alt="Logo TITI SHOP" class="logo">
      <h3><a href="Home.html" style="color: black;">Inicio</a></h3>
      <h3><a href="Productos.html" style="color: black;">Productos</a></h3>
      <h3><a href="Contactanos.html" style="color: black;">Contáctanos</a></h3>
      <h3><a href="Nosotros.html" style="color: black;">Nosotros</a></h3>
      <h3><a href="Preguntas.html" style="color: black;">Preguntas Frecuentes</a></h3>
      <div class="user-menu a">
        <a href="http://localhost/ProyectoWEB/Cliente/Login.php"><img src="..//img/loginsinfondo.png" class="icono"></a>
        <a href="#"><img src="..//img/historial de compras.png" class="icono"></a>
        <a href="#"><img src="..//img/carrocomprassinfondo.png" class="icono"></a>
      </div>
    </div>
  </header>

  <!-- FORMULARIO -->
  <main>
    <div class="form-container">
      <h2>REGISTRO</h2>
      <form method="POST" action="">
        <label for="nombres">Nombres</label>
        <input type="text" id="nombres" name="nombres" required>

        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" required>

        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="correo" required>

        <label for="contrasena">Contraseña</label>
        <input type="password" id="contrasena" name="contrasena" required>

        <button type="submit" class="submit-btn">CREAR CUENTA</button>

        <?php if ($mensaje): ?>
          <p style="margin-top:10px; font-size:14px; color:<?= str_starts_with($mensaje, '') ? 'green' : 'red'; ?>;">
            <?= $mensaje ?>
          </p>
        <?php endif; ?>
      </form>
    </div>
  </main>

  <!-- PIE DE PÁGINA -->
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
          <a href="https://facebook.com"><img src="../img/fb_sinfondo.png" width="50"></a>
          <a href="https://tiktok.com"><img src="../img/tiktok_sinfondo.png" width="50"></a>
          <a href="https://instagram.com"><img src="../img/logo_insta_sinfondo.png" width="50"></a>
        </div>
      </div>
    </div>
    <p class="copyright">
      © 2025 TITI SHOP. RUC: 12345678901 | Razón Social: TITI SHOP IMPORTACIONES E.I.R.L.
    </p>
  </footer>
</body>
</html>