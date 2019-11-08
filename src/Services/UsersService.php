<?php


namespace App\Services;

use App\Models\User;

/**
 * Сервис управления пользователями.
 * @package App\Services
 */
class UsersService extends User
{
    /**
     * Создание пользователя
     * @param User $user
     * @return void
     * @throws \Exception
     */
    public function create(User $user): void
    {
        $this->insert();
    }

    /**
     * Возвращает пользователя по ID
     * @param integer $id
     * @return ActiveRecord|User|bool|null
     */
    public function findById($id)
    {
        $user = new User();
        return $user->find($id);
    }

    /**
     * Возвращает пользователя по email
     * @param string $email
     * @return ActiveRecord|User|bool|null
     */
    public function findByEmail(string $email): ?User
    {
        $user = new User();
        return $user->eq('email', $email)->find();
    }

    /**
     * Изменение пользователя
     * @param User $user
     * @return boolean|ActiveRecord
     */
    public function update(User $user):bool
    {
        $user->update();
    }

    /**
     * Удаление пользователя
     * @param User $user
     * @return ActiveRecord|boolean
     * @throws \Exception
     */
    public function delete(User $user):bool
    {
        $user->delete();
    }

    /**
     * Возвращает список пользователей
     * @return User[]
     */
    public function getList(): array
    {
        $user = new User();
        return $user->findAll();
    }
}
