<?php

$I = new FunctionalTester($scenario);

$I->am('a Larabook member');
$I->wantTo('list all users who are registered for Larabook');

$I->haveAnAccount(['name' => 'Foo']);
$I->haveAnAccount(['name' => 'Bar']);

$I->amOnRoute('users.index');
$I->see('Foo');
$I->see('Bar');
