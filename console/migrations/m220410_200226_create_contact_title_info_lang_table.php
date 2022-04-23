<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_title_info_lang}}`.
 */
class m220410_200226_create_contact_title_info_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact_title_info_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'address' => $this->string(255)->notNull(),
        ]);
        
        $this->addForeignKey('contact_title_info ni contact_title_info_lang ga', 'contact_title_info_lang', 'owner_id', 'contact_title_info', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact_title_info_lang}}');
    }
}
