<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        $parent = $category->parent;

        if (!$parent) return;

        $parent->increment('children_count');

        // обновляет кол-во детей в родителських категориях
        $parent->getAncestorsAndSelf()->each(function(Category $ancestor) {
            $ancestor->increment('all_children_count');
        });
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        $parent = $category->parent;

        if (!$parent) return;

        $parent->decrement('children_count');
        // обновляет кол-во детей в родителських категориях
        $parent->getAncestorsAndSelf()->each(function (Category $ancestor) {
            $ancestor->decrement('all_children_count');
        });
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
