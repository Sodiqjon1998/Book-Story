<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\DistrictsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tumanlar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="districts-index" style="background: #fff; padding: 20px;">

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

                [
                    'attribute' => 'region_id',
                    'value' => function($model){
                        return Html::a($model->region->name_uz, Url::to(['regions/index']), ['class' => 'btn btn-success btn-md']);
                    },
                    'format' => 'raw',
                ],
                'name_uz',
                'name_oz',
                'name_ru',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, common\models\Districts $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    <?php Pjax::end(); ?>

</div>
