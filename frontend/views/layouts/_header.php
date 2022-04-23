<?php

use yii\helpers\Url;
use yii\helpers\Html;
use backend\modules\menumanager\models\Menu;
use common\models\Products;
use frontend\components\Cart;
// use Yii;

$allCount=Cart::allcount();
$product = Products::find()->orderBy('count', SORT_DESC)->all();

$productnavel = Products::find()->andFilterWhere(['category_id' => 2])->all();
$productClassik = Products::find()->andFilterWhere(['category_id' => 1])->all();
$productHistorical = Products::find()->andFilterWhere(['category_id' => 3])->all();




$main_menu = Menu::getMenu('header_menu');
$menus = $main_menu->activeSubMenus ;
?>

<?php if(Yii::$app->controller->route == 'site/index'):?>
    <div class="header-area">
        <div class="container">
            <div class="row upper-nav">
                <div class=" text-left nav-logo">
                    <a href="<?=Url::home();?>" class="navbar-brand"><img src="<?=Url::base();?>/book-shop/img/logo.png" alt="img"></a>
                </div>
                <div class="ml-auto nav-mega d-flex justify-content-end align-items-center">
                    <header class="site-header" id="header">
                        <nav class="navbar navbar-expand-md  static-nav">
                            <div class="container position-relative megamenu-custom">
                                <a class="navbar-brand center-brand" href="<?=Url::home();?>">
                                    <img src="<?=Url::base();?>/book-shop/img/logo.png" alt="logo" class="logo-scrolled">
                                </a>
                                <div class="collapse navbar-collapse">
                                    
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=Url::home();?>">HOME</a>
                                        </li>

                                        <li class="nav-item dropdown static">
                                            <a class="nav-link dropdown-toggle active" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> BOOKS </a>
                                            <ul class="dropdown-menu megamenu flexable-megamenu">
                                                <li>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 col-sm-12 mengmenu_border">
                                                                <h5 class="dropdown-title"> Most Wanted </h5>
                                                                <ul>
                                                                    <?php foreach($product as $item):?>
                                                                        <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="<?=Url::to(['product/category', 'id' => $item->id]);?>"><?=$item->title;?></a></li>
                                                                    <?php endforeach;?>
                                                                </ul>
                                                                <h5 class="dropdown-title"> Classic </h5>
                                                                <ul>
                                                                    <?php foreach($productClassik as $item):?>
                                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="<?=Url::to(['product/category', 'id' => $item->id]);?>"><?=$item->title;?></a></li>
                                                                    <?php endforeach;?>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3 col-md-6 col-sm-12 mengmenu_border">
                                                                <h5 class="dropdown-title"> NOVEL's </h5>
                                                                <ul>
                                                                    <?php foreach($productnavel as $item):?>
                                                                        <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="<?=Url::to(['product/category', 'id' => $item->id]);?>"><?=$item->title;?></a></li>
                                                                    <?php endforeach;?>
                                                                </ul>

                                                                <!-- <h5 class="dropdown-title"> HISTORY </h5>
                                                                <ul>
                                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Creative Thinking</a></li>
                                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Historical Fiction</a></li>
                                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Creative Thinking</a></li>
                                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Personal Finance</a></li>
                                                                </ul> -->

                                                            </div>

                                                            <div class="col-lg-6 col-md-12 col-sm-12">

                                                                <h5 class="dropdown-title"> HISTORY </h5>
                                                                <ul>
                                                                    <?php foreach($productHistorical as $item):?>
                                                                        <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="<?=Url::to(['product/category', 'id' => $item->id]);?>"><?=$item->title;?></a></li>
                                                                    <?php endforeach;?>
                                                                </ul>
                                                                <!-- <h5 class="dropdown-title text-left">Featured Items </h5>
                                                                <div class="carousel-menu mt-4">
                                                                    <div class="featured-megamenu-carousel owl-carousel owl-theme">
                                                                        <div class="item ">
                                                                            <img src="<?=Url::base();?>/book-shop/img/shop1.jpg" alt="shop-image" >
                                                                        </div>
                                                                        <div class="item">
                                                                            <img src="<?=Url::base();?>/book-shop/img/shop2.jpg"  alt="shop-image">
                                                                        </div>
                                                                    </div>
                                                                    <i class="lni-chevron-left ini-customPrevBtn"></i>
                                                                    <i class="lni-chevron-right ini-customNextBtn"></i>
                                                                </div>
                                                                <p class="mt-4 megamenu-slider-para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                                                <a href="book-shop/product-listing.html" class="btn black-border-color-yellow-gradient-btn slider-btn text-left">Buy Now</a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=Url::to(['product/product-list']);?>">Product List</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=Url::to(['contact/index']);?>">CONTACT</a>
                                        </li>

                                        <li class="nav-item dropdown position-relative">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</a>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    <?php foreach (Yii::$app->params['language'] as $k => $val): ?>
                                                        <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="<?= Url::to(['site/chang-lang', 'lang' => $k]); ?>"><?= $val; ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <!-- side menu -->
                        <div class="side-menu opacity-0 gradient-bg hidden">
                            <div class="inner-wrapper">
                                <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
                                <nav class="side-nav w-100">
                                    <ul class="navbar-nav">

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=Url::home();?>"> HOME</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages1">
                                                BOOKS <i class="fas fa-chevron-down"></i>
                                            </a>
                                            <div id="sideNavPages1" class="collapse sideNavPages">

                                                <ul class="navbar-nav mt-2">
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Love Does</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">No One Belongs</a></li>
                                                    <li class="nav-item" ><a class="nav-link" href="book-shop/product-listing.html">As I Lay Dying</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Life is Elsewhere</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">The Road</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Why Me?</a></li>
                                                </ul>
                                                <h5 class="sub-title">1. Classic</h5>
                                                <ul class="navbar-nav mt-2">
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Lorna Doone</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Lord of Flies</a></li>
                                                    <li class="nav-item" ><a class="nav-link" href="book-shop/product-listing.html">Kidnapped</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">End World</a></li>
                                                </ul>

                                                <h5 class="sub-title">2. Novel's</h5>
                                                <ul class="navbar-nav mt-2">
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Romance</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Fantasy</a></li>
                                                    <li class="nav-item" ><a class="nav-link" href="book-shop/product-listing.html">Thrillers</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Historical Fiction</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Others</a></li>
                                                </ul>

                                                <h5 class="sub-title">3. History</h5>
                                                <ul class="navbar-nav mt-2">
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Creative Thinking</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Historical Fiction</a></li>
                                                    <li class="nav-item" ><a class="nav-link" href="book-shop/product-listing.html">Creative Thinking</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Personal Finance</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages3">
                                                E-BOOKS <i class="fas fa-chevron-down"></i>
                                            </a>
                                            <div id="sideNavPages3" class="collapse sideNavPages">
                                                <ul class="navbar-nav mt-2">
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Art</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Autobiography</a></li>
                                                    <li class="nav-item" ><a class="nav-link" href="book-shop/product-listing.html">Biography</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Chick lit</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Coming-of-age</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Anthology</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Drama</a></li>
                                                </ul>
                                                <h5 class="sub-title">1. Others</h5>
                                                <ul class="navbar-nav mt-2">
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Crime</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html"> Dictionary</a></li>
                                                    <li class="nav-item" ><a class="nav-link" href="book-shop/product-listing.html"> Health</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">History</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Horror</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Poetry</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=Url::to(['contact/index']);?>">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="side-footer w-100">
                                    <ul class="social-icons-simple white top40">
                                        <li><a class="facebook-bg-hvr"  href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                                        <li><a class="twitter-bg-hvr" href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                                        <li><a class="instagram-bg-hvr" href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                                    </ul>
                                    <p class="whitecolor">&copy; <span id="year"></span> Product Shop. Made With Love by ThemesIndustry</p>
                                </div>
                            </div>
                        </div>
                        <div id="close_side_menu" class="tooltip"></div>
                        <!-- End side menu -->
                    </header>
                    <div class="nav-utility">
                        <div class="manage-icons d-inline-block">
                            <ul class="d-flex justify-content-center align-items-center">
                                <li class="d-inline-block">
                                    <a id="add_search_box">
                                        <i class="lni lni-search search-sidebar-hover"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block mini-menu-card">
                                    <a class="nav-link" id="add_cart_box" href="javascript:void(0)">
                                        <i class="lni lni-shopping-basket"></i>
                                        <span id="countshow" style="position: absolute; top: 3%; width: 30px; height: 20px; font-size: 15px; font-family: serif; border-radius: 50%; color: red;"><?=$allCount ?? 0;?></span>
                                    </a>
                                </li>
                                <a href="javascript:void(0)" class="d-inline-block sidemenu_btn d-block" id="sidemenu_toggle">
                                    <i class="lni lni-menu"></i>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <ul>
                        <li class="nav-item">
                            <?php
                                if (Yii::$app->user->isGuest){
                                    echo "<div style='display: flex; justfy-content: space-around;'><a class='nav-link btn btn-sm' style='padding: 7px !important; font-weight: 700;' href=".Url::to(['site/login']).">".Yii::t('app', 'login')."</a><a class='nav-link btn btn-sm' style='padding: 7px !important; font-weight: 700;' href=".Url::to(['site/signup'])."> ".Yii::t('app', 'signup')."</a></div>";
                                }else {
                                    echo
                                    Html::beginForm(['site/logout'], 'post', ['class' => 'nav-link',])
                                    . Html::submitButton(
                                        'Logout (' . Yii::$app->user->identity->username . ')',
                                        ['class' => 'btn btn-link logout nav-link', 'style' => 'text-decoration: none; color: #000; font-weight: 700;']
                                    )
                                    . Html::endForm();
                                }
                            ?>
                        </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php else:?>
    <div class="header-area fixed-header1 position-relative">
        <div class="container">
            <div class="row upper-nav">
                <div class=" text-left nav-logo">
                    <a href="<?=Url::home();?>" class="navbar-brand"><img src="<?=Url::base();?>/book-shop/img/logo.png" alt="img"></a>
                </div>
                <div class="ml-auto nav-mega d-flex justify-content-end align-items-center">
                    <header class="site-header" id="header">
                        <nav class="navbar navbar-expand-md  static-nav">
                            <div class="container position-relative megamenu-custom">
                                <a class="navbar-brand center-brand" href="<?=Url::home();?>">
                                    <img src="<?=Url::base();?>/book-shop/img/logo.png" alt="logo" class="logo-scrolled">
                                </a>
                                <div class="collapse navbar-collapse">
                                    
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=Url::home();?>">HOME</a>
                                        </li>

                                        <li class="nav-item dropdown static">
                                            <a class="nav-link dropdown-toggle active" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> BOOKS </a>
                                            <ul class="dropdown-menu megamenu flexable-megamenu">
                                                <li>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 col-sm-12 mengmenu_border">
                                                                <h5 class="dropdown-title"> Most Wanted </h5>
                                                                <ul>
                                                                    <?php foreach($product as $item):?>
                                                                        <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="<?=Url::to(['product/category', 'id' => $item->id]);?>"><?=$item->title;?></a></li>
                                                                    <?php endforeach;?>
                                                                </ul>
                                                                <h5 class="dropdown-title"> Classic </h5>
                                                                <ul>
                                                                    <?php foreach($productClassik as $item):?>
                                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="<?=Url::to(['product/category', 'id' => $item->id]);?>"><?=$item->title;?></a></li>
                                                                    <?php endforeach;?>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3 col-md-6 col-sm-12 mengmenu_border">
                                                                <h5 class="dropdown-title"> NOVEL's </h5>
                                                                <ul>
                                                                    <?php foreach($productnavel as $item):?>
                                                                        <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="<?=Url::to(['product/category', 'id' => $item->id]);?>"><?=$item->title;?></a></li>
                                                                    <?php endforeach;?>
                                                                </ul>

                                                                <!-- <h5 class="dropdown-title"> HISTORY </h5>
                                                                <ul>
                                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Creative Thinking</a></li>
                                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Historical Fiction</a></li>
                                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Creative Thinking</a></li>
                                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Personal Finance</a></li>
                                                                </ul> -->

                                                            </div>

                                                            <div class="col-lg-6 col-md-12 col-sm-12">

                                                                <h5 class="dropdown-title"> HISTORY </h5>
                                                                <ul>
                                                                    <?php foreach($productHistorical as $item):?>
                                                                        <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="<?=Url::to(['product/category', 'id' => $item->id]);?>"><?=$item->title;?></a></li>
                                                                    <?php endforeach;?>
                                                                </ul>
                                                                <!-- <h5 class="dropdown-title text-left">Featured Items </h5>
                                                                <div class="carousel-menu mt-4">
                                                                    <div class="featured-megamenu-carousel owl-carousel owl-theme">
                                                                        <div class="item ">
                                                                            <img src="<?=Url::base();?>/book-shop/img/shop1.jpg" alt="shop-image" >
                                                                        </div>
                                                                        <div class="item">
                                                                            <img src="<?=Url::base();?>/book-shop/img/shop2.jpg"  alt="shop-image">
                                                                        </div>
                                                                    </div>
                                                                    <i class="lni-chevron-left ini-customPrevBtn"></i>
                                                                    <i class="lni-chevron-right ini-customNextBtn"></i>
                                                                </div>
                                                                <p class="mt-4 megamenu-slider-para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                                                <a href="book-shop/product-listing.html" class="btn black-border-color-yellow-gradient-btn slider-btn text-left">Buy Now</a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=Url::to(['product/product-list']);?>">Product List</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=Url::to(['contact/index']);?>">CONTACT</a>
                                        </li>

                                        <li class="nav-item dropdown position-relative">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</a>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    <?php foreach (Yii::$app->params['language'] as $k => $val): ?>
                                                        <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="<?= Url::to(['site/chang-lang', 'lang' => $k]); ?>"><?= $val; ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <!-- side menu -->
                        <div class="side-menu opacity-0 gradient-bg hidden">
                            <div class="inner-wrapper">
                                <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
                                <nav class="side-nav w-100">
                                    <ul class="navbar-nav">

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=Url::home();?>"> HOME</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages1">
                                                BOOKS <i class="fas fa-chevron-down"></i>
                                            </a>
                                            <div id="sideNavPages1" class="collapse sideNavPages">

                                                <ul class="navbar-nav mt-2">
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Love Does</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">No One Belongs</a></li>
                                                    <li class="nav-item" ><a class="nav-link" href="book-shop/product-listing.html">As I Lay Dying</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Life is Elsewhere</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">The Road</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Why Me?</a></li>
                                                </ul>
                                                <h5 class="sub-title">1. Classic</h5>
                                                <ul class="navbar-nav mt-2">
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Lorna Doone</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Lord of Flies</a></li>
                                                    <li class="nav-item" ><a class="nav-link" href="book-shop/product-listing.html">Kidnapped</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">End World</a></li>
                                                </ul>

                                                <h5 class="sub-title">2. Novel's</h5>
                                                <ul class="navbar-nav mt-2">
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Romance</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Fantasy</a></li>
                                                    <li class="nav-item" ><a class="nav-link" href="book-shop/product-listing.html">Thrillers</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Historical Fiction</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Others</a></li>
                                                </ul>

                                                <h5 class="sub-title">3. History</h5>
                                                <ul class="navbar-nav mt-2">
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Creative Thinking</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Historical Fiction</a></li>
                                                    <li class="nav-item" ><a class="nav-link" href="book-shop/product-listing.html">Creative Thinking</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Personal Finance</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages3">
                                                E-BOOKS <i class="fas fa-chevron-down"></i>
                                            </a>
                                            <div id="sideNavPages3" class="collapse sideNavPages">
                                                <ul class="navbar-nav mt-2">
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Art</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Autobiography</a></li>
                                                    <li class="nav-item" ><a class="nav-link" href="book-shop/product-listing.html">Biography</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Chick lit</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Coming-of-age</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Anthology</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Drama</a></li>
                                                </ul>
                                                <h5 class="sub-title">1. Others</h5>
                                                <ul class="navbar-nav mt-2">
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Crime</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html"> Dictionary</a></li>
                                                    <li class="nav-item" ><a class="nav-link" href="book-shop/product-listing.html"> Health</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">History</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Horror</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Poetry</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=Url::to(['contact/index']);?>">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="side-footer w-100">
                                    <ul class="social-icons-simple white top40">
                                        <li><a class="facebook-bg-hvr"  href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                                        <li><a class="twitter-bg-hvr" href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                                        <li><a class="instagram-bg-hvr" href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                                    </ul>
                                    <p class="whitecolor">&copy; <span id="year"></span> Product Shop. Made With Love by ThemesIndustry</p>
                                </div>
                            </div>
                        </div>
                        <div id="close_side_menu" class="tooltip"></div>
                        <!-- End side menu -->
                    </header>
                    <div class="nav-utility">
                        <div class="manage-icons d-inline-block">
                            <ul class="d-flex justify-content-center align-items-center">
                                <li class="d-inline-block">
                                    <a id="add_search_box">
                                        <i class="lni lni-search search-sidebar-hover"></i>
                                    </a>
                                </li>
                                <li class="d-inline-block mini-menu-card">
                                    <a class="nav-link" id="add_cart_box" href="javascript:void(0)">
                                        <i class="lni lni-shopping-basket"></i>
                                        <span id="countshow" style="position: absolute; top: 3%; width: 30px; height: 20px; font-size: 15px; font-family: serif; border-radius: 50%; color: red;"><?=$allCount ?? 0;?></span>
                                    </a>
                                </li>
                                <a href="javascript:void(0)" class="d-inline-block sidemenu_btn d-block" id="sidemenu_toggle">
                                    <i class="lni lni-menu"></i>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <ul>
                        <li class="nav-item">
                            <?php
                                if (Yii::$app->user->isGuest){
                                    echo "<div style='display: flex; justfy-content: space-around;'><a class='nav-link btn btn-sm' style='padding: 7px !important; font-weight: 700;' href=".Url::to(['site/login']).">".Yii::t('app', 'login')."</a><a class='nav-link btn btn-sm' style='padding: 7px !important; font-weight: 700;' href=".Url::to(['site/signup'])."> ".Yii::t('app', 'signup')."</a></div>";
                                }else {
                                    echo
                                    Html::beginForm(['site/logout'], 'post', ['class' => 'nav-link',])
                                    . Html::submitButton(
                                        'Logout (' . Yii::$app->user->identity->username . ')',
                                        ['class' => 'btn btn-link logout nav-link', 'style' => 'text-decoration: none; color: #000; font-weight: 700;']
                                    )
                                    . Html::endForm();
                                }
                            ?>
                        </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php endif;?>