<?php

namespace backend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int                    $id
 * @property string                 $title
 * @property string                 $description
 * @property int                    $cook_id
 * @property string                 $created_at
 *
 * @property-read Cook              $cook
 * @property-read MenuItem          $menuItem
 * @property-read Check[]           $checks
 */
class Dish extends ActiveRecord
{
    public const
        ATTR_ID             = 'id',
        ATTR_TITLE          = 'title',
        ATTR_DESCRIPTION    = 'description',
        ATTR_COOK_ID        = 'cook_id',
        ATTR_CREATED_AT     = 'created_at';

    public const RELATION_DISHES = 'dishes';
    public static function tableName(): string
    {
        return 'public.dish';
    }

    public function rules(): array
    {
        return [
            [self::ATTR_ID,             'integer'],
            [self::ATTR_TITLE,          'string'],
            [self::ATTR_DESCRIPTION,    'string'],
            [self::ATTR_COOK_ID,        'integer'],
            [self::ATTR_CREATED_AT,     'string'],

        ];
    }

    public function getCook(): ActiveQuery
    {
        return $this->hasOne(Cook::class, [Cook::RELATION_DISHES => self::ATTR_COOK_ID]);
    }

    public function getMenuItem(): ActiveQuery
    {
        return $this->hasOne(MenuItem::class, [MenuItem::ATTR_DISH_ID => self::ATTR_ID]);
    }

}