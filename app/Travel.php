<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table = "travel_schedule";

    protected $fillable = [
        'country_id', 'city', 'destination', 'arrival_date', 'leave_date', 'tags', 'views', 'additional_details', 'user_id',
    ];
}
