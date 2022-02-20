<?php

use yii\db\Migration;

/**
 * Class m220130_114641_create_table_categories
 */
class m220130_114641_create_table_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'status' => $this->smallInteger(2)->notNull()->defaultValue(1),
         ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categories');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220130_114641_create_table_categories cannot be reverted.\n";

        return false;
    }
    */
}
