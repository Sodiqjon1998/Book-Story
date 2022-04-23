<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = Yii::t('app', 'Maxsulotlar qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Maxsulotlar kategoryasi'), 'url' => ['products-category/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
