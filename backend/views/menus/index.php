<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\MenusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menular');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menus-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'home',
                'books',
                'product_list',
                'contact',
                'lang',
                [
                    'class' => ActionColumn::className(),
                    'template' => '{view} {delete}',
                    'contentOptions' => ['style' => 'font-size: 20px;'],
                ],
            ],
        ]); ?>

    <?php Pjax::end(); ?>

</div>
