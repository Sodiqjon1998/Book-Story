<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%quarters}}".
 *
 * @property int $id
 * @property int $district_id
 * @property string|null $name
 *
 * @property District $district
 */
class Quarters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%quarters}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['district_id'], 'required'],
            [['district_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => Districts::className(), 'targetAttribute' => ['district_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'district_id' => Yii::t('app', 'District ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(Districts::className(), ['id' => 'district_id']);
    }
}
