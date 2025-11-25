<?php
include __DIR__ . "/../layouts/header.php";
$carretes = getCarretes();
?>


<body class="bg-gray-100 text-[var(--text-color)]">
         <section class="bg-gray-100 py-16">
      <div class="max-w-7xl mx-auto px-6">
        <h1 class="text-3xl font-bold text-center mb-12 text-blue-800">
            Carretes
        </h1>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach($carretes as $carrete) : ?>
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
          <img src="<?=ASSETS_PATH?>/img/<?=$carrete['imagen_url']?>" alt="<?=$carrete['nombre']?>" class="w-full h-64 object-cover">
          <div class="p-6">
          <h3 class="text-xl font-semibold mb-2"><?=$carrete['nombre']?></h3>
          <p class="text-gray-600 text-sm text-justify text-justify">
              <?= $carrete['descripcion'] ?>
          </p>
          <div class="flex justify-center mt-4">
              <a href="<?=SRC_PATH?>/views/careers/careers.details.php?careerId=<?=$carrete['id']?>" 
                class="bg-blue-700 text-white px-6 py-3 rounded-lg hover:bg-blue-800 transition">
                Ver más
              </a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </section>

    
</body>

<?php include '../layouts/footer.php'; ?>
