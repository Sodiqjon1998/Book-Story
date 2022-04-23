<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "{{%menus}}".
 *
 * @property int $id
 * @property string $url
 *
 * @property MenusLang[] $menusLangs
 */
class Menus extends \yii\db\ActiveRecord
{
    
    use MultilingualLabelsTrait;

    
    public static function tableName()
    {
        return '{{%menus}}';
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
                    'home', 'books', 'product_list', 'contact', 'lang'
                ]
            ],
        ];
    }



    
    public function rules()
    {
        return [
            [['home', 'books', 'product_list', 'contact', 'lang'], 'required'],
            [['home', 'books', 'product_list', 'contact', 'lang'], 'string', 'max' => 255],
            [['url'], 'safe'],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'home' => Yii::t('app', 'Bosh Sahifa'),
            'books' => Yii::t('app', 'Kitoblar'),
            'product_list' => Yii::t('app', 'Maxsulotlar'),
            'contact' => Yii::t('app', 'Contact'),
            'lang' => Yii::t('app', 'Tillar'),
        ];
    }

    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }
}
