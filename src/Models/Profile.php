<?php


namespace App\Models;

use DateTime;

/**
 * Модель профиля пользователя
 */
class Profile
{
    /**
     * @var int Идентификатор пользователя
     */
    public $userId;

    /**
     * @var string Наименование темы
     */
    public $theme;

    /**
     * @var DateTime Время последнего логина
     */
    public $lastAuthAt;
}
