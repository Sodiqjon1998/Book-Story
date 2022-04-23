<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Contact;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'first_name',
            'last_name',
            'email:email',
            'subject',
            'message:ntext',
            'date',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data){
                    if($data->status == '0'){
                        return Html::a( "O'qildi", Url::to(['contact/view', 'id' => $data->id]), ['class' => "btn btn-info btn-sm"]);
                    }
                    else{
                        return Html::a("O'qilmadi", Url::to(['contact/view', 'id' => $data->id]), ['class' => "btn btn-danger btn-sm"]);
                    }
                },
                'filter' => [
                    '1' => "O'qilmadi",
                    '0' => "O'qildi",
                ]
            ],
            [
                'class' => ActionColumn::className(),
                // 'urlCreator' => function ($action, Contact $model, $key, $index, $column) {
                //     return Url::toRoute([$action, 'id' => $model->id]);
                // }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
