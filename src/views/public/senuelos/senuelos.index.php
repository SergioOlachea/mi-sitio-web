<?php
// Normalizar rutas base
$baseDir = dirname(__DIR__, 3); // Llega a /src desde /src/views/admin/senuelos

// Paths configurables
$assetsPath = defined('ASSETS_PATH') ? ASSETS_PATH : '/public/assets';
$srcPath    = defined('SRC_PATH')    ? SRC_PATH    : '/src';

// Rutas absolutas
$rutaDatabase = $baseDir . '/config/database.php';
$rutaModelo   = $baseDir . '/Models/Producto.php';

// Validación de archivos
if (!file_exists($rutaDatabase)) {
    die("Error: No se encuentra database.php en: $rutaDatabase");
}
if (!file_exists($rutaModelo)) {
    die("Error: No se encuentra Producto.php en: $rutaModelo");
}

require_once $rutaDatabase;
require_once $rutaModelo;

use App\Models\Producto;

// Cargar modelos y obtener productos
try {
    $pdo = getPDO();
    $productoModel = new Producto($pdo);
    $senuelos = $productoModel->getByCategory('senuelo');
} catch (Exception $e) {
    die("Error en la aplicación: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= $assetsPath ?>/output.css" rel="stylesheet">
    <link href="<?= $assetsPath ?>/Styles.css" rel="stylesheet">
    <title>Senuelos</title>
</head>

<body class="bg-gray-100 text-[var(--text-color)]">

    <section class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-6">

            <div class="flex flex-col md:flex-row justify-between items-center mb-12 border-b pb-4 border-gray-300">
                <h1 class="text-3xl font-bold text-blue-800">Senuelos</h1>

                <a href="index.php?route=admin/senuelos/create"
                   class="mt-4 md:mt-0 bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition flex items-center gap-2 shadow-md">
                    Agregar Nuevo
                </a>
            </div>

            <?php if (empty($senuelos)) : ?>
                <div class="text-center py-10">
                    <p class="text-gray-500 text-lg">No hay senuelos disponibles en este momento.</p>
                </div>
            <?php else : ?>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <?php foreach ($senuelos as $senuelo) : ?>

                        <?php
                        // Imagen con fallback
                        $imageUrl = !empty($senuelo->imagen_url) 
                            ? htmlspecialchars($senuelo->imagen_url)
                            : 'placeholder_senuelo.jpg';

                        $imagePath = $assetsPath . '/img/' . $imageUrl;
                        ?>

                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition flex flex-col h-full">

                            <img src="<?= $imagePath ?>"
                                 alt="<?= htmlspecialchars($senuelo->nombre) ?>"
                                 class="w-full h-64 object-cover">

                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="text-xl font-semibold mb-2">
                                    <?= htmlspecialchars($senuelo->nombre) ?>
                                </h3>

                                <p class="text-gray-600 text-sm text-justify flex-grow">
                                    <?= htmlspecialchars($senuelo->descripcion) ?>
                                </p>

                                <p class="text-lg font-bold text-gray-800 mt-2 mb-4">
                                    $<?= number_format($senuelo->precio, 2) ?>
                                </p>

                                <div class="flex gap-3 mt-4">
                                    <a href="index.php?route=admin/senuelos/edit/<?= $senuelo->id ?>"
                                       class="flex-1 bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition text-center font-medium">
                                        Editar
                                    </a>

                                    <a href="index.php?route=admin/senuelos/delete/<?= $senuelo->id ?>"
                                       class="flex-1 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition text-center font-medium"
                                       onclick="return confirm('¿Estás seguro de que deseas eliminar este senuelo?');">
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
</html>
