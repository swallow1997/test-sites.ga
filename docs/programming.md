## Верхнее и нижнее меню сайта

[Документация по виджету](https://docs.cms.skeeks.com/en/latest/quickstart.html#skeeks-cms-cmswidgets-treemenu-treemenucmswidget)

 * Поставить виджет в шаблон где необходимо меню

```php
<?= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
    'namespace' => 'footer-menu',
    'viewFile' => '@app/views/widgets/TreeMenuCmsWidget/menu-top',
    //'label' => 'Title menu',
    'level' => 1,
    'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
]); ?>
```

 * Содержимое шаблона ``@app/views/widgets/TreeMenuCmsWidget/menu-top``

```php
<?php
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget */
/* @var $trees  \skeeks\cms\models\Tree[] */
?>
<ul>
    <? if ($trees = $widget->activeQuery->all()) : ?>
        <? foreach ($trees as $tree) : ?>
            <li><a href="<?= $tree->url; ?>" title="<?= $tree->name; ?>"><?= $tree->name; ?></a></li>
        <? endforeach; ?>
    <? endif; ?>
</ul>
```

[Смотреть видео](https://youtu.be/N8jXegwP6O0)


## Вложенное меню каталога

[Документация по виджету](https://docs.cms.skeeks.com/en/latest/quickstart.html#skeeks-cms-cmswidgets-treemenu-treemenucmswidget)

 * Поставить виджет в шаблон где необходимо меню
```php
<?= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
    'namespace' => 'catalog-menu',
    'viewFile' => '@app/views/widgets/TreeMenuCmsWidget/catalog-menu',
    //'label' => 'Title menu',
    //'level' => 1,
    //'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
]); ?>
```

* Содержимое шаблона ``@app/views/widgets/TreeMenuCmsWidget/catalog-menu``

```php
<?php
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget */
/* @var $trees  \skeeks\cms\models\Tree[] */
?>
<ul class="menu">
    <? if ($trees = $widget->activeQuery->all()) : ?>
        <? foreach ($trees as $tree) : ?>
            <li class="menu__item">
                <a href="<?= $tree->url; ?>" title="<?= $tree->name; ?>"><?= $tree->name; ?></a>
                <? if ($tree->children) : ?>
                     <ul class="sub-menu">
                         <? foreach ($tree->children as $childTree) : ?>
                             <li class="sub-menu__item">
                                 <a href="<?= $childTree->url; ?>" title="<?= $childTree->name; ?>"><?= $childTree->name; ?></a>
                             </li>
                         <? endforeach; ?>
                      </ul>
                <? endif; ?>
            </li>
        <? endforeach; ?>
    <? endif; ?>
</ul>
```

[Смотреть видео](https://youtu.be/YLLs3bQ8yO0)


## Редкатируемые области

[Документация по виджету](https://docs.cms.skeeks.com/en/latest/quickstart.html#skeeks-cms-cmswidgets-text-textcmswidget)

Для управления блоками текста на сайте, в шапке и в футере

```php
<? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('home-text'); ?>
  <h1>Добро пожаловать!</h1>
<? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>
```

[Смотреть видео](https://youtu.be/DXyqOk-A6q8)


## Слайдер

Создать контент — слайды
В место слайдера вставить виджет:

```php
<?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
    'namespace' => 'home-slides',
    'viewFile' => '@app/views/widgets/ContentElementsCmsWidget/slides',
]); ?>
```

[Смотреть видео](https://youtu.be/YZQ0EXnF3y8)

## Блок "новости"

Создать контент — новости
Создать раздел новости
Настроить главный раздел для новостей (соответствующий новости)
В место слайдера вставить виджет:

```php
<?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
    'namespace' => 'home-news',
    'label'     => 'Новости компании',
    'viewFile'  => '@app/views/widgets/ContentElementsCmsWidget/home-news',
]); ?>
```

[Смотреть видео](https://youtu.be/fmsvJ7QJpjA)


## Текстовый раздел + хлебные крошки


Привести шаблон к виду шаблона исходной верстки ``\frontend\templates\default\modules\cms\tree\text.php``

Виджет хлебных крошек:

```php
<?= \skeeks\cms\cmsWidgets\breadcrumbs\BreadcrumbsCmsWidget::widget([
    'viewFile'       => '@app/views/widgets/BreadcrumbsCmsWidget/default',
]); ?>
```

Шаблон ``@app/views/widgets/BreadcrumbsCmsWidget/default``

```php
<?php
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\breadcrumbs\BreadcrumbsCmsWidget */
?>
<? if (\Yii::$app->breadcrumbs->parts) : ?>
    <? $count = count(\Yii::$app->breadcrumbs->parts); ?>
    <? $counter = 0; ?>
    <? if ($count > 1) : ?>
        <ul class="breadcrumb">
            <? foreach (\Yii::$app->breadcrumbs->parts as $data) : ?>
                <? $counter ++; ?>
                <? if ($counter == $count): ?>
                    <li class="active"><?= $data['name']; ?></li>
                <? else : ?>
                    <li><a href="<?= $data['url']; ?>" title="<?= $data['name']; ?>"><?= $data['name']; ?></a></li>
                <? endif;?>
            <? endforeach; ?>
        </ul>
    <? endif;?>
<? endif;?>
```


[Смотреть видео](https://youtu.be/cp7Fdo9-xPs)



## Страница контакты (кастомные страницы)

Для того чтобы создать страницу в необычном шаблоне. 
Необходимо создать раздел в дереве разделов, и назначить ему собственный шаблон.


[Смотреть видео](https://youtu.be/am7FfTj7E6A)


## Конструктор форм (обратная связь, заказать звонок)

### Пример вызова формы

```php
<?= \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::widget([
    'namespace' => 'phone',
    'form_code' => 'callback',
    'viewFile' => 'with-messages'
]); ?>
```

### Пример альтернативного вызова формы

```php
<? \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::beginWidget('phone', [
    'form_code' => 'callback',
    'viewFile' => 'with-messages'
]); ?>
<? \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::end(); ?>
```
### Пример в модальном окне bootstrap + js success callback

```php
<? $modal = \yii\bootstrap\Modal::begin([
    'header' => 'Заказать звонок',
    'toggleButton' => [
        'label' => '<i class="fa fa-phone"></i> Заказать звонок',
        'class' => 'call-me btn btn-lg btn-blue hidden-xs',
    ],
]); ?>
    <? \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::beginWidget('phone', [
        'form_code' => 'callback',
        'viewFile' => 'with-messages',
        'successJs' => <<<JS
function(jForm, data)
{
_.delay(function()
{
$("#{$modal->id}").modal('hide');
}, 1500);

}
JS
,
    ]); ?>
    <? \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::end(); ?>
<? \yii\bootstrap\Modal::end(); ?>
```


[Смотреть видео](https://youtu.be/3NvoEKz51ss)


## Авторазиция / Регистрация

Примеры в официальной документации [https://docs.cms.skeeks.com/ru/latest/quickstart.html#id9](https://docs.cms.skeeks.com/ru/latest/quickstart.html#id9)

[Смотреть видео](https://youtu.be/VeY2PJcCc38)


## Вывод товаров на главную страницу

Пример вызова виджета

```php
<?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
    'namespace' => 'home-news',
    'label'     => 'Новости компании',
    'viewFile'  => '@app/views/widgets/ContentElementsCmsWidget/home-news',
]); ?>
```

Пример шаблона ``@app/views/widgets/ContentElementsCmsWidget/home-news``

```php
<?php
/**
 * @var \skeeks\cms\models\CmsContentElement $model
 */
$shopProduct = \skeeks\cms\shop\models\ShopProduct::getInstanceByContentElement($model);
$additional = $model->relatedPropertiesModel->getEnumByAttribute('additional');
?>

<div class="col col-4">
  <div class="catalog__item">
    <div class="tag <?= $additional ? $additional->code : ""; ?>"></div>
    <div class="img">
        <a href="<?= $model->url; ?>" title="<?= $model->name; ?>" data-pjax="0">
        <img src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($model->image ? $model->image->src : null,
         new \skeeks\cms\components\imaging\filters\Thumbnail([
             'w' => 0,
             'h' => 200,
         ]), $model->code
     ) ?>" alt="<?= $model->name; ?>">
        </a>
    </div>

      <? if ($ageFrom = $model->relatedPropertiesModel->getAttribute('ageFrom')) : ?>
          <div class="age-limit">
            <span><?= $ageFrom; ?>+</span>
        </div>
      <? endif; ?>


    <h2><?= $model->name; ?></h2>
    <div class="excerpt"><?= $model->description_short; ?></div>
    <div class="buy">
      <div class="row">
        <div class="col col-6">
          <div class="price">
              <? if ($shopProduct->minProductPrice->id == $shopProduct->baseProductPrice->id) : ?>
                <?= \Yii::$app->money->convertAndFormat($shopProduct->minProductPrice->money); ?>
            <? else : ?>
                <span
                    class="line-through"><?= \Yii::$app->money->convertAndFormat($shopProduct->baseProductPrice->money); ?></span>
                <span
                    class="sx-discount-price"><?= \Yii::$app->money->convertAndFormat($shopProduct->minProductPrice->money); ?></span>
            <? endif; ?>
          </div>
        </div>
        <div class="col col-6">
          <div class="button"><a class="btn btn-buy" href="#" onclick="sx.Shop.addProduct(<?= $shopProduct->id;  ?>, 1); return false;">Купить</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
```


[Смотреть видео](https://youtu.be/lDom8RvIqzo)



## Корзина в шапке + добавление товаров в корзину

Корзина в шапке сайта

Вызов

```php
<?= \skeeks\cms\shop\widgets\cart\ShopCartWidget::widget([
    'namespace' => 'ShopCartWidget-small-top',
    'viewFile' => '@app/views/widgets/ShopCartWidget/small-top'
]); ?>
```
Содержимое шаблона ``@app/views/widgets/ShopCartWidget/small-top``

```php
<?php
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\shop\widgets\cart\ShopCartWidget */
\frontend\assets\CartAsset::register($this);
$this->registerJs(<<<JS
    (function(sx, $, _)
    {
        new sx.classes.shop.SmallCart(sx.Shop, 'sx-cart', {
            'delay': 500
        });
    })(sx, sx.$, sx._);
JS
);
?>
<? \skeeks\cms\widgets\Pjax::begin([
    'id' => 'sx-cart'
]); ?>
    <div class="text">
        <span>Товаров:<a href="<?= \yii\helpers\Url::to(['/shop/cart']); ?>" data-pjax="0"><?= \Yii::$app->shop->shopFuser->countShopBaskets; ?> шт.</a></span>
        <span>На<a href="<?= \yii\helpers\Url::to(['/shop/cart']); ?>" data-pjax="0"><?= \Yii::$app->money->convertAndFormat(\Yii::$app->shop->shopFuser->money); ?></a></span>
        <a class="btn btn-orange" href="<?= \yii\helpers\Url::to(['/shop/cart']); ?>" data-pjax="0">Оформить заказ</a>
    </div>
<? \skeeks\cms\widgets\Pjax::end(); ?>
```

Добавление товара в корзину

Отрисовка соответствующей кнопки уведомить или добавить в корзину
```php

<? if ($shopProduct->quantity > 0) : ?>
    <?= \yii\helpers\Html::tag('a', 'Купить', [
      'class' => 'js-to-cart sx-to-cart btn btn-buy',
      'type' => 'button',
      'onclick' => new \yii\web\JsExpression("sx.Shop.addProduct({$shopProduct->id}, 1); return false;"),
      'data' => \yii\helpers\ArrayHelper::merge($model->toArray(['name', 'id']), [
          'url' => $model->url,
          'image' => \skeeks\cms\helpers\Image::getSrc($model->image ? $model->image->src : null),
          'price' => \Yii::$app->money->convertAndFormat($shopProduct->minProductPrice->money),
      ]),
    ]); ?>
<? else : ?>
    <?= \skeeks\cms\shop\widgets\notice\NotifyProductEmailModalWidget::widget([
        'product_id' => $model->id,
        'success_modal_id' => 'readyNotifyEmail',
        'header' => 'Уведомить о поступлении',
        'closeButton' =>
        [
            'tag'   => 'button',
            'class' => 'modal-close btn-circle fill',
            'label' => '<i class="fa fa-remove"></i>',
        ],
        'toggleButton' => [
            'label' => 'Уведомить',
            'style' => '',
            'class' => 'subscribe btn btn-buy',
        ],
    ]); ?>

<? endif; ?>

```

Добавление эффекта при добавлении в корзину

```javascript
$('.sx-to-cart').on('click', function()
{
    UIkit.modal("#sx-toCartModal").show();
});
```


[Смотреть видео](https://youtu.be/AuldDehNXuQ)


## Страница товаров + фильтры

Конструирование виджета фильтров

```php
$shopFilters = new \skeeks\cms\shop\cmsWidgets\filters\ShopProductFiltersWidget([
    'namespace' => 'ShopProductFiltersWidget-left1',
    'onlyExistsFilters' => true,
    'viewFile' => 'slider',
]);

$shopFilters->realatedProperties = \yii\helpers\ArrayHelper::map(
    \skeeks\cms\models\CmsContentProperty::find()
        ->andWhere(['!=', 'property_type', \skeeks\cms\relatedProperties\PropertyType::CODE_STRING])
        ->all(), 'code', 'code'
);
```

```php
<? $filters = new \common\models\ProductFilters(); ?>
<? $filters->load(\Yii::$app->request->get()); ?>

<? $widgetElements = new \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget([
    'namespace' => 'products-second',
    'viewFile' => '@app/views/widgets/ContentElementsCmsWidget/products',
    'contentElementClass' => \skeeks\cms\shop\models\ShopCmsContentElement::className(),
    'dataProviderCallback' => function (\yii\data\ActiveDataProvider $activeDataProvider)
    use ($filters, $shopFilters)
    {
        $activeDataProvider->query->with('relatedProperties');
        $activeDataProvider->query->with('shopProduct');
        $activeDataProvider->query->with('shopProduct.baseProductPrice');
        $activeDataProvider->query->with('shopProduct.minProductPrice');

        $shopFilters->search($activeDataProvider);
        $filters->search($activeDataProvider);

        //$activeDataProvider->query->joinWith('shopProduct.baseProductPrice as basePrice');
        //$activeDataProvider->query->orderBy(['basePrice' => SORT_ASC]);
    },
]); ?>

<?
$widgetElementsContent = $widgetElements->run();
$shopFiltersContent = $shopFilters->run();
?>
```

[Смотреть видео](https://youtu.be/fTr9jGpN9Nk)

## Страница одного товара

Виджет поделиться в соц. сетях

```php
<?= \skeeks\cms\yandex\share\widget\YaShareWidget::widget([
    'namespace' => 'YaShareWidget-main'
]); ?>
```


Виджет отзывы

```php
<?= \skeeks\cms\reviews2\widgets\reviews2\Reviews2Widget::widget([
    'namespace' => 'Reviews2Widget',
    'viewFile' => '@app/views/widgets/Reviews2Widget/package',
    'cmsContentElement' => $model
]); ?>
```

Необходимые данные по товару

```php
$shopProduct = \skeeks\cms\shop\models\ShopProduct::getInstanceByContentElement($model);
$shopCmsContentElement = new \v3toys\skeeks\models\V3toysProductContentElement($model->toArray());

$shopProduct->quantity;

<dd>Артикул: <?= $shopCmsContentElement->v3toysProductProperty->sku; ?></dd>
<dd>Код товара: <?= $shopCmsContentElement->v3toysProductProperty->v3toys_id; ?></dd>
```

Похожие товары

```php
<?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
    'namespace' => 'productpage-same-products',
    'viewFile' => '@app/views/widgets/ContentElementsCmsWidget/products-same',
    'label'  =>  'Похожие товары',
    'options'  =>  [
        'class' => 'xd_gallery_third',
        'navigateId' => 'cb_best_checkout_products_for_product_third'
    ],
    'contentElementClass' => \skeeks\cms\shop\models\ShopCmsContentElement::className(),
    'dataProviderCallback' => function (\yii\data\ActiveDataProvider $activeDataProvider) use ($model)
    {
        $activeDataProvider->query->with('relatedProperties');
        $activeDataProvider->query->with('shopProduct');
        $activeDataProvider->query->with('shopProduct.baseProductPrice');
        $activeDataProvider->query->with('shopProduct.minProductPrice');


        $query = $activeDataProvider->query;

        $query->andWhere(['cms_content_element.tree_id'     => $model->tree_id]);

        /*$query
            ->joinWith('relatedElementProperties map')
            ->joinWith('relatedElementProperties.property property')

            ->andWhere(['property.code'     => 'brand'])
            ->andWhere(['map.value'         => $model->relatedPropertiesModel->getAttribute('brand')])
        ;*/

        $filters = new \common\models\ProductFilters([]);
        $filters->search($activeDataProvider);

    },
  ]); ?>
```
[Смотреть видео](https://youtu.be/BYZueqGQl5g)


## Определение местоположения + виджет выбора



* Получить токен https://dadata.ru/
* Указать этот токен в настройках компонента в системе управления сайтом

Пример запуска виджета:

```php
<?= \skeeks\cms\dadataSuggest\widgets\address\DadataGetAddressWidget::widget([
    'options' =>
    [
        'href' => '#',
        'onclick' => 'new sx.classes.ModalRegionPageReload(); return false;',
        'class' => 'sx-dadata-suggestion-city',
    ]
]); ?>
```

[Смотреть видео](https://youtu.be/UH4dyTvqdaA)


## Отзывы на главной странице

```php
<?
  /**
   * @var \skeeks\cms\reviews2\models\Reviews2Message $review
   */
  ?>
  <? if ($reviews = \skeeks\cms\reviews2\models\Reviews2Message::find()->limit(5)->all()) : ?>
      <div class="review">
          <h5>Отзывы:</h5>
          <div class="review__posts">
          <? foreach ($reviews as $review) : ?>
              <div class="review__post">
                  <span class="author"><?= $review->createdBy ? $review->createdBy->displayName : $review->user_name; ?></span><span>
                      <a href="<?= $review->element->url; ?>"><?= $review->comments; ?></a>
                  </span><br>
                  <select class="stars">
                    <option value="1" <?= $review->rating == 1 ? "selected" : ""; ?>>1</option>
                    <option value="2" <?= $review->rating == 2 ? "selected" : ""; ?>>2</option>
                    <option value="3" <?= $review->rating == 3 ? "selected" : ""; ?>>3</option>
                    <option value="4" <?= $review->rating == 4 ? "selected" : ""; ?>>4</option>
                    <option value="5" <?= $review->rating == 5 ? "selected" : ""; ?>>5</option>
                  </select>
                </div>
          <? endforeach; ?>
          </div>
      </div>
  <? endif; ?>
```

[Смотреть видео](https://youtu.be/fnnAIJDfS5Y)


## Поиск по сайту

Поисковая форма

```php
<form class="site-search search" action="/search" method="get">
    <input type="text" class="uk-input" name="<?= \Yii::$app->cmsSearch->searchQueryParamName; ?>" value="<?= \Yii::$app->cmsSearch->searchQuery; ?>" placeholder="Искать товар..."/>
    <button class="btn btn-grey">Поиск</button>
</form>
```

Шаблон ``@app/views/modules/cmsSearch/result/index``

```php
<? \skeeks\cms\modules\admin\widgets\Pjax::begin(); ?>
    <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
        'namespace' => 'ContentElementsCmsWidget-search-result',
        'viewFile' => '@app/views/widgets/ContentElementsCmsWidget/products',
        'enabledCurrentTree' => \skeeks\cms\components\Cms::BOOL_N,
        'active' => "Y",
        'dataProviderCallback' => function (\yii\data\ActiveDataProvider $dataProvider) {
            \Yii::$app->cmsSearch->buildElementsQuery($dataProvider->query);
            \Yii::$app->cmsSearch->logResult($dataProvider);
        },
    ]) ?>
<? \skeeks\cms\modules\admin\widgets\Pjax::end(); ?>
```

[Смотреть видео](https://youtu.be/L4_GVzXh0pY)


## 1-й шаг оформления заказа (корзина) 

Поправить шаблон: ``@app/views/modules/shop/cart/cart``

```php
<?php
/* @var $this yii\web\View */
?>
<?
\frontend\assets\CartAsset::register($this);
\skeeks\cms\shop\widgets\ShopGlobalWidget::widget();
$this->registerJs(<<<JS
    (function(sx, $, _)
    {
        new sx.classes.shop.FullCart(sx.Shop, 'sx-cart-full');
    })(sx, sx.$, sx._);
JS
);

?>
<div class="content order">
    <? \skeeks\cms\modules\admin\widgets\Pjax::begin([
        'id' => 'sx-cart-full',
    ]) ?>
    <? if (\Yii::$app->shop->shopFuser->isEmpty()) : ?>
        <!-- EMPTY CART -->
        <div class="panel panel-default">
            <div class="panel-body">
                <strong>Ваша корзина пуста!</strong><br/>
                В вашей корзине нет покупок.<br/>
                Кликните <a href="/" data-pjax="0">сюда</a> для продолжения покупок. <br/>
            </div>
        </div>
    <? else: ?>
        <div class="order-progress">
            <?= \skeeks\cms\shopCartStepsWidget\ShopCartStepsWidget::widget([
                'viewFile' => '@app/views/modules/shop/cart/_steps'
            ]); ?>
        </div>
        <div class="order-table-list">
            <?
            echo \skeeks\cms\shopCartItemsWidget\ShopCartItemsListWidget::widget([
                'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => \Yii::$app->shop->shopFuser->getShopBaskets(),
                    'pagination' =>
                    [
                        'defaultPageSize' => 100,
                        'pageSizeLimit' => [1, 100],
                    ]
                ]),
                'layout'            => "<table class=\"table no-border\">{header}\n{items}\n{pager}</table>{footer}",
                'itemView'          => '@app/views/modules/shop/cart/items-list-item',
                'headerView'        => '@app/views/modules/shop/cart/items-list-header',
                'footerView'        => '@app/views/modules/shop/cart/items-list-footer'
            ]); ?>
            <hr />
            <div class="order-submit">
              <div class="all-total">Итого:&nbsp;<span><?= \Yii::$app->money->convertAndFormat(\Yii::$app->shop->shopFuser->money); ?></span></div>
              <a href="<?= \yii\helpers\Url::to(['/v3toys/cart/checkout']); ?>" class="btn btn-orange big" data-pjax="0">К оформлению</a>
            </div>
        </div>
    <? endif; ?>
    <? \skeeks\cms\modules\admin\widgets\Pjax::end() ?>
</div>

```


Шаблон ``@app/views/modules/shop/cart/_steps``

```php
<ul class="process-steps nav nav-justified">
    <li class="active">
        <a href="<?/*= \yii\helpers\Url::to(['/shop/cart']); */?>" data-pjax="0">1</a>
        <h5><?/*= \Yii::t('skeeks/shop-cart-steps-widget', 'Cart'); */?></h5>
    </li>
    <li class="<?/*= in_array(\Yii::$app->controller->action->getUniqueId(), ['shop/cart/checkout', 'shop/order/finish']) ? "active" : ""; */?>">
        <a href="<?/*= \yii\helpers\Url::to(['/shop/cart/checkout']); */?>" data-pjax="0">2</a>
        <h5><?/*= \Yii::t('skeeks/shop-cart-steps-widget', 'Ordering'); */?></h5>
    </li>
    <li class="<?/*= \Yii::$app->controller->action->getUniqueId() == 'shop/order/finish' ? "active" : ""; */?>">
        <a href="#">3</a>
        <h5><?/*= \Yii::t('skeeks/shop-cart-steps-widget', 'Ready order'); */?></h5>
    </li>
</ul>
```


Шаблон ``@app/views/modules/shop/cart/items-list-item``

```php
<tr>
  <td style="width: 250px;">
    <div class="item-card">
      <div class="img">
          <a href="<?= $model->url; ?>" data-pjax="0">
                <img src="<?= \skeeks\cms\helpers\Image::getSrc(
                     \Yii::$app->imaging->getImagingUrl($model->image ? $model->image->src : null, new \skeeks\cms\components\imaging\filters\Thumbnail([
                         'h' => 150,
                         'w' => 150,
                     ]))
                 ) ?>">
          </a>
      </div>
    </div>
  </td>
  <td style="width: 400px;">
    <div class="item-card">
      <div class="desc">
        <div class="title">
            <a href="<?= $model->url; ?>" data-pjax="0">
                <?= $model->name; ?>
            </a>
        </div>
          <br />
        <a href="#" class="" data-toggle="tooltip"
           onclick="sx.Shop.removeBasket('<?= $model->id; ?>'); return false;"
           title="<?= \Yii::t('skeeks/shop-cart-items-widget', 'Remove this item'); ?>">
            <i class="glyphicon glyphicon-remove"></i> удалить
        </a>
          <span></span>
      </div>
      <div class="meta">
      </div>
    </div>
  </td>
  <td>
    <div class="price">
        <? if ($model->moneyOriginal->getAmount() == $model->money->getAmount()) : ?>
            <?= \Yii::$app->money->convertAndFormat($model->moneyOriginal); ?>
        <? else : ?>
            <span
                class="line-through nopadding-left"><?= \Yii::$app->money->convertAndFormat($model->moneyOriginal); ?></span>
            <?= \Yii::$app->money->convertAndFormat($model->money); ?>
        <? endif; ?>
    </div>
  </td>
  <td style="width: 150px;">
    <div class="qnt">
        <input type="number" value="<?= round($model->quantity); ?>" name="qty"
               class="sx-basket-quantity uk-input slim" maxlength="3" max="999" min="1"
               data-basket_id="<?= $model->id; ?>"/>

      <!--<input class="uk-input slim" type="number" value="1">-->
      <div class="available">В Наличии более 10 шт.</div>
    </div>
  </td>
  <td>
    <div class="total"><?= \Yii::$app->money->convertAndFormat($model->money->multiply($model->quantity)); ?></div>
  </td>
</tr>
```

[Смотреть видео](https://youtu.be/pSW7x5BRawM)



## 2-й шаг оформления заказа (оформление) 

Шаблон ``@app/views/modules/v3toys/cart/checkout``

```php
<?php
/* @var $this yii\web\View */
/* @var $model \v3toys\skeeks\models\V3toysOrder */
?>
<?
\frontend\assets\CartAsset::register($this);
\skeeks\cms\shop\widgets\ShopGlobalWidget::widget();
?>



<?
$json = \yii\helpers\Json::encode([
'getPrices' => \yii\helpers\Url::to(['/v3toys/cart/get-prices']),
'save' => \yii\helpers\Url::to(['/v3toys/cart/save-session']),
]);

$this->registerJs(<<<JS
(function(sx, $, _)
{

sx.classes.Checkout = sx.classes.Component.extend({

    _onDomReady: function()
    {
        var self = this;

        this.JForm = $('#sx-checkout');
        $('.sx-deliveryChange, #v3toysorder-pickup_point_id', this.JForm).on('change', function()
        {
            self.updatePrices();
        });

        $('select, input, textarea', this.JForm).on('change', function()
        {
            self.save();
        });
    },

    save: function()
    {
        var self = this;
        var ajaxQuery = sx.ajax.preparePostQuery(this.get('save'), self.JForm.serialize());
        ajaxQuery.execute();
        return this;
    },

    updatePrices: function()
    {
        var self = this;
        this.ajaxQuery = sx.ajax.preparePostQuery(this.get('getPrices'), self.JForm.serialize());

        this.ajaxQuery.bind('success', function(e, data)
        {
            var result = data.response.data;

            $('.sx-money').empty().append(result.money.convertAndFormat);
            $('.sx-moneyDiscount').empty().append(result.moneyDiscount.convertAndFormat);
            $('.sx-moneyDelivery').empty().append(result.moneyDelivery.convertAndFormat);
            $('.sx-moneyOriginal').empty().append(result.moneyOriginal.convertAndFormat);
        });

        this.ajaxQuery.execute();
    }
});

sx.Checkout = new sx.classes.Checkout({$json});
})(sx, sx.$, sx._);
JS
);?>

<? if (!\Yii::$app->shop->shopFuser->isEmpty()) : ?>

<div class="content order">

        <div class="order-progress">
            <div class="row">
                <div class="col col-4">
                  <div class="progress"><span class="number">1</span><span>Ваша корзина</span></div>
                </div>
                <div class="col col-4">
                  <div class="progress active"><span class="number">2</span><span>Оформление заказа</span></div>
                </div>
                <div class="col col-4">
                  <div class="progress"><span class="number">3</span><span>Покупка завершена</span></div>
                </div>
              </div>
        </div>


            <?php $form = \skeeks\cms\base\widgets\ActiveFormAjaxSubmit::begin([
                'validationUrl'  => \yii\helpers\Url::to('/v3toys/cart/checkout-validate'),
                'id'  => 'sx-checkout',
                'enableClientValidation' => false,
                'enableAjaxValidation' => true,
                'options'                                 => [
                    'class' => 'order-form'
                ],
                'afterValidateCallback'                     => new \yii\web\JsExpression(<<<JS
                    function(jForm, ajax)
                    {
                        var handler = new sx.classes.AjaxHandlerStandartRespose(ajax, {
                            'blockerSelector' : '#' + jForm.attr('id'),
                            'enableBlocker' : true,
                        });



                        handler.bind('error', function(e, data)
                        {
                            $('.sx-success-message', jForm).hide();
                            $('.sx-error-message', jForm).show();
                            $('.sx-error-message .sx-body', jForm).empty().append(data.message);
                        });

                        handler.bind('success', function(e, data)
                        {
                            $('.sx-error-message', jForm).hide();
                            $('.sx-success-message', jForm).show();
                            $('.sx-success-message .sx-body', jForm).empty().append(data.message);

                            $('input, textarea', jForm).each(function(value, key)
                            {
                                var name = $(this).attr('name');
                                if (name != '_csrf' && name != 'sx-model-value' && name != 'sx-model')
                                {
                                    $(this).val('');
                                }
                            });

                            $('.sx-btn-order-result').empty().text('Принято!');

                            _.delay(function()
                            {
                                //$.fancybox.close();
                                //window.location.reload();
                                $('.modal-close', jForm).click();
                            }, 3000);
                        });
                    }
JS
            ),
            ]);
            ?>

            <section class="order-form--group">
                <!--<label class="order-form--group--title">Контактная информация</label>-->
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-tbl">

                        <?= $form->field($model, 'email', [
                            'template'      => "<div class=\"tbl-cell lbl\">{label}</div>\n<div class='tbl-cell'><div class='form-control--wrapper required'>{input}</div>{hint}{error}</div>",
                            'errorOptions'  => ['class' => 'form-note'],
                            'options'  => ['class' => 'tbl-row form-group'],
                        ])->textInput([
                            'placeholder' => 'для получения деталей заказа',
                            'type' => 'email'
                        ]); ?>

                        <?= $form->field($model, 'phone', [
                            'template'      => "<div class=\"tbl-cell lbl\">{label}</div>\n<div class='tbl-cell'><div class='form-control--wrapper required'>{input}</div>{hint}{error}</div>",
                            'errorOptions'  => ['class' => 'form-note'],
                            'options'  => ['class' => 'tbl-row form-group'],
                        ])->textInput([
                            'class' => 'form-control input-mask-phone-placeholder',
                            'placeholder' => 'для связи с вами',
                            'type' => 'tel'
                        ]); ?>



<?
$radioElement = new \v3toys\skeeks\widgets\delivery\V3toysDeliveryInputWidget([
    'model' => $model,
    'attribute' => 'shipping_method',
    'options' => [
        'class' => 'sx-deliveryChange'
    ],
]);
$radioElement = $radioElement->run();

$controller = $this->context;
$region = \Yii::$app->dadataSuggest->address ? \Yii::$app->dadataSuggest->address->regionString : "Выбрать город";
?>

                        <div class="tbl-row form-group">
                            <div class="tbl-cell lbl">
                                <label class="form-label">Город</label>
                            </div>
                            <div class="tbl-cell">
                                <div class="link-region">

                                    <a href="#" onclick="new sx.classes.ModalRegionPjaxReload({
                                        'id' : 'sx-cart-full'
                                    }); return false;" style="border-bottom: dotted 1px;">
                                        <?= \Yii::$app->dadataSuggest->address ? \Yii::$app->dadataSuggest->address->regionString : "Выбрать город"; ?>
                                    </a>

                                </div>
                            </div>
                        </div>

                        <?= $form->field($model, 'name', [
                            'template'      => "<div class=\"tbl-cell lbl\">{label}</div>\n<div class='tbl-cell'><div class='form-control--wrapper required'>{input}</div>{hint}{error}</div>",
                            'options'  => ['class' => 'tbl-row form-group'],
                            'errorOptions'  => ['class' => 'form-note'],
                        ])->label('Имя и фамилия')->textInput(); ?>




                        </div>
        </div>
    </div>
</section>


    <div class="row">
        <div class="col-sm-12">




    <?= \v3toys\skeeks\widgets\delivery\V3toysDeliveryWidget::widget([
            'contentSelectRegion' => <<<HTML
&nbsp;
HTML
,
            'contentPost' => $this->render('_post', [
                'form' => $form,
                'model' => $model,
            ]),
            'contentPickup' => $this->render('_pickup', [
                                'form' => $form,
                                'model' => $model,
            ]),
            'contentCourier' => $this->render('_courier', [
                                'form' => $form,
                                'model' => $model,
            ]),

            'contentRadioElement' => $radioElement,

    ]); ?>


    </div>
</div>

        <div class="order-form">
<section class="order-form--group">
    <!--<label class="order-form--group--title">Комментарии к заказу</label>-->
    <div class="row">
        <div class="col-sm-8">
            <div class="form-tbl">

                    <?= $form->field($model, 'comment', [
                        'template'      => "<div class=\"tbl-cell lbl\">{label}</div>\n<div class='tbl-cell'><div class='form-control--wrapper'>{input}</div>{hint}{error}</div>",
                        'errorOptions'  => ['class' => 'form-note'],
                        'options'  => ['class' => 'tbl-row form-group'],
                    ])->textarea([
                        'placeholder' => 'У вас есть пожелания к заказу?',
                        'rows' => 7
                    ]); ?>

                            </div>
        </div>
    </div>
</section>
</div>




            <section>
                <div class="form-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="order-delivery--price">
                                <span class="lbl">Сумма заказа:</span>
                                <span class="amount sx-moneyOriginal"><?= \Yii::$app->money->convertAndFormat(\Yii::$app->shop->shopFuser->moneyOriginal); ?></span>
                            </div>
                            <div class="order-delivery--price">
                                <span class="lbl">Доставка:</span>
                                <span class="amount sx-moneyDelivery"><?= \Yii::$app->money->convertAndFormat($model->moneyDelivery); ?></span>
                            </div>
                            <!--<div class="order-delivery--price">
                                <span class="lbl">Скидка:</span>
                                <span class="amount sx-moneyDiscount">-<?/*= \Yii::$app->money->convertAndFormat(\Yii::$app->shop->shopFuser->moneyDiscount); */?></span>
                            </div>-->
                            <div class="order-delivery--total">
                                Итого к оплате:
                                <span class="text-nowrap"><span class="number amount sx-money"><?= \Yii::$app->money->convertAndFormat(\Yii::$app->shop->shopFuser->money); ?></span>
                            </div>
                            <button type="submit" class="btn btn-orange big">Оформить заказ</button>
                        </div>
                    </div>
                </div>

            </section>



            <div class="tbl-cart-bottom order" style="margin-top: 20px;">
                <div class="col-left">
                    <div class="back">
                        <a href="<?= \yii\helpers\Url::to(['/shop/cart']); ?>">Изменить заказ</a>
                    </div>
                </div>

                <!--<div class="col-right">
                    <button type="submit" class="btn btn-lg">Перейти к оформлению</button>
                </div>--><!--.col-right-->
            </div>

                    <div class="row">
                        <?= \yii\bootstrap\Alert::widget([
                            'options' => [
                                'class' => 'alert-success sx-form-message sx-success-message',
                                'style' => 'display: none;',
                            ],
                            'closeButton' => false,
                            'body' => '<div class="sx-body">Ok</div>',
                        ])?>

                        <?= \yii\bootstrap\Alert::widget([
                            'options' => [
                                'class' => 'alert-danger sx-form-message sx-error-message',
                                'style' => 'display: none;',
                            ],
                            'closeButton' => false,
                            'body' => '<div class="sx-body">Ok</div>',
                        ])?>

                    </div>
                <? $form::end(); ?>
        </div>



<? endif; ?>
```


[Смотреть видео](https://youtu.be/S9lb61GS2zQ)

## 3-й шаг оформления заказа (готовый заказ)


```php
<div class="content order">
<div class="order-progress">
  <div class="row">
    <div class="col col-4">
      <div class="progress"><span class="number">1</span><span>Ваша корзина</span></div>
    </div>
    <div class="col col-4">
      <div class="progress"><span class="number">2</span><span>Оформление заказа</span></div>
    </div>
    <div class="col col-4">
      <div class="progress active"><span class="number">3</span><span>Покупка завершена</span></div>
    </div>
  </div>
</div>
<div class="title">
  <h1>Заказ № <?= $model->id; ?> оформлен!</h1>
  <h4>Наш менеджер свяжется с Вами в ближайшее время для подтверждения заказа.</h4>
</div>
<form>
  <div class="row">
    <div class="col col-6">
      <h5>Данные заказа:</h5>
      <dl>
        <dd>Получатель: <?= $model->name; ?></dd>
        <dd>Телефон: <?= $model->phone; ?></dd>
        <dd>Доставка: <?= $model->deliveryFullName; ?></dd>
      </dl>
      <dl>
        <dd>Итоговая стоимость с учётом доставки: <?= \Yii::$app->money->convertAndFormat($model->money); ?></dd>
      </dl>
      <dl>
        <dd>Данные о заказе отправлены Вам на E-mail: <?= $model->email; ?></dd>
        <dd>Статус заказа можете посмотреть в
            <? if (\Yii::$app->user->isGuest) : ?>
                <a href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/login')->setCurrentRef(); ?>">Личном кабинете</a>
            <? else: ?>
                <a href="<?=\yii\helpers\Url::to(['/shop/order/list']); ?>">Личном кабинете</a>
            <? endif; ?>
        </dd>
      </dl>
    </div>
  </div>
</form>
<h2>Спасибо за заказ!</h2>
</div>
```

[Смотреть видео](https://youtu.be/vqFgQLXh3PA)


## Личный кабинет клиента

Содержимое шаблона ``@app/views/modules/cms/user/edit``


```php
<?php
use yii\helpers\Html;

use yii\widgets\ActiveForm;
/* @var $this       yii\web\View */
/* @var $context    \frontend\controllers\UserController */
/* @var $model      common\models\User */

$context = $this->context;
$model = $context->user;

$this->title = $model->getDisplayName();

$this->title = $model->getDisplayName();

\Yii::$app->breadcrumbs->createBase()->append([
    'name' => $model->displayName,
    'url'  => $model->getPageUrl()
])->append([
    'name' => 'Упраление настройками'
]);

?>
<div class="row">
    <div class="col col-3">
      <div class="sidebar">
      <?= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
            'namespace' => 'catalog-menu',
            'viewFile' => '@app/views/widgets/TreeMenuCmsWidget/catalog-menu',
            //'label' => 'Title menu',
            //'level' => 1,
            //'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
        ]); ?>
      </div>
    </div>

    <div class="col col-9">
      <div class="content">

          <?= \skeeks\cms\cmsWidgets\breadcrumbs\BreadcrumbsCmsWidget::widget([
                'viewFile'       => '@app/views/widgets/BreadcrumbsCmsWidget/default',
            ]); ?>
        <!--<div class="breadcrumb">
          <ul>
            <li><a href="#">Главная</a></li>
            <li><a href="#">Страница</a></li>
          </ul>
        </div>-->
        <div class="title">
          <h1><?= $model->name; ?></h1>
        </div>
        <div class="page">

            <div class="tab-v1">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#profile">Личные данные</a></li>
                    <li><a data-toggle="tab" href="#passwordTab">Изменение пароля</a></li>

                    <? if (isset(\Yii::$app->authClientCollection) && \Yii::$app->authClientCollection->clients) : ?>
                        <li><a data-toggle="tab" href="#sx-social">Социальные профили</a></li>
                    <? endif; ?>

                </ul>
                <div class="tab-content">
                    <div id="profile" class="profile-edit tab-pane fade in active">

                        <? $modelForm = $model; ?>
                        <? $form = \skeeks\cms\base\widgets\ActiveFormAjaxSubmit::begin([
                            'validationUrl' => \skeeks\cms\helpers\UrlHelper::construct('cms/user/edit-info', ['username' => $model->username])->setSystemParam(\skeeks\cms\helpers\RequestResponse::VALIDATION_AJAX_FORM_SYSTEM_NAME)->toString(),
                            'action'        => \skeeks\cms\helpers\UrlHelper::construct('cms/user/edit-info', ['username' => $model->username])->toString(),

                            'afterValidateCallback' => new \yii\web\JsExpression(<<<JS
                function(jForm, ajax)
                {
                    var handler = new sx.classes.AjaxHandlerStandartRespose(ajax, {
                        'enableBlocker' : true,
                        'blockerSelector' : '#' + jForm.attr('id')
                    });
            
                    handler.bind('success', function(e, response)
                    {});
                }
JS
            )
                        ]); ?>

                            <?/*= $form->field($model, 'image_id')->widget(
                                \skeeks\cms\widgets\formInputs\StorageImage::className()
                            ) */?>

                            <?= $form->field($model, 'username')->textInput(['maxlength' => 12])->hint('Уникальное имя пользователя. Используется для авторизации, для формирования ссылки на личный кабинет.'); ?>
                            <?= $form->field($model, 'name')->textInput(); ?>



                            <?= $form->field($model, 'email')->textInput(); ?>
                            <?= $form->field($model, 'phone')->textInput(); ?>

                            <?= $form->field($model, 'gender')->radioList([
                                'men' => 'Муж',
                                'women' => 'Жен',
                            ]); ?>
                            <?/*= $form->field($model, 'status_of_life')->textarea(); */?>

                            <button class="btn btn-primary">Сохранить</button>
                        <? \skeeks\cms\base\widgets\ActiveFormAjaxSubmit::end(); ?>

                    </div>

                    <div id="passwordTab" class="profile-edit tab-pane fade">
                        <? $modelForm = new \skeeks\cms\models\forms\PasswordChangeForm(); ?>
                        <? $form = \skeeks\cms\base\widgets\ActiveFormAjaxSubmit::begin([
                            'validationUrl' => \skeeks\cms\helpers\UrlHelper::construct('cms/user/change-password', ['username' => $model->username])->setSystemParam(\skeeks\cms\helpers\RequestResponse::VALIDATION_AJAX_FORM_SYSTEM_NAME)->toString(),
                            'action'        => \skeeks\cms\helpers\UrlHelper::construct('cms/user/change-password', ['username' => $model->username])->toString()
                        ]); ?>
                            <?= $form->field($modelForm, 'new_password')->passwordInput() ?>
                            <?= $form->field($modelForm, 'new_password_confirm')->passwordInput() ?>
                            <button class="btn btn-primary">Изменить</button>
                        <? \skeeks\cms\base\widgets\ActiveFormAjaxSubmit::end(); ?>
                    </div>



                    <? if (isset(\Yii::$app->authClientCollection) && \Yii::$app->authClientCollection->clients) : ?>
                        <div id="sx-social" class="profile-edit tab-pane fade">
                            <? \yii\bootstrap\Alert::begin([
                                'options' => [
                                  'class' => 'alert-info',
                                ],
                            ])?>
                                Вы можете подключить профиль социальной сети, или стороннего приложения, и авторизовываться через него на нашем сайте.
                            <? \yii\bootstrap\Alert::end()?>


                            <? if (\Yii::$app->user->identity->cmsUserAuthClients) : ?>
                                <h4>Уже подключены:</h4>
                                <?=
                                    \yii\grid\GridView::widget([
                                        'dataProvider' => new \yii\data\ArrayDataProvider([
                                            'allModels' => \Yii::$app->user->identity->cmsUserAuthClients
                                        ]),
                                        'columns' =>
                                        [
                                            'provider'
                                        ]
                                    ])
                                ?>
                            <? endif; ?>

                            <hr />
                            <h4>Подключить еще:</h4>
                            <?= yii\authclient\widgets\AuthChoice::widget([
                                 'baseAuthUrl'  => ['/cms/auth/client'],
                                 'popupMode'    => true,
                            ]) ?>
                        </div>
                    <? endif; ?>

                </div>
            </div>



            <? if ($orders = \v3toys\skeeks\models\V3toysOrder::find()->where(['user_id' => $model->id])->orderBy(['id' => SORT_DESC])->all()) : ?>
                <section class="order-list">
                    <h4>Мои заказы</h4>
                    <table class="table order">
                      <thead>
                        <tr>
                          <!--<th class="no-border-left"></th>-->
                          <th>Дата</th>
                          <th>Номер заказа</th>
                          <th>Сумма</th>
                          <th>Статус</th>
                          <th class="no-border-right"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?
                      /**
                       * @var $order \v3toys\skeeks\models\V3toysOrder
                       */
                      ?>
                        <? foreach ($orders as $order) : ?>
                            <tr>
                            <!--<td class="no-border-left">
                                <i class="icon-time"></i>
                            </td>-->
                          <td><?= \Yii::$app->formatter->asDatetime($order->created_at); ?></td>
                          <td><?= $order->id; ?></td>
                          <td><?= \Yii::$app->money->convertAndFormat($order->money); ?></td>
                          <td><?= $order->v3toys_status_id ? $order->status->name : "только что создан"; ?></td>
                          <td class="no-border-right"><a href="<?= \yii\helpers\Url::to(['/v3toys/cart/finish', 'key' => $order->key]); ?>">подробнее о заказе</a></td>
                            </tr>
                        <? endforeach; ?>
                      </tbody>
                    </table>
                </section>
            <? endif; ?>
      </div>
    </div>

</div>
```
[Смотреть видео](https://youtu.be/mQnwPLyQ1Sg)
