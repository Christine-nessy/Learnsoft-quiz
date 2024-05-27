<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $table = 'answers';

    public $fillable = [
        'answer',
        'question_id',
        'is_correct'
    ];
    public function question(){
        return $this->belongsTo(Question::class);
    }

    protected $casts = [
        'answer' => 'string',
        'question_id' => 'integer',
        'is_correct' => 'boolean'
    ];

    public static array $rules = [
        'answer' => 'required',
        'question_id' => 'required|exists:questions,id'
    ];
    

    
}
