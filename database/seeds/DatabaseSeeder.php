<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Database seeder.
 */
class DatabaseSeeder extends Seeder
{

    /**
     * @var array
     */
    protected $tables = [

        'users', 'statuses',

    ];

    /**
     * @var array
     */
    protected $seeders = [

        UserTableSeeder::class,
        StatusTableSeeder::class,

    ];

    /**
     * Run the database seeds.
     */
    public function run()
    {

        $this->cleanDatabase();

        foreach($this->seeders as $seeder){

            $this->call($seeder);

        }

    }

    /**
     * Truncate tables from database.
     */
    private function cleanDatabase()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach($this->tables as $table) {

            DB::table($table)->truncate();

        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }

}
