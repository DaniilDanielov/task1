<?php

use yii\db\Migration;

/**
 * Class m230429_130526_create_table_check
 */
class m230429_130526_create_table_check extends Migration
{
    public function safeUp()
    {
        $sql = <<<SQL
create table public.check
(
    id              bigserial primary key,
    dishId          bigint,
    dishCount       int,
    totalPrice      decimal,
    createdAt       timestamp
);
SQL;

        foreach (explode('---', $sql) as $item) {
            $this->execute($item);
        }
    }

    public function safeDown()
    {
        $sql = <<<SQL
drop table public.check;
SQL;

        foreach (explode('---', $sql) as $item) {
            $this->execute($item);
        }
    }
}