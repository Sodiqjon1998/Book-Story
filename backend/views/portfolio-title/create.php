<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PortfolioTitle */

$this->title = Yii::t('app', 'Qo\'shish Portfolio Sarlavha');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Portfolio Sarlavha'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-title-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
