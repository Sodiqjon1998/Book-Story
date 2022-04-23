<?php


use common\models\CartBanner;

$cartBanner = CartBanner::find()->one();


?>


<!-- START HEADING SECTION -->
<div class="about_content">

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-10  text-center text-lg-left wow slideInUp" data-wow-duration="2s">
                <h1 class="heading"><?=$cartBanner->title;?></h1>
                <p class="para_text"><?=$cartBanner->content;?></p>
            </div>
        </div>
    </div>

<?= $this->render('_cart')  ?>
 

</div>
<!-- END HEADING SECTION -->