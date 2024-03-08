<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;


     protected $guarded = []; //if empty allows all fields to be filled

     protected $casts = [
        // 'purpose' =>'encrypted',
        // 'description' =>'encrypted',
        // 'programProject' => 'encrypted'
    ];
    public function participant1()
    {
        //one post has one user
        return $this->belongsTo(User::class);
    }
    public function participant2()
    {
        //one post has one user
        return $this->belongsTo(User::class);
    }
    public function participant3()
    {
        //one post has one user
        return $this->belongsTo(User::class);
    }
    public function participant4()
    {
        //one post has one user
        return $this->belongsTo(User::class);
    }
}
