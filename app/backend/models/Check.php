<?php

namespace backend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int                $id
 * @property int                $menu_item_id
 * @property float              $total_price
 * @property string             $created_at
 *
 * @property-read Dish[]            $dishes
 * @property-read CheckMenuItems    $checkMenuItems
 * @property-read MenuItem[]        $menuItems
 */
class Check extends ActiveRecord
{
    public const
        ATTR_ID             = 'id',
        ATTR_DISH_ID        = 'menu_item_id',
        ATTR_TOTAL_PRICE    = 'total_price',
        ATTR_CREATED_AT     = 'created_at';

    public const RELATION_CHECK_MENU_ITEMS = 'checkMenuItems';

    public static function tableName(): string
    {
        return 'public.check';
    }

    public function rules(): array
    {
        return [
            [self::ATTR_ID,             'integer'],
            [self::ATTR_DISH_ID,        'integer'],
            [self::ATTR_TOTAL_PRICE,    'double'],
            [self::ATTR_CREATED_AT,     'string'],
        ];
    }

    public function getCheckMenuItems(): ActiveQuery
    {
        return $this->hasMany(CheckMenuItems::class, [CheckMenuItems::ATTR_CHECK_ID => self::ATTR_ID]);
    }

    public function getMenuItems(): ActiveQuery
    {
        return $this->hasMany(MenuItem::class, [CheckMenuItems::ATTR_MENU_ITEM_ID => MenuItem::ATTR_ID])
            ->via(self::RELATION_CHECK_MENU_ITEMS);
    }

}