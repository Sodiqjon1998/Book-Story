<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "home_banner".
 *
 * @property int $id
 * @property string $img
 *
 * @property HomeBannerLang[] $homeBannerLangs
 */
class HomeBanner extends \yii\db\ActiveRecord
{
    
    
    use MultilingualLabelsTrait;


    public static function tableName()
    {
        return 'home_banner';
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
                    'title', 'toptitle', 'btn'
                ]
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default'],
                'path' => '@frontend/web/upload/home_banner/{id}',
                'url' => '/upload/home_banner/{id}',
                'thumbs' => [
                    'preview' => ['width' => 1920, 'height' => 1280],
                ],
            ],
        ];
    }



    
    public function rules()
    {
        return [
            [['toptitle', 'title', 'btn'], 'required'],
            [['toptitle', 'title', 'btn'], 'string', 'max' => 255],
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
