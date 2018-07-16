<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::truncate(); // delete all previous rows
		factory(App\User::class, 20)->create(); // Create 10 rows
    }
}
