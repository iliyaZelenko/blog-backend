<?php

namespace App\Models\Resources\Ratingable;

use App\Models\ContentRating;

trait Ratingable
{
    public function ratings()
    {
        return $this->morphMany(ContentRating::class, 'content');
    }

    public function addRating($val)
    {
        $this->increment('rating_value', $val);
        $this->increment('rating_value_positive', $val);
    }

    public function subtractRating($val)
    {
        $this->decrement('rating_value', $val);
        $this->increment('rating_value_negative', $val);
    }

    public function rating(): int
    {
        return +$this->ratings()->sum('value');
    }

    public function ratingAuthors(): array
    {
        $ratingAuthors = [
            '+' => [],
            '-' => [],
        ];

        $this->ratings()->each(function ($item) use (&$ratingAuthors) {
            $section = +$item->value > 0 ? '+' : '-';

            $ratingAuthors[$section][] = $item->autor()
                ->select('nickname', 'id')
                ->first();
        });

        return $ratingAuthors;
    }
}
