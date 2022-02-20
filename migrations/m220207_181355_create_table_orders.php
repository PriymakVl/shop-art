<?php

use yii\db\Migration;

/**
 * Class m220207_181355_create_table_orders
 */
class m220207_181355_create_table_orders extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'email' => $this->string(100)->notNull(),
            'first_name' => $this->string(100)->notNull(),
            'last_name' => $this->string(100)->notNull(),
            'country' => $this->string(100)->notNull(),
            'city' => $this->string(100)->notNull(),
            'address' => $this->string(255)->notNull(),
            'postcode' => $this->integer(11),
            'phone' => $this->string(30),
            'status' => $this->smallInteger(2)->notNull()->defaultValue(1),
         ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('orders');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220207_181355_create_table_orders cannot be reverted.\n";

        return false;
    }
    */
}
