<?php

namespace Controller\PrizesController;
use Vendor\Util\Util;

class AbstractPrize {
    protected $userId;

    public function __construct()
    {
        $this->userId = Util::getSessionVar('userId') ?: Util::getCookieVar('userId');
    }
}