<?php

namespace backend\models\configModels;

use DateTimeImmutable;
use DateTimeInterface;
use yii\base\Model;
use yii\web\HttpException;

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
            [self::ATTR_PERIOD_START, 'required'],
            [self::ATTR_PERIOD_START, 'filter', 'filter' => [$this, 'filterDate']],

            [self::ATTR_PERIOD_END, 'required'],
            [self::ATTR_PERIOD_END, 'filter', 'filter' => [$this, 'filterDate']],

            [self::ATTR_LIMIT, 'integer'],
            [self::ATTR_LIMIT, 'default', 'value' => 1],
        ];
    }


    public function filterDate(mixed $timestamp): ?string
    {
        try {
            $date = new DateTimeImmutable($timestamp);
        } catch (\Exception $e) {
            throw new HttpException(400, sprintf('Передан некорректный параметр даты: %s',$timestamp));
        }

        return $date->format(DateTimeInterface::RFC3339);
    }
}