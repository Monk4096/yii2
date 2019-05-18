<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 */
class m190517_091534_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'description' => $this->string()->notNull(),
            'creator_id' => $this->integer()->notNull(),
            'date_create' => $this->date()->notNull(),

        ]);

        $this->addForeignKey(
            "fk_comments_creator_user", "comments", "creator_id", "users", "id"
        );
        $this->addForeignKey(
            "fk_tasks_comments", "comments", "task_id", "tasks", "id"
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comments}}');
    }
}
