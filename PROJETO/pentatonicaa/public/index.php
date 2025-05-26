<?php
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/controllers/GuitarrasController.php';
require_once __DIR__ . '/../app/controllers/MainController.php';
require_once __DIR__ . '/../app/controllers/CadastroController.php';
require_once __DIR__ . '/../app/controllers/LogoutController.php';
require_once __DIR__ . '/../app/controllers/LoginController.php';
require_once __DIR__ . '/../app/controllers/CarrinhoController.php';
require_once __DIR__ . '/../app/controllers/GuiasController.php';
require_once __DIR__ . '/../app/controllers/CompraController.php';
require_once __DIR__ . '/../app/controllers/AreaClienteController.php';



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
$router->addRoute('/remover-leilao', 'GuitarrasController@removerLeilao');
$router->addRoute('/edita-guitarra', 'GuitarrasController@editaGuitarra');
$router->addRoute('/editar-guitarra', 'GuitarrasController@editarGuitarra');
$router->addRoute('/edita-leilao', 'GuitarrasController@editaLeilao');
$router->addRoute('/editar-leilao', 'GuitarrasController@editarLeilao');
$router->addRoute('/carrinho', 'CarrinhoController@carrinho');
$router->addRoute('/adicionar-carrinho', 'CarrinhoController@adicionarCarrinho');
$router->addRoute('/remover-carrinho', 'CarrinhoController@removerCarrinho');
$router->addRoute('/guia', 'GuiasController@guia');
$router->addRoute('/participar', 'GuitarrasController@participar');
$router->addRoute('/lance', 'GuitarrasController@lance');
$router->addRoute('/pagar', 'CompraController@comprar');
$router->addRoute('/retorno', 'CompraController@retorno');
$router->addRoute('/notificacao', 'CompraController@webhook');
$router->addRoute('/aguardando', 'CompraController@aguardando');
$router->addRoute('/erro', 'CompraController@erro');
$router->addRoute('/area-cliente', 'AreaClienteController@areaCliente');
$router->addRoute('/historico', 'HistoricoController@index');



$router->run();
