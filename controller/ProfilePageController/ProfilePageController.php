<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 10.06.2018
 * Time: 3:00
 */
namespace Controller\ProfilePageController;

use Controller\BaseController\BaseController;
use \Vendor\Util\Util;

class ProfilePageController extends BaseController{
    public function getViewUri() {
        return [
            'viewUri' => '../view/pages/profile.phtml',
        ];
    }

    public function __invoke()
    {
        $userId = Util::getSessionVar('userId') ?? Util::getCookieVar('userId');
        $user = new \Model\User\User();
        $userInfo = $user->getUser($userId);
        $prize = new \Model\Prize\Prize();
        $userPrizes = $prize->getUserPrizeList($userId);
        $prizeAmount = [];
        for ($i = 0; $i <= 3; $i++) {
            //var_dump($userPrizes[$i]['type']);
            $prizeAmount[$i+1] = $userPrizes[$i]['count'] ?? 0;
        }
        //$activePrizes = $prize->getActivePrizes();
        $viewContainer = [
            'user' => [
                'login' => $userInfo["login"],
                'money' => $userInfo["money"],
                'bonus_balls' => $userInfo["bonus_balls"],
                'prizes' => [
                    'prize1' => [
                        'name' => 'House',
                        'amount' => $prizeAmount[1],
                        'img' => 'img/gift2.png',
                    ],
                    'prize2' => [
                        'name' => 'Car',
                        'amount' => $prizeAmount[2],
                        'img' => 'img/gift1.png',
                    ],
                    'prize3' => [
                        'name' => 'Smartphone',
                        'amount' => $prizeAmount[3],
                        'img' => 'img/gift3.png',
                    ],
                    'prize4' => [
                        'name' => 'Kick scooter',
                        'amount' => $prizeAmount[4],
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