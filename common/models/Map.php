<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%map}}".
 *
 * @property int $id
 * @property string $map
 */
class Map extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%map}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['map'], 'required'],
            [['map'], 'string', 'max' => 600],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'map' => Yii::t('app', 'Map'),
        ];
    }
}
