<?php
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('page/index');

$I->see('Please, confirm your city', 'div.modal-header');
