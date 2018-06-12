<?php

namespace Controller\PrizesController;

class PrizeSet {
    /*
     * Объект PrizeSet содержит Набор призов пользователя или казино. Мы выбираем призы набором чтобы было удобнее
     * отображать информацию о призах на странице . */

    private $prizeNamesSet;

    public function __construct()
    {
        $this->prizeModel = new \Model\Prize\Prize();
        $this->prizeNamesSet = $this->prizeModel->getPrizeAmountList();
    }

    /**
     * @return mixed
     */
    public function setPrizesNames()
    {
        $this->prizeNamesSet = $this->prizeModel->getPrizeNameList();
    }
}

class Prize {
    /*
     * Объект Prize содержит экземпляр одного приза */
    private $id;
    private $amount;
    private $name;
    private $status;
    private $prize;

    public function __construct()
    {
        $this->prizeSet = new \Model\Prize\PrizeSet();
    }

    /**
     * @return mixed
     */
    public function setPrizesNames()
    {
        return $userPrizesNames = $this->prize->getPrizeAmountList();
    }

    public function getUserPrizes($userId) {
        $userPrizeAmounts = $this->prize->getPrizeAmountList($userId);
    }
}