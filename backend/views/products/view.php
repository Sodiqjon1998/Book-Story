<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Maxsulotlar'), 'url' => ['products-category/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Tahrirlash'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'O\'chirish'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Rasmlar Q\'shish'), ['add-img', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'price',
            [
                'attribute' => 'category_id',
                'value' => function($model){
                    return "<span>".$model->category->title."</span>";
                },
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
