<?php
$device="vk_bot";
require_once 'vk_api.php';
if (!isset($_REQUEST)) {
    return;
}

$confirmation_token = '6356bf15';
$token = '9650e325c7796960ab818f3e0bfcf5f71c1e3b89279941c910eeb6b66c49d08eb3bc9d4a8f4d347709778';

$vk = new vk_api($token, '5.81');
$data = json_decode(file_get_contents('php://input'));
switch ($data->type) {
    case 'confirmation':
        echo $confirmation_token;
        break;
    case 'message_new':



   // $vk->sendMessage($peer_id, $res['msg']);
        break;
}