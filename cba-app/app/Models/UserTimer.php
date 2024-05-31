<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTimer extends Model
{
    use HasFactory;

    protected $table = 'user_timer'; // Specify the table name

    protected $fillable = [
        'user_id',
        'start_time',
        'quiz_id',
    ];

    protected $casts = [
        'start_time' => 'datetime',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}