<?php


namespace App\System;

define('BASE_PATH', dirname(__DIR__));

define('VIEWS_PATH', BASE_PATH . '/Views/');

class Application
{
    const CONTROLLERS_DIR = 'App\\Controllers\\';

    public function run()
    {
        print_r($this->handleRoute());
    }

    private function handleRoute()
    {
        $uri = $_SERVER['REQUEST_URI'];

        // user-profile/alexander-belashev
        // App\Controllers\UserProfileController::actionAlexanderBelashev

        $uri = trim($uri, '/');

        $uri = explode('/', $uri);

        $controller = 'home';
        $action = 'index';

        if (isset($uri[1])) {
            $action = $uri[1];
            $action = explode('?', $action);
            $action = $action[0];
        }

        $action = 'action' . $this->convertDashToCammel($action);

        if (isset($uri[0])) {
            $controller = $uri[0];
        }
        $controller = static::CONTROLLERS_DIR . $this->convertDashToCammel($controller) . 'Controller';

        $controller = new $controller();

        $exec = call_user_func([$controller, $action]);

        return $exec;
    }


    /**
     * Преобразование в кэмел кесй строки разделённой дефисами.
     *
     * @param string $dashLine разделённая дефисом строка
     * @return string
     */
    private function convertDashToCammel(string $dashLine)
    {
        $result = explode('-', $dashLine);

        array_walk($result, function (&$item) {
            $item = ucfirst($item);
        });

        $result = implode('', $result);

        return $result;
    }
}
