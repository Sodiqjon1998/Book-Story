<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CartBannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Xarti Savatcha Banner');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-banner-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'img',
                    'value' => function($model){
                        return Html::img($model->getImageUrl(),['width' => '80px']);
                    },
                    'format' => 'raw',
                ],
                'title',
                'content',
                [
                    'class' => ActionColumn::className(),
                    'template' => '{view} {update}',
                    'contentOptions' => ['style' => 'font-size: 20px;'],
                ],
            ],
        ]); ?>

    <?php Pjax::end(); ?>

</div>
