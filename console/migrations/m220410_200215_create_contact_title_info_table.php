<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_title_info}}`.
 */
class m220410_200215_create_contact_title_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact_title_info}}', [
            'id' => $this->primaryKey(),
            'tel_icon' => $this->string(255)->notNull(),
            'email_icon' => $this->string(255)->notNull(),
            'gipes_icon' => $this->string(255)->notNull(),
            'tel_number' => $this->integer()->notNull(),
            'email' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact_title_info}}');
    }
}
