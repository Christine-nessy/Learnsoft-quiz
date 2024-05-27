<?php

namespace App\Repositories;

use App\Models\Answer;
use App\Repositories\BaseRepository;

class AnswerRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'answer',
        'question_id',
        'is_correct'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Answer::class;
    }
}
