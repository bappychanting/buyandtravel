<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table = "travel_schedule";

    protected $fillable = [
        'country_id', 'city', 'destination', 'arrival_date', 'leave_date', 'tags', 'views', 'additional_details', 'user_id',
    ];

    	// Each Travel Schedule has a user
	public function user()
	{
		return $this->belongsTo(User::class);
	}

		// Each Travel Schedule has a country
	public function country()
	{
		return $this->hasOne(Country::class);
	}
}
