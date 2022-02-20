<?php

use yii\db\Migration;

/**
 * Class m220210_180521_create_table_prices
 */
class m220210_180521_create_table_prices extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('prices', [
            'id' => $this->primaryKey(),
            'value' => $this->string(50)->notNull(),
            'currency' => $this->smallInteger(2)->notNull()->defaultValue(1),
            'figure_id' => $this->integer()->notNull(),
            'options' => $this->string(255)->notNull(),
            'state' => $this->smallInteger(2)->notNull()->defaultValue(1),
            'status' => $this->smallInteger(2)->notNull()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('prices');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220210_180521_create_table_prices cannot be reverted.\n";

        return false;
    }
    */
}
