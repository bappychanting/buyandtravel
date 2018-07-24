<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfferMessage extends Model
{
    protected $table = "offer_messages";

    protected $fillable = ['message_body', 'order_id', 'user_id', 'seen'];

    use SoftDeletes;
}
