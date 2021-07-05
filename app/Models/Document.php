<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



use App\User;
class Document extends Model
{
	protected $fillable=['title','subtitle','summary','user_id'];
    
      public function User()
    {
        return $this->belongsTo(User::class);
    }
}
