<?php

use yii\db\Migration;

/**
 * Class m220210_034812_create_table_frames
 */
class m220210_034812_create_table_frames extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('frames', [
            'id' => $this->primaryKey(),
            'type' => $this->string(255)->notNull(),
            'status' => $this->smallInteger(2)->notNull()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('frames');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220210_034812_create_table_frames cannot be reverted.\n";

        return false;
    }
    */
}
