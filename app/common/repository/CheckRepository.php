<?php

namespace common\repository;


use backend\models\Check;
use backend\models\CheckMenuItems;
use backend\models\configModels\AddItemConfig;

class CheckRepository implements CheckRepositoryInterface
{
    public function createCheck(): ?Check
    {
        $check = new Check();
        $check->save();

        return $check;
    }

    public function addMenuItemToCheck(AddItemConfig $config): ?CheckMenuItems
    {
        $checkMenuItem = new CheckMenuItems();

        $checkMenuItem->menu_item_id = $config->menuItemId;
        $checkMenuItem->menu_item_count = $config->menuItemCount;
        $checkMenuItem->save();

        return $checkMenuItem;
    }
}