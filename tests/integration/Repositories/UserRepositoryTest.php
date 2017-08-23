<?php

use Codeception\Test\Unit;
use Larabook\Models\User;
use Larabook\Models\Status;
use Larabook\Repositories\UserRepository;

/**
 * Testo for UserRepository class.
 */
class UserRepositoryTest extends Unit
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

    /** @test */
    public function it_finds_a_user_with_statuses_by_their_name()
    {

        $user = factory(User::class)->create();
        factory(Status::class, 3)->create(['user_id' => $user->id]);

        $foundUser = $this->repo->findByName($user->name);

        $this->assertEquals($user->name, $foundUser->name);
        $this->assertCount(3, $foundUser->statuses);

    }

}
