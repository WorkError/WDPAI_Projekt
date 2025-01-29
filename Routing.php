<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/MovieController.php';
require_once 'src/controllers/CategoryController.php';

class Routing {
    public static $routes = ['GET' => [], 'POST' => []];

    public static function get($url, $controller){
        self::$routes['GET'][$url] = $controller;
    }

    public static function post($url, $controller){
        self::$routes['POST'][$url] = $controller;
    }

    public static function run($url) {
        $method = $_SERVER['REQUEST_METHOD'];

        error_log("Requested URL: $url");
        error_log("Request Method: $method");

        foreach (self::$routes[$method] as $route => $controller) {
            $route = preg_replace('/\//', '\\/', $route);
            $route = preg_replace('/\{[a-zA-Z0-9]+\}/', '([a-zA-Z0-9]+)', $route);
            $route = '/^' . $route . '$/';


            if (preg_match($route, $url, $params)) {
                array_shift($params);

                error_log("Matched Route: $route");
                error_log("Controller: $controller");

                $object = new $controller;

                $action = explode("/", $url)[0] ?: 'index';

                error_log("Action: $action");

                call_user_func_array([$object, $action], $params);

                return;
            }
        }
        die("Wrong URL!");
    }

    public static function run2($url) {
        $method = $_SERVER['REQUEST_METHOD'];

        error_log("Requested URL (run2): $url");
        error_log("Request Method: $method");

        if (!preg_match('/^movie\/(\d+)\/add_comment$/', $url, $matches)) {
            die("Wrong URL for add_comment!");
        }

        $movieId = $matches[1];

        error_log("Extracted Movie ID: $movieId");

        $controller = new MovieController();

        if (!method_exists($controller, 'add_comment')) {
            die("Method add_comment not found in MovieController!");
        }

        call_user_func_array([$controller, 'add_comment'], [$movieId]);
    }

}