<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "{{%banner}}".
 *
 * @property int $id
 * @property string $img
 *
 * @property BannerLang[] $bannerLangs
 */
class Banner extends \yii\db\ActiveRecord
{
     
    
    use MultilingualLabelsTrait;

   
    public static function tableName()
    {
        return '{{%banner}}';
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
                    'title', 'toptitle', 'btn', 'content',
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
            [['toptitle', 'title', 'btn', 'content'], 'required'],
            [['toptitle', 'title', 'btn', 'content'], 'string', 'max' => 255],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'toptitle' => Yii::t('app', 'Yuqori Sarlavha'), 
            'title' => Yii::t('app', 'Sarlavha'),
            'content' => Yii::t('app', 'Mazmuni'),
            'btn' => Yii::t('app', 'Tugma'),
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
