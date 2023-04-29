<?php

namespace backend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int                $id
 * @property string             $name
 *
 * @property-read Dish[]        $dishes
 */
class Cook extends ActiveRecord
{
    public const
        ATTR_ID             = 'id',
        ATTR_NAME           = 'name';
    public const RELATION_DISHES = 'dishes';


    public static function tableName(): string
    {
        return 'public.cook';
    }

    public function rules(): array
    {
        return [
            [self::ATTR_ID,         'integer'],
            [self::ATTR_NAME,       'string'],
        ];
    }

    public function getDishes(): ActiveQuery
    {
        return $this->hasMany(Dish::class, [Dish::ATTR_COOK_ID => self::ATTR_ID]);
    }
}