<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%products}}`.
 */
class m220407_104556_add_cout_column_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%products}}', 'count', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%products}}', 'count');
    }
}
