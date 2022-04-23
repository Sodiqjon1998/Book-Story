<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PortfolioTitle */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Portfolio Sarlavha'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="portfolio-title-view">
    <div class="card">
        <div class="body" style="padding: 20px">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a(Yii::t('app', 'Taxrirlash'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'title',
                    'content',
                ],
            ]) ?>
        </div>
    </div>
</div>
