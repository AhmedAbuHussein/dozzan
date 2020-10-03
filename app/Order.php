<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded =['id'];
    protected $casts = ['items' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}