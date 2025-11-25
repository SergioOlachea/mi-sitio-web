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

            <a href="<?=BASE_PATH?>/carretes" class="card">
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

    <div class="mas-vendidos-section" style="padding: 40px 0; background: #ffffff;">
        <h2 style="text-align:center; font-size: 32px; font-weight: 700; margin-bottom: 30px;">
            MÁS VENDIDOS
        </h2>

        <div class="ventas-grid" 
            style="display: grid; grid-template-columns: repeat(auto-fit,minmax(250px,1fr)); gap: 25px; width: 90%; margin: auto;">


            <div class="venta-card" 
                style="background: #fff; padding: 15px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); text-align:center;">
                <img src="https://tiendapescamardealboran.es/wp-content/uploads/2023/02/shimano-socorro-sw-6000-scaled-1-600x800.jpg"
                    alt="Carrete Shimano Socorro"
                    style="width: 100%; height: 200px; object-fit: contain;">
                <h3 style="margin-top: 10px;">Carrete Shimano Socorro SW 6000</h3>
                <p style="font-size: 14px; color:#555;">Carrete ideal para pesca en mar con sistema de freno suave y resistente.</p>
                <p style="color:red; font-size: 20px; font-weight: bold;">$4,999.00</p>
            </div>

            <div class="venta-card" 
                style="background: #fff; padding: 15px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); text-align:center;">
                <img src="https://elsenuelo.cl/web/wp-content/uploads/2019/07/WHU.jpg"
                    alt="Señuelo Rapala X-Rap"
                    style="width: 100%; height: 200px; object-fit: contain;">
                <h3 style="margin-top: 10px;">Señuelo Rapala X-Rap Saltwater</h3>
                <p style="font-size: 14px; color:#555;">Señuelo flotante de gran acción ideal para jurel, pargo y pez gallo.</p>
                <p style="color:red; font-size: 20px; font-weight: bold;">$289.00</p>
            </div>

            <div class="venta-card" 
                style="background: #fff; padding: 15px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); text-align:center;">
                <img src="https://wiredboats.co.uk/wp-content/uploads/2021/10/ugly-stik-gx2-2-piece-spin_handle.jpg"
                    alt="Caña Ugly Stik GX2"
                    style="width: 100%; height: 200px; object-fit: contain;">
                <h3 style="margin-top: 10px;">Caña Ugly Stik GX2 7ft</h3>
                <p style="font-size: 14px; color:#555;">Caña resistente de grafito y fibra de vidrio para pesca mediana y pesada.</p>
                <p style="color:red; font-size: 20px; font-weight: bold;">$1,250.00</p>
            </div>

            <div class="venta-card" 
                style="background: #fff; padding: 15px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); text-align:center;">
                <img src="https://m.media-amazon.com/images/I/81wRdgK6NtL._AC_SX679_.jpg"
                    alt="Protector solar buff"
                    style="width: 100%; height: 200px; object-fit: contain;">
                <h3 style="margin-top: 10px;">Protector de Cara AFTCO Samurai</h3>
                <p style="font-size: 14px; color:#555;">Cubrebocas UV 50+ para pesca deportiva y actividades al aire libre.</p>
                <p style="color:red; font-size: 20px; font-weight: bold;">$399.00</p>
            </div>

            <div class="venta-card" 
                style="background: #fff; padding: 15px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); text-align:center;">
                <img src="https://th.bing.com/th/id/R.a3a8e4346f5e92ade51d3fa59a393d70?rik=sSmrasdXwNEWhg&riu=http%3a%2f%2fwww.fullpescasa.com%2fwp-content%2fuploads%2f2021%2f05%2fPOWER-PRO2.jpg&ehk=7W4kT9VRrq2kI%2b7kLDts9wfgRq6tYQS5HeJiSFoJjxE%3d&risl=&pid=ImgRaw&r=0"
                    alt="Hilo de pesca PowerPro"
                    style="width: 100%; height: 200px; object-fit: contain;">
                <h3 style="margin-top: 10px;">Trenzado PowerPro 50 lb</h3>
                <p style="font-size: 14px; color:#555;">Línea trenzada de alta resistencia para pesca deportiva en mar.</p>
                <p style="color:red; font-size: 20px; font-weight: bold;">$720.00</p>
            </div>

        </div>
    </div>

</body>
</html>
