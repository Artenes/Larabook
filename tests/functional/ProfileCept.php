<?php

$I = new FunctionalTester($scenario);

$I->am('a Larabook member');
$I->wantTo('view my profile');

$I->signIn();
$I->postAStatus('Oh no, back to the lab again!');

$I->click('Profile');

$I->amOnRoute('statuses.index', 'Foobar');

$I->see('Oh no, back to the lab again!');
