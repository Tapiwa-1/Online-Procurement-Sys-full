<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'file',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // public function requests(): HasMany
    // {
    //     return $this->hasMany(Request::class);
    // }

     public function participant1()
    {
        //one post has one user
        return $this->hasMany(Request::class,'participant1');
    }
    public function participant2()
    {
        //one post has one user
        return $this->hasMany(Request::class,'participant2');
    }
    public function participant3()
    {
        //one post has one user
        return $this->HasMany(Request::class,'participant3');
    }
    public function participant4()
    {
        //one post has one user
        return $this->HasMany(Request::class,'participant4');
    }
}
