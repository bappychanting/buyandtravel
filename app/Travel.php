<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{

    protected $table = "travel_schedule";

    protected $fillable = [
        'country_id', 'city', 'destination', 'arrival_date', 'leave_date', 'tags', 'views', 'additional_details', 'user_id',
    ];

    public function scopeSearch($query, $search='')
    {
        if (empty($search)) {
            return $query->whereNull("delete_date");
        } else {
    		return $query->WhereRaw("destination LIKE ? ", '%' . $search . '%')
                    ->orWhereRaw("city LIKE ? ", '%' . $search . '%')
                    ->orWhereHas('country', function ($query) use($search){
					    $query->WhereRaw("name LIKE ? ", '%'.$search.'%');
					})
                    ->whereNull("delete_date");
        }
    }

    	// Each Travel Schedule has a user
	public function user()
	{
		return $this->belongsTo(User::class);
	}

		// Each Travel Schedule has a country
	public function country()
	{
		return $this->belongsTo(Country::class);
	}
}
