<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Post;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        /** @var Category $category */
        $category = $post->category;

        $post->user()->increment('posts_count');
        $category->increment('posts_count');
        $category->ancestorsAndSelf()->get()->each(function(Category $ancestor) {
            $ancestor->increment('all_posts_count');
        });
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        /** @var Category $category */
        $category = $post->category;

        $post->user()->decrement('posts_count');
        $category->decrement('posts_count');
        $category->ancestorsAndSelf()->get()->each(function(Category $ancestor) {
            $ancestor->decrement('all_posts_count');
        });
    }

    /**
     * Handle the post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
