<?php

/** @var \yii\web\View $this */
/** @var string $content */
use yii\helpers\Url;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap\Modal;
use common\models\Products;
use frontend\components\Cart;



$cartProducts = Cart::products();






AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<a class="scroll-top-arrow" href="javascript:void(0);"><i class="fa fa-angle-up"></i></a>

<!--START Cart Box-->
<?=$this->render('_cart');?>
<!--END Cart Box -->

<!--LOADER-->
<div class="loader">
    <div class="loader-spinner"></div>
</div>
<!--LOADER-->

<!-- START HEADER NAVIGATION -->
<?=$this->render('_header');?>
<!-- END HEADER NAVIGATION -->



    <?= $content ?>


    
<!--footer1 sec start-->
<?=$this->render('_footer');?>
<!--foo0ter1 sec end-->

<!--START SEARCH AREA-->
<?=$this->render('_search');?>
<!--END SEARCH AREA -->




<?=

\diecoding\toastr\ToastrFlash::widget();

?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();?>

<?php Modal::begin([
    'size' => 'modal-lg',
    'options' => ['id' => 'modal_one']
]);?>


<div class="row">
    <div class="col-lg-12">
        <div id="loading"></div>
    </div>
</div>

<?php
    Modal::end();
?>
