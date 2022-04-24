<?php

use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AddInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="add-info-form" style="background: #fff; padding: 20px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->languageSwitcher($model); ?>

    <?= $form->field($model, 'first')->textInput() ?>

    <?= $form->field($model, 'last')->textInput() ?>
    
    <?= $form->field($model, 'handle')->textInput() ?>
    
    <?= $form->field($model, 'status')->widget(\kartik\switchinput\SwitchInput::class, []) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'width: 100%;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
