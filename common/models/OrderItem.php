<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%order_item}}".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property string $title
 * @property int $price
 * @property int|null $count
 *
 * @property Order $order
 * @property Product $product
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order_item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'title', 'price'], 'required'],
            [['product_id', 'price', 'count'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['order_id'], 'safe'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'title' => Yii::t('app', 'Maxsulot nomi'),
            'price' => Yii::t('app', 'Narxi'),
            'count' => Yii::t('app', 'Soni'),
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
