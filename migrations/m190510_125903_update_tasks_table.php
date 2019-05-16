<?php

use yii\db\Migration;

/**
 * Class m190510_125903_update_tasks_table
 */
class m190510_125903_update_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            "fk_tasks_status", "tasks", "status_id", "status", "id"
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190510_125903_update_tasks_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190510_125903_update_tasks_table cannot be reverted.\n";

        return false;
    }
    */
}
