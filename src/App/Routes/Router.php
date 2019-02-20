<?php

namespace App\Routes;
use App\Protections\Security;

class Router {
    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $routes = [];

    /**
     * @var array
     */
    private $namedRoutes = [];

    /**
     * Router constructor.
     * @param $url Clé de l'url ( ?$url=
     */
    public function __construct($url) {
        $this->url = isset($_GET[$url]) ? $_GET[$url] : '/';
    }

    /**
     * Ajout d'une route de type GET
     * @param $path
     * @param $callable
     * @param null $name
     * @return Route
     */
    public function get($path, $callable, $name = null) {
        return $this->add($path, $callable, $name, 'GET');
    }

    /**
     * Ajout d'une route de type POST
     * @param $path
     * @param $callable
     * @param null $name
     * @return Route
     */
    public function post($path, $callable, $name = null) {
        return $this->add($path, $callable, $name, 'POST');
    }

    /**
     * Ajout des routes
     * @param $path
     * @param $callable
     * @param $name
     * @param $method
     * @return Route
     */
    private function add($path, $callable, $name, $method) {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if (is_string($callable) && $name === null) {
            $this->namedRoutes[$callable] = $route;
        }
        if ($name) {
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }

    /**
     * Démarrage de l'application
     * @throws RouterExceptions
     */
    public function run() {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouterExceptions('REQUEST_METHOD does not exist.');
        }
        $match = false;
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                $route->call();
                $match = true;
            }
        }
        if (!$match) {
            if(isset($this->namedRoutes['default'])) {
                $this->safeLocalRedirect('default');
            } else {
                throw new RouterExceptions('No matching routes.');
            }
        }
    }

    /**
     * Rediriger vers un lien à partir du nom de la route
     * @param $link
     * @param array $params
     * @param bool $exit
     */
    private function safeLocalRedirect($link, $params = [], $exit = true) {
        $security = new Security();
        $security->safeLocalRedirect($link, $params, $exit);
    }

    /**
     * Récupérer la valeur du $_GET
     * @param $name
     * @param array $params
     * @return mixed
     * @throws RouterExceptions
     */
    public function getUrl($name, $params = []) {
        if (!isset($this->namedRoutes[$name])) {
            throw new RouterExceptions('No route found with this name.');
        }
        return $this->namedRoutes[$name]->getUrl($params);
    }

    /**
     * Récupérer le lien complet
     * @param $name
     * @param array $params
     * @return string
     * @throws RouterExceptions
     */
    public function getFullUrl($name, $params = []) {
        return PROJECT_LINK . '/' . $this->getUrl($name, $params);
    }

}