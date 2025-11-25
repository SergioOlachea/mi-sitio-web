<?php 

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/helpers/functions.php';

use App\Controllers\CarretesController;

// Obtener ruta limpia desde $_GET['route']
$route = trim($_GET['route'] ?? '', '/');
$method = $_SERVER['REQUEST_METHOD'];

if ($route === '' || $route === 'home') {
    return view('home/index');
}

if($route === 'carretes') {
    if($method === 'GET') {
        return (new CarretesController())->index();
    }
}

if (preg_match('#^carretes/(\d+)$#', $route, $matches)) {
    $careerId = filter_var($matches[1], FILTER_SANITIZE_NUMBER_INT);

    if($method ===  'GET') {
        return (new CarretesController())->show($careerId);
    }
}

//Mostrar la tabla de carreras
if($route === 'admin/carretes') {
    return (new CarretesController())->adminIndex();
}

//Crear carrera, mostrar formulario
if($route === 'admin/carretes/create') {

    if($method === 'POST') {
        return (new CarretesController())->store($_POST, $_FILES);
    }

    return (new CarretesController())->form();
}

//Editar carrera, mostrar formulario
if (preg_match('#^admin/carretes/edit/(\d+)$#', $route, $matches)) {
    $careerId = filter_var($matches[1], FILTER_SANITIZE_NUMBER_INT);

    if($method ===  'GET') {
        return (new CarretesController())->form($careerId);
    }
}

http_response_code(404);
return view('errors/404');