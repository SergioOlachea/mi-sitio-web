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
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <title>Yeyo´s Baja Fishing</title>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="navegation bg-white shadow-lg sticky top-0 z-10">
        <div class="container-menu max-w-7xl mx-auto p-4 flex flex-wrap justify-between items-center">
            
            <div class="logo-title-container flex items-center mb-4 md:mb-0">
                <div class="logo-container">
                    <img src="<?= $assetsPath ?>/img/logo.png" alt="Logo Yeyo" class="logo h-10 w-auto">
                </div>
                <div class="title_container ml-3 hidden sm:block">
                    <h2 class="title text-xl font-bold text-blue-800">YEYO´S BAJA FISHING</h2>
                </div>
            </div>

            <input type="checkbox" id="despleg_menu" class="hidden">
            
            <div class="flex items-center space-x-4">
                <label for="despleg_menu" class="menu md:hidden cursor-pointer p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <img src="<?= $assetsPath ?>/img/menu.png" class="icon-menu h-6 w-6" alt="Menú">
                </label>
            <div class="user-container">
                <?php if(isAuthenticated()): ?>
                    <div class="flex items-center space-x-3">
                        
                        <span class="text-gray-700 font-medium hidden md:inline">
                            Hola, <?= htmlspecialchars(currentUser()['nombre']) ?>
                        </span>

                        <img src="<?= $assetsPath ?>/img/icons8-usuario-50.png" 
                            alt="Usuario" 
                            class="user-icon h-6 w-6">

                        <a href="<?= $srcPath ?>logout" 
                        class="ml-2 text-sm font-medium text-red-600 hover:text-red-700 transition-colors">
                        Cerrar sesión
                        </a>
                    </div>

                <?php else: ?>

                    <a href="<?= $srcPath ?>login" 
                    class="flex items-center text-gray-700 hover:text-blue-600 transition-colors group">
                        <img src="<?= $assetsPath ?>/img/icons8-usuario-50.png" 
                            alt="Usuario" 
                            class="user-icon h-6 w-6 group-hover:opacity-80">

                        <span class="ml-2 text-sm font-medium hidden lg:inline">Iniciar sesión</span>
                    </a>

                <?php endif; ?>
            </div>

            </div>

            <nav class="nav_menu w-full md:w-auto mt-4 md:mt-0 md:flex md:flex-grow md:items-center">
                <ul class="menu_ul flex flex-col md:flex-row md:space-x-6 space-y-2 md:space-y-0 text-gray-700 font-medium">
                    <!-- NUEVO: Opción de Inicio -->
                    <li><a href="<?= $srcPath ?>" class="block p-2 hover:text-blue-600 transition-colors rounded-md">Inicio</a></li>
                    <li><a href="<?= $srcPath ?>accesorios" class="block p-2 hover:text-blue-600 transition-colors rounded-md">Accesorios</a></li>
                    <li><a href="<?= $srcPath ?>canas" class="block p-2 hover:text-blue-600 transition-colors rounded-md">Cañas</a></li>
                    <li><a href="<?= $srcPath ?>carretes" class="block p-2 hover:text-blue-600 transition-colors rounded-md">Carretes</a></li>
                    <li><a href="<?= $srcPath ?>senuelos" class="block p-2 hover:text-blue-600 transition-colors rounded-md">Señuelos</a></li>
                </ul>

                <div class="busqueda mt-4 md:mt-0 md:ml-6 flex items-center border border-gray-300 rounded-lg overflow-hidden">
                    <input id="busqueda-txt" class="input-text p-2 w-full focus:outline-none" type="text" placeholder="Buscar" required>
                    <div class="Buscar-icon p-2 bg-gray-50 cursor-pointer hover:bg-gray-100 transition-colors">
                        <img src="<?= $assetsPath ?>/img/busqueda-de-lupa.png" class="Buscar h-5 w-5" alt="Buscar">
                    </div>
                </div>

                <div class="carrito-container mt-4 md:mt-0 md:ml-4">
                    <div class="carrito cursor-pointer p-2 rounded-lg hover:bg-gray-100 transition-colors border border-transparent hover:border-gray-200">
                        <img src="<?= $assetsPath ?>/img/carrito-de-compras.png" class="carrito-icon h-6 w-6" alt="Carrito">
                    </div>
                </div>
            </nav>
        </div>

        <div class="social-media-bar bg-blue-600 text-white p-2 flex justify-center space-x-8 text-sm">
            <div class="whatsapp-content flex items-center">
                <img src="<?= $assetsPath ?>/img/whatsapp.png" class="whatsapp-icon h-4 w-4 mr-1" alt="WhatsApp">
                <a href="https://wa.me/6121771933" target="_blank">6121771933</a>
            </div>

            <div class="facebook-content flex items-center">
                <img src="<?= $assetsPath ?>/img/facebook.png" class="facebook-icon h-4 w-4 mr-1" alt="Facebook">
                <a href="https://facebook.com/Yeyos_Baja_Fishing" target="_blank">Yeyo´s_Baja_Fishing</a>
            </div>

            <div class="instagram-content flex items-center">
                <img src="<?= $assetsPath ?>/img/instagram.png" class="instagram-icon h-4 w-4 mr-1" alt="Instagram">
                <a href="https://instagram.com/Yeyos_Baja_Fishing" target="_blank">Yeyo´s_Baja_Fishing</a>
            </div>
        </div>
    </div>