<?php

use yii\db\Migration;

/**
 * Class m220313_153445_create_table_author
 */
class m220313_153445_create_table_author extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('author', [
        'id' => $this->primaryKey(),
        'first_name' => $this->string(100)->notNull(),
        'last_name' => $this->string(100)->notNull(),
        'description' => $this->text(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('author');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220313_153445_create_table_author cannot be reverted.\n";

        return false;
    }
    */
}
