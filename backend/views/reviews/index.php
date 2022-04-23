<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Reviews;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ReviewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Reviews');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviews-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'product_id',
            'name',
            'email:email',
            'your_review:ntext',
            // 'created_at',
            // 'updated_at',
            'count',
            'stars',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data){
                    if($data->status == 0){
                        return Html::a( "O'qildi", Url::to(['reviews/view', 'id' => $data->id]), ['class' => "btn btn-info btn-sm"]);
                    }
                    else{
                        return Html::a("O'qilmadi", Url::to(['reviews/view', 'id' => $data->id]), ['class' => "btn btn-danger btn-sm"]);
                    }
                },
                'filter' => [
                    '1' => "O'qilmadi",
                    '0' => "O'qildi",
                ]
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}',
                'contentOptions' => ['style' => 'width:110px; font-size:20px'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
