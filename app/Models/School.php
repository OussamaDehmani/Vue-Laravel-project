<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    
      public function group()
    {
        return $this->hasMany(Group::class);
    }
  public function user()
    {
        return $this->hasMany(User::class);
    }
}
