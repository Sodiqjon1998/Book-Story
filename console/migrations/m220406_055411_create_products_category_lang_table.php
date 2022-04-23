<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products_category_lang}}`.
 */
class m220406_055411_create_products_category_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_category_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNUll(),
            'title' => $this->string(255)->notNUll(),
        ]);

        
        $this->addForeignKey('products_category ni products_category_lang ga', 'products_category_lang', 'owner_id', 'products_category', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products_category_lang}}');
    }
}
