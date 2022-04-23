<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%deliver}}".
 *
 * @property int $id
 * @property string $value
 * @property int $status
 *
 * @property DeliverLang[] $deliverLangs
 */
class Deliver extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    
    use MultilingualLabelsTrait;

    
    public static function tableName()
    {
        return '{{%deliver}}';
    }


    
   
    
    public function behaviors()
    {
        return [
            'multilingual' => [
                'class' => MultilingualBehavior::class,
                'languages' => [
                    'en' => 'English',
                    'uz' => 'Uzbek',
                ],
                'attributes' => [
                    'deliver_type',
                ]
            ],
        ];
    }


    
    public function rules()
    {
        return [
            [['value', 'status'], 'required'],
            [['status'], 'integer'],
            [['value', 'deliver_type'], 'string', 'max' => 255],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'value' => Yii::t('app', 'Qiymat'),
            'deliver_type' => Yii::t('app', 'Yetkazib berish turi'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }

    
    public static function statuses(){
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Faol'),
            self::STATUS_NO_ACTIVE => Yii::t('app', 'Faol Emas'),
        ];
    }

    public function getStatusLabel(){
        return $this->statuses() [$this->status];
    }



    public static function delivers(){

        return ArrayHelper::map(Deliver::find()->where(['status' => 1])->all(), 'id', 'deliver_type');
        
    }

    public static function value(){

        return ArrayHelper::map(Deliver::find()->where(['status' => 1])->all(), 'id', 'value');

    }
}
