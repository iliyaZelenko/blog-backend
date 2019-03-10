<?php

namespace App\Models\Resources\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait BaseModelScopesOrderBy
{
    /**
     * Order by DESC
     *
     * @param $query
     * @return Builder
     */
    public function scopeOrderByDESC(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Order by ASC
     *
     * @param $query
     * @return Builder
     */
    public function scopeOrderByASC(Builder $query): Builder
    {
        return $query->orderBy('created_at');
    }
}
