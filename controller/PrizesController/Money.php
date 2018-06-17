<?php

namespace Controller\PrizesController;

class Money extends AbstractPrize{
    public function __construct()
    {
        parent::__construct();
        $money = rand(100, 10000);
        $moneyImpl = new \Model\Prize\Prize;
        $casinoTransaction = $moneyImpl->getCasinoMoney($money);
        if ($casinoTransaction == true) {
            $this->saveLastGameType(2);
            $moneyImpl->addUserMoney($money);
        } else {
            $bonusImpl = new \Controller\PrizesController\BonusBalls;
            $bonusImpl->changeMoneyToBonuses($money);
        }
    }
}