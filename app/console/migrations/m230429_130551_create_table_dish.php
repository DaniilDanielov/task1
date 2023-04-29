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
    title           text,
    description     text,
    price           float,
    cookId          bigint,
    createdAt       text,
    foreign key (cookId)
        references public.cook(id)
    on update cascade on delete restrict
);

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
