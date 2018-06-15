<?php
namespace Model\Casino;

class Casino extends \Vendor\Db_connection\Db_connection {
    public function getCasinoMoney() {
        $query = "SELECT `money` from `casino` WHERE `id` = 1";
        $query = $this->dbh->prepare($query);
        if ($query != false)
            $query->execute();
        else
            return false;
        $query->bindColumn(1, $money);
        while ($row = $query->fetch(\PDO::FETCH_BOUND)) {
            $money = $money;
        }
        return $money;
    }
}