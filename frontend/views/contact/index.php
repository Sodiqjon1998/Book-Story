<?php

$this->title = "Contact";


use yii\bootstrap4\ActiveForm;
use common\models\ContactTitle;
use common\models\ContactTitleInfo;
use common\models\Map;

$contactTitle = ContactTitle::find()->one();

$contactTitleInfo = ContactTitleInfo::find()->one();

$map = Map::find()->one();


?>




<!--Slider Start-->
<div class="map-load">
    <div id="map">
        <?=$map->map;?>
    </div>
</div>
<!--Slider End-->

<!-- Contact Us Start -->
<section class="contact-sec" id="contact-sec">

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 contact-description wow slideInLeft" data-wow-delay=".8s">
                <div class="contact-detail wow fadeInLeft">
                    <div class="ex-detail">
                        <span class="fly-text"><?=$contactTitle->toptitle;?></span>
                        <h4 class="large-heading">
                            <span class="heading-1"><?=$contactTitle->title;?></span>
                        </h4>
                    </div>
                    <p class="small-text text-center text-md-left">
                    <?=$contactTitle->text;?>
                    </p>
                    <div class="row location-details text-center text-md-left">
                        <div class="col-12 col-md-6 country-1">
                            <h4 class="heading-text text-left"><?=$contactTitleInfo->title;?></h4>
                            <ul>
                                <li><i class="fas fa-mobile-alt"></i><a href="#">+(34) <?=$contactTitleInfo->tel_number;?></a></li>
                                <li><i class="fas fa-envelope"></i><a href="#"><?=$contactTitleInfo->email_icon;?></a></li>
                                <li><i class="fas fa-map-marker"></i><a href="#"><?=$contactTitleInfo->gipes_icon;?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 contact-box text-center text-md-left wow slideInRight" data-wow-delay=".8s">
                <div class="c-box wow fadeInRight">
                    <h4 class="small-heading"><?=$contactTitle->contact_title;?></h4>
                    <?php $form = ActiveForm::begin(['class' => 'contact-form', 'id' => 'contact-form-data']);?>
                        <div class="row my-form">
                            <div class="col-md-12 col-sm-12">
                                <div id="result"></div>
                            </div>
                            <div class="col-12 col-md-6">
                                <?= $form->field($contact, 'first_name')->textInput(['placeholder' => 'First Name', 'class' => 'form-control', 'id' => 'candidate_fname', 'style' => 'height: 42px; border-radius: 10px; color: #eee; font-weight: 100; font-size: 14px; font-family: sans-serif;'])->label(false);?>
                            </div>
                            <div class="col-12 col-md-6">
                                <?= $form->field($contact, 'last_name')->textInput(['placeholder' => 'Last Name', 'class' => 'form-control', 'id' => 'candidate_lname', 'style' => 'height: 42px; border-radius: 10px; color: #eee; font-weight: 100; font-size: 14px; font-family: sans-serif;'])->label(false);?>
                            </div>
                            <div class="col-12 col-md-6">
                                <?= $form->field($contact, 'email')->textInput(['placeholder' => 'Email', 'class' => 'form-control', 'id' => 'user_email', 'style' => 'height: 42px; border-radius: 10px; color: #eee; font-weight: 100; font-size: 14px; font-family: sans-serif;'])->label(false);?>
                            </div>
                            <div class="col-12 col-md-6">
                                <?= $form->field($contact, 'subject')->textInput(['placeholder' => 'Subject', 'class' => 'form-control', 'id' => 'user_subject', 'style' => 'height: 42px; border-radius: 10px; color: #eee; font-weight: 100; font-size: 14px; font-family: sans-serif;'])->label(false);?>
                            </div>
                            <div class="col-12">
                                <?= $form->field($contact, 'message')->textarea(['placeholder' => 'Message', 'class' => 'form-control', 'id' => 'user_message', 'rows' => 7, 'style' => 'height: 42px; border-radius: 10px; color: grey !important; font-weight: 100; font-size: 14px; font-family: sans-serif; height: 170px; padding: 15px;'])->label(false);?>
                            </div>
                            <div class="col-12">
                                <button class="btn green-color-yellow-gradient-btn user-contact contact_btn" type="submit">SUBMIT
                                </button>
                            </div>
                        </div>
                    <?php ActiveForm::end();?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us End -->