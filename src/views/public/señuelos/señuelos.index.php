<?php
$assetsPath = defined('ASSETS_PATH') ? ASSETS_PATH : '/public/assets';
$srcPath = defined('SRC_PATH') ? SRC_PATH : '/src';
?>
<?php
$rutaDatabase = __DIR__ . '/../../../config/database.php';
$rutaModelo   = __DIR__ . '/../../../Models/Producto.php';

if (!file_exists($rutaDatabase)) die("Error: No se encuentra database.php en $rutaDatabase");
if (!file_exists($rutaModelo))   die("Error: No se encuentra Producto.php en $rutaModelo");


require_once $rutaDatabase;
require_once $rutaModelo;

use App\Models\Producto;

try {
    $pdo = getPDO();
    $productoModel = new Producto($pdo);
    $carretes = $productoModel->getByCategory('carretes');
    
    
} catch (Exception $e) {
    die("Error en la aplicación: " . $e->getMessage()); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= (defined('ASSETS_PATH') ? ASSETS_PATH : '') ?>/output.css" rel="stylesheet"> 
    <link href="<?= (defined('ASSETS_PATH') ? ASSETS_PATH : '') ?>/Styles.css" rel="stylesheet"> 
    <title>Carretes</title>
</head>

<body class="bg-gray-100 text-[var(--text-color)]">
    
     <div class="navegation">
        <div class="container-menu">
            <input type="checkbox" id="despleg_menu">

            <label for="despleg_menu" class="menu">
                <img src="assets/img/menu.png" class="icon-menu">
            </label>

            <nav class="nav_menu">
                <ul class="menu_ul">
                    <li><a href="<?=BASE_PATH?>/home">Inicio</a></li>
                    <li><a href="pedidos.html">Pedidos</a></li>
                    <li><a href="cañas.html">Cañas</a></li>
                    <li><a href="<?=BASE_PATH?>/carretes">Carretes</a></li>
                    <li><a href="<?=BASE_PATH?>/señuelos">Señuelos</a></li>
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

    <section class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-6">
            
            <h1 class="text-3xl font-bold text-center mb-12 text-blue-800">
                Carretes
            </h1>

            <?php if (empty($señuelos)) : ?>
                <div class="text-center py-10">
                    <p class="text-gray-500 text-lg">No hay carretes disponibles en este momento.</p>
                </div>
            <?php else : ?>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <?php foreach($señuelos as $señuelo) : ?>
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                            
                            <?php 
                                $imageUrl = (isset($señuelo->imagen_url) && $señuelo->imagen_url) ? htmlspecialchars($señuelo->imagen_url) : 'placeholder_señuelo.jpg';
                                $imagePath = (defined('ASSETS_PATH') ? ASSETS_PATH : '') . '/img/' . $imageUrl;
                            ?>
                            
                            <img src="<?= $imagePath ?>" 
                                 alt="<?= htmlspecialchars($señuelo->nombre) ?>" 
                                 class="w-full h-64 object-cover">
                            
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2">
                                    <?= htmlspecialchars($señuelo->nombre) ?>
                                </h3>
                                
                                <p class="text-gray-600 text-sm text-justify">
                                    <?= htmlspecialchars($señuelo->descripcion) ?>
                                </p>
                                
                                <p class="text-lg font-bold text-gray-800 mt-2 mb-4">$<?= number_format($señuelo->precio, 2) ?></p>

                                <div class="flex justify-center mt-4">
                                    <a href="<?= (defined('SRC_PATH') ? SRC_PATH : '') ?>/views/careers/careers.details.php?careerId=<?= $señuelo->id_producto ?>" 
                                       class="bg-blue-700 text-white px-6 py-3 rounded-lg hover:bg-blue-800 transition">
                                        Ver más
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>

        </div>
    </section>

</body>

<?php 
$rutaFooter = __DIR__ . '/../../layouts/footer.php';
?>
</html>