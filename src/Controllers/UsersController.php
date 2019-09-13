<?php


namespace App\Controllers;

use App\Models\User;
use App\System\Base\Controller;

/**
 * Контроллер пользователей
 * @todo: вынести переменную $list в приватную переменную класса
 * @todo: заменить вызов переменной $list на обращение к приватной переменной $list
 * @todo: реализовать приватный метод find возвращающий по запрошенному id элемент списка $list
 * @todo: в actionView задействовать метод find для поиска по запрошенному id
 * @todo: в представлении users/view вывести все данные запрошенного пользователя
 */
class UsersController extends Controller
{
    private $list;

    private function find($id)
    {
        
    } 

    public function actionIndex()
    {
        $this->list = [
            new User(1, 'Alexey',  'alexey@gmail.com'),
            new User(2, 'John', 'John@gmail.com'),
            new User(3, 'Phil', 'Phil@gmail.com'),
            new User(4, 'Sonya', 'Sonya@gmail.com'),
            new User(5, 'Vasiliy', 'Vasiliy@gmail.com'),
            new User(6, 'Judy', 'Judy@gmail.com'),
            new User(7, 'Den', 'Den@gmail.com'),
        ];       
        return $this->render('users/index', [
            'list' => $this->list,
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