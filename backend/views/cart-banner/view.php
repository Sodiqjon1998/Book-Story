<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CartBanner */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cart Banners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cart-banner-view" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Tahrirlash'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'img',
                'value' => function($model){
                    return Html::img($model->getImageUrl(),['width' => '80px']);
                },
                'format' => 'raw',
            ],
            'title',
            'content',
        ],
    ]) ?>

</div>
