<?php

use yii\db\Migration;

/**
 * Class m230429_130551_create_table_dish
 */
class m230429_130551_create_table_dish extends Migration
{
    public function safeUp()
    {
        $sql = <<<SQL
--Ставим restrict т.к. заранее не знаем хотим ли мы удалять блюда, если повар уволился
--Но очевидно, мы хотели бы "отловить" подобные случае и исключить удаления
create table public.dish
(
    id              bigint not null primary key,
    title           text not null ,
    description     text,
    cook_id         bigint not null,
    created_at      timestamptz not null default now(),
    foreign key (cook_id)
        references public.cook(id)
    on update cascade on delete restrict
);
---
--Данная сущность для внутреннего пользования, подразумевается, что тут указываем ингредиенты, рецепты итп
insert into public.dish (id,title,cook_id)
  VALUES 
(1,'Салат Цезарь',1),
(2,'Салат Крабовый',1),
(3,'Шашлык',2),
(4,'Люля Кебаб',2),
(5,'Пицца',2);
SQL;

        foreach (explode('---', $sql) as $item) {
            $this->execute($item);
        }
    }

    public function safeDown()
    {
        $sql = <<<SQL
drop table public.dish;
SQL;

        foreach (explode('---', $sql) as $item) {
            $this->execute($item);
        }
    }
}
