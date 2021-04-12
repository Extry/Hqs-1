<?php

use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/add', 'HomeController@add');
$router->post('/add', 'HomeController@addAction');
$router->get('/{id}/del', 'HomeController@del');
