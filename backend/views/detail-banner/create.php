<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DetailBanner */

$this->title = Yii::t('app', 'Create Detail Banner');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detail Banners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-banner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
