<?php
class Router {
    private $routes = [];

    public function addRoute($uri, $controllerAction) {
        $this->routes[$uri] = $controllerAction;
    }

    public function run() {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = parse_url($uri, PHP_URL_PATH);
    
        $base = '/pentatonicaa/PROJETO/pentatonicaa/public/';
        if (str_starts_with($uri, $base)) {
            $uri = substr($uri, strlen($base));
        }
    
        if ($uri === '') $uri = '/';
    
        if (array_key_exists($uri, $this->routes)) {
            list($controller, $action) = explode('@', $this->routes[$uri]);
            $controller = new $controller();
            $controller->$action();
        } else {
            echo "Página não encontrada!";
        }
    }
    
}
