<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Map */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="map-form" style="background: #fff; padding: 20px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'map')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'width: 100%;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
