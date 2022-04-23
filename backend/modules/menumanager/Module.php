<?php

namespace backend\modules\menumanager;

/**
 * menumanager module definition class
 */
class Module extends \yii\base\Module
{
    
    public $controllerNamespace = 'backend\modules\menumanager\controllers';

    
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * Menu uchun sayt bo'limlari
     */
    public function sections()
    {
        return [
            'site/contact' => "Bog'lanish",
            'site/regions' => "Hududiy boshqarmalar",
            'news/all' => 'Yangiliklar',
            'vacancy/index' => 'Bo\'sh ish o\'rinlari',
            'leader/index' => 'Rahbariyat',
            'privatization/index' => 'Xususiylashtirish',
            'state-enterprise/index' => 'Davlat ishtirokidagi korxonalar',
            'rent/index' => 'Ijaralar',
            'site/video' => 'Video materiallar',
            'open-data/index' => 'Ochiq ma\'lumotlar',
        ];

    }
}
