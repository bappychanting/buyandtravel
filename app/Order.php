<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = [
        'product_name', 'product_type_id', 'delivery_location', 'expected_price', 'reference_link', 'tags', 'additional_details', 'views', 'user_id',
    ];

    use SoftDeletes;

    public function scopeSearch($query, $search='')
    {
        if (empty($search)) {
            return $query->whereNull("deleted_at");
        } else {
    		return $query->where('product_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('delivery_location', 'LIKE', '%' . $search . '%')
                    ->orWhere('tags', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('product_type', function ($query) use($search){
					    $query->where('product_type', 'LIKE', '%' . $search . '%');
					})
                    ->orWhereHas('user', function ($query) use($search){
                        $query->where('name', 'LIKE', '%' . $search . '%');
                    })
                    ->whereNull("deleted_at");
        }
    }

    	// Each Travel Schedule belongs to a user
	public function user()
	{
		return $this->belongsTo(User::class);
	}

		// Each Travel Schedule belongs to a country
	public function product_type()
	{
		return $this->belongsTo(ProductType::class);
	}

        // A Order has many images
    public function images()
    {
        return $this->hasMany(OrderImage::class);
    }

        // A Order has many offers
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

        // A Order may have one accepted offer
    public function accepted()
    {
        return $this->hasOne(AcceptedOffer::class);
    }

}
