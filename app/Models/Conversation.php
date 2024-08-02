<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id2',
        'user_id2',
        'last_message_id',
       
    ];

    public function lastmMessage() {
        return $this->belongsTo(Message::class);
    }

    public function user1() {
        return $this->belongsTo(user::class, 'user_id1');

    }

    public function user2() {
        return $this->belongsTo(user::class, 'user_id2');

    }

}
