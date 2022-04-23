<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products_category}}`.
 */
class m220406_055350_create_products_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_category}}', [
            'id' => $this->primaryKey(),
            'status' => "enum('". 1 ."', '". 0 ."') NOT NULL DEFAULT '". 1 ."'",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products_category}}');
    }
}
