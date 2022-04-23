<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContactTitle */

$this->title = Yii::t('app', 'Create Contact Title');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact Titles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-title-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
