<?php
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class MyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        	// Write your user id here
        $user_id = 22;

        $count = 1; 
        $arrivalDate = $count;
    	$productTypeIds = App\ProductType::all()->pluck('id')->toArray();
        $countries = DB::table("countries")->pluck("id")->toArray();
        while($count <= 20) {
			$leaveDate = $arrivalDate + 2; 
	    	$travelDate = date("Y-m-d");	                
	        $travel_schedules = [
	            [
	                "country_id"  => $faker->randomElement($countries),
	                "city"  => $faker->city,
	                "destination"  => $faker->streetName,
	                "arrival_date"  => date("Y-m-d", strtotime("$travelDate +".$arrivalDate." day")),
	                "leave_date"  => date("Y-m-d", strtotime("$travelDate +".$leaveDate." day")),
	                "tags"  => "travel, schedule, generated, for, testing, via, factory",
	                "views"  => mt_rand(0,9999),
	                "additional_details"  => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
	                "user_id"  => $user_id,
	                "created_at"    => strftime("%Y-%m-%d %H:%M:%S"),
	                "updated_at"    => strftime("%Y-%m-%d %H:%M:%S")
	            ]
	        ];

	    	DB::table("travel_schedules")->insert($travel_schedules);

	    	$orders = [
	            [
	                'product_name' => $faker->catchPhrase($maxNbChars = 5),
			        'product_type_id' => $faker->randomElement($productTypeIds),
			        'delivery_location' => $faker->address,
			        'expected_price' => mt_rand(100,9999),
			        'reference_link' => $faker->url,
			        'tags' => "order, generated, for, testing, via, factory",
			        'additional_details' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
			        'views' => mt_rand(0,9999),
	                "user_id"  => $user_id,
	                "created_at"    => strftime("%Y-%m-%d %H:%M:%S"),
	                "updated_at"    => strftime("%Y-%m-%d %H:%M:%S")
	            ]
	        ];

	    	DB::table("orders")->insert($orders);

	    	$arrivalDate = $leaveDate+1;
		  	$count++;
		}
    }
}
