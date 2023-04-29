<?php

namespace common\repository;


use backend\models\Check;
use backend\models\CheckMenuItems;
use backend\models\configModels\AddItemConfig;
use backend\models\Cook;

interface CookRepositoryInterface
{
    public function getPopularCook(): mixed;

}