<?php
if (!defined('ASSETS_PATH')) {
    define('ASSETS_PATH', '/assets'); 
}

if (!defined('SRC_PATH')) {
    define('SRC_PATH', '/');       
}

$assetsPath = ASSETS_PATH;
$srcPath = SRC_PATH;


if (!defined('BASE_URL')) {
    define('BASE_URL', '/Yeyos_Baja_Fishing'); 
}


$bannerImages = [
    'Captura de pantalla 2025-08-19 093249.png',
    'Captura de pantalla 2025-08-19 093300.png',
    'Captura de pantalla 2025-08-19 093531.png',
    'Captura de pantalla 2025-08-19 093226.png'
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <title>Yeyo´s Baja Fishing</title>

</head>
<body class="bg-gray-100 min-h-screen">
    <?php 
    $rutaHEader = __DIR__ . '/../../layouts/header.php';
    ?>

    <div class="content max-w-7xl mx-auto py-6 px-4">

        <!-- Banner Promocional -->
        <div class="mb-8 rounded-lg overflow-hidden shadow-lg relative group">
            <div class="swiper myBannerCarousel w-full h-64 md:h-[500px]">
                <div class="swiper-wrapper">
                    <?php foreach ($bannerImages as $imageName): ?>
                        <div class="swiper-slide">
                            <img
                                src="<?= $assetsPath ?>/img/<?= $imageName ?>"
                                class="w-full h-full object-cover"
                                alt="Promoción"
                            >
                            </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-pagination !bottom-4"></div>

                <div class="swiper-button-next !hidden md:group-hover:!flex !text-white bg-black/30 p-6 rounded-full !w-12 !h-12 after:!text-2xl hover:bg-black/50 transition-all"></div>
                <div class="swiper-button-prev !hidden md:group-hover:!flex !text-white bg-black/30 p-6 rounded-full !w-12 !h-12 after:!text-2xl hover:bg-black/50 transition-all"></div>
            </div>
        </div>

        <!-- Cards de Categorías Principales -->
        <div class="cards-content grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
            
            <a href="<?= BASE_URL ?>/admin/carretes" class="card bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 text-center">
                <img src="<?= $assetsPath ?>/img/carretes.jpg" alt="Carretes" class="w-full h-32 object-cover mb-3 rounded-md">
                <div class="card-text font-semibold text-gray-800">Administrar Carretes</div>
            </a>

            <a href="<?= BASE_URL ?>/admin/senuelos" class="card bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 text-center">
                <img src="<?= $assetsPath ?>/img/señiuelos.webp" alt="Señuelos" class="w-full h-32 object-cover mb-3 rounded-md">
                <div class="card-text font-semibold text-gray-800">Administrar Señuelos</div>
            </a>

            <a href="<?= BASE_URL ?>/admin/canas" class="card bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 text-center">
                <img src="<?= $assetsPath ?>/img/cañas.webp" alt="Cañas" class="w-full h-32 object-cover mb-3 rounded-md">
                <div class="card-text font-semibold text-gray-800">Administrar Cañas</div>
            </a>

            <a href="<?= BASE_URL ?>/admin/accesorios" class="card bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 text-center">
                <img src="<?= $assetsPath ?>/img/OIP.webp" alt="Accesorios" class="w-full h-32 object-cover mb-3 rounded-md">
                <div class="card-text font-semibold text-gray-800">Administrar Accesorios</div>
            </a>

        </div>

        <!-- Productos Más Vendidos -->
        <div class="mas-vendidos-section bg-white p-6 rounded-xl shadow-2xl">
            <h2 class="text-center text-3xl font-extrabold text-blue-800 mb-8">
                MÁS VENDIDOS
            </h2>

            <div class="ventas-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">

                <!-- Producto 1: Carrete Shimano -->
                <div class="venta-card p-4 border border-gray-100 rounded-xl hover:shadow-lg transition-shadow duration-300 text-center">
                    <img src="https://tiendapescamardealboran.es/wp-content/uploads/2023/02/shimano-socorro-sw-6000-scaled-1-600x800.jpg"
                        alt="Carrete Shimano Socorro"
                        class="w-full h-48 object-contain mb-3">
                    <h3 class="mt-2 font-semibold text-gray-900 truncate">Carrete Shimano Socorro SW 6000</h3>
                    <p class="text-sm text-gray-500 mb-2">Carrete ideal para pesca en mar con sistema de freno suave y resistente.</p>
                    <p class="text-xl font-extrabold text-red-600">$4,999.00</p>
                </div>

                <!-- Producto 2: Señuelo Rapala -->
                <div class="venta-card p-4 border border-gray-100 rounded-xl hover:shadow-lg transition-shadow duration-300 text-center">
                    <img src="https://elsenuelo.cl/web/wp-content/uploads/2019/07/WHU.jpg"
                        alt="Señuelo Rapala X-Rap"
                        class="w-full h-48 object-contain mb-3">
                    <h3 class="mt-2 font-semibold text-gray-900 truncate">Señuelo Rapala X-Rap Saltwater</h3>
                    <p class="text-sm text-gray-500 mb-2">Señuelo flotante de gran acción ideal para jurel, pargo y pez gallo.</p>
                    <p class="text-xl font-extrabold text-red-600">$289.00</p>
                </div>

                <!-- Producto 3: Caña Ugly Stik -->
                <div class="venta-card p-4 border border-gray-100 rounded-xl hover:shadow-lg transition-shadow duration-300 text-center">
                    <img src="https://wiredboats.co.uk/wp-content/uploads/2021/10/ugly-stik-gx2-2-piece-spin_handle.jpg"
                        alt="Caña Ugly Stik GX2"
                        class="w-full h-48 object-contain mb-3">
                    <h3 class="mt-2 font-semibold text-gray-900 truncate">Caña Ugly Stik GX2 7ft</h3>
                    <p class="text-sm text-gray-500 mb-2">Caña resistente de grafito y fibra de vidrio para pesca mediana y pesada.</p>
                    <p class="text-xl font-extrabold text-red-600">$1,250.00</p>
                </div>

                <!-- Producto 4: Protector Solar -->
                <div class="venta-card p-4 border border-gray-100 rounded-xl hover:shadow-lg transition-shadow duration-300 text-center">
                    <img src="https://m.media-amazon.com/images/I/81wRdgK6NtL._AC_SX679_.jpg"
                        alt="Protector solar buff"
                        class="w-full h-48 object-contain mb-3">
                    <h3 class="mt-2 font-semibold text-gray-900 truncate">Protector de Cara AFTCO Samurai</h3>
                    <p class="text-sm text-gray-500 mb-2">Cubrebocas UV 50+ para pesca deportiva y actividades al aire libre.</p>
                    <p class="text-xl font-extrabold text-red-600">$399.00</p>
                </div>

                <!-- Producto 5: Trenzado PowerPro -->
                <div class="venta-card p-4 border border-gray-100 rounded-xl hover:shadow-lg transition-shadow duration-300 text-center">
                    <img src="https://th.bing.com/th/id/R.a3a8e4346f5e92ade51d3fa59a393d70?rik=sSmrasdXwNEWhg&riu=http%3a%2f%2fwww.fullpescasa.com%2fwp-content%2fuploads%2f2021%2f05%2fPOWER-PRO2.jpg&ehk=7W4kT9VRrq2kI%2b7kLDts9wfgRq6tYQS5HeJiSFoJjxE%3d&risl=&pid=ImgRaw&r=0"
                        alt="Hilo de pesca PowerPro"
                        class="w-full h-48 object-contain mb-3">
                    <h3 class="mt-2 font-semibold text-gray-900 truncate">Trenzado PowerPro 50 lb</h3>
                    <p class="text-sm text-gray-500 mb-2">Línea trenzada de alta resistencia para pesca deportiva en mar.</p>
                    <p class="text-xl font-extrabold text-red-600">$720.00</p>
                </div>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".myBannerCarousel", {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            speed: 1000, 

            autoplay: {
                delay: 4000, 
                disableOnInteraction: false, 
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

</body>
</html>