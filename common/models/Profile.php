<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use Yii;

/**
 * This is the model class for table "{{%profile}}".
 *
 * @property int $id
 * @property string $img
 * @property string $name
 */
class Profile extends \yii\db\ActiveRecord
{
   
    public static function tableName()
    {
        return '{{%profile}}';
    }

        
    public function behaviors()
    {
        return [
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default'],
                'path' => '@frontend/web/upload/profile/{id}',
                'url' => '/upload/profile/{id}',
                'thumbs' => [
                    'preview' => ['width' => 160, 'height' => 160],
                ],
            ],
        ];
    }


   
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'name' => Yii::t('app', 'Ism'),
        ];
    }

    
    
    public function getImageUrl(){

        return $this->getThumbUploadUrl('img', 'preview');
    }

}
