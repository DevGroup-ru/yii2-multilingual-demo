<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use DevGroup\Multilingual\Multilingual;
use yii\base\Application;
use yii\di\ServiceLocator;

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
        $_SERVER['HTTP_CLIENT_IP'] = $ip;

    }

    public function setGeoProvider($config = [])
    {
        /** @var Yii2 $module */
        $module = $this->getModule('Yii2');
        $module->app->multilingual->handlers = $config;
        $module->app->multilingual->retrieveInfo();

    }


    public function getServerData()
    {
        return $_SERVER;
    }


}
