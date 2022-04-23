<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Addresses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Address'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            // 'deliver_type_id',
            // 'deliver_type_amount',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, common\models\Address $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template' => '{view} {delete}',
                'contentOptions' => ['style' => 'font-size: 20px;']
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
