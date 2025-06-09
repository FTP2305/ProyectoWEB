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
  <link rel="stylesheet" href="prueba.css">
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
        <a href="carrito.php">
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

        <!-- Cuadrícula de Productos -->
        <div class="grid-productos">
          <!-- Producto 1 -->
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/DRONE M6 -produc.jpg" alt="DRONE M6">
              <div class="producto-info">
                <p class="producto-descripcion">DRONE M6</p>
                <p class="producto-especific">Xiaomi Mijia M6 Drone 8K cámara profesional HD Drones 5G WIFI</p>
                <p class="producto-precio">S/. 450.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>

          <!-- Producto 2 -->
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/DRONE E99 PRO --produc.jpg" alt="DRONE E99 PRO">
              <div class="producto-info">
                <p class="producto-descripcion">DRONE E99 PRO</p>
                <p class="producto-especific">DRONE E99 PRO Plegable con 2 Cámaras HD 4kControl Remoto y manual</p>
                <p class="producto-precio">S/. 105.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>

          <!-- Producto 3 -->
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/DRONE K12 MAX --produc.jpg" alt="DRONE K12 MAX">
              <div class="producto-info">
                <p class="producto-descripcion">DRONE K12 MAX</p>
                <p class="producto-especific">DRONE K12 MAX 4K HD con cámara de 1080P y control remoto</p>
                <p class="producto-precio">S/. 380.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>

          <!-- Producto 4 -->
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/DRONE K13 MAX -produc.jpg" alt="DRONE K13 MAX">
              <div class="producto-info">
                <p class="producto-descripcion">DRONE K13 MAX</p>
                <p class="producto-especific">DRONE K13 MAX 4K HD con cámara de 1080P y control remoto</p>
                <p class="producto-precio">S/. 115.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
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
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
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
              <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
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
              <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
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
              <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
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
              <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
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
              <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
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
              <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
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
              <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
            </div>
          </div>
        </div>
        <div class="producto">
          <div class="producto-centrado">
            <img src="img/sup.jpg" alt="">
            <div class="producto-info">
              <p class="producto-descripcion">SUP VIDEOJUEGO RETRO </p>
              <p class="producto-especific">CONSOLA VIDEOJUEGO SUP CON MANDO ADICIONAL BLANCO</p>
              <p class="producto-precio">S/. 58.90</p>
              <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
            </div>
          </div>
        </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/SMART T900.jpg" alt="">
              <div class="producto-info">
                <p class="producto-descripcion">SMARTWATCH T900 PRO MAX L NEGRO</p>
                <p class="producto-especific">SMARTWACH T900 PRO MAX GL CON PANTALLA TACTIL Y BLUETOOTH</p>
                <p class="producto-precio">S/. 75.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/AUDIFONOS AIR ON.jpg" alt="">
              <div class="producto-info">
                <p class="producto-descripcion">AUDIFONOS BLUD 3</p>
                <p class="producto-especific">AUDÍFONO BLUETOOTH GENÉRICO GALAXY BUDS 3 PRO BLANCO</p>
                <p class="producto-precio">S/. 120.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/AUDIFONOS INALAMBRICOS.jpg" alt="">
              <div class="producto-info">
                <p class="producto-descripcion">AUDÍFONOS INALÁMBRICO ENC</p>
                <p class="producto-especific">AUDÍFONOS INALÁMBRICO ENC BLUETOOTH SMART | PLATEADO</p>
                <p class="producto-precio">S/. 99.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/AUDIFONO AVENGERS.jpg" alt="">
              <div class="producto-info">
                <p class="producto-descripcion">AUDIFONOS INALAMBRICOS AVENGERS</p>
                <p class="producto-especific">AUDÍFONOS BLUETOOTH AVENGERS Y TRANSFORMERS</p>
                <p class="producto-precio">S/. 99.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/RELOJ I10.jpg" alt="">
              <div class="producto-info">
                <p class="producto-descripcion">SMARTWATCH BLUETOOTH </p>
                <p class="producto-especific">I10 PRO MAX PLOMO RELOJ BLUETOOTH CON CAPACIDAD DE 8HORAS DE DURACION</p>
                <p class="producto-precio">S/. 110.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/SMART HELLO 3.jpg" alt="">
              <div class="producto-info">
                <p class="producto-descripcion">SMARTWATCH HELLO 3 PLUS ULTRA AMOLED NEGRO</p>
                <p class="producto-especific">El Hello Watch 3 CON RESOLUCION DE 425*518 PIXELES,</p>
                <p class="producto-precio">S/. 154.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/PROYECTOR ASTRONAUTA.jpg" alt=" ">
              <div class="producto-info">
                <p class="producto-descripcion">PROYECTOR DE LUZ TEKHOME</p>
                <p class="producto-especific">PROYECTOR DE LUZ TEKHOME IMPORTACIONES 8K (7680 X 4320) ASTRONAUTA AJUSTABLE 360°</p>
                <p class="producto-precio">S/. 150.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/PROYECTOR SASURA.jpg" alt="">
              <div class="producto-info">
                <p class="producto-descripcion">PROYECTOR SASARU </p>
                <p class="producto-especific">PROYECTOR SASARU PERÚ WIFI 5G 4K 1080P FULL HD BLUETOOTH 5.0</p>
                <p class="producto-precio">S/. 599.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/MINI PROYECTOR PS5.jpg" alt="">
              <div class="producto-info">
                <p class="producto-descripcion">MINI PROYECTOR</p>
                <p class="producto-especific">MINI PROYECTOR COMPRA FACIL WIFI Y BLUETOOTH 1080P SOPORTE PROYECTOR COMPATIBLE IOS/ANDROID/PORTÁTIL/TV STICK/HDMI/PS5</p>
                <p class="producto-precio">S/. 465.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/PROYECTOR GALAXIA.jpg" alt="">
              <div class="producto-info">
                <p class="producto-descripcion">PROYECTOR CIRCULAR </p>
                <p class="producto-especific">PROYECTOR CIRCULAR NEGRO LUCES GALAXIA LAMPARA BLUETOOTH PARLANTE</p>
                <p class="producto-precio">S/. 99.90</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/ultimateproyec (1).jpg" alt="">
              <div class="producto-info">
                <p class="producto-descripcion">PROYECTOR LUCES</p>
                <p class="producto-especific">PROYECTOR LUCES PROFESIONAL CON CABEZAL GIRATORIO PARA FIESTAS EVENTO</p>
                <p class="producto-precio">S/. 369.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/AUDIFONOS AIR ON.jpg" alt=" ">
              <div class="producto-info">
                <p class="producto-descripcion">AUDÍFONOS IMPORTADO ON-EAR</p>
                <p class="producto-especific">AUDÍFONOS IMPORTADO ON-EAR AIRPRO BLUETOOTH AIR INPODS PRO NEGRO</p>
                <p class="producto-precio">S/. 70.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/AUDIFNOS ZIOP.jpg" alt=" ">
              <div class="producto-info">
                <p class="producto-descripcion">AUDÍFONOS  ZIOP</p>
                <p class="producto-especific">AUDÍFONOS INALÁMBRICO IMPORTA ZIOP PRO BLANCO BLUETOOTH PRO TWS</p>
                <p class="producto-precio">S/. 89.90</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/AUDI OVEREAR.jpg" alt="">
              <div class="producto-info">
                <p class="producto-descripcion">AUDÍFONOS IMPORTADO OVER-EAR</p>
                <p class="producto-especific">AUDÍFONOS IMPORTADO OVER-EAR BLUETOOTH GATO CON LUZ LED ROSADO</p>
                <p class="producto-precio">S/. 90.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/AUDI GAMER.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">AUDÍFONOS GAMER </p>
                <p class="producto-especific">AUDÍFONOS GAMER IMPORTA ZIOP TRUE WIRELESS G11 BLUETOOTH NEGRO</p>
                <p class="producto-precio">S/. 60.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/AUDI CAJA.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">AUDÍFONOS GAMER IN-EAR M43</p>
                <p class="producto-especific">AUDÍFONOS GAMER IMPORTADO IN-EAR M43 BLUETOOTH CONTROL TÁCTIL CON CANCELACIÓN DE RUIDO</p>
                <p class="producto-precio">S/. 54.90</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/AUDÍFONOS BLUETOOTH 5.3.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">AUDÍFONOS BLUETOOTH 5.3 </p>
                <p class="producto-especific">AUDÍFONOS BLUETOOTH 5.3 RANURA TF Y ALMOHADILLAS IMANTADAS EJ-MAX A+ N</p>
                <p class="producto-precio">S/. 84.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/drone 998pro.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">DRONE 998-PRO MINI</p>
                <p class="producto-especific">DRONE CON CÁMARA 4K 998-PRO MINI</p>
                <p class="producto-precio">S/. 128.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/drone kpuia.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">DRONE E88</p>
                <p class="producto-especific">MINI DRON IMPORTACIONES QIA KPUIA E88 PROFESIONAL PORTATIL CAMARA HD</p>
                <p class="producto-precio">S/. 89.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/drone avion.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">DRONE AVION X189</p>
                <p class="producto-especific">AVIÓN DE CONTROL REMOTO 2.4G JUGUETE AL AIRE LIBRE</p>
                <p class="producto-precio">S/. 450.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/PARLANTE VINTAGE.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">PARLANTE VINTAGE</p>
                <p class="producto-especific">PARLANTE VINTAGE PANEL SOLAR LINTERNA</p>
                <p class="producto-precio">S/. 99.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/PARLANTE-AUDI.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">PARLANTE AUDIFONO 2 EN 1</p>
                <p class="producto-especific">COMBO PARLANTE SET AUDIO 4 S BRAX STERN BXS-1669C</p>
                <p class="producto-precio">S/. 169.90</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/PARLANTE-LUCES.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">PARLANTE DISCOTEK</p>
                <p class="producto-especific">LUCES PARLANTE MUSICAL BLUETOOTH / MAGIC BALL LED USB</p>
                <p class="producto-precio">S/. 45.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/PARLANTE-BARRA.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">PARLANTE BARRA</p>
                <p class="producto-especific">PARLANTE BARRA BLUETOOTH ALTAVOZ CON LUZ LED RGB DE SONIDO</p>
                <p class="producto-precio">S/. 99.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/PARLANT-HIELERA.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">PARLANTE HIELERA</p>
                <p class="producto-especific">PARLANTE HIELERA BLUETOOTH RECARGABLE CON LUZ RGB</p>
                <p class="producto-precio">S/. 90.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/LIDIMI-PARLAN1.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">LD-S639 40W</p>
                <p class="producto-especific">MINI PARLANTE LDIMI LD-S639 40W</p>
                <p class="producto-precio">S/. 189.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/PARLANTE PORT.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">PARLANTE PORTATIL</p>
                <p class="producto-especific">PARLANTE BLUETOOTH YXA172 PORTATIL 80 W 5.0 RADIO FM ANTENA</p>
                <p class="producto-precio">S/. 89.90</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/PARLANTE FANTASTYC.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">PARLANTE FANTASTIC</p>
                <p class="producto-especific">PARLANTE BLUETOOH FANTASTIC QUALITY GTS-1550 PARA FIESTAS</p>
                <p class="producto-precio">S/. 249.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/PARLANTE TRONSMART.jpeg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">PARLANTE TRONSMART</p>
                <p class="producto-especific">PARLANTE TRONSMART MIRTUNE C2 PORTATIL BLUETOOTH 24W</p>
                <p class="producto-precio">S/. 179.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/JBL 1.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">JBL BOOMBOX 3</p>
                <p class="producto-especific">PARLANTE BLUETOOTH JBL BOOMBOX 3 80W PORTÁTIL NEGRO</p>
                <p class="producto-precio">S/. 899.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/JBL2.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">JBL CLIP 5 5.3</p>
                <p class="producto-especific">PARLANTE BLUETOOTH JBL CLIP 5 5.3</p>
                <p class="producto-precio">S/. 259.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
              </div>
            </div>
          </div>
          <div class="producto">
            <div class="producto-centrado">
              <img src="img/JBL3.jpg" alt="  ">
              <div class="producto-info">
                <p class="producto-descripcion">JBL GO 4 NEGRO</p>
                <p class="producto-especific">PARLANTE BLUETOOTH JBL GO 4 NEGRO</p>
                <p class="producto-precio">S/. 168.00</p>
                <form method="POST" action="Productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                    <button class="btn-filtrar" typ="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </form>
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
