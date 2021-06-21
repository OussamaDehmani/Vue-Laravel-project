<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
       public function user()
    {
        return $this->hasMany(User::class);
    }
         public function user()
    {
        return $this->belongsTo(User::class);
    }
}