<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%librarys}}`.
 */
class m211203_045758_create_librarys_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%librarys}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'opening_time' => $this->string(11),
            'closing_time' => $this->string(11),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%librarys}}');
    }
}
