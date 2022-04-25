<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use common\models\Products;
use common\models\Order;
use common\models\OrderItem;
use common\models\User;
use common\models\Address;
use frontend\components\Cart;
use common\models\Districts;
use common\models\Quarters;
use common\models\Reviews;
use Yii;


class ProductController extends Controller{



    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionProductList(){

        $search = Yii::$app->request->get('search');

        $productList = Products::find()->joinWith('translations')->andFilterWhere(['like', 'title', $search])->all();

        return $this->render('product',[
            'productList' => $productList
        ]);

    }




    public function actionCategory($id){

        $productList = Products::find()
        ->andWhere(['status' => '1'])
        ->andWhere(['category_id' => $id])
        ->all();  

        return $this->render('product', [
            'productList' => $productList
        ]);
    }



    public function actionRangePrice(){

        $minPrice = Yii::$app->request->get('min-p');
        $maxPirce = Yii::$app->request->get('max-p');

        $productList= Products::find()
        ->andWhere(['status' => '1'])
        ->andFilterWhere(['>=','price', $minPrice])
        ->andFilterWhere(['<=','price', $maxPirce])->all();

        return $this->render('product', [
            'productList' => $productList
        ]);
    }





    public function actionProductDetail($id){

        
        if(Products::findOne($id) !== null){
            
            $review = new Reviews();

            $productDetail = Products::findOne($id);

            $productDetail->updateCounters(['count' => 1]);


            if($review->load(Yii::$app->request->post())){
                
                $review->status = 1;

                $productDetail->updateCounters(['count_review' => 1]);

                $review->products_id = $id;

                // echo "<pre>";
                //     print_r($review);
                // echo "</pre>";
                // exit();

                
                if($review->save(false)){
                    
                    Yii::$app->session->setFlash('success', 'Xabaringiz Yuborildi !');

                }
                return $this->redirect(Yii::$app->request->referrer);

            }



            return $this->render('product-detail', [
                'productDetail' => $productDetail,
                'review' => $review
            ]);
        }
        
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


    public function actionAddCart($id){

        Cart::addToCart($id);
        
        $result = [];
        
        if(Yii::$app->request->isAjax){

            $result['message'] = "Qo'shildi";
            
            $result['allCount'] = Cart::allcount();

            $result['count'] = Cart::count($val);

            $cartProducts = Cart::products();

            $result['content'] = $this->renderAjax('@frontend/views/layouts/_cart',[

                'cartProducts'=> $cartProducts,

            ]);

            return $this->asJson($result);
        }
    }


    public function actionDeleteOne($id){

        $result = [];

        if(Yii::$app->request->isAjax){
           
            Cart::deleteProduct($id);

            $cartProducts = Cart::products();
            
            $result['allCount'] = Cart::allcount();


            $result['content'] = $this->renderAjax('@frontend/views/product/_cart',[

                'cartProducts'=> $cartProducts,

            ]);
            $result['content1'] = $this->renderAjax('@frontend/views/layouts/_cart',[

                'cartProducts'=> $cartProducts,

            ]);
            
            $result['xabar'] = "O'chirildi";
            
            return $this->asJson($result);
        }

        return $this->redirect(Yii::$app->request->referrer);

    }


    public function actionDelete($id){

        $result = [];

        if(Yii::$app->request->isAjax){
           
            Cart::deleteProduct($id);

            $cartProducts = Cart::products();
            
            $result['allCount'] = Cart::allcount();


            $result['content'] = $this->renderAjax('@frontend/views/layouts/_cart',[

                'cartProducts'=> $cartProducts,

            ]);
            $result['content1'] = $this->renderAjax('@frontend/views/product/_cart',[

                'cartProducts'=> $cartProducts,

            ]);
            
            $result['xabar'] = "O'chirildi";

            
            return $this->asJson($result);
        }

        return $this->redirect(Yii::$app->request->referrer);

    }




    public function actionQuoteMinus($id){

        if(Yii::$app->request->isAjax){
            
                
            $result = [];
    
            $this->layout = false;


            Cart::minusFromCart($id);
            
            $result['allCount'] = Cart::allcount();

            $cartProducts = Cart::products();


            $result['content'] = $this->renderAjax('@frontend/views/product/_cart',[

                'cartProducts'=> $cartProducts,

            ]);
            $result['content1'] = $this->renderAjax('@frontend/views/layouts/_cart',[

                'cartProducts'=> $cartProducts,

            ]);
            $result['xabar'] = "O'chirildi";

            return $this->asJson($result);
            
        }

        
        return $this->redirect(Yii::$app->request->referrer);
    }

    
    public function actionQuote($id){

        if(Yii::$app->request->isAjax){
            
            $result = [];

            $this->layout = false;

            Cart::addToCart($id);     

            $result['allCount'] = Cart::allcount();

            $cartProducts = Cart::products();

            $result['content'] = $this->renderAjax('@frontend/views/product/_cart',[
                
                'cartProducts'=> $cartProducts,

            ]);
            $result['content1'] = $this->renderAjax('@frontend/views/layouts/_cart',[
                
                'cartProducts'=> $cartProducts,

            ]);
            $result['message'] = "Qo'shildi";

            return $this->asJson($result);
            
        }

        
        return $this->redirect(Yii::$app->request->referrer);
        
    }



    public function actionSaveDb(){


        $userId = Yii::$app->user->id;

        $products = Cart::products();
        
        if($products){

            
            $orderModel = new Order();
        
            $orderModel->user_id = $userId;
            $orderModel->total_sum =  $_SESSION['asumma'] +$_SESSION['sum'];
            $orderModel->status = 1;

            if($orderModel->save(false)){

                foreach($products as $product){
                    
                    $count = Cart::count($product->id);
                    
                    $orderItemModel = new OrderItem();

                    $orderItemModel->order_id = $orderModel->id;
                    $orderItemModel->product_id = $product->id;
                    $orderItemModel->title = $product->title;
                    $orderItemModel->price = $product->price;
                    $orderItemModel->count = $count;
                    $orderItemModel->save(false);
            
                    
                }
    
                Yii::$app->session->removeAll('cart');
            }
        }

       $address = new Address();


        if($address->load(Yii::$app->request->post())){
            $address->status = 1;
            $address->order_id = $orderModel->id;
            $address->created_at = date("Y-m-d");
            $address->updated_at = date("Y-m-d");


            if( ! empty($address->order_id) && $address->save(false)){
                
                Yii::$app->session->setFlash('success', 'Buyurtmangiz Qabul Qilindi');
            }
            if(empty($address->order_id)){
                
                Yii::$app->session->setFlash('error', 'Buyurtma Uchun Maxsulot Tanlang');
            }
            
            return $this->redirect(Yii::$app->request->referrer);
        }


        return $this->redirect(['product/cart-page']);

    }



    public function actionAjax(){

        $summa = Yii::$app->request->post('sum');

        if(Yii::$app->request->isAjax){

            $_SESSION['asumma'] = $summa;

            print_r($_SESSION['asumma']);
            exit;

            // return asJson($summa);
        }

    }


    public function actionAddress($id){



        $countDistricts = Districts::find()
        ->where(['region_id' => $id])
        ->count();

        $districts = Districts::find()
        ->where(['region_id' => $id])
        ->all();

        if($countDistricts > 0){
            foreach($districts as $item){
                echo "<option value='".$item->id."'>".$item->name_uz."</option>";
            }
        }
        else{
            echo "<option>-</option>";
        }


    }

    public function actionDistrict($id){

        $countQuarters = Quarters::find()
        ->where(['district_id' => $id])
        ->count();

        $qauarters = Quarters::find()
        ->where(['district_id' => $id])
        ->all();

        if($countQuarters > 0){
            foreach($qauarters as $item){
                echo "<option value='".$item->id."'>".$item->name."</option>";
            }
        }
        else{
            echo "<option>-</option>";
        }


    }


    public function actionCartPage(){


        return $this->render('cart-index');
    }


}