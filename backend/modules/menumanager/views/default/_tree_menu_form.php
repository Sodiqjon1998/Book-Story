<?php
/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2015 - 2018
 * @package   yii2-tree-manager
 * @version   1.1.1
 */


use kartik\form\ActiveForm;
use kartik\tree\Module;
use kartik\tree\TreeView;
use kartik\tree\models\Tree;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\models\SourceMessage;
use yii\web\View;

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

mihaildev\elfinder\Assets::noConflict($this);
/**
 * @var View $this
 * @var Tree $node
 * @var ActiveForm $form
 * @var array $formOptions
 * @var string $keyAttribute
 * @var string $nameAttribute
 * @var string $iconAttribute
 * @var string $iconTypeAttribute
 * @var array|string $iconsList
 * @var string $formAction
 * @var array $breadcrumbs
 * @var array $nodeAddlViews
 * @var mixed $currUrl
 * @var boolean $isAdmin
 * @var boolean $showIDAttribute
 * @var boolean $showNameAttribute
 * @var boolean $showFormButtons
 * @var boolean $allowNewRoots
 * @var string $nodeSelected
 * @var string $nodeTitle
 * @var string $nodeTitlePlural
 * @var array $params
 * @var string $keyField
 * @var string $nodeView
 * @var string $nodeAddlViews
 * @var array $nodeViewButtonLabels
 * @var string $noNodesMessage
 * @var boolean $softDelete
 * @var string $modelClass
 * @var string $defaultBtnCss
 * @var string $treeManageHash
 * @var string $treeSaveHash
 * @var string $treeRemoveHash
 * @var string $treeMoveHash
 */
?>

<?php
/**
 * SECTION 1: Initialize node view params & setup helper methods.
 */
?>
<?php
extract($params);
$session = Yii::$app->has('session') ? Yii::$app->session : null;
$resetTitle = Yii::t('kvtree', 'Reset');
$submitTitle = Yii::t('kvtree', 'Save');
// $showFormButtons=true;

// parse parent key
if ($node->isNewRecord) {
    $parentKey = empty($parentKey) ? '' : $parentKey;
} elseif (empty($parentKey)) {
    $parent = $node->parents(1)->one();
    $parentKey = empty($parent) ? '' : Html::getAttributeValue($parent, $keyAttribute);
}

/** @var Module $module */
$module = TreeView::module();

// active form instance
$form = ActiveForm::begin(['action' => $formAction, 'options' => $formOptions]);

// helper function to show alert
$showAlert = function ($type, $body = '', $hide = true) {
    $class = "alert alert-{$type}";
    if ($hide) {
        $class .= ' hide';
    }
    return Html::tag('div', '<div>' . $body . '</div>', ['class' => $class]);
};

// helper function to render additional view content
$renderContent = function ($part) use ($nodeAddlViews, $params, $form) {
    if (empty($nodeAddlViews[$part])) {
        return '';
    }
    $p = $params;
    $p['form'] = $form;
    return $this->render($nodeAddlViews[$part], $p);
};

// node identifier
$id = $node->isNewRecord ? null : $node->$keyAttribute;
// breadcrumbs
if (array_key_exists('depth', $breadcrumbs) && $breadcrumbs['depth'] === null) {
    $breadcrumbs['depth'] = '';
} elseif (!empty($breadcrumbs['depth'])) {
    $breadcrumbs['depth'] = (string)$breadcrumbs['depth'];
}
// icons list
$icons = is_array($iconsList) ? array_values($iconsList) : $iconsList;
?>

<?php
/**
 * SECTION 2: Initialize hidden attributes. In case you are extending this and creating your own view, it is mandatory
 * to set all these hidden inputs as defined below.
 */
?>
<?= Html::hiddenInput('nodeTitle', $nodeTitle) ?>
<?= Html::hiddenInput('nodeTitlePlural', $nodeTitlePlural) ?>
<?= Html::hiddenInput('treeNodeModify', $node->isNewRecord) ?>
<?= Html::hiddenInput('parentKey', $parentKey) ?>
<?= Html::hiddenInput('currUrl', $currUrl) ?>
<?= Html::hiddenInput('modelClass', $modelClass) ?>
<?= Html::hiddenInput('nodeSelected', $nodeSelected) ?>

