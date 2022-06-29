<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');

$router->post('/login', 'LoginController@signinAction');

$router->get('/sair', 'LoginController@logout');

$router->get('/cadastro', 'LoginController@signup');

$router->post('/cadastro', 'LoginController@signupAction');

$router->get('/recover', 'LoginController@recover');

$router->post('/recover', 'LoginController@recoverAction');

$router->get('/search', 'SearchController@index');

$router->post('/filter', 'FilterController@index');

$router->post('/add', 'StudentController@newstudent');

$router->get('/{id}/return', 'StudentController@studentreturn');

$router->get('/{id}/delete', 'StudentController@delete');