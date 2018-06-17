<?php

namespace Controller\PrizesController;

class BonusBalls extends AbstractPrize{
    public function __construct()
    {
        parent::__construct();
        $bonusBalls = rand(100, 10000);
        $BonusBallsImpl = new \Model\Prize\Prize;
        $BonusBallsImpl->addBonusBalls($bonusBalls);
    }

    public static function showCourseMoneyToBonuses($money) {
        /*
         * Тут ведётся расчёт коэффициэнта.
         * 1) от 0 до 500 - 1.2
         * 2) от 500 до 1500 - 1.5
         * 3) от 1500 до 5000 - 3
         * 4) выще 5000 - 7.5
         */
        $coefficient = 0;
        switch ($money) {
            case ($money < 500):
                $coefficient = $money * 1.2;
                break;
            case ($money > 500 && $money < 1500):
                $coefficient = $money * 1.5;
                break;
            case ($money > 1500 && $money < 5000):
                $coefficient = $money * 1.3;
                break;
            case ($money > 5000):
                $coefficient = $money * 7.5;
                break;
        }
        return $coefficient;
    }

    public static function showCoursePrizesToBonuses($prizeType) {
        $bonuses = 0;
        switch ($prizeType) {
            case 1:
                $bonuses = 1000000000;
                break;
            case 2:
                $bonuses = 10000000;
                break;
            case 3:
                $bonuses = 100000;
                break;
            case 4:
                $bonuses = 50000;
                break;
        }
        return $bonuses;
    }

    public function changeMoneyToBonuses($money) {
        $this->saveLastGame(1);
        $bonuses = self::showCourseMoneyToBonuses($money);
        $prizeImpl = new \Model\Prize\Prize;
        $prizeImpl->addBonusBalls($bonuses);
    }
}