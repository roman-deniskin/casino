<?php
namespace Model\Prize;

class Prize extends \Vendor\Db_connection\Db_connection {
    public function getPrizeAmountList($userId = 0)
    {
        if (!empty($userId)) {
            $userId = $this->dbh->quote($userId);
        }
        $query = "SELECT `type`, COUNT(`id`) AS `count` from `prizes` WHERE `userId` = $userId GROUP BY `type`";
        $query = $this->dbh->prepare($query);
        if ($query != false)
            $query->execute();
        else
            return false;
        $query->bindColumn(1, $type);
        $query->bindColumn(2, $count);
        $prizeRow = [];
        while ($row = $query->fetch(\PDO::FETCH_BOUND)) {
            $prizeRow[$type] = $count;
        }
        return $prizeRow;//Возвращает массив значений без обработки т.к. возвращается множество данных
    }

    public function getPrizeNameList() {
        $query = "SELECT `type`, `name` from `prizes` GROUP BY `type`, `name`";
        $query = $this->dbh->prepare($query);
        if ($query != false)
            $query->execute();
        else
            return false;
        $query->bindColumn(1, $type);
        $query->bindColumn(2, $name);
        $prizeName = [];
        while ($row = $query->fetch(\PDO::FETCH_BOUND)) {
            $prizeName[$type] = $name;
        }
        return $prizeName;//Возвращает массив значений без обработки т.к. возвращается множество данных
    }
}