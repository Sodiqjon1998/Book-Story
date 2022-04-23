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
            'status',
            'count',
            'stars',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}',
                'contentOptions' => ['style' => 'width:110px; font-size:20px'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
