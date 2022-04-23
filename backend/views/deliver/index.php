<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\DeliverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Yetkazib Berish');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deliver-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'deliver_type',
            'value',
            [
                'attribute' => 'status',
                'value' => function($model){
                    return "<a class='btn btn-info btn-md' href='".Url::to(['deliver/change', 'id' => $model->id])."'>".$model->getStatusLabel()."</a>";
                },
                'format' => 'raw',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, common\models\Deliver $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
