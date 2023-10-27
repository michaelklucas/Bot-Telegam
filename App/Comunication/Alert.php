<?php

namespace App\Comunication;

use TelegramBot\Api\BotApi;

class Alert
{
    const TELEGRAM_BOT_TOKEN = '6099327504:AAGcVPvu4YJZOKlp6CW7XtOLwl5btHo8ijs';
    

    //id chat Regis     5984434956
    //id chat Michael   5692938042

    
    const TELEGRAM_CHAT_IDS = [5692938042];

    public static function sendMessage($message)
    {
        $obBotApi = new BotApi(self::TELEGRAM_BOT_TOKEN);
        foreach (self::TELEGRAM_CHAT_IDS as $chatId) {
            $obBotApi->sendMessage($chatId, $message);
        }
    }
}