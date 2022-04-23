<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

// $this->title = 'Signup';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup" style="padding: 180px;">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5" style="border: solid #e1e1e1 1px; border-radius: 10px; padding: 20px">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
