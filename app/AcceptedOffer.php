<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcceptedOffer extends Model
{
    protected $table = "accepted_offers";

   	protected $fillable = ['recieved', 'order_id', 'offer_id'];

    use SoftDeletes;

		// Each accepted offer belongs to a offer
	public function offer()
	{
		return $this->belongsTo(Offer::class);
	}

		// Each accepted offer belongs to a order
	public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
