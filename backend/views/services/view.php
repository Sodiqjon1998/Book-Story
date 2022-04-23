<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Services */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Xizmatlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="services-view" style="background: #fff; padding: 20px;">

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
        <?= Html::a(Yii::t('app', 'Qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'icon',
            'title',
            'content',
            [
                'attribute' => 'status',
                'value' => function($model){
                    if($model->status == '1'){
                        return Html::a( Yii::t('app', 'Faol'), Url::to(['services/change', 'id' =>$model->id]), ['class' => 'badge badge-primary badge-lg', 'style' => 'font-size: 17px']);
                    }
                    if($model->status == '0'){
                        return Html::a( Yii::t('app', 'Faol emas'), Url::to(['services/change', 'id' =>$model->id]), ['class' => 'badge badge-danger badge-lg', 'style' => 'font-size: 17px']);
                    }
                },
                'filter' => [
                    '1' => Yii::t('app', 'Faol'),
                    '0' => Yii::t('app', 'Faol emas'),
                ],
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
