<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use Yii;

/**
 * This is the model class for table "{{%detail_banner}}".
 *
 * @property int $id
 * @property string $img
 */
class DetailBanner extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return '{{%detail_banner}}';
    }

    
    
    
    public function behaviors()
    {
        return [
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default'],
                'path' => '@frontend/web/upload/detail_banner/{id}',
                'url' => '/upload/detail_banner/{id}',
                'thumbs' => [
                    'preview' => ['width' => 1920, 'height' => 1280],
                ],
            ],
        ];
    }



    public function rules()
    {
        return [
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasim'),
        ];
    }

    
    
    public function getImageUrl(){

        return $this->getThumbUploadUrl('img', 'preview');
    }
}
