<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_item}}`.
 */
class m220414_041912_create_order_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_item}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'title' => $this->string(255),
            'price' => $this->integer()->notNull(),
            'count' => $this->integer()->notNull(),
        ]);
        
        $this->addForeignKey('order ni order_item ga', 'order_item', 'order_id', 'order', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('products ni order_item ga', 'product_item', 'product_id', 'products', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_item}}');
    }
}
