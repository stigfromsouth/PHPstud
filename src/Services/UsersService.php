<?php


namespace App\Services;

use App\Models\User;

/**
 * Сервис управления пользователями.
 * @package App\Services
 */
class UsersService
{
    /**
     * @var User[]
     */
    private $list;

    public function __construct()
    {
        $this->list = [
            new User(1, 'Alexey', 'alexey@gmail.com'),
            new User(2, 'John', 'John@gmail.com'),
            new User(3, 'Phil', 'Phil@gmail.com'),
            new User(4, 'Sonya', 'Sonya@gmail.com'),
            new User(5, 'Vasiliy', 'Vasiliy@gmail.com'),
            new User(6, 'Judy', 'Judy@gmail.com'),
            new User(7, 'Den', 'Den@gmail.com'),
        ];
    }

    /**
     * Создание пользователя
     * @param User $user
     * @return void
     * @throws \Exception
     */
    public function create(User $user): void
    {
        $this->list[] = $user;
    }

    /**
     * Возвращает пользователя по ID
     * @param integer $id
     * @return User|null
     */
    public function findById($id): ?User
    {
        foreach ($this->list as $item) {
            if ($id == $item->id) {
                return $item;
            }
        }
        return null;
    }

    /**
     * Возвращает пользователя по email
     * @param string $email
     * @return User|null
     */
    public function findByEmail($email): ?User
    {
        foreach ($this->list as $item) {
            if ($email == $item->email) {
                return $item;
            }
        }
        return null;
    }

    /**
     * Изменение пользователя
     * @param User $user
     * @return void
     * @throws \Exception
     */
    public function update(User $user): void
    {
        $key = $this->findKey($user);
        $this->list[$key] = $user;
    }

    /**
     * Удаление пользователя
     * @param User $user
     * @return void
     * @throws \Exception
     */
    public function delete(User $user): void
    {
        $key = $this->findKey($user);
        unset($this->list[$key]);
    }

    /**
     * Возвращает список пользователей
     * @return User[]
     */
    public function getList(): array
    {
        return $this->list;
    }

    /**
     * Возвращает идентификатор запрошенного объекта
     * @param User $user
     * @return int
     * @throws \Exception
     */
    public function findKey(User $user): int
    {
        $key = array_search($user, $this->list);
        if ($key === false) {
            throw new \Exception("Пользователь не найден !");
        }
        return $key;
    }

}
