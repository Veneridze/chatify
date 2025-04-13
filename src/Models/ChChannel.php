<?php
namespace Chatify\Models;


use Chatify\Models\User;
use Illuminate\Database\Eloquent\Model;
use Chatify\Traits\UUID;

class ChChannel extends Model
{
    use UUID;

    protected $fillable = [
        'avatar'
    ];

    public function users()
    {
        $usr_model = config('chatify.user_model');
        return $this->belongsToMany($usr_model::class, 'ch_channel_user', 'channel_id', 'user_id');
    }
}