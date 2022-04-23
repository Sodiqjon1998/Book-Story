<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "portfolio_title".
 *
 * @property int $id
 *
 * @property PortfolioTitleLang[] $portfolioTitleLangs
 */
class PortfolioTitle extends \yii\db\ActiveRecord
{
    
    
    use MultilingualLabelsTrait;


    public static function tableName()
    {
        return 'portfolio_title';
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
                    'title', 'content'
                ]
            ],
        ];
    }



    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content'], 'string', 'max' => 255],
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Sarlavha'),
            'content' => Yii::t('app', 'Mazmuni'),
        ];
    }

    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }
}
