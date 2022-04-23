<?php

$this->title = "Product List";


use common\models\CartBanner;

$cartBanner = CartBanner::find()->one();

?>

<!--slider sec strat-->
<section id="slider-sec" class="slider-sec parallax" style="background: url('<?=$cartBanner->imageUrl;?>');">
</section>
<!--slider sec end-->

<!--Product Line Up Start -->
<div class="product-listing">
    
    <div class="container">

        <div class="row no-gutters">

            <!-- START STICKY NAV -->
            <?=$this->render('_sticky_nav');?>
            <!-- END STICKY NAV -->

            <!-- START PRODUCT COL 8 -->
            <?=$this->render('_product_list', ['productList' => $productList]);?>
            <!-- END PRODUCT COL 8 -->

        </div>

    </div>

</div>
<!--Product Line Up End-->