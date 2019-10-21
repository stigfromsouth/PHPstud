<?php

namespace App\Models;

use ActiveRecord;

/**
 * Остатки товаров.
 *
 * @property $id
 * @property $product_id
 * @property $amount
 * @property Product $product
 */
class ProductRest extends ActiveRecord
{
    public $table = 'product_rests';
    public $primaryKey = 'id';
    public $relations = [
        'product' => [self::BELONGS_TO, Product::class, 'product_id'],
    ];
}
