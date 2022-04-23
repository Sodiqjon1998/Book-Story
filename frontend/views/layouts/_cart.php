<?php

use yii\helpers\Url;
use frontend\components\Cart;
// use Yii;



// $cartProducts = Yii::$app->params->views['products'];
$cartProducts =  Cart::products();

$allCount = Cart::allcount();

$sum = 0;
$soni = 0;

?>




<div id="my_table">
    <div class="cart-box-overlay" id="my_div">
        <a><i class="fas fa-times cross-sign" id="close-window1"></i></a>

        <div class="container">
            <div class="row">
                <div class="search-listing row">
                    <div class="col-12 mb-4">
                        <h4 class="">Shop Cart</h4>
                    </div>
                    <?php if(! empty($cartProducts)):?>

                        <div class="col-12">

                            <div class="listing-search-scroll">

                                    <?php foreach($cartProducts as $k => $item):?>

                                        <div class="media row load">
                                            <div class="img-holder ml-1 mr-2 col-4">
                                                <a  href="<?=Url::to(['product/product-detail', 'id' => $item->id]);?>"><img src="<?=$item->image();?>" class="align-self-center" alt="cartitem"></a>
                                            </div>
                                            <?php $count = Cart::count($item->id);?>
                                            <div class="media-body mt-auto mb-auto col-8">
                                                <h5 class="name"><a href="<?=Url::to(['product/product-detail', 'id' => $item->id]);?>"><?=$item['title'];?>  </a></h5>
                                                <p class="category"> Price: $<?=$item['price'];?> &nbsp; &nbsp;  <span style="font-size: 14px; color: lightgreen;"> Count: <?=$count;?></span></p>
                                                <p style="font-size: 14px; position: absolute; bottom: 13px; color: #f7941d;"> Total Sum: $<?=$count * $item->price;?></p>
                                                <a class="btn black-sm-btn" href="<?=Url::to(['product/product-detail', 'id' => $item->id]);?>"><i class="fas fa-eye"></i></a>
                                                <a class="btn black-sm-btn my_basket_removes" href="<?=Url::to(['product/delete', 'id' => $item->id]);?>"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </div>
                                        <?php $sum += $item['price'] * $count;?>
                                        <?php $soni += $count;?>
                                        
                                    <?php endforeach;?>

                                    <?php $_SESSION['sum'] = $sum;?>
                                    <?php $_SESSION['soni'] = $soni;?>
                                
                            </div>
                                
                        </div>

                    <?php else:?>
                        
                        <p>
                            Your Empty Cart
                        </p>

                    <?php endif;?>

                </div>

            </div>
            <div class="bag-btn">
                <h4 class="total">
                    <span>Total: $<?=$sum;?></span>
                    <span>Amount: <?=$soni;?></span>
                </h4>
                <a href="<?=Url::to(['product/cart-page']);?>" class="btn green-color-yellow-gradient-btn">View Bag </a>
            </div>

        </div>

    </div>
</div>