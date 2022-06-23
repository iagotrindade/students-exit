<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');

$router->post('/login', 'LoginController@signinAction');

$router->get('/sair', 'LoginController@logout');

$router->get('/cadastro', 'LoginController@signup');

$router->post('/cadastro', 'LoginController@signupAction');

$router->post('/add', 'StudentController@newstudent');