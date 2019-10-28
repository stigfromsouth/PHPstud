<?php


namespace App\Models;

use ActiveRecord;

use DateTime;

/**
 * Модель публикаций
 *
 * @property INT $id идентификатор поста
 * @property INT $user_id идентификатор пользователя
 * @property string $title заголовок поста
 * @property string $short_des краткое содержание поста
 * @property string $content содержание поста
 * @property datetime $created_at дата и время создания поста
 * @property datetime $updated_at дата и время обновления поста
 * @property boolean $is_active признак активности поста
 */
class Post extends ActiveRecord
{
    public $table = 'post';
    public $primaryKey = 'id';

    public $relations = [
        'users' => [self::HAS_ONE, User::class, 'id'],
    ];
    /**
     * @var int ID
     *
    public $id;

    /**
     * @var int User ID
     *
    public $userId;

    /**
     * @var string Заголовок
     *
    public $title;

    /**
     * @var string Краткое описание
     *
    public $shortDes;

    /**
     * @var string Содержание
     *
    public $content;

    /**
     * @var DateTime Дата создания записи
     *
    public $createdAt;

    /**
     * @var DateTime Дата обновления записи
     *
    public $updatedAt;

    /**
     * @var bool Признак активности
     *
    public $isActive;
     */
}
