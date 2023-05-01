<?php

namespace common\repository;


use backend\models\Check;
use backend\models\CheckMenuItems;
use backend\models\configModels\AddItemConfig;
use backend\models\configModels\PopularCookConfig;
use backend\models\Cook;

interface CookRepositoryInterface
{
    public function getPopularCook(PopularCookConfig $config): mixed;

}