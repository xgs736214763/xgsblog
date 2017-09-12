<?php
namespace frontend\widgets\banner;

use Yii;
use yii\base\Widget;

class BannerWidget extends Widget
{

    public $items = [];

    public function init()
    {
        if (empty($this->items)) {
            $this->items = [
                [
                    'label' => 'demo',
                    'image_url' => '/images/banner/01.jpg',
                    'url' => [
                        'site/index'
                    ],
                    'html' => '111',
                    'active' => 'active'
                ],
                [
                    'label' => 'demo1',
                    'image_url' => '/images/banner/02.jpg',
                    'url' => [
                        'post/index'
                    ],
                    'html' => ''
                ],
                [
                    'label' => 'demo2',
                    'image_url' => '/images/banner/03.jpg',
                    'url' => [
                        'site/index'
                    ],
                    'html' => ''
                ]
            ];
        }
    }

    public function run()
    {
        $data['items'] = $this->items;
        return $this->render('index', [
            'data' => $data
        ]);
    }
}