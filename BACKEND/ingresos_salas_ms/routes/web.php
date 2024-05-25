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

    $router->get('/ingresos', 'IngresoController@index');
    $router->get('/ingresos/{id}', 'IngresoController@show');
    $router->post('/ingresos', 'IngresoController@store');
    $router->put('/ingresos/{id}', 'IngresoController@update');
    $router->delete('/ingresos/{id}', 'IngresoController@destroy');

    $router->get('/horarios', 'HorarioController@index');
    $router->get('/horarios/{id}', 'HorarioController@show');
    $router->post('/horarios', 'HorarioController@store');
    $router->put('/horarios/{id}', 'HorarioController@update');
    $router->delete('/horarios/{id}', 'HorarioController@destroy');

    $router->get('/programas', 'ProgramaController@index');
    $router->get('/programas/{id}', 'ProgramaController@show');
    $router->post('/programas', 'ProgramaController@store');
    $router->put('/programas/{id}', 'ProgramaController@update');
    $router->delete('/programas/{id}', 'ProgramaController@destroy');

    $router->get('/responsables', 'ResponsableController@index');
    $router->get('/responsables/{id}', 'ResponsableController@show');
    $router->post('/responsables', 'ResponsableController@store');
    $router->put('/responsables/{id}', 'ResponsableController@update');
    $router->delete('/responsables/{id}', 'ResponsableController@destroy');

    $router->get('/salas', 'SalaController@index');
    $router->get('/salas/{id}', 'SalaController@show');
    $router->post('/salas', 'SalaController@store');
    $router->put('/salas/{id}', 'SalaController@update');
    $router->delete('/salas/{id}', 'SalaController@destroy');
    
});


// ROUTER SIRVE PARA LLAMAR LOS METODOS (FUNCIONES) DE LA CAPA CONTROLLER
// CADA SECCION DE ROUTER ENTRA A UNA TABLA EN LA BASE DE DATOS
// ES DECIR, SI TENEMOS 5 TABLAS EN LA BASE DE DATOS HACEMOS 5 SECCIONES DE ROUTER
// PARA QUE SE PUEDA EJECUTAR LOS METODOS



//     $router->get('/contactos', 'ContactoController@index');
//     $router->get('/contactos/{id}', 'ContactoController@show');
//     $router->post('/contactos', 'ContactoController@store');
//     $router->put('/contactos/{id}', 'ContactoController@update');
//     $router->delete('/contactos/{id}', 'ContactoController@destroy');


