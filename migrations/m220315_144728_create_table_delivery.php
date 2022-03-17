<?php

use yii\db\Migration;

/**
 * Class m220315_144728_create_table_delivery
 */
class m220315_144728_create_table_delivery extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('delivery', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
         ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('delivery');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220315_144728_create_table_delivery cannot be reverted.\n";

        return false;
    }
    */
}
