<?php

use yii\db\Migration;

/**
 * Class m220203_030830_create_table_categories_figures
 */
class m220203_030830_create_table_categories_figures extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category_figures', [
            'id' => $this->primaryKey(),
            'cat_id' => $this->integer(10)->notNull(),
            'figure_id' => $this->integer(10)->notNull(),
            'status' => $this->smallInteger(2)->notNull()->defaultValue(1),
         ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {       
        $this->dropTable('category_figures');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220203_030830_create_table_categories_figures cannot be reverted.\n";

        return false;
    }
    */
}
