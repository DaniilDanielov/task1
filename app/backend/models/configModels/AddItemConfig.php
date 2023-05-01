<?php

namespace backend\models\configModels;

use yii\base\Model;

class AddItemConfig extends Model
{
    public const
        ATTR_CHECK_ID           = 'checkId',
        ATTR_MENU_ITEM_ID       = 'menuItemId',
        ATTR_MENU_ITEM_COUNT    = 'menuItemCount';

    public mixed $checkId       = null;
    public mixed $menuItemId    = null;
    public mixed $menuItemCount = null;

    public function rules()
    {
        return [
            [self::ATTR_CHECK_ID, 'integer'],
            [self::ATTR_MENU_ITEM_ID, 'integer'],
            [self::ATTR_MENU_ITEM_COUNT, 'integer'],
        ];
    }
}