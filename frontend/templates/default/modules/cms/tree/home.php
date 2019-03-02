<?php/** * @author Semenov Alexander <semenov@skeeks.com> * @link http://skeeks.com/ * @copyright 2010 SkeekS (СкикС) * @date 24.05.2015 *//* @var $this \yii\web\View *//* @var $model \skeeks\cms\models\Tree */?><!-- SLIDER --><section class="padding-top-10 padding-bottom-10" style="border: none;">    <div class="">        <div class="row">            <div class="col-md-8" style="padding-top: 20px;">                <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([                    'namespace' => 'ContentElementsCmsWidget-slides',                    'viewFile' => '@app/views/widgets/ContentElementsCmsWidget/slides',                ]); ?>            </div>            <div class="col-md-4">                <div class="dog-block" onclick="window.location.href='/info/';">                    <div class="dog-block-text">Бесплатная<br>доставка<br><span>при заказе от<br>2000 руб.</span></div>                    <a href="/info/" class="dog-block-link"><img                                src="<?= \frontend\assets\AppAsset::getAssetUrl('img/dog-block-link.png'); ?>"                                alt=""></a>                    <img src="<?= \frontend\assets\AppAsset::getAssetUrl('img/dog-img.png'); ?>" alt="">                </div>                <div class="cat-block" onclick="window.location.href='/info/#voz';">                    <div class="dog-block-text">Возвраты<br>без проблем<br><span>в течение 30 дней</span></div>                    <a href="/info/#voz" class="dog-block-link"><img                                src="<?= \frontend\assets\AppAsset::getAssetUrl('img/dog-block-link.png'); ?>"                                alt=""></a>                    <img src="<?= \frontend\assets\AppAsset::getAssetUrl('img/cat-img.png'); ?>" alt="">                </div>            </div>        </div>    </div></section><!-- /SLIDER --><section class="padding-top-0 padding-bottom-0" style="border: none;">    <div class="row">        <div class="col-md-12">            <div class="box-pad">                <div class="adv-item" id="bx_651765591_73258">                    <div class="grey-block">                        <div class="grey-block-link1"><a href="510"><span>Гарантии качества</span></a></div>                    </div>                </div>                <div class="adv-item" id="bx_651765591_73257">                    <div class="grey-block">                        <div class="grey-block-link2"><a href="/bonuses/"><span>Скидки и бонусы</span></a></div>                    </div>                </div>                <div class="adv-item" id="bx_651765591_73256">                    <div class="grey-block">                        <div class="grey-block-link3"><a href="/info/"><span>Быстрая доставка</span></a></div>                    </div>                </div>            </div>        </div>    </div></section><section class="padding-top-40 padding-bottom-20" style="border: none;">    <div class="">        <div class="row">            <div class="col-md-12">                <? /*= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([                    'contentElementClass' => \skeeks\cms\shop\models\ShopCmsContentElement::className(),                    'namespace' => 'ContentElementsCmsWidget-home-page',                    'viewFile' => '@app/views/widgets/ContentElementsCmsWidget/products-home',                    'activeQueryCallback' => function (\yii\db\ActiveQuery $query) use ($model) {                        $query->with('shopProduct');                        $query->with('shopProduct.baseProductPrice');                        $query->with('shopProduct.minProductPrice');                    }                ]); */ ?>                <?= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([                    'namespace' => 'TreeMenuCmsWidget-sub-catalog-home',                    'viewFile' => '@app/views/widgets/TreeMenuCmsWidget/sub-catalog-home',                    'treePid' => $model->id,                    'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,                ]); ?>            </div>        </div>    </div></section><section class="padding-top-20 padding-bottom-20" style="border: none;">    <div class="">        <div class="row">            <div class="col-md-12">                <h1 class="size-30 margin-bottom-20">Бренды</h1>                <hr/>                <div style="text-align: center">                    <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([                        'namespace' => 'ContentElementsCmsWidget-home-brands',                        'viewFile' => '@app/views/widgets/ContentElementsCmsWidget/brands-home',                        'limit' => 20,                    ]); ?>                    <!--<img src="/img/brands.png" class="img-responsive"/>-->                </div>                <hr/>            </div>        </div>    </div></section><section class="padding-top-20 padding-bottom-20">    <div class="container">        <div class="row">            <div class="col-md-12">                <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([                    'namespace' => 'ContentElementsCmsWidget-home-page2',                    'viewFile' => '@app/views/widgets/ContentElementsCmsWidget/products-home',                ]); ?>            </div>        </div>    </div></section><? if ($model->description_full) : ?>    <section class="padding-top-20">        <div class="container">            <div class="row">                <div class="col-md-12">                    <?= $model->description_full; ?>                </div>            </div>        </div>    </section><? endif; ?>