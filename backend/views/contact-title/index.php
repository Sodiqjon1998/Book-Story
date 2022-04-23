<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\ContactTitle;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactTitleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contact Sarlavhasi');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-title-index" style="background: #fff; padding: 20px;">

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
            'toptitle', 
            'contact_title', 
            'text',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, ContactTitle $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
