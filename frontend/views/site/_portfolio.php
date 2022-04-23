<?php

use yii\helpers\Html;
use yii\helpers\Url;
use zxbodya\yii2\galleryManager\GalleryBehavior;

$portfolioTitle = common\models\PortfolioTitle::find()->one();
$productCategory = common\models\ProductsCategory::find()->where(['status' => '1'])->limit(3)->all();

$product = common\models\Products::find()->andFilterWhere(['status' => '1'])->all();


?>

<!-- START PORTOLIO SECTION -->
<div class="portfolio-section">
    <div class="container">
        <div class="row">

            <!-- START PORTFOLIO HEADING -->
            <div class="col-12">
                <div class="portfolioHeading text-center">
                    <h1 class="high-lighted-heading"><?=$portfolioTitle->title;?></h1>
                    <p><?=$portfolioTitle->content;?></p>
                </div>
            </div>
            <!-- END PORTFOLIO HEADING -->

            <!-- START FILTERS -->
            <div class="col-12">
                <div class="clearfix d-flex justify-content-center">
                    <div id="js-filters-blog-posts" class="cbp-l-filters-button cbp-1-filters-alignCenter">
                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">All </div>
                        <?php foreach($productCategory as $value):?>
                        <div data-filter=".filter_<?=$value->id;?>" class="cbp-filter-item"><?=$value->title;?></div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!-- END FILTERS -->

            <!-- START PORTFOLIO IMAGES -->
            <div class="col-12">
                <div id="js-grid-blog-posts" class="cbp">
                

                    <?php foreach($product as $row):?>

                    <div class="cbp-item filter_<?=$row->category->id;?>">
                        <a class="clicked portfolio-circle-cart" href="<?=Url::to(['product/add-cart', 'id' => $row->id]);?>">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <div class="cbp-caption-defaultWrap  owl-theme sync-portfolio-carousel owl-carousel">
                            <?php foreach($row->images() as $image):?>

                                <div class="item"> <a href="<?=$image?>" class="cbp-caption" data-fancybox="gallery1" data-title="Book 1"><img src="<?=$image?>" alt="Book 1"></a></div>

                            <?php endforeach;?>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-title"><a href="<?=Url::to(['product/product-detail', 'id' => $row->id]);?>" target="_blank" class="portfolio-title"><?=$row->title;?></a></div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-desc portfolio-des">$<?=$row->price;?>.00</div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach;?>

                </div>
            </div>
            <!-- END PORTFOLIO IMAGES -->

        </div>
    </div>
</div>
<!-- END PORTOLIO SECTION -->