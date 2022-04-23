<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        // "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css",
        // "https://use.fontawesome.com/releases/v5.3.1/css/all.css",
        // 'dist/css/bootstrap-iconpicker.min.css',
    ];
    public $js = [
        //  "https://code.jquery.com/jquery-3.3.1.min.js",
        // "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js",
        // "dist/js/bootstrap-iconpicker.bundle.min.js",
        // "https://use.fontawesome.com/releases/v5.3.1/css/all.css",
        // "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css",
    ];
    public $depends = [
        'yii\web\YiiAsset',
    //    'yii\bootstrap4\BootstrapAsset',
    ];
}
