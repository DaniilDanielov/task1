<?php

namespace backend\models\configModels;

use yii\base\Model;

class AddItemConfig extends Model
{
    public const
        ATTR_NAME               = 'checkId',
        ATTR_MENU_ITEM_ID       = 'menuItemId',
        ATTR_MENU_ITEM_COUNT    = 'menuItemCount';

    public mixed $checkId    = null;
    public mixed $menuItemId   = null;
    public mixed $menuItemCount   = null;

    public function rules()
    {
        return [
            [self::ATTR_NAME, 'safe'],
            [self::ATTR_MENU_ITEM_ID, 'safe'],
            [self::ATTR_MENU_ITEM_COUNT, 'safe'],
        ];
    }
}