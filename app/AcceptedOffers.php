<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcceptedOffers extends Model
{
    protected $table = "accepted_offers";

    /*protected $fillable = [
        'product_quantity', 'asking_price', 'delivery_date', 'additional_details', 'accepted', 'rejected','delivered', 'recieved', 'order_id', 'user_id',
    ];*/

    use SoftDeletes;
}
