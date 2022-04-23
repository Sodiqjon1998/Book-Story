<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "{{%address}}".
 *
 * @property int $id
 * @property int $order_id
 * @property int $region_id
 * @property int $district_id
 * @property int $quarters_id
 * @property string $bosting
 * @property string $phone
 * @property int $created_at
 * @property int $updated_at
 * @property int $deliver_type_id
 * @property int $deliver_type_amount
 * @property int $status
 *
 * @property District $district
 * @property Order $order
 * @property Quarter $quarters
 * @property Region $region
 */
class Address extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return '{{%address}}';
    }


    

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
            ],

        ];
    }


    
    public function rules()
    {
        return [
            [['order_id', 'region_id', 'district_id', 'quarters_id', 'bosting', 'phone', 'created_at', 'updated_at', 'status'], 'required'],
            [['order_id', 'region_id', 'district_id', 'quarters_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['bosting', 'phone'], 'string', 'max' => 255],
            [[ 'deliver_type_id', 'deliver_type_amount'], 'safe'],
            [['quarters_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quarters::className(), 'targetAttribute' => ['quarters_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => Districts::className(), 'targetAttribute' => ['district_id' => 'id']],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'region_id' => Yii::t('app', 'Region ID'),
            'district_id' => Yii::t('app', 'District ID'),
            'quarters_id' => Yii::t('app', 'Quarters ID'),
            'bosting' => Yii::t('app', 'Bosting'),
            'phone' => Yii::t('app', 'Phone'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deliver_type_id' => Yii::t('app', 'Deliver Type ID'),
            'deliver_type_amount' => Yii::t('app', 'Deliver Type Amount'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(Districts::className(), ['id' => 'district_id']);
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
     * Gets query for [[Quarters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuarters()
    {
        return $this->hasOne(Quarters::className(), ['id' => 'quarters_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }
}
