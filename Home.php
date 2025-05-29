<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIII SHOP - Avance Básico</title>
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


  <!-- BANNER PRINCIPAL -->
  <main></main>
  <section class="banner">
    <div class="banner-img">
      <img src="img/BANER_HOME.jpg" alt="" class="tmñbanner">
    </div>
    <div class="banner-texto">
      <h1>TiTiShop: Lo mejor en tecnología, con delivery rápido a todo Lima y provincias. ¡Tu próximo gadget está a un clic! </h1>
      <p>TiTiShop: Tecnología que te conecta, precios que te sorprenden. </p>
      <a href="Productos.php">
      <button>Catálogo</button>
      </a>
    </div>
  </section>

  <!-- SECCIÓN DE MARCAS -->
  <section class="marcas">
    <h2>Marcas</h2>
    <div class="marcas-grid">
      <div class="marca">BRANDAME
        <img src="img/brandnamemarca1.jpg" alt="" class="tmñmarca">
      </div>
      <div class="marca">DRONEX
        <img src="img/marca2.jpg" alt="" class="tmñmarca">
      </div>
      <div class="marca">LIDIMI
        <img src="img/marca3.jpg" alt="" class="tmñmarca">
      </div>
      <div class="marca">TV BOX
        <img src="img/marca4.webp" alt="" class="tmñmarca">
      </div>
      <div class="marca">SONY
        <img src="img/marca5.jpg" alt="" class="tmñmarca">
      </div>
    </div>
  </section>

  <!-- SECCIONES DE PRODUCTOSs -->
  <section class="productos">
    <div class="destacado-grande">
      <img src="img/panel.png" alt="" class="tmñproductodestacado">
      <div class="texto-oferta">
        <h1>Las mejores ofertas en TitiShop</h1>
        <p>Encuentra descuentos increíbles en tus productos favoritos. ¡Sólo por tiempo limitado! <br>Fines de mes, ventas de fin de año, promociones especiales y mucho más.</p>
      </div>
    </div>

    <div class="productos-destacados">
      <div>
        <img src="img/DRONE S159.webp" alt="" class="tmñproductoGrande">
        <div class="texto-productodestacado">
          <p>El S159 cuenta con cámara HD, control de altitud y función de retorno automático, 
            ideal para capturar imágenes aéreas con estabilidad y facilidad de uso.</p> 
        </div>
      </div>
      <div>
        <img src="img/DRONE K13 MAX.jpg" alt="" class="tmñproductoGrande">
        <div class="texto-productodestacado">
          <p>El K13 MAX  es un dron compacto y fácil de usar, ideal para divertirse. Ofrece vuelo estable, 
            cámara HD y funciones como volteretas y control desde el celular. Perfecto para principiantes.</p> 
        </div>
      </div>
    </div>

    <div class="promocion-full">
      <img src="img/panel33.png" alt="">
      <div class="texto-centrado">TITISHOP<br>TE<br>OFRECE</div>
      <div class="texto-inferior">PRODUCTOS CON LA TECNOLOGIA DE AHORA, DESDE DRONES NOVEDOSOS Y XBOX/PS</div>
    </div>

    <div class="productos-grid">
      <div>DRONE FP 2736
        <img src="img/DRON FP 2736.jpg" alt="" class="tmñproducto">
      </div>
      <div>DRONE M6
        <img src="img/DRONE M6.jpg" alt="" class="tmñproducto">
      </div>
      <div>K11 PRO MAX
        <img src="img/K11 PRO MAX.webp" alt="" class="tmñproducto">
      </div>
      <div>DRONE E99 PRO
        <img src="img/DRONE E99 PRO.jpg" alt="" class="tmñproducto">
      </div>
      <div>DRONE K12 MAX
        <img src="img/DRONE K12 MAX.jpg" alt="" class="tmñproducto">
      </div>
    </div>
  </section>
</main>
  <!-- PIE DE PÁGINA -->
  <footer>
    <div class="footer-columns">
      <div>
        <h4><a href="Contactanos.php" >Contáctanos</a></h4>
        <p>WhatsApp: +51 123 456 789</p>
        <p>Atención: Lun-Sáb 9am-6pm</p>
      </div>
      <div>
        <h4><a href="Nosotros.php" >Sobre Nosotros</a></h4>
        <p><a href="Nosotros.php" >¿Quiénes somos?</a></p>
        <p><a href="Nosotros.php" >Misión</a></p>
        <p><a href="Nosotros.php" >Visión</a></p>
      </div>
      <div>
        <h4><a href="">Políticas de empresa</a></h4>
        <p><a href="">Política de garantía</a></p>
        <p><a href="Preguntas.php">Devolución y cambio</a></p>
        <p><a href="">Privacidad</a></p>
        <p><a href="">Envíos</a></p>
      </div>
      <div>
        <h4>Síguenos</h4>
        <p>Facebook / TikTok / Instagram</p>
        <div class="redes-sociales">
          <a href="Facebook.com">
            <img src="img/fb_sinfondo.png" alt="Facebook">
          </a>
          <a href="TikTok.com">
            <img src="img/tiktok_sinfondo.png" alt="TikTok">
          </a>
          <a href="Instagram.com">
            <img src="img/logo_insta_sinfondo.png" alt="Instagram">
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