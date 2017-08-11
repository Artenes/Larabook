<?php

$I = new FunctionalTester($scenario);

$I->am('a Larabook member');
$I->wantTo('log in to my Larabook account');

$I->logIn();

$I->seeCurrentRouteIs('statuses');
$I->see('Welcome back!');

$I->assertTrue(Auth::check());