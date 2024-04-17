<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Request extends Model
{
    use HasFactory;


     protected $guarded = []; //if empty allows all fields to be filled

     protected $casts = [
        'purpose' =>'encrypted',
        'description' =>'encrypted',
        'programProject' => 'encrypted'
    ];

}
