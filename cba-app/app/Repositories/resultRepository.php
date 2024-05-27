<?php

namespace App\Repositories;

use App\Models\result;
use App\Repositories\BaseRepository;

class resultRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'score'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return result::class;
    }
}
