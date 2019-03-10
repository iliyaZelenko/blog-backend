<?php

namespace App\Models;

class Question extends BaseModel
{
    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'answers' => 'json',
        'correct_answers' => 'array'
    ];
}
