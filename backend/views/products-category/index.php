<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView as GridGridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductsCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Maxsulot Kategorysi');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-category-index" style='background: #fff; padding: 20px;'>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function ($model,$key,$index,$column) {
                    return GridGridView::ROW_COLLAPSED;
                },

                'detail' => function ($model,$key,$index,$column) {
                    // $items = $model->courseInfoes;
                    $itemsDataProvider = new \yii\data\ActiveDataProvider([
                        'query' => \common\models\Products::find()
                            ->andWhere(['category_id' => $model->id])
                    ]);

                    return Yii::$app->controller->renderPartial('_items.php',[
                        'items' => $itemsDataProvider
                    ]);
                },

            ],

            'title',
            [
                'attribute' => 'category_id',
                'label' => 'Maxsulot qo`shish',
                'value' =>function($model){
                    if($model->products){
                        return "<a href='".Url::to(['products/create', 'id' => $model->id])."'><i class='fa fa-plus' title='Maxsulot qo`shish'></i></a>";
                    }
                    else{
                        return "<a href='".Url::to(['products/create', 'id' => $model->id])."'><i class='fa fa-minus' style='color:red'  title='Maxsulot mavhud emsa maxsulot qo`shish'></i></a>";
                    }
                },
                'contentOptions' => ['style' => 'font-size: 20px'],
                'format'=>'raw'
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    if($model->status == '1'){
                        return Html::a( Yii::t('app', 'Faol'), Url::to(['products-category/change', 'id' =>$model->id]), ['class' => 'badge badge-primary badge-lg', 'style' => 'font-size: 17px']);
                    }
                    if($model->status == '0'){
                        return Html::a( Yii::t('app', 'Faol emas'), Url::to(['products-category/change', 'id' =>$model->id]), ['class' => 'badge badge-danger badge-lg', 'style' => 'font-size: 17px']);
                    }
                },
                'filter' => [
                    '1' => Yii::t('app', 'Faol'),
                    '0' => Yii::t('app', 'Faol emas'),
                ],
                'format' => 'raw',
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, common\models\ProductsCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template' => '{view} {update} {delete}',
                'contentOptions' => ['style' => 'width:150px; font-size:20px'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
