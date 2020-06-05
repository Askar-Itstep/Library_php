<?php

require './vendor/autoload.php';

use Telegram\Bot\Api;

// $telegram = new Api('1070408140:AAEasMFqZ7BpqToJIMAwepNJ5I5z2olAOt4');
$telegram = new Api('1266380208:AAF7Tf5fd9Gttvdcm62AePfGJx2qo_w0GuM');

$params = [];
while(true) {
    $results = $telegram->getUpdates($params);
    // print_r($results); die;
    foreach($results as $result) {
        $params['offset'] = $result['update_id'] + 1;
        $chat_id = $result['message']['chat']['id'];
        $text = $result['message']['text'];
        if($text == '/start') {
            $keyboards = [
                ['Авторизация'],
                ['О нас']
            ];
            $reply_markup = $telegram->replyKeyboardMarkup([
                'keyboard' => $keyboards,
                'resize_keyboard' => true,
                'one_time_keyboard' => false
            ]);
            $reply = 'Добро пожаловать, я бот, чем могу помочь?';
            $telegram->sendMessage([
                'chat_id' => $chat_id,
                'text' => $reply,
                'reply_markup' => $reply_markup
            ]);
        }
        if($text == 'Авторизация') {
            $reply = 'Введите логин и пароль <b>"login:password"</b>?';
            $telegram->sendMessage([
                'chat_id' => $chat_id,
                'text' => $reply,
                'parse_mode' => 'HTML'
            ]);
        }
        $explode = explode(':', $text);
        if(count($explode) == 2) {
            echo 'Auth';
        }
    }
    sleep(5);
}