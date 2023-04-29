<?php

use yii\db\Migration;

/**
 * Class m230429_130601_create_menu_item
 */
class m230429_130601_create_menu_item extends Migration
{
    public function safeUp()
    {
        $sql = <<<SQL
-- Тут все таки ставлю все-таки cascade на удаление,т.к. включать в меню блюдо, которого нет мы не можем
create table public.menu_item
(
    id              bigserial primary key,
    title           text not null,
    description     text,
    dish_id         bigint not null,
    price           decimal not null,
    created_at      timestamp not null,
    updated_at      timestamp not null,
    foreign key (dish_id)
        references public.dish(id)
    on update cascade on delete cascade 
);
SQL;

        foreach (explode('---', $sql) as $item) {
            $this->execute($item);
        }
    }

    public function safeDown()
    {
        $sql = <<<SQL
drop table public.menu_item;
SQL;

        foreach (explode('---', $sql) as $item) {
            $this->execute($item);
        }
    }
}
