<?php
// Ruta absoluta del proyecto
$BASE_PATH = dirname(__DIR__);

// Ruta base para URLs
define('BASE_URL', '/Yeyos_Baja_Fishing');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../src/css/Styles.css">


    <title>Yeyo´s Baja Fishing</title>
</head>
<body class="bg-gray-100">

    <?php include $BASE_PATH . "/src/layouts/header.php"; ?>

    <div class="navegation">
        <div class="container-menu">
            <input type="checkbox" id="despleg_menu">

            <label for="despleg_menu" class="menu">
                <img src="assets/img/menu.png" class="icon-menu">
            </label>

            <nav class="nav_menu">
                <ul class="menu_ul">
                    <li><a href="pedidos.html">Pedidos</a></li>
                    <li><a href="cañas.html">Cañas</a></li>
                    <li><a href="carretes.html">Carretes</a></li>
                    <li><a href="señuelos.html">Señuelos</a></li>
                </ul>
            </nav>
        </div>
        <div class="busqueda">

            <input id="busqueda-txt" class="input-text" type="text" placeholder="Buscar"required>
           
            <div class="Buscar-icon">
                <img src="assets/img/busqueda-de-lupa.png" class="Buscar">
            </div>
        </div>

        <div class="carrito-container">
            <div class="carrito">
                <img src="assets/img/carrito-de-compras.png" class="carrito-icon">
            </div>
        </div>

        <div class="whatsapp-content">
            <div class="whatsapp">
                <img src="assets/img/whatsapp.png" class="whatsapp-icon">
                <a href="whatsapp.com">6121771933</a>
            </div>
        </div>

        <div class="facebook-content">
            <div class="facebook">
                <img src="assets/img/facebook.png" class="facebook-icon">
                <a href="facebook.com">Yeyo´s_Baja_Fishing</a>
            </div>
        </div>

        <div class="instagram-content">
            <div class="instagram">
                <img src="assets/img/instagram.png" class="instagram-icon">
                <a href="instagram.com">Yeyo´s_Baja_Fishing</a>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="carousel">
            <div class="carousel-content">
                <img src="assets/img/Captura de pantalla 2025-08-19 093226.png" class="promo1">
            </div>
        </div>

        <div class="cards-content">

            <a href="carretes.html" class="card">
                <img src="assets/img/carretes.jpg" alt="Carretes">
                <div class="card-text">Carretes</div>
            </a>

            <a href="/src/views/señuelos.html" class="card">
                <img src="assets/img/señiuelos.webp" alt="Señuelos">
                <div class="card-text">Señuelos</div>
            </a>

            <a href="cañas.html" class="card">
                <img src="assets/img/cañas.webp" alt="Cañas">
                <div class="card-text">Cañas</div>
            </a>

            <a href="accesorios.html" class="card">
                <img src="assets/img/OIP.webp" alt="Accesorios">
                <div class="card-text">Accesorios</div>
            </a>

        </div>

    </div>

    <?php include $BASE_PATH . "/src/layouts/footer.php"; ?>

</body>
</html>
