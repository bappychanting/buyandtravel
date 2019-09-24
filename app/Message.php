<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "messages";

    protected $fillable = ['message_text', 'message_subject_id', 'user_id'];

    	
    	// Each Message belongs to a subject
	public function message_subject()
	{
		return $this->belongsTo(MessageSubject::class);
	}

    	// Each Message belongs to a user
	public function user()
	{
		return $this->belongsTo(User::class);
	}

		// Each Message has multiple viewers
	public function viewers()
	{
		return $this->hasMany(MessageViewer::class);
	}
}
