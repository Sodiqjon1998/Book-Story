<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_title}}`.
 */
class m220410_192846_create_contact_title_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact_title}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact_title}}');
    }
}
