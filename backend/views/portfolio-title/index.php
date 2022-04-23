<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PortfolioTitleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Portfolio Sarlavha');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-title-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'title',
                'content',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, common\models\PortfolioTitle $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                    'template' => '{view} {update}',
                    'contentOptions' => ['style' => 'width:150px; font-size:20px'],
                ],
            ],
        ]); ?>

    <?php Pjax::end(); ?>

</div>
