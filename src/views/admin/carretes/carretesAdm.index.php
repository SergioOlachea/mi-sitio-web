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
    

    <section class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-6">
            

             <div class="relative w-full h-48 mb-12 rounded-xl overflow-hidden shadow-lg group">
    
                <img 
                    src="<?= $assetsPath ?>/img/carretes.jpg" 
                    alt="Carretes de pesca" 
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                />

                <div class="absolute inset-0 bg-black/60"></div>

                <div class="relative z-10 h-full flex flex-col md:flex-row justify-between items-center px-8">
                    
                    <h1 class="text-4xl font-bold text-white drop-shadow-md tracking-wide">
                        Carretes
                    </h1>
                    
                    <a href="index.php?route=admin/carretes/create"
                    class="px-4 py-2 font-medium text-green-500 border border-green-500 rounded-md hover:bg-green-500 hover:text-gray-900 transition-colors duration-300">
                        
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Agregar Nuevo
                    </a>

                </div>
            </div>

            <?php if (empty($carretes)) : ?>
                <div class="text-center py-10">
                    <p class="text-gray-500 text-lg">No hay carretes disponibles en este momento.</p>
                </div>
            <?php else : ?>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <?php foreach($carretes as $carrete) : ?>
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition flex flex-col h-full">
                            
                            <?php 
                                $imageUrl = (isset($carrete->imagen_url) && $carrete->imagen_url) ? htmlspecialchars($carrete->imagen_url) : 'placeholder_carrete.jpg';
                                $imagePath = (defined('ASSETS_PATH') ? ASSETS_PATH : '') . '/img/' . $imageUrl;
                            ?>
                            
                            <img src="<?= $imagePath ?>" 
                                 alt="<?= htmlspecialchars($carrete->nombre) ?>" 
                                 class="w-full h-64 object-cover">
                            
                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="text-xl font-semibold mb-2">
                                    <?= htmlspecialchars($carrete->nombre) ?>
                                </h3>
                                
                                <p class="text-gray-600 text-sm text-justify flex-grow">
                                    <?= htmlspecialchars($carrete->descripcion) ?>
                                </p>
                                
                                <p class="text-lg font-bold text-gray-800 mt-2 mb-4">$<?= number_format($carrete->precio, 2) ?></p>

                                <div class="flex gap-3 mt-4">
                                <a href="index.php?route=admin/carretes/edit/<?= $carrete->id?>"
                                class="px-4 py-2 font-medium text-yellow-400 border border-yellow-400 rounded-md hover:bg-yellow-400 hover:text-gray-900 transition-colors duration-300">
                                    Editar
                                </a>
                                <a href="index.php?route=admin/carretes/delete/<?= $carrete->id?>"
                                class="px-4 py-2 font-medium text-red-500 border border-red-500 rounded-md hover:bg-red-500 hover:text-gray-900 transition-colors duration-300"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este carrete?');">
                                    Eliminar
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