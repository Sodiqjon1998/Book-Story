<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%services}}`.
 */
class m220412_084320_create_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey(),
            'icon' => $this->string(255)->notNull(),
            "status" => "enum('". 1 ."', '". 0 ."') NOT NULL DEFAULT '". 1 ."'"
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%services}}');
    }
}
