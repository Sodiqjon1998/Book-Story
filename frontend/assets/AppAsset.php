<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "vendor/css/bundle.min.css",
        "vendor/css/jquery.fancybox.min.css",
        "vendor/css/owl.carousel.min.css",
        "vendor/css/swiper.min.css",
        "vendor/css/cubeportfolio.min.css",
        "vendor/css/wow.css",
        "vendor/css/LineIcons.min.css",
        "book-shop/css/nouislider.min.css",
        "book-shop/css/range-slider.css",
        "book-shop/css/settings.css",
        "book-shop/css/megamenu.css",
        "book-shop/css/style.css",
        "book-shop/css/custom.css",
    ];
    public $js = [
        
        "vendor/js/jquery.fancybox.min.js",
        "vendor/js/owl.carousel.min.js",
        "vendor/js/swiper.min.js",
        "vendor/js/jquery.cubeportfolio.min.js",
        "vendor/js/wow.min.js",
        "vendor/js/bootstrap-input-spinner.js",
        "vendor/js/parallaxie.min.js",
        "vendor/js/stickyfill.min.js",
        "book-shop/js/nouislider.min.js",
        "vendor/js/jquery.themepunch.tools.min.js",
        "vendor/js/jquery.themepunch.revolution.min.js",
        "vendor/js/extensions/revolution.extension.actions.min.js",
        "vendor/js/extensions/revolution.extension.carousel.min.js",
        "vendor/js/extensions/revolution.extension.kenburn.min.js",
        "vendor/js/extensions/revolution.extension.layeranimation.min.js",
        "vendor/js/extensions/revolution.extension.migration.min.js",
        "vendor/js/extensions/revolution.extension.navigation.min.js",
        "vendor/js/extensions/revolution.extension.parallax.min.js",
        "vendor/js/extensions/revolution.extension.slideanims.min.js",
        "vendor/js/extensions/revolution.extension.video.min.js",
        "book-shop/js/script.js",
        "book-shop/js/ajax.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',    
    ];
}
