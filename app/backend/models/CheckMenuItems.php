<?php

namespace backend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int          $id
 * @property int          $menu_item_id
 * @property int          $menu_item_count
 * @property int          $check_id
 *
 * @property-read MenuItem  $menuItem
 * @property-read Check     $check
 */
class CheckMenuItems extends ActiveRecord
{
    public const
        ATTR_ID                 = 'id',
        ATTR_MENU_ITEM_ID       = 'menu_item_id',
        ATTR_MENU_ITEM_COUNT    = 'menu_item_count',
        ATTR_CHECK_ID           = 'check_id';
    public static function tableName(): string
    {
        return 'public.check_menu_items';
    }

    public function rules(): array
    {
        return [
            [self::ATTR_ID,             'integer'],
            [self::ATTR_MENU_ITEM_ID,   'integer'],
            [self::ATTR_MENU_ITEM_COUNT,'integer'],
            [self::ATTR_CHECK_ID,       'integer'],
        ];
    }

    public function getMenuItem(): ActiveQuery
    {
        return $this->hasOne(MenuItem::class, [MenuItem::ATTR_ID => self::ATTR_MENU_ITEM_ID]);
    }

    public function getCheck(): ActiveQuery
    {
        return $this->hasOne(Check::class, [Check::ATTR_ID => self::ATTR_CHECK_ID]);
    }
}