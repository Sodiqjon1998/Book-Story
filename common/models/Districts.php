<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%districts}}".
 *
 * @property int $id
 * @property int $region_id
 * @property string|null $name_uz
 * @property string|null $name_oz
 * @property string|null $name_ru
 *
 * @property Address[] $addresses
 * @property Quarter[] $quarters
 * @property Region $region
 */
class Districts extends \yii\db\ActiveRecord
{
    


    public static function tableName()
    {
        return '{{%districts}}';
    }

    


    public function rules()
    {
        return [
            [['region_id'], 'required'],
            [['region_id'], 'integer'],
            [['name_uz', 'name_oz', 'name_ru'], 'string', 'max' => 100],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'region_id' => Yii::t('app', 'Region ID'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'name_oz' => Yii::t('app', 'Name Oz'),
            'name_ru' => Yii::t('app', 'Name Ru'),
        ];
    }

    /**
     * Gets query for [[Addresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['district_id' => 'id']);
    }

    /**
     * Gets query for [[Quarters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuarters()
    {
        return $this->hasMany(Quarter::className(), ['district_id' => 'id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }
}
