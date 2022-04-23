<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'O\'chirish'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'Mujoz',
                'value' => function($model){
                    return "<p>".$model->user->username."</p>";
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'Viloyati',
                'value' => function($model){
                    return "<p>".$model->address->region->name_uz."</p>";
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'Tumani',
                'value' => function($model){
                    return "<p>".$model->address->district->name_uz."</p>";
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'Qishlog\'i',
                'value' => function($model){
                    return "<p>".$model->address->quarters->name."</p>";
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'Telefon Raqam',
                'value' => function($model){
                    return "<p>".$model->address->phone."</p>";
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'total_sum',
                'value' => function($model){
                    return "<p>$".$model->total_sum."</p>";
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    return "<a class='btn btn-info btn-md' href='".Url::to(['order/change', 'id' => $model->id])."'>".$model->getStatusLabel()."</a>";
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'title',
                'value' => function($model){
                    return Html::a('<span class="fa fa-credit-card"></span>', ['order-item/index', 'id' =>$model->id], ['class' => 'btn btn-info btn-md']);
                },
                'format' => 'raw',
                'label' => 'Batafsil Maxsulotlar',
            ],
        ],
    ]) ?>

</div>
