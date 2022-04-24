<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AddInfo */

$this->title = Yii::t('app', 'Create Add Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="add-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
