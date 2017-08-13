<?php

use Codeception\Test\Unit;
use IntegrationTester;
use Larabook\Models\User;
use Larabook\Repositories\UserRepository;

/**
 * Testo for UserRepository class.
 */
class UserRespositoryTest extends Unit
{

    /**
     * @var IntegrationTester
     */
    protected $tester;

    /**
     * @var UserRepository
     */
    protected $repo;

    protected function _before()
    {

        $this->repo = new UserRepository();

    }

    /** @test */
    public function it_paginates_all_users()
    {

        factory(User::class, 4)->create();

        $results = $this->repo->getPaginated(2);

        $this->assertCount(2, $results);

    }

}
