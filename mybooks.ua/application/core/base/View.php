<?php

namespace application\core\base;
/**
 * Class View The class responsible for connecting types and templates;
 * @package application\core\base
 */
class View
{
    public $route = [];
    public $view;
    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        $this->layout = $layout ?: "default";
        $this->view = $view;
    }

    public function render($vars)
    {
        extract($vars);
        $controller = str_replace('Controller', '', $this->route['controller']);
        $file_view = "application/views/$controller/{$this->view}.php";
        ob_start();

        if (is_file($file_view)) {
            require $file_view;
        } else {
            echo "<p>Вид $file_view не знайденo</p>>";
        }

        $content = ob_get_clean();

        $file_layout = "application/views/layouts/{$this->layout}.php";
        if (is_file($file_layout)) {
            require $file_layout;
        } else {
            echo "<p>Шаблон $file_layout не знайденo</p>>";
        }
    }
}