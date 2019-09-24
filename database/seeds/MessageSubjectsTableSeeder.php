<?php

use Illuminate\Database\Seeder;

class MessageSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\MessageSubject::truncate(); // delete all previous rows
		factory(App\MessageSubject::class, 20)->create(); // Create 10 rows
    }
}
