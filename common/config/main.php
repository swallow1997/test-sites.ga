<?php
/**
 * Общий конфиг для всего приложения
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010-2014 SkeekS (Sx)
 * @date 15.10.2014
 * @since 1.0.0
 */
$config = [
    'on beforeRequest' => function ($event) {
        \Yii::setAlias('template', '@app/views');
    },

    'components' =>
        [
            'urlManager' => [
                'rules' => [
                    'search' => 'cmsSearch/result',
                    [
                        'class' => \skeeks\cms\components\urlRules\UrlRuleContentElement::className(),
                        'suffix' => '/',
                    ],

                    [
                        'class' => \skeeks\cms\components\urlRules\UrlRuleTree::className(),
                        'suffix' => '/',
                    ]
                ]
            ],

            'settings' =>
                [
                    'class' => 'common\components\SettingsComponent',
                ],

            'money' =>
                [
                    'class' => 'common\components\CommonMoney',
                ],
        ],
];


return $config;
