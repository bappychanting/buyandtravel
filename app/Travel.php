<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Travel extends Model
{

    protected $table = "travel_schedules";

    protected $fillable = [
        'country_id', 'city', 'destination', 'arrival_date', 'leave_date', 'tags', 'views', 'additional_details', 'user_id',
    ];

    use SoftDeletes;

    public function scopeSearch($query, $search='')
    {
        if (empty($search)) {
            return $query->whereNull("deleted_at");
        } else {
    		return $query->where('destination', 'LIKE', '%' . $search . '%')
                    ->orWhere('city', 'LIKE', '%' . $search . '%')
                    ->orWhere('tags', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('country', function ($query) use($search){
					    $query->where('name', 'LIKE', '%' . $search . '%');
					})
                    ->orWhereHas('user', function ($query) use($search){
                        $query->where('name', 'LIKE', '%' . $search . '%');
                    })
                    ->whereNull("deleted_at");
        }
    }

    	// Each Travel Schedule belongs to a user
	public function user()
	{
		return $this->belongsTo(User::class);
	}

		// Each Travel Schedule belongs to a country
	public function country()
	{
		return $this->belongsTo(Country::class);
	}
}
