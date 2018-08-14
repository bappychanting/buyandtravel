<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageParticipant extends Model
{
    protected $table = "message_participants";

    protected $fillable = ['message_subject_id', 'user_id'];

    use SoftDeletes;

    /*public function scopeSearch($query, $search='')
    {
        if (empty($search)) {
            return $query->WhereHas('message_subject')->whereNull("deleted_at");
        } else {
    		return $query->WhereHas('message_subject', function ($query) use($search){
					       $query->where('subject', 'LIKE', '%' . $search . '%');
    					})
    					->whereNull("deleted_at");
        }
    }*/

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
