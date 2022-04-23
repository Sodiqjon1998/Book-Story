<?php

use common\models\Services;

$services = Services::find()
->where(['status' => '1'])
->all();


?>



<!--START OUR SERVICES-->
<div class="our-services">
    <div class="container">
        <div class="row">

            <?php foreach($services as $item):?>
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="service">
                        <div class="media">
                            <div class="service-card">
                                <i class="fa <?=$item->icon;?> mr-3"></i>
                                <div class="media-body">
                                    <h5 class="mt-0"><?=$item->title;?></h5>
                                    <span><?=$item->content;?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>

        </div>
    </div>
</div>
<!--END OUR SERVICES-->