<?php


namespace backend\modules\menumanager\controllers;

use backend\controllers\AsosController;
use backend\controllers\BackendController;
use backend\models\Documents;
use backend\modules\leader\models\Leadercategory;
use backend\modules\page\models\Page;
use backend\modules\post\models\Postcategory;
use common\models\Category;
use common\models\Info;
use common\models\Interactive;
use common\models\LeadershipCategory;
use common\models\PortfoliCategory;
use common\models\PortfolioIteam;
use common\models\RegionalManagementCategories;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Html;

use yii\web\Controller;

class MenuController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ]
        );
    }

    public function actionGetValue()
    {

        $options = '';

        $type = $_GET['type'];

        if ($type == 'category') {
            $options = $this->categories();
        }
        if ($type == 'leader') {
            $options = $this->leaders();
        }
        if ($type == 'portfolios') {
            $options = $this->portfolios();
        }

        if ($type == 'page') {
            $options = $this->pages();
        }
        if ($type == 'interactive_services') {
            $options = $this->interactive();
        }

        if ($type == 'c-action') {
            $options = $this->sections();
        }

        return Html::tag('select', $options, [
            'id' => 'tree-url_value',
            'class' => 'form-control',
            'name' => 'Menu[url_value]'
        ]);

    }

    private function categories()
    {

        $categories = RegionalManagementCategories::find()->all();
        $options = Html::tag('option', "Boshqarma tuzilma turini tanlang...");
        foreach ($categories as $category) {
            $options .= Html::tag('option', $category->name, ['value' => $category->id]);
        }

        return $options;
    }

    private function portfolios()
    {

        $categories = PortfoliCategory::find()->all();
        $options = Html::tag('option', "Kategoriyani tanlang");
        foreach ($categories as $category) {
            $options .= Html::tag('option', $category->title_uz, ['value' => $category->slug]);
        }

        return $options;
    }

    private function leaders()
    {

        $categories = LeadershipCategory::find()->all();
        $options = Html::tag('option', "Rahbariyat turini tanlang");
        foreach ($categories as $category) {
            $options .= Html::tag('option', $category->name, ['value' => $category->slug]);
        }
        return $options;
    }

    private function pages()
    {
        $pages = Info::find()->all();
        $options = Html::tag('option', "Ma'lumotni tanlang...");
        foreach ($pages as $page) {
            $options .= Html::tag('option', $page->title, ['value' => $page->slug]);
        }
        return $options;
    }

    private function interactive()
    {
        $interactives = Interactive::find()->all();
        $options = Html::tag('option', "Interfaol xizmatni tanlang...");
        foreach ($interactives as $page) {
            $options .= Html::tag('option', $page->title, ['value' => $page->url]);
        }
        return $options;
    }

    private function sections()
    {
        $sections = Yii::$app->getModule('menumanager')->sections();
        $options = Html::tag('option', "Sahifani tanlang ... ");
        foreach ($sections as $route => $label) {
            $options .= Html::tag('option', $label, ['value' => $route]);
        }
        return $options;
    }

}