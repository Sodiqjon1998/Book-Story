<?php

namespace frontend\controllers;

use common\models\Contact;
use Yii;

class ContactController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $contact = new Contact();

        if($contact->load(Yii::$app->request->post())){

            $contact->status = "1";

            $contact->date = date("Y-m-d");

            if($contact->save()){
                Yii::$app->session->set('successs', 'Xabaringiz Yuborildi');
                
                return $this->redirect(Yii::$app->request->referrer);

            }
            
            else{
                
                Yii::$app->session->set('danger', 'Xabaringiz Yuborilmadi');

            }

        }

        return $this->render('index', [
            'contact' => $contact
        ]);
    }

}
