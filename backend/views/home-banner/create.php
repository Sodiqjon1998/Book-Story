<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HomeBanner */

$this->title = Yii::t('app', 'Create Home Banner');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Home Banners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-banner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
