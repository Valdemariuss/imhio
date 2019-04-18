<?php
class Router
{
    /**
     * @var array $routes
     */
    private static $routes = array();

    /**
     * @param string  $pattern
     * @param function  $callback
     * @return void
     */
    public static function route($pattern, $callback) {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        self::$routes[$pattern] = $callback;
    }

    /**
     * @param string $url
     * @return void
     */
    public static function execute($url) {
        foreach (self::$routes as $pattern => $callback) {
            if (preg_match($pattern, $url, $params)) {
                array_shift($params);
                return call_user_func_array($callback, array_values($params));
            }
        }
    }
}