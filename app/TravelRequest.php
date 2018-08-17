<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelRequest extends Model
{
    protected $table = "requests";

    protected $fillable = [
        'product_name', 'quantity', 'expected_price', 'image', 'reference_link', 'additional_details', 'accepted', 'delivered', 'recieved', 'travel_schedule_id', 'user_id', 'message_subject_id',
    ];

    use SoftDeletes;
}
