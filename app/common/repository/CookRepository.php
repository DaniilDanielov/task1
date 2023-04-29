<?php

namespace common\repository;


use backend\models\Check;
use backend\models\CheckMenuItems;
use backend\models\configModels\AddItemConfig;
use backend\models\Cook;
use Yii;
use yii\data\SqlDataProvider;

class CookRepository implements CookRepositoryInterface
{
//    Не успел доделать корректный запрос и перенести в билдер с нормальными типами для возврата
    public function getPopularCook(): mixed
    {
        $sql = <<<SQL
-- Из ТЗ не совсем ясно, кого искать, поэтому ищу самого популярного повара
select
    *
from
    cook
left join dish d on true
    and cook.id = d.cook_id
left join menu_item mt on true
        and mt.dish_id = d.id
left join check_menu_items cmt on true
        and mt.id = cmt.menu_item_id
left join "check" ck on true
        and ck.id = cmt.check_id
where true
and "ck".created_at <@ tstzrange(:period_start, :period_end)

SQL;
        $db = Yii::$app->db;
        $cmd = $db->createCommand($sql);

        return $cmd->queryOne();
    }
}