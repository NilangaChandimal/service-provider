<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'worker_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}