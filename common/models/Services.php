<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "{{%services}}".
 *
 * @property int $id
 * @property string $icon
 * @property string $status
 *
 * @property ServicesLang[] $servicesLangs
 */
class Services extends \yii\db\ActiveRecord
{
    
    
    use MultilingualLabelsTrait;

    
    public static function tableName()
    {
        return '{{%services}}';
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
                    'title', 'content',
                ]
            ],
        ];
    }


    
    public function rules()
    {
        return [
            [['icon', 'title', 'content'], 'required'],
            [['status'], 'string'],
            [['icon', 'title', 'content',], 'string', 'max' => 255],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'icon' => Yii::t('app', 'Ikonka'),
            'title' => Yii::t('app', 'Sarlavha'),
            'content' => Yii::t('app', 'Mazmuni'),
            'status' => Yii::t('app', 'Status'),
        ];
    }


    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }
}
