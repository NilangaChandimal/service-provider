<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id', 'sender_id', 'sender_type', 'message', 'image',
    ];

    public function sender()
    {
        return $this->morphTo();
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}