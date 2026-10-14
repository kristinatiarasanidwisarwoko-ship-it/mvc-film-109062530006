<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/models/Film.php';
require_once __DIR__ . '/../app/controllers/FilmController.php';

try {
    $database = new Database();
    $pdo = $database->connect();

    $model = new Film($pdo);
    $controller = new FilmController($model);

    $page = $_GET['page'] ?? 'film';
    $action = $_GET['action'] ?? 'index';

    if ($page !== 'film') {
        http_response_code(404);
        exit('Halaman tidak ditemukan.');
    }

    if (
        in_array($action, ['store', 'update', 'delete'], true) &&
        $_SERVER['REQUEST_METHOD'] !== 'POST'
    ) {
        http_response_code(405);
        exit('Metode permintaan tidak diizinkan.');
    }

    switch ($action) {
        case 'index':
            $controller->index();
            break;

        case 'create':
            $controller->create();
            break;

        case 'store':
            $controller->store();
            break;

        case 'edit':
            $controller->edit();
            break;

        case 'update':
            $controller->update();
            break;

        case 'delete':
            $controller->delete();
            break;

        default:
            http_response_code(404);
            echo 'Aksi tidak ditemukan.';
    }
} catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    echo 'Terjadi kesalahan database. Periksa konfigurasi atau log server.';
}