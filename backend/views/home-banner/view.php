<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\HomeBanner */

$this->title = 'Bosh Sahifa Banneri';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bosh Sahifa Banneri'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="home-banner-view" style="padding: 20px; background: #fff;">
    <div class="card">
        <div class="body" style="padding: 20px">
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
                    'toptitle',
                    [
                        'attribute' => 'title',
                        'format' => 'raw',
                    ],
                    'btn',
                ],
            ]) ?>
        </div>
    </div>
</div>
