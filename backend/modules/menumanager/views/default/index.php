<?php

use kartik\tree\TreeView;
use backend\modules\menumanager\models\Menu;

$this->title = Yii::t('app', 'Menu');

$this->registerCss("
    .kv-tree li {
        line-height: normal;
        font-size: 16px;
    }
");

echo TreeView::widget([
    // single query fetch to render the tree
    'nodeView' => '@backend/modules/menumanager/views/default/_tree_menu_form.php',
    'query' => Menu::find()->addOrderBy('root, lft'),
    'fontAwesome' => true,
    'headingOptions' => ['label' => 'Categories'],
    'isAdmin' => false,                       // optional (toggle to enable admin mode)
    'displayValue' => 1,                           // initial display value
    'softDelete' => false,                        // normally not needed to change
    //'cacheSettings'   => ['enableCache' => true]      // normally not needed to change
    'mainTemplate' => '
        <div class="row">
            <div class="col-sm-5">
                {wrapper}
            </div>
            <div class="col-sm-7">
                {detail}
            </div>
        </div>',
]);


?>
