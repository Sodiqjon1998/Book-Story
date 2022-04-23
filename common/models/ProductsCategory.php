<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "{{%products_category}}".
 *
 * @property int $id
 * @property string $status
 *
 * @property Product[] $products
 * @property ProductsCategoryLang[] $productsCategoryLangs
 */
class ProductsCategory extends \yii\db\ActiveRecord
{
    
    use MultilingualLabelsTrait;


    public static function tableName()
    {
        return '{{%products_category}}';
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
                    'title'
                ]
            ],
        ];
    }



    
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['status'], 'string'],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Kategorya'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['category_id' => 'id']);
    }

    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }

    public function getCategoryProductCount()
    {
        return $this->hasMany(Products::className(), ['category_id' => 'id'])->count();
    }
}
