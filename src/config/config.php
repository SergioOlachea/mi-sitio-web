<?php

require __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

return [

    'base_url'   => 'http://localhost/yeyos_fishing/',

    'public_url' => 'http://localhost/yeyos_fishing/public/',

    'assets_url' => 'http://localhost/yeyos_fishing/public/assets/img/',

    'src_url'    => 'http://localhost/yeyos_fishing/src/',

        'db' =>[
        'connection' => $_ENV['DB_CONNECTION'],
        'host' => $_ENV['DB_HOST'],
        'name' => $_ENV['DB_DATABASE'],
        'user' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'port' => $_ENV['DB_PORT'],
        'charset' => $_ENV['DB_CHARSET']

    ]

];

?>
