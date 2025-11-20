

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carretes - Yeyos Baja Fishing</title>
    <link href="/public/output.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: rgb(111, 202, 241);
            --secondary-color: #561F37;
            --text-color: #000;
            --shadow-color: rgba(0, 0, 0, 0.5);
            --hover-bg: rgba(111, 202, 241, 0.8);
        }
    </style>
</head>

<body class="bg-gray-100 text-[var(--text-color)]">
    <?php include '../layouts/header.php'; ?>

    <?php
$productos = [
    [
        "id"=>1,
        "nombre"=>"Shimano Stradic FL 2500",
        "tamano"=>"2500",
        "precio"=>4990,
        "descripcion"=>"Carrete versátil para pesca ligera con tecnología SilentDrive.",
        "imagen"=>"https://tse3.mm.bing.net/th/id/OIP.K54sRMb9c31JyCADiKuKgAHaJB?rs=1&pid=ImgDetMain&o=7&rm=3"
    ],
    [
        "id"=>2,
        "nombre"=>"Daiwa BG 3000",
        "tamano"=>"3000",
        "precio"=>3590,
        "descripcion"=>"Cuerpo de aluminio anodizado, ideal para agua salada.",
        "imagen"=>"https://th.bing.com/th/id/R.5c2107609d7a66a3317e977457e989e7?rik=nqNFJREAkKJ6rQ&pid=ImgRaw&r=0"
    ],
    [
        "id"=>3,
        "nombre"=>"Penn Battle III 4000",
        "tamano"=>"4000",
        "precio"=>4290,
        "descripcion"=>"Cuerpo metálico completo, drag de carbono HT-100.",
        "imagen"=>"https://tse1.mm.bing.net/th/id/OIP.U3TtIMUE22ia0Kgt4gjnrQHaHa?rs=1&pid=ImgDetMain&o=7&rm=3"
    ],
    [
        "id"=>4,
        "nombre"=>"Okuma Ceymar C-30",
        "tamano"=>"3000",
        "precio"=>1290,
        "descripcion"=>"Ligero, rotor ciclónico y gran relación precio-rendimiento.",
        "imagen"=>"https://lzd-img-global.slatic.net/g/p/af9e47ef8888daf18c35fbe0faae4f21.jpg_720x720q80.jpg"
    ],
    [
        "id"=>5,
        "nombre"=>"Abu Garcia Revo SX",
        "tamano"=>"2000",
        "precio"=>3790,
        "descripcion"=>"Carrete premium con varios rodamientos inoxidables.",
        "imagen"=>"https://tse3.mm.bing.net/th/id/OIP._1zti0nSGzGewfSPzeW8nAHaId?rs=1&pid=ImgDetMain&o=7&rm=3"
    ],
    [
        "id"=>6,
        "nombre"=>"KastKing Sharky III 5000",
        "tamano"=>"5000",
        "precio"=>1490,
        "descripcion"=>"Sellado K.I.S.S., buena capacidad de línea para costa.",
        "imagen"=>"https://www.mundopescaperu.com/wp-content/uploads/2022/06/kastking-sharky-iii-5000.jpg"
    ],
    [
        "id"=>7,
        "nombre"=>"Shimano Sienna FG 1000",
        "tamano"=>"1000",
        "precio"=>850,
        "descripcion"=>"Excelente para principiantes y pesca recreativa.",
        "imagen"=>"https://tse1.mm.bing.net/th/id/OIP.7oaR1wlkoBoWp3SPWkddpQHaHa?rs=1&pid=ImgDetMain&o=7&rm=3"
    ],
    [
        "id"=>8,
        "nombre"=>"Daiwa Revros LT 2500",
        "tamano"=>"2500",
        "precio"=>1390,
        "descripcion"=>"Compacto y ligero con diseño LT para líneas finas.",
        "imagen"=>"https://m.media-amazon.com/images/I/71jvQ6RtWL._AC_SL1200_.jpg"
    ],
    [
        "id"=>9,
        "nombre"=>"Penn Spinfisher VI 4500",
        "tamano"=>"4500",
        "precio"=>4890,
        "descripcion"=>"Sellado IPX5 para uso en agua salada, engranaje robusto.",
        "imagen"=>"https://m.media-amazon.com/images/I/81FZRMVAbYL._AC_SL1500_.jpg"
    ],
    [
        "id"=>10,
        "nombre"=>"Okuma Helios SX 3000",
        "tamano"=>"3000",
        "precio"=>2790,
        "descripcion"=>"Cuerpo de carbono, muy ligero y durable.",
        "imagen"=>"https://m.media-amazon.com/images/I/71mQfQAtF0L._AC_SL1500_.jpg"
    ],
    [
        "id"=>11,
        "nombre"=>"Abu Garcia Max X 4000",
        "tamano"=>"4000",
        "precio"=>990,
        "descripcion"=>"Oscilación suave y construcción confiable.",
        "imagen"=>"https://m.media-amazon.com/images/I/81-vUFvT0eL._AC_SL1500_.jpg"
    ],
    [
        "id"=>12,
        "nombre"=>"KastKing Valiant Eagle 3000",
        "tamano"=>"3000",
        "precio"=>1690,
        "descripcion"=>"Relación rápida para técnicas de lance.",
        "imagen"=>"https://m.media-amazon.com/images/I/61xBPdZiZ+L._AC_SL1000_.jpg"
    ],
    [
        "id"=>13,
        "nombre"=>"Shimano Vanford 2500",
        "tamano"=>"2500",
        "precio"=>7190,
        "descripcion"=>"Ultraligero CI4+ para competidores y exigentes.",
        "imagen"=>"https://m.media-amazon.com/images/I/71lX6J1OUpL._AC_SL1500_.jpg"
    ],
    [
        "id"=>14,
        "nombre"=>"Daiwa Saltist MQ 5000",
        "tamano"=>"5000",
        "precio"=>7990,
        "descripcion"=>"Monocoque: rigidez y resistencia para mar abierto.",
        "imagen"=>"https://m.media-amazon.com/images/I/81MVQdyXyAL._AC_SL1500_.jpg"
    ],
    [
        "id"=>15,
        "nombre"=>"Penn Fierce IV 3000",
        "tamano"=>"3000",
        "precio"=>2190,
        "descripcion"=>"Potencia y durabilidad para uso intensivo.",
        "imagen"=>"https://m.media-amazon.com/images/I/71T0QhUyIXL._AC_SL1500_.jpg"
    ],
    [
        "id"=>16,
        "nombre"=>"Okuma Inspira ISX 2500",
        "tamano"=>"2500",
        "precio"=>2590,
        "descripcion"=>"Buen balance entre precio y prestaciones.",
        "imagen"=>"https://m.media-amazon.com/images/I/81PxyV3qYlL._AC_SL1500_.jpg"
    ],
    [
        "id"=>17,
        "nombre"=>"Abu Garcia Zenon 2000",
        "tamano"=>"2000",
        "precio"=>9990,
        "descripcion"=>"Ultra ligero, pensado para competición.",
        "imagen"=>"https://m.media-amazon.com/images/I/71HZxCyMfWL._AC_SL1500_.jpg"
    ],
    [
        "id"=>18,
        "nombre"=>"Piscifun Carbon X 3000",
        "tamano"=>"3000",
        "precio"=>1290,
        "descripcion"=>"Cuerpo de carbono para peso pluma y resistencia.",
        "imagen"=>"https://m.media-amazon.com/images/I/71sB02faemL._AC_SL1500_.jpg"
    ],
    [
        "id"=>19,
        "nombre"=>"Lew’s Mach 2 2000",
        "tamano"=>"2000",
        "precio"=>1890,
        "descripcion"=>"Baitcaster con buena respuesta y suavidad.",
        "imagen"=>"https://m.media-amazon.com/images/I/81xfxKJ0CjL._AC_SL1500_.jpg"
    ],
    [
        "id"=>20,
        "nombre"=>"Quantum Smoke S3 2500",
        "tamano"=>"2500",
        "precio"=>2590,
        "descripcion"=>"Recubrimiento anticorrosión y sistema PT.",
        "imagen"=>"https://m.media-amazon.com/images/I/71T7xO6T2SL._AC_SL1500_.jpg"
    ]
];
?>


    <div class="text-center py-10">
        <h1 class="text-4xl font-bold text-[var(--secondary-color)]">Carretes de Pesca</h1>
        <p class="text-gray-700 mt-2">Elige entre más de 20 modelos premium</p>
    </div>

    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 pb-20">

        <?php foreach ($productos as $p): ?>
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition p-4 cursor-pointer border border-gray-200"
                onclick="window.location='ver_producto.php?id=<?= $p['id'] ?>'">

                <img src="<?= $p['imagen'] ?>" alt="<?= $p['nombre'] ?>"
                     class="w-full h-48 object-cover rounded-lg">

                <h2 class="mt-3 text-xl font-bold text-[var(--secondary-color)]">
                    <?= $p["nombre"] ?>
                </h2>

                <p class="text-gray-600 text-sm mt-1">Tamaño: <?= $p["tamano"] ?></p>

                <p class="text-lg font-semibold mt-2 text-[var(--primary-color)]">
                    $<?= number_format($p["precio"], 2) ?> MXN
                </p>

                <p class="text-gray-600 text-sm mt-2">
                    <?= $p["descripcion"] ?>
                </p>

                <div class="mt-4 flex gap-2">
                    <button class="flex-1 bg-[var(--primary-color)] hover:bg-[var(--hover-bg)] text-white py-2 rounded-lg">
                        Agregar al carrito
                    </button>

                    <a href="ver_producto.php?id=<?= $p['id'] ?>"
                       class="flex-1 text-center bg-[var(--secondary-color)] hover:opacity-80 text-white py-2 rounded-lg">
                        Ver más
                    </a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <?php include '../layouts/footer.php'; ?>

</body>

</html>
