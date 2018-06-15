<?php

namespace Controller\PrizesController;

use Controller\ProfilePageController\ProfilePageDataStructure;
use Controller\PrizesController\BonusBalls;

class Prize extends AbstractPrize {
    

    public function __construct()
    {
        parent::__construct();
    }

    public function getPrize() {
        $prizeListIds = [0, 1, 2, 3];//Список типов призов присутствующих в системе
        for (;;) {
            $prizeType = rand(0, 3);
            if ($prizeListIds == []) {
                //Массив пуст. Отправляем вместо приза бонусные баллы.
                $bonuses = BonusBalls::showCoursePrizesToBonuses($prizeType);
                $prizeImpl = new \Model\Prize\Prize;
                $prizeImpl->addBonusBalls($bonuses);
            }
            if (empty($prizeListIds[$prizeType]))//Есть ли этот номер в списке призов
                continue;
            $prizeImpl = new \Model\Prize\Prize;
            $prizeExist = $prizeImpl->checkPrize($prizeType);//Возвращает true если приз есть в Казино
            if ($prizeExist == true) {
                $prizeImpl->sendPrizeToUser($prizeType);
                break;
            } else {
                //Приз не существует. Удаляем его из массива.
                unset($prizeListIds[$prizeType]);
            }
        }
        ProfilePageDataStructure::getProfilePageDataJson();
        exit;
    }
}