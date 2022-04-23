<?php

namespace common\models;


use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "{{%cart_banner}}".
 *
 * @property int $id
 * @property string $img
 *
 * @property CartBannerLang[] $cartBannerLangs
 */
class CartBanner extends \yii\db\ActiveRecord
{
    
    
    use MultilingualLabelsTrait;

   
    public static function tableName()
    {
        return '{{%cart_banner}}';
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
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default'],
                'path' => '@frontend/web/upload/cart_banner/{id}',
                'url' => '/upload/cart_banner/{id}',
                'thumbs' => [
                    'preview' => ['width' => 1920, 'height' => 1280],
                ],
            ],
        ];
    }


    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content'], 'string', 'max' => 255],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasim'),
            'title' => Yii::t('app', 'Sarlavha'),
            'content' => Yii::t('app', 'Matin'),
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
