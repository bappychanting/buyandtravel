<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductRequest extends Model
{
    protected $table = "requests";

    protected $fillable = [
        'product_name', 'quantity', 'expected_price', 'image', 'reference_link', 'additional_details', 'accepted', 'delivered', 'recieved', 'travel_schedule_id', 'user_id', 'message_subject_id',
    ];

    use SoftDeletes;

    public function scopeSearch($query, $search='')
    {
        if (empty($search)) {
            return $query->WhereHas('travel_schedule');
        } else {
    		return $query->where('product_name', 'LIKE', '%' . $search . '%')
	                    ->orWhereHas('travel_schedule', function ($query) use($search){
	                    	$query->where('destination', 'LIKE', '%' . $search . '%')
		                    ->orWhere('city', 'LIKE', '%' . $search . '%')
		                    ->orWhere('tags', 'LIKE', '%' . $search . '%')
		                    ->orWhereHas('country', function ($q) use($search){
							    $q->where('name', 'LIKE', '%' . $search . '%');
							})
		                    ->orWhereHas('user', function ($q) use($search){
	                        	$q->where('name', 'LIKE', '%' . $search . '%');
	                    	});
						});
        }
    }

    	// Each Ofer belongs to a user
	public function user()
	{
		return $this->belongsTo(User::class);
	}

		// Each Travel Schedule belongs to an order
	public function travel_schedule()
	{
		return $this->belongsTo(Travel::class);
	}
       
}
