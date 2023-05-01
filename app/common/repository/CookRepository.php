<?php

namespace common\repository;


use backend\models\Check;
use backend\models\CheckMenuItems;
use backend\models\configModels\AddItemConfig;
use backend\models\configModels\PopularCookConfig;
use backend\models\Cook;
use Yii;
use yii\data\SqlDataProvider;
use yii\db\Exception;

class CookRepository implements CookRepositoryInterface
{


    /**
     * @throws Exception
     */
    public function getPopularCook(PopularCookConfig $config): array
    {
        $sql = <<<SQL
-- В зависимости от limit , будем отдавать ТОП-{Limit} самых популярных поваров
select
    c.name,
    count(cmi.menu_item_count) as cook_dish_counts
from
    cook c
        left join dish d on true
        and c.id = d.cook_id
        left join menu_item mt on true
        and mt.dish_id = d.id
        left join check_menu_items cmi on true
        and mt.id = cmi.menu_item_id
        left join "check" ck on true
        and ck.id = cmi.check_id
where true
    and "ck".created_at::timestamptz <@ tstzrange(:period_start::timestamptz, :period_end::timestamptz)
group by
    c.id
order by cook_dish_counts desc
limit :limit
SQL;
        $cmd =  Yii::$app->db->createCommand($sql,[
            ':period_start' => $config->periodStart,
            ':period_end' => $config->periodEnd,
            ':limit' => $config->limit,
        ]);

        return $cmd->queryAll();
    }
}