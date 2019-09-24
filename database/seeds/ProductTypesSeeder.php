<?php

use Illuminate\Database\Seeder;

class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\ProductType::truncate(); // delete all previous rows
        factory(App\ProductType::class, 20)->create(); // Create 10 rows
    }
}
