<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%services_lang}}`.
 */
class m220412_084333_create_services_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%services_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNUll(),
            'title' => $this->string(255)->notNUll(),
            'content' => $this->string(255)->notNUll(),
        ]);
        
        $this->addForeignKey('services ni services_lang ga', 'services_lang', 'owner_id', 'services', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%services_lang}}');
    }
}
