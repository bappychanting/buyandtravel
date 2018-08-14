<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageParticipant extends Model
{
    protected $table = "message_participants";

    protected $fillable = ['message_subject_id', 'user_id'];

    use SoftDeletes;

    	// Each MessageParticipant belongs to a subject
	public function message_subject()
	{
		return $this->belongsTo(MessageSubject::class);
	}

		// Each participation belongs to a user
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
