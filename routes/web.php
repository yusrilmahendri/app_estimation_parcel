<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Http\Controllers\ProductController;


$router->get('/products', [ProductController::class, 'index']);
$router->get('/products/{id}', [ProductController::class, 'show']);
$router->post('/products', [ProductController::class, 'store']);
$router->put('/products/{id}', [ProductController::class, 'update']);
$router->delete('/products/{id}', [ProductController::class, 'destroy']);
