<?php

namespace common\repository;

use backend\models\Check;
use backend\models\CheckMenuItems;
use backend\models\configModels\AddItemConfig;

interface CheckRepositoryInterface
{
    public function createCheck(): ?Check;

    public function addMenuItemToCheck(AddItemConfig $config): ?CheckMenuItems;
}