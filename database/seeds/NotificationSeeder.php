<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Notifications\GeneralNotification;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
		$users = App\User::all();
		foreach ($users as $user) {	  
			$count = 0;
			while($count <= 20) {
            	$user->notify(new GeneralNotification(['text' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))), 
            										'link' => $faker->url(), 
            										'icon' => 'bell']));
				$count++;
			}              
		}
    }
}
