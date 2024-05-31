<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'duration','grade_id'];
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'quiz_questions');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}
