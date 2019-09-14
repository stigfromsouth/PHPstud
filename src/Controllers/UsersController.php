<?php


namespace App\Controllers;

use App\Services\UsersService;
use App\System\Base\Controller;

/**
 * Контроллер пользователей
 * @todo: в представлении users/view вывести все данные запрошенного пользователя
 * @todo: PHPdoc, приватные методы должны идти после публичных
 * @todo: В базовом контроллере реализовать метод redirect принимающий требуемый route и заставляющий браузер перейти на него функция header()
 * @todo: Реализовать методы создания и обновления записи в контроллере пользователей (новый action) (оба метода используют одно представление,
 * представления передают экземпляр пользователя, в случае успеха заставляют браузер перейти в список, представление содержит две кнопки
 * отмена - вернуться к списку, сохранить - отправка формы)
 */
class UsersController extends Controller
{
    /**
     * @var UsersService
     */
    private $usersService;

    public function __construct()
    {
        $this->usersService = new UsersService();
    }

    public function actionIndex()
    {
        return $this->render('users/index', [
            'list' => $this->usersService->getList(),
        ]);
    }

    public function actionView()
    {
        $id = $this->getId();

        $item = $this->usersService->findById($id);

        if (!$item) {
            return "ID с таким номером отсутствует !";
        }

        return $this->render('users/view', [
                'user' => $item]);
    }

    /**
     * Удаление пользователя
     * @throws \Exception
     */
    public function actionDelete()
    {
        $id = $this->getId();
        $item = $this->usersService->findById($id);
        echo(count($this->usersService->getList())). '<br>';
        $this->usersService->delete($item);
        echo(count($this->usersService->getList()));
    }

    /**
     * @return int
     * @throws \Exception
     */
    private function getId()
    {
        $id = $_GET['id'] ?? null;

        if ($id === null) {
            return "Ошибка запроса !";
            throw new \Exception("Ошибка обработки запроса !");
        }
        return (int)$id;
    }
}