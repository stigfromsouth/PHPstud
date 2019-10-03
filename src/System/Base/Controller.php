<?php


namespace App\System\Base;

/**
 * Базовый класс для веб контроллеров
 * @package App\System\Base
 */
abstract class Controller
{
    protected function render(string $viewName, array $params=[])
    {
        extract($params);
        return include VIEWS_PATH . "{$viewName}.php";
    }

    protected function redirect(string $route)
    {
        $destination = 'Location: ' . 'http://study.local' . $route;
        return header($destination);
    }

    protected function isRequestMethodPost() : bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}