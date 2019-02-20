<?php

namespace App\Routes;

/**
 * Class Route
 * @package App\Routes
 */
class Route {

    /**
     * @var string
     */
    private $path;

    /**
     * @var string|array
     */
    private $callable;

    /**
     * @var array
     */
    private $matches = [];

    /**
     * @var array
     */
    private $params = [];

    /**
     * Route constructor.
     * @param $path
     * @param $callable
     */
    public function __construct($path, $callable) {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    /**
     * Ajouter des paramètres d'URL ( ?url= )
     * @param $param
     * @param $regex
     * @return $this
     */
    public function with($param, $regex) {
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this;
    }

    /**
     * Savoir s'il y a des paramètres à prendre en compte sur la route
     * @param $url
     * @return bool
     */
    public function match($url) {
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
        $regex = '#^' . $path . '$#i';
        $matches = [];
        if (!preg_match($regex, $url, $matches)) {
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    /**
     * Retourner les paramètres si elles existent
     * @param $match
     * @return string
     */
    private function paramMatch($match) {
        if (isset($this->params[$match[1]])) {
            return "({$this->params[$match[1]]})";
        }
        return '([^/]+)';
    }

    /**
     * Appelle le bon controller
     * @return mixed
     */
    public function call() {
        if (is_string($this->callable)) {
            $params = explode('#', $this->callable);
            $controller = '\Controllers\\' . $params[0] . 'Controller';
            $controller = new $controller();
            return call_user_func_array([$controller, $params[1]], $this->matches);
        } else {
            return call_user_func_array($this->callable, $this->matches);
        }
    }

    /**
     * Récupérer le lien possèdant les paramètres ( ?url= )
     * @param $params
     * @return string
     */
    public function getUrl($params) {
        $path = $this->path;
        foreach ($params as $k => $v) {
            $path = str_replace(':' . $k, $v, $path);
        }
        return $path;
    }

}