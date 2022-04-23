<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Address */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="address-view" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
                'attribute' => 'region_id',
                'value' => function($model){
                    return "<p class='btn btn-info btn-md'>".$model->region->name_uz."</p>";
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'district_id',
                'value' => function($model){
                    return "<p class='btn btn-info btn-md'>".$model->district->name_uz."</p>";
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'quarters_id',
                'value' => function($model){
                    return "<p class='btn btn-info btn-md'>".$model->quarters->name."</p>";
                },
                'format' => 'raw',
            ],
            'bosting',
            'phone',
            'created_at',
            'updated_at',
            'deliver_type_id',
            'deliver_type_amount',
            'status',
        ],
    ]) ?>

</div>
