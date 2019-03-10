<?php

namespace App\Models;

class ContentRating extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value', 'user_id', 'content'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];


    public function content(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class); // , 'user_id'
    }

//    public function getTopByRatingOfDay() {
//        $result = null;
//        $subDay = Carbon::now()->subDay();
//        $votedToday = $this->content()->where('created_at', '>=', $subDay);
//
////        Log::info($this->content()->toArray());
//        $grouped = $votedToday->mapToGroups(function ($item) {
//            return [$item['content_id'] => $item['value']];
//        });
////        Log::info($grouped->toArray());
//
//        $grouped = $grouped->map(function ($content, $key) {
//            return [$key => collect($content)->avg()]; // может и без collect
//        });
////        Log::info($grouped->toArray());
//
//        $filtered = $grouped->filter(function ($value, $key) use ($grouped) {
//            return $value === $grouped->max();
//        });
////        Log::info($grouped->max());
//
//        return $this->content()->get();//$result = $filtered;
//    }
}
