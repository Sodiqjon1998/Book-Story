<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "{{%reviews}}".
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $email
 * @property string $your_review
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property int $count
 * @property string $stars
 *
 * @property Product $product
 */
class Reviews extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return '{{%reviews}}';
    }

        
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                // 'crea'
            ],

        ];
    }
    
    public function rules()
    {
        return [
            [['product_id', 'name', 'email', 'your_review', 'created_at', 'updated_at', 'status', 'stars'], 'required'],
            [['product_id', 'created_at', 'updated_at', 'status', 'count'], 'integer'],
            [['your_review'], 'string'],
            [['name', 'email', 'stars'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'your_review' => Yii::t('app', 'Your Review'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'count' => Yii::t('app', 'Count'),
            'stars' => Yii::t('app', 'Stars'),
        ];
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
