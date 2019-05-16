<?php

use yii\db\Migration;

/**
 * Class m190423_150201_update_users_table
 */
class m190423_150201_update_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            "fk_tasks_creator_user", "tasks", "creator_id", "users", "id"
        );
        $this->addForeignKey(
            "fk_tasks_responsible_user", "tasks", "responsible_id", "users", "id"
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190423_150201_update_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190423_150201_update_users_table cannot be reverted.\n";

        return false;
    }
    */
}
