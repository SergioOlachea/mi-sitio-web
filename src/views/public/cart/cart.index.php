<?php
$assetsPath = defined('ASSETS_PATH') ? ASSETS_PATH : '/public/assets';
?>

<div class="max-w-5xl mx-auto py-10 px-6">

    <h1 class="text-4xl font-bold mb-6 text-gray-800">Carrito de Compras</h1>

    <?php if (empty($items)) : ?>

        <div class="text-center py-10 bg-white shadow rounded-lg">
            <p class="text-gray-500 text-lg">Tu carrito está vacío.</p>
            <a href="index.php" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-md">Ver productos</a>
        </div>

    <?php else : ?>

        <div class="space-y-6">

            <?php 
                $total = 0;
                foreach ($items as $item) : 
                    $subtotal = $item['precio'] * $item['cantidad'];
                    $total += $subtotal;
            ?>

                <div class="flex items-center bg-white shadow p-4 rounded-lg">
                    
                    <img src="<?= $assetsPath ?>/img/<?= $item['imagen'] ?>" 
                         class="w-28 h-28 object-cover rounded-md">

                    <div class="ml-4 flex-grow">
                        <h2 class="text-xl font-semibold"><?= $item['nombre'] ?></h2>
                        <p class="text-gray-600">$<?= number_format($item['precio'], 2) ?></p>
                        <div class="flex items-center mt-2">
                            <a href="index.php?route=cart/update&id=<?= $item['id'] ?>&action=decrement"
                            class="px-3 py-1 bg-gray-200 rounded-l">-</a>

                            <span class="px-4 py-1 bg-gray-100"><?= $item['cantidad'] ?></span>

                            <a href="index.php?route=cart/update&id=<?= $item['id'] ?>&action=increment"
                            class="px-3 py-1 bg-gray-200 rounded-r">+</a>
                        </div>
                    </div>

                    <p class="text-lg font-bold mr-6">$<?= number_format($subtotal, 2) ?></p>

                    <a href="index.php?route=cart/remove&id=<?= $item['id'] ?>"
                       class="text-red-600 font-bold">✕</a>
                </div>

            <?php endforeach; ?>

        </div>

        <!-- TOTAL -->
        <div class="mt-8 bg-white shadow p-6 rounded-lg">
            <h3 class="text-2xl font-bold">Total: $<?= number_format($total, 2) ?></h3>

            <div class="mt-4 flex gap-4">
                <a href="index.php?route=cart/clear" class="px-4 py-2 bg-red-600 text-white rounded-md">
                    Vaciar carrito
                </a>

                <a href="#" class="px-4 py-2 bg-green-600 text-white rounded-md">
                    Proceder al pago
                </a>
            </div>
        </div>

    <?php endif; ?>

</div>
