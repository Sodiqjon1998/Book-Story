<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

// $this->title = Yii::t('app', 'Maxsulotlar');
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index" style="background: #fff; padding: 20px;">

<h1><?= Html::encode($this->title) ?></h1>

<?php Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $items,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            [
                'attribute' => 'title',
                'value' => function($model){
                    return Html::a('<span class="fa fa-image"></span>', ['products/add-img', 'id' =>$model->id], ['class' => 'btn btn-info btn-md']);
                },
                'format' => 'raw',
                'label' => 'Rasimlar',
            ],
            'price',
            [
                'attribute' => 'status',
                'value' => function($model){
                    if($model->status == '1'){
                        return Html::a( Yii::t('app', 'Faol'), Url::to(['products/change', 'id' =>$model->id]), ['class' => 'badge badge-primary badge-lg', 'style' => 'font-size: 17px']);
                    }
                    if($model->status == '0'){
                        return Html::a( Yii::t('app', 'Faol emas'), Url::to(['products/change', 'id' =>$model->id]), ['class' => 'badge badge-danger badge-lg', 'style' => 'font-size: 17px']);
                    }
                },
                'filter' => [
                    '1' => Yii::t('app', 'Faol'),
                    '0' => Yii::t('app', 'Faol emas'),
                ],
                'format' => 'raw'
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, \common\models\Products $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template' => '{view} {update} {delete}',
                'contentOptions' => ['style' => 'width:150px; font-size:20px'],
                'buttons' => [
                    'delete' => function($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['products/delete', 'id' =>$model->id], [
                            // 'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'O\'chirish',
                                'method' => 'post'
                            ]
                        ]);
                    },
                    'view' => function($url, $model){
                        return Html::a('<span class="fa fa-eye"></span>', ['products/view', 'id' =>$model->id]);
                    },

                    'update' => function($url, $model){
                        return Html::a('<span class="fa fa-edit"></span>', ['products/update', 'id' =>$model->id],);
                    },
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>

</div>