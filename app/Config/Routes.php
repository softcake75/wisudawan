<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');




$routes->get('/', 'AuthController::login');
$routes->post('/cek_login', 'AuthController::cek_login');
$routes->get('/logout', 'AuthController::logout');




$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/prodi', 'ProdiController::index');
    $routes->post('/prodi/store', 'ProdiController::store');

    $routes->get('/user', 'UserController::index');
    $routes->post('/user/store', 'UserController::store');

    $routes->get('/kategori', 'KategoriController::index');
    $routes->post('/kategori/store', 'KategoriController::store');

    $routes->get('/slider', 'SliderController::index');
    $routes->post('/slider/store', 'SliderController::store');

    // app/Config/Routes.php
    $routes->get('/wisudawan', 'SliderController::wisudawan');
    $routes->post('/slider/uploadExcel', 'SliderController::uploadExcel');
    $routes->get('/slider/downloadTemplate', 'SliderController::downloadTemplate');
});
