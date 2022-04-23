<?php

namespace app\components;

use Yii;
use yii\base\Behavior;
use yii\web\Application;

class SetLanguages extends Behavior{
    
    
    public function events(){
        return[
            Application::EVENT_BEFORE_REQUEST => 'func',
        ];
    }

    public function func(){
        if(Yii::$app->session->has('language')){
            Yii::$app->language = Yii::$app->session->get('language');
        }
    }
}