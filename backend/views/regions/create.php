<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Regions */

$this->title = Yii::t('app', 'Create Regions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
