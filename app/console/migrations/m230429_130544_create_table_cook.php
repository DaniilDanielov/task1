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
    name        text not null ,
    description text
);
---
insert into public.cook (id,name)
  VALUES 
(1,'Петров Петр Петрович'),
(2,'Иванов Иван Иванович');
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
