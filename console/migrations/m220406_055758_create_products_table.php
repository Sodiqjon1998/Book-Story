<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m220406_055758_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'price' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'status' => "enum('". 1 ."', '". 0 ."') NOT NULL DEFAULT '". 1 ."'",
        ]);

        
        $this->addForeignKey('products_category ni products ga', 'products', 'category_id', 'products_category', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
