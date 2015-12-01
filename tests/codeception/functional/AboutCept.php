<?php

use tests\codeception\_pages\AboutPage;
use yii\codeception\BasePage;

/* @var $scenario Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that about works');
$I->amOnPage('http://multilingual.dev/ru/');
//AboutPage::openBy($I, ['post/index']);
$I->see('Пример многоязычного поста', 'a');
