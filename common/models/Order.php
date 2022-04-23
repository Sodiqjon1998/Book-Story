<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $total_sum
 * @property int|null $created_at
 * @property int|null $upated_at
 * @property int|null $status
 *
 * @property OrderItem[] $orderItems
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;

    
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                // 'crea'
            ],

        ];
    }



    public static function tableName()
    {
        return '{{%order}}';
    }

    


    public function rules()
    {
        return [
            [['user_id', 'total_sum', 'created_at', 'updated_at', 'status'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'total_sum' => Yii::t('app', 'Total Sum'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Upated At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    
    public function getOrderItems()
    {
        return $this->hasOne(OrderItem::className(), ['order_id' => 'id']);
    }


    public function getItemCount(){
        
        return $this->hasOne(OrderItem::className(), ['order_id' => 'id'])->count();

    }
    
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }



    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['order_id' => 'id']);
    }


    public static function statuses(){
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Yangi'),
            self::STATUS_NO_ACTIVE => Yii::t('app', 'Jo\'natildi'),
        ];
    }


    public function getStatusLabel(){
        return $this->statuses() [$this->status];
    }
}
