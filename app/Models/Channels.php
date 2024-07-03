<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Videos;

class Channels extends Model
{
    use HasFactory;

    public function videos(){
        return $this->hasMany(Videos::class);
    }

    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
