<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "countries";

        // A Country has many Travel Schedules
    public function travels()
    {
        return $this->hasMany(Travel::class);
    }
}
