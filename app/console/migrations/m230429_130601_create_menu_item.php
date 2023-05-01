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
    created_at      timestamptz not null default now(),
    updated_at      timestamptz not null,
    foreign key (dish_id)
        references public.dish(id)
    on update cascade on delete cascade 
);
---
--Тут идет частичное дублирование
--Данная сущность конкретно для посетителей, т.е. то, что мы будем отображать в меню
insert into public.menu_item (title,dish_id,price,updated_at)
  VALUES 
('Салат Цезарь', 1, 255, now()),
('Салат Крабовый', 2, 325, now()),
('Шашлык', 3, 285,now()),
('Люля Кебаб', 4, 199, now()),
('Пицца', 5, 380,now());
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
