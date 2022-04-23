<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m220414_041854_create_order_table extends Migration
{
    
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'total_sum' => $this->integer(),
            'created_at' => $this->integer(),
            'upated_at' => $this->integer(),
            "status" => $this->integer(),
        ]);
        
        $this->addForeignKey('user ni order ga', 'order', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }




    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
