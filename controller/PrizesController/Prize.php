<?php

namespace Controller\PrizesController;

use Controller\ProfilePageController\ProfilePageDataStructure;
use Controller\PrizesController\BonusBalls;

class Prize extends AbstractPrize {
    

    public function __construct()
    {
        parent::__construct();
        $this->getPrize();
    }

    public function getPrize() {
        $prizeListIds = [1=>true, 2=>true, 3=>true, 4=>true];//Список типов призов присутствующих в системе
        $prizeImpl = new \Model\Prize\Prize;
        for (;;) {
            $prizeType = rand(1, 4);
            if (empty($prizeListIds)) {
                //Массив пуст. Отправляем вместо приза бонусные баллы.
                $bonuses = BonusBalls::showCoursePrizesToBonuses($prizeType);
                $prizeImpl = new \Model\Prize\Prize;
                $prizeImpl->addBonusBalls($bonuses);
                break;
            }
            if (!array_key_exists ($prizeType, $prizeListIds))//Есть ли этот номер в списке призов
            {
                //echo 'continue' . $prizeListIds. ' ' . $prizeType . '<br>';
                continue;
            }
            $prizeExist = $prizeImpl->checkPrize($prizeType);//Возвращает true если приз есть в Казино
            if ($prizeExist == true) {
                $this->saveLastGameType(3);
                $this->saveLastPrize($prizeType);
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