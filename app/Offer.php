<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    protected $table = "offers";

    protected $fillable = [
        'product_quantity', 'asking_price', 'delivery_date', 'additional_details', 'message_subject_id', 'order_id', 'user_id',
    ];

    use SoftDeletes;

    public function scopeSearch($query, $search='')
    {
        if (empty($search)) {
            return $query->WhereHas('order');
        } else {
    		return $query->WhereHas('order', function ($query) use($search){
					       $query->where('product_name', 'LIKE', '%' . $search . '%'
                        )
	                    ->orWhere('delivery_location', 'LIKE', '%' . $search . '%')
	                    ->orWhere('tags', 'LIKE', '%' . $search . '%')
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

		// Each Offer belongs to an order
	public function order()
	{
		return $this->belongsTo(Order::class);
	}
       
        // A offer can be accepted once
    public function accepted()
    {
        return $this->hasOne(AcceptedOffer::class);
    }
}
