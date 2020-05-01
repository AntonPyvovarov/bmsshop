<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public function telegram ($massage)
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        $response = $telegram->sendMessage([
            'chat_id' => env('CHAT_ID'),
            'text' => $massage,
        ]);
        $messageId = $response->getMessageId();
    }
}
