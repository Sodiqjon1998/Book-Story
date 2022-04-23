<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "{{%contact_title}}".
 *
 * @property int $id
 * @property string $img
 *
 * @property ContactTitleLang[] $contactTitleLangs
 */
class ContactTitle extends \yii\db\ActiveRecord
{
    
    use MultilingualLabelsTrait;

    
    public static function tableName()
    {
        return '{{%contact_title}}';
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
                    'title', 'toptitle', 'contact_title', 'text',
                ]
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default'],
                'path' => '@frontend/web/upload/banner/{id}',
                'url' => '/upload/banner/{id}',
                'thumbs' => [
                    'preview' => ['width' => 2000, 'height' => 1500],
                ],
            ],
        ];
    }


    
    public function rules()
    {
        return [
            [['title', 'toptitle', 'contact_title', 'text',], 'required'],
            [['text'], 'string'],
            [['title', 'toptitle', 'contact_title'], 'string', 'max' => 255],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'toptitle' => Yii::t('app', 'Yuqori Sarlvha'),
            'title' => Yii::t('app', 'Sarlvha'),
            'contact_title' => Yii::t('app', 'Contact Sarlvha'),
            'text' => Yii::t('app', 'Matin'),
        ];
    }

    
    public function getImageUrl(){

        return $this->getThumbUploadUrl('img', 'preview');
    }

    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }
}
