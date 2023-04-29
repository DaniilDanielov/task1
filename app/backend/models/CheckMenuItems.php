<?php
namespace Common\Models;


use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int          $id
 * @property int          $menuItemId
 * @property int          $checkId
 *
 * @property-read MenuItem  $menuItem
 * @property-read Check     $check
 */
class CheckMenuItems extends ActiveRecord
{
    public const
        ATTR_ID             = 'id',
        ATTR_MENU_ITEM_ID   = 'menuItemId',
        ATTR_CHECK_ID       = 'checkId';
    public static function tableName(): string
    {
        return 'public.check_dishes';
    }

    public function rules(): array
    {
        return [
            [self::ATTR_ID,         'int'],
            [self::ATTR_MENU_ITEM_ID,    'int'],
            [self::ATTR_CHECK_ID,   'int'],
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