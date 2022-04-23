<?php

$this->title = 'Cart';

use yii\helpers\Url;
use frontend\components\Cart;
use common\models\Products;
use yii\bootstrap4\ActiveForm;
use common\models\Address;
use common\models\Deliver;
use common\models\Districts;
use common\models\Regions;
use common\models\Quarters;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$model = new Address();
$deliver = new Deliver();





$cartProducts = Cart::products();
$allcount = Cart::allcount();

$sum = 0;
$son = 0;

?>

<div id="my_content">  
<!-- START SHOP CART SECTION -->
   <div class="shop-cart wow slideInUp loadings" data-wow-duration="2s">
        <div class="container">
            <!-- START SHOP CART TABLE -->
            
            <?php if(!empty($cartProducts)):?>
                <div class="row pt-5">
                    <div class="col-12 col-md-12  cart_table wow fadeInUp animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                        <div class="table-responsive" id="my-cartss">
                            <table class="table table-bordered border-radius">
                                <thead>
                                <tr>
                                    <th class="darkcolor">Product</th>
                                    <th class="darkcolor">Price</th>
                                    <th class="darkcolor">Quantity</th>
                                    <th class="darkcolor">Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($cartProducts as $k => $item):?>
                                        <tr>
                                            <td>
                                                <div class="d-table product-detail-cart">

                                                    <div class="media">
                                                        <div class="row no-gutters">

                                                            <div class="col-12 col-lg-2 product-detail-cart-image">
                                                                <a class="shopping-product" href="<?=Url::to(['product/product-detail', 'id' => $item->id]);?>"><img src="<?=$item->image();?>" alt="Generic placeholder image"></a>
                                                            </div>

                                                            <div class="col-12 col-lg-10 mt-auto product-detail-cart-data">
                                                                <div class="media-body ml-lg-3">
                                                                    <h4 class="product-name"><a href=""><?=$item['title'];?></a></h4>
                                                                    <p class="product-des" style="overflow: hidden !important;">We offer the most complete in the country</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h4 class="text-center amount">$<?=$item['price'];?></h4>
                                            </td>
                                            <?php $count = Cart::count($item->id)?>
                                            <td class="text-center">
                                                <div class="quote text-center mt-1">
                                                    <a href="<?=Url::to(['product/quote-minus', 'id' => $item->id]);?>" data-id="<?=$item->id;?>" style="background: green !important; cursor: pointer; color: #fff;" class="minus bg-dark"><i class="lni-minus"></i></a>
                                                        <input type="number" class="count"  id="quote" name="qty" value="<?=$count;?>">
                                                    <a href="<?=Url::to(['product/quote', 'id' => $item->id]);?>" style="background: green !important; cursor: pointer; color: #fff;" class="plus bg-dark"><i class="lni-plus"></i></a>
                                                </div>
                                            </td>
                                            <td>
                                                <h4 class="text-center amount">$<?=$item['price'] * $count;?></h4>
                                            </td>
                                            <td class="text-center"><a class="btn-close my_product_remove" href="<?=Url::to(['product/delete-one', 'id' => $item->id]);?>"><i class="lni-trash"></i></a></td>
                                        </tr>
                                        <?php $sum += $item['price'] * $count;?>
                                        <?php $son +=$count;?>
                                    <?php endforeach;?>
                                    <?php $_SESSION['product_sum'] = $sum;?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            <?php else:?>
                <h4 class="alert alert-warning">Empty Cart</h4>
            <?php endif;?>
            <!-- END SHOP CART TABLE -->

            <!-- START SHOP CART CHECKOUT FORM -->
            <div class="row pt-5">
              
                <div class="col-12 col-lg-6 wow slideInLeft" data-wow-duration="2s">
                    <?php $form = ActiveForm::begin(['action' => ['product/save-db']]);?>
                        <div class="calculate-shipping">
                            <h4 class="heading">Calculate Shipping</h4>
                                <div class="form-group">
                                    <?=$form->field($model, 'region_id')->dropdownList(ArrayHelper::map(Regions::find()->all(), 'id', 'name_uz'),
                                        [
                                            'onchange' => '
                                                $.post("/product/address?id='.'"+$(this).val(), function(data){
                                                    $("select#address-district_id").html(data);
                                                });
                                            '
                                        ])->label(false);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?=$form->field($model, 'district_id')->dropdownList(ArrayHelper::map(Districts::find()->all(), 'id', 'name_uz'), 
                                    [
                                        'onchange' => '
                                            $.post("/product/district?id='.'"+$(this).val(), function(data){
                                                $("select#address-quarters_id").html(data);
                                            });
                                        '
                                    ], )->label(false);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?=$form->field($model, 'quarters_id')->dropdownList(ArrayHelper::map(Quarters::find()->all(), 'id', 'name'), 
                                    )->label(false);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?=$form->field($model, 'bosting')->textInput(['placeholder' => 'Mo\'ljal'])->label(false);?>
                                </div>
                                <div class="form-group">
                                    <?=$form->field($model, 'phone')->textInput(['placeholder' => 'Telphone'])->label(false);?>
                                </div>
                                <?php if(!Yii::$app->user->isGuest):?>
                                    
                                    <?=Html::submitButton('Buyutmani yuborish',['class' => 'btn yellow-color-green-gradient-btn'])?>

                                    <?php else:?>

                                    <a href="<?=Url::to(['site/signup']);?>" class="btn green-color-yellow-gradient-btn ">Sign Up</a>
                                    <a href="<?=Url::to(['site/login']);?>" class="btn green-color-yellow-gradient-btn ">Login</a>

                                <?php endif;?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 wow slideInRight" data-wow-duration="2s">
                        <div class="card-total">
                            <h4 class="heading">Card Total</h4>
                            <table>
                                <tr>
                                    <td>Subtotal $<span id="summa"><?=$sum ?? 0;?></span></td>
                                    <td><strong>Soni: </strong> <span id="soni"> <?=$allcount;?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                    
                                    <ul class="color-grey">
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="flat-rate" name="shipping" class="custom-control-input radio_val" value="49" checked="">
                                                    <label class="custom-control-label" for="flat-rate">Flat Rate : $49.00</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="free-shipping" name="shipping" class="custom-control-input radio_val" value="0">
                                                    <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="cod-shipping" name="shipping" class="custom-control-input radio_val" value="55">
                                                    <label class="custom-control-label" for="cod-shipping">Cash on Delivery</label>
                                                </div>
                                            </li>
                                        </ul>
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total $ <span id="sum_total"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php ActiveForm::end();?>
            </div>
            
            <!-- END SHOP CART CHECKOUT FORM -->
        </div>
    </div>
<!-- END SHOP CART SECTION-->
</div>