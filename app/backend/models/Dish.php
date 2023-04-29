<?php
namespace Common\Models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int                    $id
 * @property string                 $title
 * @property string                 $description
 * @property int                    $cookId
 * @property string                 $createdAt
 *
 * @property-read Cook              $cook
 * @property-read MenuItem         $menuItem
 * @property-read Check[]           $checks
 */
class Dish extends ActiveRecord
{
    public const
        ATTR_ID             = 'id',
        ATTR_TITLE          = 'title',
        ATTR_DESCRIPTION    = 'description',
        ATTR_COOK_ID        = 'cookId',
        ATTR_CREATED_AT     = 'createdAt';

    public const RELATION_DISHES = 'dishes';
    public static function tableName(): string
    {
        return 'public.dish';
    }

    public function rules(): array
    {
        return [
            [self::ATTR_ID,             'int'],
            [self::ATTR_TITLE,          'string'],
            [self::ATTR_DESCRIPTION,    'string'],
            [self::ATTR_COOK_ID,        'int'],
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