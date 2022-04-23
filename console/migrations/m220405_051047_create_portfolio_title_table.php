<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%portfolio_title}}`.
 */
class m220405_051047_create_portfolio_title_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%portfolio_title}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%portfolio_title}}');
    }
}
