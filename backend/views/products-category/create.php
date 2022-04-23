<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductsCategory */

$this->title = Yii::t('app', 'Maxsulotlar Kategorysi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Maxsulotlar Kategorysi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
