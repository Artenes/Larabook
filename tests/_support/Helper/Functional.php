<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Larabook\Models\User;
use Larabook\Models\Status;

class Functional extends \Codeception\Module
{

    /**
     * Login a user.
     */
    public function signIn()
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
     * @return User
     */
    public function haveAnAccount($overrides = [])
    {

        return factory(User::class)->create($overrides);

    }

    /**
     * Post a new status.
     *
     * @param $body
     */
    public function postAStatus($body)
    {

        $I = $this->getModule('Laravel5');
        $I->fillField('status', $body);
        $I->click('Post Status');

    }
    
}
