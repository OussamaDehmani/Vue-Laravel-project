<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
      public function users()
    {
        return $this->belongsToMany(User::class);
    }


      public function user()
    {
        return $this->belongsTo(User::class);
    }
}
