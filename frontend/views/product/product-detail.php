<?php

$this->title = 'Product Detail';

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\Banner;
use common\models\Products;
use common\models\ProductsCategory;
use kartik\rating\StarRating;
use yii\bootstrap4\ActiveForm;
use common\models\Reviews;
use common\models\DetailBanner;



$banner = Banner::find()->one();
$detailBanner = DetailBanner::find()->one();

$productCategory = ProductsCategory::find()->where(['status' => 1])->limit(3)->all();
$products = Products::find()->where(['status' => '1'])->all();

$reviewComment = Reviews::find()->where(['status' => 1])->all();

?>


<!--slider sec strat-->
<section id="slider-sec" class="slider-sec parallax" style="background: url('<?=$detailBanner->imageUrl;?>');">
</section>
<!--slider sec end-->

<!-- START HEADING SECTION -->
<div class="about_content">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="product-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb text-center text-lg-left">
                            <li class="breadcrumb-item"><a href="<?=Url::home();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?=Url::to(['product/product-list']);?>">Categories</a></li>
                        </ol>
                    </nav>
                    <div class="pro-detail-sec row">
                        <div class="col-12">
                            <h4 class="pro-heading text-center text-lg-left"><?=$banner->title;?></h4>
                            <p class="pro-text text-center text-lg-left"><?=$banner->content;?></p>
                        </div>
                    </div>
                    <div class="row product-list product-detail">

                        <div class="col-12 col-lg-6 product-detail-slider">
                            <div class="wrapper">
                                <div class="Gallery swiper-container img-magnifier-container" id="gallery">
                                    <div class="swiper-wrapper myimgs">
                                        <?php foreach($productDetail->images() as $item):?>
                                            <div class="swiper-slide"> <a href="<?=$item;?>" data-fancybox="1" title="Zoom In"><img class="myimage" src="<?=$item;?>" alt="gallery"/></a></div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="Thumbs swiper-container" id="thumbs">
                                    <div class="swiper-wrapper">
                                        <?php foreach($productDetail->images() as $item):?>
                                            <div class="swiper-slide"> <img src="<?=$item;?>" alt="thumnails"/></div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 text-center text-lg-left">
                            <div class="product-single-price">
                                <h4><span class="real-price">$<?=$productDetail->price;?></span> <span><del>$450</del></span></h4>
                                <p class="pro-description"><?=$productDetail->title;?></p>
                            </div>

                            <div class="product-checklist">
                                <ul>
                                    <li><i class="fas fa-check"></i> Satisfaction 100% Guaranteed</li>
                                    <li><i class="fas fa-check"></i> free shipping on orders over $99</li>
                                    <li><i class="fas fa-check"></i> 14 days easy Return</li>
                                </ul>
                            </div>

                            <div class="row product-quantity input_plus_mins no-gutters">

                                <div class="qty col-12 col-lg-3 d-lg-flex  align-items-lg-center d-inline-block">
                                    <a href="<?=Url::to(['product/quote-minus', 'id' => $productDetail->id]);?>" class="minus bg-dark"><i class="lni-minus"></i></a>
                                        <input type="number" class="count" name="qty" value="0">
                                    <a href="<?=Url::to(['product/quote', 'id' => $productDetail->id]);?>" class="plus bg-dark"><i class="lni-plus"></i></a>
                                </div>
                            </div>


                            <div class="dropdown-divider"></div>

                            <div class="product-tags-list">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><p class="d-inline">SKU: <span>00012</span></p></li>
                                        <li class="breadcrumb-item"><span class="d-inline">Categories: <a href="<?=Url::to(['product/category', 'id' => $productDetail->category->id]);?>"><?=$productDetail->category->title;?></a><span class="comma-separtor"></li>
                                        <li class="breadcrumb-item" aria-current="page"><p class="d-inline">Tags: 
                                            <?php foreach($productCategory as $item):?>
                                                <a href="<?=Url::to(['product/category', 'id' => $item->id]);?>"><?=$item->title;?></a><span class="comma-separtor">,</span>
                                            <?php endforeach;?>
                                        </li>
                                    </ol>
                                </nav>
                            </div>

                            <div class="share-product-details">
                                <ul class="share-product-icons">
                                    <li><p>Share Link:</p></li>
                                    <li><a href="javascript:void(0)" class="facebook-bg-hvr"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="javascript:void(0)" class="twitter-bg-hvr"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
                                    <li><a href="javascript:void(0)" class="linkedin-bg-hvr"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                                    <li><a href="javascript:void(0)" class="instagram-bg-hvr"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 mt-4 mb-4">
                            <div class="row no-gutters product-all-details">

                                <ul class="col-12 nav nav-tabs" id="myTab" role="tablist">
                                    <li class="col-4 nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Project Description</a>
                                    </li>
                                    <li class="col-4 nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Additional Information</a>
                                    </li>
                                    <li class="col-4 nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Customer Reviews  (2)</a>
                                    </li>
                                </ul>
                                <div class="col-12 tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <p class="product-tab-description text-center text-lg-left">If you are a small business and you are interested in small rebranding then this is a perfect plan for you, having Five years experience in Blogging, photographing, Disgning and love to cycling,Writting,Singing and Traveling around the world</p>
                                        <p class="product-tab-description text-center text-lg-left">If you are a small business and you are interested in small rebranding then this is a perfect plan for you, having Five years experience in Blogging, photographing, Disgning and love to cycling,Writting,Singing and Traveling around the world</p>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">First</th>
                                                        <th scope="col">Last</th>
                                                        <th scope="col">Handle</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">4</th>
                                                        <td>Alex</td>
                                                        <td>Thorn</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="tab-pane fade reviews" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                        <?php foreach($reviewComment as $item):?>
                                        <div class="media">
                                            <div class="row no-gutter">
                                                <div class="col-12 col-lg-2 p-0">

                                                    <div class="row no-gutters">
                                                        <div class="col-12 d-flex  justify-content-center">
                                                            <img style="overflow: hidden;">
                                                        </div>
                                                        <div class="col-12 d-flex mt-2 justify-content-center">
                                                            <ul class="user-rating">
                                                                <?=StarRating::widget([
                                                                    'name' => 'rating_21',
                                                                    'value' => $item->stars,
                                                                    'pluginOptions' => [
                                                                        'size' => 'xs',
                                                                        'readonly' => true,
                                                                        'showClear' => false,
                                                                        'showCaption' => false,
                                                                    ],
                                                                ]);?>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-12 col-lg-10 p-0">
                                                    <div class="media-body">
                                                        <span class="text-center text-lg-left d-block">27 Aug 2017</span>
                                                        <h5 class="mb-2 text-center text-lg-left">Media heading</h5>
                                                        <p class="text-center text-lg-left">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam.</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <?php endforeach;?>

                                        <div class="row pl-2 pr-2">
                                            <div class="col-12 d-flex mb-4 mt-3">
                                                <h5 class="text-nowrap">Add Review</h5>
                                                <hr class="w-100 ml-5"/>
                                            </div>
                                            <div class="col-12">
                                                <?php $form = ActiveForm::begin();?>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group bottom35">
                                                                <?=$form->field($review, 'name')->textInput(['placeholder' => 'Name*'])->label(false);?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group bottom35">
                                                                <?=$form->field($review, 'email')->textInput(['placeholder' => 'Email*'])->label(false);?>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-2 text-center text-lg-left">
                                                            <h5 class="text-nowrap">Your Rating</h5>
                                                        </div>
                                                        <div class="col-12 col-lg-10 text-center text-lg-left">
                                                            <?=$form->field($review, 'stars')->widget(StarRating::classname(), [
                                                                'pluginOptions' => [
                                                                    'step' => 1,
                                                                    'readonly' => false,
                                                                    'size' => 'sm',
                                                                    'showClear' => false,
                                                                    'showCaption' => false,

                                                                ]
                                                            ])->label(false);?>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <?=$form->field($review, 'your_review')->textarea(['placeholder' => 'Your Review*', 'style' => 'height: 120px;'])->label(false);?>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 mt-3">
                                                            <div class="form-group d-flex justify-content-center d-lg-block">
                                                                <?= Html::submitButton('Add Review', ['class' => 'text-center btn green-color-yellow-gradient-btn']) ?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                <?php ActiveForm::end();?>
                                            </div>
                                        </div>

                                        </div>
                                    <!--  -->
                                </div>

                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>

    <!--START LATEST ARRIVALS-->
    <?=$this->render('_latest');?>
    <!--END LATEST ARRIVALS-->

</div>
<!-- END HEADING SECTION -->