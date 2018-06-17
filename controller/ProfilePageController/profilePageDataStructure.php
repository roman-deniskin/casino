<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 12.06.2018
 * Time: 7:07
 */

namespace Controller\ProfilePageController;
use \Vendor\Util\Util;

class ProfilePageDataStructure {
    private static $viewContainer;

    private static function dataSetter() {
        /* Дадее идёт некий код, который просто выводит текущие значения на страницу профиля. Логика тут не реализуется
        и не должна как то влиять на базу. Просто настраиваем View */
        $userId = \Vendor\Util\Util::getSessionVar('userId') ?? Util::getCookieVar('userId');
        $user = new \Model\User\User();
        $userInfo = $user->getUser($userId);
        $prize = new \Model\Prize\Prize();
        $gameType = Util::getSessionVar('lastGameType') ?? -1;
        if ($gameType == 3)//Проверяем, был ли разыгран приз в последней игре
            $lastPrize = Util::getSessionVar('lastPrize') ?? -1;
        else
            $lastPrize = -1;
        $casino = new \Model\Casino\Casino();
        $casinoMoney = $casino->getCasinoMoney();
        $userPrizeAmounts = $prize->getPrizeAmountList($userId);
        $casinoPrizeAmounts = $prize->getPrizeAmountList(0);
        $userPrizeNames = $prize->getPrizeNameList();
        $unconfirmedPrize = $prize->checkLastUnconfirmedPrize();
        $moneyToBonuses = \Controller\PrizesController\BonusBalls::showCourseMoneyToBonuses($userInfo["unconfirmed_money"]);
        $prizeToBonuses = \Controller\PrizesController\BonusBalls::showCoursePrizesToBonuses($unconfirmedPrize['type']);
        $userPrizeAmount = [];
        $casinoPrizeAmount = [];
        $prizeName = [];
        $prizeStatus = [];
        for ($i = 0; $i <= 3; $i++) {
            $userPrizeAmount[$i] = $userPrizeAmounts[$i+1] ?? 0;
            $casinoPrizeAmount[$i] = $casinoPrizeAmounts[$i+1] ?? 0;
            $prizeName[$i] = $userPrizeNames[$i+1] ?? 'Prize'.$i;
        }
        //$activePrizes = $prize->getActivePrizes();
        self::$viewContainer = [
            'user' => [
                'login' => $userInfo["login"],
                'money' => $userInfo["money"],
                'bonus_balls' => $userInfo["bonus_balls"],
                'unconfirmed_money' => $userInfo["unconfirmed_money"],
                'money_to_bonuses' => $moneyToBonuses,
                'prize_to_bonuses' => $prizeToBonuses,
                'unconfirmed_prize' => [
                    'id' => $unconfirmedPrize['id'],
                    'name' => $unconfirmedPrize['name'],
                    'type' => $unconfirmedPrize['type'],
                    'is_confirmed' => $unconfirmedPrize['is_confirmed'],
                ],
                'last_game' => [
                    'game_type' => $gameType,
                    'prize' => $lastPrize,
                ],
                'prizes' => [
                    'prize1' => [
                        'name' => $prizeName[0],
                        'status' => $prizeStatus[0],
                        'amount' => $userPrizeAmount[0],
                        'img' => 'img/gift2.png',
                    ],
                    'prize2' => [
                        'name' => $prizeName[1],
                        'status' => $prizeStatus[1],
                        'amount' => $userPrizeAmount[1],
                        'img' => 'img/gift1.png',
                    ],
                    'prize3' => [
                        'name' => $prizeName[2],
                        'status' => $prizeStatus[2],
                        'amount' => $userPrizeAmount[2],
                        'img' => 'img/gift3.png',
                    ],
                    'prize4' => [
                        'name' => $prizeName[3],
                        'status' => $prizeStatus[3],
                        'amount' => $userPrizeAmount[3],
                        'img' => 'img/gift4.png',
                    ],
                ],
            ],
            'casino' => [
                'money' => $casinoMoney,
                'prizes' => [
                    'prize1' => [
                        'name' => $prizeName[0],
                        'amount' => $casinoPrizeAmount[0],
                        'img' => 'img/gift2.png',
                    ],
                    'prize2' => [
                        'name' => $prizeName[1],
                        'amount' => $casinoPrizeAmount[1],
                        'img' => 'img/gift1.png',
                    ],
                    'prize3' => [
                        'name' => $prizeName[2],
                        'amount' => $casinoPrizeAmount[2],
                        'img' => 'img/gift3.png',
                    ],
                    'prize4' => [
                        'name' => $prizeName[3],
                        'amount' => $casinoPrizeAmount[3],
                        'img' => 'img/gift4.png',
                    ],
                ],
            ],
        ];
    }

    public static function getProfilePageData() {
        self::dataSetter();
        return self::$viewContainer;
    }

    public static function getProfilePageDataJson() {
        $data = ProfilePageDataStructure::getProfilePageData();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}