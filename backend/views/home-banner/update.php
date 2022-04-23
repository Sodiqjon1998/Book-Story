<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HomeBanner */

$this->title = Yii::t('app', 'Tahrirlash Bosh Sahifa Banneri: {name}', [
    'name' => $model->toptitle,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bosh Sahifa Banneri'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="home-banner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
