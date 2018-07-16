<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\Order::truncate(); // delete all previous rows
		factory(App\Order::class, 400)->create(); // Create 10 rows
    }
}
