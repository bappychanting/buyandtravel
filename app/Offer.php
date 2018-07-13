<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "orders";

    protected $fillable = [
        'product_quantity', 'asking_price', 'delivery_date', 'additional_details', 'accepted', 'delivered', 'recieved', 'order_id', 'user_id',
    ];

    use SoftDeletes;
}
