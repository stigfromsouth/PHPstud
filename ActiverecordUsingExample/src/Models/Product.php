<?php


namespace App\Models;

use ActiveRecord;

/**
 * CREATE TABLE products (
 *   id INT(11) AUTOINCREMENT,
 *   name VARCHAR(128) NOT NULL UNIQUE,
 *   price DECIMAL(9,2) DEFAULT 0
 * )
 */

/**
 * Продукт.
 *
 * @property INT $id  идентификатор
 * @property string $name  наименование
 * @property double $price  цена
 * @property ProductRest[] $rests
 */
class Product extends ActiveRecord
{
    public $table = 'products';
    public $primaryKey = 'id';

    public $relations = [
        'rests' => [self::HAS_MANY, ProductRest::class, 'product_id'],
    ];
}
