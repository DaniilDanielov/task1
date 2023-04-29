<?php

namespace backend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int                $id
 * @property string             $title
 * @property string             $description
 * @property float              $price
 * @property int                $dish_id
 * @property string             $created_at
 * @property string             $updated_at
 *
 * @property-read Dish          $dish
 */
class MenuItem extends ActiveRecord
{
    public const
        ATTR_ID             = 'id',
        ATTR_NAME           = 'title',
        ATTR_DESCRIPTION    = 'description',
        ATTR_DISH_ID        = 'dish_id',
        ATTR_PRICE          = 'price',
        ATTR_CREATED_AT     = 'created_at',
        ATTR_UPDATED_AT     = 'updated_at';
    public static function tableName(): string
    {
        return 'menu_item';
    }

    public function rules(): array
    {
        return [
            [self::ATTR_ID,             'string'],
            [self::ATTR_NAME,           'string'],
            [self::ATTR_DESCRIPTION,    'string'],
            [self::ATTR_DISH_ID,        'integer'],
            [self::ATTR_PRICE,          'double'],
            [self::ATTR_CREATED_AT,     'string'],
            [self::ATTR_UPDATED_AT,     'string'],
        ];
    }

    public function getDish(): ActiveQuery
    {
        return $this->hasOne(Dish::class, [Dish::ATTR_ID => 'W']);
    }
}