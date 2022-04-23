<?php

namespace common\models;

use zxbodya\yii2\galleryManager\GalleryBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "{{%products}}".
 *
 * @property int $id
 * @property int $price
 * @property int $category_id
 *
 * @property ProductsCategory $category
 * @property ProductsLang[] $productsLangs
 */
class Products extends \yii\db\ActiveRecord
{
    
    

    use MultilingualLabelsTrait;


    
    public static function tableName()
    {
        return '{{%products}}';
    }


    
    
    public function behaviors()
    {
        return [
            'multilingual' => [
                'class' => MultilingualBehavior::class,
                'languages' => [
                    'en' => 'English',
                    'uz' => 'Uzbek',
                ],
                'attributes' => [
                    'title'
                ]
            ],
            'galleryBehavior' => [
                'class' => GalleryBehavior::class,
                'type' => 'products',
                'extension' => 'png',
                'directory' => Yii::getAlias('@frontend/web') . '/images/product/gallery',
                'url' => Yii::getAlias('/frontend/web') . '/images/product/gallery',
                'versions' => [
                    'small' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(500, 500));
                    },
                    'medium' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 500;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ]
   
        ];
    }



    
    public function rules()
    {
        return [
            [['price', 'category_id', 'title'], 'required'],
            [['price', 'category_id', 'count', 'count_review'], 'integer'],
            [['count', 'count_review'], 'safe'],
            [['status', 'title'], 'string'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsCategory::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Maxsulot nomi'),
            'price' => Yii::t('app', 'Narxi'),
            'count' => Yii::t('app', 'Soni'),
            'count_review' => Yii::t('app', 'Izohlar Soni'),
            'category_id' => Yii::t('app', 'Kategoryasi'),
            'status' => Yii::t('app', 'Satatus'),
        ];
    }

  
    public function getCategory()
    {
        return $this->hasOne(ProductsCategory::class, ['id' => 'category_id']);
    }



    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }



    public function images($type = 'medium')
    {

        $images = [];

        foreach ($this->getBehavior('galleryBehavior')->getImages() as $image) {

            $images[] = $image->getUrl($type);
        }
        return $images;

    }

    public function image($type = 'medium')
    {
        $images = $this->images($type);

        if (empty($images)) {

            return '';
        }

        return $images[0];
    }
    





    public function addToCart($model, $son = 1){
        if(isset($_SESSION['cart'][$model->id])){
            
            $_SESSION['cart'][$model->id]['son'] += $son;
        }

        else{
            $_SESSION['cart'][$model->id] = [
                'id' => $model->id,
                'title' => $model->title,
                'sum' => $model->price,
                'img' => $model->image(),
                'son' => $son,
            ];
        }
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $model->price * $son : $model->price * $son;
        $_SESSION['cart.son'] = isset($_SESSION['cart.son']) ? $_SESSION['cart.son'] + $son : $son;
    }
    
}
