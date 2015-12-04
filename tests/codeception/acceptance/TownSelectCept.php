<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('testing city select');
$I->amOnPage('/ru/');
$I->getVisibleText('Please, confirm your city');
$I->click('#w1 > div > div > div.modal-body > ul > li:nth-child(1) > a');
$I->see('Мы определили ваш город, как "Tambov". (Russia)');
