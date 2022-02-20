<?php

use yii\db\Migration;

/**
 * Class m220210_040436_create_table_dimensions
 */
class m220210_040436_create_table_dimensions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('dimensions', [
            'id' => $this->primaryKey(),
            'values' => $this->string(255)->notNull(),
            'unit' => $this->smallInteger(2)->notNull()->defaultValue(1),
            'status' => $this->smallInteger(2)->notNull()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('dimensions');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220210_040436_create_table_dimensions cannot be reverted.\n";

        return false;
    }
    */
}
