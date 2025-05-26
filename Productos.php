<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TITI SHOP | Productos</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>

  <!-- ENCABEZADO -->
  <header>
    <div class="navbar">
      <img src="img/LOGOTITI.jpeg" alt="Logo TITI SHOP" class="logo">
      <h3><a href="Home.php" style="color: black;" >Inicio</a></h3>
      <h3><a href="Productos.php" style="color: black;" >Productos</a></h3>
      <h3><a href="Contactanos.php" style="color: black;" >Contáctanos</a></h3>
      <h3><a href="Nosotros.php" style="color: black;" >Nosotros</a></h3>
      <h3><a href="Preguntas.php" style="color: black;">Preguntas Frecuentes</a></h3>
      <div class="user-menu">
      <?php if (isset($_SESSION['nombre'])): ?>
        <span style="color:black; font-weight: bold; font-size: 18px; margin-right:10px;">
          Hola, <?php echo htmlspecialchars($_SESSION['nombre']); ?>
        </span>
        <a href="logout.php" style="margin-left: 10px;">
          <img src="img/cerrarsesion1 (1).png" alt="Cerrar sesión" class="icono" >
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

  <!-- SECCIÓN PRODUCTOS -->
<main>
  <section class="productos-page">
    <aside class="filtros">
      <h3>Filtrar</h3>
      <label><input type="checkbox"> Nuevo</label>
      <label><input type="checkbox"> Oferta</label>
      <label><input type="checkbox"> Más vendidos</label>

      <h4>Precio</h4>
      <input type="number" placeholder="Desde S/." class="precio-input">
      <input type="number" placeholder="Hasta S/." class="precio-input">
      <button class="btn-filtrar">Aplicar</button>
    </aside>

    <div class="contenido-productos">
      <div class="barra-superior">
        <h2>Todos los productos</h2>
        <select>
          <option>Ordenar por...</option>
          <option>Precio: menor a mayor</option>
          <option>Precio: mayor a menor</option>
          <option>Más vendidos</option>
        </select>
      </div>

      <div class="grid-productos">
        <div class="producto">
          <div class="producto-centrado">
              <img src="img/DRONE M6 -produc.jpg" alt=""  >
            <div class="producto-info">
              <p class="producto-descripcion">DRONE M6</p>
              <p class="producto-especific">Xiaomi Mijia M6 Drone 8K cámara profesional HD Drones 5G WIFI</p>
              <p class="producto-precio">S/. 450.00</p>
            </div>
          </div>
        </div>
        <div class="producto">
          <div class="producto-centrado">
            <img src="img/DRONE E99 PRO --produc.jpg" alt="">
            <div class="producto-info">
              <p class="producto-descripcion">DRONE E99 PRO</p>
              <p class="producto-especific">DRONE E99 PRO Plegable con 2 Cámaras HD 4kControl Remoto y manual</p>
              <p class="producto-precio">S/. 105.00</p>
            </div>
          </div>
        </div>
        <div class="producto">
          <div class="producto-centrado">
            <img src="img/DRONE K12 MAX --produc.jpg" alt="">
            <div class="producto-info">
              <p class="producto-descripcion">DRONE K12 MAX</p>
              <p class="producto-especific">DRONE K12 MAX 4K HD con cámara de 1080P y control remoto</p>
              <p class="producto-precio">S/. 380.00</p>
            </div>
          </div>
        </div>
        <div class="producto">
          <div class="producto-centrado">
            <img src="img/DRONE K13 MAX -produc.jpg" alt="">
            <div class="producto-info">
              <p class="producto-descripcion">DRONE K13 MAX</p>
              <p class="producto-especific">DRONE K13 MAX 4K HD con cámara de 1080P y control remoto</p>
              <p class="producto-precio">S/. 115.00</p>
            </div>
          </div>
        </div>
        <div class="producto">
          <div class="producto-centrado">
            <img src="img/DRONE M3ULTRA -produc.jpg" alt="">
            <div class="producto-info">
              <p class="producto-descripcion">DRONE M3 ULTRA</p>
              <p class="producto-descripcion"> Drone M3 ULTRA con Wifi y Cámara nativa 1080 ultra HD/4K</p>
              <p class="producto-precio">S/. 350.00</p>
            </div>
          </div>
        </div>
        <div class="producto">
          <div class="producto-centrado">
            <img src="img/DRON FP 2736 -produc.jpg" alt="">
            <div class="producto-info">
              <p class="producto-descripcion">DRONE FP 2736</p>
              <p class="producto-especific">Dron Fineplay FP-2736 Brushless con Cámara 4K y GPS</p>
              <p class="producto-precio">S/. 280.00</p>
            </div>
          </div>
        </div>
        <div class="producto">
          <div class="producto-centrado">
            <img src="img/K11 PRO MAX -produc.jpg" alt="">
            <div class="producto-info">
              <p class="producto-descripcion">DRONE K11 PRO MAX</p>
              <p class="producto-especific">DRONE K11 PRO MAX 4K HD con cámara de 1080P y control remoto</p>
              <p class="producto-precio">S/. 220.00</p>
            </div>
          </div>
        </div>
        <div class="producto">
          <div class="producto-centrado">
            <img src="img/DRONE S159 -produc.jpg" alt="">
            <div class="producto-info">
              <p class="producto-descripcion">DRONE S159</p>
              <p class="producto-especific">Dron profesional S159 GPS con Control de pantalla 5G 8K </p>
              <p class="producto-precio">S/. 600.00</p>
            </div>
          </div>
        </div>
        <div class="producto">
          <div class="producto-centrado">
            <img src="img/gs5.jpg" alt="">
            <div class="producto-info">
              <p class="producto-descripcion">GS5 RETRO GAME CONSOLE</p>
              <p class="producto-especific">GS5 Retro Game Console 4K con 5000 juegos</p>
              <p class="producto-precio">S/. 320.00</p>
            </div>
          </div>
        </div>
        <div class="producto">
          <div class="producto-centrado">
            <img src="img/tv box.jpg" alt="">
            <div class="producto-info">
              <p class="producto-descripcion">TV BOX</p>
              <p class="producto-especific">XIAOMI MI TV BOX S 2DA GEN ANDROID TV CHROMECAST  VERSION GLOBAL</p>
              <p class="producto-precio">S/. 200.00</p>
            </div>
          </div>
        </div>
        <div class="producto">
          <div class="producto-centrado">
            <img src="img/proyector.jpg" alt="">
            <div class="producto-info">
              <p class="producto-descripcion">MINI PROYECTOR 4K 1080P </p>
              <p class="producto-especific">MINI PROYECTOR 4K 1080P CON WIFI Y BLUETOOTH</p>
              <p class="producto-precio">S/. 300.00</p>
            </div>
          </div>
        </div>
        <div class="producto">
          <div class="producto-centrado">
            <img src="img/proyector2.jpeg" alt="">
            <div class="producto-info">
              <p class="producto-descripcion">PROYECTOR CINE </p>
              <p class="producto-especific">PROYECTOR CINE 4K CON WIFI MODO CINE</p>
              <p class="producto-precio">S/. 800.00</p>
            </div>
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
            <img src="img/logofb.avif" alt="Facebook" width="50">
          </a>
          <a href="TikTok.com">
            <img src="img/logotktok.jpg" alt="TikTok" width="50">
          </a>
          <a href="Instagram.com">
            <img src="img/intalogo.avif" alt="Instagram" width="50">
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
