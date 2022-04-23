<?php

use yii\helpers\Url;
use frontend\components\Cart;
use common\models\Products;

$products = Cart::products();


?>





<div class="search-box-overlay">
    <a><i class="fas fa-times cross-sign" id="close-window"></i></a>

    <div class="container">
        <div class="row">
            <div class="col-12 search-col">
                <form action="<?=Url::to(['site/my-search']);?>" id="my_form" method="GET">
                    <div class="input-group search-box-form">
                        <input type="text" class="search form-control" id="mySearch" name="search" placeholder="Search Here" aria-label="Search Here">
                        <div class="input-group-prepend">
                            <button class="input-group-text" type="submit" id="basic-addon1"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="search-listing row my_search">
            <?php if(! empty($products)):?>

                <div class="col-12 mb-4">
                    <h4 class="">Filtered Items</h4>
                </div>
                <div class="col-12">
                    <div class="listing-search-scroll">
                            <?php foreach($products as $item):?>
                                <div class="media row">
                                    <div class="img-holder ml-1 mr-2 col-4">
                                        <a  href="javascript:void(0)"><img src="<?=$item->image();?>" class="align-self-center" alt="cartitem"></a>
                                    </div>
                                    <div class="media-body mt-auto mb-auto col-8">
                                        <h5 class="name"><a href="javascript:void(0)"><?=$item->title;?></a></h5>
                                        <p class="category">Price: <?=$item->price;?></p>
                                        <a class="btn black-sm-btn" href="<?=Url::to(['product/product-detail', 'id' => $item->id]);?>"><i class="fas fa-eye"></i></a>
                                        <a class="btn black-sm-btn" href="<?=Url::to(['product/delete-one', 'id' => $item->id]);?>"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        
                    </div>
                </div>
            <?php else:?>
                <p>Empty</p>
            <?php endif;?>
            </div>
            <!-- <div class="col-12">
                <hr>
            </div>

            <div class="col-12">
                <h4 class="outlet-title text-center"> - Author - </h4>
            </div>

            <div class="col-12">
                <div class="search-box-meida-items owl-carousel owl-theme">

                    <div class="item">
                        <div class="brand-search-box ml-auto mr-auto">
                            <div class="media">
                                <div class="brand-box-holder">
                                    <a href="javascript:void(0)"> <img class="mr-3" src="<?=Url::base();?>/book-shop/img/author1.jpg" alt="Generic placeholder image"></a>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="javascript:void(0)"> Eva Smith</a></h5>
                                    <p> Cras sit amet nibh libero.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="item">
                        <div class="brand-search-box ml-auto mr-auto">
                            <div class="media">
                                <div class="brand-box-holder">
                                    <a href="javascript:void(0)"> <img class="mr-3" src="<?=Url::base();?>/book-shop/img/author2.jpg" alt="Generic placeholder image"></a>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="javascript:void(0)">Rosa Parks</a></h5>
                                    <p> Cras sit amet nibh libero.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="item">
                        <div class="brand-search-box ml-auto mr-auto">
                            <div class="media">
                                <div class="brand-box-holder">
                                    <a href="javascript:void(0)"> <img class="mr-3" src="<?=Url::base();?>/book-shop/img/author3.jpg" alt="Generic placeholder image"></a>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="javascript:void(0)">Alan Yang</a></h5>
                                    <p> Cras sit amet nibh libero.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="item">
                        <div class="brand-search-box ml-auto mr-auto">
                            <div class="media">
                                <div class="brand-box-holder">
                                    <a href="javascript:void(0)"><img class="mr-3" src="<?=Url::base();?>/book-shop/img/author4.jpg" alt="Generic placeholder image"></a>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="javascript:void(0)">Kam John</a></h5>
                                    <p> Cras sit amet nibh libero.</p>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div> -->
        </div>
    </div>

</div>

