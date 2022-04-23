<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ContactTitleInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-title-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tel_icon') ?>

    <?= $form->field($model, 'email_icon') ?>

    <?= $form->field($model, 'gipes_icon') ?>

    <?= $form->field($model, 'tel_number') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
