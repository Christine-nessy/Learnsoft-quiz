<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $table = 'questions';

    public $fillable = [
        'question',
        
    ];
    // public function quizz(){
    //     return $this->belongsTo(Quiz::class);
    // }
    public function answers(){
        return $this->hasMany(Answer::class);
    }

    protected $casts = [
        'question' => 'string'
    ];

    public static array $rules = [
        'question' => 'required'
    ];

    
}
