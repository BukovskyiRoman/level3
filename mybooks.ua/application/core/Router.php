<?php
namespace application\core;

/**
 * Class Router
 * @package application\core
 */
class Router
{
    protected static $routes = [];
    protected static $route = [];

    /**
     * @param $reg
     * @param array $route
     */
    public static function add($reg, $route = [])
    {
        self:: $routes[$reg] = $route;
    }

    /**
     * @return array
     */
    public static function getRoutes()
    {
        return self:: $routes;
    }

    /**
     * @return array
     */
    public static function getRoute()
    {
        return self:: $route;
    }

    /**
     * Метод, який перевіряє наявність необхідної адреси
     * @param $url адреса необхідної сторінки
     * @return bool логічне значення чи є збіги в маршруті
     */
    public static function matchRoute($url)
    {
        if (strpbrk($url, '?')) {
            if (strstr($url, 'admin')) {
                $uri = explode('?', $url);

                if (isset($uri[0]) && strstr($uri[1], 'page'))
                {
                    self::$route['action'] = 'view';
                    self::$route['controller'] = 'Admin';
                    return true;
                }

                if (isset($uri[0]) && strstr($uri[1], 'id'))
                {
                    self::$route['action'] = 'delete';
                    self::$route['controller'] = 'Admin';
                    $id = explode('=', $uri[1]);
                    self::$route['alias'] = $id[1];
                    return true;
                }

                self::$route['action'] = 'add';
                self::$route['controller'] = 'Admin';
                return true;
            } else {
                $uri = explode('?', $url);

                if (isset($uri[0]) && strstr($uri[1], 'id'))
                {
                    self::$route['action'] = 'count';
                    self::$route['controller'] = 'Book';
                    $id = explode('=', $uri[1]);
                    self::$route['alias'] = $id[1];
                    return true;
                }

                self::$route['action'] = 'view';
                self::$route['controller'] = 'Books';
                return true;
            }
        } else {
            foreach (self::$routes as $pattern => $route) {
                if (preg_match("#$pattern#i", $url, $matches)) {
                    foreach ($matches as $key => $value) {
                        if (is_string($key)) {
                            $route[$key] = $value;
                        }
                    }
                    if (!isset($route['action']) || is_numeric($route['action'])) {
                        $route['alias'] = $route['action'];
                        $route['action'] = 'view';                                          //default action
                    }
                    $route['controller'] = ucfirst($route['controller']);
                    self::$route = $route;
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @param $url
     */
    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {
            $controller = 'application\controllers\\' . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $cont = new $controller(self::$route);
                $action = self::$route['action'];

                if (method_exists($cont, $action)) {
                    $cont->$action();
                    $cont->getView();
                } else {
                    http_response_code(400);
                    include 'application/errors/400.html';
                }
            } else {
                http_response_code(400);
                include 'application/errors/400.html';
            }
        } else {
            http_response_code(404);
            include 'application/errors/404.html';
        }
    }
}