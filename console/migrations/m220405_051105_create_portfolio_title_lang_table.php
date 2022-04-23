<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%portfolio_title_lang}}`.
 */
class m220405_051105_create_portfolio_title_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%portfolio_title_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNUll(),
            'title' => $this->string(255)->notNUll(),
            'content' => $this->string(255)->notNUll(),
        ]);

        
        $this->addForeignKey('portfolio_title ni portfolio_title_lang ga', 'portfolio_title_lang', 'owner_id', 'portfolio_title', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%portfolio_title_lang}}');
    }
}
