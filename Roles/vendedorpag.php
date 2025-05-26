<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'vendedor') {
    header('Location: ../intranet.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Panel de Vendedor - Titishop</title>
    <link rel="stylesheet" href="../estilo.css" />
    <link rel="stylesheet" href="vendedor.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>
    <header class="navbar">
        <a href="#" class="logo">
            <img src="../IMG/LOGOITIII.jpeg" alt="Logo Titishop" /> TITISHOP Vendedor
        </a>
        <nav>
            <ul class="nav-links">
                <li><a href="#">Registrar Venta <i class="fas fa-cash-register"></i></a></li>
                <li><a href="#">Consultar Stock <i class="fas fa-boxes"></i></a></li>
                <li><a href="#">Historial de Ventas <i class="fas fa-history"></i></a></li>
                <li><a href="../logout.php">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </nav>
    </header>

    <main class="dashboard-content">
        <section class="welcome-section">
            <h1>¡Bienvenido, Vendedor <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>!</h1>
            <p>Aquí podrás gestionar tus ventas y consultar información de productos.</p>
            <h3>Tus Actividades Recientes</h3>
            <ul>
                <li><strong>Ventas registradas hoy:</strong> X</li>
                <li><strong>Última venta:</strong> Producto Y a las HH:MM</li>
                <li><strong>Meta de ventas semanal:</strong> Z% alcanzada</li>
            </ul>
        </section>
    </main>
</body>
</html>