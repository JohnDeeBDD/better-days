<?php
/** @group Smoke */
$I = new AcceptanceTester($scenario);
$I->wantToTest('Acceptance suite can load the homepage');
$I->amOnPage('/');
$I->waitForElement('body', 10);
$I->seeElement('body');