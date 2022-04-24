<?php

use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectDes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-des-form" style="background: #fff; padding: 20px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->languageSwitcher($model); ?>

    <?= $form->field($model, 'content')->widget ( CKEditor :: class,[
        'editorOptions' => [
            'preset' => 'basic' , //designed default settings basic, standard, full this feature is not required to use 
            'inline' => false , // false by default
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'width: 100%;s']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
