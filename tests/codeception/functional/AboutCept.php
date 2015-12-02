<?php

use tests\codeception\_pages\AboutPage;
use yii\codeception\BasePage;

/* @var $scenario Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that about works');
$I->setServerData('multilingual.dev', '192.162.57.3');
//$I->setHeader('Host', 'multilingual.dev');

$I->amOnPage('/ru/');
//\Codeception\Util\Debug::debug($I->grabTextFrom('body')); exit(33);
//AboutPage::openBy($I, ['post/index']);
$I->seeResponseCodeIs(200);

//$I->see('Пример многоязычного поста', 'a');