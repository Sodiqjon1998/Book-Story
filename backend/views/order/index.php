<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Order;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Buyurtmalar');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="order-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {delete}',
                'contentOptions' => ['style' => 'font-size: 20px;'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
