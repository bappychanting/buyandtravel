<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        	//Seed the countries
		$this->call('CountriesSeeder');
		$this->command->info('Seeded the countries!'); 
    }
}
