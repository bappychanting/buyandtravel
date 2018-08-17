<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    protected $table = "requests";

    protected $fillable = [
        'product_name', 'product_quantity', 'quantity', 'expected_price', 'image', 'reference_link', 'additional_details','travel_schedule_id', 'user_id', 'message_subject_id',
    ];

    use SoftDeletes;
}
