<?php


namespace App\Controllers;

use App\Models\User;
use App\System\Base\Controller;

/**
 * Контроллер пользователей
 * @todo: вынести переменную $list в приватную переменную класса
 * @todo: заменить вызов переменной $list на обращение к приватной переменной $list
 * @todo: реализовать приватный метод find возвращающий по запрошенному ip элемент списка $list
 * @todo: в actionView задействовать метод find для поиска по запрошенному id
 * @todo: в представлении users/view вывести все данные запрошенного пользователя
 */
class UsersController extends Controller
{
    public function actionIndex()
    {
        $list = [
            new User(70, 'Alexey',  'alexey@gmail.com'),
            new User(71, 'Alexey1', 'alexey1@gmail.com'),
            new User(72, 'Alexey2', 'alexey2@gmail.com'),
            new User(73, 'Alexey3', 'alexey3@gmail.com'),
            new User(74, 'Alexey4', 'alexey4@gmail.com'),
            new User(75, 'Alexey5', 'alexey5@gmail.com'),
            new User(76, 'Alexey6', 'alexey6@gmail.com'),
        ];

        return $this->render('users/index', [
            'list' => $list,
        ]);
    }

    public function actionView()
    {
        $id = $_GET['id'] ?? null;
        if ($id === null) {
            return "Ошибка запроса !";
        }
        return $this->render('users/view');
    }
}