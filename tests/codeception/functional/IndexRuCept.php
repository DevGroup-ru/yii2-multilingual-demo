<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Selection of a city with current Url /ru');
$I->setServerData('multilingual.dev', '192.162.57.3');
$I->amOnPage('/ru/');
$I->seeResponseCodeIs(200);
$I->see('Мы не смогли определить ваш город');
$I->seeLink('Пример русского поста', '/ru/post/show?id=2');


