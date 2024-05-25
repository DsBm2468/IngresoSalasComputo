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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {

    //EJEMPLO
    // $router->metodosHttp('/nombreTabla', 'NombreClase@nombreMetodo');

    $router->get('/contactos', 'ContactoController@index');
    $router->get('/contactos/{id}', 'ContactoController@show');
    $router->post('/contactos', 'ContactoController@store');
    $router->put('/contactos/{id}', 'ContactoController@update');
    $router->delete('/contactos/{id}', 'ContactoController@destroy');
});


// ROUTER SIRVE PARA LLAMAR LOS METODOS (FUNCIONES) DE LA CAPA CONTROLLER
// CADA SECCION DE ROUTER ENTRA A UNA TABLA EN LA BASE DE DATOS
// ES DECIR, SI TENEMOS 5 TABLAS EN LA BASE DE DATOS HACEMOS 5 SECCIONES DE ROUTER
// PARA QUE SE PUEDA EJECUTAR LOS METODOS


// $router->group(['prefix' => 'api'], function () use ($router) {
//     $router->get('/contactos', 'ContactoController@index');
//     $router->get('/contactos/{id}', 'ContactoController@show');
//     $router->post('/contactos', 'ContactoController@store');
//     $router->put('/contactos/{id}', 'ContactoController@update');
//     $router->delete('/contactos/{id}', 'ContactoController@destroy');
// });

