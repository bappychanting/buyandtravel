<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "product_types";

        // A Country has many Travel Schedules
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
