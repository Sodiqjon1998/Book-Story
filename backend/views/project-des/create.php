<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectDes */

$this->title = Yii::t('app', 'Create Project Des');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Project Des'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-des-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
