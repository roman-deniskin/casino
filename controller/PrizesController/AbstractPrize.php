<?php

namespace Controller\PrizesController;
use Vendor\Util\Util;

class AbstractPrize {
    protected $userId;

    public function __construct()
    {
        $this->userId = Util::getSessionVar('userId') ?: Util::getCookieVar('userId');
    }
    
    public function saveLastGameType($lastGameType)
    {
        \Vendor\Util\Util::setSessionVar('lastGameType', $lastGameType);
    }

    public function saveLastPrize($lastPrizeType) {
        \Vendor\Util\Util::setSessionVar('lastPrize', $lastPrizeType);
    }
}