<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%banner_lang}}`.
 */
class m220407_040747_create_banner_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%banner_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNUll(),
            'toptitle' => $this->string(255)->notNUll(),
            'title' => $this->string(255)->notNUll(),
            'content' => $this->string(255)->notNUll(),
            'btn' => $this->string(255)->notNUll(),
        ]);

        
        $this->addForeignKey('banner ni banner_lang ga', 'banner_lang', 'owner_id', 'banner', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%banner_lang}}');
    }
}
