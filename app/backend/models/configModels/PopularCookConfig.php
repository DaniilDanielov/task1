<?php

namespace backend\models\configModels;

use yii\base\Model;

class PopularCookConfig extends Model
{
    public const
        ATTR_PERIOD_START   = 'periodStart',
        ATTR_PERIOD_END     = 'periodEnd',
        ATTR_LIMIT          = 'limit';

    public mixed $periodStart   = null;
    public mixed $periodEnd     = null;
    public mixed $limit         = null;

    public function rules()
    {
        return [
            [self::ATTR_PERIOD_START,   'datetime'],
            [self::ATTR_PERIOD_END,     'datetime'],
            [self::ATTR_LIMIT,          'integer'],
        ];
    }
}