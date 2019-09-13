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
}