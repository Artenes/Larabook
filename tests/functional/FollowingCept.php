<?php

use Larabook\Models\User;

$I = new FunctionalTester($scenario);

$I->am('a Larabook user');
$I->wantTo('follow other Larabook user');

$I->haveAnAccount(['name' => 'other.user']);
$I->signin();

$I->click('Browse Users');
$I->click('other.user');

$I->seeCurrentRouteIs('user.profile', 'other.user');
$I->click('Follow other.user');
$I->seeCurrentRouteIs('user.profile', 'other.user');
$I->see('You are following other.user');
$I->dontSee('Follow other.user');
