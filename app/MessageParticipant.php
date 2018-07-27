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
	public function subject()
	{
		return $this->belongsTo(MessageSubject::class);
	}

		// Each Message belongs to a user
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
