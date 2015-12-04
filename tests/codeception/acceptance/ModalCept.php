<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('http://multilingual.dev');
$I->waitForElement('#w1 > div > div');
//$I->see('Your language is "English". Please, confirm or select another language:');
$I->getVisibleText('Your language is "English".');
$I->click('#w1 > div > div > div.modal-header > button');
$I->see('Example ENGLISH post', 'a');