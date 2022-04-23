<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\ContactTitleInfo;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactTitleInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contact Ma\'lumoti');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-title-info-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title); ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Contact Ma\'lumoti'), ['create'], ['class' => 'btn btn-success']); ?>
    </p>

    <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'title',
                'address',
                'tel_icon',
                'email_icon:email',
                'gipes_icon',
                'tel_number',
                'email:email',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, ContactTitleInfo $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    <?php Pjax::end(); ?>

</div>
