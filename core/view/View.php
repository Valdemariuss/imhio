<?php
class View
{
    /**
     * @param string  $content
     * @return string
     */
    public static function renderLayout($content) {
        ob_start();
        require 'views/layout.php';
        return ob_get_clean();
    }

    /**
     * @param string  $viewName
     * @param array $params
     * @return void
     */
    public static function render($viewName, array $params = []) {
        extract($params);
        ob_start();
        require 'views/'. $viewName .'.php';
        $content = ob_get_clean();
        ob_end_clean();
        echo self::renderLayout($content);
    }
}
