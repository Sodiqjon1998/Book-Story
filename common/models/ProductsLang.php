<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%products_lang}}".
 *
 * @property int $id
 * @property int $owner_id
 * @property string $language
 * @property string $title
 *
 * @property Product $owner
 */
class ProductsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%products_lang}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['owner_id', 'language', 'title'], 'required'],
            [['owner_id'], 'integer'],
            [['language', 'title'], 'string', 'max' => 255],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['owner_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'owner_id' => Yii::t('app', 'Owner ID'),
            'language' => Yii::t('app', 'Language'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Product::className(), ['id' => 'owner_id']);
    }
}
