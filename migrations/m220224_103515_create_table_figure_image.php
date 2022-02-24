<?php

use yii\db\Migration;

/**
 * Class m220224_103515_create_table_figure_image
 */
class m220224_103515_create_table_figure_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('figure_images', [
            'id' => $this->primaryKey(),
            'figure_id' => $this->integer(11)->notNull(),
            'url' => $this->string(255)->notNull(),
            'alt' => $this->string(255),
            'title' => $this->string(255),
            'status' => $this->smallInteger(2)->defaultValue(1),
         ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('figure_images');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220224_103515_create_table_figure_image cannot be reverted.\n";

        return false;
    }
    */
}
