<?php 

require __DIR__.'/../config/database.php';
$config = require __DIR__ . '/../config/config.php';
// Constantes para rutas absolutas del sistema
define('BASE_PATH', $config['base_url']);        // http://localhost/yeyos_fishing/
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

function view($template, $data = [])
{
    // Convierte cada clave del array en una variable
    extract($data);

    // Rutas absolutas
    $viewsPath = __DIR__ . '/../views/';
    $layoutPath = $viewsPath . 'layouts/';

    // Header
    require $layoutPath . 'header.php';

    // Vista solicitada
    require $viewsPath . $template . '.php';

    // Footer
    require $layoutPath . 'footer.php';
}

function redirect($path) {
    header('Location: '.BASE_PATH.'/'.$path);
    exit;
}

function uploadImage($file, $folder) {
    // Si no hay archivo o hubo error, no guardar nada
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    // Ruta base a public/assets/img
    $uploadDir = __DIR__ . "/../../public/assets/$folder/";

    // Crear carpeta si no existe
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Extensión real
    $originalName = $file['name'];
    $extension = pathinfo($originalName, PATHINFO_EXTENSION);

    // Nombre único
    $imageName = uniqid($folder . '_') . '.' . $extension;

    // Mover archivo
    $tmpPath = $file['tmp_name'];
    move_uploaded_file($tmpPath, $uploadDir . $imageName);

    return $imageName;
}

?>
