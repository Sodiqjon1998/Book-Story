<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CartBanner */

$this->title = Yii::t('app', 'Create Cart Banner');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cart Banners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-banner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
