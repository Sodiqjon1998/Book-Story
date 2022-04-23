<?php

use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PortfolioTitle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-title-form" style="background: #fff; padding: 20px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->languageSwitcher($model); ?>

    <?=$form->field($model, 'title')->textInput();?>

    <?=$form->field($model, 'content')->textInput();?>

    
    <?= $form->field($model, 'status')->widget(\kartik\switchinput\SwitchInput::class, []) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'width: 100%;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
