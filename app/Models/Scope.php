<?php

namespace App\Models;

class Scope extends BaseModel
{
    protected $table = 'scopes';

    protected $fillable = [
        'name',
        'name_slug',
        'description',
        'icon',
        'url',
        'img'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