<?php
/**
 * SECTION 3: Hash signatures to prevent data tampering. In case you are extending this and creating your own view, it
 * is mandatory to include this section below.
 */
?>
<?= Html::hiddenInput('treeManageHash', $treeManageHash) ?>
<?= Html::hiddenInput('treeRemoveHash', $treeRemoveHash) ?>
<?= Html::hiddenInput('treeMoveHash', $treeMoveHash) ?>
<?php
/**
 * BEGIN VALID NODE DISPLAY
 */
?>
<?php if (!$node->isNewRecord || !empty($parentKey)): ?>
    <?php
    $isAdmin = ($isAdmin == true || $isAdmin === "true"); // admin mode flag
    $inputOpts = [];                                      // readonly/disabled input options for node
    $flagOptions = ['class' => 'kv-parent-flag'];         // node options for parent/child

    /**
     * the primary key input field
     */
    if ($showIDAttribute) {
        $options = ['readonly' => true];
        if ($node->isNewRecord) {
            $options['value'] = Yii::t('kvtree', '(new)');
        }
        $keyField = $form->field($node, $keyAttribute)->textInput($options);
    } else {
        $keyField = Html::activeHiddenInput($node, $keyAttribute);
    }

    /**
     * initialize for create or update
     */
    $depth = ArrayHelper::getValue($breadcrumbs, 'depth', '');
    $glue = ArrayHelper::getValue($breadcrumbs, 'glue', '');
    $activeCss = ArrayHelper::getValue($breadcrumbs, 'activeCss', '');
    $untitled = ArrayHelper::getValue($breadcrumbs, 'untitled', '');
    $name = $node->getBreadcrumbs($depth, $glue, $activeCss, $untitled);
    if ($node->isNewRecord && !empty($parentKey) && $parentKey !== TreeView::ROOT_KEY) {
        /**
         * @var Tree $modelClass
         * @var Tree $parent
         */
        if (empty($depth)) {
            $depth = null;
        }
        if ($depth === null || $depth > 0) {
            $parent = $modelClass::findOne($parentKey);
            $name = $parent->getBreadcrumbs($depth, $glue, null) . $glue . $name;
        }
    }
    if ($node->isReadonly()) {
        $inputOpts['readonly'] = true;
    }
    if ($node->isDisabled()) {
        $inputOpts['disabled'] = true;
    }
    if ($node->isLeaf()) {
        $flagOptions['disabled'] = true;
    }

    $nameField = $showNameAttribute ? $form->field($node, $nameAttribute)->textInput($inputOpts) : '';
    ?>
    <?php
    /**
     * SECTION 4: Setup form action buttons.
     */
    ?>
    <div class="kv-detail-heading">

        <div class="float-right pull-right">
            <?= Html::resetButton(
                ArrayHelper::getValue($nodeViewButtonLabels, 'reset', $resetTitle),
                ['class' => 'btn ' . $defaultBtnCss, 'title' => $resetTitle]
            ) ?>
            <?= Html::submitButton(
                ArrayHelper::getValue($nodeViewButtonLabels, 'submit', $submitTitle),
                ['class' => 'btn btn-primary', 'title' => $submitTitle]
            ) ?>
        </div>

        <div class="kv-detail-crumbs"><?= $name ?></div>
        <div class="clearfix"></div>
    </div>

    <?php
    /**
     * SECTION 5: Setup alert containers. Mandatory to set this up.
     */
    ?>

    <?php
    /**
     * SECTION 6: Additional views part 1 - before all form attributes.
     */
    ?>
    <?php
    echo $renderContent(Module::VIEW_PART_1);
    ?>

    <?php
    /**
     * SECTION 7: Basic node attributes for editing.
     */
    ?>
    <?php if ($iconsList == 'text' || $iconsList == 'none'): ?>
        <?php if ($showIDAttribute && $showNameAttribute): ?>
            <div class="row">
                <div class="" style="display: none">
                    <?= $keyField ?>
                </div>
                <div class="col-sm-12">
                    <?= $nameField ?>
                </div>
            </div>
        <?php else: ?>
            <?= $keyField ?>
            <?= $nameField ?>
        <?php endif; ?>
        <?php if ($iconsList === 'text'): ?>
            <div class="row">
                <div class="col-sm-4" style="display: none">
                    <?= $form->field($node, $iconTypeAttribute)->dropdownList([
                        TreeView::ICON_CSS => 'CSS Suffix',
                        TreeView::ICON_RAW => 'Raw Markup',
                    ], $inputOpts) ?>
                </div>
                <div class="col-sm-8" style="display: none">
                    <? //= $form->field($node, $iconAttribute)->textInput($inputOpts) ?>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="hidden">
                    <?= $keyField ?>
                </div>
                <?= Html::activeHiddenInput($node, $iconTypeAttribute) ?>
                <?= $nameField ?>
            </div>
        </div>
    <?php endif; ?>

    <?php
    /**
     * SECTION 8: Additional views part 2 - before admin zone.
     */
    ?>
    <?= $renderContent(Module::VIEW_PART_2) ?>

    <?php
    /**
     * SECTION 9: Administrator attributes zone.
     */
    ?>
    <?php if ($isAdmin): ?>
        <h4><?= Yii::t('kvtree', 'Admin Settings') ?></h4>

        <?php
        /**
         * SECTION 10: Additional views part 3 - within admin zone BEFORE mandatory attributes.
         */
        ?>
        <?= $renderContent(Module::VIEW_PART_3) ?>

        <?php
        /**
         * SECTION 11: Default mandatory admin controlled attributes.
         */
        ?>
        <div class="row">
            <div class="col-sm-4">
                <?= $form->field($node, 'active')->checkbox() ?>
                <?= $form->field($node, 'visible')->checkbox() ?>
                <?= $form->field($node, 'readonly')->checkbox() ?>
                <?= $form->field($node, 'disabled')->checkbox(['uncheck' => 0, 'checked' => 1]) ?>
                <?= $form->field($node, 'child_allowed')->checkbox(['value' => 1]) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($node, 'selected')->checkbox() ?>
                <?= $form->field($node, 'collapsed')->checkbox($flagOptions) ?>
                <?= $form->field($node, 'removable')->checkbox() ?>
                <?= $form->field($node, 'removable_all')->checkbox($flagOptions) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($node, 'movable_u')->checkbox() ?>
                <?= $form->field($node, 'movable_d')->checkbox() ?>
                <?= $form->field($node, 'movable_l')->checkbox() ?>
                <?= $form->field($node, 'movable_r')->checkbox() ?>
            </div>
        </div>

        <?php
        /**
         * SECTION 12: Additional views part 4 - within admin zone AFTER mandatory attributes.
         */
        ?>
        <?= $renderContent(Module::VIEW_PART_4) ?>
    <?php endif; ?>
    <?php
    /**
     * SECTION 13: Additional views part 5 accessible by all users after admin zone.
     */
    ?>
    <div class="row">

        <?php if ($node->lvl == 0): ?>
            <?php if (!$node->isNewRecord): ?>
                <div class="col-sm-6">
                    <?php if ($node->url_str == ''): ?>
                        <?= $form->field($node, 'url_str') ?>
                    <?php else: ?>
                        <?= $form->field($node, 'url_str')->textInput(['readonly' => true]) ?>
                    <?php endif ?>
                </div>
            <?php endif ?>
        <?php endif ?>


        <div class="col-sm-12">
            <?= $form->field($node, 'title_uz') ?>
            <?= $form->field($node, 'title_ru') ?>
            <?= $form->field($node, 'title_en') ?>
        </div>
        <div class="col-sm-12">

            <?= $form->field($node, 'status')->widget(\kartik\switchinput\SwitchInput::classname(), [

                'pluginOptions' => [

                    'onText' => Yii::t('app', 'Active'),

                    'offText' => Yii::t('app', 'Inactive'),
                ],

            ]); ?>
        </div>
        <br><br>
        <input type="hidden" id="menuUrl" value="<?= Yii::$app->urlManager->createUrl('menumanager/menu/get-value') ?>">
        <div class="col-sm-12 col-md-4">
            <?= $form->field($node, 'url_type')->dropDownList([

                'main' => "Bosh sahifa",
                'category' => "Hududiy boshqarma tuzilmasini tanlang",
                'interactive_services' => "Interfaol xizmatlar",
                'page' => "Ma'lumotlar",
                'leader' => "Rahbariyat",
                'privatization' => "Xususiylashtirish",
                'c-action' => "Sayt bo'limlari",
                'other' => "Boshqa",

            ], ['prompt' => Html::encode(Yii::t('app', 'Select a url type')), 'onchange' => '
                            
                   var t =  $(this).val()
                    var mv = $("#menu-value")
                    var menu_url = $("#menuUrl").val()

                    if(t === "main") { 
                        mv.html("<input type=text readonly  value=index id=tree-url_value class=form-control name=Menu[url_value]>") 
                    }
                    else if(t === "all_catalog") { 
                        mv.html("<input type=text readonly  value=\'' . Yii::t('app', "List all catalogs") . ' \'id=tree-url_value class=form-control name=Menu[url_value]>") 
                    }
                    else if(t === "other") {
                        mv.html("<input type=text autofocus value=\'#\' id=tree-url_value class=form-control name=Menu[url_value]>") 
                    }
                     else if(t === "regions") {
                        mv.html("<input type=text autofocus value=\'site\regions\' id=tree-url_value class=form-control name=Menu[url_value]>") 
                    }
                     else if(t === "privatization") {
                        mv.html("<input type=text autofocus value=\'site\regions\' id=tree-url_value class=form-control name=Menu[url_value]>") 
                    }
                    else if (t === "category" || t === "leader"  || t === "interactive_services"  || t === "departments" ||  t === "page"|| t === "faculty"|| t == "catalog" || t == "sub_catalog" || t == "c-action"){
                        $.ajax({
                            url: menu_url,
                            data: {type:t},
                            type: "get",
                            success: function (result){
                                mv.html(result)
                            },
                            error: function(result){
                                console.log(result);
                            }
                        })
                    }
                    else{
                        mv.html("<input type=text value autofocus id=tree-url_value class=form-control name=Menu[url_value]>") 
                    }
                  ']) ?>
        </div>

        <div class="col-sm-12 col-md-8">
            <div class="form-group highlight-addon field-tree-url_value">
                <label class="control-label has-star" for="tree-url_value"><?= Yii::t('app', 'Url Value') ?></label>
                <div id="menu-value">
                    <!-- <input type="text" value="<?= $node->url_value ?>" id="tree-url_value" class="form-control" name="Menu[url_value]"> -->
                    <?php
                    if ($node->url_type == 'category')
                        echo $form->field($node, 'url_value')->dropdownList(ArrayHelper::map(\common\models\RegionalManagementCategories::find()->all(), 'id', 'name_uz'))->label(false);
                    elseif ($node->url_type == 'page')
                        echo $form->field($node, 'url_value')->dropdownList(ArrayHelper::map(\common\models\Info::find()->all(), 'slug', 'title_uz'))->label(false);
                    elseif ($node->url_type == 'interactive_services')
                        echo $form->field($node, 'url_value')->dropdownList(ArrayHelper::map(\common\models\Interactive::find()->all(), 'url', 'title_uz'))->label(false);
                    elseif ($node->url_type == 'c-action')
                        echo $form->field($node, 'url_value')->dropdownList(
                            Yii::$app->getModule('menumanager')->sections(), ['prompt' => "Sahifani tanlang ..."])->label(false);
                    elseif ($node->url_type == 'main')
                        echo $form->field($node, 'url_value')->textInput(['readonly' => true])->label(false);
                    else
                        echo $form->field($node, 'url_value')->textInput(['autofocus' => true])->label(false);
                    ?>
                </div>

            </div>
        </div>


    </div>
    <?= $renderContent(Module::VIEW_PART_5) ?>
<?php else: ?>
    <?= $noNodesMessage ?>
<?php endif; ?>
<?php
/**
 * END VALID NODE DISPLAY
 */
?>
<?php ActiveForm::end(); ?>

