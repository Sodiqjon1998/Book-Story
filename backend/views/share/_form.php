<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Share */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="share-form" style="background: #fff; padding: 20px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'icon')->widget('\insolita\iconpicker\Iconpicker',[
        'iconset'=>'fontawesome',
        'clientOptions'=>['rows'=>8,'cols'=>10,'placement'=>'right'],
    ]); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(\kartik\switchinput\SwitchInput::class, []); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'width: 100%;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
