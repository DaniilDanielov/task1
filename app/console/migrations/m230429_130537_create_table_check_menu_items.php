<?php

use yii\db\Migration;

/**
 * Class m230429_130537_create_table_check_menu_items
 */
class m230429_130537_create_table_check_menu_items extends Migration
{
    public function safeUp()
    {
        $sql = <<<SQL
create table public.check_menu_items
(
    id              bigserial primary key,
    menu_item_id    bigint not null,
    menu_item_count int,
    check_id        bigint not null
);
SQL;

        foreach (explode('---', $sql) as $item) {
            $this->execute($item);
        }
    }

    public function safeDown()
    {
        $sql = <<<SQL
drop table public.check_menu_items;
SQL;

        foreach (explode('---', $sql) as $item) {
            $this->execute($item);
        }
    }
}
