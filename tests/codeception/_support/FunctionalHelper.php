<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I


use yii\base\Application;

class FunctionalHelper extends \Codeception\Module
{

    public static $geoHandlers = [];


    public function setServerData($sererName = "", $ip = '192.168.0.1')
    {
        /** @var Yii2 $module */
        $module = $this->getModule('Yii2');
        $module->client->setServerParameter('SERVER_NAME', $sererName);
        $module->client->setServerParameter('HTTP_HOST', $sererName);
        $module->client->setServerParameter('HTTP_CLIENT_IP', $ip);
        $module->client->setServerParameter('REMOTE_ADDR', $ip);
    }

    public function setMultilingualHandlers($data = [])
    {
        /** @var Yii2 $module */
        $module = $this->getModule('Yii2');
        $module->client->setServerParameter('multilingual_handlers', $data);
    }


    public function getServerData()
    {
        return $_SERVER;
    }


}
