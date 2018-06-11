<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 10.06.2018
 * Time: 3:00
 */
namespace Controller\ProfilePageController;

use Controller\BaseController\BaseController;

class ProfilePageController extends BaseController{
    public function getViewUri() {
        return [
            'viewUri' => '../view/pages/profile.phtml',
        ];
    }

    public function __invoke()
    {
        $viewContainer = [
            'user' => [
                'login' => 'varezzz1',
                'money' => 0,
                'bonus_balls' => 0,
                'prizes' => [
                    'prize1' => [
                        'name' => 'House',
                        'amount' => 0,
                        'img' => 'img/gift2.png',
                    ],
                    'prize2' => [
                        'name' => 'Car',
                        'amount' => 0,
                        'img' => 'img/gift1.png',
                    ],
                    'prize3' => [
                        'name' => 'Smartphone',
                        'amount' => 0,
                        'img' => 'img/gift3.png',
                    ],
                    'prize4' => [
                        'name' => 'Kick scooter',
                        'amount' => 0,
                        'img' => 'img/gift4.png',
                    ],
                ],
            ],
            'casino' => [
                'money' => 1000000,
                'prizes' => [
                    'prize1' => [
                        'name' => 'House',
                        'amount' => 1,
                        'img' => 'img/gift2.png',
                    ],
                    'prize2' => [
                        'name' => 'Car',
                        'amount' => 10,
                        'img' => 'img/gift1.png',
                    ],
                    'prize3' => [
                        'name' => 'Smartphone',
                        'amount' => 50,
                        'img' => 'img/gift3.png',
                    ],
                    'prize4' => [
                        'name' => 'Kick scooter',
                        'amount' => 100,
                        'img' => 'img/gift4.png',
                    ],
                ]
            ],
        ];
        \Vendor\Util\Util::setSessionVar('viewContainer', $viewContainer);
        return self::getViewUri();
    }
}