<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "{{%add_info}}".
 *
 * @property int $id
 * @property int $status
 *
 * @property AddInfoLang[] $addInfoLangs
 */
class AddInfo extends \yii\db\ActiveRecord
{
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;


    use MultilingualLabelsTrait;


 
    public static function tableName()
    {
        return '{{%add_info}}';
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
                    'first', 'last', 'handle'
                ]
            ],
        ];
    }
    


    public function rules()
    {
        return [
            [['status', 'first', 'last', 'handle'], 'required'],
            [['status'], 'integer'],
            [['first', 'last', 'handle'], 'string', 'max' => 255],
        ];
    }

 
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', 'Status'),
            'first' => Yii::t('app', 'Birinchi Ustuni'),
            'last' => Yii::t('app', 'Ikkinchi Ustuni'),
            'handle' => Yii::t('app', 'Uchunchi Ustuni'),
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
}
