<?php

use yii\db\Migration;

/**
 * Class m230429_130544_create_table_cook
 */
class m230429_130544_create_table_cook extends Migration
{
    public function safeUp()
    {
        $sql = <<<SQL
create table public.cook
(
    id          bigserial not null primary key,
    title       text,
    description text
);
SQL;

        foreach (explode('---', $sql) as $item) {
            $this->execute($item);
        }
    }

    public function safeDown()
    {
        $sql = <<<SQL
drop table public.cook;
SQL;

        foreach (explode('---', $sql) as $item) {
            $this->execute($item);
        }
    }
}
