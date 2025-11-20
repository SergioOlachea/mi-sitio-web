<?php 

$config = require __DIR__ . '/../config/config.php';
require __DIR__.'/../config/database.php';

// Constantes para rutas absolutas del sistema
define('BASE_PATH', $config['base_url']);        // http://localhost/yeyos_fishing/
define('PUBLIC_URL', $config['public_url']);     // http://localhost/yeyos_fishing/public/
define('ASSETS_URL', $config['assets_url']);     // http://localhost/yeyos_fishing/public/assets/img/

function getCategorias() {
    return [
        [ 'nombre' => 'Cañas', 'url' => PUBLIC_URL . 'cañas.html' ],
        [ 'nombre' => 'Carretes', 'url' => PUBLIC_URL . 'carretes.html' ],
        [ 'nombre' => 'Señuelos', 'url' => PUBLIC_URL . 'señuelos.html' ],
        [ 'nombre' => 'Accesorios', 'url' => PUBLIC_URL . 'accesorios.html' ],
    ];
}

function getProductosDestacados() {
    return [
        [
            'nombre' => 'Gafas de sol polarizadas Daiwa',
            'precio' => 1200,
            'imagen' => ASSETS_URL . 'gafas.webp',
            'url'    => PUBLIC_URL . 'producto/gafas-daiwa.php'
        ],
        [
            'nombre' => 'Caña Shimano FX 2024',
            'precio' => 950,
            'imagen' => ASSETS_URL . 'cañas.webp',
            'url'    => PUBLIC_URL . 'producto/caña-shimano.php'
        ],
        [
            'nombre' => 'Carrete Penn Spinfisher VI',
            'precio' => 1800,
            'imagen' => ASSETS_URL . 'carretes.jpg',
            'url'    => PUBLIC_URL . 'producto/carrete-penn.php'
        ],
        [
            'nombre' => 'Señuelos Squid Lure Pack',
            'precio' => 230,
            'imagen' => ASSETS_URL . 'señuelos.webp',
            'url'    => PUBLIC_URL . 'producto/squidpack.php'
        ],
    ];
}

function getBannerText() {
    return [
        'titulo' => 'Contamos con gran variedad de artículos de pesca',
        'subtitulo' => 'Lo mejor para pesca deportiva, orilla y embarcación',
        'background' => ASSETS_URL . 'banner.webp'
    ];
}

function getContactInfo() {
    return [
        'whatsapp' => [
            'numero' => '6121771933',
            'url'    => 'https://wa.me/526121771933',
            'icon'   => ASSETS_URL . 'whatsapp.png'
        ],
        'facebook' => [
            'nombre' => 'Yeyo´s Baja Fishing',
            'url'    => 'https://facebook.com',
            'icon'   => ASSETS_URL . 'facebook.png'
        ],
        'instagram' => [
            'nombre' => '@Yeyo´s_Baja_Fishing',
            'url'    => 'https://instagram.com',
            'icon'   => ASSETS_URL . 'instagram.png'
        ]
    ];
}

function getCarretes() {
    $pdo = getPDO();

    try {
        $sql = "SELECT * FROM producto";

        $stmt = $pdo->query($sql);

        $carretes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $carretes;
    }catch (PDOException $e) {
        error_log("Error al consultar la base de datoso: ". $e->getMessage());
        return [];
    }
}

?>
