<?php

use yii\db\Migration;

/**
 * Class m220320_091022_create_table_subscribers
 */
class m220320_091022_create_table_subscribers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subscribers', [
            'id' => $this->primaryKey(),
            'email' => $this->string(255)->notNull(),
            'date' => $this->string(100)->notNull(),
            'state' => $this->smallInteger(2)->defaultValue(0),
         ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('subscribers');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220320_091022_create_table_subscribers cannot be reverted.\n";

        return false;
    }
    */
}
