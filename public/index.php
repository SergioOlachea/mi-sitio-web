<?php 


if(session_status() === PHP_SESSION_NONE){
  session_start();
}

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/helpers/functions.php';

use App\Controllers\CarretesController;
use App\Controllers\SenuelosController;
use App\Controllers\CanasController;
use App\Controllers\accesoriosController;
use App\Controllers\AuthController;




// Obtener ruta limpia desde $_GET['route']
$route = trim($_GET['route'] ?? '', '/');
$method = $_SERVER['REQUEST_METHOD'];

if(str_starts_with($route, "admin/")) {
    requireAuth();
}

if ($route === '' || $route === 'home') {
    return view('home/index');
}

/* 
        CARRETES PUBLIC
 */

if ($route === 'carretes' && $method === 'GET') {
    return (new CarretesController())->index();
}

if (preg_match('#^carretes/(\d+)$#', $route, $matches) && $method === 'GET') {
    $careerId = (int)$matches[1];
    return (new CarretesController())->show($careerId);
}

if ($route === 'admin/carretes') {
    return (new CarretesController())->adminIndex();
}

if ($route === 'admin/carretes/create') {

    if ($method === 'POST') {
        return (new CarretesController())->store($_POST, $_FILES);
    }

    return (new CarretesController())->form();
}

if (preg_match('#^admin/carretes/edit/(\d+)$#', $route, $matches)) {
    $id = (int)$matches[1];

    if ($method === 'POST') {
        return (new CarretesController())->update($id, $_POST, $_FILES);
    }

    return (new CarretesController())->form($id);
}

if (preg_match('#^admin/carretes/delete/(\d+)$#', $route, $matches)) {
    $carreteId = (int)$matches[1];
    return (new CarretesController())->delete($carreteId);
}

/* 
        SEÑUELOS / SENUELos
 */
if ($route === 'senuelos' && $method === 'GET') {
    return (new SenuelosController())->index();
}

if ($route === 'admin/senuelos') {
    return (new SenuelosController())->adminIndex();
}

if ($route === 'admin/senuelos/create') {

    if ($method === 'POST') {
        return (new SenuelosController())->store($_POST, $_FILES);
    }

    return (new SenuelosController())->form();
}

if (preg_match('#^admin/senuelos/edit/(\d+)$#', $route, $matches)) {

    $id = (int)$matches[1];

    if ($method === 'POST') {
        return (new SenuelosController())->update($id, $_POST, $_FILES);
    }

    return (new SenuelosController())->form($id);
}

if (preg_match('#^admin/senuelos/delete/(\d+)$#', $route, $matches)) {
    $senueloId = (int)$matches[1];
    return (new SenuelosController())->delete($senueloId);
}

/* 
        CAÑAS / CANAS
 */
if ($route === 'canas' && $method === 'GET') {
    return (new CanasController())->index();
}

if ($route === 'admin/canas') {
    return (new CanasController())->adminIndex();
}

if ($route === 'admin/canas/create') {

    if ($method === 'POST') {
        return (new CanasController())->store($_POST, $_FILES);
    }

    return (new CanasController())->form();
}

if (preg_match('#^admin/canas/edit/(\d+)$#', $route, $matches)) {

    $id = (int)$matches[1];

    if ($method === 'POST') {
        return (new CanasController())->update($id, $_POST, $_FILES);
    }

    return (new CanasController())->form($id);
}

if (preg_match('#^admin/canas/delete/(\d+)$#', $route, $matches)) {
    $senueloId = (int)$matches[1];
    return (new CanasController())->delete($senueloId);
}

/* 
        ACCESORIOS
 */
if ($route === 'accesorios' && $method === 'GET') {
    return (new accesoriosController())->index();
}

if ($route === 'admin/accesorios') {
    return (new accesoriosController())->adminIndex();
}

if ($route === 'admin/accesorios/create') {

    if ($method === 'POST') {
        return (new accesoriosController())->store($_POST, $_FILES);
    }

    return (new accesoriosController())->form();
}

if (preg_match('#^admin/accesorios/edit/(\d+)$#', $route, $matches)) {

    $id = (int)$matches[1];

    if ($method === 'POST') {
        return (new accesoriosController())->update($id, $_POST, $_FILES);
    }

    return (new accesoriosController())->form($id);
}

if (preg_match('#^admin/accesorios/delete/(\d+)$#', $route, $matches)) {
    $senueloId = (int)$matches[1];
    return (new accesoriosController())->delete($senueloId);
}

http_response_code(404);
return view('errors/404');
