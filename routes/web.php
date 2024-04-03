<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AlgoritmaGenetika;

$router->get('/', 'ProductController@index');
// $router->get('/products/{id}', 'ProductController@show');
// $router->post('/products', 'ProductController@store');
// $router->put('/products/{id}', 'ProductController@update');
// $router->delete('/products/{id}', 'ProductController@destroy');

$router->get('/getParam', 'AlgoritmaGenetika@getParam');
$router->get('/params', 'AlgoritmaGenetika@param');