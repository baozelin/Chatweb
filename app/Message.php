<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    /**
     * message information
     * */
    protected $fillable = ['body'];

    //whoes messages
    protected $appends = ['selfMessage'];

    //messages belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //get selfMessage attribute
    public function getSelfMessageAttribute()
    {
        return $this->user_id === auth()->user()->id;
    }
}
