<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContactTitleInfo */

$this->title = Yii::t('app', 'Create Contact Title Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact Title Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-title-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
