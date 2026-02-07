<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * API Routes - Hospital System
 * --------------------------------------------------------------------
 */

// API: Data Pasien dengan JOIN (Query 1 & 2)
$routes->group('api', function($routes) {
    // GET /api/pasien-data - Join semua tabel dengan filter
    $routes->get('pasien-data', 'Api\HospitalApiController::getPasienData');
    
    // GET /api/pasien-per-dokter - Jumlah pasien per dokter (Query 3 & 4)
    $routes->get('pasien-per-dokter', 'Api\HospitalApiController::getPasienPerDokter');
});

/*
 * --------------------------------------------------------------------
 * CRUD Routes - Pasien
 * --------------------------------------------------------------------
 */
$routes->group('pasien', function($routes) {
    $routes->get('/', 'PasienController::index');                    // GET all
    $routes->get('(:segment)', 'PasienController::show/$1');         // GET by ID
    $routes->post('/', 'PasienController::create');                  // CREATE
    $routes->put('(:segment)', 'PasienController::update/$1');       // UPDATE
    $routes->delete('(:segment)', 'PasienController::delete/$1');    // DELETE
});

/*
 * --------------------------------------------------------------------
 * Algorithm Routes - Test Algoritma
 * --------------------------------------------------------------------
 */
$routes->group('algorithm', function($routes) {
    $routes->get('test-all', 'AlgorithmController::testAll');
    $routes->get('factorial/(:num)', 'AlgorithmController::testFactorial/$1');
    $routes->get('century/(:num)', 'AlgorithmController::testCentury/$1');
    $routes->post('missing-statues', 'AlgorithmController::testMissingStatues');
    $routes->post('adjacent-product', 'AlgorithmController::testAdjacentProduct');
});
