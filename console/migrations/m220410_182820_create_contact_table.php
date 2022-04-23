<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact}}`.
 */
class m220410_182820_create_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(255)->notNull(),
            'last_name' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'subject' => $this->string(255)->notNull(),
            'message' => $this->text()->notNull(),
            'date' => $this->date(),
            'status' => "enum('". 1 ."', '". 0 ."') NOT NULL DEFAULT '". 1 ."'",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact}}');
    }
}
