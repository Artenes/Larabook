<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Larabook\Models\User;

class Functional extends \Codeception\Module
{

    /**
     * Login a user.
     */
    public function logIn()
    {

        $email = 'email@example.com';
        $password = 'secret';

        $this->haveAnAccount(compact('email', 'password'));

        $I = $this->getModule('Laravel5');

        $I->amOnRoute('login');
        $I->fillField('email', $email);
        $I->fillField('password', $password);
        $I->click('button#login');

    }

    /**
     * Creates a user.
     *
     * @param array $overrides
     */
    public function haveAnAccount($overrides = [])
    {

        factory(User::class)->create($overrides);

    }

}
