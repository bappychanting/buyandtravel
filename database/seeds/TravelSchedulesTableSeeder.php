<?php
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class TravelSchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = DB::table("users")->pluck("id");
        $countries = DB::table("countries")->pluck("id")->toArray();

        if(count($users) > 0){
            foreach ($users as $user) {
                $count = 1; 
                $arrivalDate = $count;
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
	                        "user_id"  => $user,
                            "created_at"  => strftime("%Y-%m-%d %H:%M:%S"),
                            "updated_at"  => strftime("%Y-%m-%d %H:%M:%S")
	                    ]
	                ];

                	DB::table("travel_schedules")->insert($travel_schedules);
                	$arrivalDate = $leaveDate+1;
				  	$count++;
				}

            }

        }
    }
}
