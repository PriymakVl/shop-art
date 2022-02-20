<?php

use yii\db\Migration;

/**
 * Class m220209_175949_create_table_canvases
 */
class m220209_175949_create_table_canvases extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('canvases', [
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
        $this->dropTable('canvases');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220209_175949_create_table_canvases cannot be reverted.\n";

        return false;
    }
    */
}
