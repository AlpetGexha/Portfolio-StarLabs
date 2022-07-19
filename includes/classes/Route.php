<?php

class Route
{

    public $routes = [];

    /**
     *
     *
     * @param type $route
     * @param type $method
     *
     * */

    public static function action(String $action, Closure $callback)
    {
        global $routes;
        $action = trim($action, '/');
        $routes[$action] = $callback;
    }

    public static function dispatch($action)
    {
        global $routes;
        $action = trim($action, '/');
        $callback = $routes[$action];

        echo call_user_func($callback);
    }

//    on use
/*
 * Route::action('/test', function () {
    return "Hello form the test route";
});
 *
 *
 *
 * $action = $_SERVER['REQUEST_URI'];
    dispatch($action);

 * */

}