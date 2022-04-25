<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%share}}".
 *
 * @property int $id
 * @property string $icon
 * @property int $status
 */
class Share extends \yii\db\ActiveRecord
{
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;


    public static function tableName()
    {
        return '{{%share}}';
    }

    
    public function rules()
    {
        return [
            [['icon', 'status'], 'required'],
            [['status'], 'integer'],
            [['icon', 'url'], 'string', 'max' => 255],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'icon' => Yii::t('app', 'Ikonka'),
            'url' => Yii::t('app', 'Url'),
            'status' => Yii::t('app', 'Status'),
        ];
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
