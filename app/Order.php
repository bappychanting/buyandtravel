<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = [
        'product_name', 'product_type_id', 'delivery_location', 'expected_price', 'reference_link', 'additional_details', 'views', 'user_id',
    ];

    use SoftDeletes;

    	// Each Travel Schedule has a user
	public function user()
	{
		return $this->belongsTo(User::class);
	}

		// Each Travel Schedule has a country
	public function product_type()
	{
		return $this->belongsTo(ProductType::class);
	}
}
