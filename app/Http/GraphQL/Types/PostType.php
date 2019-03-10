<?php

namespace App\Http\GraphQL\Types;

use App\Models\Post;
use GraphQL\Type\Definition\ResolveInfo;

class PostType
{
//    public function getRatingInfo(Post $root, array $args, $context, ResolveInfo $resolveInfo)
//    {
//        return [
//            'value' => $root->ratingValue
//        ];
//    }

    public function getRootComments(Post $root, array $args, $context, ResolveInfo $resolveInfo)
    {
        return $root->comments()
            ->orderBy('created_at', 'desc')
            ->where('comment_id')
            ->with(['repliesComments', 'user'])
        ;
    }
}
