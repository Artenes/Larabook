<?php 
$I = new FunctionalTester($scenario);

$I->am('guest');
$I->wantTo('sign up for a Larabook account');

$I->amOnRoute('home');
$I->click('Sign up!');
$I->seeCurrentRouteIs('register');

$I->fillField('name', 'Jonh Doe');
$I->fillField('email', 'john@example.com');
$I->fillField('password', 'secret');
$I->fillField('password_confirmation', 'secret');
$I->click('Register');

$I->seeCurrentRouteIs('home');
$I->see('Welcome to Larabook!');

$I->seeRecord('users', [

    'name' => 'Jonh Doe',
    'email' => 'john@example.com',

]);