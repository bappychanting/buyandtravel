<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageSubject extends Model
{
    protected $table = "message_subjects";

    protected $fillable = ['subject'];

    use SoftDeletes;

    public function scopeSearch($query, $search='')
    {
        if (empty($search)) {
            return $query;
        } else {
            return $query->where('subject', 'LIKE', '%' . $search . '%');
        }
    }

        // A MessageSubject has many messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

        // A MessageSubject has many participants
    public function participants()
    {
        return $this->hasMany(MessageParticipant::class);
    }
}
