<?php


namespace App\Router;


class Route
{

    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    public function __construct($path, $callable) {
        $this->path = trim($path, "/");
        $this->callable = $callable;
    }

    public function match($url) {
        $url = trim($url, "/");
        $path = preg_replace('#:([\w]+)#', '(^/]+)', $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)) {
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    public function call() {
        return call_user_func_array($this->callable, $this->matches);
    }

    public function with($param, $regex){
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this; // On retourne tjrs l'objet pour enchainer les arguments
    }

    public function getUrl ($params) {
        $path = $this->path;
        foreach ($params as $k => $v) {
            $path = str_replace(":$k", $v, $path);
        }
        return $path;
    }

}