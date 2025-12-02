<?php
$assetsPath = defined('ASSETS_PATH') ? ASSETS_PATH : '/public/assets';
$srcPath = defined('SRC_PATH') ? SRC_PATH : '/src';

// $senuelo ya viene del controlador
if (!$senuelo) {
    die("Error: No se cargó el producto.");
}

$assetsPath = defined('ASSETS_PATH') ? ASSETS_PATH : '/public/assets';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= $assetsPath ?>/output.css" rel="stylesheet">
    <link href="<?= $assetsPath ?>/Styles.css" rel="stylesheet">
    <title><?= htmlspecialchars($senuelo->nombre) ?></title>
</head>

<body class="bg-gray-100 text-[var(--text-color)]">

<section class="py-16">
    <div class="max-w-5xl mx-auto px-6 bg-white rounded-xl shadow-lg p-10">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <!-- IMAGEN -->
            <div>
                <?php 
                    $imageUrl = $senuelo->imagen_url ? $senuelo->imagen_url : 'placeholder_senuelo.jpg';
                    $imagePath = $assetsPath . '/img/' . $imageUrl;
                ?>
                <img src="<?= $imagePath ?>" 
                     alt="<?= htmlspecialchars($senuelo->nombre) ?>" 
                     class="rounded-xl shadow-md w-full h-96 object-cover">
            </div>

            <!-- INFO DEL PRODUCTO -->
            <div class="flex flex-col justify-between">

                <div>
                    <h1 class="text-3xl font-bold mb-4 text-gray-900">
                        <?= htmlspecialchars($senuelo->nombre) ?>
                    </h1>

                    <p class="text-gray-700 text-lg mb-6">
                        <?= htmlspecialchars($senuelo->descripcion) ?>
                    </p>

                    <p class="text-3xl font-bold text-green-600 mb-6">
                        $<?= number_format($senuelo->precio, 2) ?>
                    </p>
                </div>

                <!-- BOTONES -->
                <div class="flex flex-col gap-4 mt-4">

                    <a href="index.php?route=cart/add&id=<?= $senuelo->id ?>"
                       class="w-full text-center px-4 py-3 font-medium bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                        Agregar al carrito
                    </a>

                    <a href="index.php?route=senuelos"
                       class="w-full text-center px-4 py-3 font-medium text-gray-700 border border-gray-400 rounded-md hover:bg-gray-200 transition">
                        Regresar
                    </a>

                </div>

            </div>

        </div>

    </div>
</section>

</body>
</html>
