<?php
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/controllers/MainController.php';
require_once __DIR__ . '/../app/controllers/CadastroController.php';
require_once __DIR__ . '/../app/controllers/LogoutController.php';
require_once __DIR__ . '/../app/controllers/LoginController.php';


$router = new Router();
$router->addRoute('/', 'MainController@index');
$router->addRoute('/cadastro', 'CadastroController@form');
$router->addRoute('/cadastrar', 'CadastroController@cadastrar');
$router->addRoute('/login', 'LoginController@form');
$router->addRoute('/logar', 'LoginController@login');
$router->addRoute('/logout', 'LogoutController@sair');


$router->run();
