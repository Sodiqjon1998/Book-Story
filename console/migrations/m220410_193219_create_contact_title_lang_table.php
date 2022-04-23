<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_title_lang}}`.
 */
class m220410_193219_create_contact_title_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact_title_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'toptitle' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'contact_title' => $this->string(255)->notNull(),
        ]);

        
        $this->addForeignKey('contact_title ni contact_title_lang ga', 'contact_title_lang', 'owner_id', 'contact_title', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact_title_lang}}');
    }
}
