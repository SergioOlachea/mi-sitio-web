<?php 

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/helpers/functions.php';

use App\Controllers\CarretesController;
use App\Controllers\señuelosController;


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

//Crear carrete, mostrar formulario
if ($route === 'admin/carretes/create') {

    if ($method === 'POST') {
        return (new CarretesController())->store($_POST, $_FILES);
    }

    return (new CarretesController())->form();
}

// Editar carrete
if (preg_match('#^admin/carretes/edit/(\d+)$#', $route, $matches)) {
    $id = (int)$matches[1];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        return (new App\Controllers\CarretesController())->update($id, $_POST, $_FILES);
    }

    // GET → mostrar formulario
    return (new App\Controllers\CarretesController())->form($id);
}


//Eliminar carrete
if (preg_match('#^admin/carretes/delete/(\d+)$#', $route, $matches)) {
    $carreteId = filter_var($matches[1], FILTER_SANITIZE_NUMBER_INT);
    if ($method === 'POST' || $method === 'GET') {
        return (new CarretesController())->delete($carreteId);
    }
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

//Mostrar la tabla de señuelos
if($route === 'admin/señuelos') {
    return (new señuelosController())->adminIndex();
}

//Crear señuelo, mostrar formulario
if ($route === 'admin/señuelos/create') {

    if ($method === 'POST') {
        return (new SeñuelosController())->store($_POST, $_FILES);
    }

    return (new señuelosController())->form();
}

// Editar señuelos
if (preg_match('#^admin/señuelos/edit/(\d+)$#', $route, $matches)) {
    $id = (int)$matches[1];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        return (new App\Controllers\señuelosController())->update($id, $_POST, $_FILES);
    }

    // GET → mostrar formulario
    return (new App\Controllers\señuelosController())->form($id);
}


//Eliminar señuelos
if (preg_match('#^admin/señuelos/delete/(\d+)$#', $route, $matches)) {
    $señueloId = filter_var($matches[1], FILTER_SANITIZE_NUMBER_INT);
    if ($method === 'POST' || $method === 'GET') {
        return (new señuelosController())->delete($señueloId);
    }
}

http_response_code(404);
return view('errors/404');