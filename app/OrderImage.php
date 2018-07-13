<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderImage extends Model
{
    protected $table = "order_images";

    protected $fillable = ['src', 'alt', 'order_id'];

    	// Each Order image belongs to a order
	public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
