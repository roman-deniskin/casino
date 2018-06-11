<?php
namespace Model\Prize;

class Prize extends \Vendor\Db_connection\Db_connection {
    public function getUserPrizeList($userId)
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
        $prizeRow = $query->fetchAll();
        return $prizeRow;//Возвращает массив значений без обработки т.к. возвращается множество данных
    }
}