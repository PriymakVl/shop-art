<?php

use yii\db\Migration;

/**
 * Class m220208_181021_add_column_table_orders
 */
class m220208_181021_add_column_table_orders extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('orders', 'state', $this->smallinteger(2));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('orders', 'state');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220208_181021_add_column_table_orders cannot be reverted.\n";

        return false;
    }
    */
}
