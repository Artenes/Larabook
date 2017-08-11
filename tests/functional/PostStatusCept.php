<?php

$I = new FunctionalTester($scenario);

$I->am('a Larabook member');
$I->wantTo('post statuses to my profile');

$I->signIn();

$I->amOnRoute('status.index');

$I->postAStatus('My first post');

$I->seeCurrentRouteIs('status.index');
$I->see('My first post');
$I->see('Your status has been updated');
