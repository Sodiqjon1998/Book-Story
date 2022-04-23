<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CartBannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Xarti Savatchasi');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-banner-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cart Banner'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'title',
                'content',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, common\models\CartBanner $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    <?php Pjax::end(); ?>

</div>
