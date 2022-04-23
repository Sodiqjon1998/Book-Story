<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products_lang}}`.
 */
class m220406_055805_create_products_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNUll(),
            'title' => $this->string(255)->notNUll(),
        ]);

        
        $this->addForeignKey('products ni products_lang ga', 'products_lang', 'owner_id', 'products', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products_lang}}');
    }
}
