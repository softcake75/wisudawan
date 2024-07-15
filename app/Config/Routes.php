<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');


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

