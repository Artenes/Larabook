<?php

use IntegrationTester;
use Larabook\Models\Status;
use Larabook\Models\User;
use Larabook\Repositories\StatusRepository;

/**
 * Integration test for StatusRepository.
 */
class StatusRepositoryTest extends \Codeception\Test\Unit
{

    /**
     * @var IntegrationTester
     */
    protected $tester;

    /**
     * @var StatusRepository
     */
    protected $repo;

    protected function _before()
    {

        $this->repo = new StatusRepository;

    }

    /** @test */
    public function is_gets_all_statuses_for_a_user()
    {

        $users = factory(User::class, 2)->create();

        factory(Status::class, 2)->create([
            'user_id' => $users->get(0)->id,
            'body' => 'My status',
        ]);

        factory(Status::class, 2)->create([
            'user_id' => $users->get(1)->id,
            'body' => 'His status',
        ]);

        $statuses = $this->repo->getAllForUser($users->first()->id);

        $this->assertCount(2, $statuses);
        $this->assertEquals('My status', $statuses[0]['body']);
        $this->assertEquals('My status', $statuses[1]['body']);

    }

    /** @test */
    public function it_saves_a_status_for_a_user()
    {

        $status = factory(Status::class)->make();

        $user = factory(User::class)->create();

        $saved = $this->repo->save($status, $user->id);

        $this->tester->seeRecord('statuses', [

            'body' => $status->body,
            'user_id' => $user->id,

        ]);

        $this->assertTrue($saved);

    }
    
}
