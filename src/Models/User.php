<?php


namespace App\Models;

use ActiveRecord;

/**
 * Модель пользователя
 *
 * @property INT $id идентификатор пользователя
 * @property string $name имя пользователя
 * @property string $email почтовый адрес
 * @property string $password_hash хэш пароля пользователя
 * @property boolean $is_active признак активности пользователя
 */
class User extends ActiveRecord
{
    public $table = 'user';
    public $primaryKey = 'id';

    public $relations = [
        'posts' => [self::HAS_MANY, Post::class, 'user_id']
    ];
}
