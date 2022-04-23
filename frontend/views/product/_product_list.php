<?php

use yii\helpers\Url;

?>




<div class="col-md-12 col-lg-8 order-1 order-lg-2">
    <div class="row">

        <!-- START LISTING HEADING -->
        <div class="col-12 product-listing-heading">

            <h1 class="heading text-left">Product Listing</h1>
            
            <p class="para_text text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. tellus lacus faucibus lectus, sed cursused eros ligula non odio.</p>
        </div>
        <!-- END LISTING HEADING -->

        <!-- START PRODUCT LISTING SECTION -->
        <div class="col-12 product-listing-products">

            <!-- START DISPLAY PRODUCT -->
            <div class="product-list row">

            <?php if(! empty($productList)):?>

                <?php foreach($productList as $item):?>

                    <div class="col-12 col-md-6 col-lg-4 manage-color-hover wow slideInUp" data-wow-delay=".2s">
                        <div class="product-item owl-theme product-listing-carousel owl-carousel">
                            <?php foreach($item->images() as $img):?>
                                <div class="item p-item-img">
                                        <img src="<?=$img;?>" alt="images">
                                    <div class="text-center d-flex justify-content-center align-items-center">
                                        <a class="listing-cart-icon clicked" href="<?=Url::to(['product/add-cart', 'id' => $item->id])?>">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                        <div class="p-item-detail">
                            <h4 class="text-center p-item-name"><a href="<?=Url::to(['product/product-detail', 'id' => $item->id])?>"> <?=$item->title;?> </a></h4>
                            <p class="text-center p-item-price">$<?=$item->price;?></p>
                        </div>
                    </div>

                <?php endforeach;?>
            <?php else:?>
                <h4 class="alert alert-warning">
                    Masulot mavjud emas
                </h4>
            <?php endif;?>

            </div>
            <!-- END DISPLAY PRODUCT -->


        </div>
        <!-- END PRODUCT LISTING SECTION -->
    </div>
</div>