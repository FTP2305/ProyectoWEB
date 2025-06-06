<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TITI SHOP | Contactanos</title>
  <link rel="stylesheet" href="estilo.css">
  <link rel="stylesheet" href="productos.css">
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
  
<main>
    <div class="contenedor-central1">

        <div class="contenedor-izquierda enfila">
          <h3 class="texto-titu">
             Nos contactamos contigo
          </h3>
          <img src="img/comput.jpg" class="imgpequeña">
        </div>

          <div class="contenedor-izquierda2">
            <form>
               <label for="Asunto">Asunto:</label>
             <br>
             <br>
               <div class="enfila1">
                 <input type="text" id="Asunto" name="Asunto" >
                 <img src="img/operador.jpg">
              </div>
              <br>
                <label for="nombre">Nombre:</label>
              <br>
              <br>
                 <input type="text" id="nombre" name="nombre"  class="campo-largo1">
              <br>
              <br>
                 <label for="apellidos">Apellidos:</label>
              <br>
              <br>
                <input type="text" id="apellidos" name="apellidos"  class="campo-largo1">
              <br>
              <br>
               <div class="enfila2">
                <label for="DNI">DNI:</label>
                  <br>
                  <br>
                 <label for="Telefono">Telefono:</label>
                <label for="Correo">Correo:</label>
               </div>
               <div class="enfila3">
                  <input type="DNI" id="DNI" name="DNI" class="campo-largo2">
                  <input type="Telefono" id="Telefono" name="Telefono" class="campo-largo2">
                  <input type="Correo" id="Correo" name="Correo" class="campo-largo2">
               </div>

               <br>
               <label for="Mensaje">Mensaje:</label>
               <br>
               <br>
                <input type="text" id="Mensaje" name="Mensaje" class="campo-largo3">
               <br>
                <br>
                <div class="centro-boton">
                <button class="miboton">Enviar</button>
                </div>
              </form> 
          </div>
          
          <img src="img/contactanosofsinfondo.png" class="imagen-superpuesta1">
          
    </div>
    
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