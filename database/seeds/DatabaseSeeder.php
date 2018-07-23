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

        	// Seed the countries
		$this->call('CountriesSeeder');
		$this->command->info('Seeded the countries!');

            // Seed the product types
        $this->call(ProductTypesSeeder::class);
        $this->command->info('Seeded the product types!');

            // Seed the users
        $this->call(UsersSeeder::class);
        $this->command->info('Seeded the users!');

            // Seed the Oders
        $this->call(OrdersTableSeeder::class);
        $this->command->info('Seeded the orders!');

            // Seed the travel schedules
        $this->call('TravelSchedulesTableSeeder');
        $this->command->info('Seeded the travel schedules!');

            // Seed my own data
        /*$this->call('MyUserSeeder');
        $this->command->info('Seeded your user data!');*/
    }
}
