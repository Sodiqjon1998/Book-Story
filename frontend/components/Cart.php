<?php

namespace frontend\components;

use common\models\Products;
use Yii;




class Cart
{

    public static function addToCart($product_id)
    {
        $session = Yii::$app->session;

        if (!$session->has('cart')){

            $session->set('cart', []);

        }

        if (!isset($_SESSION['cart'][$product_id] )){

            $_SESSION['cart'][$product_id] = 1;

        }
        else{

            $_SESSION['cart'][$product_id] =  $_SESSION['cart'][$product_id] + 1;

        }


    }




    public static function count($product_id){

        if(isset($_SESSION['cart'][$product_id])){

            return $_SESSION['cart'][$product_id];
        }
        
        else{
            
            return 0;
            
        }
    }





    public static function minusFromCart($product_id){

        $session = Yii::$app->session;

        if (!$session->has('cart')){
            return false;
        }

        if (!isset($_SESSION['cart'][$product_id] )){
           return false;
        }

        if ($_SESSION['cart'][$product_id] > 1){

            $_SESSION['cart'][$product_id] =$_SESSION['cart'][$product_id] - 1;

        }
        else{

           unset( $_SESSION['cart'][$product_id]);

        }
    }

    public static function deleteProduct($id){

        unset( $_SESSION['cart'][$id]);
    }



    public static function cart()
    {
        return Yii::$app->session->get('cart', []);
    }





    public static function products()
    {

        $cart = static::cart();

        $ids = array_keys($cart);

        return Products::find()->andWhere(['in', 'id', $ids])->all();
    }




    public static function allcount(){

        $i = 0;

        $products = static::cart();

        foreach ($products as $product){

            $i =$i+$product;
            
        }

        return $i;

    }

}