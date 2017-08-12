<?php

use Illuminate\Database\Seeder;
use Larabook\Models\Status;
use Larabook\Models\User;

/**
 * Seeder for statuses table.
 */
class StatusTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run()
    {

        $users = User::pluck('id')->all();

        foreach(range(1,50) as $index) {

            factory(Status::class)->create(['user_id' => array_random($users)]);

        }

    }

}
