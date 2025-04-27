<?php
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/controllers/GuitarrasController.php';
require_once __DIR__ . '/../app/controllers/MainController.php';
require_once __DIR__ . '/../app/controllers/CadastroController.php';
require_once __DIR__ . '/../app/controllers/LogoutController.php';
require_once __DIR__ . '/../app/controllers/LoginController.php';
require_once __DIR__ . '/../app/controllers/CarrinhoController.php';


$router = new Router();
$router->addRoute('/', 'MainController@index');
$router->addRoute('/cadastro', 'CadastroController@form');
$router->addRoute('/cadastrar', 'CadastroController@cadastrar');
$router->addRoute('/login', 'LoginController@form');
$router->addRoute('/logar', 'LoginController@login');
$router->addRoute('/logarAdm', 'LoginController@login');
$router->addRoute('/logout', 'LogoutController@sair');
$router->addRoute('/guitarras', 'GuitarrasController@catalogo');
$router->addRoute('/leiloes', 'GuitarrasController@leiloes');
$router->addRoute('/comprar', 'GuitarrasController@comprar');
$router->addRoute('/cadastro-guitarra', 'GuitarrasController@cadastroGuitarra');
$router->addRoute('/cadastro-leilao', 'GuitarrasController@cadastroLeilao');
$router->addRoute('/cadastrar-guitarra', 'GuitarrasController@cadastrarGuitarra');
$router->addRoute('/cadastrar-leilao', 'GuitarrasController@cadastrarLeilao');
$router->addRoute('/remover-guitarra', 'GuitarrasController@removerGuitarra');
$router->addRoute('/carrinho', 'CarrinhoController@carrinho');
$router->addRoute('/adicionar-carrinho', 'CarrinhoController@adicionarCarrinho');
$router->addRoute('/remover-carrinho', 'CarrinhoController@removerCarrinho');

$router->run();
