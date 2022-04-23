<?php
use yii\helpers\Url;
use common\models\HomeBanner;


$homeBanner = HomeBanner::find()->joinWith('translations')->one();


?>



<!--BANNER START-->
<div class="homer-banner" style="background: url('<?=$homeBanner->imageUrl;?>'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center text-center text-lg-left">
                <div class="banner-description">
                    <span class="small-heading animated fadeInRight delay-1s"><?=$homeBanner->toptitle;?></span>
                    <h1 class="w-sm-100 w-md-100 w-lg-25 animated fadeInLeft delay-1s"><?=$homeBanner->title;?></h1>
                    <a href="<?=Url::to(['product/product-list']);?>" class="btn animated fadeInLeft delay-1s"><?=$homeBanner->btn;?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BANNER END-->