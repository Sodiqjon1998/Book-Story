<?php

use yii\helpers\Url;

$productCarousel = common\models\Products::find()->where(['status' => '1'])->orderBy('id', SORT_DESC)->all();

?>




<!--START LATEST ARRIVALS-->
<div class="lastest_arrivals">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h1>Published Books</h1>
            </div>

            <div class="col-12">
                <div class="lastest_featured_products owl-carousel owl-theme">

                    <?php foreach($productCarousel as $item):?>
                    <div class="lastest_arrival_items item">
                        <a class="lastest-addto-cart clicked" href="<?=Url::to(['product/add-cart', 'id' => $item->id]);?>"><i class="fa fa-shopping-cart"></i></a>
                        <div class="card">
                            <span class="product-type">NEW</span>
                            <div class="image-holder">
                                <a href="<?=$item->image();?>"  data-fancybox="lastest_product"  data-title="Shirt Name">
                                    <img src="<?=$item->image();?>" class="card-img-top" alt="Lastest Arrivals 1">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h5 class="card-title"><?=$item->title;?></h5>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="card-text"> $<?=$item->price;?>.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php endforeach;?>

                </div>
            </div>
        </div>
    </div>
</div>
<!--END LATEST ARRIVALS-->