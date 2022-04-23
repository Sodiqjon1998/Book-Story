<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;


class ContactTitleInfo extends \yii\db\ActiveRecord
{
    
    use MultilingualLabelsTrait;

    
    
    public static function tableName()
    {
        return '{{%contact_title_info}}';
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
                    'title', 'address'
                ]
            ],
        ];
    }


    
    public function rules()
    {
        return [
            [['tel_icon', 'email_icon', 'gipes_icon', 'tel_number', 'email', 'title', 'address'], 'required'],
            [['tel_number'], 'integer'],
            [['tel_icon', 'email_icon', 'gipes_icon', 'email'], 'string', 'max' => 255],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tel_icon' => Yii::t('app', 'Tel Icon'),
            'email_icon' => Yii::t('app', 'Email Icon'),
            'gipes_icon' => Yii::t('app', 'Gipes Icon'),
            'tel_number' => Yii::t('app', 'Tel Number'),
            'title' => Yii::t('app', 'Sarlavha'),
            'address' => Yii::t('app', 'Manzil'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }
}
