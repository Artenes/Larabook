<?php

use Illuminate\Database\Seeder;
use Larabook\Models\User;

/**
 * Seeder for user table.
 */
class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run()
    {

        factory(User::class, 50)->create();

    }

}
