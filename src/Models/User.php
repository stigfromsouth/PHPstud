<?php


namespace App\Models;

use http\Exception\BadQueryStringException;

/**
 * Модель пользователя
 */
class User
{
    /**
     * @var int идентификатор
     */
    public $id;

    /**
     * @var string Имя
     */
    public $name;

    /**
     * @var string Почтовый адрес
     */
    public $email;

    /**
     * @var string Зашифрованный пароль
     */
    public $passwordHash;

    /**
     * @var boolean Признак активности
     */
    public $isActive;

    /**
     * Конструктор.
     *
     * @param int|null $id
     * @param string|null $name
     * @param string|null $email
     * @param string|null $passwordHash
     * @param bool $isActive
     */
    public function __construct(
        int $id = null,
        string $name = null,
        string $email = null,
        string $passwordHash = null,
        bool $isActive = true
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->isActive = $isActive;
    }
}
