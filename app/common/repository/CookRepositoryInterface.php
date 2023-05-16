<?php

namespace common\repository;

use backend\models\configModels\PopularCookConfig;

interface CookRepositoryInterface
{
    public function getPopularCook(PopularCookConfig $config): mixed;
}