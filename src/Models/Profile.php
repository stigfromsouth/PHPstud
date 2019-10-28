<?php


namespace App\Models;

use ActiveRecord;

/**
 * Модель профиля пользователя
 *
 * @property INT @user_id идентификатор пользователя
 * @property string $theme пользовательская тема
 * @property string default Null $last_auth последняя авторизация
 */
class Profile extends ActiveRecord
{
    public $table = 'profile';
    public $primaryKey = 'user_id';

    public $relations = [
        'user' => [self::HAS_ONE, User::class, 'id'],
    ];
}
