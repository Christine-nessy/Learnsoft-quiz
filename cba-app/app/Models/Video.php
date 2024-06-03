<?php

// app/Models/Video.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'videos';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'title',
        'path',
    ];
}

