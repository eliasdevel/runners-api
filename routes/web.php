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


$router->get('/', function () {
    return 'Hello World';
});

$default_model_routes = ['person', 'race'];

// default routes 
foreach ($default_model_routes as $route_name) {
    $model_name = ucfirst($route_name);

    $router->get('api/v1/'.$route_name, $model_name.'Controller@index');
    $router->get("api/v1/$route_name/{id}", $model_name.'Controller@show');
}




//
// $router->get('api/v1/ratings', 'RatingController@index');

// $router->get('api/v1/ratings/{id}', 'RatingController@show');

// $router->post('api/v1/ratings', 'RatingController@create');

// $router->put('api/v1/ratings/{id}', 'RatingController@update');

// $router->delete('api/v1/ratings/{id}', 'RatingController@destroy');