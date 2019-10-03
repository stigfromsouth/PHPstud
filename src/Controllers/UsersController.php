<?php


namespace App\Controllers;

use App\Models\User;
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

    public function actionCreate()
    {
        $user = new User();
        if ($this->isRequestMethodPost()) {
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            try {
                $this->usersService->create($user);
                $this->redirect('/users/index');
            } catch (\Exception $exception) {

            }
        }
        return $this->render('users/EditForm', [
                'title' => 'Создание пользователя',
                'user' => $user,
            ]);
    }
    public function actionUpdate()
    {
        $id = $this->getId();
        $user = $this->usersService->findById($id);
        if ($user === NULL) {
            return "ID с таким номером отсутствует !";
        }

        if ($this->isRequestMethodPost()) {
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            try {
                $this->usersService->create($user);
                $this->redirect('/users/index');
            } catch (\Exception $exception) {

            }
        }
        return $this->render('users/EditForm', [
            'title' => 'Редактирование пользователя ' . $user->name,
            'user' => $user,
        ]);
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
     * Проверка редиректа
     */
    public function actionRedirect()
    {
        return $this->redirect('/users/index');
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