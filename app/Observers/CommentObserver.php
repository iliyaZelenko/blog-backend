<?php

namespace App\Observers;

use App\Models\Comment;

class CommentObserver
{
    /**
     * Handle the models comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        $comment->user()->increment('comments_count');
        $comment->post()->increment('comments_count');

        $repliedComment = $comment->parent;

        if (!$repliedComment) return;

        $repliedComment->increment('replies_count');

        // обновляет кол-во детей в родителських категориях
        $repliedComment->getAncestorsAndSelf()->each(function(Comment $ancestor) {
            $ancestor->increment('all_replies_count');
        });
    }

    /**
     * Handle the models comment "updated" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function updated(Comment $comment)
    {
        //
    }

    /**
     * Handle the models comment "deleted" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function deleted(Comment $comment)
    {
        $comment->user()->decrement('comments_count');
        $comment->post()->decrement('comments_count');

        $repliedComment = $comment->parent;

        if (!$repliedComment) return;

        $repliedComment->decrement('replies_count');
        // обновляет кол-во детей в родителських категориях
        $repliedComment->getAncestorsAndSelf()->each(function (Comment $ancestor) {
            $ancestor->decrement('all_replies_count');
        });
    }

    /**
     * Handle the models comment "restored" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function restored(Comment $comment)
    {
        //
    }

    /**
     * Handle the models comment "force deleted" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function forceDeleted(Comment $comment)
    {
        //
    }
}
