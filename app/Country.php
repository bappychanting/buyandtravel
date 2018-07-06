<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "countries";

        // A Country has many Travel Schedules
    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }
}
