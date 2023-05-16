<?php

namespace common\repository;

use backend\models\Check;
use backend\models\CheckMenuItems;
use backend\models\configModels\AddItemConfig;
use common\exceptions\DataBaseError;

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

        $checkMenuItem->check_id = $config->checkId;
        $checkMenuItem->menu_item_id = $config->menuItemId;
        $checkMenuItem->menu_item_count = $config->menuItemCount;

        if (!$checkMenuItem->save()) {
            throw new DataBaseError(sprintf('Возникла ошибка во время сохранении модели: %s',CheckMenuItems::class));
        }

        return $checkMenuItem;
    }
}