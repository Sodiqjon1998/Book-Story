<?php

use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;

?>

<div class="contact-title-info-form" style="background: #fff; padding: 20px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->languageSwitcher($model); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_icon')->widget('\insolita\iconpicker\Iconpicker',[
                'iconset'=>'fontawesome',
                'clientOptions'=>['rows'=>8,'cols'=>10,'placement'=>'right'],
            ]); ?>


    <?= $form->field($model, 'email_icon')->widget('\insolita\iconpicker\Iconpicker',[
                'iconset'=>'fontawesome',
                'clientOptions'=>['rows'=>8,'cols'=>10,'placement'=>'right'],
            ]); ?>

    <?= $form->field($model, 'gipes_icon')->widget('\insolita\iconpicker\Iconpicker',[
                'iconset'=>'fontawesome',
                'clientOptions'=>['rows'=>8,'cols'=>10,'placement'=>'right'],
            ]); ?>

    <?= $form->field($model, 'tel_number')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'width: 100%;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
