<?php


namespace App\Models;

/**
 * Модель публикаций
 */
class Post
{
    /**
     * @var int ID
     */
    public $id;

    /**
     * @var int User ID
     */
    public $userId;

    /**
     * @var string Заголовок
     */
    public $title;

    /**
     * @var string Краткое описание
     */
    public $shortDes;

    /**
     * @var string Содержание
     */
    public $content;

    /**
     * @var DateTime Дата создания записи
     */
    public $createdAt;

    /**
     * @var DateTime Дата обновления записи
     */
    public $updatedAt;

    /**
     * @var bool Признак активности
     */
    public $isActive;
}
