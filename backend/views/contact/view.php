<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contact-view" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'O\'chirish'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
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
                        return Html::a( "O'qildi", Url::to(['contact/view', 'id' => $data->id]), ['class' => "btn btn-danger btn-sm"]);
                    }
                    else{
                        return Html::a("O'qilmadi", Url::to(['contact/view', 'id' => $data->id]), ['class' => "btn btn-info btn-sm"]);
                    }
                },
                'filter' => [
                    '1' => "O'qilmadi",
                    '0' => "O'qildi",
                ]
            ],
        ],
    ]) ?>

</div>
