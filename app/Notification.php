<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notifications";

    protected $fillable = ['notification_details', 'icon', 'redirect_link', 'user_id', 'viewed'];

    	// Each notification belongs to a user
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
