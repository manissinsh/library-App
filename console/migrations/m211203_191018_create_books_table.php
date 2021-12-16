<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m211203_191018_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'image' => $this->string(2000),
            'published_at' => $this->string(255),
            'language' => $this->string(100),
            'library' => $this->integer(11),
            'status' => $this->tinyInteger(2)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `library`
        $this->createIndex(
            '{{%idx-books-library}}',
            '{{%books}}',
            'library'
        );

        // add foreign key for table `{{%librarys}}`
        $this->addForeignKey(
            '{{%fk-books-library}}',
            '{{%books}}',
            'library',
            '{{%librarys}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-books-created_by}}',
            '{{%books}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-books-created_by}}',
            '{{%books}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-books-updated_by}}',
            '{{%books}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-books-updated_by}}',
            '{{%books}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%books}}');
    }
}
