<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\HomeBanner;
/* @var $this yii\web\View */
/* @var $searchModel common\models\HomeBannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bosh Sahifa Banneri');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-banner-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bosh Sahifa Banneri'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
            'toptitle',
            [
                'attribute' => 'title',
                'format' => 'raw',
            ],
            'btn',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, HomeBanner $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template' => '{view} {update}',
                'contentOptions' => ['style' => 'width:150px; font-size:20px'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
