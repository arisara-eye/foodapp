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
    //จะไปท ำงำนในคลำส ProductsController ที่ฟังกช์ นั readAll ท ำงำนด้วยเมธอด get
    $router->get('products', ['uses' => 'ProductsController@readAll']);
    //จะไปท ำงำนในคลำส ProductsController ที่ฟังกช์ นั showOne ท ำงำนด้วยเมธอด get
    $router->get('products/{id}', ['uses' => 'ProductsController@readOne']);
    //จะไปท ำงำนในคลำส ProductsController ที่ฟังกช์ นั create ท ำงำนด้วยเมธอด post
    $router->post('products', ['uses' => 'ProductsController@create']);
    //จะไปท ำงำนในคลำส ProductsController ที่ฟังกช์ นั update ท ำงำนด้วยเมธอด put
    $router->put('products/{id}', ['uses' => 'ProductsController@update']);
    //จะไปท ำงำนในคลำส ProductsController ที่ฟังกช์ นั delete ท ำงำนด้วยเมธอด delete
    $router->delete('products/{id}', ['uses' => 'ProductsController@delete']);

    //แสดงข้อมูลทั้งหมด พร้อม url รูปภาพ
     $router->get('products_image', ['uses' => 'ProductsController@showAllWithImage']);
    //แสดงข้อมูลตาม id พร้อม url รูปภาพ
    $router->get('products_image/{id}', ['uses' => 'ProductsController@showOneWithImage']);

    //ข้อมูล users........
    //แสดงข้อมูล users ทั้งหมด
    $router->get('users', ['uses' => 'UsersController@readAll']);
    //เพิ่มข้อมูลusersใหม่
    $router->post('users', ['uses' => 'UsersController@create']);
    //แสดงข้อมูล users ตามรหัส
    $router->get('users/{id}', ['uses' => 'UsersController@readOne']);
    $router->post('userslogin', ['uses' => 'UsersController@login']);
    $router->put('users/{id}', ['uses' => 'UsersController@update']);
   });
   
