<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Videos;
use App\Models\Like;
use App\Models\Dislike;
class User extends Authenticatable
{
    use HasFactory, Notifiable;


    public function videos(){
        return $this->hasMany(Videos::class);
    }

    public function likes(){
        return $this->hasOne(Like::class);
    }

    public function dislikes(){
        return $this->hasOne(Dislike::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    
}
