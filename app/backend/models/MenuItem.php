<?php
namespace Common\Models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int                $id
 * @property int                $name
 * @property string             $description
 * @property float              $price
 * @property int                $dishId
 * @property string             $createdAt
 * @property string             $updatedAt
 *
 * @property-read Dish          $dish
 */
class MenuItem extends ActiveRecord
{
    public const
        ATTR_ID             = 'id',
        ATTR_NAME           = 'name',
        ATTR_DESCRIPTION    = 'description',
        ATTR_DISH_ID        = 'dishId',
        ATTR_PRICE          = 'price',
        ATTR_CREATED_AT     = 'createdAt';
    public static function tableName(): string
    {
        return 'menu';
    }

    public function rules(): array
    {
        return [
            [self::ATTR_ID,             'string'],
            [self::ATTR_NAME,           'required'],
            [self::ATTR_DESCRIPTION,    'required'],
            [self::ATTR_DISH_ID,        'required'],
            [self::ATTR_PRICE,          'required'],
            [self::ATTR_CREATED_AT,     'required'],
        ];
    }

    public function getDish(): ActiveQuery
    {
        return $this->hasOne(Dish::class, [Dish::ATTR_ID => 'W']);
    }
}