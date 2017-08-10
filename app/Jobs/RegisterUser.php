<?php

namespace Larabook\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Larabook\Models\User;
use Larabook\Repositories\UserRepository;

/**
 * User registration job.
 *
 * @package Larabook\Jobs
 */
class RegisterUser
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * User full name.
     *
     * @var string
     */
    private $name;

    /**
     * User email.
     *
     * @var string
     */
    private $email;

    /**
     * User unhashed password.
     *
     * @var string
     */
    private $password;

    /**
     * Create a new job instance.
     *
     * @param $name
     * @param $email
     * @param $password
     */
    public function __construct($name, $email, $password)
    {

        $this->name = $name;
        $this->email = $email;
        $this->password = $password;

    }

    /**
     * Execute the job.
     *
     * @param UserRepository $repo
     * @return User
     */
    public function handle(UserRepository $repo)
    {

        $user = User::register($this->name, $this->email, $this->password);

        $repo->save($user);

        return $user;

    }

}
