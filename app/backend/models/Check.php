<?php
namespace Common\Models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int                $id
 * @property int                $dishId
 * @property int                $dishCount
 * @property float              $totalPrice
 * @property string             $createdAt
 *
 * @property-read Dish[]            $dishes
 * @property-read CheckMenuItems    $checkMenuItems
 * @property-read MenuItem[]        $menuItems
 */
class Check extends ActiveRecord
{
    public const
        ATTR_ID             = 'id',
        ATTR_DISH_ID        = 'dishId',
        ATTR_DISH_COUNT     = 'dishCount',
        ATTR_TOTAL_PRICE    = 'totalPrice',
        ATTR_CREATED_AT     = 'createdAt';

    public const RELATION_CHECK_MENU_ITEMS = 'checkMenuItems';

    public static function tableName(): string
    {
        return 'public.check';
    }

    public function rules(): array
    {
        return [
            [self::ATTR_ID,             'int'],
            [self::ATTR_DISH_ID,        'int'],
            [self::ATTR_DISH_COUNT,     'int'],
            [self::ATTR_TOTAL_PRICE,    'float'],
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