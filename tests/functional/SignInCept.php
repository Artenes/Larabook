<?php

$I = new FunctionalTester($scenario);

$I->am('a Larabook member');
$I->wantTo('log in to my Larabook account');

$I->signIn();

$I->seeCurrentRouteIs('statuses.index');
$I->see('Welcome back!');

$I->assertTrue(Auth::check());