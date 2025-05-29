<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TITI SHOP | Nosotros</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>

  <!-- ENCABEZADO -->
  <header>
  <div class="navbar">
    <img src="img/LOGOTITI.jpeg" alt="Logo TITI SHOP" class="logo">
    <h3><a href="Home.php" style="color: black;">Inicio</a></h3>
    <h3><a href="Productos.php" style="color: black;">Productos</a></h3>
    <h3><a href="Contactanos.php" style="color: black;">Contáctanos</a></h3>
    <h3><a href="Nosotros.php" style="color: black;">Nosotros</a></h3>
    <h3><a href="Preguntas.php" style="color: black;">Preguntas Frecuentes</a></h3>
    <h3><a href="intranet.php" style="color: black;">Intranet</a></h3>
    
    <div class="user-menu">
      <?php if (isset($_SESSION['nombre'])): ?>
        <span style="color:black; font-weight: bold; font-size: 20px; margin-right:10px;">
          Hola! <?php echo htmlspecialchars($_SESSION['nombre']); ?>
        </span>
        <a href="logout.php" style="margin-left: 20px;">
          <img src="img/cerrarsesion1-removebg-preview.png" alt="Cerrar sesión" class="icono" >
        </a>
      <?php else: ?>
        <a href="http://localhost/ProyectoWEB/Cliente/Login.php">
          <img src="img/loginsinfondo.png" alt="Usuario" class="icono">
        </a>
      <?php endif; ?>
      <a href="#">
        <img src="img/historial de compras.png" alt="Historial" class="icono">
      </a>
      <a href="#">
        <img src="img/carrocomprassinfondo.png" alt="Carro de Compras" class="icono">
      </a>
    </div>
  </div>
</header>

<!-- SECCIÓN "NOSOTROS" -->
<main>
<section class="nosotros">
  <div class="container">

    <div class="nosotros-section">
      <div class="nosotros-content">
        <div class="texto">
          <h1>¿Quiénes somos?</h1>
          <p>Somos TITI SHOP, una tienda online comprometida con brindar productos tecnológicos y de tendencia a precios accesibles. Nos apasiona ofrecer una experiencia de compra rápida, confiable y amigable.</p>
        </div>
        <div class="imagen">
          <img src="img/quienes-removebg-preview.png" alt="Quiénes somos">
        </div>
      </div>
    </div>

    <div class="nosotros-section">
      <div class="nosotros-content">
        <div class="texto">
          <h2>Nuestra Misión</h2>
          <p>Brindar productos innovadores y de calidad que mejoren el estilo de vida de nuestros clientes, con un servicio que supere sus expectativas.</p>
        </div>
        <div class="imagen">
          <img src="img/png-transparent-mision-logo-removebg-preview.png" alt="Misión">
        </div>
      </div>
    </div>

    <div class="nosotros-section">
      <div class="nosotros-content">
        <div class="texto">
          <h2>Nuestra Visión</h2>
          <p>Ser reconocidos como una de las tiendas online líderes en Perú, destacando por nuestro compromiso con la satisfacción del cliente y la constante evolución en el mercado digital.</p>
        </div>
        <div class="imagen">
          <img src="img/image-removebg-preview.png" alt="Visión">
        </div>
      </div>
    </div>

  </div>
</section>
</main>

  <!-- PIE DE PÁGINA -->
  <footer>
    <div class="footer-columns">
      <div>
        <h4><a href="Contactanos.html" >Contáctanos</a></h4>
        <p>WhatsApp: +51 123 456 789</p>
        <p>Atención: Lun-Sáb 9am-6pm</p>
      </div>
      <div>
        <h4><a href="Nosotros.html" >Sobre Nosotros</a></h4>
        <p><a href="Nosotros.html" >¿Quiénes somos?</a></p>
        <p><a href="Nosotros.html" >Misión</a></p>
        <p><a href="Nosotros.html" >Visión</a></p>
      </div>
      <div>
        <h4>Políticas de empresa</h4>
        <p>Política de garantía</p>
        <p>Devolución y cambio</p>
        <p>Privacidad</p>
        <p>Envíos</p>
      </div>
      <div>
        <h4>Síguenos</h4>
        <p>Facebook / TikTok / Instagram</p>
        <div class="redes-sociales">
          <a href="Facebook.com">
            <img src="img/fb_sinfondo.png" alt="Facebook" width="50">
          </a>
          <a href="TikTok.com">
            <img src="img/tiktok_sinfondo.png" alt="TikTok" width="50">
          </a>
          <a href="Instagram.com">
            <img src="img/logo_insta_sinfondo.png" alt="Instagram" width="50">
          </a>
        </div>
      </div>
    </div>
    <p class="copyright">
      © 2025 TITI SHOP. RUC: 12345678901 | Razón Social: TITI SHOP IMPORTACIONES E.I.R.L.
    </p>
  </footer>

</body>
</html>
