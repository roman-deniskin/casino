<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 10.06.2018
 * Time: 21:32
 */

namespace Vendor\SystemMessenger;

class systemMessenger {
    public function __construct()
    {
        //TODO: Открываем сессию
    }

    public function setMessage() {
        //Устанавливаем системное сообщение
    }

    public function getMessages() {
        //Получаем все сообщения системы
        $this->deleteMessage();
    }

    public function deleteMessage() {
        //Удаляем прочитанные сообщения
    }
}