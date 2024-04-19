<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ParametersController;
use App\Http\Controllers\IndividuController;
use App\Http\Controllers\PopulationController;
use App\Http\Controllers\FitnessController;

$router->get('/', 'ProductController@index');
// $router->get('/products/{id}', 'ProductController@show');
// $router->post('/products', 'ProductController@store');
// $router->put('/products/{id}', 'ProductController@update');
// $router->delete('/products/{id}', 'ProductController@destroy');

$router->get('/getParams', 'ParametersController@getParam');
$router->get('/createdProducts', 'CatalogController@createProductColumn');
$router->get('/getProducts', 'CatalogController@getProducts');
$router->get('/countGen', 'IndividuController@countNumberOfGen');
$router->get('/population', 'PopulationController@createRandomPopulation');
$router->get('/selectingItem', 'FitnessController@selectingItem');
$router->get('/calculateFitness', 'FitnessController@calculaterFitnessValue');


