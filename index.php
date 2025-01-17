<?php

namespace App;

session_start();

require_once('vendor/autoload.php');

use Router\Router;
$router = new Router($_GET['url']);

$router->get('/logout', "App\Controller\AppController@logout");
$router->get('/delete-rate/:id', "App\Controller\RateController@delete");
$router->get('/edit-rate/:id', "App\Controller\RateController@modify");
$router->post('/edit-rate/:id', "App\Controller\RateController@modify");
$router->get('/book/:id', "App\Controller\BookController@showArticle");
$router->get('/rate-book/:id', "App\Controller\RateController@add");
$router->post('/rate-book/:id', "App\Controller\RateController@add");
$router->get('/delete-book/:id', "App\Controller\BookController@delete");
$router->get('/edit-book/:id', "App\Controller\BookController@modify");
$router->post('/edit-book/:id', "App\Controller\BookController@modify");
$router->get('/add-book', "App\Controller\BookController@add");
$router->post('/add-book', "App\Controller\BookController@add");
$router->get('/all-books', "App\Controller\BookController@all");
$router->get('/home', "App\Controller\AppController@home");
$router->get('/log-out', "App\Controller\AppController@logout");
$router->get('/sign-up', "App\Controller\UserController@register");
$router->post('/sign-up', "App\Controller\UserController@register");
$router->get('/sign-in', "App\Controller\AppController@login");
$router->post('/sign-in', "App\Controller\AppController@login");
$router->get("/", "App\Controller\AppController@index");

$router->run();