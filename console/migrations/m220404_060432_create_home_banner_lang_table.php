<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%home_banner_lang}}`.
 */
class m220404_060432_create_home_banner_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%home_banner_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNUll(),
            'toptitle' => $this->string(255)->notNUll(),
            'title' => $this->string(255)->notNUll(),
            'btn' => $this->string(255)->notNUll(),
        ]);

        $this->addForeignKey('home_banner ni home_banner ga', 'home_banner_lang', 'owner_id', 'home_banner', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%home_banner_lang}}');
    }
}
