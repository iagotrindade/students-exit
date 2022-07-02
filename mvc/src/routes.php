<?php
use core\Router;
use \src\controllers\LoginController;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');

$router->post('/login', 'LoginController@signinAction');

$router->get('/sair', 'LoginController@logout');

$router->get('/cadastro', 'LoginController@signup');

$router->post('/cadastro', 'LoginController@signupAction');

$router->get('/recover', 'LoginController@recover');

$router->post('/send_mail', 'LoginController@recoverAction');

$router->get('/{token}={token}/recover', 'LoginController@passwordChange');

$router->post('/recover', 'LoginController@updatePassword');

$router->get('/search', 'SearchController@index');

$router->post('/filter', 'FilterController@index');

$router->post('/add', 'StudentController@newstudent');

$router->get('/{id}/return', 'StudentController@studentreturn');

$router->get('/{id}/delete', 'StudentController@delete');