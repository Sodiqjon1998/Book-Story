<?php

use yii\helpers\Url;
use common\models\Products;

$productCategory = common\models\ProductsCategory::find()
->where(['status' => '1'])
->limit(5)
->orderBy(['id' => SORT_DESC])->all();


?>


<div class="col-12 col-lg-4 order-2 order-lg-1 sticky">
    <div id="product-filter-nav" class="product-filter-nav mb-3">
        <div class="product-category">
            <h5 class="filter-heading  text-center text-lg-left">Category</h5>
            <ul>
                
            <li><a href="<?=Url::to(['product/product-list']);?>">All Products </a><span></span></li>
                <?php foreach($productCategory as $item):?>
                    <li><a href="<?=Url::to(['product/category', 'id' => $item->id]);?>"><?=$item->title;?> </a><span>(<?=$item->getCategoryProductCount()?>)</span></li>
                <?php endforeach;?>
            </ul>
        </div>
        <form action="<?=Url::to(['product/range-price']);?>" method="GET">

            <div class="product-price mt-1">
                <h5 class="filter-heading">Shop By</h5>
                <div id="slider-range"></div>
                <p class="price-num" style="color: #0b2e13;">
                <p id="amount" class="font-lato"></p>
                <input type="hidden" id="min-p" name="min-p">
                <input type="hidden" id="max-p" name="max-p" >
            </p>
            </div>
            
            <button type="submit" class="btn yellow-color-green-gradient-btn mt-1">Filter</button>

        </form>

        <div class="product-add mt-4">
            <div class="row no-gutters">
                <div class="col-12">
                    <img src="/upload/advertisement.jpg"alt="images">
                </div>
            </div>
        </div>
    </div>
</div>



<?php



    $minPirce = Products::find()->min('price');
    $maxPrice = Products::find()->max('price');

    $js = <<< JS

    
        if ($("#slider-range").length) {
                var marginSlider = document.getElementById('slider-range');

                noUiSlider.create(marginSlider, {
                    start: [0, 500],
                    margin: 30,
                    step: 1,
                    connect: true,
                    range: {
                        'min': $minPirce,
                        'max': $maxPrice,
                    },

                });

                var marginMin = document.getElementById('min-p'),
                    marginMax = document.getElementById('max-p');
                marginSlider.noUiSlider.on('update', function (values, handle) {
                        var str_min = values[0];
                        var str_max=values[1];
                        var res_min = str_min.split(".");
                        var res_max = str_max.split(".");
                        $( "#max-p" ).val(res_max[0]);
                        $( "#min-p" ).val(res_min[0]);
                        $( "#amount" ).html( "Price : $" + res_min[ 0 ] + " - $" + res_max[ 0] );

                });
            }

    JS;

    $this->registerJs($js);

?>