<?php

namespace app\controllers;


require_once "../vk_api.php";
use vk_api;


class VkController extends \yii\web\Controller
{
public $confirmation_token = '6356bf15';
public $vktoken = '9650e325c7796960ab818f3e0bfcf5f71c1e3b89279941c910eeb6b66c49d08eb3bc9d4a8f4d347709778';
    public function beforeAction($action)
    {
        if (in_array($action->id, ['index'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
    public function actionIndex()
    {
         $vk = new vk_api($this->vktoken, '5.81');
         $data = json_decode(file_get_contents('php://input'));
        switch ($data->type) {
            case 'confirmation':
                echo $this->confirmation_token;
                break;
            case 'message_new':
                $peer_id = $data->object->peer_id;
                $res="hello world";
                $vk->sendOK();


                $vk->sendMessage($peer_id, $res);
                break;
        }
        die;
        return $this->render('index');
    }

}
