<?php

namespace App\Models;

use App\Models\Resources\Ratingable\Ratingable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Post extends BaseModel
{
    use Ratingable;

    protected $fillable = [
        'title', 'title_slug', 'content', 'content_short', 'user_id', 'category_id', 'rating_value',
        'rating_value_positive', 'rating_value_negative', 'comments_count'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
//        return $this->hasMany(Comment::class);


        return $this->hasMany(Comment::class);
    }

    public function tags(): BelongsToMany
    {
        // ->withTimestamps()
        return $this->belongsToMany(Tag::class);
    }

//    public function saveComment(Comment $comment): self
//    {
//        $this->increment('comments_count');
//        $this->comments()->save($comment);
//
//        return $this;
//    }
//
//    public function deleteComment(Comment $comment): self
//    {
//        $this->decrement('comments_count');
//        $comment->d
//
//        return $this;
//    }

    public function setTags(array $idArr)
    {
        /** @var Collection $tags */
        $tags = Tag::find($idArr);

        $tags->each(function (Tag $tag) {
            $tag->increment('posts_count');
        });

        return $this->tags()->sync($idArr);
    }
}
