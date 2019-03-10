<?php

namespace App\Models;

class KeepInMindRecord extends BaseModel
{
    protected $table = 'keep_in_mind_records';

    protected $fillable = [
        'title',
        'text',
        'links'
    ];

    protected $casts = [
        'links' => 'array',
    ];
}
