<?php
use yii\helpers\Url;

$banner = common\models\Banner::find()->one();
?>

<!--START BANNER SECTION-->
<div class="banner-section parallax-slide" style="background: url(<?=$banner->imageUrl;?>)">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 text-center text-lg-left">
                <div class="banner-content-wrapper">
                    <span><?=$banner->toptitle;?></span>
                    <h1><?=$banner->title;?></h1>
                    <p><?=$banner->content;?></p>
                    <a href="<?=Url::to(['product/product-list']);?>" class="btn green-color-yellow-gradient-btn"><?=$banner->btn;?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END BANNER SECTION-->