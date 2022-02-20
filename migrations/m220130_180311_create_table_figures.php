<?php

use yii\db\Migration;

/**
 * Class m220130_180311_create_table_figures
 */
class m220130_180311_create_table_figures extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('figures', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'preview' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'status' => $this->smallInteger(2)->notNull()->defaultValue(1),
         ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('figures');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220130_180311_create_table_figures cannot be reverted.\n";

        return false;
    }
    */
}
