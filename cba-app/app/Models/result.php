<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    public $table = 'results';

    public $fillable = [
        'score'
    ];

    protected $casts = [
        'score' => 'integer'
    ];

    public static array $rules = [
        'score' => 'required'
    ];

    
}
