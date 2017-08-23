<?php

$I = new FunctionalTester($scenario);

$I->am('a Larabook member');
$I->wantTo('post statuses to my profile');

$I->signIn();

$I->amOnRoute('statuses.index');

$I->postAStatus('My first post');

$I->seeCurrentRouteIs('statuses.index');
$I->see('My first post');
$I->see('Your status has been updated');
