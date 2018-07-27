<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageSubject extends Model
{
    protected $table = "message_subjects";

    protected $fillable = ['subject'];

    use SoftDeletes;

        // A MessageSubject has many messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
