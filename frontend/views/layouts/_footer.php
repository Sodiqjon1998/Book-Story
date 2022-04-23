<?php 

use yii\helpers\Url;
use common\models\ProductsCategory;

$productCategory = ProductsCategory::find()
                        ->where(['status' => '1'])
                        ->limit(4)
                        ->all();


?>


<div class="footer">
    <div class="container">
        <div class="row footer-container">
            <div class="col-sm-12 col-lg-4 f-sec1  text-center text-lg-left">
                <h4 class="high-lighted-heading">About Us</h4>
                <p>We take our mission of increasing our global access to quality education seriously. </p>
                <a href="#">Read more</a>
                <h4>Social Network</h4>
                <div class="s-icons">
                    <ul class="social-icons-simple">
                        <li><a href="javascript:void(0)" class="facebook-bg-hvr"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                        <li><a href="javascript:void(0)" class="twitter-bg-hvr"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
                        <li><a href="javascript:void(0)" class="instagram-bg-hvr"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-lg-5 f-sec2 ">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h4 class="text-center text-md-left">Information</h4>
                        <ul class="text-center text-md-left">
                            <li><a href="javascript:void(0)">About Us</a></li>
                            <li><a href="javascript:void(0)">Delivery Information</a></li>
                            <li><a href="javascript:void(0)">Privacy Policy</a></li>
                            <li><a href="javascript:void(0)">Terms & Condition</a></li>
                            <li><a href="javascript:void(0)">FAQ</a></li>
                            <li><a href="book-shop/contact.html">Contact Us</a></li>
                            <li><a href="book-shop/product-listing.html">Products</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6">
                        <h4 class="text-center text-md-left">Account Info</h4>
                        <ul class="text-center text-md-left">
                            <li><a href="javascript:void(0)">Login & Register</a></li>
                            <li><a href="book-shop/shop-cart.html">Order History</a></li>
                            <li><a href="javascript:void(0)">Shipping Info</a></li>
                            <li><a href="javascript:void(0)">Refund Policy</a></li>
                            <li><a href="javascript:void(0)">Responsive Website</a></li>
                            <li><a href="javascript:void(0)">Subscription</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 f-sec3  text-center text-lg-left">
                <h4>Our Portfolio</h4>
                <div class="foot-tag-list">
                    <?php foreach($productCategory as $item):?>
                        <a href="<?=Url::to(['product/category', 'id' => $item->id]);?>">
                            <span><?=$item->title;?></span>
                        </a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 footer_notes">
                <p class="whitecolor text-center w-100 wow fadeInDown">&copy; 2020 MegaOne. Made With Love by <a class="web-link" href="http://www.themesindustry.com/" target="_blank">Themesindustry</a></p>
            </div>
        </div>
    </div>
</div>