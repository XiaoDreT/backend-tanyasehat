<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

// API Routes
$routes->group("api", ["namespace" => "App\Controllers\Api"], function ($routes) {

    $routes->get("invalid-access", "AuthController::accessDenied");

    //POST
    $routes->post("register", "AuthController::register");

    //POST
    $routes->post("login", "AuthController::login");

    //GET
    $routes->get("profile", "AuthController::profile", ["filter" => "apiauth"]);

    //GET
    $routes->get("logout", "AuthController::logout", ["filter" => "apiauth"]);
});
