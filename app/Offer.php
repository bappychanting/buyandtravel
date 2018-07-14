<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    protected $table = "offers";

    protected $fillable = [
        'product_quantity', 'asking_price', 'delivery_date', 'additional_details', 'accepted', 'delivered', 'recieved', 'order_id', 'user_id',
    ];

    use SoftDeletes;

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
