<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    protected $table = "offers";

    protected $fillable = [
        'product_quantity', 'asking_price', 'delivery_date', 'additional_details', 'accepted', 'rejected','delivered', 'recieved', 'order_id', 'user_id',
    ];

    use SoftDeletes;

    public function scopeSearch($query, $search='')
    {
        if (empty($search)) {
            return $query->whereNull("deleted_at");
        } else {
    		return $query->WhereHas('order', function ($query) use($search){
					       $query->where('product_name', 'LIKE', '%' . $search . '%'
                        )
	                    ->orWhere('delivery_location', 'LIKE', '%' . $search . '%')
	                    ->orWhere('tags', 'LIKE', '%' . $search . '%')
	                    ->orWhereHas('user', function ($query) use($search){
                        	$query->where('name', 'LIKE', '%' . $search . '%');
                    	});
					})
					->whereNull("deleted_at");
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
}
